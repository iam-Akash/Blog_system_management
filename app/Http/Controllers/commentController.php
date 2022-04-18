<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
    public function store(Request $req,$post ){
       $this->validate($req,[
        'comment'=>'required',
       ]);

       $comment= new Comment;
       $comment->user_id=Auth::id();
       $comment->post_id=$post;
       $comment->comment=$req->comment;
       $comment->save();
       return redirect()->back();
    }
}
