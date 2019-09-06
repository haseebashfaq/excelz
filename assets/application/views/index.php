<?php
include 'backend/db.php';

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
    <title> Excelz - Home</title>
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
                                <h2 style="font-size: 1px;" class="cover-event-name"><strong style="font-size: 24px;" class="cover-xl-text"> <?php echo $upcoming_event['EventName']; ?></strong></h2>
                                <p class="cover-date">
                                    <?php echo $upcoming_event['Venue']; ?>
                                </p>
                                <a href="<?php echo base_url(); ?>event_detail?event_id=<?php echo $upcoming_event['Id']; ?>" class=" btn btn-primary btn-rounded" >
                                    Details
                                </a> 
                                       <a class="btn btn-primary btn-rounded" id="buyTicketHeading">Register Now</a>
                                  

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

            </div> <?php  } ?> </div>


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

<div id="purchase_order">
    <div class="row justify-content-center no-gutters event-thumbnail-container" id="eventsContainer">
        <?php if(!empty($events)){
            //we are here... NOT neeeche

            foreach ($events as $event) { ?>
                <div class="col-md-4 col-sm-6 event-thumbnail" data-event="true" data-default-events="true">

                    <a href="<?php echo base_url(); ?><?php echo 'event_detail?event_id='.$event['Id']; ?>">
                        <div class="speaker_box">
                            <div class="speaker_img">
                                <img src="<?php echo $event['EventCoverPhoto'];  ?>" alt="speaker name">
                                <div class="info_box">
                                    <h5 class="name">£<?php echo $event['TicketPrice']; ?></h5>
                                    <!-- <p class="position">CEO Company</p> -->
                                </div>
                                <div class="info_box event-type-info-box">
                                    <!-- <h5 class="name">Patricia Stone</h5> -->
                                    <p class="position"><?php echo $event['CategoryName'];  ?></p>
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

            <section style="width: 100%;" class="pb30 event-thumbnails">
                <div class="container">
                    <div class="section_title mb50">
                        <h3 class="title">
                            List of <span style="color: #f16d36;">Events</span>
                        </h3>
                    </div>
                </div>


                <div class="row justify-content-center no-gutters event-thumbnail-container" id="eventsContainer">
                    <?php foreach($list_of_approved_events as $lae)
                    {?>
                 

                        <div class="col-md-4 col-sm-6 event-thumbnail" data-event="true" data-default-events="true">
                            <a href="<?php echo base_url(); ?><?php echo 'event_detail?event_id='.$lae['eventid']; ?>">
                                <div class="speaker_box">
                                    <div class="speaker_img">
                                        <img src="<?php echo $lae['EventCoverPhoto']; ?>" alt="Event Cover Photo">
                                        <div class="info_box">
                                            <h5 class="name"><?php echo $lae['TicketPrice']; ?></h5>
                                            <!-- <p class="position">CEO Company</p> -->
                                        </div>
                                        <div class="info_box event-type-info-box">
                                            <h5 class="name"><?php echo $lae['CategoryName']; ?></h5>
                                            <!-- <p class="position">IBC</p> -->
                                        </div>
                                    </div>
                                    <div class="event_thumbnail_venue_date">
                                        <p> <i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $lae['CountryName']; ?></p>
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
            </section>
        <?php }?>


    </div>
</div>

<div id="dummyEventDiv" class="col-md-4 col-sm-6 event-thumbnail" data-event="true" style="display: none">
    <a class="event-d-div-link">
        <div class="speaker_box">
            <div class="speaker_img">
                <img class="event-d-cover-photo" alt="Event Cover Photo">
                <div class="info_box">
                    <h5 class="name event-d-ticket-price"></h5>
                </div>
                <div class="info_box event-type-info-box">
                    <h5 class="name event-d-category-name"></h5>
                </div>
            </div>
            <div class="event_thumbnail_venue_date">
                <p> <i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $lae['CountryName']; ?></p>
                <p><i class="ion-calendar"></i><span class="event-d-date"></span></p>
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
<!--speaker section-->

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
    var allCounterDivs = $('[data-raw-countdown]'); //we put in [] because we are selecting by attribute. In this variable all divs containing data-raw-countdown attribute is selected.
    allCounterDivs.each(function(){
        //we iterate each div that contains data-raw-countdown attribute.
        var currentCounterDiv = $(this);
        var currentCounterDivContainer = currentCounterDiv.closest('.cover_container'); //we get the parent .cover_container. that contains .countdown element.
        var currentCounterTime = currentCounterDiv.attr('data-raw-countdown'); //we get value of data-raw-countdown in current div.
       
        $(".countdown", currentCounterDivContainer) //we look for .countdown inside that counter div.
            .countdown(currentCounterTime.toLocaleString(), function(event) {
                $(this).html(
                    event.strftime('<div>%D <span>Days</span></div>  <div>%H<span>Hours</span></div> <div>%M<span>Minutes</span></div> <div>%S<span>Seconds</span></div>')
                );
            });
    });

    var eventLinkWithoutId = "<?php echo base_url(); ?>event_detail?event_id=";
    function ajaxSearch(){
        var requestName = "Ajax Search Request";

        //we made json object. setted key name to input names and values as their values.
        var formFields = {}; //this {} means its a json object. It is very similar to array but has other qualities.
        //i matched json key with that of your PHP fil expecting. jsonObjc.Key = value is same as jsonObjc['Key'] = value.
        formFields['eventname'] = fixInputValueForAjax($('#searchEventName').val());
        formFields['eventtype'] = fixInputValueForAjax($('#searchEventType').val());
        formFields['country'] = fixInputValueForAjax($('#searchCountry').val());
        formFields['language'] = fixInputValueForAjax($('#searchlanguage').val());
        formFields['start_date'] = fixInputValueForAjax($('#searchStartDate').val());
        formFields['end_date'] = fixInputValueForAjax($('#searchEndDate').val());

        //test//
        //$('[data-event="true"]').slideUp('fast', function() {

        if (formFields.eventname !== '' || formFields.eventtype !== '' || formFields.country !== '' || formFields.language !== '' || formFields.start_date !== '' || formFields.end_date !== ''){
            formFields['ajaxRequest'] = 1;
            formFields['ajaxSearch'] = 1;

            //now e need to set request to our search page..
            //the number of elemetns found in selection the number of times callback is executed. So we use when and done.
            $.when($('[data-event="true"]').slideUp('fast')).done(function() {
                $('[data-added-by-search="true"]').remove(); // ok?? ok

                var jqxhr = $.ajax( {
                    url: null, //null means same url.
                    method: 'POST',
                    dataType: 'json', //we only want json response. if it's json then we call it failed.
                    data: formFields, //it will send json key as input name json value as input value. So for ex 1st item will be: eventName = whatever user provided. and so on.
                    beforeSend: function(){
                        //we don't do hide animation here. otherwise it conflicts wwhen we want to actually show.
                        //if its too fast. so when new items came they also get hidden.
                    }
                }).done(function(data) {
                    //executed when request is successful
                    //data is returned from server
                    console.log(requestName + ": Successful response");

                    //why it was going into infinite loop?
                    if (data !== null && data.length > 0){
                        //we are iterating all array items like we do normally
                        for (var i = 0; i < data.length; i++){
                            var eventDetails = data[i];
console.log(eventDetails);
                            addEventItem(eventDetails.EventName, eventLinkWithoutId + eventDetails.Id, eventDetails.EventCoverPhoto, eventDetails.TicketPrice, eventDetails.CategoryName, eventDetails.formattedEventDate);
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

    function addEventItem(eventName, eventLink, eventImageUrl, eventTicketPrice, eventCategoryName, eventDate){
        var dummyEventItem = $('#dummyEventDiv');
        var cloned = dummyEventItem.clone();
        cloned.removeAttr('id'); //bcoz otherwise id attribute will also be moved to cloned item. but html standards say id should be used once.
        cloned.show();

        $('.event-d-div-link', cloned).attr('href', eventLink);
        $('.event-d-cover-photo', cloned).attr('src', eventImageUrl);
        $('.event-d-ticket-price', cloned).html(eventTicketPrice);
        $('.event-d-category-name', cloned).html(eventCategoryName);
        $('.event-d-date', cloned).html(eventDate);
        $('.event-d-name', cloned).html(eventName);
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



</body>
</html>