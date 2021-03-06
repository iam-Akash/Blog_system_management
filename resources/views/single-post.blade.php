@extends('layouts.frontend.app')
@section('title', 'Single-post')

@push('css')
    <link href="{{asset('assets\frontend\css\single-post\responsive.css')}}" rel="stylesheet">
    <link href="{{asset('assets\frontend\css\single-post\styles.css')}}" rel="stylesheet">

    <style>
        .favourite-post {
        color: #007aff;
        }

        .slider-custom{
            background-image: url('{{Storage::disk('public')->url('posts/'.$post->image)}}');
            height: 400px;
            width: 100%;
            background-size: contain;
            color:red;
            margin: 0;
           
        }
    </style>
@endpush
@section('content')
<div class="slider-custom">
    <div class="display-table  center-text">
       
            <h1 class="title display-table-cell" style="box-shadow: 2px 2px 10px rgba(0,0,0,15%);"><b>{{$post->title}}</b></h1>
    
       
    </div>
</div><!-- slider -->

<section class="post-area section">
    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-md-12 no-right-padding">

                <div class="main-post">

                    <div class="blog-post-inner">

                        <div class="post-info">

                            <div class="left-area">
                                <a class="avatar" href="#"><img src="{{Storage::disk('public')->url('profile_picture/'.$post->user->image)}}"
                                        alt="Profile Image"></a>
                            </div>

                            <div class="middle-area">
                                <a class="name" href="#"><b>{{$post->user->name}}</b></a><br>
                                <h6 class="date"> Posted at {{$post->created_at->diffForHumans()}}</h6>
                            </div>

                        </div><!-- post-info -->

                        <h3 class="title"><a href="#"><b>{{$post->title}}</b></a></h3>

                        <p class="para">{!! html_entity_decode($post->body)!!}</p>

                       
                        <h4 class="title mt-5"><b>Categories</b></h4>
                        <ul class="tags">
                           @foreach ($post->categories as $category)
                            <li><a href="{{route('category.posts', $category->slug)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- blog-post-inner -->

                    <div class="post-icons-area">
                        <ul class="post-icons">
                            <li>
                                @guest
                                <a href="{{route('login')}}">
                                    <i class="ion-heart"></i>{{$post->favourite_to_users->count()}}
                                </a>
                                @else
                                <a class="{{!Auth::user()->favourite_posts->where('pivot.post_id', $post->id)->count()==0? 'favourite-post' : '' }}"
                                    href="javascript:void(0);" onclick="document.getElementById('favourite-post-{{$post->id}}').submit()">
                                    <i class="ion-heart"></i>{{$post->favourite_to_users->count()}}
                                </a>
                                <form id="favourite-post-{{$post->id}}" method="post" action="{{route('favourite.post', $post->id)}}">
                                    @csrf
                                </form>
                                @endguest
                            </li>
                            <li><a href="#"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a></li>
                            <li><a href="#"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
                        </ul>

                        <ul class="icons">
                            <li>SHARE : </li>
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                        </ul>
                    </div>

                


                </div><!-- main-post -->
            </div><!-- col-lg-8 col-md-12 -->

            <div class="col-lg-4 col-md-12 no-left-padding">

                <div class="single-post info-area">

                    <div class="sidebar-area about-area">
                        <h4 class="title"><b>ABOUT {{$post->user->name}}</b></h4>
                        <p>{{$post->user->about}}</p>
                    </div>

                  

                    <div class="tag-area">

                        <h4 class="title"><b>TAGS</b></h4>
                        <ul>
                            @foreach ($post->tags as $tag)
                                <li><a href="{{Route('tag.posts', $tag->slug)}}">{{$tag->name}}</a></li>
                            @endforeach
                            
                           
                        </ul>

                    </div><!-- subscribe-area -->

                </div><!-- info-area -->

            </div><!-- col-lg-4 col-md-12 -->

        </div><!-- row -->

    </div><!-- container -->
</section><!-- post-area -->


<section class="recomended-area section">
    <div class="container">
        <h3 style="text-align: left; margin:10px 0;" class="title"><b>Posts you may like...</b></h3>
        <div class="row">
            @foreach ($randomPosts as $randomPost)
                <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">
                    
                                <div class="blog-image"><img src="{{Storage::disk('public')->url('posts/'.$randomPost->image)}}" alt="Blog Image"></div>
                    
                                <a class="avatar" href="#"><img src="{{Storage::disk('public')->url('profile_picture/'.$randomPost->user->image)}}" alt="Profile Image"></a>
                    
                                <div class="blog-info">
                    
                                    <h4 class="title"><a href="{{route('single.post', $randomPost->slug)}}"><b>{{$randomPost->title}}</b></a></h4>
                    
                                    <ul class="post-footer">
                                       <li>
                                            @guest
                                            <a href="{{route('login')}}">
                                                <i class="ion-heart"></i>{{$randomPost->favourite_to_users->count()}}
                                            </a>
                                            @else
                                            <a class="{{!Auth::user()->favourite_posts->where('pivot.post_id', $randomPost->id)->count()==0? 'favourite-post' : '' }}"
                                                href="javascript:void(0);" onclick="document.getElementById('favourite-post-{{$randomPost->id}}').submit()">
                                                <i class="ion-heart"></i>{{$randomPost->favourite_to_users->count()}}
                                            </a>
                                            <form id="favourite-post-{{$randomPost->id}}" method="post" action="{{route('favourite.post', $randomPost->id)}}">
                                                @csrf
                                            </form>
                                            @endguest
                                        </li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>{{$randomPost->comments->count()}}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{$randomPost->view_count}}</a></li>
                                    </ul>
                    
                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-md-6 col-sm-12 -->
            @endforeach
       

        </div><!-- row -->

    </div><!-- container -->
</section>

<section class="comment-section">
    <div class="container">
        <h4><b>POST COMMENT</b></h4>
        <div class="row">

            <div class="col-lg-8 col-md-12">
               
                @guest
                <span class="mt-2 mb-5">To comment on this post you must have to <a class="btn btn-primary"
                        href="{{route('login')}}">Login</a> first.</span>
                    @else
                <div class="comment-form">
                    <form method="post" action="{{route('comment.store', $post->id)}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <textarea name="comment" rows="2" class="text-area-messge form-control" placeholder="Enter your comment"
                                    aria-required="true" aria-invalid="false"></textarea>
                            </div><!-- col-sm-12 -->
                            <div class="col-sm-12">
                                <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                            </div><!-- col-sm-12 -->
                
                        </div><!-- row -->
                    </form>
                </div><!-- comment-form -->
                @endguest
               

                <h4><b>COMMENTS({{$post->comments->count()}})</b></h4>
                @if ($post->comments->count() > 0)
                
                <div class="commnets-area ">
                    @foreach ($post->comments as $comment)
                    <div class="comment">
                
                        <div class="post-info">
                
                            <div class="left-area">
                                <a class="avatar" href="#"><img
                                        src="{{Storage::disk('public')->url('profile_picture/'.$comment->user->image)}}"
                                        alt="Profile Image"></a>
                            </div>
                
                            <div class="middle-area">
                                <a class="name" href="#"><b>{{$comment->user->name}}</b></a>
                                <h6 class="date">{{$comment->created_at->diffForHumans()}}</h6>
                            </div>
                
                
                        </div><!-- post-info -->
                
                        <p>{{$comment->comment}}</p>
                
                    </div>
                    @endforeach
                </div><!-- commnets-area -->
                
               
                @else
                <p>No comment yet, Be the first one...</p>
                    
                @endif
                

            </div><!-- col-lg-8 col-md-12 -->

        </div><!-- row -->

    </div><!-- container -->
</section>
@endsection
@push('js')
    
@endpush