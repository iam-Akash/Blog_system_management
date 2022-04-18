@extends('layouts.backend.app')
@section('title' , ' Comments')

@push('css')
<!-- JQuery DataTable Css -->
<link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}"
    rel="stylesheet">
<style>
    .swal2-styled.swal2-cancel,
    .swal2-styled.swal2-confirm {
        font-size: 1.4em !important;
    }
</style>

@endpush

@section('content')
<div class="container-fluid">


    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        All Comments <span class="badge bg-pink">{{$comments->count()}} </span>
                    </h2>
                    @if (Session::has('success'))
                    <span style="color: green">{{Session::get('success')}}</span>
                    @endif
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Comment Info</th>
                                    <th>Post Info</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $key=>$comment)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-left mr-1">
                                                <img src="{{Storage::disk('public')->url('profile_picture/'.$comment->user->image)}}" width="64" height="64" alt="image">
                                            </div>
                                            <div class="media-right">
                                                <span>{{$comment->user->name}}</span>
                                                <p>{{$comment->created_at->diffForHumans()}}</p>
                                                <span>{{$comment->comment}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media">
                                            <div class="media-left mr-1">
                                                <img src="{{Storage::disk('public')->url('posts/'.$comment->post->image)}}" width="64" height="64"
                                                    alt="image">
                                            </div>
                                            <div class="media-right">
                                                <span>posted by: {{$comment->post->user->name}}</span>
                                                <p>Post title: {{$comment->post->title}}</p>
                                                <span>Post body: {!!Str::limit($comment->post->body, 50)!!}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger wave-effect"
                                            onclick="deleteComment({{$comment->id}})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form id="comment-delete-{{$comment->id}}" style="display:none;"
                                            action="{{route('admin.comment.destroy', $comment->id)}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- #END# Exportable Table -->
</div>
@endsection

@push('js')
<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>


<script src="{{asset('assets/backend/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    function deleteComment(id){

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                event.preventDefault();
                document.getElementById('comment-delete-'+id).submit();
            }
            })
           
        }

</script>


@endpush