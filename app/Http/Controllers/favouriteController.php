<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class favouriteController extends Controller
{
    public function add($post){
        
        $user=Auth::user();
        $isFavourite=$user->favourite_posts()->where('post_id', $post)->count();
        
        if($isFavourite == 0){
            $user->favourite_posts()->attach($post);
            return redirect()->back();
        }else{
            $user->favourite_posts()->detach($post);
            return redirect()->back();
        }
    }
}
