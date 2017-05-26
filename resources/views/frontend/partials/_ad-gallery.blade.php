<div class="product-main-image">
    <div class="product-main-image__item"><img class="product-zoom"
                                               src='{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}'
                                               data-zoom-image="{{ asset('storage/uploads/images/large/'.$element->image) }}"/>
    </div>
    <div class="product-main-image__zoom"></div>
</div>
<div class="product-images-carousel">
    <ul id="smallGallery">
        @foreach($element->gallery->first()->images as $image)
            <li><a href="#" data-image="{{ asset('storage/uploads/images/medium/'.$image->medium) }}"
                   data-zoom-image="{{ asset('storage/uploads/images/large/'.$image->large) }}"><img
                            src="{{ asset('storage/uploads/images/thumbnail/'.$image->thumb) }}"
                            alt="{{ $element->title }}"/></a></li>
        @endforeach
        {{--<li><a href="http://www.youtube.com/watch?v=JW8M32oHTKw" class="video-link"><img src="images/products/product-small-empty.png" alt="" /></a></li>--}}
    </ul>
</div>
