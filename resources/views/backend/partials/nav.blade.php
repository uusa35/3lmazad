<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo" style="background-color: #444F5C;">
            <a href="{{ route('backend.home') }}">
                <img src="{{ asset('storage/uploads/images/medium/'.$contactus->logo) }}" alt="logo"
                     class="img-responsive"
                     style="width: 100%; max-height:48px;"/> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">

            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <i class="fa fa-fw fa-lg fa-gears" style="color: white;"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                <li>
                                    <a href="{{ route('backend.home') }}">
                                                <span class="details">
                                                        <i class="fa fa-lg fa-plus"></i>
                                                    create main category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <img alt="" class="img-circle"
                             src="{{ asset('storage/uploads/images/medium/'.$contactus->logo) }}"/>
                        <span class="username username-hide-on-mobile"> {{ auth()->user()->name }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ url('/') }}">
                                <i class="fa fa-arrow-left"></i> Back to site</a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGOUT DROPDOWN -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="{{ url('/logout') }}" class="dropdown-toggle"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        <i class="icon-logout"></i>
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>