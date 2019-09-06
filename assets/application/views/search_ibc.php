
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
    <title> Excelz - Search</title>
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
<body id="searchPage">
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<!--header start here -->
<?php include('assets/partials/header.php') ?>
<!--header end here-->

<!--page title section-->
<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="assets/img/bg/bg-img.png">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h2 class="page-main-heading">Search <span>Events</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--page title section end-->


<!--events section -->
<section class="pb100">
    <div class="container">

        <div class="event_box">
            <div class="event_info">
                <div class="event_title">
                    Search - Corporate Events
                </div>
            </div>
        </div>

        <div class="row justify-content-center no-gutters event-thumbnail-container">
            <?php if(!empty($ibc_events)){
                foreach ($ibc_events as $event) { ?>
                    <div class="col-md-4 col-sm-6 event-thumbnail">
                        <a href="<?php echo base_url(); ?><?php echo 'event_detail?event_id='.$event['Id']; ?>">
                            <div class="speaker_box">
                                <div class="speaker_img">
                                    <img src="<?php echo $event['EventCoverPhoto']; ?>" alt="Event Cover Photo">
                                    <div class="info_box">
                                        <h5 class="name">FREE</h5>
                                        <!-- <p class="position">CEO Company</p> -->
                                    </div>
                                    <div class="info_box event-type-info-box">
                                        <h5 class="name">IBC Events</h5>
                                        <!-- <p class="position">IBC</p> -->
                                    </div>
                                </div>
                                <div class="event_thumbnail_venue_date">
                                    <p> <i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $event['Country'];  ?></p>
                                    <p><i class="ion-calendar"></i><?php
                                        $date = date("d-m-Y", strtotime($event['StartDate']));
                                        echo $date;
                                        ?></p>
                                </div>
                            </div>
                            <div class="event_word">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 col-12">
                                        <h4><?php echo $event['EventName'];  ?></h4>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                <?php  } }
            else { ?>
                <h1>No Result Found</h1>
            <?php }?>

        </div>
</section>
<!--event section end -->

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