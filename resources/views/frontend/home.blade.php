@extends('frontend.layouts.app')

@section('content')
    <section class="content top-null">
        <div class="container">
            {{--<div class="col-lg-3 col-md-12 aside-column text-center commercial">--}}
                {{--@if(!$commercialsFixed->isEmpty())--}}
                    {{--@include('frontend.partials.components.home._commercial-ad',['commercials' => $commercialsFixed])--}}
                {{--@endif--}}
            {{--</div>--}}
            <div class="col-lg-12 col-md-12 aside-column text-center">
                @if(!$sliders->isEmpty())
                    @include('frontend.partials.components.home._slider-sm')
                @endif
            </div>
            {{--<div class="col-lg-3 col-md-12 aside-column text-center commercial">--}}
                {{--@if(!$commercialsNotFixed->isEmpty())--}}
                    {{--@include('frontend.partials.components.home._commercial-ad',['commercials' => $commercialsNotFixed])--}}
                {{--@endif--}}
            {{--</div>--}}
        </div>
    </section>
    @include('frontend.partials.components.home._icons_home_page')
    @include('frontend.partials.components._product_carousel',['elements' => $mostVisitedAds,'header' => trans('general.most_visited')])
    @include('frontend.partials.components._product_carousel',['elements' => $latestAds,'header' => trans('general.latest_ads')])
@endsection

