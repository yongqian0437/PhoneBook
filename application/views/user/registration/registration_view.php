<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Set base url to javascript variable-->
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";

  

</script>


<body id="page-top" style='background-color:#ececec;'>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" >

                <!-- Begin Page Content -->
                <div class="container-fluid" >

                    <!-- Cards for registration -->
                    <div class="row justify-content-md-center pt-5 pb-5"style='background-color:#ececec;' >

                        <!-- Form -->
                        <div class="col-xl-6 ">
                            <div class="card h-100 " style=border-radius:10px; id='card2' >
                                <div class=" card-body ">
                                <center>
                                    <div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#787878; font-weight:700;">REGISTRATION PAGE</div>
                                </center>
                                <!-- Input fields (Form) -->
                                <form class="user" method="post" action="<?= base_url('user/auth/registration'); ?>">
                                    <!-- First and last name-->
                                    <div class="form-row pt-5 px-3">
                                        <div class="form-group col-md-6 px-2 pr-4">
                                            <input type="type" name="user_fname" class="form-control border-bottom" id="user_fname" style="border: 0;" placeholder="Enter your first name" value="<?= set_value('user_fname') ?>" required>
                                            <?= form_error('user_fname', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>
                                        <div class="form-group col-md-6 px-2">
                                            <input type="type" name="user_lname" class="form-control border-bottom" id="user_lname" style="border: 0;" placeholder="Enter your last name" value="<?= set_value('user_lname') ?>" required>
                                            <?= form_error('user_lname', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <!-- Email and invite code-->
                                    <div class="form-row pt-3 px-3">
                                        <div class="form-group col-md-8 px-2 pr-4">
                                            <input type="email" name="user_email" class="form-control border-bottom" id="user_email" style="border: 0;" placeholder="Enter your email address" value="<?= set_value('user_email') ?>" required>
                                            <?= form_error('user_email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>                                      
                                    </div>
                                    <!-- Password and confirm password -->
                                    <div class="form-row pt-3 px-3">
                                        <div class="form-group col-md-6 px-2 pr-4">
                                            <input type="password" name="user_password" class="form-control border-bottom" id="password" style="border: 0;" placeholder="Enter your password" required>
                                            <?= form_error('user_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-md-6 px-2">
                                            <input type="password" name="user_password2" class="form-control border-bottom" id="user_password2" style="border: 0;" placeholder="Confirm your password" required>
                                        </div>
                                    </div>
                                  
                                    <!-- Submit button -->
                                    <div class="pt-4 pr-4">
                                        <button type="submit" class="btn btn-success" style="float:right; width:auto;"><i class="fas fa-check pr-2"></i>Submit</button>
                                    </div>
                                </form>
                                <br><br>
                                <!-- End of Input fields (Form) -->
                                <center>
                                    <div class="pt-5 pb-4">
                                        <a style="text-align:center;" href="<?= base_url("user/auth/login"); ?>">Already have an account? Login!</a>
                                    </div>
                                </center>

                            </div>
                        </div>

                    </div>

                </div>

                <!-- END OF ROW -->
                <!-- END OF FORM -->


            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->