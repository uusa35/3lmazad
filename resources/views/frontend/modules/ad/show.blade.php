@extends('frontend.layouts.app')


@section('breadcrumbs')
{!! Breadcrumbs::render('ad.show', $element) !!}
@endsection

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
                            class="label {{ $element->featured ? 'label-info' : 'label-outlined' }}">{{ trans('general.featured') }}</span>
                </div>
                <ul id="singleGallery" class="visible-xs" style="border: 1px solid blue;">
                    <li>
                        <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                             alt="{{ $element->title }}"/></li>
                    @foreach($element->gallery->first()->images as $image)
                        <li><img src="{{ asset('storage/uploads/images/thumbnail/'.$image->thumb) }}"
                                 alt="{{ $element->title }}"/></li>
                    @endforeach
                </ul>
                <div class="price-box product-info__price"><span
                            class="price-box__new">{{ $element->price }} {{ trans('general.kd') }}</span></div>
                {{--<div class="rating product-info__rating hidden-xs"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>--}}
                <div class="divider divider--xs product-info__divider"></div>
                <div class="product-info__description" style="min-height: 200px;">
                    <p>
                        {{ $element->meta->description }}
                    </p>
                    @include('frontend.partials.components._social-share-btns',['link' => route('ad.show',$element->id)])
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
                        <button class="ui button"><img class="ui avatar image" style="width: 10px; height: auto;"
                                                       src="{{ asset('storage/uploads/images/thumbnail/'.$element->brand->image) }}"/> {{ $element->brandName }}
                        </button>
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
@include('frontend.partials._ad-tabs')
@endsection