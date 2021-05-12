<style>

.nav-link {
    color: white;
    font-size:23px;
    font-weight: 600;
}

.dropdown-item{
    color: white;
    font-size:22px;
    font-weight: 600;
}

.btn:hover {
    background-color: white;
    opacity: 0.9;
}

</style>

<!-- Topbar -->
<nav class="navbar sticky-top navbar-expand navbar-light topbar"  style="background-color: #6B9080;">

    <!-- Logo Image-->
    <nav class="navbar navbar-light bg-light">  
        <a class="navbar-brand" href="#">
            <img src="" width="30" height="30" alt="">
        </a>
    </nav>


    <!-- Float left Group -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item px-2">
            <a class="nav-link" href="<?php echo base_url('external/universities');?>">Universities</a>
        </li>

        <li class="nav-item px-2">
            <a class="nav-link" href="#">Courses</a>
        </li>

        <li class="nav-item px-2">
            <a class="nav-link" href="<?php echo base_url('external/compare');?>">Comparison</a>
        </li>


        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow px-2" >
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" 
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white-600">Projects</span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" style="background-color: #6B9080;"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" >
                    Employer Projects
                </a>
                <a class="dropdown-item" href="#" >
                    Research & Development Projects
                </a>
            </div>
        </li>

        <li class="nav-item px-2">
            <a class="nav-link" href="#">About Us</a>
        </li>

        <li class="nav-item pl-2">
            <a class="nav-link" href="#" >
                <button type="button" class="btn" style="background-color: white; color: #6B9080; font-size:18px; border-radius:15px; font-weight: 800;">Hava a Chat</button>
            </a>
        </li>

        <li class="nav-item pl-1">
            <a class="nav-link" href="#">
                <button type="button" class="btn" style="background-color: white; color: #6B9080; font-size:18px; border-radius:15px; font-weight: 800;">Login / Register</button>
            </a>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->