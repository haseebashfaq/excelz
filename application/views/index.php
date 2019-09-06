<?php
include 'backend/db.php';

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
    <script type="text/javascript">

    </script>
</head>
<body>


<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<!--header start here -->
<?php include('assets/partials/header.php') ?>
<!--header end here-->

<!--cover section slider -->
<section id="home" class="home-cover">
    <div class="cover_slider owl-carousel owl-theme">
        <?php if (empty($upcoming_events)) {  ?>

        <div class="cover_item cover_container" style="background: url('assets/img/events/noeventpic.jpg');">
            <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-center">
                            <h2 class="cover-title" data-raw-countdown="">
                            </h2>
                            <h2 class="cover-event-name"> No Upcoming Event <br /><strong class="cover-xl-text"></strong></h2>
                            <p class="cover-date">
                                Please subscribe to our newsletter to get latest updates
                            </p>
                            <a href="#" name="buyTicketHeading" class=" btn btn-primary btn-rounded" data-toggle="modal" data-target="#myModal">
                                Subscribe
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" style="background-color: #6600ff9c; width: 100%; max-width: 100%;">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-12">
                        <!-- <h4 class="mb30 text-center color-light">Counter until the big event</h4> -->
                        <div class="countdown-noevent">NEW EVENTS COMING SOON</div>
                    </div>
                </div>
            </div>

            <?php } else { ?>
                <?php foreach ($upcoming_events as $upcoming_event) { ?>

            <div class="cover_item cover_container" style="background: url(<?php echo $upcoming_event['EventCoverPhoto'];  ?>);">

                <div class="slider_content">
                    <div class="slider-content-inner">
                        <div class="container">
                            <div class="slider-content-center">
                                <h2 class="cover-title" data-raw-countdown="<?php echo $upcoming_event['StartDate'];?>">
                                    <?php
                                    $date = date("d-M-Y", strtotime($upcoming_event['StartDate']));
                                    echo $date; ?>
                                </h2>
                                <h2 class="cover-event-name"> <?php echo $upcoming_event['EventName']; ?><br /><strong class="cover-xl-text"><?php echo $upcoming_event['Subtitle']; ?></strong></h2>
                                <p class="cover-date">
                                    <?php echo $upcoming_event['EventTypeName']; ?>
                                </p>
                                <a href="<?php echo base_url(); ?>event_detail?event_id=<?php echo $upcoming_event['Id']; ?>" class=" btn btn-primary btn-rounded" >
                                    Details
                                </a>
                                <a href="<?php echo base_url(); ?>event_detail?event_id=<?php echo $upcoming_event['Id']; ?>#organizerDetails" name="buyTicketHeading" class=" btn btn-primary btn-rounded" >
                                    Register Now
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="container" style="background-color: #6600ff9c; width: 100%; max-width: 100%;">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-12">
                            <!-- <h4 class="mb30 text-center color-light">Counter until the big event</h4> -->
                            <div class="countdown"></div>
                        </div>
                    </div>
                </div>

            </div> <?php  } }?> 
        </div>
    </div>
</section>
<!--cover section slider end -->

<!--event info -->
<section class="event-types">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <a href="<?php echo base_url('search_all_events'); ?>">
                    <div class="icon_box_one" style="background-image: url('assets/img/three_thumbnails.png'); background-position: center; background-size: 100% 100%; height: 250px;">
                        <div class="content">
                            <h4>All Events</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="<?php echo base_url('search_corporate'); ?>">
                    <div class="icon_box_one" style="background-image: url('assets/img/corporate_events.png'); background-position: center; background-size: 100% 100%; height: 250px;">
                        <div class="content">
                            <h4>Corporate Events</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="<?php echo base_url('search_ibc'); ?>">
                    <div class="icon_box_one" style="background-image: url('assets/img/ibc_events.png'); background-position: center; background-size: 100% 100%; height: 250px;">
                        <div class="content">
                            <h4>IBC Events</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!--event info end -->

<section>
    <div class="container home-search-main">
        <div class="contact_form">
            <form action="" method="post" onsubmit="return ajaxSearch();">
                <div class="form-group">
                    <input id="searchEventName" type="text" class="form-control" placeholder="Keywords">
                </div>
                <div class="form-group">
                    <select id="searchEventType" class="form-control">
                        <option disabled="" selected="">Type</option>
                        <option value="10000">All</option>
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM eventtype order by Id asc");
                        $stmt->execute();
                        $country = $stmt->fetchAll();

                        foreach ($country as $row) {
                            $id = $row['Id'];
                            $code = $row['EventTypeName'];
                            echo "<option value='$id'> $code </option>";

                        }
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <select id="searchCountry" class="form-control">
                        <option disabled="" selected="">Location</option>
                        <option value="10000">All</option>

                        <?php
                        $stmt = $conn->prepare("SELECT * FROM country order by  Id asc");
                        $stmt->execute();
                        $country = $stmt->fetchAll();

                        foreach ($country as $row) {
                            $id = $row['Id'];
                            $code = $row['CountryName'];
                            echo "<option value='$id'> $code </option>";

                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select id="searchlanguage" class="form-control">
                        <option disabled="" selected="">Language</option>
                        <option value="10000">All</option>
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM language");
                        $stmt->execute();
                        $country = $stmt->fetchAll();

                        foreach ($country as $row) {
                            $id = $row['Id'];
                            $code = $row['language'];
                            echo "<option value='$id'> $code </option>";

                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input id="searchStartDate" type="text" class="form-control" placeholder="Start Date">
                </div>
                <div class="form-group">
                    <input id="searchEndDate" type="text" class="form-control" placeholder="End Date">
                </div>
                <div class="form-group form-group-btn">
                    <button type="submit" class="btn btn-rounded btn-primary" id="searchButton">Search</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="pb30 event-thumbnails">
    <div class="container">
        <div class="section_title mb50">
            <h3 class="title">
                List of <span style="color: #f16d36;">Events</span>
            </h3>
        </div>
    </div>

    <?php if(empty($upcoming_events)){
            //we are here... NOT neeeche
    ?>
    <div class="row justify-content-center no-gutters event-thumbnail-container"  id="eventsContainer">
        <div class="col-12 col-md-12 col-lg-12 event-thumbnail event-thumbnail-noevent" style="text-align: center; width: 100%; margin-bottom: 3rem;">
            <h4>Currently we don't have any upcoming event.</h4>
            <p class="cover-date">
                Please subscribe to our newsletter to get latest updates.
            </p>
            <a href="#" name="buyTicketHeading" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#myModal">
                Subscribe
            </a>
        </div>
    </div>
    
    <?php  } else { ?>
    
    <div class="row justify-content-center no-gutters event-thumbnail-container" id="eventsContainer">
        <?php foreach($list_of_approved_events as $lae)
        {    $ShortEventTypeName = str_replace('Presentation', '', $lae['EventTypeName']);
            $ShortCategoryName = str_replace('Events', '', $lae['CategoryName']);

            ?>

            <div class="col-12 col-md-12 col-lg-6 event-thumbnail" data-event="true" data-default-events="true">
                <a href="<?php echo base_url(); ?><?php echo 'event_detail?event_id='.$lae['eventid']; ?>">
                    <div class="speaker_box">
                        <div class="speaker_img" style="border-radius: 12px 12px 0 0;">
                            <div class="event_thumbnail_venue_date thumbnail-top" >
                                <p><?php echo $lae['EventSize']; ?></p>
                                <p><?php echo $ShortEventTypeName; ?></p>
                            </div>
                            <img src="<?php echo $lae['EventCoverPhoto']; ?>" alt="Event Cover Photo">
                            <div class="event-language-box">
                                <h5 class="name">In <?php echo $lae['language']; ?></h5>
                            </div>
                            <div class="info_box">
                                <h5 class="name"><?php echo $lae['Currency']; ?><?php echo $lae['TicketPrice']; ?></h5>
                                <!-- <p class="position">CEO Company</p> -->
                            </div>
                            <div class="info_box event-type-info-box">
                                <h5 class="name"><?php echo $ShortCategoryName ?></h5>
                                <!-- <p class="position">IBC</p> -->
                            </div>
                        </div>
                        <div class="event_thumbnail_venue_date" style="border-radius: 0 0 12px 12px;">
                            <?php  $time = date("h:i:a", strtotime($lae['Starttimeone']));
                            ?>
                            <p> <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $time ?> <span style="font-size: 10px; color: #f16d36;">GMT <?php echo $lae['gmt']; ?></span></p>
                            <p><i class="ion-calendar"></i>
                                <?php  $date = date("d-M-Y", strtotime($lae['StartDate']));
                                echo $date;  ?></p>
                        </div>
                    </div>
                    <div class="event_word">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-12">
                                <h4><?php echo $lae['EventName']; ?></h4>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

        <?php  }   ?>

    </div>
    <?php } ?>
    <div id="dummyEventDiv" class="col-12 col-md-6 col-lg-6 event-thumbnail" data-event="true" style="display: none">
        <a class="event-d-div-link">
            <div class="speaker_box">
                <div class="speaker_img">
                    <div class="event_thumbnail_venue_date thumbnail-top">
                        <p class="event-d-eventsize"></p>
                        <p class="event-d-eventtype"></p>
                    </div>
                    <img class="event-d-cover-photo" alt="Event Cover Photo">
                    <div class="event-language-box">
                        <h5 class="name event-d-lang"></h5>
                    </div>
                    <div class="info_box">
                        <span class="name event-d-currency"></span><span class="name event-d-ticket-price"></span>
                    </div>
                    <div class="info_box event-type-info-box">
                        <h5 class="name event-d-category-name"></h5>
                    </div>
                </div>
                <div class="event_thumbnail_venue_date">
                    <?php  $time = date("h:i:a", strtotime('<span class="name event-d-starttimeone"></span>'));
                    ?>
                    <p> <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $time ?> GMT <span class="name event-d-gmt"></span></p>
                    <p><i class="ion-calendar"></i>
                        <span class="name event-d-startdate"></span>
                    </p>
                </div>
            </div>
            <div class="event_word">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-12">
                        <h4 class="event-d-name"></h4>
                    </div>
                </div>
            </div>
        </a>
    </div>
</section>

<div class="container">
    <!-- Trigger the modal with a button -->
    <!-- Modal -->
    <div class="modal show" id="myModal" role="dialog">
        <div class="modal-dialog">
            <form action="<?php echo base_url("user/newsletter"); ?>" id="form" method="post" class="form-horizontal" >
                <!-- Modal content-->
                <div class="modal-content">
                    <h4 class="modal_header" align="center">Subscribe</h4>
                    <div class="modal-body">
                        <p>Please enter your details to subscribe</p>
                        <hr>
                    </div>

                    <input class="form-control" type="text" name="email" placeholder="Email"  style= "display:inline; width:80%; border: 1px solid #f16d36; margin: 0 auto; margin-bottom: 1rem;" required>
                    <select   id="Country" name="Country"   style= "display:inline; width:80%; border: 1px solid #f16d36; margin: 0 auto; margin-bottom: 1rem; height: 50px;" required>
                            <option disabled="" selected="">Location</option>
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM country");
                            $stmt->execute();
                            $country = $stmt->fetchAll();

                            foreach ($country as $row) {
                                $id = $row['Id'];
                                $code = $row['CountryName'];
                                echo "<option value='$id'> $code </option>";

                            }
                            ?>

                        </select>

                    <div class="modal-footer">
                        <input type="submit"  class="btn btn-rounded btn-primary" name="Submitadd"/><br />
                        <button type="button" class="btn btn-rounded btn-default"  data-dismiss="modal">Close</button>

                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<!--speaker section end -->

<!--footer start -->
<?php include('assets/partials/footer.php'); ?>
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
    var allCounterDivs = $('[data-raw-countdown]');
    allCounterDivs.each(function(){

        var currentCounterDiv = $(this);
        var currentCounterDivContainer = currentCounterDiv.closest('.cover_container');
        var currentCounterTime = currentCounterDiv.attr('data-raw-countdown');

        $(".countdown", currentCounterDivContainer)
            .countdown(currentCounterTime.toLocaleString(), function(event) {
                $(this).html(
                    event.strftime('<div>%D <span>Days</span></div>  <div>%H<span>Hours</span></div> <div>%M<span>Minutes</span></div> <div>%S<span>Seconds</span></div>')
                );
            });
    });

    var eventLinkWithoutId = "<?php echo base_url(); ?>event_detail?event_id=";
    function ajaxSearch(){
        var requestName = "Ajax Search Request";

        var formFields = {};

        formFields['eventname'] = fixInputValueForAjax($('#searchEventName').val());
        formFields['eventtype'] = fixInputValueForAjax($('#searchEventType').val());
        formFields['country'] = fixInputValueForAjax($('#searchCountry').val());
        formFields['language'] = fixInputValueForAjax($('#searchlanguage').val());
        formFields['start_date'] = fixInputValueForAjax($('#searchStartDate').val());
        formFields['end_date'] = fixInputValueForAjax($('#searchEndDate').val());

        if (formFields.eventname !== '' || formFields.eventtype !== '' || formFields.country !== '' || formFields.language !== '' || formFields.start_date !== '' || formFields.end_date !== ''){
            formFields['ajaxRequest'] = 1;
            formFields['ajaxSearch'] = 1;

            $.when($('[data-event="true"]').slideUp('fast')).done(function() {
                $('[data-added-by-search="true"]').remove();

                var jqxhr = $.ajax( {
                    url: null, //null means same url.
                    method: 'POST',
                    dataType: 'json',
                    data: formFields,
                    beforeSend: function(){

                    }
                }).done(function(data) {

                    console.log(requestName + ": Successful response");

                    if (data !== null && data.length > 0){

                        for (var i = 0; i < data.length; i++){
                            var eventDetails = data[i];
                            console.log(eventDetails);
                            dts = eventDetails.StartDate[0] +eventDetails.StartDate[1]+eventDetails.StartDate[2]+eventDetails.StartDate[3]+eventDetails.StartDate[4]+eventDetails.StartDate[5]+eventDetails.StartDate[6]+eventDetails.StartDate[7]+eventDetails.StartDate[8]+eventDetails.StartDate[9]+eventDetails.StartDate[10];
                            cat = eventDetails.CategoryName.split(" ")[0];
                            eventypename = eventDetails.EventTypeName.split(" ")[0];

                            addEventItem(eventDetails.EventName, eventLinkWithoutId + eventDetails.Id, eventDetails.EventCoverPhoto, eventDetails.TicketPrice, cat, eventDetails.formattedEventDate , eventDetails.CountryName, eventDetails.Currency, eventDetails.gmt, eventDetails.Starttimeone, dts, eventDetails.language, eventDetails.EventSize, eventypename);
                        }
                    }
                }).fail(function(jqXHR, textStatus) {
                    //executed when request is failed
                    console.log(requestName + ": failed. HTTP status code: " + jqXHR.status + ", text status: " + textStatus); //we log in to console for debugging incase of failed request.
                }).always(function() {
                    //executed when request is completed whether failed or successful
                    console.log(requestName + ": completed");
                });
            });
        }else{
            alert("Please enter at lease one parameter to search.");
        }

        return false; //so that form is not submitted to server.
    }

    function addEventItem(eventName, eventLink, eventImageUrl, eventTicketPrice, eventCategoryName, eventDate, Country, Currency, gmt, Starttimeone, StartDate, language, EventSize, EventTypeName){
        var dummyEventItem = $('#dummyEventDiv');
        var cloned = dummyEventItem.clone();
        cloned.removeAttr('id');
        cloned.show();

        $('.event-d-div-link', cloned).attr('href', eventLink);
        $('.event-d-cover-photo', cloned).attr('src', eventImageUrl);
        $('.event-d-ticket-price', cloned).html(eventTicketPrice);
        $('.event-d-category-name', cloned).html(eventCategoryName);
        $('.event-d-date', cloned).html(eventDate);
        $('.event-d-name', cloned).html(eventName);
        $('.event-d-country', cloned).html(Country);
        $('.event-d-currency', cloned).html(Currency);
        $('.event-d-gmt', cloned).html(gmt);
        $('.event-d-starttimeone', cloned).html(Starttimeone);
        $('.event-d-startdate', cloned).html(StartDate);
        //print karle ab  oper
        $('.event-d-lang', cloned).html('In ' + language);
        $('.event-d-eventsize', cloned).html(EventSize);
        $('.event-d-eventtype', cloned).html(EventTypeName);

        cloned.attr('data-added-by-search', "true");

        //add this cloned item to events container
        $('#eventsContainer').append(cloned);

        //show cloend item as previously it was hidden because of dummy input wwe made and had set display: none on it.
    }

    function fixInputValueForAjax(inputValue){
        if (inputValue === null){
            return "";
        }
        return inputValue;
    }
</script>



<script type="text/javascript">
    // $(window).on('load',function(){
    //     $('#myModal').modal('show');
    // });
</script>

</body>
</html>