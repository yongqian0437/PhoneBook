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
                            <th>Education Agent ID</th>
                            <th>User ID</th>
                            <th>Contact Number</th>
                            <th>Business email</th>
                            <th>Nationality</th>
                            <th>Gender/th>
                            <th>DOB</th>
                            <th>Document</th>
                            <th>Submit Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        foreach($ealist->result() as $ea)
                            echo "<tr>"
                                ."<td>$ea->ea_id</td>"
                                ."<td>$ea->user_id</td>"
                                ."<td>$ea->ea_phonenumber</td>"
                                ."<td>$ea->ea_businessemail</td>"
                                ."<td>$ea->ea_nationality</td>"
                                ."<td>$ea->ea_gender</td>"
                                ."<td>$ea->ea_dob</td>"
                                ."<td>$ea->ea_document</td>" 
                                ."<td>$ea->ea_submitdate</td>" 
                                ."</tr>" 
                    ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
</div>

