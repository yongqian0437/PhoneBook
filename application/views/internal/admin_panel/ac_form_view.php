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
                                            <div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#787878; font-weight:700;">ACADEMIC COUNSELOR REGISTRATION PAGE</div>
                                          </center>
                                          <!-- Input fields (Form) -->
                                          <form method="post" action="<?= base_url('user/login/Auth/ac_reg');?>">
                                            <!-- Phone number and business email-->
                                            <div class="form-row pt-4 px-3">
                                              <div class="form-group col-md-7 px-2">
                                                <input  class="form-control border-bottom" style="border: 0;" placeholder= "Phone Number: <?=$ac['ac_phonenumber'];?>" >
                                              </div>
                                              <div class="form-group col-md-7 px-2">
                                              <input  class="form-control border-bottom" style="border: 0;" placeholder= "Business Email: <?=$ac['ac_businessemail'];?>" >
                                              </div>
                                            </div>
                                            <!-- Nationality -->
                                            <div class="form-row pt-3 px-3">
                                              <div class="form-group col-md-12 px-2">
                                              <input  class="form-control border-bottom" style="border: 0;" placeholder= "Nationality: <?=$ac['ac_nationality'];?>" >
                                              </div>
                                            </div>
                                            <!-- Date and gender -->
                                            <div class="form-row pt-3 pb-3 px-3">
                                              <div class="form-group col-md-6 px-2">
                                              <input  class="form-control border-bottom" style="border: 0;" placeholder= "Nationality: <?=$ac['ac_dob'];?>" >
                                              </div>
                                              <div class="form-holder mb-3 ml-3" style="align-self: flex-end; transform: translateY(4px);">
                                                <div class="checkbox-tick">
                                                  <label class="male ml-3">
                                                  <?php if($ac ['ac_gender']=="Male"||"male"){?>
                                                    <input type="radio" name="ac_gender" value="male" checked> Male<br>
                                                    <span class="checkmark"></span>
                                                  </label>
                                                  <label class="female ml-5">
                                                  <?php } else {?> 
                                                    <input type="radio" name="ac_gender" value="female" checked> Female<br>
                                                    <span class="checkmark"></span>
                                                    <?php }?>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- University  -->
                                            <div class="form-row px-3">
                                              <div class="form-group col-md-12 px-2">
                                              <input  class="form-control border-bottom" style="border: 0;" placeholder= "Nationality: <?=$ac['ac_university'];?>" >
                                              </div>
                                            </div>
                                            <!-- Upload Document -->
                                            <div class="form-row pt-2 px-4">
                                              <div class="form-group col-md-12 px-2">
                                                <input type="file" class="custom-file-input" id="form-group" name="ac_document">
                                                <label class="custom-file-label" for="customFile">Upload a file</label>
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



