<nav class="navbar navbar-wd" id="navbar">
    <div class="container">
        <div class="navbar-header">
            @if(isset($contactus))
                <button type="button" class="navbar-toggle" id="slide-nav"><span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span></button>
                <!--  Logo  --> <a class="logo" href="{{ route('home') }}">
                    <img class="logo logo-default img-responsive text-center"
                         src="{{ asset('storage/uploads/images/medium/'.$contactus->logo) }}" alt=""/>
                    <img class="logo logo-mobile img-responsive text-center"
                         src="{{ asset('storage/uploads/images/medium/'.$contactus->logo) }}" alt=""/>
                    <img class="logo logo-transparent img-responsive text-center"
                         src="{{ asset('storage/uploads/images/medium/'.$contactus->logo) }}" alt=""/>
                </a>
                @endif
                        <!-- End Logo -->
        </div>
        {{--SEARCH FORM--}}
        <div class="pull-left search-focus-fade" id="slidemenu" style="display: flex; justify-content: flex-end;">
            <div class="slidemenu-close visible-xs">✕</div>
            <ul class="nav navbar-nav">
                <li class="menu-large">
                    <a href="{{ route('home') }}" class="dropdown-toggle">
                        <span class="link-name">{{ trans("general.home") }}</span>
                    </a>
                </li>
                @guest
                <li class="menu-large visible-xs">
                    <a href="{{ route('register') }}" class="dropdown-toggle">
                        <span class="link-name">{{ trans('general.register') }}</span>
                    </a>
                </li>
                @endguest
                <li class="menu-large">
                    <a href="{{ route('user.merchants-groups') }}" class="dropdown-toggle">
                        <span class="link-name">{{ trans("general.merchants-groups") }}</span>
                    </a>
                </li>
                <li class="menu-large visible-xs">
                    <a href="{{ route('ad.create') }}" class="dropdown-toggle">
                        <span class="link-name">{{ trans('general.create_ad') }}</span>
                    </a>
                </li>
                {{--<li class="menu-large">--}}
                    {{--<a href="{{ route('aboutus') }}" class="dropdown-toggle">--}}
                        {{--<span class="link-name">{{ trans('general.aboutus') }}</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="menu-large">
                    <a href="{{ route('contactus') }}" class="dropdown-toggle">
                        <span class="link-name">{{ trans('general.contactus') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>