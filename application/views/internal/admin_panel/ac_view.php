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
                            <th>Academic Couselor ID</th>
                            <th>User ID</th>
                            <th>Contact Number</th>
                            <th>Business email</th>
                            <th>University</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                            <th>Date of birth</th>
                            <th>Document</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        foreach($aclist->result() as $ac)
                            echo "<tr>"
                                ."<td>$ac->ac_id</td>"
                                ."<td>$ac->user_id</td>"
                                ."<td>$ac->ac_phonenumber</td>"
                                ."<td>$ac->ac_businessemail</td>"
                                ."<td>$ac->ac_university</td>"
                                ."<td>$ac->ac_nationality</td>"
                                ."<td>$ac->ac_gender</td>"
                                ."<td>$ac->ac_dob</td>" 
                                ."<td>$ac->ac_document</td>" 
                                ."</tr>" 
                    ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
</div>

