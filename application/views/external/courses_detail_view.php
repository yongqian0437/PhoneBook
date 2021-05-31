<link href="<?php echo base_url() ?>/assets/scss/courses-styles.scss" rel="stylesheet">

<!-- Top Navigation -->
<?php $this->load->view('external/templates/topnav'); ?>

<style>
    #logo {
        border-radius: 50% 50% 50% 50%;
        width: 20vh;
        height: 20vh;
        object-fit: scale-down;
        background-color: white;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="d-flex container py-4">
                        <?php if (!empty($course_data)) {
                            foreach ($course_data as $courses) { ?>
                                <div class="col-12">
                                    <div class="course-cover-img" style="background-image: url('<?php echo base_url($uni_data->uni_background); ?>');">
                                        <div class="fallbak">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="pt-5 pl-2 pb-1">
                                                        <div style="width:25vh; height:25vh; border-radius:100%; margin:auto; background-color:white;">
                                                            <center><img src="<?php echo base_url($uni_data->uni_logo); ?>" alt="uni_logo" id="logo" class="pt-5"></center>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-5 align-self-end">
                                                    <div>
                                                        <h4 class="course-detail-title"><?php echo $courses->course_name ?></h4>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <hr>
                                    <section class="course-info-section">
                                        <div class="container py-2">
                                            <div class="col-12 d-flex justify-content-center mb-3">
                                                <div class="row">
                                                    <div>
                                                        <a type="button" target="_blank" class="btn btn-secondary course-ave-buttons">Apply</a>
                                                        <a type="button" target="_blank" href="<?php echo base_url() . 'external/Universities/university_detail/' . $courses->uni_id ?>" class="btn btn-secondary course-ave-buttons">View University</a>
                                                        <a type="button" href="<?php echo base_url() . 'user/chat/Chat/' ?>" class="btn btn-secondary course-ave-buttons">Enquire</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Accordion -->
                                                <a href="#collapseCard1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                    <h6 class="m-0 font-weight-bold card-h-title">Description</h6>
                                                </a>
                                                <!-- Card Content - Collapse -->
                                                <div class="collapse show" id="collapseCard1">
                                                    <div class="card-body">
                                                        <h6><b>Course Area</b></h6>
                                                        <?php echo $courses->course_area ?>
                                                        <br>
                                                        <br>

                                                        <h6><b>About</b></h6>
                                                        <div style=" word-break: break-word; text-align: justify;"> <?php echo $courses->course_shortprofile ?></div>

                                                        <br>
                                                        <br>
                                                        <h6><b>Career Oppurtunities</b></h6>
                                                        <?php echo $courses->course_careeropportunities ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="card shadow mb-4"> -->
                                            <!-- Card Header - Accordion -->
                                            <!-- <a href="#collapseCard2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                    <h6 class="m-0 font-weight-bold card-h-title">Programme Structure</h6>
                                                </a> -->
                                            <!-- Card Content - Collapse -->
                                            <!-- <div class="collapse show" id="collapseCard2">
                                                    <div class="card-body">
                                                        <?php echo $courses->course_structure ?>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex card shadow mb-4">
                                                        <!-- Card Header - Accordion -->
                                                        <a href="#collapseCard3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                            <h6 class="m-0 font-weight-bold card-h-title">Fees</h6>
                                                        </a>
                                                        <!-- Card Content - Collapse -->
                                                        <div class="collapse show" id="collapseCard3">
                                                            <div class="card-body">
                                                                <p><b>Course Fee:</b> RM<?php echo $courses->course_fee ?> -
                                                                    <?php echo $courses->course_duration ?> year(s)
                                                                <p><b>Course intake:</b> <?php echo $courses->course_intake ?></p>
                                                                <p><b>Course level:</b> <?php echo $courses->course_level ?></p>
                                                                <p><b>Course location:</b> <?php echo $courses->course_country ?></p>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class=" d-flex card shadow mb-4">
                                                        <!-- Card Header - Accordion -->
                                                        <a href="#collapseCard3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                            <h6 class="m-0 font-weight-bold card-h-title">Requirement</h6>
                                                        </a>
                                                        <!-- Card Content - Collapse -->
                                                        <div class="collapse show" id="collapseCard3">
                                                            <div class="card-body">
                                                                <p style = "white-space: pre-wrap; word-break: break-word;"><?php echo $courses->course_requirements ?></p>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>

                                        <?php } ?>
                                    <?php } else { ?>
                                        <h3>Records not found</h3>
                                    <?php } ?>
                                        </div>
                                </div>

                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->