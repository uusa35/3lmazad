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
        <ul class="page-sidebar-menu page-header-fixed " data-keep-expanded="true" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hide">
                    <span></span>
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="heading">
                <h3 class="uppercase">Members Section</h3>
            </li>
            <li class="nav-item start {{ activeItem('user') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-male" aria-hidden="true"></i>
                    <span class="title">Users Section</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start">
                        <a href="{{ route('backend.user.index',['type' => 'user']) }}" class="nav-link ">
                            <i class="fa fa-fw fa-user"></i>
                            <span class="title">Users</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('backend.user.index',['type' => 'merchant']) }}" class="nav-link ">
                            <i class="fa fa-fw fa-users"></i>
                            <span class="title">Merchants</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Advertisement Section</h3>
            </li>
            <li class="nav-item {{ activeItem('ad',['deal']) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-shopping-basket"></i>
                    <span class="title">Ads & Other Modules</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ route('backend.ad.index') }}" class="nav-link ">
                            <span class="title">All Valid Ads</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.ad.index',['type' => 'free']) }}" class="nav-link ">
                            <span class="title">Valid Free Ads</span>
                        </a>
                    </li>
                    <li class="nav-item  {{ activeItem('ad') }} ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Paid Ads</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="{{ route('backend.ad.index',['type' => 'paid']) }}" class="nav-link ">
                                    Valid Paid Ads
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('backend.ad.index',['type' => 'due']) }}" class="nav-link ">
                                    Due Paid Ads
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.deal.index') }}" class="nav-link ">
                            <span class="title">Deals</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Paid Plans Section</h3>
            </li>
            <li class="nav-item  {{ activeItem('plan') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-money"></i>
                    <span class="title">Plan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="{{ route('backend.plan.index') }}" class="nav-link ">
                            <span class="title">Plans Index</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.plan.create') }}" class="nav-link ">
                            <span class="title">Create New Plan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Galleries & Abuse Reports</h3>
            </li>
            <li class="nav-item  {{ activeItem('gallery',['comment','auction','abuse']) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-comments"></i>
                    <span class="title">Galleries & Comments</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('backend.gallery.index') }}" class="nav-link ">
                            Galleries
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.comment.index') }}" class="nav-link ">
                            <span class="title">Comments</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.auction.index') }}" class="nav-link ">
                            <span class="title">Auctions</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.abuse.index') }}" class="nav-link ">
                            <span class="title">Abuse Reports</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="heading">
                <h3 class="uppercase">Settings Section</h3>
            </li>
            <li class="nav-item {{ activeItem('category',['option','field','slider','aboutus','contactus','faq']) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-cogs"></i>
                    <span class="title">Settings</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
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
                        <a href="{{ route('backend.slider.index') }}" class="nav-link ">
                            <span class="title">Slider</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.aboutus.index') }}" class="nav-link ">
                            <span class="title">Aboutus</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.contactus.index') }}" class="nav-link ">
                            <span class="title">Contactus</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.faq.index') }}" class="nav-link ">
                            <span class="title">Faq</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('backend/translations') }}" class="nav-link ">
                            <span class="title">Translations</span>
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