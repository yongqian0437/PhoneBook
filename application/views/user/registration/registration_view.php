<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form class="user" method="post" action="<?= base_url('user/login/Auth/registration');?>">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="user_email" style=" color:black"; >First Name</label>
                                <input type="text" class="form-control  " id="user_fname"
                                name="user_fname"   placeholder="Enter your first name" value="<?=set_value('user_fname') ?>">
                                <?= form_error('user_fname','<small class="text-danger pl-3">','</small>');?>
                            </div>
                            <div class="col-sm-6">
                            <label for="user_email" style=" color:black"; >Last Name</label>
                            <input type="text" class="form-control " id="user_lname"
                                name="user_lname"  placeholder="Enter your last name" value="<?=set_value('user_lname') ?>">
                                <?= form_error('user_lname','<small class="text-danger pl-3">','</small>');?>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="user_email" style=" color:black"; >Email Address</label>
                            <input type="email" class="form-control  " id="user_email"
                                name="user_email" placeholder="Enter your email address" value="<?=set_value('user_email') ?>">
                                <?= form_error('user_email','<small class="text-danger pl-3">','</small>');?>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="user_email" style=" color:black"; >Password</label>
                                <input type="password" class="form-control "
                                    id="user_password" name="user_password" placeholder="Enter your password">
                                    <?= form_error('user_password','<small class="text-danger pl-3">','</small>');?>
                            </div>
                            <div class="col-sm-6">
                            <label for="user_email" style=" color:black"; >Confirm Password</label>
                                <input type="password" class="form-control "
                                    id="user_password2" name="user_password2"placeholder="Enter password again">
                            </div>
                        </div>

                       
                        <div class="form-group">
                        <label for="user_role" style=" color:black"; >Role</label>
                        <select class="form-control " id="user_role"
                        name="user_role" >
                        <option value="Student">Student</option>
                        <option value="Education Partner">Education Partner</option>
                        <option value="Education Agent">Education Agent</option>
                        <option value="Academic Couselor">Academic Couselor</option>
                        <option value="Employer">Employer</option>
                        <!-- <option value="admin">Admin</option> -->
                        </select>
                        </div>
                        
                          

                        
                        
                        <button type="submit" class="btn btn-outline-success btn-user btn-block">
                            Continue
                        </button>
                    
                        <hr>
                        
                    </form>

                 
                        <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                       </div>
                    <div class="text-center">
                        <a class="small" href="<?=base_url("user/login"); ?>">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

