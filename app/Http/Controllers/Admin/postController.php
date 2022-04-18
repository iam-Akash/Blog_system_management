<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\Subscriber;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\postApproved;
use App\Http\Controllers\Controller;
use App\Notifications\newPostNotify;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts= Post::latest()->get();
        return view('admin.post.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        $tags= Tag::all();
       return view('admin.post.create', ['categories'=> $categories, 'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
       
        $image= $request->file('image');
        $slug=Str::slug($request->title);
        
        if($image){

            $currentDate= Carbon::now()->toDateString();
            $imageName= $slug . '-' . $currentDate . '-' . uniqid(). '.'.$image->getClientOriginalExtension();
            
            if(!Storage::disk('public')->exists('posts')){
                Storage::disk('public')->makeDirectory('posts');
            }

            $imageResize= Image::make($image)->resize(1600,1066)->stream();

            //if you want to save directly the image file
            // Storage::disk('public')->put('posts/'.$imageName, file_get_contents($image));

            //for the resized image
              Storage::disk('public')->put('posts/'.$imageName, $imageResize);
        }
        else{
            $imageName= 'default.png';
        }

        $post=new Post;
        $post->user_id=Auth::id();
        $post->title=$request->title;
        $post->slug=$slug;
        $post->image=$imageName;
        $post->body=$request->body;
        if($request->status){
            $post->status= true;
        }else{
            $post->status= false;
        }
        $post->is_approved=true;
        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);
 
        // notification to all subscriber
         $subscribers=Subscriber::all();
         foreach($subscribers as $subscriber){
            Notification::route('mail',$subscriber->email)
            ->notify(new newPostNotify($post));
         }
         
        return redirect()->route('admin.post.index')->with('success', 'Post successfully added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show' , ['post'=>$post]);
    }
    public function pending()
    {
         $posts= Post::where('is_approved', false)->latest()->get();
        return view('admin.post.pending', ['posts'=>$posts]);
        
    }

    public function approve($id){
        $post= Post::find($id);
        if($post->is_approved == false){
             $post->is_approved= true;
        }
       
        $post->save();

        $post->user->notify(new postApproved($post));
         // notification to all subscriber
         $subscribers=Subscriber::all();
         foreach($subscribers as $subscriber){
            Notification::route('mail',$subscriber->email)
            ->notify(new newPostNotify($post));
         }
        return redirect()->back()->with('success', 'post successfully approved');;
       
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories= Category::all();
        $tags= Tag::all();
        return view('admin.post.edit', ['post'=> $post,'categories'=> $categories, 'tags'=>$tags]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'image',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
       
        $image= $request->file('image');
        $slug=Str::slug($request->title);
        
        if($image){

            $currentDate= Carbon::now()->toDateString();
            $imageName= $slug . '-' . $currentDate . '-' . uniqid(). '.'.$image->getClientOriginalExtension();
            
            if(!Storage::disk('public')->exists('posts')){
                Storage::disk('public')->makeDirectory('posts');
            }

            if(Storage::disk('public')->exists('posts/'.$post->image)){
                Storage::disk('public')->delete('posts/'.$post->image);
            }

            $imageResize= Image::make($image)->resize(1600,1066)->stream();
            Storage::disk('public')->put('posts/'.$imageName, $imageResize);
        }
        else{
            $imageName= $post->image;
        }

        $post->user_id=Auth::id();
        $post->title=$request->title;
        $post->slug=$slug;
        $post->image=$imageName;
        $post->body=$request->body;
        if($request->status){
            $post->status= true;
        }else{
            $post->status= false;
        }
        $post->is_approved=true;
        $post->save();

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        return redirect()->route('admin.post.index')->with('success', 'Post successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image!='default.png'){
             if(Storage::disk('public')->exists('posts/'.$post->image)){
                Storage::disk('public')->delete('posts/'.$post->image);
        }
        }
       
        $post->categories()->detach();
        $post->tags()->detach();

        $post->delete();
        return redirect()->back()->with('success', 'post successfully deleted');
    }

    public function favouritePost(){
        $user= Auth::user();
        $favouritePosts= $user->favourite_posts()->get();
        return view('admin.post.favourite', ['favouritePosts'=> $favouritePosts]);
    }

    public function favouritePostRemove($post){
        $user=Auth::user();
        $user->favourite_posts()->detach($post);
        return redirect()->back();
    }
}
