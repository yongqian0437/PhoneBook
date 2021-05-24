<style>

#logo{
    border-radius:50% 50% 50% 50%;
    width:170px;
    height:170px;
    object-fit: scale-down;
    background-color:white;
}

#foreground{
    background: rgb(0, 0, 0); 
	background: rgba(0, 0, 0, 0.5); 
}

.course-cover-img {
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;
	height: auto;
	width: auto;
}

#overview_tab{
    background-color:#A4C3B2;
}
#courses_tab{
    background-color:#A4C3B2;
}
#contact_tab{
    background-color:#A4C3B2;
}

.borderless td, .borderless th {
    border: none !important;
}

th{
    width:2% !important;
    color:black ;
}

</style>

<!-- Top Navigation -->
<?php $this->load->view('external/templates/topnav');?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div style = 'background-color:white;' class="container-fluid">

                <!-- Content Row -->

                <!-- Banner with logo-->
                <div class = "row pt-1 px-0" >
                    <div class="col-md-12" >
                        <div class="course-cover-img" style="background-image: url('<?php echo base_url($uni_detail->uni_banner); ?>');">                            
                            <div id = "foreground">
                                <div class = "row pt-5" >
                                    <div class="col-md-12" >
                                    <center>
                                        <div style="width:200px; height:200px; border-radius:100%; margin:0 auto; background-color:white;">
                                            <img  src="<?php echo base_url($uni_detail->uni_logo); ?>" alt="uni_logo" id = "logo" class ="pt-5">
                                        </div>
                                    </center>
                                    <center>
                                        <div class = "pt-1" style = "vertical-align:bottom; font-size:1.5em; font-weight:700; color:white;"><?php echo $uni_detail->uni_name?></div>
                                    </center>   
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-md-12" >
                                    <div  class = "float-right pr-3" style = " vertical-align:bottom; font-size:1.6em; font-weight:700; color:white;"><?php echo $uni_detail->uni_totalcourses?> Courses</div>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
                <!-- /.banner with logo-->

                <!-- Nav for overview, courses and contact-->
                <div class = "row py-5 " >
                    <div class="col-md-12 px-3 pb-5">
                        <!-- Navbar-->
                        <ul class="nav nav-tabs " id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview_tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="courses_tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact_tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Information</a>
                            </li>
                        </ul>

                        <!-- Nav content-->
                        <div class="tab-content" id="myTabContent" style = " ">

                            <!-- Overview content-->
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="card border-left-info shadow h-100 ">
                                    <div class="card-body" style = "">
                                        <pre class = "px-3" style = "white-space: pre-wrap; word-break: break-word; text-align: justify; font-family: 'Nunito';font-size: 1.0em;"><?php echo $uni_detail->uni_shortprofile?></pre>
                                    </div>
                                </div>
                            </div>

                            <!-- Courses content-->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="card border-left-info shadow h-100 ">
                                    <div class="card-body" style = "">
                                        <!-- UNIVERSITIY INPUT -->
                                        <div class="form-row pt-2">
                                            <label for="course_field" class="col-sm-1 text-right col-form-label" style = "color:black;">Course Field: </label>
                                            <div class="col-sm-3">
                                                <select name="course_field" id="course_field" class="form-control form-select form-select-sm">
                                                    <option value="all" selected>All</option>
                                                    <?php
                                                        foreach($course_field as $c) {
                                                            echo '<option value="'.$c->course_area.'">'.$c->course_area.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div> 
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <!-- Contact content-->
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="card border-left-info shadow h-100 ">
                                    <div class="card-body" style = "">
                                    <table class="table borderless" style = "">
                                        <tbody>
                                            <tr>
                                                <th scope="row"><i class = "fas fa-envelope pt-1"></i></th>
                                                <td style = " color:black;"><div style = "font-weight:800;">Email</div><?php echo $uni_detail->uni_email?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><i class = "fas fa-phone pt-1"></i></th>
                                                <td style = " color:black;"><div style = "font-weight:800;">Hotline</div><?php echo $uni_detail->uni_hotline?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><i class = "fas fa-map-marked-alt pt-1"></i></th>
                                                <td style = " color:black;"><div style = "font-weight:800;">Address</div><?php echo $uni_detail->uni_address?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><i class = "fas fa-globe pt-1"></i></th>
                                                <td style = " color:black;"><div style = "font-weight:800;">Website</div><a href="<?php echo $uni_detail->uni_website?>" target="_blank">Link</a> </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--End nav content-->
                    </div>
                    <!--End col-->
                </div>
                <!--End of Nav for overview, courses and contact-->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

