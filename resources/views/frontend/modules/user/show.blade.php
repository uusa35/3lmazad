@extends('frontend.layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('user.show',$element) !!}
@endsection

@section('top')
    <section class="content">
        <div class="container">
            <div class="divider divider--xs"></div>
            <div class="filters-row">
                <h2 class="text-center">{{ trans('general.profile') }}</h2>
                <hr>
                {{--<div class="ui top attached button">--}}

                {{--</div>--}}
                <div class="ui grid center">
                    <div class="sixteen wide center column">
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
                                            <span class="date">{{ trans('general.area')}} :</span>
                                            <span class="date">{{  $element->areaName }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.account_type')}} :</span>
                                            <span class="date">{{  $element->isMerchant ? trans('general.merchant') : trans('general.user') }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.category')}} :</span>
                                            <span class="date">{{  $element->category->name }}</span>
                                        </p>
                                        <p>
                                            <span class="date">{{ trans('general.description')}} :</span>
                                        </p>
                                    </div>
                                    <div class="description">
                                        <p>{{ $element->description }}</p>
                                    </div>
                                    <div class="description col-lg-2 col-lg-push-10">
                                        <a href="{{ route('user.ads',$element->id) }}"
                                           class="btn btn--wd">{{ trans('general.user_ads') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="col-lg-12">
                    <div class="divider divider-xs"></div>
                    <div class="filters-row">
                        {{--@include('frontend.partials.components._bar-pagination-filters')--}}
                        <div class="outer">
                            <div class="products-grid products-listing products-col products-isotope five-in-row">
                                {{--<div class="products-grid products-listing products-col products-isotope four-in-row row-view no-transition">--}}
                                {{--<div class="products-grid products-listing products-col products-isotope four-in-row row-view no-transition">--}}
                                @if($element->isMerchant)
                                    <h3 class="text-center">{{ trans('general.user_gallery') }}</h3>
                                    @include('frontend.partials._profile-gallery')
                                @elseif($element->isUser)
                                    <h3 class="text-center">{{ trans('general.user_ads') }}</h3>
                                    @include('frontend.partials.components._product-widget-lg')
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($element->isUser)
                        @include('frontend.partials.components._bar-pagination-filters')
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
