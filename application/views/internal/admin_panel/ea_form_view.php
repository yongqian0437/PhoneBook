<!-- Content Wrapper -->
<div id="content-wrapper" >

<!-- Main Content -->
<div id="content">    
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                           
                            <div class="col-lg">
                                <div class="p-5">                   
                                          <center>
                                            <div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#787878; font-weight:700;">EDUCATION AGENT REGISTRATION PAGE</div>
                                          </center>
                                          <br>
                                           <!-- Input fields (Form) -->
                                           <form>
                                           <center><b><p class="card-title">Education Agent ID: <?=$ea['ea_id'];?></p></b></center>
                                           <center><b><p class="card-title">Submit Date: <?=$ea['ea_submitdate'];?></p></b></center>
                                            <!-- Phone number and business email-->
                                            <div class="form-row pt-4 px-3">
                                              <div class="form-group col-md-12 px-2">
                                                <input  class="form-control border-bottom" style="border: 0;" placeholder= "Phone Number: <?=$ea['ea_phonenumber'];?>" readonly>
                                              </div>
                                            </div>
                                            <div class="form-row px-3">
                                               <!-- Nationality -->
                                               <div class="form-group col-md-12 px-2">
                                                <input  class="form-control border-bottom" style="border: 0;" placeholder= "Nationality: <?=$ea['ea_nationality'];?>"readonly >
                                              </div>
                                            </div>
                                            <div class="form-row px-3">
                                              <div class="form-group col-md-12 px-2">
                                                <input  class="form-control border-bottom" style="border: 0;" placeholder= "Business Email: <?=$ea['ea_businessemail'];?>" readonly>
                                              </div>
                                            </div>
                                            <div class="form-row px-3">
                                               <!-- Date-->
                                              <div class="form-group col-md-7 px-2">
                                                <input  class="form-control border-bottom" style="border: 0;" placeholder= "Date of Birth: <?=$ea['ea_dob'];?>" readonly>
                                              </div>
                                               <!-- Gender-->
                                              <div class="form-holder mb-3 ml-3" style="align-self: flex-end; transform: translateY(4px);">
                                                <div class="checkbox-tick">
                                                  <label class="male ml-5">
                                                  <?php if($ea['ea_gender']=="Male"||$ea['ea_gender']=="male"){?>
                                                    <input type="radio" name="ea_gender" value="male" checked> Male<br>
                                                    <span class="checkmark"></span>
                                                  </label>
                                                  <label class="female ml-5">
                                                  <?php } else {?> 
                                                    <input type="radio" name="ea_gender" value="female" checked> Female<br>
                                                    <span class="checkmark"></span>
                                                    <?php }?>
                                                  </label>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- Upload Document -->
                                            <div class="pt-3 text-center">
                                              <a class="btn btn-primary" href="<?=base_url('assets/uploads/education_agents/'.$ea['ea_document'])?>" role="button" target="_blank">View Uploaded Document</a>
                                            </div>
                                            <div class="form-row pt-2 px-4">
                                              <a href="<?=base_url();?>internal/admin_panel/Admin_dashboard/users_accounts_nav" class="btn btn-primary">Back</a>
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



