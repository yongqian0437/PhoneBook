<!-- Jquery plugin -->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>

<!-- Set base url to javascript variable-->
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>

<script>
//Js to remove alert message after university information is edited
setTimeout(function() {
    $('#alert_message').fadeOut();
}, 5000); // <-- time in milliseconds
</script>

<body id="page-top" style='background-color:white;'>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid ">

                    <!-- Cards for registration -->
                    <div class="row justify-content-md-center pt-5 pb-5" style='background-color:white;'>

                        <!-- Steps -->

                        <!-- Form -->
                        <div class="col-xl-6 ">
                            <div class="card h-100" id='card2' ">
                                <div class=" card-body">
                                <center>
                                    <div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#787878; font-weight:700;">FORGOT YOUR PASSWORD?</div>
                                </center>
                                <?=$this->session->flashdata('message')?> 
                                <!-- Input fields (Form) -->
                                <form class="user" method="post" action=" <?=base_url('user/auth/resetlink'); ?>">
                                    <!-- Email-->
                                    <div class="form-row pt-5 px-3">
                                        <div class="form-group col-md-12 px-2">
                                            <input type="email" name="user_email" class="form-control border-bottom" id="email" style="border: 0;" placeholder="Enter your email address" value="<?=set_value('user_email');?>">
                                            <?= form_error('user_email','<small class="text-danger pl-3">','</small>');?>
                                        </div>
                                    </div>
                                   
                                    <!-- Submit button -->
                                    <div class="pt-1 pr-4">
                                        <button type="submit" class="btn btn-success" style="float:right; width:auto">Reset Password<i class="fas fa-check"></i></button>
                                    </div>
                                </form>
                                <!-- End of Input fields (Form) -->
                                <br><br>
                                 <center>
                                 <div class="pt-5">
                                    <a style="text-align:center;" href="<?=base_url("user/auth/login"); ?>">Back to Login</a>
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