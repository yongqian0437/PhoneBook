<!-- Content Wrapper -->
<div id="content-wrapper" >
    
    <!-- Main Content -->
    <div id="content">    
        
        <!-- Begin Page Content -->
        <div class="container-fluid">
     
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Course Applications</h6>
            </div>
        
                <div class="card-body">
                   
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Nationality</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>Current Level</th>
                                <th>Address</th>
                                <th>Identification</th>
                                <th>Submit Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $count=1;?>
                            <?php foreach($calist->result() as $ca):?>
                                <?php 
                                        echo "<tr>"
                                            ."<td>$count</td>"
                                            ."<td>$ca->c_applicant_fname</td>"
                                            ."<td>$ca->c_applicant_lname</td>"
                                            ."<td>$ca->c_applicant_phonenumber</td>"
                                            ."<td>$ca->c_applicant_email</td>"
                                            ."<td>$ca->c_applicant_nationality</td>"
                                            ."<td>$ca->c_applicant_gender</td>"
                                            ."<td>$ca->c_applicant_dob</td>"
                                            ."<td>$ca->c_applicant_currentlevel</td>" 
                                            ."<td>$ca->c_applicant_address</td>" 
                                            ."<td>$ca->c_applicant_identification</td>" 
                                            ."<td>$ca->c_app_submitdate</td>" 
                                            ."</tr>" 
                                ?>
                            <?php $count++; ?>
                            <?php endforeach ;?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

