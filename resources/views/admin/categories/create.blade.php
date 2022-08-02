@extends('backend.layouts.app')

@section('title', 'Create Categories')

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
                    <h2>{{__('app.CREATE CATEGORY')}}</h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.categories.store',app()->getLocale())}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group form-float">
                            <label class="form-label">{{__('app.Category')}}</label>
                            <div class="form-line">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="file" name="image">
                        </div>

                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">save</i>
                            <span>{{__('app.Save')}}</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')



@endpush
