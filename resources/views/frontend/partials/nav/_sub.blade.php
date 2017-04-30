<div class="header__dropdowns-container">
    <div class="header__dropdowns">
        {{--<div class="header__search pull-left">--}}
            {{--<a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button search-open">--}}
                {{--<span class="icon icon-search"></span>--}}
            {{--</a>--}}
        {{--</div>--}}
        @include('frontend.partials.components._nav-login-register')
        {{--<div class="header__cart pull-left"><span class="header__cart__indicator hidden-xs">$0.00</span>--}}
        {{--<div class="dropdown pull-right"><a href="#"--}}
        {{--class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button"--}}
        {{--data-toggle="dropdown"><span--}}
        {{--class="icon icon-bag-alt"></span><span class="badge badge--menu">2</span></a>--}}
        {{--<div class="dropdown-menu animated fadeIn shopping-cart" role="menu">--}}
        {{--<div class="shopping-cart__settings"><a href="#" class="icon icon-gear"></a></div>--}}
        {{--<div class="shopping-cart__top text-uppercase">Your Cart(2)</div>--}}
        {{--<ul>--}}
        {{--<li class='shopping-cart__item'>--}}
        {{--<div class="shopping-cart__item__image pull-left"><a href="#"><img--}}
        {{--src="images/products/product.jpg" alt=""/></a></div>--}}
        {{--<div class="shopping-cart__item__info">--}}
        {{--<div class="shopping-cart__item__info__title">--}}
        {{--<h2 class="text-uppercase"><a href="#">Fast Seconds Knit White</a></h2>--}}
        {{--</div>--}}
        {{--<div class="shopping-cart__item__info__option">Color: Blue</div>--}}
        {{--<div class="shopping-cart__item__info__option">Size: Small</div>--}}
        {{--<div class="shopping-cart__item__info__price">$84.00</div>--}}
        {{--<div class="shopping-cart__item__info__qty">Qty:1</div>--}}
        {{--<div class="shopping-cart__item__info__delete"><a href="#"--}}
        {{--class="icon icon-clear"></a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--<li class='shopping-cart__item'>--}}
        {{--<div class="shopping-cart__item__image pull-left"><a href="#"><img--}}
        {{--src="images/products/product.jpg" alt=""/></a></div>--}}
        {{--<div class="shopping-cart__item__info">--}}
        {{--<div class="shopping-cart__item__info__title">--}}
        {{--<h2 class="text-uppercase"><a href="#">Fast Seconds Knit White</a></h2>--}}
        {{--</div>--}}
        {{--<div class="shopping-cart__item__info__option">Color: Blue</div>--}}
        {{--<div class="shopping-cart__item__info__option">Size: Small</div>--}}
        {{--<div class="shopping-cart__item__info__price">$84.00</div>--}}
        {{--<div class="shopping-cart__item__info__qty">Qty:1</div>--}}
        {{--<div class="shopping-cart__item__info__delete"><a href="#"--}}
        {{--class="icon icon-clear"></a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--<div class="shopping-cart__bottom">--}}
        {{--<div class="pull-left">Subtotal: <span class="shopping-cart__total"> $130.00</span>--}}
        {{--</div>--}}
        {{--<div class="pull-right">--}}
        {{--<button class="btn btn--wd text-uppercase">Checkout</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="dropdown pull-right"><a href="#"--}}
        {{--class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button"--}}
        {{--data-toggle="dropdown"><span class="icon icon-dots"></span></a>--}}
        {{--<ul class="dropdown-menu ul-row animated fadeIn" role="menu">--}}
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
        {{--<li class='li-col languages languages--flag'>--}}
        {{--<h4>{{ trans('general.language') }}</h4>--}}
        {{--<ul>--}}
        {{--<li class="languages__item active"><a href="#"><span class="languages__item__flag flag"><img--}}
        {{--src="images/flags/gb.png" alt=""/></span><span--}}
        {{--class="languages__item__label">En</span></a></li>--}}
        {{--<li class="languages__item"><a href="#"><span class="languages__item__flag flag"><img--}}
        {{--src="images/flags/de.png" alt=""/></span><span--}}
        {{--class="languages__item__label">De</span></a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--@if(auth()->check())--}}
        {{--<li class='li-col list-user-menu'>--}}
        {{--<h4>{{ trans('general.welcome') .' '.auth()->user()->name}}</h4>--}}
        {{--<ul>--}}
        {{--<li><a href="#">{{ trans('general.account') }}</a></li>--}}
        {{--<li><a href="#">{{ trans('general.wlist') }}</a></li>--}}
        {{--<li><a href="#">Compare</a></li>--}}
        {{--<li><a href="#">Checkout</a></li>--}}
        {{--<li>--}}
        {{--<a href="{{ url('/logout') }}"--}}
        {{--onclick="event.preventDefault();--}}
        {{--document.getElementById('logout-form').submit();">--}}
        {{--{{ trans('general.logout') }}--}}
        {{--</a>--}}

        {{--<form id="logout-form" action="{{ url('/logout') }}" method="POST"--}}
        {{--style="display: none;">--}}
        {{--{{ csrf_field() }}--}}
        {{--</form>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--@else--}}
        {{--<li class='li-col list-user-menu'>--}}
        {{--<h4>User</h4>--}}
        {{--<ul>--}}
        {{--<li class="currency__item active"><a href="#">--}}
        {{--<sWpan--}}
        {{--class="fa fa-user fa-fw"></sWpan>--}}
        {{--Login</a></li>--}}
        {{--<li class="currency__item"><a href="{{ route('register') }}"><span--}}
        {{--class="fa fa-users fa-fw"></span>Register</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--@endif--}}
        </ul>
    </div>
</div>