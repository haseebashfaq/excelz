<?php

/*if(!isset($_SESSION["email"]) || !isset($_SESSION["user_type"])) {
	
    */?><!--
    <script type="text/javascript">
        window.location.replace("login");
    </script>
    --><?php
/*
} else {
    include 'backend/mylistings.php';
} */
?>




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
    <title> Excelz - Calender</title>
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
  <!--  calendar links-->
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="assets/css/calendar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
        <div id="container" class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <h2 class="page-main-heading" style="text-align: center; margin-bottom: 5rem; margin-top: 150px;">Events Calender</h2>
                </div></div>

              <!--  <div class="col-md-3 col-12 dashboard-left">
                    <h3 class="title dashboard-welcome">
                        Welcome <span style="color: #f16d36;"></span>
                    </h3>
                    <h3 class="title dashboard-title navmylistings">
                       <a href="<?php /*echo base_url('mylistings');  */?>">
                           My Listings

                       </a>                     </h3>
                    <h3 class="title dashboard-title navaddlisting" data-toggle="modal" data-target="#addlistingModal">
                        Add Listing
                    </h3>
                </div>-->
           <!--  <div class="row">
                <div class="col-md-3 col-12 dashboard-left">
                    <h3 class="title dashboard-welcome">
                        Welcome <span style="color: #f16d36;"></span>
                    </h3>

                        <a href="<?php echo base_url('mylistings');  ?>">  <h3 class="title dashboard-title navmylistings"> My Listings </h3> </a>
<!--
                    <h3 class="title dashboard-title navaddlisting" data-toggle="modal" data-target="#addlistingModal">
                        Add Listing
                    </h3>
                </div> -->
                <div class="col-md-12 col-12 dashboard-right">
               <div class="page-header">

                                <div class="form-inline">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm" data-calendar-nav="prev"><< Prev</button>
                                        <button class="btn btn-default btn-sm" data-calendar-nav="today">Today</button>
                                        <button class="btn btn-primary btn-sm" data-calendar-nav="next">Next >></button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-sm" data-calendar-view="year">Year</button>
                                        <button class="btn btn-warning btn-sm active" data-calendar-view="month">Month</button>
                                        <button class="btn btn-warning btn-sm" data-calendar-view="week">Week</button>
                                        <button class="btn btn-warning btn-sm" data-calendar-view="day">Day</button>
                                    </div>
                                </div>
                   <br>
                                <h3></h3>


                         <div id="showEventCalendar"></div>



                </div>
                 <br>
                 <br>


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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script type="text/javascript" src="assets/js/calendar.js"></script>

    <script>
        (function($) {

            "use strict";

            var options = {

                events_source: '<?php echo base_url(); ?>event_calender',
                view: 'month',
                tmpl_path: '<?php echo base_url();?>assets/tmpls/',
                tmpl_cache: false,
                day: '<?php echo date("Y-m-d");  ?>',
                onAfterEventsLoad: function(events) {

                    if(!events) {
                        return;
                    }
                    var list = $('#eventlist');

                    list.html('');

                    $.each(events, function(key, val) {
                        $(document.createElement('li'))
                            .html('<a href="' + val.url + '">' + val.title + '</a>')
                            .appendTo(list);
                    });
                },
                onAfterViewLoad: function(view) {
                    $('.page-header h3').text(this.getTitle());
                    $('.btn-group button').removeClass('active');
                    $('button[data-calendar-view="' + view + '"]').addClass('active');
                },
                classes: {
                    months: {
                        general: 'label'
                    }
                }
            };
            var calendar = $('#showEventCalendar').calendar(options);
            $('.btn-group button[data-calendar-nav]').each(function() {
                var $this = $(this);
                $this.click(function() {
                    calendar.navigate($this.data('calendar-nav'));
                });
            });
            $('.btn-group button[data-calendar-view]').each(function() {
                var $this = $(this);
                $this.click(function() {
                    calendar.view($this.data('calendar-view'));
                });
            });
            $('#first_day').change(function(){
                var value = $(this).val();
                value = value.length ? parseInt(value) : null;
                calendar.setOptions({first_day: value});
                calendar.view();
            });
            $('#language').change(function(){
                calendar.setLanguage($(this).val());
                calendar.view();
            });
            $('#events-in-modal').change(function(){
                var val = $(this).is(':checked') ? $(this).val() : null;
                calendar.setOptions({modal: val});
            });
            $('#format-12-hours').change(function(){
                var val = $(this).is(':checked') ? true : false;
                calendar.setOptions({format12: val});
                calendar.view();
            });
            $('#show_wbn').change(function(){
                var val = $(this).is(':checked') ? true : false;
                calendar.setOptions({display_week_numbers: val});
                calendar.view();
            });
            $('#show_wb').change(function(){
                var val = $(this).is(':checked') ? true : false;
                calendar.setOptions({weekbox: val});
                calendar.view();
            });
        }(jQuery));

    </script>
</body>
</html>




