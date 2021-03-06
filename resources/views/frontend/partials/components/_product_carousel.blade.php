<section class="content">
    <div class="container">
        <div class="divider divider--xs product-info__divider"></div>
        <h1 class="text-center text-uppercase">{{ isset($header) ? $header : null }}
        </h1>
        @if(!$elements->isEmpty())
            <div class="product-category-carousel slick mobile-special-arrows animated-arrows">
                @foreach($elements as $element)
                    <div class="product-category hover-squared">
                        @if($element->featured)
                            {{-- admin has featured the company manullay--}}
                            <div class="product-preview__label product-preview__label--left product-preview__label--sale text-center featured">
                                <i class="thumbs outline up icon icon text-center white icon-tag"></i>
                            </div>
                        @endif
                        @if($element->hasValidPaidDeal)
                            {{-- has Valid Paid Deal --}}
                            <div class="product-preview__label product-preview__label--right product-preview__label--sale text-center paid">
                                <i class="star icon text-center white icon-tag"></i>
                            </div>
                        @endif
                        <a href="{{ route('ad.show',$element->id) }}">
                            <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                                 data-lazy="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                                 alt="{{ $element->title }} - {{ trans('general.app_name') }} - {{ trans("general.app_keywords") }}">
                        </a>
                        <div class="product-category__hover caption"></div>
                        <div class="product-category__info">
                            <div class="product-category__info__ribbon">
                                <span class="product-category__info__ribbon__title">
                                    {{ str_limit($element->title,20,'..') }}
                                </span>
                                <div class="product-category__info__ribbon__count">
                                    <a class="ui circular label">
                                        {{ $element->price }} {{ trans('general.kd') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info col-lg-12">{{ trans('message.no_preview') }}</div>
        @endif
    </div>
</section>