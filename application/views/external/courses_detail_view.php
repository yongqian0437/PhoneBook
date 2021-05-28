<link href="<?php echo base_url() ?>/assets/scss/courses-styles.scss" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">COURSE DETAIL</h1>
                    </div>


                    <!-- Content Row -->
                    <div class="d-flex container py-4">
                        <?php if (!empty($course_data)) {
                            foreach ($course_data as $courses) { ?>
                                <div class="col-12">
                                    <div class="course-cover-img" style="background-image: url('https://www.asc2017.net/public/2017/03/07/utar-kampar-campus-lake-view.jpg');">
                                        <div class="fallbak">
                                            <div class="row">
                                                <div class="col-4">
                                                    <img class="course-uni-logo" src="<?php echo 'https://www.rocapply.com/assets/pictures/universities/logos/taylors%20university%20Logo.jpg'; ?>" />
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
                                                        <button type="button" class="btn btn-secondary course-ave-buttons">Apply</button>
                                                        <button type="button" class="btn btn-secondary course-ave-buttons">View University</button>
                                                        <button type="button" class="btn btn-secondary course-ave-buttons">Enquire</button>
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
                                                        <?php echo $courses->course_shortprofile ?>
                                                        <br>
                                                        <?php echo $courses->course_careeropportunities ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Accordion -->
                                                <a href="#collapseCard2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                    <h6 class="m-0 font-weight-bold card-h-title">Programme Structure</h6>
                                                </a>
                                                <!-- Card Content - Collapse -->
                                                <div class="collapse show" id="collapseCard2">
                                                    <div class="card-body">
                                                        <?php echo $courses->course_structure ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Accordion -->
                                                <a href="#collapseCard3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                    <h6 class="m-0 font-weight-bold card-h-title">Fees</h6>
                                                </a>
                                                <!-- Card Content - Collapse -->
                                                <div class="collapse show" id="collapseCard3">
                                                    <div class="card-body">
                                                        <p> RM<?php echo $courses->course_fee ?> -
                                                            <?php echo $courses->course_duration ?> year(s)
                                                        </p>



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
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->