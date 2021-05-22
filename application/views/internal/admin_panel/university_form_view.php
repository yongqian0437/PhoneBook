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
                                    <div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#787878; font-weight:700;">UNIVERSITY INFORMATION FORM</div>
                                </center>
                                <br>
                               <!-- Form -->
                                <form>
                                <center><b><p class="card-title">University ID: <?=$uni['uni_id'];?></p></b></center>
                                
                                    <!-- University-->
                                    <div class="form-group col-md-12 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University Name: <?=$uni['uni_name'];?>" readonly>
                                    </div>

                                    <!--  Email -->
                                    <div class="form-group col-md-7 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University Email: <?=$uni['uni_email'];?>" readonly>
                                    </div>

                                    <!-- Total courses -->
                                    <div class="form-group col-md-5 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "Total courses: <?=$uni['uni_totalcourses'];?>" readonly>
                                    </div>

                                    <!-- University Short Profile -->
                                    <div class="form-group col-md-12 px-2">
                                        
                                        <textarea class="form-control border-bottom" style="border: 0;" placeholder= "University Short Profile: <?=$uni['uni_shortprofile'];?>" readonly></textarea>
                                    </div>

                                    <!-- Country -->
                                    <div class="form-group col-md-6 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "Country: <?=$uni['uni_country'];?>" readonly>
                                    </div>

                                    <!--Logo-->
                                    <!-- <div class="form-group col-md-5 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University Logo: <?=$uni['uni_logo'];?>" readonly>
                                    </div> -->

                                    <!-- Address -->
                                    <div class="form-group col-md-12 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University Address: <?=$uni['uni_address'];?>" readonly>
                                    </div>

                                    <!-- QS Ranking, Employability Rank & Total Students -->
                                    <div class="form-group col-md-6 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University QS Ranking: <?=$uni['uni_qsrank'];?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University Employabilityrank: <?=$uni['uni_employabilityrank'];?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "Total Students: <?=$uni['uni_totalstudents'];?>" readonly>
                                    </div>

                                    <!-- Hotline-->
                                    <div class="form-group col-md-6 px-2">
                                        <input  class="form-control border-bottom" style="border: 0;" placeholder= "University Hotline: <?=$uni['uni_hotline'];?>" readonly>
                                    </div>

                                    <div class="d-grid gap-2 d-md-block">
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



