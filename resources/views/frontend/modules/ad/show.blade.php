@extends('frontend.layouts.app')

@section('top')
    <div class="product-info col-sm-6">
        <div class="product-info__title">
            <h2>So High Two-Piece Set</h2>
            <div class="rating product-info__rating visible-xs"><span class="icon-star"></span><span
                        class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
        </div>
        <div class="product-info__sku pull-right">SKU: 00065 &nbsp;&nbsp;<span
                    class="label label-success">IN STOCK</span></div>
        <ul id="singleGallery" class="visible-xs">
            <li><img src="images/swimwear/products/product-big-1.jpg" alt=""/></li>
            <li><img src="images/swimwear/products/product-big-2.jpg" alt=""/></li>
            <li><img src="images/swimwear/products/product-big-3.jpg" alt=""/></li>
            <li><img src="images/swimwear/products/product-big-4.jpg" alt=""/></li>
            <li><img src="images/swimwear/products/product-big-5.jpg" alt=""/></li>
        </ul>
        <div class="price-box product-info__price"><span class="price-box__new">$65.00</span> <span
                    class="price-box__old">$84.00</span></div>
        <div class="rating product-info__rating hidden-xs"><span class="icon-star"></span><span
                    class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span
                    class="icon-star"></span></div>
        <div class="divider divider--xs product-info__divider"></div>
        <div class="product-info__description"> Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu,
            tincidunt vel, nisi. Curabitur molestie euismod erat. Proin eros odio, mattis rutrum, pulvinar et, egestas
            vitae, magna. Integer semper, velit ut interdum malesuada, diam dolor pellentesque lacus, vitae commodo orci
            nisi et sem. Pellentesque adipiscing nisi. Nulla facilisi. Mauris lacinia lectus sit amet felis.
        </div>
        <div class="divider divider--xs product-info__divider"></div>
        <label>Size:</label>
        <ul class="options-swatch options-swatch--size options-swatch--lg">
            <li>XS</li>
            <li>S</li>
            <li>M</li>
            <li>L</li>
            <li>XL</li>
            <li>XXL</li>
            <li>XXXL</li>
        </ul>
        <div class="divider divider--xs"></div>
        <label>Color:</label>
        <ul class="options-swatch options-swatch--color options-swatch--lg">
            <li><a href="#"><span class="swatch-label"><img src="images/colors/blue.png" width="10" height="10" alt=""/></span></a>
            </li>
            <li><a href="#"><span class="swatch-label"><img src="images/colors/yellow.png" width="10" height="10"
                                                            alt=""/></span></a></li>
            <li><a href="#"><span class="swatch-label"><img src="images/colors/green.png" width="10" height="10"
                                                            alt=""/></span></a></li>
            <li><a href="#"><span class="swatch-label"><img src="images/colors/dark-grey.png" width="10" height="10"
                                                            alt=""/></span></a></li>
            <li><a href="#"><span class="swatch-label"><img src="images/colors/grey.png" width="10" height="10" alt=""/></span></a>
            </li>
            <li><a href="#"><span class="swatch-label"><img src="images/colors/red.png" width="10" height="10" alt=""/></span></a>
            </li>
            <li><a href="#"><span class="swatch-label"><img src="images/colors/white.png" width="10" height="10"
                                                            alt=""/></span></a></li>
        </ul>
        <div class="divider divider--sm"></div>
        <label>Quantity:</label>
        <div class="outer">
            <div class="input-group-qty pull-left"><span class="pull-left"> </span>
                <input type="text" name="quant[1]" class="input-number input--wd input-qty pull-left" value="1" min="1"
                       max="100">
                <span class="pull-left btn-number-container">
                <button type="button" class="btn btn-number btn-number--plus" data-type="plus" data-field="quant[1]">
                    +
                </button>
                <button type="button" class="btn btn-number btn-number--minus" disabled="disabled" data-type="minus"
                        data-field="quant[1]"> &#8211; </button>
                </span></div>
            <div class="pull-left">
                <button class="btn btn--wd text-uppercase">Add to Cart</button>
            </div>
            <div class="social-links social-links--colorize social-links--invert social-links--padding pull-right">
                <ul>
                    <li class="social-links__item"><a class="icon icon-facebook tooltip-link" href="#"
                                                      data-placement="top" data-toggle="tooltip"
                                                      data-original-title="Share on facebook"></a></li>
                    <li class="social-links__item"><a class="icon icon-twitter tooltip-link" href="#"
                                                      data-placement="top" data-toggle="tooltip"
                                                      data-original-title="Share on twitter"></a></li>
                    <li class="social-links__item"><a class="icon icon-google tooltip-link" href="#"
                                                      data-placement="top" data-toggle="tooltip"
                                                      data-original-title="Share on google"></a></li>
                    <li class="social-links__item"><a class="icon icon-pinterest tooltip-link" href="#"
                                                      data-placement="top" data-toggle="tooltip"
                                                      data-original-title="Share on pinterest"></a></li>
                </ul>
            </div>
        </div>
        <div class="divider divider--xs"></div>
        <ul class="product-links product-links--inline">
            <li><a href="#"><span class="icon icon-bars"></span>Add to compare</a></li>
            <li><a href="#"><span class="icon icon-favorite"></span>Add to wishlist</a></li>
            <li><a href="#"><span class="icon icon-mail-fill"></span>Email to friend</a></li>
        </ul>
    </div>
@endsection