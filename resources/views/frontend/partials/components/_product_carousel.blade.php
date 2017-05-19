<section class="content">
    <div class="container">
        <h2 class="text-center text-uppercase">{{ $header }}</h2>
        <div class="product-category-carousel mobile-special-arrows animated-arrows slick">
            @if(!$elements->isEmpty())
                @foreach($elements as $element)
                    <div class="product-category hover-squared">
                        @if($element->featured)
                            <div class="product-preview__label product-preview__label--right product-preview__label--sale text-center">
                                <span class="mdi mdi-star text-center" style="color : gold;"></span></div>
                        @endif
                        <a href="{{ route('ad.show',$element->id) }}">
                            <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                                 data-lazy="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                                 alt="{{ $element->title }}">
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
            @else
                <div class="alert alert-info">{{ trans('messages.no_preview') }}</div>
            @endif
        </div>
    </div>
</section>