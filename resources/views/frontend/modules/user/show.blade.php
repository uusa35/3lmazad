@extends('frontend.layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('user.show',$element) !!}
@endsection

@section('content')
    <section class="content">
        <div class="container">
            <div class="divider divider--xs"></div>
            <div class="filters-row">
                @if($element->isUser)
                    <h2 class="text-center">{{ trans('general.user_profile') }}</h2>
                    <hr>
                    @include('frontend.partials.components.user-show._show_info_user')
                @elseif($element->isMerchant)
                    <h2 class="text-center">{{ trans('general.merchant_profile') }}</h2>
                    <hr>
                    @include('frontend.partials.components.user-show._show_info_merchant')
                @endif
                <div class="col-lg-12">
                    <div class="divider divider-xs"></div>
                    <div class="filters-row">
                        {{--@include('frontend.partials.components._bar-pagination-filters')--}}
                        <div class="outer">
                            <div class="products-grid products-listing products-col products-isotope four-in-row">
                                {{--<div class="products-grid products-listing products-col products-isotope four-in-row row-view no-transition">--}}
                                {{--<div class="products-grid products-listing products-col products-isotope four-in-row row-view no-transition">--}}
                                @if($element->isMerchant && !$element->menus->isEmpty() && !$element->menus->first()->services->isEmpty())
                                    <h3 class="text-center">{{ trans('general.menu_list') }}</h3>
                                    <hr>
                                    @include('frontend.partials._menu')
                                @endif
                                @if($element->isMerchant && !$element->gallery->first()->images->isEmpty())
                                    <h3 class="text-center">{{ trans('general.user_gallery') }}</h3>
                                    <hr>
                                    @include('frontend.partials._profile-gallery')
                                @endif
                                <h3 class="text-center">{{ trans('general.user_ads') }}</h3>
                                <hr>
                                @include('frontend.partials.components._product-widget-lg')
                            </div>
                        </div>
                    </div>
                    @include('frontend.partials.components._bar-pagination-filters')
                </div>
            </div>
        </div>
    </section>
@endsection
