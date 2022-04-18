
@extends('layouts.backend.app')
@section('title', ' post ')
    
@push('css')
    <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    <div class="block-header ">
        <a class="btn btn-primary" href="{{route('author.post.create')}}">
            <i class="material-icons">add</i>
            <span>Add new post</span>
        </a>
    </div>

    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        All Posts <span class="badge bg-pink"> {{$posts->count()}} </span>
                    </h2>
                    @if (Session::has('success'))
                    <span style="color: green">{{Session::get('success')}}</span>
                    @endif
                   
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th><i class="material-icons">visibility</i></th>
                                    <th>Status</th>
                                    <th>Is_approved</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key=>$post)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{Str::limit($post->title, 20, $end='...')}}</td>
                                    <td>{!!Str::limit($post->body, 20, $end='...')!!}</td>
                                    <td>{{$post->view_count}}</td>
                                    <td>
                                    @if ($post->status == true )
                                    <span class="badge bg-blue">Published</span>
                                    
                                    @else
                                    <span class="badge bg-red">Pending</span>
                                    @endif
                                    </td>
                                    <td>
                                        @if ($post->is_approved == true )
                                            <span class="badge bg-blue">Approved</span>

                                            @else
                                             <span class="badge bg-red">Pending</span>
                                        @endif

                                    </td>
                                   
                                    <td>{{$post->created_at->toFormattedDateString()}}</td>
                                    <td class="text-center">
                                        <a href="{{route('author.post.show', $post->id)}}" class="btn btn-success wave-effect">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="{{route('author.post.edit', $post->id)}}"
                                            class="btn btn-info wave-effect">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" class="btn btn-danger wave-effect"
                                            onclick="deletePost({{$post->id}})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form id="post-delete-{{$post->id}}" style="display:none;"
                                            action="{{route('author.post.destroy', $post->id)}}" method="POST">
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
        function deletePost(id){
    
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
                    document.getElementById('post-delete-'+id).submit();
                }
                })
               
            }
    
    </script> 
@endpush