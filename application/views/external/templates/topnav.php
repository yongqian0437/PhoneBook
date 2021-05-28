<style>

.nav-link {
    color: white;
    font-size:1.1rem;
    font-weight: 600;
}

.dropdown-item{
    color: white;
    font-size: 1.0rem;
    font-weight: 600;
}

.dropdown-item:hover {
    background: rgba(255, 255, 255, 0.2) !important; 
}

#register_btn:hover{
    opacity:0.90;
}

.navbar-nav > li > a {padding-top:5px !important; padding-bottom:5px !important;}
.navbar {min-height:px !important}

#nav_line{
    border:         none;
    border-left:    1px solid hsla(200, 10%, 50%,100);
    background-color: white;
    height:         5vh;
    width:          1px;   
}

</style>

<!-- Topbar -->
<nav class="navbar sticky-top navbar-expand topbar"  style="background-color: #6B9080;">

    <!-- Logo Image-->
    <!-- <nav class="navbar navbar-light bg-light">   -->
        <a class="navbar-brand py-0 ml-4 pl-3" href="<?php echo base_url('external/homepage');?>">
            <img src="<?php echo base_url('assets/img/iJEES_Logo.png');?>" height="100" alt="">
        </a>
    <!-- </nav> -->


    <!-- Float left Group -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item px-2">
            <a class="nav-link " href="<?php echo base_url('external/universities');?>">Universities</a>
        </li>

        <li class="nav-item px-2">
            <a class="nav-link" href="#">Courses</a>
        </li>

        <li class="nav-item px-2">
            <a class="nav-link" href="<?php echo base_url('external/compare');?>">Comparison</a>
        </li>


        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown px-2" >
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Projects
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" style="background-color: #6B9080;"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?=base_url('external/Employer_projects');?>" style = "color: white;" >
                    Employer Projects
                </a>
                <a class="dropdown-item" href="#" style = "color: white;" >
                    Research & Development Projects
                </a>
            </div>
        </li>

        <li class="nav-item px-2">
            <a class="nav-link" href="#">About Us</a>
        </li>

        <li class="nav-item px-2">
            <a class="nav-link" href="<?=base_url('user/chat/Chat');?>">Have a Chat</a>
        </li>
        <!-- <li class="nav-item pl-2">
            <a class="nav-link" href="#" >
                <button type="button" class="btn" style="background-color: white; color: #6B9080; font-size: 0.rem; border-radius:15px; font-weight: 800; ">Hava a Chat</button>
            </a>
        </li> -->


        <!-- If user is sign in. Will display user name and user logo -->
        <?php if($this->session->has_userdata('has_login')){ ?> <!------------------------------------CHANGE THIS LATER------------------------------------------>
         <!-- Nav Item - User Information -->

         <hr id = "nav_line">

            <li class="nav-item dropdown no-arrow pl-1" style = "">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline small pr-2" style = "color: white; font-weight:700; font-size:0.9em;"><?php echo $this->session->userdata('user_lname');?></span>
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/chat_user/profile_pic.png');?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" style="background-color: #6B9080;" 
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" style = "color: white;">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=base_url('user/login/Auth/logout');?>" style = "color: white;">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        <!-- If user is not sign in -->
        <?php } else { ?>
            <li class="nav-item pl-1">
                <a class="nav-link" href="<?=base_url('user/login/Auth/login');?>">
                    <button type="button" id = "register_btn" class="btn" style="background-color: white; color: #6B9080; font-size: 0.9em; border-radius:15px; font-weight: 800;">Login / Register</button>
                </a>
            </li>
        <?php } ?>

    </ul>

</nav>
<!-- End of Topbar -->