@extends('frontend.layouts.app')


@section('breadcrumbs')
    {!! Breadcrumbs::render('favorite') !!}
@endsection

@section('content')
    <section class="content top-null">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="divider divider--xs product-info__divider"></div>
                    <div class="filters-row">
                        @include('frontend.partials.components._bar-pagination-filters')
                        <div class="outer">
                            <div class="products-grid products-listing products-col products-isotope four-in-row">
                                {{--<div class="products-grid products-listing products-col products-isotope four-in-row row-view no-transition">--}}
                                @include('frontend.partials.components._product-widget-lg')
                            </div>
                        </div>
                        @include('frontend.partials.components._bar-pagination-filters')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection