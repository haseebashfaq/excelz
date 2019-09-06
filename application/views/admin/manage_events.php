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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="addlistingModalLabel">Update / Add Listing</h3>

                </div>
                <div class="modal-body form">
                    <div class="contact_form">
                        <form action="<?php echo base_url("admin/reg_event"); ?>" id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
                           <div class="form-body">
                            <div class="form-group">


                                <input id="id" name="id" type="hidden" style="display: none;" class="form-control" placeholder="Event Name">

                            </div>
                               <h4 class="center location-form-item">Event Information</h4>
                            <div class="form-group">
                                <label class="control-label col-md-3">Event Name</label>
                                <div class="col-md-3">
                                <input id="eventname" name="eventname" type="text" class="form-control" placeholder="Event Name">
                                </div>
                                <label class="control-label col-md-3">Event Subtitle</label>
                                <div class="col-md-3">
                                    <input id="eventsubtitle" name="eventsubtitle" type="text" class="form-control" placeholder="Event Subtitle">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Event Nature</label>
                                <div class="col-md-9">
                                    <input type="radio" id="online2" name="event_type_category" value="1"
                                           checked>
                                    <label for="online">Online</label>
                                    <input type="radio" id="offline2" name="event_type_category" value="0">
                                    <label for="offline">Offline</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Event Category</label>
                                <div class="col-md-3">
                                <select class="form-control" id="eventcategory" name="eventcategory">
                                    <option disabled="" selected="">Event Category</option>
                                    <option value="2">Corporate</option>
                                    <option value="3">IBC</option>
                                </select>
                                </div>
                                <div class="form-half form-event-type1">
                                    <label class="control-label col-md-3">Event Type</label>
                                    <div class="col-md-3">
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
                                </div>
                                <div class=" form-half form-event-type2">
                                    <label class="control-label col-md-3">Event Type</label>
                                    <div class="col-md-3">
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
                                </div>
                            </div>



                               <hr />
                            <h4 class="center location-form-item">Location/Venue Details</h4>
                            <div class="form-group location-form-item">
                                <label class="control-label col-md-3">Venue Name</label>
                                <div class="col-md-9">
                                <input id="venue" name="venue" type="text" class="form-control" placeholder="Location/Venue Name">
                                </div>
                            </div>
                            <div class="form-group form-half location-form-item">
                                <label class="control-label col-md-3">Street Address</label>
                                <div class="col-md-9">
                                <input id="streetaddresss" name="streetaddresss" type="text" class="form-control" placeholder="Street Address">
                                </div>
                            </div>
                            <div class="form-group form-half location-form-item">
                                <label class="control-label col-md-3">State/Region</label>
                                <div class="col-md-3">
                                <input id="state" name="state" type="text" class="form-control" placeholder="State/Region/Province">
                                </div>
                                <div class="form-half location-form-item">
                                    <label class="control-label col-md-3">City</label>
                                    <div class="col-md-3">
                                        <input id="city" name="city" type="text" class="form-control" placeholder="City">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-half location-form-item">
                                <label class="control-label col-md-3">Postal Code</label>
                                <div class="col-md-3">
                                <input id="zipcode" name="zipcode" type="text" class="form-control" placeholder="Zip/Postal Code">
                                </div>
                                <div class="location-form-item">
                                    <label class="control-label col-md-3">Country</label>
                                    <div class="col-md-3">
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
                                </div>
                            </div>

                               <hr />
                               <h4 class="center location-form-item">Event Size</h4>
                            <div class="form-group">
                                <label class="control-label col-md-3">Size</label>
                                <div class="col-md-9">
                                <select class="form-control" id="EventSize" name="EventSize">
                                    <option disabled="" selected="">Size</option>
                                    <option>Global</option>
                                    <option>National</option>
                                    <option>Regional</option>
                                    <option>International</option>
                                </select>
                                </div>
                            </div>
                               <hr />
                               <h4 class="center location-form-item">Speakers</h4>
                            <div class="form-group form-half">
                                <label class="control-label col-md-3">Speaker 1 Name</label>
                                <div class="col-md-3">
                                <input id="speaker1" name="speaker1" type="text" class="form-control" placeholder="Speaker 1">
                                </div>
                                <label class="control-label col-md-3">Speaker 1 Role</label>
                                <div class="col-md-3">
                                <input id="role1" name="role1" type="text" class="form-control" placeholder="Role">
                                </div>


                            </div>
                               <div class="form-group">
                                   <label class="control-label col-md-3">Speaker 1 Image</label>
                                   <div class="col-md-3">
                                       <input id="upload_speaker1" name="upload_speaker1" type="file" class="form-control" placeholder="Upload Photo">
                                   </div>
                                   <div class="col-md-6">
                                   <img  id="profilespeaker1" src="" width="200px" height="200px" alt="Profile Speaker 1" />
                                   <input type="hidden" name="profilespeaker1" id="profilespeaker1Input" value="">
                                   </div>
                               </div>
                            <div class="form-group form-half">
                                <label class="control-label col-md-3">Speaker 2</label>
                                <div class="col-md-3">
                                <input id="speaker2" name="speaker2" type="text" class="form-control" placeholder="Speaker 2">
                                </div>
                                <label class="control-label col-md-3">Speaker 2 Role</label>
                                <div class="col-md-3">
                                <input id="role2" name="role2" type="text" class="form-control" placeholder="Role">
                                </div>


                            </div>
                               <div class="form-group">
                                   <label class="control-label col-md-3">Speaker 2 Image</label>
                                   <div class="col-md-3">
                                       <input id="upload_speaker2" name="upload_speaker2" type="file" class="form-control" placeholder="Upload Photo">
                                   </div>
                                   <div class="col-md-6">
                                       <img   id="profilespeaker2" src="" width="200px" height="200px" alt="Profile Speaker 2" />
                                       <input type="hidden" name="profilespeaker2" id="profilespeaker2Input" value="">
                                   </div>
                               </div>
                            <div class="form-group form-half">
                                <label class="control-label col-md-3">Speaker 3</label>
                                <div class="col-md-3">
                                <input id="speaker3" name="speaker3" type="text" class="form-control" placeholder="Speaker 3">
                                </div>
                                <label class="control-label col-md-3">Speaker 3 Role</label>
                                <div class="col-md-3">
                                <input id="role3" name="role3" type="text" class="form-control" placeholder="Role">
                                </div>


                            </div>
                               <div class="form-group">
                                   <label class="control-label col-md-3">Speaker 3 Image</label>
                                   <div class="col-md-3">
                                       <input id="upload_speaker3" name="upload_speaker3" type="file" class="form-control" placeholder="Upload Photo">
                                   </div>
                                   <div class="col-md-6">
                                       <img  id="profilespeaker3" src="" width="200px" height="200px" alt="Profile Speaker 3" />
                                       <input type="hidden" name="profilespeaker3" id="profilespeaker3Input" value="">
                                   </div>
                               </div>

                            <div class="form-group form-half">
                                <label class="control-label col-md-3">Speaker 4</label>
                                <div class="col-md-3">
                                <input id="speaker4" name="speaker4" type="text" class="form-control" placeholder="Speaker 4">
                                </div>
                                <label class="control-label col-md-3">Speaker 4 Role</label>
                                <div class="col-md-3">
                                <input id="role4" name="role4" type="text" class="form-control" placeholder="Role">
                                </div>


                            </div>
                               <div class="form-group">
                                   <label class="control-label col-md-3">Speaker 4 Image</label>
                                   <div class="col-md-3">
                                       <input id="upload_speaker4" name="upload_speaker4" type="file" class="form-control" placeholder="Upload Photo">
                                   </div>
                                   <div class="col-md-6">
                                       <img  id="profilespeaker4" src="" width="200px" height="200px" alt="Profile Speaker 4" />
                                       <input type="hidden" name="profilespeaker4" id="profilespeaker4Input" value="">
                                   </div>
                               </div>

                               <hr />
                               <h4 class="center location-form-item">Organizer Information</h4>
                            <div class="form-group">
                                <label class="control-label col-md-3">Organizer's/Host's name</label>
                                <div class="col-md-9">
                                <input id="contactpersonname" name="contactpersonname" type="text" class="form-control" placeholder="Organiser's/Host's Name">
                                </div>
                            </div>
                            <div class="form-group form-half">
                                <label class="control-label col-md-3">Organiser's/Host's Email</label>
                                <div class="col-md-9">
                                <input id="contactpersonemail" name="contactpersonemail" type="email" class="form-control" placeholder="Organiser's/Host's Email Address">
                                </div>
                            </div>
                            <div class="form-group form-half">
                                <label class="control-label col-md-3">Organiser's/Host's Phone Number</label>
                                <div class="col-md-9">
                                <input id="contactpersonphone" name="contactpersonphone" type="text" class="form-control" placeholder="Organiser's/Host's Phone Number">
                                </div>
                            </div>
                               <hr />
                               <h4 class="center location-form-item">Event Schedule</h4>
                            <div class="form-group">
                                <label class="control-label col-md-3">Event Days</label>
                                <div class="col-md-9">
                                <select class="form-control" id="daytype2" name="daytype">
                                    <option disabled="" selected="">Single Day or Multi Day</option>
                                    <option value="Single Day">Single Day</option>
                                    <option value="Multi Day">Multi Day</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group form-half">
                                <label class="control-label col-md-3">Event Start Date</label>
                                <div class="col-md-3">
                                <input type="text" id="startdate" name="startdate" class="form-control" onfocus="(this.type='date')" placeholder="Start Date" required>
                                </div>
                                <label class="control-label col-md-3">Event End Date</label>
                                <div class="col-md-3">
                                    <input type="text" id="enddate" name= "enddate" class="form-control" onfocus="(this.type='date')" placeholder="End Date" required>
                                </div>
                            </div>

                            <div class="form-group form-half">

                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Registration Time Day 1</label>
                                <div class="col-md-3">
                                <input id="regtimeone" onfocus="(this.type='time')" name="regtimeone" type="text" class="form-control" placeholder="Registration time (i.e. 14:00)" required>
                                </div>
                                <div class="form-half form-multiday">
                                    <label class="control-label col-md-3">Registration Time Day 2</label>
                                    <div class="col-md-3">
                                        <input id="regtimetwo" name="regtimetwo" onfocus="(this.type='time')" type="text" class="form-control" placeholder="Registration time two (i.e. 14:00)" >
                                    </div>
                                </div>
                            </div>



                            <div class="form-group form-half form-multiday">
                                <label class="control-label col-md-3">Registration Time Day 3</label>
                                <div class="col-md-3">
                                <input id="regtimethree" name="regtimethree" onfocus="(this.type='time')" type="text" class="form-control" placeholder="Registration time three (i.e. 14:00)" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Event Start Time Day 1</label>
                                <div class="col-md-3">
                                <input id="starttimeone" name="starttimeone" onfocus="(this.type='time')" type="text" class="form-control" placeholder="start time one  (i.e. 15:00)" required>
                                </div>
                                <label class="control-label col-md-3">Event End Time Day 1</label>
                                <div class="col-md-3">
                                    <input id="endtimeone" name="endtimeone" type="text" onfocus="(this.type='time')" class="form-control" placeholder="End time one  (i.e. 15:00)" required>
                                </div>
                            </div>


                            <div class="form-group form-half form-multiday">
                                <label class="control-label col-md-3">Event Start Time Day 2</label>
                                <div class="col-md-3">
                                <input id="starttimetwo" name="starttimetwo" onfocus="(this.type='time')" type="text" class="form-control" placeholder="start time two (i.e. 15:00)" >
                                </div>
                                <div class="form-half form-multiday">
                                    <label class="control-label col-md-3">Event End Time Day 2</label>
                                    <div class="col-md-3">
                                        <input id="endtimetwo" name="endtimetwo" type="text" onfocus="(this.type='time')" class="form-control" placeholder="End time two (i.e. 15:00)" >
                                    </div>
                                </div>
                            </div>


                            <div class="form-group form-half form-multiday">
                                <label class="control-label col-md-3">Event Start Time Day 3</label>
                                <div class="col-md-3">
                                <input id="starttimethree" name="starttimethree" onfocus="(this.type='time')"  type="text" class="form-control" placeholder="start time three (i.e. 15:00)" >
                                </div>
                                <div class="form-half form-multiday">
                                    <label class="control-label col-md-3">Event End Time Day 3</label>
                                    <div class="col-md-3">
                                        <input id="endtimethree" name="endtimethree" type="text"  onfocus="(this.type='time')" class="form-control" placeholder="End time three (i.e. 15:00)" >
                                    </div>
                                </div>
                            </div>









                            <hr />
                            <h4 class="center location-form-item">Ticket Price</h4>
                            <div class="form-group form-half">
                                <label class="control-label col-md-3">Ticket Price</label>
                                <div class="col-md-3">
                                <select class="form-control" name="currency" required>
                                    <option data-symbol="$" data-placeholder="0.00" selected>$</option>
                                    <option data-symbol="€" data-placeholder="0.00">€</option>
                                    <option data-symbol="£" data-placeholder="0.00">£</option>
                                </select>
                                </div>
                            <div class="col-md-6 form-half">
                                <input id="ticketprice" name="ticketprice" type="text" class="form-control" placeholder="Ticket Price"  required>
                            </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Additional Information</label>
                                <div class="col-md-3">
                                <input id="additionalinformation" name="additionalinformation" type="text" class="form-control" placeholder="Additional Information">
                                </div>
                            </div>
                            <hr />
                            <h4 class="center location-form-item">Event Banner</h4>
                            <div class="form-group location-form-item">
                                <label class="control-label col-md-3">Event Photo (image of the city or venue)</label>
                                <div class="col-md-3">
                                <input id="eventcoverphoto" name="eventcoverphoto" type="file" class="form-control" placeholder="Upload Photo">
                                </div>
                                <div class="col-md-6">
                                <img  id="profileImage" src="" width="200px" height="200px" alt="Event Imag" />
                                <input type="hidden" name="profileImage" id="profileImageInput" value="">
                                </div>
                            </div>


                            <h6 class="location-form-itemc">Event Photo (image of the city or venue)</h6>
                            <div class="location-form-itemc">
                                <label class="control-label col-md-3">Event Photo (image of the city or venue)</label>
                                <div class="col-md-6">
                                <input class="location-form-itemc" type="radio" name="eventcoverphoto2" id="eventcoverphoto2" value="https://images.pexels.com/photos/1190297/pexels-photo-1190297.jpeg?cs=srgb&dl=audience-celebration-concert-1190297.jpg&fm=jpg"  />

                                <img class="location-form-itemc" src="https://images.pexels.com/photos/1190297/pexels-photo-1190297.jpeg?cs=srgb&dl=audience-celebration-concert-1190297.jpg&fm=jpg" width="200px" height="200px" alt="I'm happy" />

                                <input class="location-form-itemc" type="radio" name="eventcoverphoto2" id="eventcoverphoto2" value="https://static1.squarespace.com/static/5a982ed18f51303a98d2de4d/t/5a9ed1a7c83025f018c61ae2/1520357800287/all+events.jpg?format=1500w"   />
                                <img class="location-form-itemc" src="https://static1.squarespace.com/static/5a982ed18f51303a98d2de4d/t/5a9ed1a7c83025f018c61ae2/1520357800287/all+events.jpg?format=1500w" width="200px" height="200px" alt="I'm happy" />
                                </div>
                            </div>




                            <div class="form-group">
                                <label class="control-label col-md-3">Registration Url</label>
                                <div class="col-md-6">
                                <input id="registrationurl" name="registrationurl" type="text" class="form-control" placeholder="Registration URL">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">TimeZone</label>
                                <div class="col-md-6">
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
                            </div>
                            <div class="form-group location-form-item">
                                <label class="control-label col-md-3">Language</label>
                                <div class="col-md-6">
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

                    </div>
                    <div class="modal-footer">


                        <input type="submit"  value="Save as new" class="btn btn-success" name="Submitadd"/>
                        <input type="submit" value="Update event" class="btn btn-success" name="Submitupdate"/>

                        <button id="closemodalbtn"  type="button btn-rounded" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
                </form>



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



                    $('[name="id"]', updateListingModal).val(data[0].EventId);
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
                    //$('input[name=event_type_category][value='+data[0].EventTypeCategory+']',updateListingModal).attr('checked', true);
                    //$('input[name=event_type_category][value!='+data[0].EventTypeCategory+']',updateListingModal).attr('checked', false);
                    $('input[name=event_type_category]').val(data[0].EventTypeCategory); //ye to pehle se thi na ? yes

                    //clear all images so if user closes form that has images, opened that has no images, then reopens that has images. all works fine
                    $("#profileImage, #profilespeaker1, #profilespeaker2, #profilespeaker3, #profilespeaker4").removeAttr('src');
                    $('#profileImageInput, #profilespeaker1Input, #profilespeaker2Input, #profilespeaker3Input, #profilespeaker4Input').val('');

                    var profileImage = data[0].EventCoverPhoto;
                    if (profileImage !== null && profileImage !== ''){
                        $("#profileImage").attr("src", baseUrl + profileImage);
                        $('#profileImageInput').val(profileImage);
                    }

                    var profileSpeaker1Image = data[0].DisplayPicture;
                    if (profileSpeaker1Image !== null && profileSpeaker1Image !== ''){
                        $("#profilespeaker1").attr("src", baseUrl + profileSpeaker1Image);
                        $('#profilespeaker1Input').val(profileSpeaker1Image);
                    }
                    var profileSpeaker2Image = data[1].DisplayPicture;
                    if (profileSpeaker2Image !== null && profileSpeaker2Image !== ''){
                        $("#profilespeaker2").attr("src", baseUrl + profileSpeaker2Image);
                        $('#profilespeaker2Input').val(profileSpeaker2Image);
                    }
                    var profileSpeaker3Image = data[2].DisplayPicture;
                    if (profileSpeaker3Image !== null && profileSpeaker3Image !== ''){
                        $("#profilespeaker3").attr("src", baseUrl + profileSpeaker3Image);
                        $('#profilespeaker3Input').val(profileSpeaker3Image);
                    }
                    var profileSpeaker4Image = data[3].DisplayPicture;
                    if (profileSpeaker4Image !== null && profileSpeaker4Image !== ''){
                        $("#profilespeaker4").attr("src", baseUrl + profileSpeaker4Image);
                        $('#profilespeaker4Input').val(profileSpeaker4Image);
                    }


                    var eventCoverPhoto = data[0].EventCoverPhoto;
                    var selectedEventCoverRadio = $('[name="eventcoverphoto2"][value="' + eventCoverPhoto + '"]', updateListingModal).first();
                    if (selectedEventCoverRadio.length > 0){
                        selectedEventCoverRadio.prop('checked', true);
                    }
                    //pre show radio div
                    $('[name="eventtype"]', updateListingModal).change();
                    $('[name="daytype"]', updateListingModal).change();
                    $('[name="daytype2"]', updateListingModal).change();
                    $('[name="event_type_category"]:checked', updateListingModal).change();

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
            //$('.location-form-itemc').hide();
        });



    </script>


    <script>
        //i dont know ye online,offline ids kon si ha. but agar kahi use ho to
        //jesa mene event_type_category ka kia. K dono k same name ha.
        //us k under i put if tag. usi tarah is k sath kerna.
        //then jquery selector by $('[name="whatever"]:checked')
        //warna dono triggers hoge. ok? ok
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

        $("[name='event_type_category']").change(function(){
            var currentValue = $(this).val(); //0 is offline, 1 is online
            console.log("Value: "+ currentValue);
            if (currentValue === "1"){
                console.log("i shoud be here");
                $('.location-form-item').hide();
                $('.location-form-itemc').show();
                $('.event-photo-radio-div').show();
                $('.form-event-type2').hide();
                $('.form-event-type1').show();
            }else{
                $('.location-form-item').show();
                $('.location-form-itemc').hide();
                $('.event-photo-radio-div').hide();
                $('.form-event-type1').hide();
                $('.form-event-type2').show();
            }
        });

    </script>