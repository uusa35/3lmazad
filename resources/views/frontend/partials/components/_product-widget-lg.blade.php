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
                    <div class="product-preview__label product-preview__label--left product-preview__label--new">
                        <span>new</span>
                    </div>
                @endif
                @if($element->hasValidDeal)
                    <div class="product-preview__label product-preview__label--right product-preview__label--sale">
                        <span>sale<br>-10%
                        </span>
                    </div>
                @endif
            </div>
            <div class="product-preview__info">
                <div class="product-preview__info__btns">
                    <a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a>
                    <button id="favorite-{{ $element->id }}"
                       data-ad-id="{{ $element->id }}"
                       data-user-id="{{ auth()->user()->id }}"
                       class="btn btn--round {{ in_array($element->id,$userFavorites,true) ? 'btn-red' : 'btn-light-red' }}">
                        <i class="icon {{ in_array($element->id,$userFavorites,true) ? 'heart' : 'empty heart' }}"></i>
                    </button>
                    <button class="btn btn--round btn--dark triggerModal"
                            data-title="{{ $element->title }}"
                            data-ad-url="{{ route('ad.show',$element->id) }}"
                            data-price="{{ $element->price }}"
                            data-description="{{ $element->meta->description }}"
                            data-image="{{ $element->image }}"
                            data-category="{{ $element->categoryName }}"
                            data-from-date="{{ $element->fromDate }}"
                            data-element="{{ $element }}"
                    >
                        <span class="icon icon-eye"></span>
                    </button>
                </div>
                <div class="product-preview__info__title">
                    <h3><a href="#">{{ str_limit($element->title,'30') }}</a></h3>
                </div>
                @if(is_null($element->color->code))
                    <ul class="options-swatch options-swatch--color">
                        <li><a href="#"><span class="swatch-label"><img
                                            src="http://placehold.it/100x100/{{ $element->color->code }}" width="10"
                                            height="10"
                                            alt=""/></span></a></li>
                    </ul>
                @endif
                <div class="price-box ">
                    <span class="price-box__new">{{ $element->price }} {{ trans('general.kd') }}</span>
                </div>
                <div class="product-preview__info__description">
                    <p>{{ str_limit($element->meta->description,'500','..more') }}</p>

                    <div class="product-preview__info__link hidden-xs">
                        <div class="ui small basic icon buttons hidden-xs">
                            @if(!is_null($element->brandName))
                                <button class="ui button"><i class="file icon"></i> {{ $element->brandName }}</button>
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
                            <button class="ui white basic button"><i class="icon calendar"></i>{{  $element->fromDate }}
                            </button>
                            <button class="ui white basic button"><i
                                        class="icon arrow-right"></i>{{  $element->categoryName }}</button>
                            <button class="ui white basic button"><i
                                        class="icon calendar"></i>{{  $element->created_at->diffForHumans() }}</button>
                            <button class="ui white basic button"><i
                                        class="icon calendar"></i>{{  $element->created_at->diffForHumans() }}</button>
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