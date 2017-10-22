<div class="divider divider--lg"></div>
@if(isset($contactus))
    <footer class="footer">
        <div class="footer__column-links footer__column-links--variant2" style="color : white">
            <div class="back-to-top"><a href="#top"
                                        class="btn btn--round btn--round--lg default-bg-orange"><span
                            class="icon-arrow-up"></span></a></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 hidden-xs hidden-sm">
                        <h5 class=" text-uppercase mobile-collapse__title">{{ $contactus->name }}</h5>
                        <!--  Logo  -->
                        <a class="logo"
                           href="{{ route('home') }}">
                            <img class="img-responsive logo logo-default"
                                 src="{{ asset('storage/uploads/images/large/'.$contactus->logo) }}"
                                 alt="{{ $contactus->name }}"/>
                        </a>
                        <!-- End Logo --> </div>
                    <div class="col-sm-3 col-md-2 mobile-collapse">
                        <h5 class="text-uppercase mobile-collapse__title">{{ trans('general.info') }} </h5>
                        <div class="v-links-list mobile-collapse__content">
                            <ul>
                                <li><a class="default-color-white"
                                       href="{{ route('aboutus') }}">{{ trans('general.aboutus') }}</a></li>
                                <li><a class="default-color-white"
                                       href="{{ route('contactus') }}">{{ trans('general.contactus') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-2 mobile-collapse">
                        <h5 class=" text-uppercase mobile-collapse__title">{{ trans('general.terms') }}</h5>
                        <div class="v-links-list mobile-collapse__content">
                            <ul>
                                <li><a class="default-color-white"
                                       href="{{ route('faq') }}">{{ trans('general.faq') }}</a></li>
                                <li><a class="default-color-white"
                                       href="{{ route('terms') }}">{{ trans('general.terms') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-2 mobile-collapse">
                        <h5 class=" text-uppercase mobile-collapse__title">{{ trans('general.my_account') }}</h5>
                        <div class="v-links-list mobile-collapse__content">
                            <ul>
                                @if(auth()->check())
                                    <li><a class="default-color-white"
                                           href="{{ route('account.user') }}">{{ trans('general.account') }}</a></li>
                                @else
                                    <li><a class="default-color-white"
                                           href="{{ route('register') }}">{{ trans('general.register') }}</a></li>
                                    <li><a class="default-color-white"
                                           href="{{ url('password/reset') }}">{{ trans('general.password_forgot') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 mobile-collapse mobile-collapse--last">
                        <h5 class=" text-uppercase mobile-collapse__title">{{ trans('general.our_info') }}</h5>
                        <div class="v-links-list mobile-collapse__content">
                            <ul>
                                <li class="icon icon-home"><span
                                            class="default-color-white">{{ $contactus->address }}</span></li>
                                <li class="icon icon-telephone"><span
                                            class="default-color-white">{{ $contactus->phone }}</span></li>
                                <li class="icon icon-mail"><a
                                            href="mailto:{{ $contactus->email }}"><span
                                                class="default-color-white">{{ $contactus->email }}</span></a></li>
                                <li class="icon icon-telephone"><a class="default-color-white"
                                                                   href="#"><span
                                                class="default-color-white">{{ $contactus->mobile }}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__subscribe footer__subscribe--variant2 default-bg-orange">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-8">
                        {{--<form class="subscribe-form"--}}
                        {{--action="{{ action('Frontend\HomeController@postNewsletter') }}" method="post">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<label class="subscribe-form__label text-uppercase pull-left">{{ trans('general.subscribe') }}</label>--}}
                        {{--<input type="text" class="subscribe-form__input input--wd" name="email"--}}
                        {{--placeholder="{{ trans("general.your_email") }}">--}}
                        {{--<button class="btn btn--wd text-uppercase wave"><span--}}
                        {{--class="hidden-xs">{{ trans('general.subscribe') }}</span><span--}}
                        {{--class="icon icon-mail-fill visible-xs"></span></button>--}}
                        {{--</form>--}}
                    </div>
                    <div class="col-sm-4 col-md-4">
                        @include('frontend.partials.components._social-icons')
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="footer__settings visible-xs">--}}
        {{--<div class="container text-center">--}}
        {{--<div class="dropdown pull-left"><a class="default-color-white" href="#"--}}
        {{--class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button"--}}
        {{--data-toggle="dropdown" aria-expanded="false"><span--}}
        {{--class="header__dropdowns__button__symbol">$</span></a>--}}
        {{--<ul class="dropdown-menu animated fadeIn" role="menu">--}}
        {{--<li class="currency__item currency__item--active"><a class="default-color-white" href="#">$ USA Dollar</a></li>--}}
        {{--<li class="currency__item"><a class="default-color-white" href="#">€ Euro</a></li>--}}
        {{--<li class="currency__item"><a class="default-color-white" href="#">£ British Pound</a></li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="dropdown pull-left"><a class="default-color-white" href="#"--}}
        {{--class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button"--}}
        {{--data-toggle="dropdown" aria-expanded="false"><span class="flag"><img--}}
        {{--src="images/flags/gb.png" alt=""></span></a>--}}
        {{--<ul class="dropdown-menu animated fadeIn languages languages--flag" role="menu">--}}
        {{--<li class="languages__item languages__item--active"><a class="default-color-white" href="#"><span--}}
        {{--class="languages__item__flag flag"><img src="images/flags/gb.png"--}}
        {{--alt=""></span><span--}}
        {{--class="languages__item__label">En</span></a></li>--}}
        {{--<li class="languages__item"><a class="default-color-white" href="#"><span class="languages__item__flag flag"><img--}}
        {{--src="images/flags/de.png" alt=""></span><span--}}
        {{--class="languages__item__label">De</span></a></li>--}}
        {{--<li class="languages__item"><a class="default-color-white" href="#"><span class="languages__item__flag flag"><img--}}
        {{--src="images/flags/fr.png" alt=""></span><span--}}
        {{--class="languages__item__label">Fr</span></a></li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="dropdown pull-left"><a class="default-color-white" href="#"--}}
        {{--class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button"--}}
        {{--data-toggle="dropdown" aria-expanded="false">Account</a>--}}
        {{--<ul class="dropdown-menu animated fadeIn" role="menu">--}}
        {{--<li><a class="default-color-white" href="#">Account</a></li>--}}
        {{--<li><a class="default-color-white" href="#">Wishlist</a></li>--}}
        {{--<li><a class="default-color-white" href="#">Compare</a></li>--}}
        {{--<li><a class="default-color-white" href="#">Checkout</a></li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </footer>
@endif