<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <nav>
            <!-- start: SEARCH FORM -->

            <!-- end: SEARCH FORM -->
            <!-- start: MAIN NAVIGATION MENU -->
            <div class="navbar-title">
                <span>Main Navigation</span>
            </div>
            <ul class="main-navigation-menu">
                <?php $url = $_SERVER['REQUEST_URI'];

                ?>


                <?php if($url  == '/admin/index'){ ?>
                    <?php echo '<li class="active">';  }
                else echo "<li>"; ?>
                <a href="index">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-user-md"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title"> View Events </span>
                        </div>
                    </div>
                </a>
                </li>
                <?php if($url  == '/admin/index'){ ?>
                    <?php echo '<li class="active">';  }
                else echo "<li>"; ?>
                <a href="manage_events">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-user-md"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title"> Manage Events </span>
                        </div>
                    </div>
                </a>
                </li>


                <?php if($url  == '/admin/add_event_category_form' || $url  == '/admin/event_category' ){ ?>
                    <?php echo '<li class="active open">';  }
                else {echo "<li>"; } ?>

                <a href="" >
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-hospital-o"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title"> Manage Event Category </span><i class="icon-arrow"></i>
                        </div>
                    </div>
                </a>


                <ul class="sub-menu">
                    <?php if($url  == '/admin/add_event_category_form'){ ?>
                        <?php echo '<li class="active ">';  }
                    else {echo "<li>"; } ?>
                    <a href="<?php echo base_url('admin/add_event_category_form');  ?>">
                        <span class="title">Add Event Category</span>
                    </a>
                    </li>

                    <?php if($url  == '/admin/event_category'){ ?>
                        <?php echo '<li class="active">';  }
                    else {echo "<li>"; } ?>
                    <a href="<?php echo base_url('admin/event_category');  ?>">
                        <span class="title">View Event Category</span>
                    </a>
                    </li>



                </ul>
                </li>




                <?php if($url  == '/admin/add_event_type_form' || $url  == '/admin/event_type' ){ ?>
                    <?php echo '<li class="active open">';  }
                else {echo "<li>"; } ?>

                <a href="" >
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-hospital-o"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title"> Manage Event Type   </span><i class="icon-arrow"></i>
                        </div>
                    </div>
                </a>

                <ul class="sub-menu">

                    <?php if($url  == '/admin/add_event_type_form'){ ?>
                        <?php echo '<li class="active ">';  }
                    else {echo "<li>"; } ?>
                    <a href="<?php echo base_url('admin/add_event_type_form');  ?>">
                        <span class="title">Add Event Type </span>
                    </a>
                    </li>
                    <?php if($url  == '/admin/event_type'){ ?>
                        <?php echo '<li class="active">';  }
                    else {echo "<li>"; } ?>
                    <a href="<?php echo base_url('admin/event_type');  ?>">
                        <span class="title">View Event Type </span>
                    </a>
                    </li>


                </ul>

                </li>


                <?php if($url  == '/admin/add_guidelines_form' || $url  == '/admin/guidelines' ){ ?>
                    <?php echo '<li class="active open">';  }
                else {echo "<li>"; } ?>

                <a href="" >
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-hospital-o"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title"> Manage Guidelines  </span><i class="icon-arrow"></i>
                        </div>
                    </div>
                </a>

                <ul class="sub-menu">

                    <?php if($url  == '/admin/add_guidelines_form'){ ?>
                        <?php echo '<li class="active ">';  }
                    else {echo "<li>"; } ?>
                    <a href="<?php echo base_url('admin/add_guidelines_form');  ?>">
                        <span class="title">Add Guidelines </span>
                    </a>
                    </li>
                    <?php if($url  == '/admin/guidelines'){ ?>
                        <?php echo '<li class="active">';  }
                    else {echo "<li>"; } ?>
                    <a href="<?php echo base_url('admin/guidelines');  ?>">
                        <span class="title">View Guidelines </span>
                    </a>
                    </li>


                </ul>

                </li>

                <?php if($url  == '/admin/add_guidelines_form' || $url  == '/admin/guidelines' ){ ?>
                    <?php echo '<li class="active open">';  }
                else {echo "<li>"; } ?>

                <a href="" >
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-hospital-o"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title"> Manage Webinar Recordings  </span><i class="icon-arrow"></i>
                        </div>
                    </div>
                </a>

                <ul class="sub-menu">

                    <?php if($url  == '/admin/add_guidelines_form'){ ?>
                        <?php echo '<li class="active ">';  }
                    else {echo "<li>"; } ?>
                    <a href="<?php echo base_url('admin/add_wb_recordings_form');  ?>">
                        <span class="title">Add Webinar Recordings </span>
                    </a>
                    </li>
                    <?php if($url  == '/admin/guidelines'){ ?>
                        <?php echo '<li class="active">';  }
                    else {echo "<li>"; } ?>
                    <a href="<?php echo base_url('admin/wb_recordings');  ?>">
                        <span class="title">View Webinar Recordings</span>
                    </a>
                    </li>


                </ul>

                </li>


                <!--    <?php if($url  == '/admin/view_patient' || $url  == '/admin/view_all_patient' ){ ?>
                    <?php echo '<li class="active open">';  }
                else {echo "<li>"; } ?>

                <a href="" >
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-hospital-o"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title"> Manage Current Promotions  </span><i class="icon-arrow"></i>
                        </div>
                    </div>
                </a>

             <ul class="sub-menu">

                    <?php /*if($url  == '/admin/view_all_patient'){ */?>
                        <?php /*echo '<li class="active ">';  }
                    else {echo "<li>"; } */?>
                    <a href="<?php /*echo base_url('admin/add_current_promotions_form');  */?>">
                        <span class="title">Add Current Promotions </span>
                    </a>
                    </li>
                    <?php /*if($url  == '/admin/view_patient'){ */?>
                        <?php /*echo '<li class="active">';  }
                    else {echo "<li>"; } */?>
                    <a href="<?php /*echo base_url('admin/current_promotions');  */?>">
                        <span class="title">View Current Promotions </span>
                    </a>
                    </li>


                </ul>-->

                </li>

                <?php if($url  == '/admin/add_user_form' || $url  == 'admin/view_users' ){ ?>
                    <?php echo '<li class="active open">';  }
                else {echo "<li>"; } ?>

                <a>
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title"> Manage User </span><i class="icon-arrow"></i>
                        </div>
                    </div>
                </a>

                <ul class="sub-menu">
                    <?php if($url  == 'admin/add_user_form'){ ?>
                        <?php echo '<li class="active">';  }
                    else {echo "<li>"; } ?>
                    <a href="<?php echo base_url('admin/add_user_form');  ?>">
                        <span class="title">Add User</span>
                    </a>
                    </li>

                    <?php if($url  == 'admin/view_users'){ ?>
                        <?php echo '<li class="active ">';  }
                    else {echo "<li>"; } ?>
                    <a href="<?php echo base_url('admin/view_users');  ?>">
                        <span class="title">View Users</span>
                    </a>
                    </li>

                </ul>

                </li>




            </ul>
            <!-- end: MAIN NAVIGATION MENU -->
            <!-- start: CORE FEATURES -->

            <!-- end: CORE FEATURES -->
            <!-- start: DOCUMENTATION BUTTON -->

            <!-- end: DOCUMENTATION BUTTON -->
        </nav>
    </div>
</div>
<!-- / sidebar -->