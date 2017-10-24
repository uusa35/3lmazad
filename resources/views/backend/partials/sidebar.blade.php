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
                        <a href="{{ route('backend.ad.index',['type' => 'all']) }}" class="nav-link ">
                            <span class="title">All Ads</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.ad.index') }}" class="nav-link ">
                            <span class="title">Only Valid Ads</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('backend.ad.index',['type' => 'free']) }}" class="nav-link ">
                            <span class="title">Only Valid Free Ads</span>
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
                <h3 class="uppercase">Comments & Abuse Reports</h3>
            </li>
            <li class="nav-item  {{ activeItem('comment',['auction','abuse']) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-comments"></i>
                    <span class="title">Comments & Abuse Reports</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
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
            <li class="nav-item {{ activeItem('category',['option','group','area','field',
            'slider','aboutus','contactus','faq','category',
            'gallery','color','size','type','commercial','model','brand']) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-cogs"></i>
                    <span class="title">Settings</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  {{ activeItem('category',['field','option']) }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Categories & Options</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="{{ route('backend.category.index',['type' => 0]) }}" class="nav-link ">
                                    Categories </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('backend.field.index') }}" class="nav-link "> Fields</a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('backend.option.index') }}" class="nav-link "> Options </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  {{ activeItem('group') }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Groups (Dalelek)</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="{{ route('backend.group.index') }}" class="nav-link ">
                                    Groups </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('backend.group.create') }}" class="nav-link "> Create Group </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ activeItem('slider') }}">
                        <a href="{{ route('backend.slider.index') }}" class="nav-link ">
                            <span class="title">Sliders</span>
                        </a>
                    </li>
                    <li class="nav-item {{ activeItem('commercial') }}">
                        <a href="{{ route('backend.commercial.index') }}" class="nav-link ">
                            <span class="title">Commercials</span>
                        </a>
                    </li>
                    <li class="nav-item {{ activeItem('aboutus') }}">
                        <a href="{{ route('backend.aboutus.index') }}" class="nav-link ">
                            <span class="title">Aboutus</span>
                        </a>
                    </li>
                    <li class="nav-item {{ activeItem('contactus') }}">
                        <a href="{{ route('backend.contactus.index') }}" class="nav-link ">
                            <span class="title">Contactus</span>
                        </a>
                    </li>
                    <li class="nav-item {{ activeItem('faq') }}">
                        <a href="{{ route('backend.faq.index') }}" class="nav-link ">
                            <span class="title">Faq</span>
                        </a>
                    </li>
                    <li class="nav-item {{ activeItem('term') }}">
                        <a href="{{ route('backend.term.index') }}" class="nav-link ">
                            <span class="title">Terms of Condition</span>
                        </a>
                    </li>
                    <li class="nav-item {{ activeItem('area') }}">
                        <a href="{{ route('backend.area.index') }}" class="nav-link ">
                            <span class="title">Providences</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{ url('backend/translations') }}" class="nav-link ">
                            <span class="title">Translations</span>
                        </a>
                    </li>

                    {{--Types--}}
                    <li class="nav-item start {{ activeItem('type') }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Type Section</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start">
                                <a href="{{ route('backend.type.index') }}" class="nav-link ">
                                    <span class="title">Types</span>
                                </a>
                            </li>
                            <li class="nav-item start">
                                <a href="{{ route('backend.type.create') }}" class="nav-link ">
                                    <span class="title">Create New Type</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--Color--}}
                    <li class="nav-item start {{ activeItem('color') }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Color Section</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start">
                                <a href="{{ route('backend.color.index') }}" class="nav-link ">
                                    <span class="title">Colors</span>
                                </a>
                            </li>
                            <li class="nav-item start">
                                <a href="{{ route('backend.color.create') }}" class="nav-link ">
                                    <span class="title">Create New Color</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--Size--}}
                    <li class="nav-item start {{ activeItem('size') }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Size Section</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start">
                                <a href="{{ route('backend.size.index') }}" class="nav-link ">
                                    <span class="title">Sizes</span>
                                </a>
                            </li>
                            <li class="nav-item start">
                                <a href="{{ route('backend.size.create') }}" class="nav-link ">
                                    <span class="title">Create New Size</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--Brands--}}
                    <li class="nav-item start {{ activeItem('brand') }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Brand Section</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start">
                                <a href="{{ route('backend.brand.index') }}" class="nav-link ">
                                    <span class="title">Brands</span>
                                </a>
                            </li>
                            <li class="nav-item start">
                                <a href="{{ route('backend.brand.create') }}" class="nav-link ">
                                    <span class="title">Create New Brand</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--Models--}}
                    <li class="nav-item start {{ activeItem('model') }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Model Section</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start">
                                <a href="{{ route('backend.model.index') }}" class="nav-link ">
                                    <span class="title">Models</span>
                                </a>
                            </li>
                            <li class="nav-item start">
                                <a href="{{ route('backend.model.create') }}" class="nav-link ">
                                    <span class="title">Create New Model</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--Galleries & Images--}}
                    <li class="nav-item start {{ activeItem('image',['gallery']) }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Galleries & Images</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('backend.gallery.index') }}" class="nav-link ">
                                    <span class="title">Galleries</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.image.index') }}" class="nav-link ">
                                    <span class="title">Images</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--Menus--}}
                    <li class="nav-item start {{ activeItem('menu') }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <span class="title">Menus Section</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start">
                                <a href="{{ route('backend.menu.index') }}" class="nav-link ">
                                    <span class="title">Menus</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>