@if(!$fixed->isEmpty())
    <div class="product-category commercial-homepage hover-squared">
        <div class="product-preview__label product-preview__label--right product-preview__label--sale text-center">
            <span class="mdi mdi-star text-center" style="color : gold;"></span></div>
        <a href="{{ $fixed[$index]->url }}">
            <img src="{{ asset('storage/uploads/images/thumbnail/'.$fixed[$index]->image) }}"
                 class="img-responsive commercial-homepage"
                 data-lazy="{{ asset('storage/uploads/images/thumbnail/'.$fixed[$index]->image) }}"
                 alt="">
        </a>
        <div class="product-category__hover caption"></div>
        <div class="product-category__info">
            <div class="product-category__info__ribbon">
                <h5 class="product-category__info__ribbon__title">{{ $fixed[$index]->title }}</h5>
                <div class="product-category__info__ribbon__count">{{ str_limit($fixed[$index]->description,30) }}</div>
            </div>
        </div>
    </div>
@endif
@if(!$notFixed->isEmpty())
    <div class="product-category commercial-homepage hover-squared">
        <div class="product-preview__label product-preview__label--right product-preview__label--sale text-center">
            <span class="mdi mdi-star text-center" style="color : gold;"></span></div>
        <a href="{{ $notFixed[$index]->url }}">
            <img src="{{ asset('storage/uploads/images/thumbnail/'.$notFixed[$index]->image) }}"
                 class="img-responsive commercial-homepage"
                 data-lazy="{{ asset('storage/uploads/images/thumbnail/'.$notFixed[$index]->image) }}"
                 alt="">
        </a>
        <div class="product-category__hover caption"></div>
        <div class="product-category__info">
            <div class="product-category__info__ribbon">
                <h5 class="product-category__info__ribbon__title">{{ $notFixed[$index]->title }}</h5>
                <div class="product-category__info__ribbon__count">{{ str_limit($notFixed[$index]->description,30) }}</div>
            </div>
        </div>
    </div>
@endif