@extends('layouts.backend.app')
@section('title', ' create-post ')
@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
    <!-- Multi Select Css -->
    <link href="{{asset('assets/backend/plugins/multi-select/css/multi-select.css')}}" rel="stylesheet">
    <style>
        .custom_label{
            font-weight: 400;
        }

        .bootstrap-select .bs-searchbox{
            margin-left:30px!important;
        }
        .bootstrap-select.btn-group .dropdown-menu.inner{
            margin-left:30px!important; 
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
      <form method="post" action="{{route('author.post.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group custom-form text-right">
                    <a type="button" href="{{route('author.post.index')}}" class="btn btn-danger waves-effect">CANCEL</a>
                    <button type="submit" class="btn m-l-5 btn-primary waves-effect">PUBLISH</button>
                </div>
        
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           Add new posts
                           
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                       
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('title')? 'focused error' : ''}}">
                                    <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">
                                    <label for="title" class="form-label">Post title</label>
                                </div>
                                @error('title')
                                <span style="color: red"> This field is required </span>
                                @enderror
                            </div>
                           
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('image')? 'focused error' : ''}}">
                                    <label class="custom_label" for="image">Feature Image</label>
                                    <input type="file" id="image" name="image" class="form-control" ">
                                    
                                </div>
                                @error('image')
                                <span style="color: red"> This field is required </span>
                                @enderror
                            </div>
                            <div class="form-group form-float" style="margin-bottom: 0">
                               
                                    <input type="checkbox" class="filled-in" value="1" id="publish" name="status">
                                    <label for="publish" class="custom_label">Publish</label>
                               
                            </div>
                           
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Categories and Tags
            
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
            
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('categories')? 'focused error' : ''}} ">
                               
                                <label for="categories">Select Category</label>
                                <select name="categories[]" id="categories" class="form-control show-tick" data-live-search='true' multiple >
                                  @foreach ($categories as $category)
                                      <option value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                            @error('categories')
                            <span style="color: red"> This field is required </span>
                            @enderror
                        </div>
                        <div class="form-group form-float custom-form">
                            <div class="form-line {{ $errors->has('tags')? 'focused error' : ''}}" >
                               <label for="tags" >Select Tag</label>
                                <select name="tags[]" id="tags" class="form-control show-tick" data-live-search="true" multiple>
                                    @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}" >{{$tag->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('tags')
                            <span style="color: red"> This field is required </span>
                            @enderror
                        </div>
                      
            
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Body
        
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <textarea name="body" id="ckeditor">{{old('body') }}</textarea>
                        @error('body')
                        <span style="color: red; padding:10px 30px;"> This field is required </span>
                        @enderror
                    </div>
                    
                </div>
            </div>
        </div>

       
        </form>
    </div>
@endsection
@push('js')
    <!-- Select Plugin Js -->
    <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Ckeditor -->
    <script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
      
    //CKEditor
    CKEDITOR.replace('ckeditor');
    CKEDITOR.config.height = 300;

    
    </script>
@endpush