<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
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
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                    <span></span>
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-male" aria-hidden="true"></i>
                    <span class="title">Users</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('backend.user.index',['role' => 'user']) }}" class="nav-link ">
                            <i class="fa fa-fw fa-user"></i>
                            <span class="title">Users</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('backend.user.index',['role' => 'merchant']) }}" class="nav-link ">
                            <i class="fa fa-fw fa-users"></i>
                            <span class="title">Merchants</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Advertisement Section</h3>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-shopping-basket"></i>
                    <span class="title">Ads</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Free Ads</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Paid Ads</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="ui_page_progress_style_1.html" class="nav-link "> Valid Paid Ads </a>
                            </li>
                            <li class="nav-item ">
                                <a href="ui_page_progress_style_2.html" class="nav-link "> Due Paid Ads</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Paid Plans Section</h3>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-money"></i>
                    <span class="title">Plans</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Plans</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Galleries & Comments</h3>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-comments"></i>
                    <span class="title">Galleries</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Galleries</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Comments</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Auctions</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Settings Section</h3>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-cogs"></i>
                    <span class="title">Settings</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Deals</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Categories & Options</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="ui_page_progress_style_1.html" class="nav-link "> Categories </a>
                            </li>
                            <li class="nav-item ">
                                <a href="ui_page_progress_style_2.html" class="nav-link "> Options </a>
                            </li>
                            <li class="nav-item ">
                                <a href="ui_page_progress_style_2.html" class="nav-link "> Feilds</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Slider</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Aboutus</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Contactus</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Faq</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>