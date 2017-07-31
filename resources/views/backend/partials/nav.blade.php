<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo-default"/> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <i class="fa fa-fw fa-plus-circle"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold">Create New Items</h3>
                            {{--<a href="page_user_profile_1.html">view all</a>--}}
                        </li>
                        <li>
                            <a href="{{ route('backend.faq.create') }}">
                                <span class="details"><i class="fa fa-fw fa-plus-square"></i> Create New Faq</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('backend.slider.create') }}">
                                <span class="details"><i class="fa fa-fw fa-plus-square"></i> Create New Slider</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('backend.plan.create') }}">
                                <span class="details"><i class="fa fa-fw fa-plus-square"></i> Create New Plan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('backend.aboutus.create') }}">
                                <span class="details"><i
                                            class="fa fa-fw fa-plus-square"></i> New about us Section</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('backend.category.create') }}">
                                <span class="details"><i class="fa fa-fw fa-plus-square"></i> Create New Parent Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('backend.field.create') }}">
                                <span class="details"><i class="fa fa-fw fa-plus-square"></i> Create New Category Field</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                {{--<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">--}}
                {{--<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"--}}
                {{--data-close-others="true">--}}
                {{--<i class="icon-envelope-open"></i>--}}
                {{--<span class="badge badge-default"> 4 </span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu">--}}
                {{--<li class="external">--}}
                {{--<h3>You have--}}
                {{--<span class="bold">7 New</span> Messages</h3>--}}
                {{--<a href="app_inbox.html">view all</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<span class="photo">--}}
                {{--<img src="../assets/layouts/layout3/img/avatar2.jpg"--}}
                {{--class="img-circle" alt=""> </span>--}}
                {{--<span class="subject">--}}
                {{--<span class="from"> Lisa Wong </span>--}}
                {{--<span class="time">Just Now </span>--}}
                {{--</span>--}}
                {{--<span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<span class="photo">--}}
                {{--<img src="../assets/layouts/layout3/img/avatar3.jpg"--}}
                {{--class="img-circle" alt=""> </span>--}}
                {{--<span class="subject">--}}
                {{--<span class="from"> Richard Doe </span>--}}
                {{--<span class="time">16 mins </span>--}}
                {{--</span>--}}
                {{--<span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<span class="photo">--}}
                {{--<img src="../assets/layouts/layout3/img/avatar1.jpg"--}}
                {{--class="img-circle" alt=""> </span>--}}
                {{--<span class="subject">--}}
                {{--<span class="from"> Bob Nilson </span>--}}
                {{--<span class="time">2 hrs </span>--}}
                {{--</span>--}}
                {{--<span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<span class="photo">--}}
                {{--<img src="../assets/layouts/layout3/img/avatar2.jpg"--}}
                {{--class="img-circle" alt=""> </span>--}}
                {{--<span class="subject">--}}
                {{--<span class="from"> Lisa Wong </span>--}}
                {{--<span class="time">40 mins </span>--}}
                {{--</span>--}}
                {{--<span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<span class="photo">--}}
                {{--<img src="../assets/layouts/layout3/img/avatar3.jpg"--}}
                {{--class="img-circle" alt=""> </span>--}}
                {{--<span class="subject">--}}
                {{--<span class="from"> Richard Doe </span>--}}
                {{--<span class="time">46 mins </span>--}}
                {{--</span>--}}
                {{--<span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                        <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                {{--<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">--}}
                {{--<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"--}}
                {{--data-close-others="true">--}}
                {{--<i class="icon-calendar"></i>--}}
                {{--<span class="badge badge-default"> 3 </span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu extended tasks">--}}
                {{--<li class="external">--}}
                {{--<h3>You have--}}
                {{--<span class="bold">12 pending</span> tasks</h3>--}}
                {{--<a href="app_todo.html">view all</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">--}}
                {{--<li>--}}
                {{--<a href="javascript:;">--}}
                {{--<span class="task">--}}
                {{--<span class="desc">New release v1.2 </span>--}}
                {{--<span class="percent">30%</span>--}}
                {{--</span>--}}
                {{--<span class="progress">--}}
                {{--<span style="width: 40%;" class="progress-bar progress-bar-success"--}}
                {{--aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">--}}
                {{--<span class="sr-only">40% Complete</span>--}}
                {{--</span>--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:;">--}}
                {{--<span class="task">--}}
                {{--<span class="desc">Application deployment</span>--}}
                {{--<span class="percent">65%</span>--}}
                {{--</span>--}}
                {{--<span class="progress">--}}
                {{--<span style="width: 65%;" class="progress-bar progress-bar-danger"--}}
                {{--aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">--}}
                {{--<span class="sr-only">65% Complete</span>--}}
                {{--</span>--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:;">--}}
                {{--<span class="task">--}}
                {{--<span class="desc">Mobile app release</span>--}}
                {{--<span class="percent">98%</span>--}}
                {{--</span>--}}
                {{--<span class="progress">--}}
                {{--<span style="width: 98%;" class="progress-bar progress-bar-success"--}}
                {{--aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">--}}
                {{--<span class="sr-only">98% Complete</span>--}}
                {{--</span>--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:;">--}}
                {{--<span class="task">--}}
                {{--<span class="desc">Database migration</span>--}}
                {{--<span class="percent">10%</span>--}}
                {{--</span>--}}
                {{--<span class="progress">--}}
                {{--<span style="width: 10%;" class="progress-bar progress-bar-warning"--}}
                {{--aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">--}}
                {{--<span class="sr-only">10% Complete</span>--}}
                {{--</span>--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:;">--}}
                {{--<span class="task">--}}
                {{--<span class="desc">Web server upgrade</span>--}}
                {{--<span class="percent">58%</span>--}}
                {{--</span>--}}
                {{--<span class="progress">--}}
                {{--<span style="width: 58%;" class="progress-bar progress-bar-info"--}}
                {{--aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">--}}
                {{--<span class="sr-only">58% Complete</span>--}}
                {{--</span>--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:;">--}}
                {{--<span class="task">--}}
                {{--<span class="desc">Mobile development</span>--}}
                {{--<span class="percent">85%</span>--}}
                {{--</span>--}}
                {{--<span class="progress">--}}
                {{--<span style="width: 85%;" class="progress-bar progress-bar-success"--}}
                {{--aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">--}}
                {{--<span class="sr-only">85% Complete</span>--}}
                {{--</span>--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="javascript:;">--}}
                {{--<span class="task">--}}
                {{--<span class="desc">New UI release</span>--}}
                {{--<span class="percent">38%</span>--}}
                {{--</span>--}}
                {{--<span class="progress progress-striped">--}}
                {{--<span style="width: 38%;"--}}
                {{--class="progress-bar progress-bar-important" aria-valuenow="18"--}}
                {{--aria-valuemin="0" aria-valuemax="100">--}}
                {{--<span class="sr-only">38% Complete</span>--}}
                {{--</span>--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                        <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <img alt="" class="img-circle"
                             src="{{ asset('storage/uploads/images/thumbnail/'.$user->avatar) }}"/>
                        <span class="username username-hide-on-mobile"> {{ $user->name }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="fa fa-fw fa-arrow-left"></i> Back To Home page</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('backend/translations') }}">
                                <i class="fa fa-fw fa-language"></i> Translations </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                Log Out </a>
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="fa fa-sign-out" aria-hidden="true"></span>
                    </a>
                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>