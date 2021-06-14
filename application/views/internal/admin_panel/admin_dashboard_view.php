<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
<link href="<?php echo base_url() ?>/assets/scss/admin_dashboard.scss" rel="stylesheet">


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="<?php echo base_url('internal/level_2/educational_partner/ep_courses'); ?>" style="text-decoration:none">
                                <div class="card border-left-primary shadow h-100 py-2">

                                    <div class="card-body" href="">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Students</div>
                                                <div id="course_counter" class="h5 mb-0 font-weight-bold text-gray-800 counting_number">0</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="<?php echo base_url('internal/level_2/educational_partner/Ep_my_rd_project'); ?>" style="text-decoration:none">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Employers</div>
                                                <div id="my_rd_counter" class="h5 mb-0 font-weight-bold text-gray-800 counting_number">0</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="<?= base_url('internal/level_2/educational_partner/ep_rd_applicants'); ?>" style="text-decoration:none">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Education Agents</div>
                                                <div id="my_app_counter" class="h5 mb-0 font-weight-bold text-gray-800 counting_number">0</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="<?= base_url('internal/level_2/educational_partner/ep_rd_applicants/project_partners_page'); ?>" style="text-decoration:none">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Academic Counselors</div>
                                                <div id="partner_counter" class="h5 mb-0 font-weight-bold text-gray-800 counting_number">0</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Active User</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="userChartArea"></canvas>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Pending service requests</h6>
                                </div>
                                <div class="card-body">
                                    <table id="customers">
                                        <tr>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>Alfreds Futterkiste</td>
                                            <td>Employer</td>
                                            <td>
                                                <div class="btn-sm btn-primary">View</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Berglunds snabbköp</td>
                                            <td>Student</td>
                                            <td>
                                                <div class="btn-sm btn-primary">View</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Centro comercial</td>
                                            <td>Academic Counsellor</td>
                                            <td>
                                                <div class="btn-sm btn-primary">View</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ernst Handel</td>
                                            <td>Employer</td>
                                            <td>
                                                <div class="btn-sm btn-primary">View</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Island Trading</td>
                                            <td>Employer Agent</td>
                                            <td>
                                                <div class="btn-sm btn-primary">View</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Island Trading</td>
                                            <td>Employer Agent</td>
                                            <td>
                                                <div class="btn-sm btn-primary">View</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">University Partners</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>
                                    red:total courses
                                    blue:total r&d projects
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>
                                    red: student self enroll
                                    blue: ea enroll for student
                                    green: ac enroll for student
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card shadow">
                                <p>courses</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow">
                                <p>employer projects</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow">
                                <p>rd projects</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <script>
                var counter1 = <?= $num_courses ?>;
                var counter2 = <?= $num_rd_projects ?>;
                var counter3 = <?= $num_rd_applicants ?>;
                var counter4 = 100;
            </script>

            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->