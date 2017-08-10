@extends('frontend.layouts.app')


@section('top')
        <!-- Contact page body start -->
<div class="contact-page-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!--maps-area start-->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Map area -->
                        <div class="map-area">
                            <div id="latitude" class="hidden">{{ $element->latitude }}</div>
                            <div id="longitude" class="hidden">{{ $element->longitude }}</div>
                            <div id="googleMap" style="width:100%;height:410px;"></div>
                        </div><!-- End Map area -->
                    </div>
                </div>
                <!--maps-area end-->
                <div class="divider divider--md"></div>
                <!--contact-body-area start-->
                <div class="row">
                    <!-- contact info -->
                    <div class="col-lg-3 col-xs-12 col-sm-12">
                        <h3>{{ title_case('contactus information') }}</h3>
                        <p>
                            @if(!is_null(trim($element->address)))
                                <span class="glyphicon glyphicon-home"></span> {{ $element->address }}<br/>
                            @endif
                            @if(trim($element->phone))
                                <span class="glyphicon glyphicon-earphone"></span> {{ $element->phone }}<br/>
                            @endif
                            @if(trim($element->mobile))
                                <span class="glyphicon glyphicon-phone"></span> {{ $element->mobile }}<br/>
                            @endif
                            @if($element->email)
                                <span class="glyphicon glyphicon-inbox"></span>
                                <a href="mailto:{{ $element->email }}"> {{ $element->email }}</a> <br/>
                            @endif
                            @if(trim($element->twitter_url))
                                <span class="glyphicon glyphicon-globe"></span>
                                <a href="{{ $element->twitter_url }}">{{ trans('general.twitter') }}</a>
                                <br/>
                            @endif
                            @if(trim($element->instagram_url))
                                <span class="glyphicon glyphicon-globe"></span>
                                <a href="{{ $element->instagram_url }}"> {{ $element->instagram_url }}</a>
                                <br/>
                            @endif
                            @if(trim($element->youtube_channel))
                                <span class="glyphicon glyphicon-globe"></span>
                                <span><a href="{{ $element->youtube_channel }}">
                                        {{ $element->youtube_channel }}
                                    </a>
                        </span>
                            @endif
                        </p>
                    </div>
                    {{--contact us form--}}
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="contact-form">
                            <h3><i class="fa fa-envelope-o"></i> Contact us</h3>

                            {!! Form::open(['url' => '/contactus', 'method' => 'post','class'=>'form-vertical']) !!}
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <label class="control-label" for="name">name</label>
                                    {!! Form::text('name', null, ['class' => 'form-control','placeholder'=> 'name', 'required']) !!}
                                </div>
                                <div class="col-lg-4">
                                    <label class="control-label" for="email">email</label>
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=> 'email', 'required' ]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <label class="control-label" for="subject">subject</label>
                                    {!! Form::text('subject', null, ['class' => 'form-control','placeholder'=> 'subject', 'required' ]) !!}
                                </div>
                                <div class="col-lg-4">
                                    <label class="control-label" for="phone">phone</label>
                                    {!! Form::text('phone', null, ['class' => 'form-control','placeholder'=> 'phone', 'required' ]) !!}
                                </div>
                                {{--<div class="col-lg-4">--}}
                                    {{--<label class="col-lg-12 control-label"--}}
                                           {{--for="country">{{ trans('general.country') }}</label>--}}
                                    {{--{{ Form::select('country', $countries, ['class' => 'form-control','required' ]) }}--}}
                                {{--</div>--}}
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label class="control-label" for="content">content</label>
                                    {!! Form::textarea('content', null, ['class'=>'form-control','cols'=>30,'rows'=>5,'placeholder'=> trans('general.content') , 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-9"></div>
                                <div class="col-lg-3">
                                    <label class="control-label" for="submit"></label>
                                    <input type="submit" class="btn btn--wd form-control"
                                           value="send"/>
                                    <label class="control-label" for="submit"></label>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
                <!--contact-body-area end-->
            </div>
        </div>
    </div>
</div>
<!-- Contact page body end -->

@endsection

@section('scripts')
@parent
        <!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU"></script>
<script>
    var latitude = document.getElementById('latitude').innerHTML;
    var longitude = document.getElementById('longitude').innerHTML;
    function initialize() {
        var mapOptions = {
            zoom: 15,
            scrollwheel: false,
            center: new google.maps.LatLng(latitude, longitude)
        };

        var map = new google.maps.Map(document.getElementById('googleMap'),
                mapOptions);


        var marker = new google.maps.Marker({
            position: map.getCenter(),
            animation: google.maps.Animation.BOUNCE,
            icon: '/img/logo/map-marker.png',
            map: map
        });

    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

@endsection
