<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class postController extends Controller
{
    public function index(){
  
       $posts=Post::latest()->approved()->published()->paginate(12);
        return view('all-posts', ['posts'=>$posts]);
    }
    public function show($slug){
        $post= Post::where('slug', $slug)->first();
        $blog_key="blog_".$post->id;
        if(!Session::has($blog_key)){
            $post->increment('view_count');
            Session::put($blog_key,1);
        }

        // $randomPosts= Post::all()->random(3);
         $randomPosts= Post::approved()->published()->take(3)->inRandomOrder()->get();

      
        return view('single-post', ['post'=>$post, 'randomPosts'=>$randomPosts]);
    }

    public function postsByCategory($slug){
        $category= Category::where('slug', $slug)->first();
        $posts= $category->posts()->approved()->published()->get();
        return view('postsByCategory', ['category'=>$category, 'posts'=>$posts]);
    }

     public function postsByTag($slug){
         $tag= Tag::where('slug', $slug)->first();
        $posts= $tag->posts()->approved()->published()->get();
        return view('postsByTag', ['tag'=>$tag, 'posts'=>$posts]);
    }
}
