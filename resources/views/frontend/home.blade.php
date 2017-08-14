@extends('frontend.layouts.app')

@section('content')
    <section class="content top-null">
        <div class="container">
            <div class="col-lg-3 col-md-12 aside-column text-center commercial">
                @include('frontend.partials.components.home._commercial-ad',['commercials' => $commercialsFixed])
            </div>
            <div class="col-lg-6 col-md-12 aside-column text-center">
                @include('frontend.partials.components.home._slider-sm')
            </div>
            <div class="col-lg-3 col-md-12 aside-column text-center commercial">
                @include('frontend.partials.components.home._commercial-ad',['commercials' => $commercialsNotFixed])
            </div>
        </div>
    </section>
    @include('frontend.partials.components.home._icons_home_page')
    @include('frontend.partials.components._product_carousel',['elements' => $mostVisitedAds,'header' => trans('general.most_visited')])
    @include('frontend.partials.components._product_carousel',['elements' => $latestAds,'header' => trans('general.latest_ads')])
@endsection

