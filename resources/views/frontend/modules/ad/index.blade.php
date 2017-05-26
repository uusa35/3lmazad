@extends('frontend.layouts.app')

@section('top')
    <section class="content top-null">
        <div class="container">
            @if(isset($paidAds))
                @include('frontend.partials.components._product_carousel',['elements' => $paidAds,'header' => trans('general.paid_ads')])
            @endif
            @include('frontend.partials._divider-xs')
            <div class="filters-row">
                @include('frontend.partials.components._bar-pagination-filters')
                {{--@include('frontend.partials._divider-xs')--}}
                <div class="outer">
                    <div class="products-grid products-listing products-col products-isotope four-in-row">
                        {{--<div class="products-grid products-listing products-col products-isotope four-in-row row-view no-transition">--}}
                        @include('frontend.partials.components._product-widget-lg')
                    </div>
                </div>
                @include('frontend.partials.components._bar-pagination-filters')
            </div>
        </div>
        @include('frontend.partials.components.modals._quick-view')
    </section>
@endsection