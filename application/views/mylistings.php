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
               <a href="<?php echo base_url('mylistings');?>"> <h2 class="page-main-heading" style="text-align: center; margin-bottom: 5rem;">Mylistings</h2></a>
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
                                    <th>View Event</th>
                                    <th>Delete</th>

                                </tr>
                                <?php
                                for($mylistingsLoop=0; $mylistingsLoop<$mylistingsCount; $mylistingsLoop++) {
                                    ?>
                                    <tr>
                                        <td><a href="<?php echo '';//$mylistingId[$mylistingsLoop];?>"><?php echo $mylistingEventName[$mylistingsLoop];?></a></td>
                                        <td> <?php echo date("d-M-Y",strtotime($mylistingCreatedAt[$mylistingsLoop]));?></td>
                                        <td><?php echo (($mylistingStatus[$mylistingsLoop] == 1) ? 'Active' : (($mylistingStatus[$mylistingsLoop] == 2) ? 'Pending' : 'Blocked'));?> </td>

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
                            <input id="eventname" name="eventname" type="text" class="form-control" placeholder="Event Name">
                        </div>
                        <div class="form-group form-half">
                            <select class="form-control" id="eventcategory" name="eventcategory">
                                <option disabled="" selected="">Event Category</option>
                                <option value="2">Corporate</option>
                                <option value="3">IBC</option>
                            </select>
                        </div>
                        <div class="form-group form-half">
                            <select class="form-control" id="eventtype2" name="eventtype">
                                <option disabled="" selected="">Event Type</option>
                                <option value="1">Business Presentation</option>
                                <option value="2">Online Webinar</option>
                                <option value="3">Online Training</option>
                                <option value="4">Workshop</option>
                                <option value="5">Leadership Summit</option>
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
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="London">London</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Islands">Cocos Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia">Micronesia</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="North Korea">North Korea</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory">Palestinian Territory</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia">South Georgia</option>
                                <option value="South Korea">South Korea</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-Leste">Timor-Leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City">Vatican City</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                        <h6>Event size & speakers</h6>
                        <div class="form-group">
                            <select class="form-control" id="EventSize" name="EventSize">
                                <option disabled="" selected="">Size</option>
                                <option>Global</option>
                                <option>National</option>
                                <option>Regional</option>
                            </select>
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker1" name="speaker1" type="text" class="form-control" placeholder="Speaker 1">
                            <input id="upload_speaker1" name="upload_speaker1" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker2" name="speaker2" type="text" class="form-control" placeholder="Speaker 2">
                            <input id="upload_speaker2" name="upload_speaker2" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker3" name="speaker3" type="text" class="form-control" placeholder="Speaker 3">
                            <input id="upload_speaker3" name="upload_speaker3" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker4" name="speaker4" type="text" class="form-control" placeholder="Speaker 4">
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
                        <div class="form-group form-half">
                            <input type="text" id="startdate" name="startdate" class="form-control" onfocus="(this.type='date')" placeholder="Start Date">
                        </div>
                        <div class="form-group form-half">
                            <input type="text" id="enddate" name= "enddate" class="form-control" onfocus="(this.type='date')" placeholder="End Date">
                        </div>

                        <div class="form-group">
                            <input id="registrationtime" name="registrationtime" type="text" class="form-control" placeholder="Registration time (i.e. 14:00)">
                        </div>
                        <div class="form-group form-half">
                            <input id="eventstarttime" name="eventstarttime" type="text" class="form-control" placeholder="Start time (i.e. 16:00)">
                        </div>
                        <div class="form-group form-half">
                            <input id="eventendtime" name="eventendtime" type="text" class="form-control" placeholder="End Time (i.e. 20:00)">
                        </div>

                        <h6>Ticket price & additional info</h6>
                        <div class="form-group">
                            <input id="ticketprice" name="ticketprice" type="text" class="form-control" placeholder="Ticket Price">
                        </div>


                        <div class="form-group">
                            <input id="additionalinformation" name="additionalinformation" type="text" class="form-control" placeholder="Additional Information">
                        </div>
                        <h6 class="location-form-item">Event Photo (image of the city or venue)</h6>
                        <div class="form-group location-form-item">
                            <input id="eventcoverphoto" name="eventcoverphoto" type="file" class="form-control" placeholder="Upload Photo">
                        </div>


                        <h6 class="location-form-itemc">Event Photo (image of the city or venue)</h6>
                        <div class="location-form-itemc event-photo-radio-div">
                            <input class="location-form-itemc" type="radio" name="eventcoverphoto2" id="eventcoverphoto2" value="https://placekitten.com/151/151" class="input-hidden" />
                            <img class="location-form-itemc" src="https://placekitten.com/151/151" alt="I'm happy" />

                            <input class="location-form-itemc" type="radio" name="eventcoverphoto2" id="eventcoverphoto2" value="https://placekitten.com/152/152" class="input-hidden" />
                            <img class="location-form-itemc" src="https://placekitten.com/152/152" alt="I'm happy" />
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
                            <input id="eventname" name="eventname" type="text" class="form-control" placeholder="Event Name">
                        </div>
                        <div class="form-group form-half">
                            <select class="form-control" id="eventcategory" name="eventcategory">
                                <option disabled="" selected="">Event Category</option>
                                <option value="2">Corporate</option>
                                <option value="3">IBC</option>
                            </select>
                        </div>
                        <div class="form-group form-half">
                            <select class="form-control" id="eventtype" name="eventtype">
                                <option disabled="" selected="">Event Type</option>
                                <option value="1">Business Presentation</option>
                                <option value="2">Online Webinar</option>
                                <option value="3">Online Training</option>
                                <option value="4">Workshop</option>
                                <option value="5">Leadership Summit</option>
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
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="London">London</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Islands">Cocos Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia">Micronesia</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="North Korea">North Korea</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory">Palestinian Territory</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia">South Georgia</option>
                                <option value="South Korea">South Korea</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-Leste">Timor-Leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City">Vatican City</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                        <h6>Event size & speakers</h6>
                        <div class="form-group">
                            <select class="form-control" id="EventSize" name="EventSize">
                                <option disabled="" selected="">Size</option>
                                <option>Global</option>
                                <option>National</option>
                                <option>Regional</option>
                            </select>
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker1" name="speaker1" type="text" class="form-control" placeholder="Speaker 1">
                            <input id="upload_speaker1" name="upload_speaker1" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker2" name="speaker2" type="text" class="form-control" placeholder="Speaker 2">
                            <input id="upload_speaker2" name="upload_speaker2" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker3" name="speaker3" type="text" class="form-control" placeholder="Speaker 3">
                            <input id="upload_speaker3" name="upload_speaker3" type="file" class="form-control" placeholder="Upload Photo">
                        </div>
                        <div class="form-group form-half">
                            <input id="speaker4" name="speaker4" type="text" class="form-control" placeholder="Speaker 4">
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
                        <div class="form-group form-half">
                            <input type="text" id="startdate" name="startdate" class="form-control" onfocus="(this.type='date')" placeholder="Start Date">
                        </div>
                        <div class="form-group form-half">
                            <input type="text" id="enddate" name= "enddate" class="form-control" onfocus="(this.type='date')" placeholder="End Date">
                        </div>

                        <div class="form-group">
                            <input id="registrationtime" name="registrationtime" type="text" class="form-control" placeholder="Registration time (i.e. 14:00)">
                        </div>
                        <div class="form-group form-half">
                            <input id="eventstarttime" name="eventstarttime" type="text" class="form-control" placeholder="Start time (i.e. 16:00)">
                        </div>
                        <div class="form-group form-half">
                            <input id="eventendtime" name="eventendtime" type="text" class="form-control" placeholder="End Time (i.e. 20:00)">
                        </div>

                        <h6>Ticket price & additional info</h6>
                        <div class="form-group">
                            <input id="ticketprice" name="ticketprice" type="text" class="form-control" placeholder="Ticket Price">
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
                            <input class="location-form-itemc" type="radio" name="eventcoverphoto2" id="eventcoverphoto2" value="https://placekitten.com/151/151"  />
                            <img class="location-form-itemc" src="https://placekitten.com/151/151" alt="I'm happy" />

                            <input class="location-form-itemc" type="radio" name="eventcoverphoto2" id="eventcoverphoto2" value="https://placekitten.com/152/152"   />
                            <img class="location-form-itemc" src="https://placekitten.com/152/152" alt="I'm happy" />
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
                        <div class="alert alert-danger signup-alert">Please enter valid details</div>
                </div>
                <div class="modal-footer">
                    <div class="alert alert-danger addlisting-alert">Please enter valid details</div>

                    <input type="submit" value="Save as new" class="btn btn-rounded btn-primary" name="Submitadd"/><br />
                 <!--   <input type="submit" value="Update event" class="btn btn-rounded btn-primary" name="Submitupdate"/><br />-->

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


                var returnedData = JSON.stringify(data);
                console.log(data);
                var updateListingModal = $('#updatelistingModal');

                //do for everything below. Only if you want the values to be changed for that update model only.
                $('[name="id"]', updateListingModal).val(data[0].Id); //ye kon seform ki value settkerrha ha?
                $('[name="eventname"]', updateListingModal).val(data[0].EventName);
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
                $('[name="speaker2"]', updateListingModal).val(data[1].FullName);
                $('[name="speaker3"]', updateListingModal).val(data[2].FullName);
                $('[name="speaker4"]', updateListingModal).val(data[3].FullName);
                $('[name="contactpersonname"]', updateListingModal).val(data[0].ContactPersonName);
                $('[name="contactpersonemail"]', updateListingModal).val(data[0].ContactPersonEmail);
                $('[name="contactpersonphone"]', updateListingModal).val(data[0].ContactPersonPhone);
                $('[name="startdate"]', updateListingModal).val(data[0].StartDate);
                $('[name="enddate"]', updateListingModal).val(data[0].EndDate);
                $('[name="registrationtime"]', updateListingModal).val(data[0].RegistrationTime);
                $('[name="eventstarttime"]', updateListingModal).val(data[0].EventStartTime);
                $('[name="eventendtime"]', updateListingModal).val(data[0].EventEndTime);
                $('[name="ticketprice"]', updateListingModal).val(data[0].TicketPrice);
                $('[name="additionalinformation"]', updateListingModal).val(data[0].AdditionalInformation);
                $('[name="registrationurl"]', updateListingModal).val(data[0].RegistrationUrl);
                $('[name="gmt"]', updateListingModal).val(data[0].gmt);


                var eventCoverPhoto = data[0].EventCoverPhoto;
                var selectedEventCoverRadio = $('[name="eventcoverphoto2"][value="' + eventCoverPhoto + '"]', updateListingModal).first();
                if (selectedEventCoverRadio.length > 0){
                    selectedEventCoverRadio.prop('checked', true);
                }
                //pre show radio div
                $('[name="eventtype"]').change();

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
    $(document).ready(function() {
        $('.location-form-itemc').hide();
    });


    $('#eventtype').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  == '2' || selectedValue  == '3') {
            $('.location-form-item').hide();
            $('.location-form-itemc').show();
        } else {
            $('.location-form-item').show();
            $('.location-form-itemc').hide();
        }
    });
 </script>
<script>

    $('#updatelistingModal').ready(function() {

        $('.location-form-itemc').hide();
    });

    $('#eventtype2').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  == '2' || selectedValue  == '3') {
            $('.event-photo-radio-div').show();
        }else{
            $('.event-photo-radio-div').hide();
        }

    });

</script>
