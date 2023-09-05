<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
//import model USER
use App\Models\User;
use App\Models\ProgrammingLanguages;


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
}
