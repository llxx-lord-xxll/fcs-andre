<!DOCTYPE html>
<html lang="en">

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8">
    <title>@yield('title'){{config('app.name')}}</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/fonts/line-awesome/css/line-awesome.min.css')}}">
    <!--<link rel="stylesheet" type="text/css" href="{{asset('user/assets/fonts/open-sans/styles.css')}}">-->

    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/fonts/montserrat/styles.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/tether/css/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/jscrollpane/jquery.jscrollpane.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/common.min.css')}}">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/themes/primary.min.css')}}">
    <link class="ks-sidebar-dark-style" rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/themes/sidebar-black.min.css')}}">
    <!-- END THEME STYLES -->



    <style type="text/css">
       .dataTables_filter{
           text-align: right;
       }
    </style>
    @hasSection('stylesheets')
    @yield('stylesheets')
    @endif
</head>
<!-- END HEAD -->

<body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> <!-- remove ks-page-header-fixed to unfix header -->

<!-- BEGIN HEADER -->
<nav class="navbar ks-navbar">
    <!-- BEGIN HEADER INNER -->
    <!-- BEGIN LOGO -->
    <div href="#" class="navbar-brand">
        <!-- BEGIN RESPONSIVE SIDEBAR TOGGLER -->
        <a href="#" class="ks-sidebar-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
        <a href="#" class="ks-sidebar-mobile-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
        <!-- END RESPONSIVE SIDEBAR TOGGLER -->

        <div class="ks-navbar-logo">
            <a href="#" class="ks-logo">FutureCitySummit</a>
        </div>
    </div>
    <!-- END LOGO -->

    <!-- BEGIN MENUS -->
    <div class="ks-wrapper">
        <nav class="nav navbar-nav">
            <!-- BEGIN NAVBAR MENU -->
            <div class="ks-navbar-menu">
                <form class="ks-search-form">
                    <a class="ks-search-open" href="#">
                        <span class="la la-search"></span>
                    </a>
                    <div class="ks-wrapper">
                        <div class="input-icon icon-right icon icon-lg icon-color-primary">
                            <input id="input-group-icon-text" type="text" class="form-control" placeholder="Search...">
                            <span class="icon-addon">
                                <span class="la la-search ks-icon"></span>
                            </span>
                        </div>
                        <a class="ks-search-close" href="#">
                            <span class="la la-close"></span>
                        </a>
                    </div>
                </form>


            </div>
            <!-- END NAVBAR MENU -->

            <!-- BEGIN NAVBAR ACTIONS -->
            <div class="ks-navbar-actions">

                <!-- BEGIN NAVBAR NOTIFICATIONS -->
                <div class="nav-item dropdown ks-notifications">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="la la-bell ks-icon" aria-hidden="true">
                            <span class="badge badge-pill badge-info">7</span>
                        </span>
                        <span class="ks-text">Notifications</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">
                        <ul class="nav nav-tabs ks-nav-tabs ks-info" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-toggle="tab" data-target="#navbar-notifications-all" role="tab">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#navbar-notifications-activity" role="tab">Sales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#navbar-notifications-comments" role="tab">Chapters</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane ks-notifications-tab active" id="navbar-notifications-all" role="tabpanel">
                                <div class="ks-wrapper ks-scrollable">
                                    <a href="#" class="ks-notification">
                                        <div class="ks-avatar">
                                            <img src="{{asset('user/assets/img/avatars/avatar-3.jpg')}}" width="36" height="36">
                                        </div>
                                        <div class="ks-info">
                                            <div class="ks-user-name">Arifuzzaman <span class="ks-description">has created a chapter</span></div>
                                            <div class="ks-text"><span class="la la-file-text-o ks-icon"></span> logo vector doc</div>
                                            <div class="ks-datetime">1 minute ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="ks-notification">
                                        <div class="ks-action">
                                            <span class="ks-default">
                                                <span class="la la-briefcase ks-icon"></span>
                                            </span>
                                        </div>
                                        <div class="ks-info">
                                            <div class="ks-user-name">New project created</div>
                                            <div class="ks-text">Dashboard UI</div>
                                            <div class="ks-datetime">1 minute ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="ks-notification">
                                        <div class="ks-action">
                                            <span class="ks-error">
                                                <span class="la la-times-circle ks-icon"></span>
                                            </span>
                                        </div>
                                        <div class="ks-info">
                                            <div class="ks-user-name">File upload error</div>
                                            <div class="ks-text"><span class="la la-file-text-o ks-icon"></span> logo vector doc</div>
                                            <div class="ks-datetime">10 minutes ago</div>
                                        </div>
                                    </a>
                                </div>

                                <div class="ks-view-all">
                                    <a href="#">Show more</a>
                                </div>
                            </div>
                            <div class="tab-pane ks-empty" id="navbar-notifications-activity" role="tabpanel">
                                There are no activities.
                            </div>
                            <div class="tab-pane ks-empty" id="navbar-notifications-comments" role="tabpanel">
                                There are no comments.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END NAVBAR NOTIFICATIONS -->

                <!-- BEGIN NAVBAR USER -->
                <div class="nav-item dropdown ks-user">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="ks-avatar">
                            <img src="{{asset('user/assets/img/avatars/avatar-14.jpg')}}" width="36" height="36">
                        </span>
                        <span class="ks-info">
                            <span class="ks-name">Andre Kwok</span>
                            <span class="ks-description">Super Admin</span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Preview">
                        <a class="dropdown-item" href="#">
                            <span class="la la-user ks-icon"></span>
                            <span>Profile</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <span class="la la-question-circle ks-icon" aria-hidden="true"></span>
                            <span>Help</span>
                        </a>
                        <a class="dropdown-item" href="{{asset('/logout')}}">
                            <span class="la la-sign-out ks-icon" aria-hidden="true"></span>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
                <!-- END NAVBAR USER -->
            </div>
            <!-- END NAVBAR ACTIONS -->
        </nav>

        <!-- BEGIN NAVBAR ACTIONS TOGGLER -->
        <nav class="nav navbar-nav ks-navbar-actions-toggle">
            <a class="nav-item nav-link" href="#">
                <span class="la la-ellipsis-h ks-icon ks-open"></span>
                <span class="la la-close ks-icon ks-close"></span>
            </a>
        </nav>
        <!-- END NAVBAR ACTIONS TOGGLER -->

        <!-- BEGIN NAVBAR MENU TOGGLER -->
        <nav class="nav navbar-nav ks-navbar-menu-toggle">
            <a class="nav-item nav-link" href="#">
                <span class="la la-th ks-icon ks-open"></span>
                <span class="la la-close ks-icon ks-close"></span>
            </a>
        </nav>
        <!-- END NAVBAR MENU TOGGLER -->
    </div>
    <!-- END MENUS -->
    <!-- END HEADER INNER -->
</nav>
<!-- END HEADER -->






<div class="ks-page-container ks-dashboard-tabbed-sidebar-fixed-tabs">

    <!-- BEGIN DEFAULT SIDEBAR -->
    <div class="ks-column ks-sidebar ks-info">
        <div class="ks-wrapper">
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item ks-user dropdown">
                    <a class="nav-link"  href="#" role="button">
                        <img src="{{asset('user/assets/img/avatars/avatar-14.jpg')}}" width="36" height="36" class="ks-avatar rounded-circle">
                        <div class="ks-info">
                            <div class="ks-name">Andre Kwok</div>
                            <div class="ks-text">Super Admin</div>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/cpfcs/dashboard')}}">
                        <span class="ks-icon la la-dashboard"></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/cpfcs/posts')}}">
                        <span class="ks-icon la la-newspaper-o"></span>
                        <span>Posts</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/cpfcs/chapters')}}">
                        <span class="ks-icon la la-flag"></span>
                        <span>Manage Chapters</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/cpfcs/users')}}">
                        <span class="ks-icon la la-user"></span>
                        <span>Manage Users</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="ks-icon la la-gears"></span>
                        <span>Website Settings</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
    <!-- END DEFAULT SIDEBAR -->


@yield('page')


</div>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('user/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('user/libs/responsejs/response.min.js')}}"></script>
<script src="{{asset('user/libs/loading-overlay/loadingoverlay.min.js')}}"></script>
<script src="{{asset('user/libs/tether/js/tether.min.js')}}"></script>
<script src="{{asset('user/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('user/libs/jscrollpane/jquery.jscrollpane.min.js')}}"></script>
<script src="{{asset('user/libs/jscrollpane/jquery.mousewheel.js')}}"></script>
<script src="{{asset('user/libs/flexibility/flexibility.js')}}"></script>
<script src="{{asset('user/libs/noty/noty.min.js')}}"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('user/assets/scripts/common.min.js')}}"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<script src="{{asset('user/libs/d3/d3.min.js')}}"></script>
<script src="{{asset('user/libs/c3js/c3.min.js')}}"></script>
<script src="{{asset('user/libs/noty/noty.min.js')}}"></script>
<script src="{{asset('user/libs/maplace/maplace.min.js')}}"></script>
<script src="https://maps.google.com/maps/api/js?libraries=geometry&v=3.26&key=AIzaSyBBjLDxcCjc4s9ngpR11uwBWXRhyp3KPYM"></script>
@yield('scripts')



<div class="ks-mobile-overlay"></div>

</body>
</html>