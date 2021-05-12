<!-- Jquery plugin -->
<script src="<?php echo base_url()?>/assets/vendor/jquery/jquery.min.js"></script>

<!-- Datatables plugins -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.24/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.24/datatables.min.js"></script>

<!-- University js file -->
<script src="<?php echo base_url('/assets/js/additional/universities_list.js') ?>"></script>

<!-- Page level custom scripts -->

<!-- <script type="text/javascript" src="DataTables/datatables.min.js"></script> -->

<!-- Set base url to javascript variable-->
<script type="text/javascript">
    var base_url = "<?php echo base_url();?>";
   
</script>

<style>

table{
    width: 98% !important;      
}

tr{
    border-bottom: 1px solid black;
    border-top: 1px solid black;
    border-collapse: collapse;
}

/* styling for datatables pagination */
#table_university_paginate {
  padding-top: 20px;
}

/* styling for datatables search */
#table_university_filter{
    font-size:20px;
}

</style>


<!-- Top Navigation -->
<?php $this->load->view('external/templates/topnav');?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div style = 'background-color:white;' class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4 pt-5">
                    <h1 class="h3 mb-0 text-gray-800"><b>UNIVERISTY<b></h1>
                </div>
                <hr style = "border: 2px solid #EAF4F4;">

                <br>

                <!-- Content Row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card" style = " border: 2px solid #b5b3ae;">
                            <div class="card-body">
                                <div class="pb-3" style="display: flex; flex-direction: row; justify-content: space-between; background-color: #A4C3B2, color:white;">
                                    <?php $uni_count = count($university_data) ?>
                                    <h4 style = "opacity:0.7; font-weight:700;"> <?php echo $uni_count ?> UNIVERSITIES</h4>
                                </div>
                                <div class="table-responsive">
                                    <table id="table_university" class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>University</th>
                                                <th>University Name</th>
                                                <th>Course Offered</th>
                                                <th>QS World Ranking</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

