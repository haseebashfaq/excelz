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
                                <span>Dashboard</span>
                            </li>
                            <li>
                                <span>Manage Current Promotions</span>
                            </li>
                            <li class="active">
                                <span>View Current Promotions</span>
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
                    <div class="row">
                        <div class="col-md-12">
                            <h2>View Current Promotions</h2>
                            <p>Following section is for managing current promotions. You can update current promotions from here. </p>
                            <hr>
                        </div>
                    </div>

                    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($current_promotions as $current_promotion){
                            if(empty($current_promotion)) { echo 'Please Add Listing </br> No listing found';
                            } else {

                                ?>
                                <tr>
                                    <td><?php echo $current_promotion['title'];?></td>
                                    <td><?php echo $current_promotion['content'];?></td>


                                    <td>
                                        <button class="btn btn-warning" onclick="edit_book(<?php echo $current_promotion['id']; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                                        <button class="btn btn-danger" onclick="delete_book(<?php echo  $current_promotion['id']; ?>)"><i class="glyphicon glyphicon-remove"></i></button>

                                    </td>

                                </tr>
                            <?php }  }?>


                        </tbody>


                    </table>
                </div>
                <br>
                <br>
                <!-- <div class="container-fluid container-fullw bg-white">


                 <!-- end: FORM VALIDATION EXAMPLE 2 -->
            </div>
        </div>
    </div>




    <script src="<?php echo base_url('assests/jquery/jquery-3.1.0.min.js')?>"></script>
    <script src="<?php echo base_url('assests/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assests/datatables/js/dataTables.bootstrap.js')?>"></script>





    <!-- start: FOOTER -->
    <?php  $this->load->view('admin/footer'); ?>

