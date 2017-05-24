@extends('frontend.layouts.app')

@section('top')
    <section class="content top-null">
        <div class="container">
            @include('frontend.partials.components._product_carousel',['elements' => $paidAds])
            @include('frontend.partials._divider-xs')
            <div class="filters-row">
                @include('frontend.partials.components._bar-pagination-filters')
                @include('frontend.partials._divider-xs')
                <div class="outer">
                    <div id="centerCol">
                        <!-- Modal -->
                        <div class="modal quick-view zoom" id="quickView" style="opacity: 1">
                            <div class="modal-dialog">
                                <div class="modal-content"></div>
                            </div>
                        </div>
                        <!-- /.modal -->
                        {{--<div class="products-grid products-listing products-col products-isotope four-in-row">--}}
                        <div class="products-grid products-listing products-col products-isotope four-in-row row-view no-transition">
                            @include('frontend.partials.components._product-widget-lg')
                        </div>
                    </div>
                </div>
                @include('frontend.partials.components._bar-pagination-filters')
            </div>
        </div>
    </section>
@endsection