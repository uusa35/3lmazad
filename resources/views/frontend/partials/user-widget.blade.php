<div class="product-preview-wrapper">
    <div class="product-preview">
        <div class="product-preview__image">
            <div class="product-preview__label product-preview__label--right product-preview__label--sale text-center">
                <span class="fa fa-star fa-lg text-center"></span></div>
            <a href="{{ route('user.show',$element->id) }}"><img
                        src="{{ asset('storage/uploads/images/thumbnail/'.$element->avatar) }}"
                        alt=""/></a></div>
        <div class="product-preview__info text-center">
            <div class="product-preview__info__btns">
                {{--<a href="#" class="btn btn--round">--}}
                {{--<span class="icon-ecommerce"></span>--}}
                {{--</a>--}}
                {{--<a href="quick-view.html" class="btn btn--round btn--dark btn-quickview"--}}
                {{--data-toggle="modal"--}}
                {{--data-name="test"--}}
                {{--data-target="#quickView"><span class="icon icon-eye"></span></a>--}}
            </div>
            <div class="product-preview__info__title">
                <h2><a href="{{ route('user.show',$element->id) }}">{{ str_limit($element->name,50,'..') }}</a></h2>
            </div>
            {{--<div class="rating"><span class="icon-star"></span><span--}}
            {{--class="icon-star"></span><span class="icon-star"></span><span--}}
            {{--class="icon-star"></span><span class="icon-star"></span></div>--}}
            <div class="price-box">{!! $element->country_id <= 1 ? '</br>' : $element->countryName !!}</div>
            {{--<div class="product-preview__info__description">--}}
            {{--<p>{!! str_limit($element->user_meta->description,70,'...') !!}--}}
            {{--<a href="{{ route('myads',$element->id) }}">..more</a>--}}
            {{--</p>--}}
            {{--</div>--}}
            {{--<div class="product-preview__info__link"><a href="#"--}}
            {{--class="compare-link"><span--}}
            {{--class="icon icon-bars"></span><span--}}
            {{--class="product-preview__info__link__text">Add to compare</span></a>--}}
            {{--<a href="#"><span class="icon icon-favorite"></span><span--}}
            {{--class="product-preview__info__link__text">Add to wishlist</span></a><a--}}
            {{--href="#" class="btn btn--wd buy-link"><span--}}
            {{--class="icon icon-ecommerce"></span><span--}}
            {{--class="product-preview__info__link__text">Add to cart</span></a>--}}
            {{--</div>--}}
        </div>
    </div>
</div>