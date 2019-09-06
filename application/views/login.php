
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="description" content="Evento -Event Html Template">
    <meta name="keywords" content="Evento , Event , Html, Template">
    <meta name="author" content="ColorLib">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ========== Title ========== -->
    <title> Excelz - Login</title>
    <!-- ========== Favicon Ico ========== -->
    <!--<link rel="icon" href="fav.ico">-->
    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts Icon CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/et-line.css" rel="stylesheet">
    <link href="assets/css/ionicons.min.css" rel="stylesheet">
    <!-- Carousel CSS -->
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<!--header start here -->
<?php include('assets/partials/header.php') ?>
<!--header end here-->

<!--page title section-->
<section class="inner_cover parallax-window event-details-header" data-parallax="scroll" data-image-src="assets/img/events/event1.png">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h2 class="page-main-heading">Login</h2>
                    <div class="loginform-main">
                        <div class="contact_form">
                            <?php echo form_open('login_check');  ?>

                            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
                            <?php
                            if($error_msg) { ?>
                                <div class="alert alert-danger">
                                    <?php echo $error_msg; ?>
                                </div>
                            <?php    }  ?>

                            <div class="form-group">
                                <input id="email" name="email" type="text" class="form-control" placeholder="Email">
                            </div>
                            <?php echo form_error('email'); ?>
                            <div class="form-group">
                                <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                <?php echo form_error('password'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="loginbtn" class="btn btn-rounded btn-primary">Login</button>
                            </div>
                            <p>Don't have an account yet? <a href="<?php echo base_url('signup');  ?>"><strong>Create new account</strong></a></p>
                            <div class="alert alert-danger login-alert">Please enter valid login details</div>
                            <?php echo form_close();  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--page title section end-->

<!--footer start -->
<?php include('assets/partials/footer.php') ?>
<!--footer end -->

<!-- jquery -->
<script src="assets/js/jquery.min.js"></script>
<!-- bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<!--slick carousel -->
<script src="assets/js/owl.carousel.min.js"></script>
<!--parallax -->
<script src="assets/js/parallax.min.js"></script>
<!--Counter up -->
<script src="assets/js/jquery.counterup.min.js"></script>
<!--Counter down -->
<script src="assets/js/jquery.countdown.min.js"></script>
<!-- WOW JS -->
<script src="assets/js/wow.min.js"></script>
<!-- Custom js -->
<script src="assets/js/main.js"></script>
</body>
</html>
