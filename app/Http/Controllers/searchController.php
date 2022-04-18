<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class searchController extends Controller
{
   public function search(Request $req){
    $query=$req->input('query');
    $posts=Post::where('title', 'LIKE', '%'. $query .'%')->approved()->published()->get();
    return view('searchResults', ['posts'=>$posts, 'query'=>$query]);

   }
}
