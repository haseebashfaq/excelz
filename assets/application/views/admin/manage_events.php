<?php include 'backend/db.php';  ?>
<?php  $this->load->view('admin/header'); ?>
<body>
<div id="app">

    <!-- sidebar -->
    <?php $this->load->view('admin/nav-header'); ?>
    <!-- / sidebar -->
    <div class="app-content">
        <!-- start: TOP NAVBAR -->
        <header class="navbar navbar-default navbar-static-top">
            <!-- start: NAVBAR HEADER -->
            <div class="navbar-header">
                <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
                    <i class="ti-align-justify"></i>
                </a>
                <a class="navbar-brand" href="#" style="text-align: center;">
                    <img src="<?php echo base_url(); ?>admintemp/assets/images/logo.png" style="width:109px; height:42px" alt="ExcelzWeb">
                </a>
                <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
                    <i class="ti-align-justify"></i>
                </a>
                <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href="<?php echo base_url();?>.navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="ti-view-grid"></i>
                </a>
            </div>
            <!-- end: NAVBAR HEADER -->
            <!-- start: NAVBAR COLLAPSE -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-right">
                    <!-- start: MESSAGES DROPDOWN -->

                    <!-- end: MESSAGES DROPDOWN -->
                    <!-- start: ACTIVITIES DROPDOWN -->

                    <!-- end: ACTIVITIES DROPDOWN -->
                    <!-- start: LANGUAGE SWITCHER -->

                    <!-- start: LANGUAGE SWITCHER -->
                    <!-- start: USER OPTIONS DROPDOWN -->
                    <?php  $this->load->view('admin/login_header'); ?>
                    <!-- end: USER OPTIONS DROPDOWN -->
                </ul>
                <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
                <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                    <div class="arrow-left"></div>
                    <div class="arrow-right"></div>
                </div>
                <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
            </div>

            <!-- end: NAVBAR COLLAPSE -->
        </header>
        <!-- end: TOP NAVBAR -->
        <div class="main-content" >
            <div class="wrap-content container" id="container">
                <!-- start: PAGE TITLE -->
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle">Manage Events</h1>
                            <span class="mainDescription">Following section is for manage Events. You can update Events details from here. </span>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Dashboard</span>
                            </li>
                            <li class="active">
                                <span>Manage Events</span>
                            </li>

                        </ol>
                    </div>
                </section>
                <!-- end: PAGE TITLE -->
                <!-- start: FORM VALIDATION EXAMPLE 1 -->
                <div class="container">

                    </center>
                    <br />
                    <br />

                    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>

                            <th>Event Name</th>
                            <th>Venue</th>
                            <th>Creator Email</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th style="width:125px;">Action
                                </p></th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($events_all as $events){
                            if(empty($events)) { echo 'Please Add Listing </br> No listing found';
                            } else {

                                ?>
                                <tr>

                                    <td><?php echo $events['EventName'];?></td>
                                    <td><?php echo $events['Venue'];?></td>
                                    <td><?php echo $events['Email'];?></td>
                                    <td><?php
                                        $newDate = date("d-M-Y", strtotime($events['CreatedAt']));
                                        echo $newDate;
                                        ?>
                                    </td>
                                    <td><?php echo $events['StatusName'];  ?></td>
                                    <td>
                                        <button class="btn btn-warning" onclick="edit_event(<?php echo $events['id'];?>)"  data-toggle="modal" data-target="#updatelistingModal""><i class="glyphicon glyphicon-pencil"></i></button>
                                        <button class="btn btn-danger deleteicon" deleteid="<?php echo  $events['id'];?>" data-toggle="modal" data-target="#deletelistingModal""><i class="glyphicon glyphicon-remove"></i></button>

                                    </td>

                                </tr>
                            <?php }  }?>


                        </tbody>


                    </table>

                </div>
                <!-- <div class="container-fluid container-fullw bg-white">


                 <!-- end: FORM VALIDATION EXAMPLE 2 -->
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
                        <form action="<?php echo base_url("admin/reg_event"); ?>" id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <h6>Event's General Info</h6>
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
                                <select class="form-control" id="eventtype" name="eventtype">
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
                                <select class="form-control" id="eventtype" name="eventtype">
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
                                        $code = $row['CountryCode'];
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
                            <div class="form-group form-half">
                                <input type="text" id="startdate" name="startdate" class="form-control" onfocus="(this.type='date')" placeholder="Start Date" required>
                            </div>

                            <div class="form-group form-half">
                                <input type="text" id="enddate" name= "enddate" class="form-control" onfocus="(this.type='date')" placeholder="End Date" required>
                            </div>

                            <div class="form-group">
                                <input id="regtimeone" name="regtimeone" type="text" class="form-control" placeholder="Registration time (i.e. 14:00)" required>
                            </div>

                            <div class="form-group form-half form-multiday">
                                <input id="regtimetwo" name="regtimetwo" type="text" class="form-control" placeholder="Registration time two (i.e. 14:00)" required>
                            </div>

                            <div class="form-group form-half form-multiday">
                                <input id="regtimethree" name="regtimethree" type="text" class="form-control" placeholder="Registration time three (i.e. 14:00)" required>
                            </div>

                            <div class="form-group">
                                <input id="starttimeone" name="starttimeone" type="text" class="form-control" placeholder="start time one  (i.e. 15:00)" required>
                            </div>

                            <div class="form-group form-half form-multiday">
                                <input id="starttimetwo" name="starttimetwo" type="text" class="form-control" placeholder="start time two (i.e. 15:00)" required>
                            </div>

                            <div class="form-group form-half form-multiday">
                            <input id="starttimethree" name="starttimethree" type="text" class="form-control" placeholder="start time three (i.e. 15:00)" required>
                    </div>



                    <div class="form-group">
                        <input id="endtimeone" name="endtimeone" type="text" class="form-control" placeholder="End time one  (i.e. 15:00)" required>
                    </div>

                    <div class="form-group form-half form-multiday">
                    <input id="endtimetwo" name="endtimetwo" type="text" class="form-control" placeholder="End time two (i.e. 15:00)" required>
                </div>

                <div class="form-group form-half form-multiday">
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
                                <input id="eventcoverphoto" name="eventcoverphoto" type="file" class="form-control" placeholder="Upload Photo">
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
                                <select class="form-control"  id="gmt" name="gmt" >
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
                            <div class="form-group location-form-item">
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

                    </div>
                    <div class="modal-footer">


                        <input type="submit"  value="Submit" class="btn btn-rounded btn-primary" name="Submitadd"/>
                        <input type="submit" value="Update event" class="btn btn-rounded btn-primary" name="Submitupdate"/>

                        <button id="closemodalbtn"  type="button btn-rounded" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div></form>



            </div>



        </div>
    </div>



    <script src="<?php echo base_url('admintemp/assests/jquery/jquery-3.1.0.min.js')?>"></script>
    <script src="<?php echo base_url('admintemp/assests/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('admintemp/assests/datatables/js/dataTables.bootstrap.js')?>"></script>







    <!-- start: FOOTER -->
    <?php  $this->load->view('user/footer'); ?>


    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
        function edit_event(id)
        {

            //  save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('admin/ajax_update_event_userid_edit/')?>"+id,
                type: "GET",
                dataType: "JSON",

                success: function(data)
                {


                    var returnedData = JSON.stringify(data);
                    console.log(data);
                    var updateListingModal = $('#updatelistingModal');



                    $('[name="id"]', updateListingModal).val(data[0].Id);
                    $('[name="eventname"]', updateListingModal).val(data[0].EventName);
                    $('[name="eventsubtitle"]', updateListingModal).val(data[0].Subtitle);
                    $('[name="eventcategory"]', updateListingModal).val(data[0].EventCategoryId);
                    $('[name="eventtype"]', updateListingModal).val(data[0].EventTypeId);
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
                    $('[name="gmt"]', updateListingModal).val(data[0].gmt);
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

                    $('#updatelistingModal').modal('show'); // show bootstrap modal when complete loaded
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
                $('.form-multiday').show();
            } else {
                $('.form-multiday').hide();
            }
        });



        $('#daytype2').change(function() {
            var selectedValue = $(this).val();

            if(selectedValue  == 'Multi Day') {
                $('.form-multiday').show();
            } else {
                $('.form-multiday').hide();
            }
        });

        $(document).ready(function() {
            $('.location-form-itemc').hide();
            $('.form-multiday').hide();
            $('.form-event-type2').hide();
            $('.form-event-type1').show();

        });

    </script>

    <script>

        $('#updatelistingModal').ready(function() {
            $('.location-form-itemc').hide();
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