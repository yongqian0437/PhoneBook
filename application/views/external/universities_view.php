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
   
    border-collapse: collapse;
    vertical-align: center;
}

/* styling for datatables pagination */
#table_university_paginate {
  padding-top: 20px;
}

/* styling for datatables search */
#table_university_filter{
    font-size:20px;
}

table.dataTable tbody td {
  vertical-align: middle;
  text-align: center !important;
  border-top: 2px solid black !important;
}

table.dataTable thead th {
  text-align: center !important;
  vertical-align: middle;
  border-top: 2px solid black !important;
  color:black !important;
  font-size: 1.1em !important;
  font-weight:700 !important;
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

                <!-- Content Row -->

                <div class="row pt-5">
                    <div class="col-12">
                        <div class="card border-dark">
                            <div class="card-body">
                                <div class="pb-3" style="display: flex; flex-direction: row; justify-content: space-between; background-color: #A4C3B2, color:white;">
                                    <?php $uni_count = count($university_data) ?>
                                    <h4 style = " font-weight:700;"><span style = "color:#6B9080">(<?php echo $uni_count ?>)</span><span style = "color:black; opacity:0.3;"><i> UNIVERSITIES</i></span></h4>
                                </div>
                                <div class="table-responsive">
                                    <table id="table_university" class="table ">
                                        <thead>
                                            <tr>
                                                <th style = "">University</th>
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
                <br><br><br><br>


                

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

