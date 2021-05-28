<link href="<?php echo base_url() ?>/assets/scss/courses-styles.scss" rel="stylesheet">

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid" style="background-color:white;">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-2 px-5">
                        <h1 class="h3 mb-0 text-gray-800">Course list</h1>
                    </div>
                    <div class="py-2 px-5" style="text-align: justify; font-weight:500;">Choosing the right course to study is probably one of the most important decisions you can make in your life. This can be a confusing and difficult time if you are unprepared. Look no further because with iJEES, you are given the opportunity to find your path and chase your future with one of our courses that is made readily available for you! Want to explore your academic capabilities? Seeking international study options to match your own interests and resources? Discover what you can do by searching and comparing courses from universities across the world in different subject areas. Join our mission to make study choice transparent, globally.
                    </div>
                    <div class="px-5">
                        <hr style=" width :100%; height:2px; background-color:#EAF4F4">
                    </div>
                    <div class="col-12 px-5">
                        <form method="post" name="filter" action="<?php echo base_url() . 'external/Courses/course_filter' ?>">
                            <div class="row px-3">
                                <div class="form-group mr-2"><br>
                                    <label for="course_area">Course area</label><br>
                                    <select name="course_areaid" id="filter_1" class="form-control form-select form-select-lg btn-sm">
                                        <option value="" selected disabled>Filter area</option>
                                        <?php
                                        foreach ($dropdown_area as $dropdown_data) {
                                            echo '<option value="' . $dropdown_data->course_area . '">' . $dropdown_data->course_area . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group mr-2"><br>
                                    <label for="course_level">Course level</label><br>
                                    <select name="course_levelid" id="filter_2" class="form-control form-select form-select-lg btn-sm">
                                        <option value="" selected disabled>Filter level</option>
                                        <option value="Bachelor Degree / Honours Degree">Bachelor Degree / Honours Degree</option>
                                        <option value="Foundation Studies">Foundation</option>
                                        <option value="Master">Master</option>
                                        <option value="ADP">American Degree Program</option>
                                    </select>
                                </div>
                                <div class="form-group mr-2"><br>
                                    <label for="course_intake">Course intake</label><br>
                                    <select name="course_intakeid" id="filter_3" class="form-control form-select form-select-lg btn-sm">
                                        <option value="" selected disabled>Filter intake</option>
                                        <option value="July 2021">July</option>
                                        <option value="Aug 2021">August</option>
                                        <option value="Jan 2021">January</option>
                                        <option value="Apr 2021">April</option>
                                    </select>
                                </div>
                                <div class="form-group mr-2"><br>
                                    <label for="uni_country">Course location</label><br>
                                    <select name="course_countryid" id="filter_4" class="form-control form-select form-select-lg btn-sm">
                                        <option value="" selected disabled>Filter location</option>
                                        <?php
                                        foreach ($dropdown_country as $dropdown_data) {
                                            echo '<option value="' . $dropdown_data->course_country . '">' . $dropdown_data->course_country . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group mr-3"><br>
                                    <label for="course_fee">Course Fee</label><br>
                                    <select name="course_feeid" id="filter_5" class="form-control form-select form-select-lg btn-sm">
                                        <option value="" selected disabled>Sort fee</option>
                                        <option value="a">Low - High</option>
                                        <option value="d">High - Low</option>
                                    </select>
                                </div>
                                <div class="form-group align-self-end pull-right">
                                    <button class="button-custom-color">Search</button>
                                </div>
                            </div>
                        </form>

                        <?php if (!empty($course_data)) {
                            foreach ($course_data as $courses) { ?>
                                <div class="card-body shadow mb-4">
                                    <div class="row">
                                        <div class="col-9 ">
                                            <h5 class="font-weight-bold"><?php echo $courses->course_name ?></h5>

                                            <div>
                                                <p class="courselist-short-desc"><?php echo $courses->course_shortprofile ?></p>
                                            </div>
                                            <div>
                                                <h5>RM<?php echo $courses->course_fee ?></h5>
                                                <p><?php echo $courses->course_country ?></p>
                                            </div>
                                        </div>
                                        <div class=" col-3 mt-5 ">
                                            <a type=" button" class="button-custom-color float-right">Apply</a>
                                            <a href="<?php echo base_url() . 'external/Courses/view_course/' . $courses->course_id ?>" class="button-custom-color float-right mr-1">View</a>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        <?php } else { ?>

                            <h3>Records not found</h3>

                        <?php } ?>
                        <div class="pb-5"></div>
                        <div class="pb-5"></div>
                        <div class="pb-5"></div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
    </div>
    </div>
    </div>

    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->