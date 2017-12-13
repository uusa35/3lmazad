@extends('frontend.layouts.app')


@section('breadcrumbs')
    {!! Breadcrumbs::render('ad.show', $element) !!}
@endsection

@section('content')
    <section class="content">
        <div class="container">
            <div class="product-info-outer">
                <div class="col-sm-4 col-md-4 col-lg-4 hidden-xs">
                    @include('frontend.partials.components.ad-show._ad-gallery')
                </div>
                <div class="product-info col-sm-8 col-md-5 col-lg-5">
                    <div class="product-info__title">
                        <h3>{{ $element->title }}</h3>
                    </div>
                    <hr>
                    <div class="product-info__sku pull-right">
                        {{ trans('general.id') }}: {{ $element->id }}&nbsp;&nbsp;
                    <span class="label {{ $element->featured ? 'label-info' : 'label-outlined' }}">
                        {{ trans('general.featured') }}
                    </span>
                    </div>
                    <ul id="singleGallery" class="visible-xs">
                        @if(!$element->gallery->first()->images->isEmpty())
                            @foreach($element->gallery->first()->images as $image)
                                <li><img src="{{ asset('storage/uploads/images/thumbnail/'.$image->image) }}"
                                         alt="{{ $element->title }} - {{ trans('general.app_name') }} - {{ trans('general.app_keywords') }} }}"/></li>
                            @endforeach
                        @endif
                        @if($element->booked)
                            <img src="{{ asset('images/booked.png') }}" alt=" {{ $element->title  }} - {{ trans('general.app_name') }} - {{ trans('general.app_keywords') }} }}">
                        @else
                            <li>
                                <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                                     alt="{{ $element->title }}  - {{ trans('general.app_name') }} - {{ trans('general.app_keywords') }} }}"/></li>
                        @endif
                    </ul>
                    <div class="price-box product-info__price"><span
                                class="price-box__new">{{ $element->price }} {{ trans('general.kd') }}</span>
                    </div>
                    {{--<div class="rating product-info__rating hidden-xs"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>--}}
                    <div class="divider divider--xs product-info__divider"></div>

                    @include('frontend.partials.components.ad-show.ad-info-ad-show')

                    <div class="divider divider--xs product-info__divider"></div>
                    <div class="product-info__description" style="min-height: 200px;">
                        <p class="text-justified">
                            {!! $element->meta->description !!}
                        </p>
                        @include('frontend.partials.components.ad-show._social-share-btns',['link' => route('ad.show',$element->id)])
                    </div>
                    <div class="divider divider--xs"></div>
                </div>
                @include('frontend.partials.components.ad-show.side-ad-show')
            </div>
        </div>
    </section>
    @if(!$paidAds->isEmpty() && count($paidAds) > 2)
        @include('frontend.partials.components._product_carousel',['elements' => $paidAds,'header' => trans('general.paid_ads')])
    @endif
    @include('frontend.partials.components.ad-show._ad-tabs')
@endsection