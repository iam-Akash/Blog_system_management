<?php

namespace App\Http\Controllers\Author;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
    public function index(){
        $posts=Auth::user()->posts;
        return view('author.comments', ['posts'=>$posts]);
    }
    public function destroy($id){
        $comment=Comment::find($id);

        if($comment->post->user->id == Auth::id()){
            $comment->delete();
            return redirect()->back()->with('success', 'Comment successfully deleted');
        }else{
             return redirect()->back()->with('unsuccess', 'You are not authorized to delete this comment');
        }
        
    }
}
