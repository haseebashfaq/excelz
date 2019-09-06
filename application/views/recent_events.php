<?php
include 'backend/db.php';
$query = $conn->prepare("SELECT * FROM webinar_recordings order by id asc");
$query->execute();
$recent_events = $query->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="description" content="Global List of Events For Excelz">
    <meta name="keywords" content="Global , Event , Events, Excelz">
    <meta name="author" content="Excelz">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ========== Title ========== -->
    <title> Excelz - Global List of Events For Excelz</title>
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
<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="assets/img/bg/bg-img.png">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="inner_cover_content">
                    <h2 class="page-main-heading">Recent</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--page title section end-->

<!--events section -->
<section class="pb100">
    <div class="container">
        <div class="row">

<?php foreach($recent_events as $recent_event){
    ?>
    <div class="col-md-6">
        <br>
        <br>
    <iframe style="width: 100%; height: 300px;" src="<?php echo $recent_event['path']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
<?php  } ?>
        </div>
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

<script type="text/javascript">
    $('.card .card-header h5 span').on('change', function(){
        // if($(this).hasClass('collapsed')){
        //   $('i',this).attr('class','fa fa-arrow-circle-down');
        // } else {
        //   $('i',this).attr('class','fa fa-arrow-circle-right');
        // }
    })
</script>
</body>
</html>