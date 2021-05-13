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
                            <th>EmployerID</th>
                            <th>User ID</th>
                            <th>Contact Number</th>
                            <th>Business email</th>
                            <th>Nationality</th>
                            <th>Gender/th>
                            <th>DOB</th>
                            <th>Document</th>
                            <th>Jobtitle</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        foreach($elist->result() as $e)
                            echo "<tr>"
                                ."<td>$e->e_id</td>"
                                ."<td>$e->user_id</td>"
                                ."<td>$e->e_phonenumber</td>"
                                ."<td>$e->e_businessemail</td>"
                                ."<td>$e->e_nationality</td>"
                                ."<td>$e->e_gender</td>"
                                ."<td>$e->e_dob</td>"
                                ."<td>$e->e_document</td>" 
                                ."<td>$e->e_jobtitle</td>" 
                                ."</tr>" 
                    ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
</div>

