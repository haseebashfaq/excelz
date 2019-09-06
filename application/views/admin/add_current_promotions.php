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
                            <h1 class="mainTitle">Manage Current Promotions</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Current Promotions</span>
                            </li>
                            <li>
                                <span>Manage Current Promotions</span>
                            </li>
                            <li class="active">
                                <span>Add Current Promotions</span>
                            </li>
                        </ol>
                    </div>
                </section>
                <!-- end: PAGE TITLE -->
                <!-- start: FORM VALIDATION EXAMPLE 1 -->
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Add Current Promotions</h2>
                            <p>
                                Please enter current promotions details.
                            </p>
                            <hr>
                            <form action="<?php echo base_url('admin/add_current_promotions');  ?>" method="post" role="form" id="form" enctype="multipart/form-data">
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
                                               Title<span class="symbol required"></span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user-o"></i> </span>
                                                <input type="text" placeholder="Title" class="form-control" id="title" name="title" required>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label class="control-label">
                                                Content<span class="symbol required"></span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user-o"></i> </span>
                                                <input type="text" placeholder="Content" class="form-control" id="content" name="content" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                               Picture <span class="symbol required"></span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-id-card"></i> </span>

                                                <input id="picture" name="picture" type="file" class="form-control" placeholder="Upload Photo" required>
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
                                            By clicking ADD Current Promotions, Current Promotions will be added.
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary btn-wide pull-right" type="submit">
                                            Add Current Promotions <i class="fa fa-arrow-circle-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="container-fluid container-fullw bg-white">


                 <!-- end: FORM VALIDATION EXAMPLE 2 -->
            </div>
        </div>
    </div>









    <!-- start: FOOTER -->
    <?php  $this->load->view('user/footer'); ?>

