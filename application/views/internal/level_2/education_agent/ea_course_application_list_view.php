<script type="text/javascript">
    var base_url = "<?php echo base_url();?>";
</script>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="flex-fill">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!---------------------------------------------------CODE BEGINS------------------------------------------------------------->

                <!-- Page Heading -->
                <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><?=$company_details['c_name']?>'s Employer Projects</h1>
                </div> -->

                <!-- Breadcrumb -->
                <div class="row" >
                    <div class="breadcrumb-wrapper col-xl-10">
                        <ol class="breadcrumb" style = "background-color:rgba(0, 0, 0, 0);">
                            <li class="breadcrumb-item">
                                <a href=""><i class="fas fa-tachometer-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active">Course Applicants</li>
                        </ol>
                    </div>
                    <div class = "col-xl-2">
                        <a type="button" href = "<?= base_url('internal/level_2/education_agent/ea_course_application/add_course_application'); ?>" class="btn btn-primary">Add New Course Applicant Form<i class="fas fa-plus pl-2"></i></a>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Card-->
                        <div class="card ">
                            <div class="card-body">
                            
                            <div class="table-responsive">
                                <table id="table_course_applicants" class="table">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Nationality</th>
                                        <th>Current Level</th>
                                        <th>Submit Date</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            </div>
                        </div>
                        <!-- /. Card -->

                    </div>                   
                </div>
                <!-- /. Content Row -->

                <!-- Modal -->
                <div class="modal fade" id="view_course_application" tabindex="-1" role="dialog" aria-labelledby="view_casLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style = "background-color:#6B9080;">
                            <h5 class="modal-title" id="view_casLabel" style ="color:white;">Course Applicant Information</h5>
                            <button style ="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >
                            <div id = "view_course_applicant">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>

                <!---------------------------------------------------CODE ENDS------------------------------------------------------------->

                </div>
                <!-- ./container-fluid -->
            
            </div>
            <!-- ./content -->