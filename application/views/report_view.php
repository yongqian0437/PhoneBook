<!-- Set base url to javascript variable-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
    var base_url = "<?php echo base_url(); ?>";
</script>


<!-- Styles-->
<style>
    html {
        scroll-behavior: smooth;
    }

    #report_button {
        background-color: #1cc88a;
    }
</style>

<!-- Top Navigation -->
<?php $this->load->view('templates/topnav'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div style='background-color:white;' class="container-fluid">

                    <div class="row">
                        <div class="col-md-8">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-2 px-4">
                                <h1 class="h3 mb-0 text-gray-800 pt-4 font-weight-bold">Report</h1>
                            </div>
                            <div class="py-2 px-4" style="text-align: justify; font-weight:500;">Reports</div>
                        </div>
                        <div class="col-md-4 pt-5 pr-5">
                            <a id="report_button" class="btn btn-primary" style="float:right; width:auto;">Print Report</a>
                        </div>
                    </div>

                    <div class="px-4 pb-4">
                        <hr style=" width :100%; height:2px; background-color:#EAF4F4">
                    </div>