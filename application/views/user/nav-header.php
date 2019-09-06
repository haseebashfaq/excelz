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


                <?php if($url  == '/user/index'){ ?>
                    <?php echo '<li class="active open">';  }
                else echo "<li>"; ?>
                <a href="<?php echo base_url('user/index')  ?>">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-user-md"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title"> Add Event </span>
                        </div>
                    </div>
                </a>
                </li>


                <?php if($url  == '/user/add_clinic' || $url  == '/user/view_clinics' ){ ?>
                    <?php echo '<li class="active open">';  }
                else {echo "<li>"; } ?>

                <a href="" >
                    <div class="item-content">
                        <div class="item-media">
                            <i class="fa fa-hospital-o"></i>
                        </div>
                        <div class="item-inner">
                            <span class="title"> Manage Events </span><i class="icon-arrow"></i>
                        </div>
                    </div>
                </a>


                <ul class="sub-menu">


                    <?php if($url  == '/user/view_clinics'){ ?>
                        <?php echo '<li class="active ">';  }
                    else {echo "<li>"; } ?>
                    <a href="view_events">
                        <span class="title">View Events</span>
                    </a>
                    </li>

                </ul>
                </li>





                <ul class="sub-menu">
                    <?php if($url  == '/user/add_users'){ ?>
                        <?php echo '<li class="active">';  }
                    else {echo "<li>"; } ?>
                    <a href="add_users">
                        <span class="title">Add User</span>
                    </a>
                    </li>

                    <?php if($url  == '/user/view_users'){ ?>
                        <?php echo '<li class="active ">';  }
                    else {echo "<li>"; } ?>
                    <a href="view_users">
                        <span class="title">View Users</span>
                    </a>
                    </li>

                </ul>

                </li>

                <?php if($url  == '/user/addDisease' || $url  == '/user/view_medicine' || $url  == '/user/view_disease' ){ ?>
                    <?php echo '<li class="active open">';  }
                else {echo "<li>"; } ?>


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