@if($elements->count() > 0)
    @foreach($elements as $element)
        <div class="product-preview-wrapper">
            <div class="product-preview">
                <div class="product-preview__image">
                    <a href="{{ route('ad.show',$element->id) }}">
                        <img style="max-height: 300px;"
                             src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                             alt="{{ $element->title }}"/>
                    </a>
                    @if($element->featured)
                        <div class="product-preview__label product-preview__label--left product-preview__label--new featured">
                            <i class="thumbs outline up icon icon text-center white icon-tag"></i>
                        </div>
                    @endif
                    @if($element->hasValidPaidDeal)
                        <div class="product-preview__label product-preview__label--right product-preview__label--sale paid">
                            <i class="star icon text-center white icon-tag"></i>
                        </div>
                    @endif
                </div>
                <div class="product-preview__info">
                    <div class="product-preview__info__btns">
                        {{--<a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a>--}}
                        @if(auth()->check() && isset($userFavorites))
                            <button id="favorite-{{ $element->id }}"
                                    data-ad-id="{{ $element->id }}"
                                    data-user-id="{{ auth()->user()->id }}"
                                    data-content="this is a test"
                                    class="btn btn--round btn-white toottip-message">
                                <i id="favorite-icon-{{ $element->id }}"
                                   class="icon {{ in_array($element->id,$userFavorites,true) ? 'heart red' : 'outline heart red' }}"></i>
                            </button>
                        @elseif(!auth()->check())
                            <a class="btn btn--round btn-white" href="{{ route('register') }}">
                                <i class="icon outline heart" style="color: red;"></i>
                            </a>
                        @endif
                        <button class="btn btn--round btn--dark triggerModal"
                                data-title="{{ $element->title }}"
                                data-ad-url="{{ route('ad.show',$element->id) }}"
                                data-price="{{ $element->price }}"
                                data-description="{{ $element->meta->description }}"
                                data-image="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                                data-category="{{ $element->categoryName }}"
                                data-from-date="{{ $element->fromDate }}"
                                data-element="{{ $element }}"
                        >
                            <span class="icon icon-eye"></span>
                        </button>
                    </div>
                    <div class="product-preview__info__title text-center">
                        <h4><a href="{{ route('ad.show',$element->id) }}">{{ str_limit($element->title,'25') }}</a></h4>
                    </div>
                    <div class="price-box text-center">
                        <span class="price-box__new">{{ $element->price }} {{ trans('general.kd') }}</span>
                    </div>
                    <div class="product-preview__info__description">
                        <p>{{ str_limit($element->meta->description,'500','..more') }}</p>

                        <div class="product-preview__info__link hidden-xs">
                            <div class="ui small basic icon buttons hidden-xs">
                                @if(!is_null($element->brand))
                                    <button class="ui button"><i class="file icon"></i> {{ $element->brandName }}
                                    </button>
                                @endif
                                @if(!is_null($element->meta->mileage))
                                    <button class="ui button"><i
                                                class="save icon"></i> {{ $element->meta->mileage }} {{ trans("general.km") }}
                                    </button>
                                @endif
                                <button class="ui button"><i class="upload icon"></i> manufacturing year</button>
                                <button class="ui button"><i class="download icon"></i> test</button>
                            </div>
                            <div class="ui buttons">
                                <button class="ui white basic button"><i
                                            class="icon calendar"></i>{{  $element->fromDate }}
                                </button>
                                <button class="ui white basic button"><i
                                            class="icon arrow-right"></i>{{  $element->categoryName }}</button>
                                <button class="ui white basic button"><i
                                            class="icon calendar"></i>{{  $element->created_at->diffForHumans() }}
                                </button>
                                <button class="ui white basic button"><i
                                            class="icon calendar"></i>{{  $element->created_at->diffForHumans() }}
                                </button>
                            </div>
                        </div>
                    </div>
                    {{--<div class="product-preview__info__link"><a href="#" class="compare-link"><span--}}
                    {{--class="icon icon-bars"></span><span--}}
                    {{--class="product-preview__info__link__text">Add to compare</span></a> <a href="#"><span--}}
                    {{--class="icon icon-favorite"></span><span class="product-preview__info__link__text">Add to wishlist</span></a><a--}}
                    {{--href="#" class="btn btn--wd buy-link"><span class="icon icon-ecommerce"></span><span--}}
                    {{--class="product-preview__info__link__text">Add to cart</span></a></div>--}}
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="col-lg-12">
        <div class="alert alert-info">
            {{ trans('general.no_ads') }}
        </div>
    </div>
@endif