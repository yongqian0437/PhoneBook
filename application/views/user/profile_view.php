<style>
    #overview_tab,
    #courses_tab,
    #contact_tab {
        color: lightgray;
    }

    #overview_tab:hover,
    #courses_tab:hover,
    #contact_tab:hover {
        color: black !important;
    }


    .active {
        color: black;
    }

    #overview_tab:focus,
    #courses_tab:focus,
    #contact_tab:focus {
        color: black !important;
    }

    .user-pic-small {
        height: 150px;
        width: 150px;
    }

    .side-profile {
        padding-left: ($spacer * 0.5) !important;
        padding-right: ($spacer * 0.5) !important;
    }
</style>

<!-- Top Navigation -->
<?php $this->load->view('external/templates/topnav'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid" style="background-color:white;">
                    <div class="col-12">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 px-4">
                            <h1 class="h3 mb-0 text-gray-800 pt-4 font-weight-bold"></h1>

                        </div>
                        <div class="row">
                            <div class="col-4 mt-5">
                                <div class="mx-auto" style="width: 200px;">
                                    <img class="user-pic-small mb-4 " src="<?= base_url('assets/img/chat_user/profile_pic.png'); ?>">
                                    <div class="row ml-2" style="font-weight:bolder; font-size:20px;">
                                        <?= $user_data['user_fname'] ?>
                                        <?= $user_data['user_lname'] ?>
                                    </div>
                                    <p class="ml-2"> <?= $user_data['user_role'] ?></p>
                                </div>

                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link  mb-1 ml-5" id="overview_tab" onclick="overview_tab()" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-1 ml-5" id="courses_tab" onclick="courses_tab()" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="false">My Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-1 ml-5" id="contact_tab" onclick="contact_tab()" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">My Employer Projects</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-8">

                                <div class="tab-content" id="myTabContent">

                                    <!-- Overview content-->
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="card border-left-info shadow h-100 ">
                                            <ul class="nav justify-content-end">
                                                <li class="nav-item">
                                                    <div class="card-title">
                                                        <a title="Edit my information" style="color:black;" class="nav-link" id="edit_tab" onclick="edit_tab()" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">
                                                            <span class="icon">
                                                                <i style="font-size:20px;" class="fas fa-user-edit"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="card-body shadow">
                                                <div class="row">
                                                    <div class="col-8 col-md-6 col-lg-6 mb-2">
                                                        <h6><b>Email:</b></h6>
                                                        <label><?= $user_data['user_email'] ?></label>
                                                    </div>
                                                    <div class="col-8 col-md-6 col-lg-6 mb-2">
                                                        <h6><b>Contact No:</b></h6>
                                                        <label><?= $student_data['student_phonenumber'] ?></label>
                                                    </div>
                                                    <div class="col-8 col-md-6 col-lg-6 mb-2">
                                                        <h6><b>Country:</b></h6>
                                                        <label><?= $student_data['student_nationality'] ?></label>
                                                    </div>
                                                    <div class="col-8 col-md-6 col-lg-6 mb-2">
                                                        <h6><b>Gender:</b></h6>
                                                        <label><?= $student_data['student_gender'] ?></label>
                                                    </div>
                                                    <div class="col-8 col-md-6 col-lg-6 mb-2">
                                                        <h6><b>Date of Birth:</b></h6>
                                                        <label><?= $student_data['student_dob'] ?></label>
                                                    </div>
                                                    <div class="col-8 col-md-6 col-lg-6 mb-2">
                                                        <h6><b>Interest:</b></h6>
                                                        <label><?= $student_data['student_interest'] ?></label>
                                                    </div>
                                                    <div class="col-8 col-md-6 col-lg-6 mb-2">
                                                        <h6><b>Current level:</b></h6>
                                                        <label><?= $student_data['student_currentlevel'] ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Courses content-->
                                    <div class="tab-pane fade" id="courses">
                                        <div class="card border-left-info shadow h-100 ">
                                            <div class="card-body shadow">
                                                <div class="row pl-3 pt-4" style="vertical-align:middle;">
                                                    <div class="col-8 col-md-4 col-lg-4 mb-4">
                                                        <h6><b>University</b></h6>
                                                    </div>
                                                    <div class="col-8 col-md-4 col-lg-4 mb-4">
                                                        <h6><b>Course Name</b></h6>
                                                    </div>
                                                    <div class="col-8 col-md-3 col-lg-3 mb-4">
                                                        <h6><b>Apply Date</b></h6>
                                                    </div>
                                                    <div class="col-8 col-md-1 col-lg-1 mb-4">
                                                    </div>

                                                    <?php if (!empty($student_course_data)) {           /* Display employer projects that the user applied for  */
                                                        foreach ($student_course_data as $course_data) { ?>
                                                            <div class="col-8 col-md-4 col-lg-4 mb-2">
                                                                <hr>
                                                                <img class="img-fluid img_class" src="<?= base_url("{$course_data['uni_logo']}"); ?>" width="200" ; />
                                                            </div>
                                                            <div class="col-8 col-md-4 col-lg-4 mb-2">
                                                                <hr>
                                                                <label><?= $course_data['course_name'] ?></label>
                                                            </div>
                                                            <div class="col-8 col-md-3 col-lg-3 mb-2">
                                                                <hr>
                                                                <label><?= $course_data['c_app_submitdate'] ?></label>
                                                            </div>
                                                            <div class="col-8 col-md-1 col-lg-1 mb-2">
                                                                <hr>
                                                                <a style="border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto%;" href="<?php echo base_url() . 'external/Courses/view_course/' . $course_data['course_id'] ?>" target="_blank" class="btn">
                                                                    <span class="icon text-white-600">
                                                                        <i style="font-size:20px;" class="fas fa-info-circle"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        <?php }
                                                    } else { ?>
                                                        <p>N/A</p> <!-- If no employer projects applied, display N/A -->
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <!-- Contact content-->
                                    <div class="tab-pane fade" id="contact">
                                        <div class="card border-left-info shadow h-100 ">
                                            <div class="card-body shadow">

                                                <div class="row pl-3 pt-4" style="vertical-align:middle;">
                                                    <div class="col-8 col-md-4 col-lg-4 mb-4">
                                                        <h6><b>Company</b></h6>
                                                    </div>
                                                    <div class="col-8 col-md-4 col-lg-4 mb-4">
                                                        <h6><b>Project Title</b></h6>
                                                    </div>
                                                    <div class="col-8 col-md-3 col-lg-3 mb-4">
                                                        <h6><b>Project Submit Date</b></h6>
                                                    </div>
                                                    <div class="col-8 col-md-1 col-lg-1 mb-4">
                                                    </div>

                                                    <?php if (!empty($student_emp_data)) {           /* Display employer projects that the user applied for  */
                                                        foreach ($student_emp_data as $emp_data) { ?>
                                                            <div class="col-8 col-md-4 col-lg-4 mb-2">
                                                                <hr>
                                                                <img class="img-fluid img_class" src="<?= base_url("assets/img/company_logos/{$emp_data['c_logo']}"); ?>" width="200" ; />
                                                            </div>
                                                            <div class="col-8 col-md-4 col-lg-4 mb-2">
                                                                <hr>
                                                                <label><?= $emp_data['emp_title'] ?></label>
                                                            </div>
                                                            <div class="col-8 col-md-3 col-lg-3 mb-2">
                                                                <hr>
                                                                <label><?= $emp_data['emp_app_submitdate'] ?></label>
                                                            </div>
                                                            <div class="col-8 col-md-1 col-lg-1 mb-2">
                                                                <hr>
                                                                <a style="border-radius:10px; background-color:#6B9080; color:white; height:auto; width:auto%;" href="<?= base_url('assets/uploads/employer_projects/' . $emp_data['emp_document']) ?>" target="_blank" class="btn">
                                                                    <span class="icon text-white-600">
                                                                        <i style="font-size:20px;" class="fas fa-info-circle"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        <?php }
                                                    } else { ?>
                                                        <p>N/A</p> <!-- If no employer projects applied, display N/A -->
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="edit">
                                        <div class="card border-left-info shadow h-100 ">
                                            <div class="card-body shadow">
                                                <form method="post" name="edit_profile" action="<?php echo base_url() . 'user/profile/edit_profile' ?>">
                                                    <div class="row">
                                                        <div class="col-8 col-md-6 col-lg-6 mb-2">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email address</label>
                                                                <input type="email" name="student_emailid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user_data['user_email'] ?>" placeholder="Enter your email address">
                                                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                            </div>
                                                        </div>
                                                        <div class="col-8 col-md-6 col-lg-6 mb-2">
                                                            <div class="form-group">
                                                                <label>Contact Number</label>
                                                                <input type="number" name="student_contactNoid" class="form-control" id="contactNo" value="<?= $student_data['student_phonenumber'] ?>" placeholder="Enter your contact number">
                                                            </div>
                                                        </div>
                                                        <div class="col-8 col-md-6 col-lg-6 mb-2">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <input type="text" name="student_countryid" class="form-control" id="nationality" value="<?= $student_data['student_nationality'] ?>" placeholder="Your country name">
                                                            </div>
                                                        </div>
                                                        <div class="col-8 col-md-6 col-lg-6 mb-2">
                                                            <div class="form-group">
                                                                <label>Current Level</label>
                                                                <input type="text" name="student_levelid" class="form-control" id="contactNo" value="<?= $student_data['student_currentlevel'] ?>" placeholder="E.g., Diploma, Bachelor Degree, etc.">
                                                            </div>
                                                        </div>
                                                        <div class="col-8 col-md-6 col-lg-6 mb-2">
                                                            <div class="form-group">
                                                                <label>Interest</label>
                                                                <input type="text" name="student_interestid" class="form-control" id="contactNo" value="<?= $student_data['student_interest'] ?>" placeholder="E.g., IT, Arts, Business, etc.">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Save</button>



                                                </form>
                                            </div>

                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>

            <script>
                $(document).ready(function() {
                    document.getElementById("overview_tab").style.color = "black";
                }); // end of ready function
                function courses_tab() {
                    document.getElementById("overview_tab").style.color = "lightgray";

                    $('#home').hide();
                    $('#contact').hide();
                    $('#edit').hide();
                    $('#courses').show();
                }

                function contact_tab() {
                    document.getElementById("overview_tab").style.color = "lightgray";

                    $('#home').hide();
                    $('#courses').hide();
                    $('#edit').hide();
                    $('#contact').show();
                }

                function edit_tab() {
                    document.getElementById("overview_tab").style.color = "lightgray";

                    $('#home').hide();
                    $('#courses').hide();
                    $('#contact').hide();
                    $('#edit').show();
                }

                function overview_tab() {
                    $('#courses').hide();
                    $('#contact').hide();
                    $('#edit').hide();
                    $('#home').show();
                }
            </script>