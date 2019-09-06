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
    <title> Excelz - Event Detail</title>
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
<?php foreach($events_specific as $event_s) { ?>
<section class="inner_cover parallax-window event-details-header" data-parallax="scroll" data-image-src="assets/img/bg/bg-img.png">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h2 class="page-main-heading"><?php echo $event_s['EventName']; ?></h2>
                    <h4 class="event-details-header-location"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $event_s['CountryName']; ?></h4>
                    <h4><i class="ion-calendar"></i>  <?php  $date = date("d-M-Y", strtotime($event_s['StartDate']));
                        echo $date;  ?></p></h4>
                    <h5><?php echo $event_s['EventSize']; ?></h5>
                    <div class="event-details-header-actionbtn">
                        <?php if($event_s['RegistrationUrl'] == '') { ?>
                                 <div class="top">
                                       <h1 class="btn btn-primary btn-rounded" id="buyTicketHeading">Register Now</h1>
                                   </div>
                       <?php } else { ?>
                        <a id="buyTicketButton" href="<?php echo $event_s['RegistrationUrl']; ?>" class="btn btn-primary btn-rounded" >
                            Register Now
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--page title section end-->

<!--about section -->
<section class="pt50 pb50">
    <div class="container">
        <div class="section_title">
            <h3 class="title">
                Event Details
            </h3>
        </div>
        <div class="row justify-content-center event-details-section">
            <div class="col-12 col-md-12 left">
                <div class="row justify-content-center">
                    <div class="col-6 col-md-3">
                        <div class="counter_box">
                            <i class="fa fa-ticket fa-4x" aria-hidden="true"></i>
                            <h5>Ticket Price</h5>
                            <span>€<?php echo $event_s['TicketPrice']; ?></span>

                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="counter_box">
                            <i class="fa fa-compass fa-4x" aria-hidden="true"></i>
                            <h5>Event Type</h5>
                            <span><?php echo $event_s['EventTypeName']; ?></span>

                        </div>
                    </div>

                    <div class="counter_box">
                        <i class="fa fa-life-ring fa-4x" aria-hidden="true"></i>
                        <h5>Category</h5>
                        <span><?php echo $event_s['CategoryName']; ?></span>

                    </div>

                    <div class="col-6 col-md-3">
                        <div class="counter_box">
                            <i class="fa fa-globe fa-4x" aria-hidden="true"></i>
                            <h5>Size</h5>
                            <span><?php echo $event_s['EventSize']; ?></span>

                        </div>
                    </div>


                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!--about section end -->



<section class="pt50 pb50" style="width: 50%; float: left; display: none;">
    <div class="container" id="contactDetails">
        <div class="section_title">
            <h3 class="title">
                Contact Details
            </h3>
        </div>
        <div class="row justify-content-center event-details-section">
            <div class="col-12 col-md-12">
                <div id="middleDiv" class="row justify-content-center mt30 middle" >
                    <!-- <div class="col-12 col-md-4">
                        <div class="counter_box">
                           <span>12-02-2019</span>
                            <h5>Date</h5>
                        </div>
                    </div> -->
                    <div class="col-12 col-md-12">
                        <div class="counter_box">
                            <span><?php echo $event_s['ContactPersonName']; ?></span>
                            <h5>Contact Person</h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="counter_box">
                            <span>Marylebone Rd, Marylebone, London NW1 5LR, UK</span>
                            <h5>Full Address</h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="counter_box">
                            <span>08:00 - 12-02-2019</span>
                            <h5>Start Time</h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="counter_box">
                            <span>18:00 - 14-02-2019</span>
                            <h5>End Time</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row justify-content-center mt50">
            <div class="col-12 col-md-12">
                <div class="row justify-content-center mt30">
                    <div class="col-12 col-md-4">
                        <div class="counter_box">
                           <span>+</span><span class="counter">1000</span>
                            <h5>Happy Audience</h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="counter_box">
                            <span class="counter">14</span><span>K</span>
                            <h5>Followers on FB</h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="counter_box">
                            <span class="counter">732</span>
                            <h5>Finished Projects</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</section>

<section class="pb100">
    <div class="container">
        <div class="section_title">
            <h3 class="title">
                ADDITIONAL INFORMATION
            </h3>
        </div>
        <div class="row justify-content-center event-details-section">
            <div class="col-12 col-md-12">
                <p><?php  echo $event_s['AdditionalInformation'];  ?></p>
            </div>
        </div>
    </div>
    
</section>

<!--speaker section-->
<section class="">
    <div class="section_title">
        <h3 class="title">
            Speakers
        </h3>
    </div>
    <div class="row justify-content-center no-gutters">
       <?php if(empty($events_speakers)) { echo 'No Speaker Found'; } else { ?>
       <?php foreach($events_speakers as $event_spe) {?>
        <div class="col-md-3 col-sm-6">
            <div class="speaker_box">
                <div class="speaker_img">
                    <img src="<?php  echo $event_spe['DisplayPicture'];  ?>" alt="speaker name" style="width:370px; height:272px;">
                    <div class="info_box">
                        <h5 class="name"><?php echo (empty($event_spe['FullName'])) ? 'No Speaker' : $event_spe['FullName']; ?></h5>
                    </div>
                </div>

            </div>
        </div>
     <?php } } ?>
    </div>
</section>
<!--speaker section end -->
</br></br>
<section class="pb100">
    <div class="container">
        <div class="section_title">
            <h3 class="title">
                Event Schedule
            </h3>
        </div>
        <div class="row justify-content-center event-schedule-section">
            <div class="col-sm12 col-md-12 event-schedule-outer r1">
                <div class="col-sm2 col-md-2 event-schedule-inner">

                    <?php  $date = date("d-m-Y", strtotime($event_s['StartDate']));
                    echo $date;  ?></p>
                </div>
                <div class="col-sm4 col-md-4 event-schedule-inner">
                    Registration
                </div>
                <div class="col-sm3 col-md-3 event-schedule-inner">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>   <?php  echo $event_s['Regtimeone'];  ?>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>   <?php  echo $event_s['Regtimetwo'];  ?>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>   <?php  echo $event_s['Regtimethree'];  ?>
                </div>
                <div class="col-sm3 col-md-3 event-schedule-inner">
                    <div style="background-image: url('assets/img/speakers/male-avatar.png'); background-position: center; background-size: contain; background-repeat: no-repeat; height: 50px; width: 50px; border-radius: 50%; float: right;"></div>
                </div>
            </div>
            <div class="col-sm12 col-md-12 event-schedule-outer r2">
                <div class="col-sm2 col-md-2 event-schedule-inner">
                    <?php  $date = date("d-m-Y", strtotime($event_s['StartDate']));
                    echo $date;  ?></p>
                </div>
                <div class="col-4 col-md-4 event-schedule-inner">
                    Start Time
                </div>
                <div class="col-sm3 col-md-3 event-schedule-inner">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>   <?php  echo $event_s['Starttimeone'];  ?>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>   <?php  echo $event_s['Starttimetwo'];  ?>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>   <?php  echo $event_s['Starttimethree'];  ?>
                </div>
                <div class="col-sm3 col-md-3 event-schedule-inner">
                    <div style="background-image: url('assets/img/speakers/male-avatar.png'); background-position: center; background-size: contain; background-repeat: no-repeat; height: 50px; width: 50px; border-radius: 50%; float: right;"></div>
                </div>
            </div>
            <div class="col-sm12 col-md-12 event-schedule-outer r3">
                <div class="col-2 col-md-2 event-schedule-inner">
                    <?php  $date = date("d-m-Y", strtotime($event_s['StartDate']));
                    echo $date;  ?></p>
                </div>
                <div class="col-sm4 col-md-4 event-schedule-inner">
                    End Time
                </div>
                <div class="col-sm3 col-md-3 event-schedule-inner">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>   <?php  echo $event_s['Endtimeone'];  ?>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>   <?php  echo $event_s['Endtimetwo'];  ?>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>   <?php  echo $event_s['Endtimethree'];  ?>
                </div>
                <div class="col-sm3 col-md-3 event-schedule-inner">
                    <div style="background-image: url('assets/img/speakers/male-avatar.png'); background-position: center; background-size: contain; background-repeat: no-repeat; height: 50px; width: 50px; border-radius: 50%; float: right;"></div>
                </div>
            </div>
        </div>
    </div>
</section>


    <div class="container" id="organizerDetails">
        <div class="section_title">
            <h3 class="title">
                Organizer's Details
            </h3>
        </div>
        <div class="row justify-content-center event-details-section">
        </div>
        <div class="col-md-12 col-sm-12 organizer-details">
            <div class="organizer-info-main">
                <div class="organizer-info-text">
                    <div class="counter_box">
                        <h5><i class="ion-person"></i> Contact Person: <strong><?php  echo $event_s['ContactPersonName'];  ?></strong></h5>
                    </div>
                    <div class="counter_box">
                        <h5><i class="fa fa-phone" aria-hidden="true"></i> Phone Number: <strong><?php  echo $event_s['ContactPersonPhone'];  ?></strong></h5>
                    </div>
                    <div class="counter_box">
                        <h5><i class="ion-email"></i> Email Address: <strong><?php  echo $event_s['ContactPersonEmail'];  ?></strong></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </br></br>
<!--get tickets section -->
    <section class="bg-img pt100 pb100" style="background-image: url('assets/img/bg/tickets.png');">
        <div class="container">
            <div class="section_title mb30">
                <h3 class="title color-light">
                    Grab your tickets
                </h3>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 text-center color-light">
                    In one simple step, your ticket will be booked. Please click on the link and get your tickets. Don't waste more time!
                </div>
                <div class="col-md-12 text-center">
                    <a href="#" class="btn btn-primary btn-rounded mt30">buy now</a>
                </div>
            </div>
        </div>
    </section>
<!--get tickets section end-->

    <section>
        <?php if($events_specific[0]['EventTypeCategory'] == '1'){ ?>
            <div class="row justify-content-center no-gutters">
                <div class="col-md-6 col-sm-6">
                    <div class="mapouter"><div class="gmap_canvas"><img style="width: 100%; height: 600px" src="<?php echo base_url(); ?>assets/img/event_management.jpg"></div>
                </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="organizer-info-main">
                        <div class="section_title">
                            <h5 class="title">
                                This is an online event
                            </h5>
                        </div>

                    </div>
                </div>
            </div>

        <?php }else{ ?>
            <div class="row justify-content-center no-gutters">
                <div class="col-md-6 col-sm-6">
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q=DELINK%20MOTEL%2C%20nigeria&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de">pure black</a></div><style>.mapouter{text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="organizer-info-main">
                        <div class="section_title">
                            <h3 class="title">
                                Venue Information
                            </h3>
                        </div>
                        <div class="organizer-info-text">
                            <div class="counter_box">
                                <h5><i class="fa fa-building-o" aria-hidden="true"></i> Venue Name: <strong><?php  echo $event_s['Venue'];  ?></strong></h5>
                            </div>
                            <div class="counter_box">
                                <h5><i class="fa fa-map-marker" aria-hidden="true"></i> Address: <strong><?php  echo $event_s['StreetAddress'];  ?></strong></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php  } ?>
    </section>


 <?php  } ?>
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

<script type="text/javascript">
    $(document).ready(function () {//you need to put this in closure.
        $('#buyTicketHeading').click(function () {
            $('html, body').stop().animate({
                scrollTop: $("#organizerDetails").offset().top - 100 
            }, 1000)
        });
    });
</script>
</html>