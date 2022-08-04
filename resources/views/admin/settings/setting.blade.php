@extends('backend.layouts.app')

@section('title', __('app.Settings'))

@push('styles')

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>
                        {{strtoupper(__('app.general settings'))}}
                        <a href="{{route('admin.profile',app()->getLocale())}}" class="btn waves-effect waves-light right headerightbtn">
                            <i class="material-icons left">person</i>
                            <span>{{strtoupper(__('app.Profile'))}}</span>
                        </a>
                    </h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.settings.store',app()->getLocale())}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">{{__('app.Site Title')}}</label>
                            <div class="form-line">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $settings->name or null }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">{{__('app.Email Address')}}</label>
                            <div class="form-line">
                                <input type="email" name="email" id="email" class="form-control" value="{{ $settings->email or null }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">{{__('app.Phone')}}</label>
                            <div class="form-line">
                                <input type="number" name="phone" id="phone" class="form-control" value="{{ $settings->phone or null }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="form-label">{{__('app.Address')}}</label>
                            <div class="form-line">
                                <input type="text" name="address" id="address" class="form-control" value="{{ $settings->address or null }}">
                            </div>
                            <small class="col-red font-italic">{{__('app.HTML Tag allowed')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="footer" class="form-label">{{__('app.Footer')}}</label>
                            <div class="form-line">
                                <input type="text" name="footer" id="footer" class="form-control" value="{{ $settings->footer or null }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="aboutus" class="form-label">{{__('app.About Us')}}</label>
                            <div class="form-line">
                                <textarea name="aboutus" rows="4" id="aboutus" class="form-control no-resize">{{ $settings->aboutus or null }}</textarea>
                            </div>
                        </div>

                        <h6>{{__('app.Social Links')}}</h6>
                        <div class="form-group">
                            <label for="facebook" class="form-label">{{__('app.Facebook Link')}}</label>
                            <div class="form-line">
                                <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $settings->facebook or null }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="twitter" class="form-label">{{__('app.Twitter Link')}}</label>
                            <div class="form-line">
                                <input type="text" name="twitter" id="twitter" class="form-control" value="{{ $settings->twitter or null }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">{{__('app.LinkedIn Link')}}</label>
                            <div class="form-line">
                                <input type="text" name="linkedin" class="form-control" value="{{ $settings->linkedin or null }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">save</i>
                            <span>{{strtoupper(__('app.Save'))}}</span>
                        </button>

                    </form>
                    
                </div>
            </div>
        </div>

    </div>

@endsection


@push('scripts')


@endpush
