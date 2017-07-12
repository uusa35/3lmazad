@extends('frontend.layouts.app')


@section('breadcrumbs')
    {!! Breadcrumbs::render('user.index') !!}
@endsection

@section('top')
    <section class="content top-null">
        <div class="container">
            <div class="filters-row">
                @include('frontend.partials.components._bar-pagination-filters')
                {{--@include('frontend.partials._divider-xs')--}}
                <div class="outer">
                    <div class="products-grid products-listing products-col products-isotope four-in-row">
                        {{--<div class="products-grid products-listing products-col products-isotope four-in-row row-view no-transition">--}}
                        @foreach($elements as $element)
                            @include('frontend.partials.user-widget')
                        @endforeach
                    </div>
                </div>
                @include('frontend.partials.components._bar-pagination-filters')
            </div>
        </div>
        @include('frontend.partials.components.modals._quick-view')
    </section>
@endsection
