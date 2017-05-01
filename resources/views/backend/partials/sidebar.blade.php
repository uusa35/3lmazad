<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu page-sidebar-menu-closed "
            data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

            <li class="heading">
                <h3 class="uppercase">Petrolet Admin</h3>
            </li>

            <li class="heading">
                <h3 class="uppercase">All Users</h3>
            </li>
            <li class="nav-item start {{ in_array('user',request()->segments(), true) ? 'active open' : null }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">Users & Companies</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ route('backend.user.index') }}" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Companies</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="heading">
                <h3 class="uppercase">Website Settings</h3>
            </li>
            <li class="nav-item  start
            {{
            in_array('slider',request()->segments(), true) ||
            in_array('category',request()->segments(), true) ||
            in_array('category',request()->segments(), true) ||
             in_array('contactus',request()->segments(), true) ||
             in_array('aboutus',request()->segments(), true)
             ? 'active open' : null }}
                    ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-gears fa-lg"></i>
                    <span class="title">Settings</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ in_array('category',request()->segments(),true) && request()->type == 0  ? 'active open' : ''  }}">
                        <a href="{{ route('backend.category.index',['type' => 0]) }}" class="nav-link ">
                            <i class="fa fa-fw fa-file"></i>
                            <span class="title">Main Categories</span>
                        </a>
                    </li>
                    {{--<li class="nav-item {{ in_array('slider',request()->segments(),true) ? 'active open' : ''  }}">--}}
                    {{--<a href="{{ route('backend.slider.index') }}" class="nav-link ">--}}
                    {{--<i class="fa fa-fw fa-file"></i>--}}
                    {{--<span class="title">Sliders</span>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item {{ in_array('ad',request()->segments(),true) ? 'active open' : ''  }}">--}}
                    {{--<a href="{{ route('backend.ad.index') }}" class="nav-link ">--}}
                    {{--<i class="fa fa-fw fa-file"></i>--}}
                    {{--<span class="title">Ads</span>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    <li class="nav-item {{ in_array('contactus',request()->segments(),true) ? 'active open' : ''  }}">
                        <a href="{{ route('backend.contactus.index') }}" class="nav-link ">
                            <i class="fa fa-fw fa-file"></i>
                            <span class="title">Contactus</span>
                        </a>
                    </li>
                    <li class="nav-item {{ in_array('aboutus',request()->segments(),true) ? 'active open' : ''  }}">
                        <a href="{{ route('backend.aboutus.index') }}" class="nav-link ">
                            <i class="fa fa-fw fa-file"></i>
                            <span class="title">Aboutus</span>
                        </a>
                    </li>
                    <li class="nav-item {{ in_array('newsletter',request()->segments(),true) ? 'active open' : ''  }}">
                        <a href="{{ route('backend.newsletter.index') }}" class="nav-link ">
                            <i class="fa fa-fw fa-file"></i>
                            <span class="title">Newletter</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
