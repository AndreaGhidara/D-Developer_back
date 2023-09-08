<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; //<---- Import del controller precedentemente creato!
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PaymentController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/signUp', function () {
    return view('registerPage');
});


Route::get('/homepage', function () {
    return redirect('http://localhost:5174/home'); // Reindirizza a /homepage, che è una rotta Vue
});



Route::middleware(['auth'])
    ->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
    ->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
    ->group(function () {

        //Siamo nel gruppo quindi:
        // - il percorso "/" diventa "admin/"
        // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/users/{id}/messages', [UsersController::class, 'messages']) -> name('users.messages');
        Route::get('/users/{id}/reviews', [UsersController::class, 'reviews']) -> name('users.reviews');
        Route::get('/users/{id}/sponsorships', [UsersController::class, 'sponsorship']) -> name('users.sponsorships');
        Route::get('/users/{id}/stats', [UsersController::class, 'stats']) -> name('users.stats');
        Route::resource('users', UsersController::class);

        Route::get('/payments/{user}', [PaymentController::class, 'index'])->name('payments.form');
        Route::post('/pay', [PaymentController::class, 'store'])->name('pay');


    });

require __DIR__ . '/auth.php';
