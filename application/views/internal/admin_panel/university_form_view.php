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
                                    <div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#787878; font-weight:700;">UNIVERSITY INFORMATION FORM</div>
                                </center>
                                <br>
                               <!-- Form -->
                                <form>
                                <center><b><p class="card-title">University ID: <?=$uni['uni_id'];?></p></b></center>
                                <center><img class="img-fluid img_class"  src="<?= base_url("{$uni['uni_logo']}");?>" width="250";/></center>
                                <div class="form-row pt-4 px-3">
                                    <!-- University-->
                                    <div class="form-group col-md-12 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University Name: <?=$uni['uni_name'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row px-3">
                                    <!-- University Short Profile -->
                                    <div class="form-group col-md-12 px-2">
                                        <textarea class="form-control border-bottom" rows="10" style="border: 0;" placeholder= "University Short Profile: <?=$uni['uni_shortprofile'];?>" readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-row px-3">
                                    <!-- University Fun Fact -->
                                    <div class="form-group col-md-12 px-2">
                                        <textarea class="form-control border-bottom" rows="6" style="border: 0;" placeholder= "University Fun Fact: <?=$uni['uni_fun_fact'];?>" readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-row px-3">
                                    <!-- Country -->
                                    <div class="form-group col-md-12 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "Country: <?=$uni['uni_country'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row px-3">
                                    <!-- Address -->
                                    <div class="form-group col-md-12 px-2">
                                        <textarea class="form-control border-bottom" rows="6" style="border: 0;" placeholder= "University Address: <?=$uni['uni_address'];?>" readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-row px-3">
                                    <!-- Hotline-->
                                    <div class="form-group col-md-12 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University Hotline: <?=$uni['uni_hotline'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row px-3">
                                    <!--  Email -->
                                    <div class="form-group col-md-12 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University Email: <?=$uni['uni_email'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row px-3">
                                    <!--  Website -->
                                    <div class="form-group col-md-12 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University Website: <?=$uni['uni_website'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row px-3">
                                    <!-- QS Ranking, Employability Rank & Total Students -->
                                    <div class="form-group col-md-12 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University QS Ranking: <?=$uni['uni_qsrank'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row px-3">
                                    <div class="form-group col-md-12 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University Employability Rank: <?=$uni['uni_employabilityrank'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row px-3">
                                    <div class="form-group col-md-12 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "Total Students: <?=$uni['uni_totalstudents'];?>" readonly>
                                    </div>
                                </div>
                                    <!-- Upload University Background-->
                                    <div class="form-group col-md-12 px-2 pt-3 text-center">
                                        <a class="btn btn-primary" href="<?=base_url("{$uni['uni_background']}")?>" role="button" target="_blank">View University Background</a>
                                    </div>
                                    <div class="d-grid gap-2 d-md-block">
                                        <!-- <a href="<?=base_url();?>internal/admin_panel/Admin_dashboard/users_accounts_nav" class="btn btn-primary">Back</a> -->
                                    <a href="<?=base_url();?>internal/admin_panel/Users_information/detail_education_partner/<?php echo $this->session->userdata('user_id');?>" class="btn btn-primary">Back</a>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    
    </div>



