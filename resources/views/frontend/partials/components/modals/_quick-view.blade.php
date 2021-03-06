<div class="container-fluid" id="productModal">
    <button type="button" class="ui basic button {{ app()->isLocale('ar') ? 'pull-left' : 'pull-right' }}"
            style="box-shadow: 0 0 0 0 !important;"
            data-dismiss="modal"><i class=" remove grey icon"></i></button>
    <div class="row">
        <div class="divider divider--sm"></div>
        <div class="col-sm-4">
            <ul class="product-main-image no-zoom" id="mainProductImg">
                <li class="product-main-image__item active"><a href="" class="modal-ad-url">
                        <img class="img-responsive img-thumbnail modal-image" src=''
                             style="width: 60%; max-width: 355px; max-height: 300px;"/>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-sm-8">
            <div class="product-info">
                <div class="product-info__title">
                    <h2 class="modal-title"></h2>
                </div>
                <div class="price-box product-info__price"
                     style="float : {{ app()->isLocale('ar') ? 'left' : 'right' }} !important;">
                    <span class="price-box__new modal-price"></span> {{ trans('general.kd') }}</div>
                <div class="divider divider--xs product-info__divider"></div>
                <div class="product-info__description modal-description {{ app()->isLocale('ar') ? 'text-right' : 'text-left' }}"></div>
                <div class="ui buttons">
                    {{--<button class="ui white basic button"><i class="icon calendar"></i>--}}
                        {{--<span class="modal-from-date"></span>--}}
                    {{--</button>--}}
                    {{--<button class="ui white basic button">--}}
                        {{--<i class="icon arrow-right"></i>--}}
                        {{--<span class="modal-category"></span>--}}
                    {{--</button>--}}
                    {{--<button class="ui white basic button">--}}
                        {{--<i class="icon calendar"></i>--}}
                        {{--<span class="modal-created_at"></span>--}}
                    {{--</button>--}}
                    {{--<button class="ui white basic button">--}}
                        {{--<i class="icon calendar"></i>--}}
                        {{--another testing place--}}
                    {{--</button>--}}
                </div>
                <div class="divider divider--xs product-info__divider"></div>

                {{--<label>Color:</label>--}}
                {{--<ul class="options-swatch options-swatch--color options-swatch--lg">                  <li><a href="#"><span class="swatch-label"><img src="images/colors/blue.png" width="10" height="10" alt=""/></span></a></li>--}}
                {{--<li><a href="#"><span class="swatch-label"><img src="http://placehold.it/10x10/" width="10" height="10" alt=""/></span></a></li>--}}
                {{--</ul>--}}
                {{--<div class="divider divider--xs"></div>--}}
                {{--<label>Size:</label>--}}
                {{--<ul class="options-swatch options-swatch--size options-swatch--lg">--}}
                {{--<li>XS</li>--}}
                {{--<li>S</li>--}}
                {{--<li>M</li>--}}
                {{--<li>L</li>--}}
                {{--<li>XL</li>--}}
                {{--<li>XXL</li>--}}
                {{--<li>XXXL</li>--}}
                {{--</ul>--}}
                <div class="divider divider--xs"></div>
                {{--<label>Quantity:</label>--}}
                {{--<div class="outer">--}}
                {{--<div class="input-group-qty pull-left"> <span class="pull-left"> </span>--}}
                {{--<input type="text" name="quant[1]" class="input-number input--wd input-qty pull-left" value="1" min="1" max="100">--}}
                {{--<span class="pull-left btn-number-container">--}}
                {{--<button type="button" class="btn btn-number btn-number--plus" data-type="plus" data-field="quant[1]"> + </button>--}}
                {{--<button type="button" class="btn btn-number btn-number--minus" disabled="disabled" data-type="minus" data-field="quant[1]"> &#8211; </button>--}}
                {{--</span> </div>--}}

                <a href="#"
                   class="btn btn--wd text-uppercase modal-ad-url"
                   style="float : {{ app()->isLocale('ar') ? 'left' : 'right' }} !important;">
                    {{ trans('general.view_ad') }}
                </a>
                <div class="divider divider--md"></div>

                {{--<div class="social-links social-links--colorize social-links--invert social-links--padding pull-right">--}}
                {{--<ul>--}}
                {{--<li class="social-links__item">--}}
                {{--<a class="icon icon-facebook tooltip-link" href="#"--}}
                {{--data-placement="top" data-toggle="tooltip"--}}
                {{--data-original-title="Share on facebook"></a>--}}
                {{--</li>--}}
                {{--<li class="social-links__item">--}}
                {{--<a class="icon icon-twitter tooltip-link" href="#"--}}
                {{--data-placement="top" data-toggle="tooltip"--}}
                {{--data-original-title="Share on twitter"></a>--}}
                {{--</li>--}}
                {{--<li class="social-links__item">--}}
                {{--<a class="icon icon-google tooltip-link" href="#"--}}
                {{--data-placement="top" data-toggle="tooltip"--}}
                {{--data-original-title="Share on google"></a>--}}
                {{--</li>--}}
                {{--<li class="social-links__item">--}}
                {{--<a class="icon icon-pinterest tooltip-link" href="#"--}}
                {{--data-placement="top" data-toggle="tooltip"--}}
                {{--data-original-title="Share on pinterest"></a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
            </div>
            {{--<div class="divider divider--xs"></div>--}}
            {{--<ul class="product-links product-links--inline">--}}
            {{--<li><a href="#"><span class="icon icon-bars"></span>Add to compare</a></li>--}}
            {{--<li><a href="#"><span class="icon icon-favorite"></span>Add to wishlist</a></li>--}}
            {{--<li><a href="#"><span class="icon icon-mail-fill"></span>Email to friend</a></li>--}}
            {{--</ul>--}}
        </div>
    </div>
</div>
</div>