@if(!$commercials->isEmpty())
    @foreach($commercials as $commercial)
        <div class="product-category commercial-homepage hover-squared">
            {{--<div class="product-preview__label product-preview__label--right product-preview__label--sale text-center">--}}
                {{--<span class="mdi mdi-star text-center" style="color : gold;"></span>--}}
            {{--</div>--}}
            <a href="{{ $commercial->url }}">
                <img src="{{ asset('storage/uploads/images/medium/'.$commercial->image) }}"
                     class="img-responsive commercial-homepage"
                     data-lazy="{{ asset('storage/uploads/images/medium/'.$commercial->image) }}"
                     alt="">
            </a>
            <div class="product-category__hover caption"></div>
            <div class="product-category__info">
                <div class="product-category__info__ribbon">
                    <h5 class="product-category__info__ribbon__title">{{ $commercial->title }}</h5>
                    <div class="product-category__info__ribbon__count">{{ str_limit($commercial->description,30) }}</div>
                </div>
            </div>
        </div>
    @endforeach
@endif