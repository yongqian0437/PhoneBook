
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
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                    </div>
                                    <?=$this->session->flashdata('message')?> 
                                    <form class="user" method="post" action=" <?=base_url('user/login/Auth/login'); ?>">
                                        <div class="form-group">
                                        <label for="user_email" style=" color:black"; >Email Address</label>
                                            <input type="email" class="form-control "
                                                id="user_email" name="user_email"  aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="<?=set_value('user_email');?>">
                                                <?= form_error('user_email','<small class="text-danger pl-3">','</small>');?>
                                        </div>
                                        <div class="form-group">
                                        <label for="user_email" style=" color:black"; >Password</label>
                                            <input type="password" class="form-control "
                                                id="user_password" name="user_password" placeholder="Password">
                                                <?= form_error('user_password','<small class="text-danger pl-3">','</small>');?>
                                        </div>
                                        <div class="form-group">
                                            
                                        </div>
                                       <button type="submit" class="btn btn-outline-success btn-user btn-block">
                                            Login
                                        </button>
                                        
                                       
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('user/login/Auth/registration');?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    
    </div>



