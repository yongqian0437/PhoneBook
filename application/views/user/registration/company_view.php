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
                                          <form method="post" action="<?= base_url('user/login/Auth/company');?>">
                                            <!-- Phone number and business email-->
                                            <div class="row">
                                                <div class="col text-center pt-4">
                                                <h2 style="color:black; font-weight:700">Company Information Form</h2>
                                                </div>
                                            </div>
                                           
                                            <div class="form-row pt-4 px-3">
                                             <!-- Company Name -->
                                            <div class="form-group col-md-6 px-2">
                                              <input type="text" class="form-control" name="c_name" placeholder="Company Name" value="<?=set_value('course_name')?>">
                                              <?= form_error('c_name','<small class="text-danger pl-3">','</small>');?>
                                            </div>

                                            <!-- Company Phone Number-->
                                            <div class="form-group col-md-6 px-2">
                                              <input type="number" class="form-control" name="c_phonenumber" placeholder="Company Phone Number" required>
                                            </div>

                                            <!-- Company Registration Number-->
                                            <div class="form-group col-md-7 px-2">
                                              <input type="text" class="form-control" name="c_registrationnum" placeholder="Company Registration Number" required>
                                            </div>

                                            <!--Logo-->
                                            <div class="form-group col-md-5 px-2">
                                                <input type="file" class="custom-file-input" id="form-group" name="c_logo">
                                                <label class="custom-file-label" for="customFile">Upload logo</label>
                                             </div>

                                            <!-- Company Address -->
                                            <div class="form-group col-md-12 px-2">
                                              <input type="text" class="form-control" name="c_address" placeholder="Company Address" required>
                                            </div>

                                            <!--Company Email-->
                                            <div class="form-group col-md-12 px-2">
                                                <input type="email" class="form-control" name="c_email" placeholder="Company Email"  value="<?=set_value('c_email')?>">    
                                                <?= form_error('c_email','<small class="text-danger pl-3">','</small>');?>
                                            </div>

                                            <!-- Company Website-->
                                            <div class="form-group col-md-12 px-2">
                                              <input type="text" class="form-control" name="c_website" placeholder="Company Website" required>
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



