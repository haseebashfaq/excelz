<li class="dropdown current-user">
    <a href class="dropdown-toggle" data-toggle="dropdown">
        <?php foreach($profiles as $profile)
        {   ?>
            <img src="<?php echo base_url();?>admintemp/assets/images/logo.png">

           <span class="username"><?php echo $profile['FullName']; ?> <i class="ti-angle-down"></i></i></span>
    </a>   <?php   } ?>

    <ul class="dropdown-menu dropdown-dark"><a href="" class="dropdown-toggle" data-toggle="dropdown">
        </a><li><a href="view_profile">
                My Profile
            </a>
        </li>

        <li>
            <a href="../user/logout">
                Log Out
            </a>
        </li>
    </ul>
</li>
