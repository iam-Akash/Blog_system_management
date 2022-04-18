@extends('layouts.backend.app')
@section('title', ' Settings ')

{{-- CSS --}}
@push('css')

@endpush

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Profile settings
                </h2>
                @if(Session::has('success'))
                    <span style="color: green;font-weight:blod">{{Session::get('success')}}</span>
                @endif
                @if(Session::has('error'))
                <span style="color: red;font-weight:blod">{{Session::get('error')}}</span>
                @endif

                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#profile_with_icon_title" data-toggle="tab" aria-expanded="false">
                            <i class="material-icons">face</i> Update profile info
                        </a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#password_with_icon_title" data-toggle="tab" aria-expanded="false">
                            <i class="material-icons">build</i> Change password
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="profile_with_icon_title">
                       <form action="{{route('author.profile.update')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="name">Name</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input value="{{Auth::user()->name}}" type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email">Email Address</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input value="{{Auth::user()->email}}" type="text" id="email" name="email" class="form-control" placeholder="Enter your email address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="image">Upload image</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" id="image" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="about">Bio</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <textarea style="padding: 20px" name="about" id="about" cols="120" rows="5" placeholder="About yourself">{!!Auth::user()->about!!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <button type="button submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="password_with_icon_title">
                       <form action="{{route('author.password.update')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="old_password">Old password</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="old_password" name="old_password" class="form-control"
                                           >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password">New password</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password" name="password" class="form-control"
                                           >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password_confirmation">Confirm password</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                                           >
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <button type="button submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                   
            </div>
            
        </div>
    </div>
</div>
@endsection

{{-- JS --}}
@push('js')

@endpush