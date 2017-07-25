<footer class="footer">
    <div class="footer__column-links footer__column-links--variant2">
        <div class="back-to-top"><a href="#top" class="btn btn--round btn--round--lg"><span
                        class="icon-arrow-up"></span></a></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 hidden-xs hidden-sm">
                    <h5 class=" text-uppercase mobile-collapse__title">{{ $contactus->name }}</h5>
                    <!--  Logo  -->
                    <a class="logo logo--footer"
                       href="{{ route('home') }}">
                        <img class="img-responsive" src="{{ asset('storage/uploads/images/large/'.$contactus->logo) }}"
                             alt="{{ $contactus->name }}"/>
                    </a>
                    <!-- End Logo --> </div>
                <div class="col-sm-3 col-md-2 mobile-collapse">
                    <h5 class="text-uppercase mobile-collapse__title">{{ trans('general.info') }} </h5>
                    <div class="v-links-list mobile-collapse__content">
                        <ul>
                            <li><a href="{{ route('aboutus') }}">{{ trans('general.aboutus') }}</a></li>
                            <li><a href="{{ route('contactus') }}">{{ trans('general.contactus') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2 mobile-collapse">
                    <h5 class=" text-uppercase mobile-collapse__title">{{ trans('general.terms') }}</h5>
                    <div class="v-links-list mobile-collapse__content">
                        <ul>
                            <li><a href="{{ route('faq') }}">{{ trans('general.faq') }}</a></li>
                            <li><a href="{{ route('terms') }}">{{ trans('general.terms') }}</a></li>
                            {{--<li><a href="{{ url('account/chat/1') }}">Online support</a></li>--}}
                            {{--<li><a href="{{ url('account/chat/1') }}">Online support</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2 mobile-collapse">
                    <h5 class=" text-uppercase mobile-collapse__title">{{ trans('general.my_account') }}</h5>
                    <div class="v-links-list mobile-collapse__content">
                        <ul>
                            {{--@if($isAdmin)--}}
                            {{--<li><a href="{{ route('backend.index') }}">Dashboard</a></li>--}}
                            {{--@else--}}
                            {{--<li><a href="{{ route('account') }}">My Account</a></li>--}}
                            {{--@endif--}}
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 mobile-collapse mobile-collapse--last">
                    <h5 class=" text-uppercase mobile-collapse__title">{{ trans('general.our_info') }}</h5>
                    <div class="v-links-list mobile-collapse__content">
                        <ul>
                            <li class="icon icon-home">{{ $contactus->address }}</li>
                            <li class="icon icon-telephone">{{ $contactus->phone }}</li>
                            <li class="icon icon-mail"><a
                                        href="mailto:{{ $contactus->email }}">{{ $contactus->email }}</a></li>
                            <li class="icon icon-telephone"><a href="#">{{ $contactus->mobile }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__subscribe footer__subscribe--variant2">
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
    {{--<div class="dropdown pull-left"><a href="#"--}}
    {{--class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button"--}}
    {{--data-toggle="dropdown" aria-expanded="false"><span--}}
    {{--class="header__dropdowns__button__symbol">$</span></a>--}}
    {{--<ul class="dropdown-menu animated fadeIn" role="menu">--}}
    {{--<li class="currency__item currency__item--active"><a href="#">$ USA Dollar</a></li>--}}
    {{--<li class="currency__item"><a href="#">€ Euro</a></li>--}}
    {{--<li class="currency__item"><a href="#">£ British Pound</a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="dropdown pull-left"><a href="#"--}}
    {{--class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button"--}}
    {{--data-toggle="dropdown" aria-expanded="false"><span class="flag"><img--}}
    {{--src="images/flags/gb.png" alt=""></span></a>--}}
    {{--<ul class="dropdown-menu animated fadeIn languages languages--flag" role="menu">--}}
    {{--<li class="languages__item languages__item--active"><a href="#"><span--}}
    {{--class="languages__item__flag flag"><img src="images/flags/gb.png"--}}
    {{--alt=""></span><span--}}
    {{--class="languages__item__label">En</span></a></li>--}}
    {{--<li class="languages__item"><a href="#"><span class="languages__item__flag flag"><img--}}
    {{--src="images/flags/de.png" alt=""></span><span--}}
    {{--class="languages__item__label">De</span></a></li>--}}
    {{--<li class="languages__item"><a href="#"><span class="languages__item__flag flag"><img--}}
    {{--src="images/flags/fr.png" alt=""></span><span--}}
    {{--class="languages__item__label">Fr</span></a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="dropdown pull-left"><a href="#"--}}
    {{--class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button"--}}
    {{--data-toggle="dropdown" aria-expanded="false">Account</a>--}}
    {{--<ul class="dropdown-menu animated fadeIn" role="menu">--}}
    {{--<li><a href="#">Account</a></li>--}}
    {{--<li><a href="#">Wishlist</a></li>--}}
    {{--<li><a href="#">Compare</a></li>--}}
    {{--<li><a href="#">Checkout</a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
</footer>