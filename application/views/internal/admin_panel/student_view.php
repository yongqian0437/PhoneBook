<!-- Content Wrapper -->
<div id="content-wrapper" >

<!-- Main Content -->
<div id="content">    
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Students</h6>
        </div>
        <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User ID</th>
                            <th>Contact Number</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Interest</th>
                            <th>Study Level</th>
                            <th>Submit Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                    <?php $count=1;?>
                    <?php foreach($studentlist->result() as $student):?>
                    <?php 
                            echo "<tr>"
                                ."<td>$count</td>"
                                ."<td>$student->user_id</td>"
                                ."<td>$student->student_phonenumber</td>"
                                ."<td>$student->student_nationality</td>"
                                ."<td>$student->student_gender</td>"
                                ."<td>$student->student_dob</td>"
                                ."<td>$student->student_interest</td>"
                                ."<td>$student->student_currentlevel</td>" 
                                ."<td>$student->student_submitdate</td>" 
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

