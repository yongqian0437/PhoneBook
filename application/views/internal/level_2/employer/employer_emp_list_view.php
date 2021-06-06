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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><?=$company_details['c_name']?>'s Employer Projects</h1>
                </div>

                <!-- Breadcrumb -->
                <div class="row" >
                    <div class="breadcrumb-wrapper col-xl-10">
                        <ol class="breadcrumb" style = "background-color:rgba(0, 0, 0, 0);">
                            <li class="breadcrumb-item">
                                <a href=""><i class="fas fa-tachometer-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active">Employer Projects (EPs)</li>
                        </ol>
                    </div>
                    <div class = "col-xl-2">
                        <a type="button" href = "<?= base_url('internal/level_2/employer/Employer_emps/add_emp'); ?>" class="btn btn-primary">Add a project<i class="fas fa-plus pl-2"></i></a>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Card-->
                        <div class="card ">
                            <div class="card-body">
                            
                            <div class="table-responsive">
                                <table id="table_emps" class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>EP Title</th>
                                            <th>EP Area</th>
                                            <th>EP Level</th>
                                            <th>EP Date</th>
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
                <div class="modal fade" id="view_emp" tabindex="-1" role="dialog" aria-labelledby="view_empLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                        <div class="modal-header" style = "background-color:#6B9080;">
                            <h5 class="modal-title" id="view_empLabel" style ="color:white;">Employer Project Information</h5>
                            <button style ="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >
                            <div id = "emp_information">

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