@extends('layouts.frontend.app')
@section('title', 'All Posts')

@push('css')
<link href="{{asset('assets\frontend\css\posts\responsive.css')}}" rel="stylesheet">
<link href="{{asset('assets\frontend\css\posts\styles.css')}}" rel="stylesheet">

<style>
    .favourite-post {
        color: #007aff;
    }
    .slider-custom{
    background-image: url('{{Storage::disk('public')->url('category/'.$category->image)}}');
    height: 400px;
    width: 100%;
    background-size: cover;
    color:red;
    margin: 0;
    
    }
</style>
@endpush
@section('content')
<div class="slider-custom display-table center-text">
    <h1 class="title display-table-cell"><b>Category : {{$category->name}}</b></h1>
</div><!-- slider -->

<section class="blog-area section">
    <div class="container">

        <div class="row">
          @if ($posts->count()>0)
                @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="single-post post-style-1">
                
                            <div class="blog-image"><img src="{{Storage::disk('public')->url('posts/'.$post->image)}}" alt="Blog Image">
                            </div>
                
                            <a class="avatar" href="{{route('profile.author', $post->user->username)}}"><img
                                    src="{{Storage::disk('public')->url('profile_picture/'.$post->user->image)}}"
                                    alt="Profile Image"></a>
                
                            <div class="blog-info">
                
                                <h4 class="title"><a href="{{route('single.post', $post->slug)}}"><b>{{$post->title}}</b></a></h4>
                
                                <ul class="post-footer">
                                    <li>
                                        @guest
                                        <a href="{{route('login')}}">
                                            <i class="ion-heart"></i>{{$post->favourite_to_users->count()}}
                                        </a>
                                        @else
                                        <a class="{{!Auth::user()->favourite_posts->where('pivot.post_id', $post->id)->count()==0? 'favourite-post' : '' }}"
                                            href="javascript:void(0);"
                                            onclick="document.getElementById('favourite-post-{{$post->id}}').submit()">
                                            <i class="ion-heart"></i>{{$post->favourite_to_users->count()}}
                                        </a>
                                        <form id="favourite-post-{{$post->id}}" method="post"
                                            action="{{route('favourite.post', $post->id)}}">
                                            @csrf
                                        </form>
                                        @endguest
                                    </li>
                                    <li><a href="#"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a></li>
                                    <li><a href="#"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
                                </ul>
                
                            </div><!-- blog-info -->
                        </div><!-- single-post -->
                    </div><!-- card -->
                </div><!-- col-lg-4 col-md-6 -->
                @endforeach
            @else
            <p> No posts to show :(</p>
          @endif
           


        </div><!-- row -->


    </div><!-- container -->
</section><!-- section -->
@endsection
@push('js')

@endpush