@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">

                <div class="col s12 m4 card">

                    <h2 class="sidebar-title">{{__('app.search property')}}</h2>

                    <form class="sidebar-search" action="{{ route('search',app()->getLocale())}}" method="GET">

                        <div class="searchbar">
                            <div class="input-field col s12">
                                <input type="text" name="city" id="autocomplete-input-sidebar" class="autocomplete custominputbox" autocomplete="off">
                                <label for="autocomplete-input-sidebar">{{__('app.enter city or state')}}</label>
                            </div>
    
                            <div class="input-field col s12">
                                <select name="type" class="browser-default">
                                    <option value="" disabled selected>{{__('app.choose type')}}</option>
                                    <option value="apartment">Apartment</option>
                                    <option value="house">House</option>
                                    <option value="chalet">Chalet</option>
                                </select>
                            </div>
    
                            <div class="input-field col s12">
                                <select name="purpose" class="browser-default">
                                    <option value="" disabled selected>{{__('app.choose purpose')}}</option>
                                    <option value="rent">Rent</option>
                                    <option value="sale">Sale</option>
                                </select>
                            </div>
    
                            <div class="input-field col s12">
                                <select name="bedroom" class="browser-default">
                                    <option value="" disabled selected>{{__('app.choose bedroom')}}</option>
                                    @foreach($bedroomdistinct as $bedroom)
                                        <option value="{{$bedroom->bedroom}}">{{$bedroom->bedroom}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-field col s12">
                                <select name="bathroom" class="browser-default">
                                    <option value="" disabled selected>{{__('app.choose bathroom')}} </option>
                                    @foreach($bathroomdistinct as $bathroom)
                                        <option value="{{$bathroom->bathroom}}">{{$bathroom->bathroom}}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="minprice" id="minprice" class="custominputbox">
                                <label for="minprice">{{__('app.min price')}}</label>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="maxprice" id="maxprice" class="custominputbox">
                                <label for="maxprice">{{__('app.max price')}}</label>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="minarea" id="minarea" class="custominputbox">
                                <label for="minarea">{{__('app.floor min area')}}</label>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="maxarea" id="maxarea" class="custominputbox">
                                <label for="maxarea">{{__('app.floor max area')}}</label>
                            </div>
                            
                            <div class="input-field col s12">
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" name="featured">
                                        <span class="lever"></span>
                                        {{__('app.featured')}}
                                    </label>
                                </div>
                            </div>
                            <div class="input-field col s12">
                                <button class="btn btnsearch indigo" type="submit">
                                    <i class="material-icons left">search</i>
                                    <span>{{__('app.search')}}</span>
                                </button>
                            </div>
                        </div>
    
                    </form>

                </div>

                <div class="col s12 m8">

                    @foreach($properties as $property)
                        <div class="card horizontal">
                            <div>
                                <div class="card-content property-content">
                                    @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                                        <div class="card-image blog-content-image">
                                            <img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}">
                                        </div>
                                    @endif
                                    <span class="card-title search-title" title="{{$property->title}}">
                                        <a href="{{ route('property.show',[app()->getLocale(),$property->slug]) }}">{{ $property->title }}</a>
                                    </span>
                                    
                                    <div class="address">
                                        <i class="small material-icons left">location_city</i>
                                        <span>{{ ucfirst($property->city) }}</span>
                                    </div>
                                    <div class="address">
                                        <i class="small material-icons left">place</i>
                                        <span>{{ ucfirst($property->address) }}</span>
                                    </div>

                                    <h5>
                                        &dollar;{{ $property->price }}
                                        <small class="right">{{ $property->type }} {{__('app.for')}} {{ $property->purpose }}</small>
                                    </h5>

                                </div>
                                <div class="card-action property-action clearfix right">
                                    <span class="btn-flat">
                                        <i class="material-icons">check_box</i>
                                        {{__('app.bedroom')}}: <strong>{{ $property->bedroom}}</strong>
                                    </span>
                                    <span class="btn-flat">
                                        <i class="material-icons">check_box</i>
                                        {{__('app.bathroom')}}: <strong>{{ $property->bathroom}}</strong>
                                    </span>
                                    <span class="btn-flat">
                                        <i class="material-icons">check_box</i>
                                        {{__('app.area')}}: <strong>{{ $property->area}}</strong> {{__('app.square meter')}}
                                    </span>
                                    <span class="btn-flat">
                                        <i class="material-icons">comment</i>
                                        {{ $property->comments_count}}
                                    </span>

                                    @if($property->featured == 1)
                                        <span class="right featured-stars">
                                            <i class="material-icons">stars</i>
                                        </span>
                                    @endif                                    

                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="m-t-30 m-b-60 center">
                        {{ 
                            $properties->appends([
                                'city'      => Request::get('city'),
                                'type'      => Request::get('type'),
                                'purpose'   => Request::get('purpose'),
                                'bedroom'   => Request::get('bedroom'),
                                'bathroom'  => Request::get('bathroom'),
                                'minprice'  => Request::get('minprice'),
                                'maxprice'  => Request::get('maxprice'),
                                'minarea'   => Request::get('minarea'),
                                'maxarea'   => Request::get('maxarea'),
                                'featured'  => Request::get('featured')
                            ])->links() 
                        }}
                    </div>
        
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection