<?php
include 'backend/db.php';
$query = $conn->prepare("SELECT * FROM guidelines order by id asc");
$query->execute();
$guidelines = $query->fetchAll();
$count = 0;

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
                        <h2 class="page-main-heading">Guidelines</h2>
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
                        Want to know more about Excelz Events?
                    </div>
                    <p>This is where you can find all the answers to frequently asked questions about our platform.</p>
                </div>
                <div class="event_word faq">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-12">
                            <div id="accordion">
                                <?php foreach ($guidelines as $guideline) {
                                    $count++;
                                        ?>
                              <div class="card">
                                <div class="card-header" id="headingOne">
                                  <h5 class="mb-0">
                                    <span class="" data-toggle="collapse" data-target="<?php echo '#collapse'.$count;  ?>"  aria-controls="<?php echo 'collapse'.$count;  ?>">
                                      <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                    <?php echo $guideline['question'].' ?';  ?>
                                    </span>
                                  </h5>
                                </div>
                                <div id="<?php echo 'collapse'.$count;  ?>" class="<?php if($count == 1){ echo 'collapse show';}else{  echo 'collapse';} ?> " aria-labelledby="headingOne" data-parent="#accordion">
                                  <div class="card-body">
                                      <?php echo $guideline['answer'];  ?>
                                  </div>
                                </div>
                              </div>

                                <?php } ?>
                             <!-- <div class="card">
                                <div class="card-header" id="headingTwo">
                                  <h5 class="mb-0">
                                    <span class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                      Who “approves” the event details? How long does this take? If it is necessary to amend the details at a later stage can this be “fast tracked”?
                                    </span>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                  <div class="card-body">
                                    This portal is being actively managed by a team of administrators who would be aiming to update you on your event registration within 48 hours. Yes, you will be able to edit the details of your event at a later stage too and this will be highlighted to the admins.
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingThree">
                                  <h5 class="mb-0">
                                    <span class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                      Does this site include all Excelz events that are taking place ie is it compulsory to have an event listed on this site?
                                    </span>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    The purpose of the platform is to have as many events listed in one place as possible.
                                    <br><br>
                                    Although all of the corporate events will be listed here, we are not able to control the events that are being organized by the advocates and as much as it’s not mandatory to register them on the portal, we believe that it will be highlighly beneficial as it could potentially increase the number of people attending our event.
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingThree">
                                  <h5 class="mb-0">
                                    <span class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                      <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                      Will there be different categories of events e.g. opportunity presentation, training event?  
                                    </span>
                                    
                                  </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    Yes, there are 4 different categories you can choose from when registering your event: online webinar, business presentation, training or leadership summit.
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingThree">
                                  <h5 class="mb-0">
                                    <span class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                      <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                      Will an outline agenda for each event be included/required?
                                    </span>
                                  </h5>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    The “agenda” section of the registration page is an optional field however we at the very least suggest that you add a few bullet points, explaining what your event is about.
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingThree">
                                  <h5 class="mb-0">
                                    <span class="collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                      <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                      Will information about the presenters/organisers of the event be given for each event?
                                    </span>
                                  </h5>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    The registration form requires at least one speaker to be added to it as well as one name of an organizer.
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingThree">
                                  <h5 class="mb-0">
                                    <span class="collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                      <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                      Will there be a section where prospective customers/interested parties can indicate that they would like an event to take place in their area?
                                    </span>
                                  </h5>
                                </div>
                                <div id="collapseSeven" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    This is something, we are planning to add at a later date.
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingThree">
                                  <h5 class="mb-0">
                                    <span class="collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                      <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                      Will this portal include the information about the Global Events and also the Local Events which will be undertaken by the corporate team?
                                    </span>
                                  </h5>
                                </div>
                                <div id="collapseEight" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    Yes, Global, National as well as Regional events will be listed.
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingThree">
                                  <h5 class="mb-0">
                                    <span class="collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                      <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                      Who will provide the support for this website?
                                    </span>
                                  </h5>
                                </div>
                                <div id="collapseNine" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    The site belongs to Excelz and is managed by our staff.
                                  </div>
                                </div>
                              </div>-->
                            </div>
                        </div>
                    </div>
                </div>
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