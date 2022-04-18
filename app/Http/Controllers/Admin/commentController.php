<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class commentController extends Controller
{
    public function index(){
        $comments=Comment::latest()->get();
        return view('admin.comments', ['comments'=>$comments]);
    }
    public function destroy($id){
        Comment::find($id)->delete();
        return redirect()->back()->with('success', 'Comment successfully deleted');
    }
}
