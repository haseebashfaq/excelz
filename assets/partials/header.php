<header class="header navbar fixed-top navbar-expand-xl">
    <div class="container">
        <a class="navbar-brand logo" href="<?php echo base_url();  ?>">
            <img src="assets/img/logo-white.png" alt="Netleaders" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-text-align-right"></span>
        </button>
        <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
            <ul class=" nav navbar-nav menu">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url();  ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url();?>promotions">Promotions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url(); ?>faqs">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url(); ?>calendar">calendar</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url(); ?>recent_events">Recent</a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link " href="#">Calendar</a>
                </li> -->

                <li class="nav-item login-nav-item">
                    <a class="nav-link " href="<?php if(isset($_SESSION["email"]) && isset($_SESSION["user_type"])){echo base_url('view_profile');}else{echo base_url('login');}?>">
                    <?php  if(isset($_SESSION["email"]) && isset($_SESSION["user_type"])) {
                        echo 'profile';
                          } else {
                                echo 'Login';
                            } ?>
                    </a>
                </li>

                <li class="nav-item signup-nav-item">
                    <a class="nav-link " href="<?php if(isset($_SESSION["email"]) && isset($_SESSION["user_type"])){echo base_url('logout');}else{echo base_url('signup');}?>">
                        <?php
                            if(isset($_SESSION["email"]) && isset($_SESSION["user_type"])) {
                                echo 'Logout';
                            } else {
                                echo 'Signup';
                            }
                        ?>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link " href="#">Contact</a>
                </li> -->
            </ul>
        </div>
    </div>
</header>