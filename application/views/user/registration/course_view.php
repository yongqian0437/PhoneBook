<body id="page-top" style='background-color:#f9f6f1;'>
<div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                           
                            <div class="col-lg">
                                <div class="p-5">                   
                                          
                                          <!-- Input fields (Form) -->
                                          <form method="post" action="<?= base_url('user/login/Auth/course');?>">
                                            <!-- Phone number and business email-->
                                            <div class="row">
                                                <div class="col text-center pt-4">
                                                <h2 style="color:black; font-weight:700">Course Information Form</h2>
                                                </div>
                                            </div>
                                           
                                        <div class="form-row pt-4 px-3">
                                             <!-- Course Name -->
                                            <div class="form-group col-md-12 px-2">
                                              <input type="text" class="form-control" name="course_name" placeholder="Course Name" value="<?=set_value('course_name')?>">
                                              <?= form_error('course_name','<small class="text-danger pl-3">','</small>');?>
                                            </div>

                                            <!-- Course Area-->
                                            <div class="form-group col-md-6 px-2">
                                              <input type="text" class="form-control" name="course_area" placeholder="Course Area" required>
                                            </div>

                                            <!-- Course Level -->
                                            <div class="form-group col-md-6 px-2">
                                              <input type="text" class="form-control" name="course_level" placeholder="Course Level" required>
                                            </div>

                                            <!-- Course Duration-->
                                            <div class="form-group col-md-6 px-2">
                                              <input type="number" class="form-control" name="course_duration" placeholder="Course Duration" required>
                                            </div>

                                            <!-- Course Fee-->
                                            <div class="form-group col-md-6 px-2">
                                              <input type="number" class="form-control" name="course_fee" placeholder="Course Fee" required>
                                            </div>
                             
                                            <!-- Course Short Profile -->
                                            <div class="form-group col-md-12 px-2">
                                               <textarea class="form-control" name="course_shortprofile" placeholder="Course Short Profile" required></textarea>
                                            </div>

                                            <!-- Course Structure -->
                                            <div class="form-group col-md-12 px-2">
                                                <input type="text" class="form-control" name="course_structure" placeholder="Course Structure" required>
                                            </div>

                                             <!-- Course Requirement -->
                                            <div class="form-group col-md-12 px-2">
                                                <input type="text" class="form-control" name="course_requirements" placeholder="Course Requirements" required>
                                            </div>

                                             <!-- Course Career Opportunities-->
                                             <div class="form-group col-md-12 px-2">
                                              <input type="text" class="form-control" name="course_careeropportunities" placeholder="Course Career Opportunities-" required>
                                            </div>

                                            <!-- Course Intake-->
                                                <div class="form-group col-md-12 px-2">
                                                    <select name="course_intake" id="course_intake" class="form-control form-select border-bottom" style="border: 0;" required>
                                                        <option value="" selected disabled>Please select the course intake</option>
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December </option>
                                                    </select>
                                                </div>
                                            
                                            <!-- Term and Conditions & Register Button -->
                                            <div class="col">
                                                   <button type="submit" class="btn btn-success mt-4" style="float:right; width:23%;">Continue</i></button>
                                            </div>
                                            </div>
                                          </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



