<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
//import model USER
use App\Models\User;
use App\Models\ProgrammingLanguages;
use App\Models\Review;
use App\Models\Valutation;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(){

        // $Users = User::all();

        $Users = User::with("review", "sponsors", "programmingLanguages", "valutations","message")->get();

        // $Users = User::paginate(5);

        // $posts = User::with("category", "tags")->paginate(3);

        $response = [
            "success" => true,
            "results" => $Users
        ];

        return response()->json($response);

    }

    // public function count(){

    // }

    public function pages(){

        $Users = User::with("review", "sponsors", "programmingLanguages", "valutations","message")->paginate(4);

        // $posts = Post::with("category", "tags")->get();

        // $Users = User::paginate(5);

        // $posts = User::with("category", "tags")->paginate(3);

        $response = [
            "success" => true,
            "results" => $Users
        ];

        return response()->json($response);

    }

    // public function count(){

    // }

    public function show($id) {

        $User = User::with("review", "sponsors", "programmingLanguages", "valutations","message")->find($id);

        // $response = [
        //     "sucess" => true,
        //     "results" => $User
        // ];

        // return response()->json($response);

        return response()->json([
            'success' => true,
            'results' => $User
        ]);

    }
    public function languages(){

        $languages = ProgrammingLanguages::all();




        $response = [
            "success" => true,
            "results" => $languages
        ];

        return response()->json($response);

    }

   public function message(Request $request) {

        $message = new Message();

        $message = Message::create([
            'user_id' => $request ['user_id'],
            'name' => $request ['name'],
            'surname'=> $request ['surname'],
            'email'=> $request ['email'],
            'text'=> $request ['text'],
        ]);

        $message->save();

   }

   public function review(Request $request){

    $review = new Review();

    $review = Review::create([

        'user_id' => $request ['user_id'],
        'date' => $request ['date'],
        'name' => $request ['name'],
        'email' => $request ['email'],
        'review' => $request ['review']

    ]);

    $review->save();

   }

   //prendo tutte le valutazioni possibili
   public function valutation(){

    $valutation = Valutation::all() ;

    $response = [
        "success" => true,
        "results" => $valutation
    ];

    return response()->json($response);

    }

    public function postValutation(Request $request){

       $user= User::find($request['user_id']);
       $valutation = Valutation::find($request['valutation_id']);

        $user->save();
        $valutation->save();

       $user->valutations()->attach($valutation, array(
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
       ));
        
    }

}
