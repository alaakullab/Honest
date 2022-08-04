@extends('backend.layouts.app')

@section('title', __('app.change password'))

@push('styles')

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>{{strtoupper(__('app.change password'))}}</h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.changepassword',app()->getLocale())}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="currentpassword" class="form-label">{{__('app.Current Password')}}</label>
                            <div class="form-line">
                                <input type="password" name="currentpassword" id="currentpassword" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="newpassword" class="form-label">{{__('app.New Password')}}</label>
                            <div class="form-line">
                                <input type="password" name="newpassword" id="newpassword" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="newpassword_confirmation" class="form-label">{{__('app.Confirm New Password')}}</label>
                            <div class="form-line">
                                <input type="password" name="newpassword_confirmation" id="newpassword_confirmation" class="form-control">
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
