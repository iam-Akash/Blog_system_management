@extends('layouts.frontend.app')
@section('title', 'Homepage ')

{{-- CSS --}}
@push('css')
<link href="{{asset('assets\frontend\css\home\styles.css')}}" rel="stylesheet">
<link href="{{asset('assets\frontend\css\home\responsive.css')}}" rel="stylesheet">
<style>
    .main-slider {
        padding-right: 0;
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .blog-area .single-post .title {
        padding: 10px 30px 10px;
    }

    .favourite-post {
        color: #007aff;
    }

</style>
@endpush

@section('content')
<div class="main-slider">
    <!-- Slider main container -->
    <div class="swiper mySwiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($categories as $category)
            <div class="swiper-slide">
                <a class="slider-category" href="{{route('category.posts', $category->slug)}}">
                    <div class="blog-image"><img
                            src="{{Storage::disk('public')->url('category/slider/'.$category->image)}}"
                            alt="{{$category->name}}">
                    </div>

                    <div class="category">
                        <div class="display-table center-text">
                            <div class="display-table-cell">
                                <h3><b>{{$category->name}}</b></h3>
                            </div>
                        </div>
                    </div>

                </a>
            </div><!-- swiper-slide -->
            @endforeach
        </div>
        {{-- <div class="swiper-pagination"></div> --}}
    </div>
</div><!-- slider -->

<section class="blog-area section">
    <div class="container">

        <div class="row">

            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{Storage::disk('public')->url('posts/'.$post->image)}}"
                                alt="{{$post->title}}"></div>

                        <a class="avatar" href="{{route('profile.author', $post->user->username)}}"><img src="{{Storage::disk('public')->url('profile_picture/'.$post->user->image)}}"
                                alt="Profile Image"></a>

                        <div class="blog-info">

                            <h4 class="title"><a href="{{route('single.post', $post->slug)}}"><b>{{$post->title}}</b></a></h4>

                            <div style="padding: 0 20px 20px">
                                {{-- <p>{!!$post->body!!}</p> --}}
                                {!!Str::limit($post->body, 200, $end='...')!!} <a style="color: #007aff" href="{{route('single.post', $post->slug)}}">View More</a>
                            </div>

                            <ul class="post-footer">
                                <li>
                                    @guest
                                    <a href="{{route('login')}}">
                                        <i
                                            class="ion-heart"></i>{{$post->favourite_to_users->count()}}
                                    </a>
                                    @else
                                    <a class="{{!Auth::user()->favourite_posts->where('pivot.post_id', $post->id)->count()==0? 'favourite-post' : '' }}"
                                        href="javascript:void(0);"
                                        onclick="document.getElementById('favourite-post-{{$post->id}}').submit()">
                                        <i
                                            class="ion-heart"></i>{{$post->favourite_to_users->count()}}
                                    </a>
                                    <form id="favourite-post-{{$post->id}}" method="post"
                                        action="{{route('favourite.post', $post->id)}}">
                                        @csrf
                                    </form>
                                    @endguest

                                </li>
                                <li><a href="#"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a></li>
                                <li><a href="javascript:void(0);"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
                            </ul>

                        </div><!-- blog-info -->
                    </div><!-- single-post -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->
            @endforeach




        </div><!-- row -->

        <a class="load-more-btn" href="{{route('all.posts')}}"><b>LOAD MORE</b></a>

    </div><!-- container -->
</section><!-- section -->
@endsection

{{-- JS --}}
@push('js')
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,

    });

</script>
@endpush
