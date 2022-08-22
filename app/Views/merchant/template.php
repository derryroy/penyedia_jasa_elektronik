<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
          content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Rumahservice.com </title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="/assets/css/style.css" rel="stylesheet" />
<!--    <link href="/assets/css/dark-style.css" rel="stylesheet" />-->
<!--    <link href="/assets/css/transparent-style.css" rel="stylesheet">-->
<!--    <link href="/assets/css/skin-modes.css" rel="stylesheet" />-->

    <!--- FONT-ICONS CSS -->
<!--    <link href="/assets/css/icons.css" rel="stylesheet" />-->

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="/assets/colors/color1.css" />

    <link href="/assets/css/custom.css" rel="stylesheet"/>

</head>

<body class="app sidebar-mini ltr light-mode">

<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="/assets/images/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">

        <!-- app-Header -->
        <div class="app-header header sticky">
            <div class="container-fluid main-container">
                <div class="d-flex">
                    <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                    <!-- sidebar-toggle-->
                    <a class="logo-horizontal " href="/merchant">
                        <img src="/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                        <img src="/assets/images/logo.png" class="header-brand-img light-logo1"
                             alt="logo">
                    </a>
                    <!-- LOGO -->
                    <div class="main-header-center ms-3 d-none d-lg-block">
<!--                        <input type="text" class="form-control" id="typehead" placeholder="Search for results...">-->
<!--                        <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>-->
                    </div>
                    <div class="d-flex order-lg-2 ms-auto header-right-icons">
                        <!-- SEARCH -->
                        <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                        </button>
                        <div class="navbar navbar-collapse responsive-navbar p-0">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                <div class="d-flex order-lg-2">
                                    <div class="dropdown d-lg-none d-flex">
                                        <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                            <i class="fe fe-search"></i>
                                        </a>
                                        <div class="dropdown-menu header-search dropdown-menu-start">
                                            <div class="input-group w-100 p-2">
                                                <input type="text" class="form-control" placeholder="Search....">
                                                <div class="input-group-text btn btn-primary">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- COUNTRY -->
<!--                                    <div class="d-flex country">-->
<!--                                        <a class="nav-link icon theme-layout nav-link-bg layout-setting">-->
<!--                                            <span class="dark-layout"><i class="fe fe-moon"></i></span>-->
<!--                                            <span class="light-layout"><i class="fe fe-sun"></i></span>-->
<!--                                        </a>-->
<!--                                    </div>-->
                                    <!-- Theme-Layout -->
<!--                                    <div class="dropdown  d-flex notifications">-->
<!--                                        <a class="nav-link icon" data-bs-toggle="dropdown"><i-->
<!--                                                    class="fe fe-bell"></i><span class=" pulse"></span>-->
<!--                                        </a>-->
<!--                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">-->
<!--                                            <div class="drop-heading border-bottom">-->
<!--                                                <div class="d-flex">-->
<!--                                                    <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">Notifications-->
<!--                                                    </h6>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="notifications-menu">-->
<!--                                                <a class="dropdown-item d-flex" href="notify-list.html">-->
<!--                                                    <div class="me-3 notifyimg  bg-primary brround box-shadow-primary">-->
<!--                                                        <i class="fe fe-mail"></i>-->
<!--                                                    </div>-->
<!--                                                    <div class="mt-1 wd-80p">-->
<!--                                                        <h5 class="notification-label mb-1">New Application received-->
<!--                                                        </h5>-->
<!--                                                        <span class="notification-subtext">3 days ago</span>-->
<!--                                                    </div>-->
<!--                                                </a>-->
<!--                                                <a class="dropdown-item d-flex" href="notify-list.html">-->
<!--                                                    <div class="me-3 notifyimg  bg-secondary brround box-shadow-secondary">-->
<!--                                                        <i class="fe fe-check-circle"></i>-->
<!--                                                    </div>-->
<!--                                                    <div class="mt-1 wd-80p">-->
<!--                                                        <h5 class="notification-label mb-1">Project has been-->
<!--                                                            approved</h5>-->
<!--                                                        <span class="notification-subtext">2 hours ago</span>-->
<!--                                                    </div>-->
<!--                                                </a>-->
<!--                                                <a class="dropdown-item d-flex" href="notify-list.html">-->
<!--                                                    <div class="me-3 notifyimg  bg-success brround box-shadow-success">-->
<!--                                                        <i class="fe fe-shopping-cart"></i>-->
<!--                                                    </div>-->
<!--                                                    <div class="mt-1 wd-80p">-->
<!--                                                        <h5 class="notification-label mb-1">Your Product Delivered-->
<!--                                                        </h5>-->
<!--                                                        <span class="notification-subtext">30 min ago</span>-->
<!--                                                    </div>-->
<!--                                                </a>-->
<!--                                                <a class="dropdown-item d-flex" href="notify-list.html">-->
<!--                                                    <div class="me-3 notifyimg bg-pink brround box-shadow-pink">-->
<!--                                                        <i class="fe fe-user-plus"></i>-->
<!--                                                    </div>-->
<!--                                                    <div class="mt-1 wd-80p">-->
<!--                                                        <h5 class="notification-label mb-1">Friend Requests</h5>-->
<!--                                                        <span class="notification-subtext">1 day ago</span>-->
<!--                                                    </div>-->
<!--                                                </a>-->
<!--                                            </div>-->
<!--                                            <div class="dropdown-divider m-0"></div>-->
<!--                                            <a href="notify-list.html"-->
<!--                                               class="dropdown-item text-center p-3 text-muted">View all-->
<!--                                                Notification</a>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <!-- NOTIFICATIONS -->
                                    <div class="dropdown d-flex profile-1">
                                        <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                            <img src="/assets/images/users/21.jpg" alt="profile-user"
                                                 class="avatar  profile-user brround cover-image">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <div class="drop-heading">
                                                <div class="text-center">
                                                    <h5 class="text-dark mb-0 fs-14 fw-semibold"><?= session()->get('user')['name'] ?></h5>
                                                    <small class="text-muted">Merchant</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider m-0"></div>
<!--                                            <a class="dropdown-item" href="profile.html">-->
<!--                                                <i class="dropdown-icon fe fe-user"></i> Profile-->
<!--                                            </a>-->
<!--                                            <a class="dropdown-item" href="email-inbox.html">-->
<!--                                                <i class="dropdown-icon fe fe-mail"></i> Inbox-->
<!--                                                <span class="badge bg-danger rounded-pill float-end">5</span>-->
<!--                                            </a>-->
<!--                                            <a class="dropdown-item" href="lockscreen.html">-->
<!--                                                <i class="dropdown-icon fe fe-lock"></i> Lockscreen-->
<!--                                            </a>-->
                                            <a class="dropdown-item" href="/logout">
                                                <i class="dropdown-icon fe fe-alert-circle"></i> Logout
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /app-Header -->

        <?= $this->include('merchant/sidebar') ?>

        <!--app-content open-->
        <div class="main-content app-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success mt-5" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger mt-5" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <?= $this->renderSection('content') ?>

                </div>
                <!-- CONTAINER END -->
            </div>
        </div>
        <!--app-content close-->
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    Copyright © <span id="year"></span> <a href="javascript:void(0)">Sash</a>. Designed with <span
                            class="fa fa-heart text-danger"></span> by <a href="javascript:void(0)"> Spruko </a> All rights reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->

</div>

<!-- BACK-TO-TOP -->
<!--<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>-->

<!-- JQUERY JS -->
<script src="/assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SIDE-MENU JS -->
<script src="/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- SIDEBAR JS -->
<script src="/assets/plugins/sidebar/sidebar.js"></script>

<!-- DATA TABLE JS-->
<script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="/assets/js/table-data.js"></script>

<!-- Perfect SCROLLBAR JS-->
<!--<script src="/assets/plugins/p-scroll/perfect-scrollbar.js"></script>-->
<!--<script src="/assets/plugins/p-scroll/pscroll.js"></script>-->

<!-- Color Theme js -->
<script src="/assets/js/themeColors.js"></script>

<!-- Sticky js -->
<script src="/assets/js/sticky.js"></script>

<!-- CUSTOM JS -->
<script src="/assets/js/custom.js"></script>

<?= $this->renderSection('custom-js') ?>

</body>

</html>
