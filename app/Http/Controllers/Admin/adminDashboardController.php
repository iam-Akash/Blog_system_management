<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminDashboardController extends Controller
{
      public function index(){
        $posts=Post::all();
        $total_posts=Post::approved()->published()->count();
        
        $popular_posts=Post::approved()->published()
        ->withCount('favourite_to_users')
        ->withCount('comments')
        ->orderBy('view_count', 'desc')
        ->orderBy('favourite_to_users_count','desc')
        ->orderBy('comments_count', 'desc')
        ->take(5)
        ->get();
        $total_pending_posts= Post::notApproved()->count();
        $total_views=Post::sum('view_count');
        $total_authors= User::authors()->count();
        $new_authors_today= User::authors()->whereDate('created_at', Carbon::today())->count();
        $active_authors= User::authors()
       ->withCount('posts')
       ->withCount('comments')
       ->withCount('favourite_posts')
       ->orderBy('posts_count', 'desc')
       ->orderBy('comments_count', 'desc')
       ->orderBy('favourite_posts_count', 'desc')
       ->take(5)->get();

       $category_count= Category::all()->count();
       $tag_count= Tag::all()->count();


          return view('admin.dashboard', [
              'posts'=>$posts,
              'total_posts'=>$total_posts,
              'popular_posts'=>$popular_posts,
              'total_pending_posts'=>$total_pending_posts,
              'total_views'=>$total_views,
              'total_authors'=>$total_authors,
              'new_authors_today'=>$new_authors_today,
              'active_authors'=>$active_authors,
              'category_count'=>$category_count,
              'tag_count'=>$tag_count,

            ]);
    }
}
