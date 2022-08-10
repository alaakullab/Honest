<footer class="page-footer indigo darken-2">
    <div class="container">
        <div class="row">
            <div class="col m4 s12">
                <h5 class="white-text uppercase">{{__('app.About Us')}}</h5>
                @if(isset($footersettings[0]) && $footersettings[0]['aboutus'])
                    <p class="grey-text text-lighten-4">{{ $footersettings[0]['aboutus'] }}</p>
                @else
                    <p class="grey-text text-lighten-4">{{__('app.Real estate company description goes here')}}</p>
                @endif
            </div>
            <div class="col m6 s12">
                <h5 class="white-text uppercase">{{__('app.Recent Properties')}}</h5>
                <ul class="collection border0">

                    @foreach($footerproperties as $property)
                    <li class="collection-item transparent clearfix p-0 border0">
                        <span class="card-image-bg m-r-10" style="background-image:url({{Storage::url('property/'.$property->image)}});width:60px;height:45px;float:left;"></span>
                        <div class="float-left">
                            <h5 class="font-18 m-b-0 m-t-5">
                                <a href="{{ route('property.show',[app()->getLocale(),$property->slug]) }}" class="white-text">{{ str_limit($property->title,40) }}</a>
                            </h5>
                            <p class="m-t-0 m-b-5 grey-text text-lighten-1">{{__('app.bedroom')}}: {{ $property->bedroom }} {{__('app.bathroom')}}: {{ $property->bathroom }} </p>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
            <div class="col m2 s12">

                <h5 class="white-text uppercase">{{__('app.Menu')}}</h5>
                <ul>

                    <li class="uppercase {{ Request::is('property*') ? 'underline' : '' }}">
                        <a href="{{ route('property',app()->getLocale()) }}" class="grey-text text-lighten-3">{{__('app.properties')}}</a>
                    </li>

                    <li class="uppercase {{ Request::is('agents*') ? 'underline' : '' }}">
                        <a href="{{ route('agents',app()->getLocale()) }}" class="grey-text text-lighten-3">{{__('app.agents')}}</a>
                    </li>

                    <li class="uppercase {{ Request::is('gallery*') ? 'underline' : '' }}">
                        <a href="{{ route('gallery',app()->getLocale()) }}" class="grey-text text-lighten-3">{{__('app.gallery')}}</a>
                    </li>

                    <li class="uppercase {{ Request::is('blog*') ? 'underline' : '' }}">
                        <a href="{{ route('blog',app()->getLocale()) }}" class="grey-text text-lighten-3">{{__('app.blog')}}</a>
                    </li>

                    <li class="uppercase {{ Request::is('contact') ? 'underline' : '' }}">
                        <a href="{{ route('contact',app()->getLocale()) }}" class="grey-text text-lighten-3">{{__('app.contact')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            @if(isset($footersettings[0]) && $footersettings[0]['footer'])
                {{ $footersettings[0]['footer'] }}
            @else
                © 2022 Honest.
            @endif

            @if(isset($footersettings[0]) && $footersettings[0]['facebook'])
                <a class="grey-text text-lighten-4 right" href="{{ $footersettings[0]['facebook'] }}" target="_blank"><i class="fa fa-twitter">facebook</i></a>
            @endif
            @if(isset($footersettings[0]) && $footersettings[0]['twitter'])
                <a class="grey-text text-lighten-4 right m-r-10" href="{{ $footersettings[0]['twitter'] }}" target="_blank"><i class="fa fa-twitter">twitter</i></a>
            @endif
            @if(isset($footersettings[0]) && $footersettings[0]['linkedin'])
                <a class="grey-text text-lighten-4 right m-r-10" href="{{ $footersettings[0]['linkedin'] }}" target="_blank"><i class="fa fa-linkedin">linkedin</i></a>
            @endif

        </div>
    </div>
</footer>