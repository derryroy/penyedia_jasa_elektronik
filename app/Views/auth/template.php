
<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--    <meta name="description" content="Rumahservice.com">-->
<!--    <meta name="author" content="Spruko Technologies Private Limited">-->
<!--    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">-->

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png" />

    <!-- TITLE -->
    <title>Rumahservice.com</title>

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

</head>

<body class="app sidebar-mini ltr login-img">

<!-- BACKGROUND-IMAGE -->
<div class="">

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="">

            <div class="container-login100">
                <div class="wrap-login100 p-6">

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success mt-0" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger mt-0" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <?= $this->renderSection('content') ?>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!-- End PAGE -->

</div>
<!-- BACKGROUND-IMAGE CLOSED -->

<!-- JQUERY JS -->
<script src="/assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SHOW PASSWORD JS -->
<script src="/assets/js/show-password.min.js"></script>

<!-- GENERATE OTP JS -->
<!--<script src="/assets/js/generate-otp.js"></script>-->

<!-- Perfect SCROLLBAR JS-->
<!--<script src="/assets/plugins/p-scroll/perfect-scrollbar.js"></script>-->

<!-- Color Theme js -->
<script src="/assets/js/themeColors.js"></script>

<!-- CUSTOM JS -->
<script src="/assets/js/custom.js"></script>


</body>

</html>
