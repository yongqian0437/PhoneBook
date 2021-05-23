<!-- Content Wrapper -->
<div id="content-wrapper" >

<!-- Main Content -->
<div id="content">    
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
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
                                    <div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#787878; font-weight:700;">COMPANY INFORMATION FORM</div>
                                </center>
                                <br>
                               <!-- Form -->
                                <form>
                                <center><b><p class="card-title">Company ID: <?=$c['c_id'];?></p></b></center>
                                 <!-- Company Name -->
                                 <div class="form-group col-md-12 px-2">
                                    <input  class="form-control border-bottom" style="border: 0;" placeholder= "Company Name: <?=$c['c_name'];?>" readonly>
                                 </div>

                                 <!-- Company Phone Number-->
                                 <div class="form-group col-md-7 px-2">
                                    <input  class="form-control border-bottom" style="border: 0;" placeholder= "Phone Number: <?=$c['c_phonenumber'];?>" readonly>
                                </div>

                                <!-- Company Registration Number-->
                                <div class="form-group col-md-8 px-2">
                                    <input  class="form-control border-bottom" style="border: 0;" placeholder= "Registration Number: <?=$c['c_registrationnum'];?>" readonly>
                                </div>

                               <!-- Company Address -->
                               <div class="form-group col-md-12 px-2">
                               <input  class="form-control border-bottom" style="border: 0;" placeholder= "Company Address: <?=$c['c_address'];?>" readonly>
                                </div>

                                <!--Company Email-->
                                <div class="form-group col-md-12 px-2">
                                <input  class="form-control border-bottom" style="border: 0;" placeholder= "Email Address: <?=$c['c_email'];?>" readonly>
                                </div>

                                <!-- Company Website-->
                                <div class="form-group col-md-12 px-2">
                                <input  class="form-control border-bottom" style="border: 0;" placeholder= "Website: <?=$c['c_website'];?>" readonly>
                                </div>
                                  
                                <div class="d-grid gap-2 d-md-block">
                                    <!-- <a href="<?=base_url();?>internal/admin_panel/Admin_dashboard/users_accounts_nav" class="btn btn-primary">Back</a> -->
                                    <a href="<?=base_url();?>internal/admin_panel/Users_information/detail_employer/<?php echo $this->session->userdata('user_id');?>" class="btn btn-primary">Back</a>
                                </div>

                                 <!--Logo-->
                                <!-- <div class="form-group col-md-5 px-2">
                                    <input type="file" class="custom-file-input" id="form-group" name="c_logo">
                                    <label class="custom-file-label border-bottom" style="border: 0;" for="customFile">Upload logo</label>
                                </div> -->

                                </form>
                                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    
    </div>



