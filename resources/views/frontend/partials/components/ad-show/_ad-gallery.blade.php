<div class="product-main-image">
    <div class="product-main-image__item">
        @if(!$element->booked)
            <img class="product-zoom" src='{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}'
                 data-zoom-image="{{ asset('storage/uploads/images/large/'.$element->image) }}"/>
        @else
            <img class="product-zoom" src='{{ asset('images/booked.png') }}'
                 data-zoom-image="{{ asset('storage/uploads/images/large/'.$element->image) }}"/>
        @endif
    </div>
    <div class="product-main-image__zoom ad-click-gallery"></div>
</div>
@if(!is_null($element->gallery->first()) && !$element->gallery->first()->images->isEmpty())
    <div class="product-images-carousel">
        <ul id="smallGallery">
            <li>
                <a href="#" data-image="{{ asset('storage/uploads/images/large/'.$element->image) }}"
                   data-zoom-image="{{ asset('storage/uploads/images/large/'.$element->image) }}"
                >
                    <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                         alt="{{ $element->title }}"/>
                </a>
            </li>
            @foreach($element->gallery->first()->images as $image)
                <li>
                    <a href="#" data-image="{{ asset('storage/uploads/images/large/'.$image->image) }}"
                       data-zoom-image="{{ asset('storage/uploads/images/large/'.$image->image) }}"
                    >
                        <img src="{{ asset('storage/uploads/images/thumbnail/'.$image->image) }}"
                             alt="{{ $element->title }}"/>
                    </a>
                </li>
            @endforeach
            {{--<li><a href="http://www.youtube.com/watch?v=JW8M32oHTKw" class="video-link"><img--}}
            {{--src="images/products/product-small-empty.png" alt=""/></a></li>--}}
        </ul>
    </div>
@endif