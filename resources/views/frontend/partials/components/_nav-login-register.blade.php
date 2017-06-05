@if (auth()->guest())
    <div class="dropdown pull-right hidden-xs">
        <a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button" data-toggle="dropdown">
            <span class="fa fa-fw fa-user"></span>
            {{ trans('general.login_register') }}
        </a>
        <ul class="dropdown-menu ul-row animated fadeIn" role="menu" style="z-index: 9999;">
            <li class='li-col list-user-menu'>
                <ul>
                    <li><a href="{{ route('login') }}">{{ trans('general.login') }}</a></li>
                    <li><a href="{{ route('register') }}">{{ trans('general.register') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
@else
    <div class="dropdown pull-right"><a href="#"
                                        class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button"
                                        data-toggle="dropdown"><span class="fa fa-fw fa-lg fa-user"></span>
            <span class="hidden-xs">{{ trans('general.welcome').' '.auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu ul-row animated fadeIn" role="menu" style="z-index: 9999;">
            <li class='li-col list-user-menu'>
                <ul>
                    @if($isAdmin)
                        <li><a href="{{ route('backend.home') }}">{{ trans('general.dashboard') }}</a></li>
                        <li><a href="{{ url('backend/translations') }}">{{ trans('general.translations') }}</a></li>
                    @else
                        {{--<li><a href="{{ route('account') }}">My Account</a></li>--}}
                        {{--<li><a href="{{ route('user.show',auth()->user()->id) }}">My Profile</a></li>--}}
                    @endif
                    <li><a href="{{ route('home') }}">{{ trans("general.home") }}</a></li>
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ trans('general.logout') }}
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
@endif