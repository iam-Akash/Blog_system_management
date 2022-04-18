<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class authorListController extends Controller
{
    public function index(){
        $authors= User::authors()
        ->withCount('posts')
        ->withCount('comments') 
        ->withCount('favourite_posts') 
        ->get();
        return view('admin.authorList', ['authors'=>$authors]);
    }

    public function destroy($id){
       User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Author deleted successfully');
    }
    }
    
