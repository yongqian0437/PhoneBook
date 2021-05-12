 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">



<!-- Heading -->
<div class="sidebar-heading">
    Administrator
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>My Profile</span></a>
</li>




<!-- <?php 
$user_role=$this->session->userdata('user_role');
?> -->
<!-- Nav Item - Pages Collapse Menu -->
<?php  if($user_role=="Admin")   :?>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
    User
</div>
<!-- Nav Item - Accounts Collapse Menu -->
<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#accounts_collapse"
                    aria-expanded="true" aria-controls="accounts_collapse">
                    <i class="fas fa-user"></i>
                    <span>User Accounts</span>
                </a>
                <div id="accounts_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url('internal/admin_panel/Admin_dashboard/users_accounts_nav');?>">All Users</a>
                        <a class="collapse-item" href="<?=base_url('internal/admin_panel/Users_information/students_info');?>">Students</a>
                        <a class="collapse-item" href="<?=base_url('internal/admin_panel/Users_information/ac_info');?>">Academic Counsellors</a>
                        <a class="collapse-item" href="<?=base_url('internal/admin_panel/Users_information/ea_info');?>">Education Agents</a>
                        <a class="collapse-item" href="<?=base_url('internal/admin_panel/Users_information/ep_info');?>">Education Partners</a>
                        <a class="collapse-item" href="<?=base_url('internal/admin_panel/Users_information/employer_info');?>">Employers</a>
                    </div>
                </div>
            </li>

<?php endif;?>
 <!-- Divider -->
 <hr class="sidebar-divider">
 <li class="nav-item">
    <a class="nav-link" href="<?=base_url('user/logout')  ;?>">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Logout</span></a>
</li>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->