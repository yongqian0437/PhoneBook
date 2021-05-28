

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
  color:black !important;
  font-size: 1.0em !important;
  text-align: center !important;
  border-bottom: 1px solid black !important;
  font-weight:500;
}

table.dataTable thead th {
  text-align: center !important;
  vertical-align: middle;
  border-top: 2px solid black !important;
  border-bottom: 2px solid black !important;
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

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-2 px-5">
                    <h1 class="h3 mb-0 text-gray-800 pt-3">Universities</h1>
                </div>

                <div class="py-2 px-5" style="text-align: justify; font-weight:500;">Find your ideal university without having to leave your home! Your journey to uni starts here. Discover universities that students are looking at the most. Remember, there’s no such thing as the best university in the world. What’s best depends on who you are, what you want from your student experience, and what you want your future to be like. Find the option that is best for you, order that next prospectus and immerse yourself in the university experience that you long for.
                </div>

                <div class="px-5 pb-4">
                    <hr style=" width :100%; height:2px; background-color:#EAF4F4">
                </div>

                <!-- Content Row -->

                <div class="row pt-1 px-5">
                    <div class="col-12">
                        <div class="card border-dark">
                            <div class="card-body">
                                <div class="pb-3" style="display: flex; flex-direction: row; justify-content: space-between; color:white;">
                                    <?php $uni_count = count($university_data) ?>
                                    <div style = "background-color:#1dd3b0; border-radius:10px; width:auto; height:auto;">
                                        <div class = "px-3 pt-2 "><h4 style = " font-weight:700;"><span style = "color:white"><?php echo $uni_count ?></span><span style = "color:white; "> UNIVERSITIES</span></h4></div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="table_university" class="table ">
                                        <thead>
                                            <tr>
                                                <th style = "">University</th>
                                                <th>University Name</th>
                                                <th>Country</th>
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

