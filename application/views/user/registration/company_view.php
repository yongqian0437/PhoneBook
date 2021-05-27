<!-- Jquery plugin -->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>


<!-- Page level custom scripts -->

<!-- Set base url to javascript variable-->
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>
<link href="<?php echo base_url() ?>assets/css/forms.css" rel="stylesheet">


<body id="page-top" style='background-color:#f9f6f1;'>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid ">

                    <!-- Cards for registration -->
                    <div class="row justify-content-md-center pt-5" style='background-color:#f9f6f1;'>

                        <!-- Steps -->
                        <div class="col-xl-3">
                            <div class="card h-100 " id='card1'>
                                <div class="card-body" style="background-color:#DAE7E0">

                                    <div class="pl-3 pr-3 pt-4">
                                        <div class="pl-4" style="font-size:16px; font-weight:700; color:black;">Join Interactive Joint Education Employability System (iJEES) in</div>
                                        <div class="pt-2 pl-4 pb-3" style="font-size:38px; color:green; font-weight:900;">3 STEPS</div>

                                        <div class="pl-4">
                                            <div class="number pt-4 pl-4 pb-1" style="font-size:18px; color:green; font-weight:900;">01</div>
                                        </div>
                                        <div class="pl-4 pb-3" style="font-size:14px; color:black;">Select your role before you fill in your detail in the registration form.</div>

                                        <div class="pl-4">
                                            <div class="number pt-4 pl-4 pb-1" style="font-size:18px; color:green; font-weight:900;">02</div>
                                        </div>
                                        <div class="pl-4 pb-3" style="font-size:14px; color:black;">If you already have an existing account, login now with your credentials. </div>

                                        <div class="pl-4">
                                            <div class="number pt-4 pl-4 pb-1" style="font-size:18px; color:green; font-weight:900;">03</div>
                                        </div>
                                        <div class="pl-4 pb-5" style="font-size:14px; color:black;">After login, you are on the main page based on your role. </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 ">
                            <div class="card h-100" id='card2' ">
                                <div class=" card-body">
                                <center>
                                    <div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#787878; font-weight:700;">COMPANY INFORMATION FORM</div>
                                </center>

                               <!-- Form -->
                                <form method="post" action="<?= base_url('user/login/Auth/company');?>" enctype="multipart/form-data">
                                <?= form_open_multipart('') ?>    
                                        <div class="form-row pt-4 px-3">
                                             <!-- Company Name -->
                                            <div class="form-group col-md-12 px-2">
                                              <input type="text" class="form-control border-bottom" style="border: 0;" name="c_name" placeholder="Company Name" value="<?=set_value('course_name')?>" required>
                                              <?= form_error('c_name','<small class="text-danger pl-3">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-row pt-3 px-3">
                                            <!-- Company Registration Number-->
                                            <div class="form-group col-md-12 px-2">
                                              <input type="text" class="form-control border-bottom" style="border: 0;" name="c_registrationnum" placeholder="Company Registration Number" required>
                                            </div>
                                        </div>
                                        <div class="form-row pt-3 px-4">
                                             <!--Logo-->
                                            <div class="form-group col-md-12 px-2">
                                                <input type="file" class="custom-file-input" id="form-group" name="c_logo" value="<?=set_value('c_logo')?>">
                                                <label class="custom-file-label border-bottom" style="border: 0;" for="customFile">Upload Company Logo</label>
                                                <p style="font-size: 14px">*Accepted file formats are only in .JPG, .JPEG and .PNG</p>
                                                <?= form_error('c_logo','<small class="text-danger pl-3">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-row pt-3 px-3">
                                            <!-- Company Address -->
                                            <div class="form-group col-md-12 px-2">
                                              <input type="text" class="form-control border-bottom" style="border: 0;" name="c_address" placeholder="Company Address" required>
                                            </div>
                                        </div>
                                        <div class="form-row pt-3 px-3">
                                            <!-- Company Phone Number-->
                                            <div class="form-group col-md-12 px-2">
                                              <input type="number" class="form-control border-bottom" style="border: 0;" name="c_phonenumber" placeholder="Company Phone Number" required>
                                            </div>
                                        </div>
                                        <div class="form-row pt-3 px-3">
                                            <!--Company Email-->
                                            <div class="form-group col-md-12 px-2">
                                                <input type="email" class="form-control border-bottom" style="border: 0;" name="c_email" placeholder="Company Email" required>    
                                            </div>
                                        </div>
                                        <div class="form-row pt-3 px-3">
                                            <!-- Company Website-->
                                            <div class="form-group col-md-12 px-2">
                                              <input type="text" class="form-control border-bottom" style="border: 0;" name="c_website" placeholder="Company Website" required>
                                            </div>
                                        </div>
                                        <div class="form-row pt-4 px-3">
                                            <!-- Continue Button -->
                                            <div class="col">
                                                   <button type="submit" class="btn btn-success mt-4" style="float:right; width:auto;">Continue <i class="fas fa-check"></i></button>
                                            </div>
                                        </div>
                                </form>
                                <!-- End of Input fields (Form) -->

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