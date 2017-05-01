<div class="dropdown pull-right">
    <a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button" data-toggle="dropdown">
        <span class="icon icon-dots"></span>
    </a>
    <ul class="dropdown-menu ul-row animated fadeIn" role="menu">
        {{--<li class='li-col currency'>--}}
        {{--<h4>Currency</h4>--}}
        {{--<ul>--}}
        {{--<li class="currency__item active"><a href="#"><span>$</span>US Dollar</a></li>--}}
        {{--<li class="currency__item"><a href="#"><span>€</span>Euro</a></li>--}}
        {{--<li class="currency__item"><a href="#"><span>£</span>British Pound</a></li>--}}
        {{--<li class="currency__item"><a href="#"><span>¥</span>Japanese Yen</a></li>--}}
        {{--<li class="currency__item"><a href="#"><span>₹</span>Indian Rupee</a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        <li class='li-col languages languages--flag'>
            <h4>{{ trans('general.language') }}</h4>
            <ul>
                <li class="languages__item active">
                    <a href="{{ route('lang','en') }}">
                        <span class="languages__item__flag flag">
                            <img src="images/flags/us.png" alt=""/></span><span
                                class="languages__item__label">{{ trans('general.en') }}</span>
                    </a>
                </li>
                <li class="languages__item">
                    <a href="{{ route('lang','ar') }}">
                        <span class="languages__item__flag flag">
                            <img src="images/flags/kw.png" alt=""/></span><span
                                class="languages__item__label">{{ trans('general.ar') }}</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class='li-col list-user-menu'>
            <h4>My Account</h4>
            <ul>
                <li><a href="#">Account</a></li>
                <li><a href="#">Wishlist</a></li>
                <li><a href="#">Compare</a></li>
                <li><a href="#">Checkout</a></li>
            </ul>
        </li>
    </ul>
</div>