@extends('backend.layouts.app')

@section('title', 'Create Feature')

@push('styles')

    
@endpush


@section('content')

    <div class="block-header">
        <a href="{{route('admin.features.index',app()->getLocale())}}" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>{{__('app.Back')}}</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>{{__('app.CREATE FEATURE')}}</h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.features.store',app()->getLocale())}}" method="POST">
                        @csrf

                        <div class="form-group form-float">
                            <label class="form-label">{{__('app.Feature')}}</label>
                            <div class="form-line">
                                <input type="text" name="name" class="form-control">
                            </div>
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
