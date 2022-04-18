@extends('layouts.backend.app')
@section('title', ' show-post ')
@push('css')
<style>
    .right-column .header{
        padding: 5px 20px;
    }
</style>

@endpush
@section('content')
<div class="container-fluid">
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group custom-form">
            <a type="button" href="{{route('author.post.index')}}" class="btn bg-cyan waves-effect">
               <i class="material-icons">arrow_back</i>
            <span>Go back</span></a>
                @if ($post->is_approved)
                <button class="btn pull-right bg-green" disabled>
                    <i class="material-icons">done</i>
                    <span>Approved</span>
                </button>

                @else
                    <button class="btn pull-right bg-red" disabled>
                        <i class="material-icons">pending</i>
                        <span>Pending</span>
                    </button>
                
                    
                @endif
        </div>

    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                  {{$post->title}}
                    <small> Posted by <strong>{{$post->user->name}}</strong> on <strong>{{$post->created_at->toFormattedDateString()}}</strong></small>
                </h2>
            </div>
            <div class="body">
                    {!!$post->body!!}
            </div>
        </div>
       
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 right-column">
        <div class="card">
            <div class="header bg-cyan">
                <h4>Categories</h4>
            </div>
            <div class="body">
                @foreach ($post->categories as $postCategory)
                <button class="btn bg-cyan ">{{$postCategory->name}}</button>
                @endforeach
            </div>
        </div>
        <div class="card">
            <div class="header bg-amber">
                <h4>Tags</h4>
            </div>
            <div class="body">
                @foreach ($post->tags as $postTag)
                <button class="btn bg-amber ">{{$postTag->name}}</button>
                @endforeach
            </div>
        </div>
        <div class="card">
            <div class="header bg-green">
                <h4>Feature Image</h4>
            </div>
            <div class="body">
               <img class="img-responsive" src="{{Storage::disk('public')->url('posts/'.$post->image)}}" alt="">
            </div>
        </div>
    </div>
   
</div>
@endsection
@push('js')

@endpush