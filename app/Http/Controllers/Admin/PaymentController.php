<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\EloquentUserProvider;

use Braintree\Gateway;
use App\Models\Payment;
use Exception;

use App\Models\User;
use App\Models\Sponsor;

class PaymentController extends Controller
{
    public function index(Request $request, $user)
    {
        $user = User::find($user);

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();
        
        $sponsorshipId = $request->input('sponsorships');

        $sponsorshipId = intval($sponsorshipId[0]);
        
        $sponsor = Sponsor::find($sponsorshipId);
        
        $sponsor = $sponsor->getAttributes();

        return view('admin.payments.form', compact('sponsor', 'user', 'token'));
    }

    public function store(Request $request )
    {

        $userPayed = request()->all();

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $userPayed['name_on_card'],
                'lastName' => 'Stark',
                'email' => $userPayed['email'],
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            
            $user = User::find($userPayed['idUserPay']);
            
            if ($user) {
                // Collega la sponsor all'utente utilizzando la relazione sponsors
                $user->sponsors()->attach($userPayed['sponsorID'], [
                    'start_date' => now(), // Data di inizio della sponsorizzazione
                    'end_date' => now()->addDay(1), // Data di fine della sponsorizzazione 
                ]);
            }

            return back()->with('success_message', 'Transaction successful. The ID is:' . $transaction->id);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return back()->withErrors('An error occurred with the message: ' . $result->message);
        }
    }
}
