

@extends('layouts.frontend.app')
@section('title', 'Profile')

@push('css')
<link href="{{asset('assets\frontend\css\authorPosts\responsive.css')}}" rel="stylesheet">
<link href="{{asset('assets\frontend\css\authorPosts\styles.css')}}" rel="stylesheet">
<style>
    .favourite-post {
        color: #007aff;
    }
</style>
@endpush
@section('content')
<div class="slider display-table center-text">
    <h1 class="title display-table-cell"><b>{{$author->name}}</b></h1>
</div><!-- slider -->

<section class="blog-area section">
    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-md-6 col-sm-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="{{Storage::disk('public')->url('posts/'.$post->image)}}" alt="Blog Image"></div>

                                <a class="avatar" href="{{route('profile.author', $post->user->username)}}"><img src="{{Storage::disk('public')->url('profile_picture/'.$post->user->image)}}" alt="Profile Image"></a>

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
                                        <li><a href="javascript:void(0);"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a></li>
                                        <li><a href="javascript:void(0);"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-md-6 col-sm-12 -->
                    @endforeach
                   

                    

                </div><!-- row -->

     

            </div><!-- col-lg-8 col-md-12 -->

            <div class="col-lg-4 col-md-12 ">

                <div class="single-post info-area ">

                    <div class="about-area">
                        <h4 class="title"><b>ABOUT AUTHOR</b></h4>
                        <p class="mt-2"><strong>Author Name: </strong>{{$author->name}}</p>
                        <p class="mt-2"><strong>Information : </strong></br>{!!html_entity_decode($author->about)!!}</p>
                        <p class="mt-2"><strong>Total posts : </strong>{{$posts->count()}}</p>
                        <p class="mt-2"><strong>Account created at :</strong> {{$author->created_at->toFormattedDateString()}}</p>
                    </div>
                   

                </div><!-- info-area -->

            </div><!-- col-lg-4 col-md-12 -->

        </div><!-- row -->

    </div><!-- container -->
</section><!-- section -->

@endsection
@push('js')

@endpush