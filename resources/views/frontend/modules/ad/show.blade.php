@extends('frontend.layouts.app')

@section('top')
        <!-- Content section -->
<section class="content">
    <div class="container">
        <div class="row product-info-outer">
            <div class="col-sm-4 col-md-4 col-lg-4 hidden-xs">
            @include('frontend.partials._ad-gallery')
                </div>
            <div class="product-info col-sm-8 col-md-5 col-lg-5">
                <div class="product-info__title">
                    <h2>{{ $element->title }}</h2>
                    <div class="rating product-info__rating visible-xs"><span class="icon-star"></span><span
                                class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span>
                    </div>
                </div>
                <div class="product-info__sku pull-right">{{ trans('general.id') }}: {{ $element->id }}&nbsp;&nbsp;<span
                            class="label {{ $element->featured ? 'label-info' : 'label-default' }}">{{ trans('general.featured') }}</span>
                </div>
                <ul id="singleGallery" class="visible-xs">
                    <li><img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                             alt="{{ $element->title }}"/></li>
                    <li><img src="images/products/product-big-2.jpg" alt=""/></li>
                    <li><img src="images/products/product-big-3.jpg" alt=""/></li>
                    <li><img src="images/products/product-big-4.jpg" alt=""/></li>
                    <li><img src="images/products/product-big-5.jpg" alt=""/></li>
                </ul>
                <div class="price-box product-info__price"><span
                            class="price-box__new">{{ $element->price }} {{ trans('general.kd') }}</span></div>
                {{--<div class="rating product-info__rating hidden-xs"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>--}}
                <div class="divider divider--xs product-info__divider"></div>
                <div class="product-info__description" style="min-height: 200px;">
                    <p>
                        {{ $element->meta->description }}
                    </p>
                    <div class="social-links social-links--colorize social-links--invert social-links--padding pull-right">
                        <ul>
                            <li class="social-links__item"><a class="icon icon-facebook tooltip-link" href="#"
                                                              data-placement="top" data-toggle="tooltip"
                                                              data-original-title="Share on facebook"></a></li>
                            <li class="social-links__item"><a class="icon icon-twitter tooltip-link" href="#"
                                                              data-placement="top" data-toggle="tooltip"
                                                              data-original-title="Share on twitter"></a></li>
                            <li class="social-links__item"><a class="icon icon-google tooltip-link" href="#"
                                                              data-placement="top" data-toggle="tooltip"
                                                              data-original-title="Share on google"></a></li>
                            <li class="social-links__item"><a class="icon icon-pinterest tooltip-link" href="#"
                                                              data-placement="top" data-toggle="tooltip"
                                                              data-original-title="Share on pinterest"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="divider divider--xs product-info__divider"></div>
                <div class="ui buttons">
                    <button class="ui white basic button"><i class="icon calendar"></i>{{  $element->fromDate }}
                    </button>
                    <button class="ui white basic button"><i
                                class="icon {{ $element->category->icon }}"></i>{{  $element->categoryName }}</button>
                    <button class="ui white basic button"><i
                                class="icon calendar"></i>{{  $element->created_at->diffForHumans() }}</button>
                </div>
                <div class="ui small basic icon buttons hidden-xs">
                    @if(!is_null($element->brandName))
                        <button class="ui button"><img class="ui avatar image"  style="width: 10px; height: auto;" src="{{ asset('storage/uploads/images/thumbnail/'.$element->brand->image) }}" /> {{ $element->brandName }}</button>
                    @endif
                    @if(!is_null($element->meta->mileage))
                        <button class="ui button"><i
                                    class="save icon"></i> {{ $element->meta->mileage }} {{ trans("general.km") }}
                        </button>
                    @endif
                    <button class="ui button"><i class="upload icon"></i> {{ $element->manufacturing_year }} </button>
                    <button class="ui button"><i class="download icon"></i> {{ $element->type->name }}</button>
                    <button class="ui button"><i class="download icon"></i> {{ $element->brand->name }}</button>
                    <button class="ui button"><i class="download icon"></i> {{ $element->model->name }}</button>
                </div>

                <div class="divider divider--xs"></div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <h4>CUSTOM HTML BLOCK</h4>
                <div class="card">
                    <div class="card__row"> You can add your content here, like promotions or some additional info</div>
                    <a href="#" class="card__row card__row--icon">
                        <div class="card__row--icon__icon"><span class="icon icon-shop-label"></span></div>
                        <div class="card__row--icon__text">
                            <div class="card__row__title">Special offer: 1+1=3</div>
                            Get a gift!
                        </div>
                    </a> <a href="#" class="card__row card__row--icon">
                        <div class="card__row--icon__icon"><span class="icon icon-money"></span></div>
                        <div class="card__row--icon__text">
                            <div class="card__row__title">Free Reward Card</div>
                            Worth $10, $50, $100. <br>
                        </div>
                    </a> <a href="#" class="card__row card__row--icon">
                        <div class="card__row--icon__icon"><span class="icon icon-identification-alt"></span></div>
                        <div class="card__row--icon__text">
                            <div class="card__row__title">Join to our Club</div>
                        </div>
                    </a> <a class="card__row card__row--icon">
                        <div class="card__row--icon__icon"><span class="icon icon-truck"></span></div>
                        <div class="card__row--icon__text">
                            <div class="card__row__title">Free shipping</div>
                        </div>
                    </a></div>
            </div>
        </div>
    </div>
</section>
<!-- End Content section -->
@endsection