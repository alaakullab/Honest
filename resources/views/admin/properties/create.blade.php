@extends('backend.layouts.app')

@section('title', 'Create Property')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.properties.store',app()->getLocale())}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>{{__('app.CREATE PROPERTY')}}</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <label class="form-label">{{__('app.Property Title')}}</label>
                        <div class="form-line">
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <label class="form-label">{{__('app.Price')}}</label>
                        <div class="form-line">
                            <input type="number" class="form-control" name="price" required>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <label class="form-label">{{__('app.bedroom')}}</label>
                        <div class="form-line">
                            <input type="number" class="form-control" name="bedroom" required>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <label class="form-label">{{__('app.bathroom')}}</label>
                        <div class="form-line">
                            <input type="number" class="form-control" name="bathroom" required>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <label class="form-label">{{__('app.City')}}</label>
                        <div class="form-line">
                            <input type="text" class="form-control" name="city" required>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <label class="form-label">{{__('app.Address')}}</label>
                        <div class="form-line">
                            <input type="text" class="form-control" name="address" required>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <label class="form-label">{{__('app.area')}}</label>
                        <div class="form-line">
                            <input type="number" class="form-control" name="area" required>
                        </div>
                        <div class="help-info">{{__('app.square meter')}}</div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="featured" name="featured" class="filled-in" value="1" />
                        <label for="featured">{{__('app.featured')}}</label>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="tinymce">{{__('app.Description')}}</label>
                        <textarea name="description" id="tinymce">{{old('description')}}</textarea>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="tinymce-nearby">{{__('app.Nearby')}}</label>
                        <textarea name="nearby" id="tinymce-nearby">{{old('nearby')}}</textarea>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>{{__('app.GALLERY IMAGE')}}</h2>
                </div>
                <div class="body">
                    <input id="input-id" type="file" name="gallaryimage[]" class="file" data-preview-file-type="text" multiple>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>{{__('app.SELECT')}}</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line {{$errors->has('purpose') ? 'focused error' : ''}}">
                            <label>{{__('app.Select Purpose')}}</label>
                            <select name="purpose" class="form-control show-tick">
                                <option value="">-- {{__('app.Please select')}} --</option>
                                <option value="sale">{{__('app.Sale')}}</option>
                                <option value="rent">{{__('app.Rent')}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line {{$errors->has('type') ? 'focused error' : ''}}">
                            <label>{{__('app.Select type')}}</label>
                            <select name="type" class="form-control show-tick">
                                <option value="">-- {{__('app.Please select')}} --</option>
                                <option value="house">{{__('app.House')}}</option>
                                <option value="apartment">{{__('app.Apartment')}}</option>
                                <option value="chalet">{{__('app.Chalet')}}</option>
                            </select>
                        </div>
                    </div>

                    <h5>{{__('app.Features')}}</h5>
                    <div class="form-group demo-checkbox">
                        @foreach($features as $feature)
                            <input type="checkbox" id="features-{{$feature->id}}" name="features[]" class="filled-in chk-col-indigo" value="{{$feature->id}}" />
                            <label for="features-{{$feature->id}}">{{$feature->name}}</label>
                        @endforeach
                    </div>

                    <div class="form-group form-float">
                        <label class="form-label">{{__('app.Video')}}</label>
                        <div class="form-line">
                            <input type="text" class="form-control" name="video">
                        </div>
                        <div class="help-info">{{__('app.Youtube Link')}}</div>
                    </div>

                    <div class="clearfix">
                        <h5>Google Map</h5>
                        <div class="form-group">
                            <label class="form-label">{{__('app.Latitude')}}</label>
                            <div class="form-line">
                                <input type="text" name="location_latitude" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="location_longitude" class="form-control" />
                                <label class="form-label">{{__('Longitude')}}</label>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="card">
                <div class="header bg-indigo">
                    <h2>{{__('FLOOR PLAN')}}</h2>
                </div>
                <div class="body">
                    <div class="form-group">
                        <input type="file" name="floor_plan">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header bg-indigo">
                    <h2>{{__('app.FEATURED IMAGE')}}</h2>
                </div>
                <div class="body">
                    <div class="form-group">
                        <input type="file" name="image">
                    </div>

                    {{-- BUTTON --}}
                    <a href="{{route('admin.properties.index',app()->getLocale())}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>{{__('app.BACK')}}</span>
                    </a>

                    <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                        <i class="material-icons">save</i>
                        <span>{{__('app.save')}}</span>
                    </button>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection


@push('scripts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>

    <script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{asset('backend/plugins/tinymce/tinymce.js')}}"></script>
    <script>
        $(function () {
            $("#input-id").fileinput();
        });

        $(function () {
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('backend/plugins/tinymce')}}';
        });

        $(function () {
            tinymce.init({
                selector: "textarea#tinymce-nearby",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: '',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('backend/plugins/tinymce')}}';
        });
    </script>

@endpush
