@extends('backend.layouts.app')

@section('title', 'Edit Categories')

@push('styles')

    
@endpush


@section('content')

    <div class="block-header">
        <a href="{{route('admin.categories.index',app()->getLocale())}}" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>{{__('app.Back')}}</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>{{__('app.EDIT CATEGORY')}}</h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.categories.update',[app()->getLocale(),$category->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group form-float">
                            <label class="form-label">{{__('app.Category')}}</label>
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" value="{{$category->name}}">
                            </div>
                        </div>

                        @if(Storage::disk('public')->exists('category/thumb/'.$category->image))
                            <div class="form-group">
                                <img src="{{Storage::url('category/thumb/'.$category->image)}}" alt="{{$category->name}}" class="img-responsive img-rounded">
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="file" name="image">
                        </div>

                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">update</i>
                            <span>{{strtoupper(__('app.update'))}}</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')



@endpush
