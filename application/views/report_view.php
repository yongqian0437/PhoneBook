<!-- Set base url to javascript variable-->
<script type="text/javascript">
    var base_url = "<?php echo base_url();?>";

</script>


<!-- Styles-->
<style>

html {
scroll-behavior: smooth;
}

</style>

<!-- Top Navigation -->
<?php $this->load->view('templates/topnav');?>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-2 px-4">
                        <h1 class="h3 mb-0 text-gray-800 pt-4 font-weight-bold">Report</h1>
                    </div>

              

                </div>
                <!-- /.container-fluid --> 
                <div class = "row">
                <div class="breadcrumb-wrapper col-xl-8">
                            <ol class="breadcrumb" style="background-color:rgba(0, 0, 0, 0);">
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url('reading_corner'); ?>"><i class="fas fa-tachometer-alt pr-2"></i>Reading Corner</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url('quiz'); ?>">Quiz Report</a>
                                </li>

                            </ol>
                        </div>
                </div>

            </div>
            <!-- End of Main Content -->