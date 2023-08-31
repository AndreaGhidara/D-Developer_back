<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//import model USER
use App\Models\User;


class UserController extends Controller
{
    public function index(){

        $Users = User::all();

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

    // public function show() {

    // }
    public function pages(){

        $Users = User::paginate(4);

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

    // public function show() {

    // }
}
