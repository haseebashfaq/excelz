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
							<img src="<?php echo base_url();?>assets/images/logo.png" alt="Find My Doctor">
						</a>
						<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
							<i class="ti-align-justify"></i>
						</a>
						<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
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
									<h1 class="mainTitle">Manage Users</h1>
									
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Home</span>
									</li>
									<li class="active">
										<span>Manage Users</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: FORM VALIDATION EXAMPLE 1 -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h2>Users</h2>
									<p>
										Please enter user details and their specific role in order to create a account for user so that they can login into portal.
									</p>
									<hr>
                                    <form action="add_user" method="post" role="form" id="form" enctype="multipart/form-data">
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
														First Name <span class="symbol required"></span>
													</label>
													<div class="input-group">
															<span class="input-group-addon"> <i class="fa fa-user-o"></i> </span>
													<input type="text" placeholder="User's First Name" class="form-control" id="firstname" name="firstname">
													 </div>
												</div>
												<div class="form-group">
													<label class="control-label">
														Last Name <span class="symbol required"></span>
													</label>
													<div class="input-group">
															<span class="input-group-addon"> <i class="fa fa-user-o"></i> </span>

													<input type="text" placeholder="User's your Last Name" class="form-control" id="lastname" name="lastname">
													 </div>
												</div>
												<div class="form-group">
													<label class="control-label">
														Email Address <span class="symbol required"></span>
													</label>
													<div class="input-group">
															<span class="input-group-addon"> <i class="fa fa-envelope"></i> </span>
													<input type="email" placeholder="Email address for signin" class="form-control" id="email" name="email">
													 </div>
												</div>

													
												<div class="form-group">
													<label class="control-label">
														Mobile No <span class="symbol required"></span>
													</label>
													<div class="input-group">
													<span class="input-group-addon"> <i class="fa fa-phone"></i> </span>
													<input class="form-control" name="mobile_no" type="text" >
													</div>
												</div>

                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Gender <span class="symbol required"></span>
                                                    </label>
                                                    <div class="clip-radio radio-primary">
                                                        <input type="radio" value="Female" name="gender" id="gender_female" required>
                                                        <label for="gender_female">
                                                            Female
                                                        </label>
                                                        <input type="radio" value="Male" name="gender" id="gender_male" required>
                                                        <label for="gender_male">
                                                            Male
                                                        </label>
                                                    </div>
                                                </div>
													
													
												
												
											</div>
											<div class="col-md-6">
												
												<div class="form-group">
													<label class="control-label">
														Password <span class="symbol required"></span>
													</label>
													<div class="input-group">
															<span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
													<input type="password" class="form-control" placeholder="Password for future login" name="password" id="password">
												    </div>
												</div>
												<div class="form-group">

													<label class="control-label">
														Confirm Password <span class="symbol required"></span>
													</label>
													<div class="input-group">
															<span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
													<input type="password" class="form-control" placeholder="Confirm Password" id="password_again" name="password_again">
												    </div>
												</div>
												
												<div class="form-group connected-group">
													<label class="control-label">
														Role <span class="symbol required"></span>
													</label>
													<div class="row">
														<div class="col-md-6">
															<select name="role" id="role" class="form-control" >
																<option value=""></option>
																<option value="4">Web Master</option>
																<option value="3">Compounder</option>
																														
															</select>
														</div>
													</div>
												</div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="user-image">
                                                                <div class="fileinput-new thumbnail"><img  src="<?php echo empty($_FILES['file']['name']) ? '../assets/images/fmd.png' :$_FILES['file']['name']; ?>" alt="" style="width: 150px; height: 150px;">

                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" ></div>
                                                                <div class="user-image-buttons">
																			<span class="btn btn-azure btn-file btn-sm"><span class="fileinput-new"><i class="fa fa-pencil"></i></span><span class="fileinput-exists"><i class="fa fa-pencil"></i></span>
																				 <input type="file" name="file" id="file"><br>
																			</span>
                                                                    <a href="#" class="btn fileinput-exists btn-red btn-sm" data-dismiss="fileinput">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                </div>
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
													By clicking ADD User, user will be add and assign to the selected role.
												</p>
											</div>
											<div class="col-md-4">
												<button class="btn btn-primary btn-wide pull-right" type="submit">
													Add User <i class="fa fa-arrow-circle-right"></i>
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