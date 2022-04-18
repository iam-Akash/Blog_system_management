<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class authorPostsController extends Controller
{
    public function profile($username){
       $author=User::where('username', $username)->first();
       $posts= $author->posts()->approved()->published()->get();
       return view('authorPosts', ['author'=>$author, 'posts'=>$posts]);
    }

}
