<?php  $this->load->view('user/header'); ?>
	<body>
		<div id="app">
			<!-- sidebar -->

    <?php $this->load->view('user/nav-header'); ?>
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
                            <?php  $this->load->view('user/login_header'); ?>
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
									<h1 class="mainTitle">Add Event</h1>
									
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Home</span>
									</li>
									<li class="active">
										<span>Add Event</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: FORM VALIDATION EXAMPLE 1 -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h2>Add Event</h2>
									<p>
										Please enter event details
									</p>
									<hr>
									<form action="reg_event" method="post" role="form" id="form" enctype="multipart/form-data">
										<div class="row">
											<div class="col-md-12">
												<div class="errorHandler alert alert-danger no-display">
													<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
												</div>
												<div class="successHandler alert alert-success no-display">
													<i class="fa fa-ok"></i> Your form validation is successful!
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													<label class="control-label">
														Event Name <span class="symbol required"></span>
													</label>
													<div class="input-group">
															<span class="input-group-addon"> <i class="fa fa-user-o"></i> </span>
													<input type="text" placeholder="Event Name" class="form-control" id="eventname" name="eventname" required>
													 </div>
												</div>

                                                <div class="form-group">

                                                    <label class="control-label">
                                                        Event Category <span class="symbol required"></span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-user-o"></i> </span>
                                                        <select class="form-control" id="eventcategory" name="eventcategory" required>
                                                            <option disabled="" selected="">Event Category</option>
                                                            <option value="1">Corporate</option>
                                                            <option value="2">IBC</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">

                                                    <label class="control-label">
                                                        Event Type <span class="symbol required"></span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-user-o"></i> </span>
                                                        <select class="form-control" id="eventtype" name="eventtype" required>
                                                            <option disabled="" selected="">Event Type</option>
                                                            <option value="1">Business Presentation</option>
                                                            <option value="2"> Online Webinar</option>
                                                            <option value="3">Online Training</option>
                                                            <option value="4">Workshop</option>
                                                            <option value="5">Leadership Summit</option>
                                                        </select>
                                                    </div>
                                                </div>


												<div class="form-group">
													<label class="control-label">
														Venue <span class="symbol required"></span>
													</label>
													<div class="input-group">
															<span class="input-group-addon"> <i class="fa fa-user-o"></i> </span>

													<input type="text" placeholder="Venue" class="form-control" id="venue" name="venue" required>
													 </div>
												</div>
												<div class="form-group">
													<label class="control-label">
														Street Address <span class="symbol required"></span>
													</label>
													<div class="input-group">
															<span class="input-group-addon"> <i class="fa fa-envelope"></i> </span>
													<input type="text" placeholder="Street Address" class="form-control" id="streetaddresss" name="streetaddresss" required>
													 </div>
												</div>
												<div class="form-group">
													<label class="control-label">
                                                        State <span class="symbol required"></span>
													</label>
													<div class="input-group">
															<span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
													<input type="text" class="form-control" placeholder="State" name="state" id="state" required>
												    </div>
												</div>
												<div class="form-group">

													<label class="control-label">
                                                        City <span class="symbol required"></span>
													</label>
													<div class="input-group">
															<span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
													<input type="text" class="form-control" placeholder="City" id="city" name="city" required>
												    </div>
												</div>
                                                <div class="form-group">

                                                    <label class="control-label">
                                                        Zip Code <span class="symbol required"></span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                        <input type="text" class="form-control" placeholder="Zip Code" id="zipcode" name="zipcode" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <label class="control-label">
                                                        Country	<span class="symbol required"></span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                        <select class="form-control" id="Country" name="Country">
                                                            <option disabled="" selected="">Location</option>
                                                            <option value="Afghanistan">Afghanistan</option>
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
                                                </div>
                                                <div class="form-group">

                                                    <label class="control-label">
                                                        Event Size <span class="symbol required"></span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                        <select class="form-control" id="EventSize" name="EventSize">
                                                            <option disabled="" selected="">Event Size</option>
                                                            <option>Global</option>
                                                            <option>National</option>
                                                            <option>Regional</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <label class="control-label">
                                                        Speaker 1 <span class="symbol required"></span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                        <input type="text" class="form-control" placeholder="Speaker 1" id="speaker1" name="speaker1" required>
                                                        <input id="upload_speaker1" name="upload_speaker1" type="file" class="form-control" placeholder="Upload Photo">
                                                    </div>
                                                </div>



                                                <div class="form-group">

                                                    <label class="control-label">
                                                        Speaker 2 <span class="symbol required"></span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                        <input type="text" class="form-control" placeholder="Speaker 2" id="speaker2" name="speaker2" required>
                                                        <input id="upload_speaker2" name="upload_speaker2" type="file" class="form-control" placeholder="Upload Photo">
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <label class="control-label">
                                                        Speaker 3<span class="symbol required"></span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                        <input type="text" class="form-control" placeholder="Speaker 3" id="speaker3" name="speaker3" required>
                                                        <input id="upload_speaker3" name="upload_speaker3" type="file" class="form-control" placeholder="Upload Photo">
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <label class="control-label">
                                                        Speaker 4 <span class="symbol required"></span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                        <input type="text" class="form-control" placeholder="Speaker 4" id="speaker4" name="speaker4" required>
                                                        <input id="upload_speaker4" name="upload_speaker4" type="file" class="form-control" placeholder="Upload Photo">
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <label class="control-label">
                                                        Contact Person Name <span class="symbol required"></span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                        <input type="text" class="form-control" placeholder="Contact Person Name" id="contactpersonname" name="contactpersonname" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <label class="control-label">
                                                        Contact Person Email <span class="symbol required"></span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                        <input type="email" class="form-control" placeholder="Contact Person Email" id="contactpersonemail" name="contactpersonemail" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <label class="control-label">
                                                        Contact Person Phone <span class="symbol required"></span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                        <input type="text" class="form-control" placeholder=" Contact Person Phone" id="contactpersonphone" name="contactpersonphone" required>
                                                    </div>
                                                </div>
											</div>
											<div class="col-md-6">
												

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
                                                                Start Date <span class="symbol required"></span>
															</label>
															<div class="input-group">
															<span class="input-group-addon"> <i class="fa fa-phone"></i> </span>
															<input class="form-control" type="date" name="startdate" id="startdate" required>
															</div>
														</div>
													</div>
													
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
                                                                End Date <span class="symbol required"></span>
															</label>
															<div class="input-group">
															<span class="input-group-addon"> <i class="fa fa-id-card"></i> </span>
															<input class="form-control" type="date" name="enddate" id="enddate" required>
															</div>
														</div>
													</div>
													
												</div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Registration Time <span class="symbol required"></span>
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"> <i class="fa fa-id-card"></i> </span>
                                                                <input class="form-control" type="time" name="registrationtime" id="registrationtime" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Event Start Time <span class="symbol required"></span>
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"> <i class="fa fa-id-card"></i> </span>
                                                                <input class="form-control" type="time" name="eventstarttime" id="eventstarttime" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Event End Time <span class="symbol required"></span>
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"> <i class="fa fa-id-card"></i> </span>
                                                                <input class="form-control" type="time" name="eventendtime" id="eventendtime" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Ticket Price <span class="symbol required"></span>
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"> <i class="fa fa-id-card"></i> </span>
                                                                <input class="form-control" type="text" name="ticketprice" id="ticketprice" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Additional Information <span class="symbol required"></span>
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"> <i class="fa fa-id-card"></i> </span>
                                                                <input class="form-control" type="text" name="additionalinformation" id="additionalinformation" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Event Cover Photo <span class="symbol required"></span>
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"> <i class="fa fa-id-card"></i> </span>

                                                                <input id="eventcoverphoto" name="eventcoverphoto" type="file" class="form-control" placeholder="Upload Photo" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Registration Url <span class="symbol required"></span>
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"> <i class="fa fa-id-card"></i> </span>
                                                                <input class="form-control" type="text" name="registrationurl" id="registrationurl" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div>
													<span class="symbol required"></span>Required Fields
													<hr>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-8">
												<p>
													By clicking ADD Event, Event will be added.
												</p>

											</div>
											<div class="col-md-4">
												<button class="btn btn-primary btn-wide pull-right" type="submit">
													Add Event <i class="fa fa-arrow-circle-right"></i>
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- end: FORM VALIDATION EXAMPLE 1 -->
						<!-- start: FORM VALIDATION EXAMPLE 2 -->
						
						<!-- end: FORM VALIDATION EXAMPLE 2 -->
					</div>
				</div>
			</div>


<?php  $this->load->view('user/footer'); ?>


