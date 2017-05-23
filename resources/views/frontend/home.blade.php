@extends('frontend.layouts.app')

@section('content')
@section('top')
    <section class="content top-null">
        <div class="container">
            <div class="col-lg-12">
                <div class="col-lg-3 col-md-12 aside-column text-center">
                    @include('frontend.partials.components._commerical-ad',['fixed' => $commercialsFixed,'notFixed' => $commercialsNotFixed,'index' => 0])
                </div>
                <div class="col-lg-6 col-md-12 aside-column text-center">
                    @include('frontend.partials.components._slider-sm')
                </div>
                <div class="col-lg-3 col-md-12 aside-column text-center">
                    @include('frontend.partials.components._commerical-ad',['fixed' => $commercialsFixed,'notFixed' => $commercialsNotFixed,'index' => 1])
                </div>
            </div>
        </div>
    </section>
@show
@section('middle')
    @include('frontend.partials.components._icons_home_page')
    @include('frontend.partials.components._product_carousel',['elements' => $mostVisitedAds,'header' => trans('general.most_visited')])
    @include('frontend.partials.components._product_carousel',['elements' => $mostVisitedAds,'header' => trans('general.latest_ads')])
    @include('frontend.partials.components._product_carousel',['elements' => $mostVisitedAds,'header' => trans('general.most_visited')])
@show
@section('bottom')
    <div class="col-lg-12">
        {{--<h1>from bottom</h1>--}}
    </div>
@show
@endsection
