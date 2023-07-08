<!-- Set base url to javascript variable-->
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url() ?>/assets/js/additional/read_info.js"></script>

<!-- Styles-->
<style>
    html {
        scroll-behavior: smooth;
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
                                <h1 class="h3 mb-0 text-gray-800 pt-4 font-weight-bold">Reading Corner</h1>
                            </div>
                            <div class="py-2 px-4" style="text-align: justify; font-weight:500;">Read all the topic to get knowlege about dementia!</div>
                        </div>
                        <div class="col-md-4 pt-5 pr-5">

                        </div>
                    </div>

                    <div class="px-4 pb-4">
                        <hr style=" width :100%; height:2px; background-color:#EAF4F4">
                    </div>

                    <div class="row justify-content-md-center pb-5 px-4">
                        <div class="col-md-4 pb-5">
                            <div class="px-2">
                                <div class="card shadow">
                                    <div class="card-body text-center bg-primary">
                                        <h5 class="card-title pt-3" style="font-weight: 700; color:white;">Understanding Dementia Symptoms</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="pb-2">Reading Progress: <?php echo ($read_data->symptoms / 10) * 100 ?>%</div>
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo ($read_data->symptoms / 10) * 100 ?>%; " aria-valuenow="<?= $read_data->symptoms ?>" aria-valuemin="0" aria-valuemax="10"><?php echo ($read_data->symptoms / 10) * 100 ?>%</div>

                                            </div>
                                        </li>
                                        <?php if ($read_data->status != 0) { ?>
                                            <li class="list-group-item">Time Reading: <?= $read_data->symptoms_timer ?>s</li>
                                        <?php } ?>
                                    </ul>
                                    <div class="card-body">
                                        <?php if ($read_data->status == 0) { ?>
                                            <a href="<?= base_url('reading_corner/read/1'); ?>" class="btn btn-success px-2 py-2" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Read</a>
                                        <?php } elseif ($read_data->status == 1) { ?>
                                            <a href="<?= base_url('reading_corner/read/1'); ?>" class="btn btn-success px-2 py-2" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Continue</a>
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-md-12 px-2 pb-2">
                                                </div>
                                                <div class="col-md-12 px-2 py-2">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 pb-5">
                            <div class="px-2">
                                <div class="card shadow">
                                    <div class="card-body text-center bg-primary">
                                        <h5 class="card-title pt-3" style="font-weight: 700; color:white;">Tips For Communicating With Dementia</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="pb-2">Reading Progress: <?php echo ($read_data->tips / 10) * 100 ?>%</div>
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo ($read_data->tips / 10) * 100 ?>%; " aria-valuenow="<?= $read_data->tips ?>" aria-valuemin="0" aria-valuemax="10"><?php echo ($read_data->tips / 10) * 100 ?>%</div>

                                            </div>
                                        </li>
                                        <?php if ($read_data->tips_status != 0) { ?>
                                            <li class="list-group-item">Time Reading: <?= $read_data->tips_timer ?>s</li>
                                        <?php } ?>
                                    </ul>
                                    <div class="card-body">
                                        <?php if ($read_data->tips_status == 0) { ?>
                                            <a href="<?= base_url('reading_corner_tips/read/2'); ?>" class="btn btn-success px-2 py-2" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Read</a>
                                        <?php } elseif ($read_data->tips_status == 1) { ?>
                                            <a href="<?= base_url('reading_corner_tips/read/2'); ?>" class="btn btn-success px-2 py-2" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Continue</a>
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-md-12 px-2 pb-2">
                                                </div>
                                                <div class="col-md-12 px-2 py-2">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 pb-5">
                            <div class="px-2">
                                <div class="card shadow">
                                    <div class="card-body text-center bg-primary">
                                        <h5 class="card-title pt-3" style="font-weight: 700; color:white;">Dealing With People With Dementia</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="pb-2">Reading Progress: <?php echo ($read_data->dealing / 10) * 100 ?>%</div>
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo ($read_data->dealing / 10) * 100 ?>%; " aria-valuenow="<?= $read_data->dealing ?>" aria-valuemin="0" aria-valuemax="10"><?php echo ($read_data->dealing / 10) * 100 ?>%</div>

                                            </div>
                                        </li>
                                        <?php if ($read_data->dealing_status != 0) { ?>
                                            <li class="list-group-item">Time Reading: <?= $read_data->dealing_timer ?>s</li>
                                        <?php } ?>
                                    </ul>
                                    <div class="card-body">
                                        <?php if ($read_data->dealing_status == 0) { ?>
                                            <a href="<?= base_url('reading_corner_dealing/read/3'); ?>" class="btn btn-success px-2 py-2" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Read</a>
                                        <?php } elseif ($read_data->dealing_status == 1) { ?>
                                            <a href="<?= base_url('reading_corner_dealing/read/3'); ?>" class="btn btn-success px-2 py-2" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Continue</a>
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-md-12 px-2 pb-2">
                                                </div>
                                                <div class="col-md-12 px-2 py-2">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->