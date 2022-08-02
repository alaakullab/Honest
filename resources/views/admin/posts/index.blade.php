@extends('backend.layouts.app')

@section('title', __('app.Posts'))

@push('styles')

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">

@endpush

@section('content')

    <div class="block-header">
        <a href="{{route('admin.posts.create',app()->getLocale())}}" class="waves-effect waves-light btn right m-b-15 addbtn">
            <i class="material-icons left">add</i>
            <span>{{__('app.CREATE')}}</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>{{__('app.POST LIST')}}</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('app.Image')}}</th>
                                    <th>{{__('app.Title')}}</th>
                                    <th>{{__('app.Author')}}</th>
                                    <th>{{__('app.Category')}}</th>
                                    <th><i class="material-icons">visibility</i></th>
                                    <th>{{__('app.Is Approved')}}</th>
                                    <th>{{__('app.Status')}}</th>
                                    <th><i class="material-icons small">comment</i></th>
                                    <th width="150">{{__('app.Action')}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach( $posts as $key => $post )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        @if(Storage::disk('public')->exists('posts/'.$post->image))
                                            <img src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}" class="img-responsive img-rounded">
                                        @endif
                                    </td>
                                    <td>
                                        <span title="{{$post->title}}">
                                            {{ str_limit($post->title,10) }}
                                        </span>
                                    </td>
                                    <td>{{$post->user->name}}</td>
                                    <td>
                                        @foreach($post->categories as $key=>$category)
                                            @if($key!=0)
                                                <span>,</span>
                                            @endif
                                            {{$category->name}}
                                        @endforeach
                                    </td>
                                    <td>{{$post->view_count}}</td>
                                    <td>
                                        @if($post->is_approved == true)
                                            <span class="badge bg-green">{{__('app.Approved')}}</span>
                                        @else 
                                            <span class="badge bg-pink">{{__('app.Pending')}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($post->status == true)
                                            <span class="badge bg-green">{{__('app.Published')}}</span>
                                        @else 
                                            <span class="badge bg-pink">{{__('app.Pending')}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge">
                                            <i class="material-icons small left">comment</i>
                                            {{ $post->comments_count }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('admin.posts.show',[app()->getLocale(),$post->slug])}}" class="btn btn-success btn-sm waves-effect">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="{{route('admin.posts.edit',[app()->getLocale(),$post->slug])}}" class="btn btn-info btn-sm waves-effect">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deletePost({{$post->id}})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form action="{{route('admin.posts.destroy',[app()->getLocale(),$post->slug])}}" method="POST" id="del-post-{{$post->id}}" style="display:none;">
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

@endsection


@push('scripts')

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('backend/js/pages/tables/jquery-datatable.js') }}"></script>

    <script>
        function deletePost(id){
            
            swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('del-post-'+id).submit();
                    swal(
                    'Deleted!',
                    'Post has been deleted.',
                    'success'
                    )
                }
            })
        }
    </script>


@endpush