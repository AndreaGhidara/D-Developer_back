<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//sanctum, funzionalita per gestire in modo easy l' autenticazione
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get("/apiDeveloper", function() {
//     return response()->json();
//     return"ok";
// });
//Chiamata al controller per la gestione dei dati API
Route::get("/apiDeveloper", [UserController::class, "index"]);
Route::get("/apiDeveloperPages", [UserController::class, "pages"]);
Route::get("/apiDeveloper/{id}", [UserController::class, 'show']);

Route::get("/languages", [UserController::class, "languages"]);


Route::post("/message", [UserController::class, "message"]);

Route::post("/review", [UserController::class, "review"]);

Route::get("/valutation", [UserController::class, "valutation"]);

Route::post("/postValutation", [UserController::class, "postValutation"]);