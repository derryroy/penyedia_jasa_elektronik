<!--https://www.linkedin.com/in/irfan-fakhri/-->
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
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png"/>

    <!-- TITLE -->
    <title>Rumahservice.com</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- STYLE CSS -->
    <link href="/assets/css/style.css" rel="stylesheet"/>
<!--    <link href="/assets/css/dark-style.css" rel="stylesheet"/>-->

    <!--- FONT-ICONS CSS -->
<!--    <link href="/assets/css/icons.css" rel="stylesheet"/>-->

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="/assets/colors/color1.css"/>

    <link href="/assets/css/custom.css" rel="stylesheet"/>

</head>

<body class="app ltr landing-page horizontal">

<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="/assets/images/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">

        <?= $this->include('layout/navbar') ?>

        <!--app-content open-->
        <div class="main-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container">

                    <div class="container py-6">

                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <?= $this->renderSection('content') ?>
                    </div>

                </div>
                <!-- CONTAINER CLOSED-->
            </div>
        </div>
        <!--app-content closed-->
    </div>

    <?= $this->include('layout/footer') ?>
</div>

<!-- BACK-TO-TOP -->
<!--<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>-->

<!-- JQUERY JS -->
<script src="/assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- COUNTERS JS-->
<!--<script src="/assets/plugins/counters/counterup.min.js"></script>-->
<!--<script src="/assets/plugins/counters/waypoints.min.js"></script>-->
<!--<script src="/assets/plugins/counters/counters-1.js"></script>-->

<!-- Perfect SCROLLBAR JS-->
<!--<script src="/assets/plugins/owl-carousel/owl.carousel.js"></script>-->
<!--<script src="/assets/plugins/company-slider/slider.js"></script>-->

<!-- Star Rating Js-->
<!--<script src="/assets/plugins/rating/jquery-rate-picker.js"></script>-->
<!--<script src="/assets/plugins/rating/rating-picker.js"></script>-->

<!-- Star Rating-1 Js-->
<!--<script src="/assets/plugins/ratings-2/jquery.star-rating.js"></script>-->
<!--<script src="/assets/plugins/ratings-2/star-rating.js"></script>-->

<!-- Sticky js -->
<script src="/assets/js/sticky.js"></script>

<!-- CUSTOM JS -->
<script src="/assets/js/landing.js"></script>

<?= $this->renderSection('custom-js') ?>

</body>

</html>
