<!-- app-Header -->
<div class="hor-header header">
    <div class="container main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
               href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="/">
                <img src="/assets/images/logo.png" class="header-brand-img light-logo1"
                     alt="logo">
            </a>
            <!-- LOGO -->
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                        aria-controls="navbarSupportedContent-4" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse bg-white px-0" id="navbarSupportedContent-4">
                        <!-- SEARCH -->
                        <div class="header-nav-right p-5">
                            <?php if (!session()->get('user')): ?>
                                <a href="/register"
                                   class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto">Register</a>
                                <a href="/login" class="btn ripple btn-min w-sm btn-primary me-2 my-auto">Login</a>
                            <?php else: ?>
                                <a href="/logout">Logout</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /app-Header -->

<div class="landing-top-header">
    <div class="top sticky">
        <!--APP-SIDEBAR-->
        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <div class="app-sidebar shadow-none bg-transparent horizontal-main">
            <div class="container">
                <div class="row gutters-0">
                    <div class="main-sidemenu navbar navbar-expand px-0 gap-5">
                        <a class="navbar-brand ps-0 d-none d-lg-block" href="/">
                            <img alt="" class="logo-2" src="/assets/images/logo.png">
                        </a>
                        <div class="side-menu flex-grow-1">
                            <form class="w-100" action="/services">
                                <input value="<?= @$search ?>" name="search" type="search" class="form-control dropdown-toggle" id="typehead" placeholder="Cari Servis" autocomplete="off" data-bs-toggle="dropdown" aria-expanded="false">
                            </form>
                        </div>
                        <div class="header-nav-right d-none d-lg-flex">
                            <?php if (!session()->get('user')): ?>
                                <a href="/register"
                                   class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto d-lg-none d-xl-block d-block">Register</a>
                                <a href="/login"
                                   class="btn ripple btn-min w-sm btn-primary me-2 my-auto d-lg-none d-xl-block d-block">Login</a>
                            <?php else: ?>
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= session()->get('user')['name'] ?>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <?php if (session()->get('user')['role'] == 'customer'): ?>
                                                <li><a class="dropdown-item" href="/my-order">Pesanan Saya</a></li>
                                            <?php elseif (session()->get('user')['role'] == 'merchant'): ?>
                                            <li><a class="dropdown-item" href="/merchant">Toko Saya</a></li>
                                            <?php endif ?>
                                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/APP-SIDEBAR-->
    </div>
</div>
