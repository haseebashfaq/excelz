<?php  $this->load->view('admin/header'); ?>
    <!-- end: HEAD -->
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
                            <h1 class="mainTitle">User Profile</h1>

                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Home</span>
                            </li>
                            <li class="active">
                                <span>User Profile</span>
                            </li>
                        </ol>
                    </div>
                </section>
                <!-- end: PAGE TITLE -->
                <!-- start: FORM VALIDATION EXAMPLE 1 -->
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Details</h2>
                            <p>
                                Below is the details of your account you can update the information by putting new information and click update button

                            </p>

                            <hr>
                            <form action="update_user_profile" method="post" role="form" id="form" enctype="multipart/form-data">
                                <?php foreach($profiles as $pro ) { } ?>
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
                                                Full Name <span class="symbol required"></span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user-o"></i> </span>
                                                <input type="text" placeholder="FulL Name" class="form-control"  id="FullName" name="FullName" value="<?php echo $pro['FullName']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Email <span class="symbol required"></span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user-o"></i> </span>

                                                <input type="text" placeholder="Email" class="form-control" id="Email" name="Email" value="<?php echo $pro['Email']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">
                                                Password <span class="symbol required"></span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                <input type="password" class="form-control" placeholder="Password for future login" name="password" id="password" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label class="control-label">
                                                PhoneNo <span class="symbol required"></span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                <input type="text" class="form-control" placeholder="Phone No" id="PhoneNo" name="PhoneNo" value="<?php echo $pro['PhoneNo']; ?>" required>
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
                                            By clicking Update, all the above information will be updated.
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary btn-wide pull-right" type="submit">
                                            Update <i class="fa fa-arrow-circle-right"></i>
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
    <!-- start: FOOTER -->
<?php  $this->load->view('admin/footer'); ?>