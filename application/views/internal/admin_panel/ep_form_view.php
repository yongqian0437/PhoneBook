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
                                            <div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#787878; font-weight:700;">Education PARTNER REGISTRATION PAGE</div>
                                          </center>
                                          <!-- Input fields (Form) -->
                                          <form>
                                          <center><b><p class="card-title">Education Partner ID: <?=$ep['ep_id'];?></p></b></center>
                                            <!-- Phone number and business email-->
                                            <div class="form-row pt-4 px-3">
                                              <div class="form-group col-md-7 px-2">
                                                <input  class="form-control border-bottom" style="border: 0;" placeholder= "Phone Number: <?=$ep['ep_phonenumber'];?>" >
                                              </div>
                                              <div class="form-group col-md-7 px-2">
                                              <input  class="form-control border-bottom" style="border: 0;" placeholder= "Business Email: <?=$ep['ep_businessemail'];?>" >
                                              </div>
                                            </div>
                                            <!-- Nationality -->
                                            <div class="form-row pt-3 px-3">
                                              <div class="form-group col-md-12 px-2">
                                              <input  class="form-control border-bottom" style="border: 0;" placeholder= "Nationality: <?=$ep['ep_nationality'];?>" >
                                              </div>
                                            </div>
                                            <!-- Date and gender -->
                                            <div class="form-row pt-3 pb-3 px-3">
                                              <div class="form-group col-md-6 px-2">
                                              <input  class="form-control border-bottom" style="border: 0;" placeholder= "Date of Birth: <?=$ep['ep_dob'];?>" >
                                              </div>
                                              <div class="form-holder mb-3 ml-3" style="align-self: flex-end; transform: translateY(4px);">
                                                <div class="checkbox-tick">
                                                  <label class="male ml-3">
                                                  <?php if($ep['ep_gender']=="Male"||$ep['ep_gender']=="male"){?>
                                                    <input type="radio" name="ep_gender" value="male" checked> Male<br>
                                                    <span class="checkmark"></span>
                                                  </label>
                                                  <label class="female ml-5">
                                                  <?php } else {?> 
                                                    <input type="radio" name="ep_gender" value="female" checked> Female<br>
                                                    <span class="checkmark"></span>
                                                    <?php }?>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- Job Title  -->
                                            <div class="form-row px-3">
                                              <div class="form-group col-md-12 px-2">
                                              <input  class="form-control border-bottom" style="border: 0;" placeholder= "Job Title: <?=$ep['ep_jobtitle'];?>" >
                                              </div>
                                            </div>
                                            <!-- Upload Document -->
                                            <div class="form-row pt-2 px-4">
                                              <div class="form-group col-md-12 px-2">
                                                <input type="file" class="custom-file-input" id="form-group" name="ep_document">
                                                <label class="custom-file-label" for="customFile">Upload a file</label>
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



