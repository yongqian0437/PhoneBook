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
                                          <form method="post" action="<?= base_url('user/login/Auth/university');?>">
                                            <!-- Phone number and business email-->
                                            <div class="row">
                                                <div class="col text-center pt-4">
                                                <h2 style="color:black; font-weight:700">University Information Form</h2>
                                                </div>
                                            </div>
                                           
                                        <div class="form-row pt-4 px-3">
                                            <!-- University-->
                                            <div class="form-group col-md-8 px-2">
                                              <input type="text" class="form-control" name="uni_name" placeholder="University Name" required>
                                            </div>

                                            <!--  Email -->
                                            <div class="form-group col-md-7 px-2">
                                              <input type="email" class="form-control" name="uni_email" placeholder="University Email" value="<?=set_value('ep_businessemail')?>">
                                              <?= form_error('uni_email','<small class="text-danger pl-3">','</small>');?>
                                            </div>

                                              <!-- Total courses -->
                                              <div class="form-group col-md-5 px-2">
                                              <input type="text" class="form-control" name="uni_totalcourses" placeholder="Total Courses" required>
                                            </div>

                                            <!-- University Short Profile -->
                                            <div class="form-group col-md-12 px-2">
                                              <textarea class="form-control" rows="2" name="uni_shortprofile" placeholder="Short Profile" required></textarea>
                                            </div>

                                            <!-- Country -->
                                            <div class="form-group col-md-7 px-2">
                                              <input type="text" class="form-control" name="uni_country" placeholder="Country of University" required>
                                            </div>

                                             <!--Logo-->
                                             <div class="form-group col-md-5 px-2">
                                                <input type="file" class="custom-file-input" id="form-group" name="uni_logo">
                                                <label class="custom-file-label" for="customFile">Upload logo</label>
                                             </div>

                                            <!-- Address -->
                                            <div class="form-group col-md-12 px-2">
                                               <textarea class="form-control" rows="2" name="uni_address" placeholder="University Address" required></textarea>
                                            </div>

                                            <!-- QS Ranking, Employability Rank & Total Students -->
                                            <div class="form-group col-md-6 px-2">
                                                <input type="number" class="form-control" name="uni_qsrank" placeholder="QS Ranking" required>
                                            </div>
                                            <div class="form-group col-md-6 px-2">
                                                <input type="number" class="form-control" name="uni_employabilityrank" placeholder="Employability Rank" required>
                                            </div>
                                            <div class="form-group col-md-6 px-2">
                                                <input type="number" class="form-control" name="uni_totalstudents" placeholder="Total Students" required>
                                            </div>

                                            <!-- Hotline-->
                                            <div class="form-group col-md-6 px-2">
                                              <input type="number" class="form-control" name="uni_hotline" placeholder="University Hotline" required>
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



