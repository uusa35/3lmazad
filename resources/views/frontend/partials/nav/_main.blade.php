<nav class="navbar navbar-wd" id="navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" id="slide-nav"><span class="icon-bar"></span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span></button>
            <!--  Logo  --> <a class="logo" href="{{ route('home') }}">
                <img class="logo logo-default img-responsive"
                     src="{{ asset('storage/uploads/images/medium/'.$contactus->logo) }}" alt=""/>
                <img class="logo logo-mobile img-responsive"
                     src="{{ asset('storage/uploads/images/medium/'.$contactus->logo) }}" alt=""/>
                <img class="logo logo-transparent img-responsive"
                     src="{{ asset('storage/uploads/images/medium/'.$contactus->logo) }}" alt=""/>
            </a>
            <!-- End Logo -->
        </div>
        {{--SEARCH FORM--}}
        <div class="pull-left search-focus-fade" id="slidemenu" style="display: flex; justify-content: flex-end;">
            <div class="slidemenu-close visible-xs">✕</div>
            <ul class="nav navbar-nav">
                <li class="menu-large">
                    <a href="{{ route('home') }}" class="dropdown-toggle">
                        <span class="link-name">Home</span>
                    </a>
                </li>
                <li class="menu-large">
                    <a href="{{ route('home') }}" class="dropdown-toggle">
                        <span class="link-name">Aboutus</span>
                    </a>
                </li>
                <li class="menu-large">
                    <a href="{{ route('home') }}" class="dropdown-toggle">
                        <span class="link-name">Contact us</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>