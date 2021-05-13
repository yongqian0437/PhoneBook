<!-- Content Wrapper -->
<div id="content-wrapper" >

<!-- Main Content -->
<div id="content">    
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>User ID</th>
                            <th>Contact Number</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Interest</th>
                            <th>Study Level</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        foreach($studentlist->result() as $student)
                            echo "<tr>"
                                ."<td>$student->student_id</td>"
                                ."<td>$student->user_id</td>"
                                ."<td>$student->student_phonenumber</td>"
                                ."<td>$student->student_nationality</td>"
                                ."<td>$student->student_gender</td>"
                                ."<td>$student->student_dob</td>"
                                ."<td>$student->student_interest</td>"
                                ."<td>$student->student_currentlevel</td>" 
                                ."</tr>" 
                    ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
</div>

