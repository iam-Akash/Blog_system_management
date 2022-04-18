@extends('layouts.backend.app')
@section('title' , ' Tag')

@push('css')
   <!-- JQuery DataTable Css -->
<link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet"> 
    <style>
        .swal2-styled.swal2-cancel,
        .swal2-styled.swal2-confirm {
            font-size: 1.4em !important;
        }
    </style>

@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header ">
           <a class="btn btn-primary" href="{{route('admin.tag.create')}}">
            <i class="material-icons">add</i>
            <span>Add new tag</span>
        </a>
        </div>
    
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Tags <span class="badge bg-pink">{{$tags->count()}} </span>
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
                                        <th>Name</th>
                                        <th>Post Count</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $key=>$tag)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$tag->name}}</td>
                                            <td>{{$tag->posts->count()}}</td>
                                            <td>{{$tag->created_at->toFormattedDateString()}}</td>
                                            <td>{{$tag->updated_at->toFormattedDateString()}}</td>
                                            <td class="text-center"> <a href="{{route('admin.tag.edit', $tag->id)}}" class="btn btn-info wave-effect">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button type="button" class="btn btn-danger wave-effect" onclick="deleteTag({{$tag->id}})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="tag-delete-{{$tag->id}}" style="display:none;" action="{{route('admin.tag.destroy', $tag->id)}}" method="POST">
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

    
        function deleteTag(id){

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
                document.getElementById('tag-delete-'+id).submit();
            }
            })
           
        }

    </script>

    
@endpush


    


 

   