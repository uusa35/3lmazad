@extends('frontend.layouts.app')

@section('content')
@section('top')
    <section class="content top-null">
        <div class="container">
            <div class="col-lg-12">
                <div class="col-md-3 aside-column">
                    @include('frontend.partials.components._commerical-ad')
                </div>
                <div class="col-md-6 aside-column">
                    @include('frontend.partials.components._slider-sm')
                </div>
                <div class="col-md-3 aside-column">
                    @include('frontend.partials.components._commerical-ad')
                </div>
            </div>
        </div>
    </section>
@show
@section('middle')
    @include('frontend.partials.components._icons')
    @include('frontend.partials.components._product_carousel')
    @include('frontend.partials.components._product_carousel')
    @include('frontend.partials.components._product_carousel')
@show
@section('bottom')
    <h1>from bottom</h1>
@show
@endsection
