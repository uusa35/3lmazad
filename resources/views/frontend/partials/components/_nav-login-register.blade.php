@if (auth()->guest())
    <div class="dropdown pull-right"><a href="#"
                                        class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button"
                                        data-toggle="dropdown"><span class="fa fa-fw fa-user"></span>
            register | login
        </a>
        <ul class="dropdown-menu ul-row animated fadeIn" role="menu" style="z-index: 9999;">
            <li class='li-col list-user-menu'>
                <ul>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            </li>
        </ul>
    </div>
@else
    <div class="dropdown pull-right"><a href="#"
                                        class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button"
                                        data-toggle="dropdown"><span class="fa fa-fw fa-lg fa-user"></span>
            <span class="hidden-xs">Welcome {{ auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu ul-row animated fadeIn" role="menu" style="z-index: 9999;">
            <li class='li-col list-user-menu'>
                <ul>
                    @if($isAdmin)
                        <li><a href="{{ route('backend.index') }}">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('account') }}">My Account</a></li>
                        <li><a href="{{ route('user.show',auth()->user()->id) }}">My Profile</a></li>
                    @endif
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            logout
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