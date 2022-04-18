<?php

namespace App\Http\Controllers\Author;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class authorDashboardController extends Controller
{
      public function index(){
        $user= Auth::User();
        $posts=$user->posts;
        $popularPosts= $user->posts()
        ->withCount('comments')
        ->withCount('favourite_to_users')
        ->orderBy('view_count', 'desc')
        ->orderBy('favourite_to_users_count', 'desc')
        ->orderBy('comments_count', 'desc')
        ->take(5)
        ->get();

        $pendingPosts= $user->posts()->notApproved()->count();
        $totalViews= $user->posts->sum('view_count');
          return view('author.dashboard' , ['posts'=>$posts, 'popularPosts'=>$popularPosts,'pendingPosts'=>$pendingPosts,'totalViews'=>$totalViews ]);
    }

  
}
