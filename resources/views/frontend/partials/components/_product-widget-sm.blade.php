@foreach($elements as $element)
    <div class="products-widget__item">
        <div class="products-widget__item__image pull-left">
            <a href="{{ (isset($route)) ? route($route.'.show',$element->id) : null }}">
                <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}" alt=""/>
            </a>
        </div>
        <div class="products-widget__item__info">
            <div class="products-widget__item__info__title">
                <h2 class="text-default">
                    <a href="{{ (isset($route)) ? route($route.'.show',$element->id) : null }}">
                        {{ title_case(str_limit($element->title,'60','..more')) }}
                    </a>
                </h2>
            </div>
            {{--<div class="rating"><span class="icon-star"></span><span--}}
            {{--class="icon-star"></span><span class="icon-star"></span><span--}}
            {{--class="icon-star"></span><span class="icon-star"></span></div>--}}
            {{--<div class="price-box"><span class="price-box__new">$65.00</span> <span--}}
            {{--class="price-box__old">$84.00</span></div>--}}
        </div>
    </div>
@endforeach