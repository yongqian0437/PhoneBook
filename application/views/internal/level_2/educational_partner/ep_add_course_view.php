<style>
label{
    color:black;
}
</style>
<!-- Set base url to javascript variable-->
<script type="text/javascript">
    var base_url = "<?php echo base_url();?>";
   
</script>

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
                    <h1 class="h3 mb-0 text-gray-800">Courses</h1>
                </div>

                <!-- Breadcrumn -->
                <div class="row" >
                    <div class="breadcrumb-wrapper col-xl-11">
                        <ol class="breadcrumb" style = "background-color:rgba(0, 0, 0, 0);">
                            <li class="breadcrumb-item">
                                <a href=""><i class="fas fa-tachometer-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('internal/level_2/educational_partner/ep_courses'); ?>"></i>Courses</a>
                            </li>
                            <li class="breadcrumb-item active">Add Course</li>
                        </ol>
                    </div>
                    <div class = "col-xl-1">
                        <a type="button" href = "<?= base_url('internal/level_2/educational_partner/ep_courses'); ?>" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Card-->
                        <div class="card ">
                            <div class="card-body">
                            <form method="post" action=" <?=base_url('internal/level_2/educational_partner/ep_courses/submit_added_course/'.$university_data->uni_id); ?>">
                                    
                                    <div class="form-row pt-4">
                                        <div class="form-group col-md-6 px-4 pr-5">
                                            <label for="course_name">Course Name</label>
                                            <input type="text" class="form-control" id="course_name" name = "course_name" placeholder="Enter course name" >
                                        </div>
                                        <div class="form-group col-md-6 px-4 pl-5">
                                            <label for="course_area">Course Area</label>
                                            <input type="text" class="form-control" id="course_area" name = "course_area" placeholder="Enter course area" >
                                        </div>
                                    </div>

                                    <div class="form-row pt-4">
                                        <div class="form-group col-md-6 px-4 pr-5">
                                            <label for="course_level">Level</label>
                                            <select name="course_level" id="course_level" class="form-control form-select form-select">
                                                <option value="" selected disabled>Please select a level</option>
                                                <option value="Foundation">Foundation</option>
                                                <option value="Certificate">Certificate</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="Bachelor Degree">Bachelor Degree</option>
                                                <option value="Masters">Masters</option>
                                                <option value="Doctorate">Doctorate</option>
                                                <option value="Advanced Diploma">Advanced Diploma</option>
                                                <option value="Graduate Certificate &Graduate Diploma">Graduate Certificate and Graduate Diploma</option>
                                                <option value="Postgraduate Certificate & Postgraduate Diploma">Postgraduate Certificate and Postgraduate Diploma</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 px-4 pl-5">
                                            <label for="course_duration">Duration (Year)</label>
                                            <div class="input-group-prepend">
                                                <input type="text" class="form-control" id="course_duration" name = "course_duration" placeholder="Enter duration (eg: 1, 2.5)" >
                                                <span class="input-group-text" id="basic-addon1">year</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row pt-4">
                                        <div class="form-group col-md-6 px-4 pr-5">
                                            <label for="course_fee">Fee (RM)</label>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">RM</span>
                                                <input type="number" class="form-control" id="course_fee" name = "course_fee" placeholder="Enter fee" >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 px-4 pl-5">
                                            <label for="course_country">Country</label>
                                            <input type="text" class="form-control" id="course_country" name = "course_country" placeholder="Enter country" >
                                        </div>
                                    </div>

                                    <div class="form-row pt-4">
                                        <div class="form-group col-md-6 px-4 pr-5">
                                            <label for="course_intake">Intake</label>
                                            <textarea type="text" class="form-control" rows="3" id="course_intake" name = "course_intake" placeholder="Enter intake (eg: February, June, July)"></textarea>
                                            <div style = "color:red; font-size:0.9em;">*Can enter more than 1 month</div>
                                        </div>
                                        <div class="form-group col-md-6 px-4 pl-5">
                                            <label for="course_careeropportunities">Career Oppurtunities</label>
                                            <textarea type="text" class="form-control" rows="3" id="course_careeropportunities" name = "course_careeropportunities" placeholder="Enter career oppurtunities (eg: Scientist, Doctor, Nurse)"></textarea>
                                            <div style = "color:red; font-size:0.9em;">*Can enter more than 1 career oppurtunities</div>                                       
                                        </div>
                                    </div>

                                    <div class="form-row pt-4">
                                        <div class="form-group col-md-12 px-4">
                                            <label for="course_shortprofile">Shortprofile</label>
                                            <textarea type="text" class="form-control" rows="8" id="course_shortprofile" name = "course_shortprofile" placeholder="Enter shortprofile"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-row pt-4">
                                        <div class="form-group col-md-12 px-4">
                                            <label for="course_requirements">Requirements</label>
                                            <textarea type="text" class="form-control" rows="8" id="course_requirements" name = "course_requirements" placeholder="Example:&#10;SPM: At least 5 credits&#10;A-Level: "></textarea>
                                        </div>
                                    </div>

                                    <!-- Edit button -->
                                    <div class ="pr-4">
                                        <button  type="submit" class="btn btn-primary " style = "float:right;" >Submit</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <!-- /. Card -->

                    </div>                   
                </div>
                <!-- /. Content Row -->

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->