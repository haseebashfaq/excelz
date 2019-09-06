<?php

if(!isset($_SESSION["email"]) || !isset($_SESSION["user_type"])) {

    ?>
    <script type="text/javascript">
        window.location.replace("login");
    </script>
    <?php

} else {
    include 'backend/mylistings.php';

}
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
<section class="inner_cover parallax-window event-details-header" data-parallax="scroll" data-image-src="assets/img/events/event1.png">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
               <a href="<?php echo base_url('dashboard');?>"> <h2 class="page-main-heading" style="text-align: center;">Dashboard</h2> </a>
                <h4 style="color: #ffffff; text-align: center; margin-bottom: 4em; text-decoration: underline;">if you require any changes to any of your events, please email the admin on: eventlisting@excelz.com and provide the necessary details.</h4>

            </div>
            <div class="col-md-3 col-12 dashboard-left">
                <h3 class="title dashboard-welcome">
                    Welcome <span style="color: #f16d36;"></span>
                </h3>

                    <a href="<?php echo base_url('dashboard');  ?>">  <h3 class="title dashboard-title navmylistings"> Dashboard </h3> </a>

                <h3 class="title dashboard-title navaddlisting" data-toggle="modal" data-target="#addlistingModal">
                    Add Listing
                </h3>
            </div>
            <div class="col-md-9 col-12 dashboard-right">
                <div class="inner_cover_content">
                    <div class="mylistings">
                        <?php
                        if($mylistingsCount<1) {
                            echo '<p>No listing found<br><b class="navaddlisting" data-toggle="modal" data-target="#addlistingModal">Please add listing</b></p>';
                        } else {

                            ?>
                            <table>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Requested Date</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                <?php
                                for($mylistingsLoop=0; $mylistingsLoop<$mylistingsCount; $mylistingsLoop++) {
                                    ?>
                                    <tr>
                                        <td><a href="<?php echo '';//$mylistingId[$mylistingsLoop];?>"><?php echo $mylistingEventName[$mylistingsLoop];?></a></td>
                                        <td> <?php echo date("d-M-Y",strtotime($mylistingCreatedAt[$mylistingsLoop]));?></td>
                                        <td><?php echo (($mylistingStatus[$mylistingsLoop] == 1) ? 'Approved' : (($mylistingStatus[$mylistingsLoop] == 2) ? 'Pending' : 'Blocked'));?> </td>

                                        <!-- update button -->
                                        <td><i class="fa fa-edit" aria-hidden="true" onclick="edit_event(<?php echo $mylistingId[$mylistingsLoop];?>)"  data-toggle="modal" data-target="#updatelistingModal"></i></td>
                                        <td><i class="fa fa-trash-o deleteicon" aria-hidden="true" deleteid="<?php echo $mylistingId[$mylistingsLoop];?>" data-toggle="modal" data-target="#deletelistingModal"></i></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="mylistings notfound">
                        <p>No listing found<br><b class="navaddlisting" data-toggle="modal" data-target="#addlistingModal">Please add listing</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--page title section end-->


<div class="modal fade" id="addlistingModal" tabindex="-1" role="dialog" aria-labelledby="addlistingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg addlisting" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addlistingModalLabel">Add Listing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contact_form">
                    <form action="<?php echo base_url();?>user/reg_event" method="post"  enctype="multipart/form-data">
                        <h6>Event's General Info</h6>
                        <div class="form-group">
                            <input id="eventname" name="eventname" type="text" class="form-control" placeholder="Event Name" required>
                        </div>
                        <div class="form-group">
                            <input id="eventsubtitle" name="eventsubtitle" type="text" class="form-control" placeholder="Event Subtitle" required>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="radio" id="online" name="event_type_category" value="1"  >
                                <label for="online">Online</label>
                            </div>

                            <div>
                                <input type="radio" id="offline" name="event_type_category" value="0" checked>
                                <label for="offline">Offline</label>
                            </div>

                        </div>
                        <div class="form-group form-half">
                            <select class="form-control" id="eventcategory" name="eventcategory" required>
                                <option disabled="" selected="">Event Category</option>
                                <option value="2">Corporate</option>
                                <option value="3">IBC</option>
                            </select>
                        </div>

                        <div class="form-group form-half form-event-type1">
                            <select class="form-control" id="eventtype" name="eventtype2" required>
                                <option disabled="" selected="">Event Type</option>
                                <?php
                                $stmt = $conn->prepare("SELECT * FROM eventtype where EventTypeCategory = 1 order by  EventTypeName asc");
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

                        <div class="form-group form-half form-event-type2">
                            <select class="form-control" id="eventtype" name="eventtype2" required>
                                <option disabled="" selected="">Event Type</option>
                                <?php
                                $stmt = $conn->prepare("SELECT * FROM eventtype where EventTypeCategory = 0 order by  EventTypeName asc");
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

                        <h6 class="location-form-item">Location/Venue Details</h6>
                        <div class="form-group location-form-item">
                            <input id="venue" name="venue" type="text" class="form-control" placeholder="Location/Venue Name" >
                        </div>
                        <div class="form-group form-half location-form-item">
                            <input id="streetaddresss" name="streetaddresss" type="text" class="form-control" placeholder="Street Address" >
                        </div>
                        <div class="form-group form-half location-form-item">
                            <input id="state" name="state" type="text" class="form-control" placeholder="State/Region/Province" >
                        </div>
                        <div class="form-group form-half location-form-item">
                            <input id="city" name="city" type="text" class="form-control" placeholder="City" >
                        </div>
                        <div class="form-group form-half location-form-item">
                            <input id="zipcode" name="zipcode" type="text" class="form-control" placeholder="Zip/Postal Code" >
                        </div>
                        <div class="form-group location-form-item">
                            <select class="form-control" id="Country" name="Country" required>
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
                        </div>
                        <h6>Event size & speakers</h6>
                        <div class="form-group">
                            <select class="form-control" id="EventSize" name="EventSize" required>
                                <option disabled="" selected="">Size</option>
                                <option>Global</option>
                                <option>National</option>
                                <option>Regional</option>
                                <option>International</option>
                            </select>
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker1" name="speaker1" type="text" class="form-control" placeholder="Speaker 1" required>
                            <input id="role1" name="role1" type="text" class="form-control" placeholder="Role">
                            <input id="upload_speaker1" name="upload_speaker1" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker2" name="speaker2" type="text" class="form-control" placeholder="Speaker 2">
                            <input id="role2" name="role2" type="text" class="form-control" placeholder="Role">
                            <input id="upload_speaker2" name="upload_speaker2" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker3" name="speaker3" type="text" class="form-control" placeholder="Speaker 3">
                            <input id="role3" name="role3" type="text" class="form-control" placeholder="Role">
                            <input id="upload_speaker3" name="upload_speaker3" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker4" name="speaker4" type="text" class="form-control" placeholder="Speaker 4">
                            <input id="role4" name="role4" type="text" class="form-control" placeholder="role">
                            <input id="upload_speaker4" name="upload_speaker4" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <h6>Organizer's info</h6>
                        <div class="form-group">
                            <input id="contactpersonname" name="contactpersonname" type="text" class="form-control" placeholder="Organiser's/Host's Name">
                        </div>
                        <div class="form-group form-half">
                            <input id="contactpersonemail" name="contactpersonemail" type="email" class="form-control" placeholder="Organiser's/Host's Email Address">
                        </div>
                        <div class="form-group form-half">
                            <input id="contactpersonphone" name="contactpersonphone" type="text" class="form-control" placeholder="Organiser's/Host's Phone Number">
                        </div>
                        <h6>Event's schedule</h6>
                        <div class="form-group">
                            <select class="form-control" id="daytype" name="daytype" required>
                                <option disabled="" selected="">Single Day or Multi Day</option>
                                <option value="Single Day">Single Day</option>
                                <option value="Multi Day">Multi Day</option>
                            </select>
                        </div>

                <div id="half" class="form-group form-half">
                    <input type="text" id="startdate" name="startdate" class="form-control" onfocus="(this.type='date')" placeholder="Start Date" required>
                </div>

                <div class="form-group form-half form-multiday">
                    <input type="text" id="enddate" name= "enddate" class="form-control" onfocus="(this.type='date')" placeholder="End Date" >
                </div>

                <div class="form-group">
                    <input id="regtimeone" name="regtimeone" type="text" class="form-control" placeholder="Registration time (i.e. 14:00)" required>
                </div>

                <div class="form-group form-multiday">
                    <input id="regtimetwo" name="regtimetwo" type="text" class="form-control" placeholder="Registration time two (i.e. 14:00)" >
                </div>

                <div class="form-group  form-multiday">
                    <input id="regtimethree" name="regtimethree" type="text" class="form-control" placeholder="Registration time three (i.e. 14:00)" >
                </div>

                <div class="form-group">
                   <input id="starttimeone" name="starttimeone" type="text" class="form-control" placeholder="start time one  (i.e. 15:00)" >
                </div>

                <div class="form-group form-half form-multiday">
                    <input id="starttimetwo" name="starttimetwo" type="text" class="form-control" placeholder="start time two (i.e. 15:00)" >
                </div>

                <div class="form-group form-half form-multiday">
                     <input id="starttimethree" name="starttimethree" type="text" class="form-control" placeholder="start time three (i.e. 15:00)" >
                </div>



                <div class="form-group">
                        <input id="endtimeone" name="endtimeone" type="text" class="form-control" placeholder="End time one  (i.e. 15:00)" required>
                 </div>

                <div class="form-group form-multiday">
                    <input id="endtimetwo" name="endtimetwo" type="text" class="form-control" placeholder="End time two (i.e. 15:00)" >
                </div>

                <div class="form-group  form-multiday">
                      <input id="endtimethree" name="endtimethree" type="text" class="form-control" placeholder="End time three (i.e. 15:00)" >
                </div>


                        <h6>Ticket price & additional info</h6>
                        <div class="form-group form-half">
                            <select class="form-control" name="currency" required>
                                <option data-symbol="$" data-placeholder="0.00" selected>$</option>
                                <option data-symbol="€" data-placeholder="0.00">€</option>
                                <option data-symbol="£" data-placeholder="0.00">£</option>
                                <option data-symbol="¥" data-placeholder="0">¥</option>
                                <option data-symbol="$" data-placeholder="0.00">$</option>
                                <option data-symbol="$" data-placeholder="0.00">$</option>
                            </select>  </div>
                        <div class="form-group form-half">
                            <input id="ticketprice" name="ticketprice" type="text" class="form-control" placeholder="Ticket Price"  required>
                        </div>


                        <div class="form-group">
                            <input id="additionalinformation" name="additionalinformation" type="text" class="form-control" placeholder="Additional Information">
                        </div>
                        <h6 class="location-form-item">Event Photo (image of the city or venue)</h6>
                        <div class="form-group location-form-item">
                            <input id="eventcoverphoto2" name="eventcoverphoto2" type="file" class="form-control" placeholder="Upload Photo">
                        </div>


                        <h6 class="location-form-itemc">Event Photo (image of the city or venue)</h6>
                        <div class="location-form-itemc event-photo-radio-div">
                            <input class="location-form-itemc" type="radio" id="eventcoverphoto2" name="eventcoverphoto2"  value="assets/img/OnlineBanner/online-banner1.png"  />
                            <img class="location-form-itemc" src="assets/img/OnlineBanner/online-banner1.png" width="200px" height="200px" alt="I'm happy" />

                                <input class="location-form-itemc" type="radio" id="eventcoverphoto2" name="eventcoverphoto2"  value="assets/img/OnlineBanner/online-banner2.jpg"   />
                            <img class="location-form-itemc" src="assets/img/OnlineBanner/online-banner2.jpg" width="200px" height="200px" alt="I'm happy" />
                        </div>



                        <div class="form-group">
                            <input id="registrationurl" name="registrationurl" type="text" class="form-control" placeholder="Registration URL">
                        </div>

                        <div class="form-group">
                            <select class="form-control"  id="gmt" name="gmt" required>
                                <option value="" selected="selected">select your timezone</option>
                                <option value="-12:00">(GMT -12:00) Eniwetok, Kwajalein</option>
                                <option value="-11:00">(GMT -11:00) Midway Island, Samoa</option>
                                <option value="-10:00">(GMT -10:00) Hawaii</option>
                                <option value="-09:50">(GMT -9:30) Taiohae</option>
                                <option value="-09:00">(GMT -9:00) Alaska</option>
                                <option value="-08:00">(GMT -8:00) Pacific Time (US & Canada)</option>
                                <option value="-07:00">(GMT -7:00) Mountain Time (US & Canada)</option>
                                <option value="-06:00">(GMT -6:00) Central Time (US & Canada), Mexico City</option>
                                <option value="-05:00">(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
                                <option value="-04:50">(GMT -4:30) Caracas</option>
                                <option value="-04:00">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                                <option value="-03:50">(GMT -3:30) Newfoundland</option>
                                <option value="-03:00">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                                <option value="-02:00">(GMT -2:00) Mid-Atlantic</option>
                                <option value="-01:00">(GMT -1:00) Azores, Cape Verde Islands</option>
                                <option value="+00:00">(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca</option>
                                <option value="+01:00">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
                                <option value="+02:00">(GMT +2:00) Kaliningrad, South Africa</option>
                                <option value="+03:00">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                                <option value="+03:50">(GMT +3:30) Tehran</option>
                                <option value="+04:00">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                                <option value="+04:50">(GMT +4:30) Kabul</option>
                                <option value="+05:00">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                                <option value="+05:50">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                                <option value="+05:75">(GMT +5:45) Kathmandu, Pokhara</option>
                                <option value="+06:00">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                                <option value="+06:50">(GMT +6:30) Yangon, Mandalay</option>
                                <option value="+07:00">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                                <option value="+08:00">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                                <option value="+08:75">(GMT +8:45) Eucla</option>
                                <option value="+09:00">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                                <option value="+09:50">(GMT +9:30) Adelaide, Darwin</option>
                                <option value="+10:00">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                                <option value="+10:50">(GMT +10:30) Lord Howe Island</option>
                                <option value="+11:00">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                                <option value="+11:50">(GMT +11:30) Norfolk Island</option>
                                <option value="+12:00">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                                <option value="+12:75">(GMT +12:45) Chatham Islands</option>
                                <option value="+13:00">(GMT +13:00) Apia, Nukualofa</option>
                                <option value="+14:00">(GMT +14:00) Line Islands, Tokelau</option>

                            </select>
                        </div>

                        <div class="form-group location-form-item location-form-item">
                            <select class="form-control" id="language" name="language">
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

<div class="form-group location-form-item location-form-itemc">
    <select class="form-control" id="language" name="language">
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
                        <div class="alert alert-danger signup-alert">Please enter valid details</div>
                </div>
                <div class="modal-footer">
                    <div class="alert alert-danger addlisting-alert">Please enter valid details</div>

                    <input type="submit" value="Submit" name="Submitadd" class="btn btn-rounded btn-primary"/><br />
                <button id="closemodalbtn" type="button btn-rounded" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div></form>
                <div class="modal-success-msg">
                    <h6>SUCCESS</h6>
                </div>
            </div>



    </div>
</div>


<div class="modal fade" id="deletelistingModal" tabindex="-1" role="dialog" aria-labelledby="deletelistingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletelistingModalLabel">Confirm delete?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this listing?</p>
            </div>
            <div class="modal-footer">
                <button id="closemodalbtn" type="button btn-rounded" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button id="deletelistingbtn" class="btn btn-rounded btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>
<!--model to update user -->

<div class="modal fade" id="updatelistingModal" tabindex="-1" role="dialog" aria-labelledby="addlistingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg addlisting" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addlistingModalLabel">Update / Add Listing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contact_form">
                    <form action="<?php echo base_url("user/reg_event"); ?>" id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <h6>Event's General Info</h6>
                        <div class="form-group">
                            <input id="id" name="id" type="text" style="display: none;" class="form-control" placeholder="Event Name">
                        </div>
                        <div class="form-group">
                            <input id="eventname" name="eventname" type="text" class="form-control" placeholder="Event Name">
                        </div>
                        <div class="form-group">
                            <input id="eventsubtitle" name="eventsubtitle" type="text" class="form-control" placeholder="Event Subtitle">
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="radio" id="online2" name="event_type_category" value="1"
                                       checked>
                                <label for="online">Online</label>
                            </div>

                            <div>
                                <input type="radio" id="offline2" name="event_type_category" value="0">
                                <label for="offline">Offline</label>
                            </div>

                        </div>
                        <div class="form-group form-half">
                            <select class="form-control" id="eventcategory" name="eventcategory">
                                <option disabled="" selected="">Event Category</option>
                                <option value="2">Corporate</option>
                                <option value="3">IBC</option>
                            </select>
                        </div>

                        <div class="form-group form-half form-event-type1">
                            <select class="form-control" id="eventtype" name="eventtype2">
                                <option disabled="" selected="">Event Type</option>
                                <?php
                                $stmt = $conn->prepare("SELECT * FROM eventtype where EventTypeCategory = 1 order by  EventTypeName asc");
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

                        <div class="form-group form-half form-event-type2">
                            <select class="form-control" id="eventtype" name="eventtype2">
                                <option disabled="" selected="">Event Type</option>
                                <?php
                                $stmt = $conn->prepare("SELECT * FROM eventtype where EventTypeCategory = 0 order by  EventTypeName asc");
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
                        <h6 class="location-form-item">Location/Venue Details</h6>
                        <div class="form-group location-form-item">
                            <input id="venue" name="venue" type="text" class="form-control" placeholder="Location/Venue Name">
                        </div>
                        <div class="form-group form-half location-form-item">
                            <input id="streetaddresss" name="streetaddresss" type="text" class="form-control" placeholder="Street Address">
                        </div>
                        <div class="form-group form-half location-form-item">
                            <input id="state" name="state" type="text" class="form-control" placeholder="State/Region/Province">
                        </div>
                        <div class="form-group form-half location-form-item">
                            <input id="city" name="city" type="text" class="form-control" placeholder="City">
                        </div>
                        <div class="form-group form-half location-form-item">
                            <input id="zipcode" name="zipcode" type="text" class="form-control" placeholder="Zip/Postal Code">
                        </div>
                        <div class="form-group location-form-item">
                            <select class="form-control" id="Country" name="Country">
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
                        </div>
                        <h6>Event size & speakers</h6>
                        <div class="form-group">
                            <select class="form-control" id="EventSize" name="EventSize">
                                <option disabled="" selected="">Size</option>
                                <option>Global</option>
                                <option>National</option>
                                <option>Regional</option>
                                 <option>International</option>
                            </select>
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker1" name="speaker1" type="text" class="form-control" placeholder="Speaker 1">
                            <input id="role1" name="role1" type="text" class="form-control" placeholder="Role">
                            <input id="upload_speaker1" name="upload_speaker1" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker2" name="speaker2" type="text" class="form-control" placeholder="Speaker 2">
                            <input id="role2" name="role2" type="text" class="form-control" placeholder="Role">
                            <input id="upload_speaker2" name="upload_speaker2" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker3" name="speaker3" type="text" class="form-control" placeholder="Speaker 3">
                            <input id="role3" name="role3" type="text" class="form-control" placeholder="Role">
                            <input id="upload_speaker3" name="upload_speaker3" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker4" name="speaker4" type="text" class="form-control" placeholder="Speaker 4">
                            <input id="role4" name="role4" type="text" class="form-control" placeholder="Role">
                            <input id="upload_speaker4" name="upload_speaker4" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <h6>Organizer's info</h6>
                        <div class="form-group">
                            <input id="contactpersonname" name="contactpersonname" type="text" class="form-control" placeholder="Organiser's/Host's Name">
                        </div>
                        <div class="form-group form-half">
                            <input id="contactpersonemail" name="contactpersonemail" type="email" class="form-control" placeholder="Organiser's/Host's Email Address">
                        </div>
                        <div class="form-group form-half">
                            <input id="contactpersonphone" name="contactpersonphone" type="text" class="form-control" placeholder="Organiser's/Host's Phone Number">
                        </div>
                        <h6>Event's schedule</h6>
                        <div class="form-group">
                            <select class="form-control" id="daytype2" name="daytype">
                                <option disabled="" selected="">Single Day or Multi Day</option>
                                <option value="Single Day">Single Day</option>
                                <option value="Multi Day">Multi Day</option>
                            </select>
                        </div>

                    <div id="half2" class="form-group form-half">
                    <input type="text" id="startdate" name="startdate" class="form-control" onfocus="(this.type='date')" placeholder="Start Date" required>
                    </div>

                    <div class="form-group form-half form-multiday">
                    <input type="text" id="enddate" name= "enddate" class="form-control" onfocus="(this.type='date')" placeholder="End Date" required>
                    </div>

                    <div class="form-group">
                    <input id="regtimeone" name="regtimeone" type="text" class="form-control" placeholder="Registration time (i.e. 14:00)" required>
                    </div>

                    <div class="form-group form-half form-multiday"">
                    <input id="regtimetwo" name="regtimetwo" type="text" class="form-control" placeholder="Registration time two (i.e. 14:00)" required>
                    </div>

                    <div class="form-group form-half form-multiday"">
                    <input id="regtimethree" name="regtimethree" type="text" class="form-control" placeholder="Registration time three (i.e. 14:00)" required>
                    </div>

                    <div class="form-group">
                    <input id="starttimeone" name="starttimeone" type="text" class="form-control" placeholder="start time one  (i.e. 15:00)" required>
                    </div>

                    <div class="form-group form-half form-multiday"">
                    <input id="starttimetwo" name="starttimetwo" type="text" class="form-control" placeholder="start time two (i.e. 15:00)" required>
                    </div>

                    <div class="form-group form-half form-multiday"">
                    <input id="starttimethree" name="starttimethree" type="text" class="form-control" placeholder="start time three (i.e. 15:00)" required>
                    </div>



                    <div class="form-group">
                    <input id="endtimeone" name="endtimeone" type="text" class="form-control" placeholder="End time one  (i.e. 15:00)" required>
                    </div>

                    <div class="form-group form-half form-multiday"">
                    <input id="endtimetwo" name="endtimetwo" type="text" class="form-control" placeholder="End time two (i.e. 15:00)" required>
                    </div>

                    <div class="form-group form-half form-multiday"">
                    <input id="endtimethree" name="endtimethree" type="text" class="form-control" placeholder="End time three (i.e. 15:00)" required>
                    </div>


            <h6>Ticket price & additional info</h6>
                <div class="form-group form-half">
                    <select class="form-control" name="currency" required>
                        <option data-symbol="$" data-placeholder="0.00" selected>$</option>
                        <option data-symbol="€" data-placeholder="0.00">€</option>
                        <option data-symbol="£" data-placeholder="0.00">£</option>
                        <option data-symbol="¥" data-placeholder="0">¥</option>
                        <option data-symbol="$" data-placeholder="0.00">$</option>
                        <option data-symbol="$" data-placeholder="0.00">$</option>
                    </select>  </div>
                <div class="form-group form-half">
                    <input id="ticketprice" name="ticketprice" type="text" class="form-control" placeholder="Ticket Price"  required>
                </div>




<div class="form-group">
                            <input id="additionalinformation" name="additionalinformation" type="text" class="form-control" placeholder="Additional Information">
                        </div>
                        <h6 class="location-form-item">Event Photo (image of the city or venue)</h6>
                        <div class="form-group location-form-item">
                            <input id="eventcoverphoto2" name="eventcoverphoto2" type="file" class="form-control" placeholder="Upload Photo">
                        </div>


                        <h6 class="location-form-itemc">Event Photo (image of the city or venue)</h6>
                        <div class="location-form-itemc">
                            <input class="location-form-itemc" type="radio" name="eventcoverphoto2" id="eventcoverphoto2" value="https://images.pexels.com/photos/1190297/pexels-photo-1190297.jpeg?cs=srgb&dl=audience-celebration-concert-1190297.jpg&fm=jpg"  />
                            <img class="location-form-itemc" src="https://images.pexels.com/photos/1190297/pexels-photo-1190297.jpeg?cs=srgb&dl=audience-celebration-concert-1190297.jpg&fm=jpg" width="200px" height="200px" alt="I'm happy" />

                            <input class="location-form-itemc" type="radio" name="eventcoverphoto2" id="eventcoverphoto2" value="https://static1.squarespace.com/static/5a982ed18f51303a98d2de4d/t/5a9ed1a7c83025f018c61ae2/1520357800287/all+events.jpg?format=1500w"   />
                            <img class="location-form-itemc" src="https://static1.squarespace.com/static/5a982ed18f51303a98d2de4d/t/5a9ed1a7c83025f018c61ae2/1520357800287/all+events.jpg?format=1500w" width="200px" height="200px" alt="I'm happy" />
                        </div>



                        <div class="form-group">
                            <input id="registrationurl" name="registrationurl" type="text" class="form-control" placeholder="Registration URL">
                        </div>

                        <div class="form-group">
                            <select class="form-control"  id="gmt2" name="gmt" required>
                                <option value="" selected="selected">select your timezone</option>
                                <option value="-12:00">(GMT -12:00) Eniwetok, Kwajalein</option>
                                <option value="-11:00">(GMT -11:00) Midway Island, Samoa</option>
                                <option value="-10:00">(GMT -10:00) Hawaii</option>
                                <option value="-09:50">(GMT -9:30) Taiohae</option>
                                <option value="-09:00">(GMT -9:00) Alaska</option>
                                <option value="-08:00">(GMT -8:00) Pacific Time (US & Canada)</option>
                                <option value="-07:00">(GMT -7:00) Mountain Time (US & Canada)</option>
                                <option value="-06:00">(GMT -6:00) Central Time (US & Canada), Mexico City</option>
                                <option value="-05:00">(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
                                <option value="-04:50">(GMT -4:30) Caracas</option>
                                <option value="-04:00">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                                <option value="-03:50">(GMT -3:30) Newfoundland</option>
                                <option value="-03:00">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                                <option value="-02:00">(GMT -2:00) Mid-Atlantic</option>
                                <option value="-01:00">(GMT -1:00) Azores, Cape Verde Islands</option>
                                <option value="+00:00">(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca</option>
                                <option value="+01:00">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
                                <option value="+02:00">(GMT +2:00) Kaliningrad, South Africa</option>
                                <option value="+03:00">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                                <option value="+03:50">(GMT +3:30) Tehran</option>
                                <option value="+04:00">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                                <option value="+04:50">(GMT +4:30) Kabul</option>
                                <option value="+05:00">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                                <option value="+05:50">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                                <option value="+05:75">(GMT +5:45) Kathmandu, Pokhara</option>
                                <option value="+06:00">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                                <option value="+06:50">(GMT +6:30) Yangon, Mandalay</option>
                                <option value="+07:00">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                                <option value="+08:00">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                                <option value="+08:75">(GMT +8:45) Eucla</option>
                                <option value="+09:00">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                                <option value="+09:50">(GMT +9:30) Adelaide, Darwin</option>
                                <option value="+10:00">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                                <option value="+10:50">(GMT +10:30) Lord Howe Island</option>
                                <option value="+11:00">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                                <option value="+11:50">(GMT +11:30) Norfolk Island</option>
                                <option value="+12:00">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                                <option value="+12:75">(GMT +12:45) Chatham Islands</option>
                                <option value="+13:00">(GMT +13:00) Apia, Nukualofa</option>
                                <option value="+14:00">(GMT +14:00) Line Islands, Tokelau</option>

                            </select>
                        </div>
                        <div class="form-group location-form-itemc location-form-item">
                            <select class="form-control" id="language" name="language" required>
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

<div class="form-group location-form-item location-form-item">
    <select class="form-control" id="language" name="language">
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


                        <div class="alert alert-danger signup-alert">Please enter valid details</div>
                </div>
                <div class="modal-footer">
                    <div class="alert alert-danger addlisting-alert">Please enter valid details</div>

                    <input type="submit" value="Submit" class="btn btn-rounded btn-primary" name="Submitadd"/><br />
                    <input type="submit" value="Update event" class="btn btn-rounded btn-primary" name="Submitupdate"/><br />

                    <button id="closemodalbtn" type="button btn-rounded" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div></form>


            <div class="modal-success-msg">
                    <h6>SUCCESS</h6>
                </div>
            </div>



        </div>
    </div>
</div>


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

<script>
    function edit_event(id)
    {

        //  save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('user/ajax_update_event_userid_edit/')?>"+id,
            type: "GET",
            dataType: "JSON",

            success: function(data)
            {
               //console.log(data);

                var returnedData = JSON.stringify(data);

                var updateListingModal = $('#updatelistingModal');


                $('[name="id"]', updateListingModal).val(data[0].EventId);
                $('[name="eventname"]', updateListingModal).val(data[0].EventName);
                $('[name="eventsubtitle"]', updateListingModal).val(data[0].Subtitle);
                $('[name="eventcategory"]', updateListingModal).val(data[0].EventCategoryId);
                $('[id="eventtype"]', updateListingModal).val(data[0].EventTypeId);
                $('[name="venue"]', updateListingModal).val(data[0].Venue);
                $('[name="streetaddresss"]', updateListingModal).val(data[0].StreetAddress);
                $('[name="state"]', updateListingModal).val(data[0].State);
                $('[name="city"]', updateListingModal).val(data[0].City);
                $('[name="zipcode"]', updateListingModal).val(data[0].ZipCode);
                $('[name="Country"]', updateListingModal).val(data[0].Country);
                $('[name="EventSize"]', updateListingModal).val(data[0].EventSize);
                $('[name="speaker1"]', updateListingModal).val(data[0].FullName);
                $('[name="role1"]', updateListingModal).val(data[0].role);
                $('[name="speaker2"]', updateListingModal).val(data[1].FullName);
                $('[name="role2"]', updateListingModal).val(data[1].role);
                $('[name="speaker3"]', updateListingModal).val(data[2].FullName);
                $('[name="role3"]', updateListingModal).val(data[2].role);
                $('[name="speaker4"]', updateListingModal).val(data[3].FullName);
                $('[name="role4"]', updateListingModal).val(data[3].role);
                $('[name="contactpersonname"]', updateListingModal).val(data[0].ContactPersonName);
                $('[name="contactpersonemail"]', updateListingModal).val(data[0].ContactPersonEmail);
                $('[name="contactpersonphone"]', updateListingModal).val(data[0].ContactPersonPhone);
                $('[name="daytype"]', updateListingModal).val(data[0].DayType);
                $('[name="startdate"]', updateListingModal).val(data[0].StartDate);
                $('[name="enddate"]', updateListingModal).val(data[0].Enddate);
                $('[name="regtimeone"]', updateListingModal).val(data[0].Regtimeone);
                $('[name="regtimetwo"]', updateListingModal).val(data[0].Regtimetwo);
                $('[name="regtimethree"]', updateListingModal).val(data[0].Regtimethree);
                $('[name="starttimeone"]', updateListingModal).val(data[0].Starttimeone);
                $('[name="starttimetwo"]', updateListingModal).val(data[0].Starttimetwo);
                $('[name="starttimethree"]', updateListingModal).val(data[0].Starttimethree);
                $('[name="endtimeone"]', updateListingModal).val(data[0].Endtimeone);
                $('[name="endtimetwo"]', updateListingModal).val(data[0].Endtimetwo);
                $('[name="endtimethree"]', updateListingModal).val(data[0].Endtimethree);
                $('[name="currency"]', updateListingModal).val(data[0].Currency);
                $('[name="ticketprice"]', updateListingModal).val(data[0].TicketPrice);
                $('[name="additionalinformation"]', updateListingModal).val(data[0].AdditionalInformation);
                $('[name="registrationurl"]', updateListingModal).val(data[0].RegistrationUrl);
                $('[name="gmt2"]', updateListingModal).val(data[0].gmt);
                $('[name="language"]', updateListingModal).val(data[0].language_id);
                $('input[name=event_type_category][value='+data[0].EventTypeCategory+']',updateListingModal).attr('checked', true);


                var eventCoverPhoto = data[0].EventCoverPhoto;
                var selectedEventCoverRadio = $('[name="eventcoverphoto2"][value="' + eventCoverPhoto + '"]', updateListingModal).first();
                if (selectedEventCoverRadio.length > 0){
                    selectedEventCoverRadio.prop('checked', true);
                }
                //pre show radio div
                $('[name="eventtype"]').change();
                $('[name="daytype"]').change();
                $('[name="daytype2"]').change();
                $('#online2').change();
                $('#offline2').change();



                $('#updatelistingModal').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');

            }
        });
    }

</script>



<script type="text/javascript">
    $('.deleteicon').on('click', function(e){
        e.preventDefault();
        var delete_id = $(this).attr('deleteid');
        $('#deletelistingbtn').attr('delete_id',delete_id);

    });

    $('#deletelistingbtn').on('click', function(e){
        e.preventDefault();
        var delete_id = $(this).attr('delete_id');

        var delete_data = {
            "delete_id": delete_id
        };

        $.ajax({
            url : "<?php echo site_url('excel/deletelisting')?>/"+delete_id,
            type: "POST",
            success: function(returndata){
                if(returndata=='deleted') {
                    alert('error');
                } else {
                    alert('Listing deleted successfully!');
                    window.location.reload(true);
                }
            }
        });
    });


</script>

<script type="text/javascript">
    //update listing
    $('#eventtype').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  == '2' || selectedValue  == '3' || selectedValue  == '6') {
            $('.location-form-item').hide();
            $('.location-form-itemc').show();
        } else {
            $('.location-form-item').show();
            $('.location-form-itemc').hide();
        }
    });


    $('#daytype').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  == 'Multi Day') {
            $('#half').addClass("form-half");
            $('.form-multiday').show();

        } else {
            $('#half').removeClass("form-half");
            $('.form-multiday').hide();

        }
    });



    $('#daytype2').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  == 'Multi Day') {
            $('#half2').addClass("form-half");
            $('.form-multiday').show();
        } else {
            $('#half2').removeClass("form-half");
            $('.form-multiday').hide();
        }
    });

    $(document).ready(function() {
        $('.location-form-itemc').hide();
        $('.form-multiday').hide();
        $('.form-event-type2').show();
        $('.form-event-type1').hide();
        $('#half').removeClass("form-half");
        $('#half2').removeClass("form-half");

    });

</script>

<script>

    $('#updatelistingModal').ready(function() {
        $('.location-form-itemc').hide();
      ;
    });



</script>


<script>
    $("#online").change(function() {
        if($(this).prop('checked')) {
            $('.location-form-item').hide();
            $('.location-form-itemc').show();
            $('.event-photo-radio-div').show();
            $('.form-event-type2').hide();
            $('.form-event-type1').show();

        }
    });

    $("#offline").change(function() {
        if($(this).prop('checked')) {
            $('.location-form-item').show();
            $('.location-form-itemc').hide();
            $('.event-photo-radio-div').hide();
            $('.form-event-type1').hide();
            $('.form-event-type2').show();
        }
    });


    $("#online2").change(function() {
        if($(this).prop('checked')) {
            $('.location-form-item').hide();
            $('.location-form-itemc').show();
            $('.event-photo-radio-div').show();
            $('.form-event-type2').hide();
            $('.form-event-type1').show();

        }
    });
    $("#offline2").change(function() {
        if($(this).prop('checked')) {
            $('.location-form-item').show();
            $('.location-form-itemc').hide();
            $('.event-photo-radio-div').hide();
            $('.form-event-type1').hide();
            $('.form-event-type2').show();
        }
    });

</script>