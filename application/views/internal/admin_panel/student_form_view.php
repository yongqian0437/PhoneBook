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
                                        <center>
                                          <div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#787878; font-weight:700;">STUDENT REGISTRATION PAGE</div>
                                        </center>
                                        <!-- Input fields (Form) -->
                                      <form>
                                        <!-- Phone number and nationality-->
                                      <center><b><p class="card-title">Student ID: <?=$student ['student_id'];?></p></b></center>
                                        <div class="form-row pt-4 px-3">
                                        <div class="form-group col-md-7 px-2">
                                          <input  class="form-control border-bottom" style="border: 0;" placeholder= "Phone Number: <?=$student ['student_phonenumber'];?>" >
                                        </div>
                                        <div class="form-group col-md-5 px-2">
                                          <input  class="form-control border-bottom" style="border: 0;" placeholder= "Nationality: <?=$student ['student_nationality'];?>" >
                                        </div>
                                        </div>
                                        <!-- Date and gender -->
                                        <div class="form-row pt-3 pb-3 px-3">
                                          <div class="form-group col-md-6 px-2">
                                            <input  class="form-control border-bottom" style="border: 0;" placeholder= "Date of Birth:<?=$student ['student_dob'];?>" >
                                          </div>
                                        <div class="form-holder mb-3 ml-3" style="align-self: flex-end; transform: translateY(4px);">
                                            <div class="checkbox-tick">
                                              <label class="male ml-3">
                                              <?php if($student ['student_gender']=="Male"||$student ['student_gender']=="male"){?>
                                                <input type="radio" name="student_gender" value="male" checked>Male<br>
                                                <span class="checkmark"></span>
                                              </label>
                                              <label class="female ml-5">
                                              <?php } else {?> 
                                                <input type="radio" name="student_gender" value="female" checked> Female<br>
                                                <span class="checkmark"></span>
                                                <?php }?>
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- Interest -->
                                        <div class="form-row px-3">
                                          <div class="form-group col-md-12 px-2">
                                          <input  class="form-control border-bottom" style="border: 0;" placeholder= "Interest:<?=$student ['student_interest'];?>" >
                                          </div>
                                        </div>
                                        <!-- Current Level -->
                                        <div class="form-row px-3">
                                          <div class="form-group col-md-12 px-2">
                                          <input  class="form-control border-bottom" style="border: 0;" placeholder= "Current Level:<?=$student ['student_currentlevel'];?>" >
                                          </div>
                                        </div>
                                        <br>
                                          <a href="<?=base_url();?>internal/admin_panel/Admin_dashboard/users_accounts_nav" class="btn btn-primary">Back</a>
                                      </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    
    </div>



