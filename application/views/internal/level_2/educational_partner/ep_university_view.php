<style>

label{
    color:black;
}

input[readonly] {
    background-color: rgba(192,192,192,0.1) !important ;
}

textarea[readonly] {
    background-color: rgba(192,192,192,0.1) !important ;
}

</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">University</h1>
                </div>

                <!-- Breadcrumn -->
                <div class="row" >
                    <div class="breadcrumb-wrapper col-xl-11">
                        <ol class="breadcrumb" style = "background-color:rgba(0, 0, 0, 0);">
                            <li class="breadcrumb-item">
                                <a href=""><i class="fas fa-tachometer-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active">University</li>
                        </ol>
                    </div>
                    <div class = "col-xl-1">
                        <a type="button" href = "<?= base_url('internal/level_2/educational_partner/ep_university/edit_university'); ?>" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Card-->
                        <div class="card ">
                            <div class="card-body">
                            <?=$this->session->flashdata('edit_message')?> 
                                <form action="">
                                    <div class="form-row">
                                        <div class="form-group col-md-6 px-4 pr-5">
                                            <label for="uni_name">University Name</label>
                                            <input type="text" class="form-control" id="uni_name" name = "uni_name" placeholder="Enter university name" value = "<?= $university_data->uni_name?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6 px-4 pl-5">
                                            <label for="uni_country">University Country</label>
                                            <input type="text" class="form-control" id="uni_country" name = "uni_country" placeholder="Enter country" value = "<?= $university_data->uni_country?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12 px-4 pt-4">
                                            <label for="uni_shortprofile">University Shortprofile</label>
                                            <textarea type="text" class="form-control" rows="10" id="uni_shortprofile" name = "uni_shortprofile" placeholder="Enter shortprofile" readonly><?= $university_data->uni_shortprofile?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12 px-4 pt-4">
                                            <label for="uni_fun_fact">University Fun Fact</label>
                                            <textarea type="text" class="form-control" rows="5" id="uni_fun_fact" name = "uni_fun_fact" placeholder="Enter fun fact" readonly><?= $university_data->uni_fun_fact?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-row pt-4">
                                        <div class="form-group col-md-6 px-4 pr-5">
                                            <label for="uni_hotline">University Hotline</label>
                                            <input type="text" class="form-control" id="uni_hotline" name = "uni_hotline" placeholder="Enter hotline" value = "<?= $university_data->uni_hotline?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6 px-4 pl-5">
                                            <label for="uni_email">University Email</label>
                                            <input type="email" class="form-control" id="uni_email" name = "uni_email" placeholder="Enter email" value = "<?= $university_data->uni_email?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row pt-4">
                                        <div class="form-group col-md-6 px-4 pr-5">
                                            <label for="uni_address">University Address</label>
                                            <input type="text" class="form-control" id="uni_address" name = "uni_address" placeholder="Enter address" value = "<?= $university_data->uni_address?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6 px-4 pl-5">
                                            <label for="uni_website">University Website</label>
                                            <input type="text" class="form-control" id="uni_website" name = "uni_website" placeholder="Enter website" value = "<?= $university_data->uni_website?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row pt-5">
                                        <div class="form-group col-md-4 px-4 pr-5">
                                            <label for="uni_qsrank">University QS Rank</label>
                                            <input type="number" class="form-control" id="uni_qsrank" name = "uni_qsrank" placeholder="Enter QS ranking" value = "<?= $university_data->uni_qsrank?>" readonly>
                                        </div>
                                        <div class="form-group col-md-4 px-4 pr-5">
                                            <label for="uni_employabilityrank">University Employability Rank</label>
                                            <input type="number" class="form-control" id="uni_employabilityrank" name = "uni_employabilityrank" placeholder="Enter employability rank" value = "<?= $university_data->uni_employabilityrank?>" readonly>
                                        </div>
                                        <div class="form-group col-md-4 px-4 ">
                                            <label for="uni_totalstudents">University Total Students</label>
                                            <input type="number" class="form-control" id="uni_totalstudents" name = "uni_totalstudents" placeholder="Enter total student" value = "<?= $university_data->uni_totalstudents?>" readonly>
                                        </div>
                                    </div>

                                    <div class="py-4">
                                        <hr style=" width :100%; height:1px; background-color: rgba(0, 0, 0, 0.3); ;">
                                    </div>
                                    <!-- Images Row -->
                                    <div class = "row">

                                        <div class="col-xl-6 pl-5">
                                            <div class = "pb-3" style = "color:black;">Current University Logo</div>
                                            <img style=" height:200px; width: 300px; object-fit: contain;" src="<?= base_url($university_data->uni_logo); ?>" alt="logo">
                                        </div>
                                        <div class="col-xl-6">
                                        <div class = "pb-3" style = "color:black;">Current University Background</div>
                                            <img style=" height:200px; width: 300px; object-fit: contain;" src="<?= base_url($university_data->uni_background); ?>" alt="background">
                                        </div>
                                            
                                    </div>
                                    <!-- /. Images Row -->


                                </form>
                            </div>
                        </div>
                        <!-- /. Card -->

                    </div>                   
                </div>
                <!-- /. Content Row -->

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->