@extends('frontend.layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('user.profile',$element) !!}
@endsection

@section('top')
    <section class="content top-null">
        <div class="container">
            @include('frontend.partials._divider-xs')
            <div class="filters-row">
                {{--@include('frontend.partials._divider-xs')--}}
                <div class="ui top attached button">
                    <h1>{{ trans('general.profile') }}</h1>
                </div>
                <hr>
                <div class="ui grid center">
                    <div class="seven wide center column">
                        <div class="ui items">
                            <div class="item">
                                <div class="ui small image">
                                    <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->avatar) }}">
                                </div>
                                <div class="content">
                                    <h3>{{ $element->name }}</h3>
                                    <div class="meta">
                                        <p>
                                            <span class="date">{{ trans('general.member_from')}} :</span>
                                            <span class="date">{{  $element->createdDate }}</span>
                                        </p>
                                        @if($element->is_email_visiable)
                                            <p>
                                                <span class="date">{{ trans('general.email')}} :</span>
                                                <span class="date">{{  $element->email }}</span>
                                            </p>
                                        @endif
                                        @if($element->is_mobile_visiable)
                                            <p>
                                                <span class="date">{{ trans('general.phone')}} :</span>
                                                <span class="date">{{  $element->phone }}</span>
                                            </p>
                                        @endif
                                        <p>
                                            <span class="date">{{ trans('general.country')}} :</span>
                                            <span class="date">{{  $element->countryName }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.category')}} :</span>
                                            <span class="date">{{  $element->category->name }}</span>
                                        </p>

                                    </div>
                                    <div class="description">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="col-lg-12">
                    @include('frontend.partials._divider-xs')
                    <div class="filters-row">
                        @include('frontend.partials.components._bar-pagination-filters')
                        {{--@include('frontend.partials._divider-xs')--}}
                        <div class="outer">
                            <div class="products-grid products-listing products-col products-isotope five-in-row">
                                {{--<div class="products-grid products-listing products-col products-isotope four-in-row row-view no-transition">--}}
                                {{--<div class="products-grid products-listing products-col products-isotope four-in-row row-view no-transition">--}}
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
