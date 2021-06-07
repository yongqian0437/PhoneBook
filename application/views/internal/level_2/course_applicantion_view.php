<div class="container">
<a href="<?=base_url();?>internal/level_2/course_applicantion/add_course_application" class="btn btn-primary">Add New Course Applicant Form</a>
</div>

<!-- Content Wrapper -->
<div id="content-wrapper" >

<!-- Main Content -->
<div id="content">    
    <br>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Education Partners</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Email Address</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Current Level</th>
                            <th>Address</th>
                            <th>Identification</th>
                            <th>Document</th>
                           
                        </tr>
                    </thead>
                    
                    <tbody>
                    <!-- <?php $count=1;?> -->
                    <!-- <?php foreach($calist->result() as $ca):?> -->
                    
                    <?php
                        // echo "<tr>"
                        //     ."<td>$count</td>"
                        //     ."<td>$ca->c_applicant_fname</td>"
                        //     ."<td>$ca->c_applicant_lname</td>"
                        //     ."<td>$ca->c_applicant_phonenumber</td>"
                        //     ."<td>$ca->c_applicant_email</td>"
                        //     ."<td>$ca->c_applicant_nationality</td>"
                        //     ."<td>$ca->c_applicant_gender</td>"
                        //     ."<td>$ca->c_applicant_dob</td>"
                        //     ."<td>$ca->c_applicant_currentlevel</td>"
                        //     ."<td>$ca->c_applicant_address</td>"
                        //     ."<td>$ca->c_applicant_identification</td>"
                        //     ."<td><a class='btn btn-primary btn-block' href='"
                        //     .base_url()
                        //     ."assets/uploads/course_applicant_form/$ca->c_applicant_document' role='button' target='_blank'>View</a></td>" 
                           
                           
                            
                        //     ."</tr>" 
                    ?>
                    <!-- <?php $count++; ?> -->
                    <!-- <?php endforeach ;?> -->

                   

                   

                    </tbody>
                </table>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="view_course" tabindex="-1" role="dialog" aria-labelledby="view_courseLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header" style = "background-color:#6B9080;">
            <h5 class="modal-title" id="view_courseLabel" style ="color:white;">Course Information</h5>
            <button style ="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" >
            <div id = "course_information">

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
</div>
