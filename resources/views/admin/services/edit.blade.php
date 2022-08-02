@extends('backend.layouts.app')

@section('title', 'Edit Testimonial')

@push('styles')

    
@endpush


@section('content')

    <div class="block-header">
        <a href="{{route('admin.services.index',app()->getLocale())}}" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>{{__('app.Back')}}</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>{{__('app.EDIT SERVICE')}}</h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.services.update',[app()->getLocale(),$service->id])}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group form-float">
                            <label class="form-label">{{__('app.Service Title')}}</label>
                            <div class="form-line">
                                    <input type="text" name="title" class="form-control" value="{{ $service->title }}">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label class="form-label">{{__('app.Description')}}</label>
                                <div class="form-line">
                                    <textarea name="description" rows="4" class="form-control no-resize">{{ $service->description }}</textarea>
                                </div>
                            </div>
    
                            <div class="form-group form-float">
                                <label class="form-label">{{__('app.Service Order Number')}}</label>
                                <div class="form-line">
                                    <input type="text" name="icon" class="form-control" value="{{ $service->icon }}">
                                </div>
                                <small>{{__('app.To get icons name list just click the link: ')}}<a href="https://materializecss.com/icons.html" target="_blank">Materialize Icon</a></small>
                            </div>
    
                            <div class="form-group form-float">
                                <label class="form-label">{{__('app.Service Order Number')}}</label>
                                <div class="form-line">
                                    <input type="number" name="service_order" class="form-control" min="1" value="{{ $service->service_order }}">
                                </div>
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
