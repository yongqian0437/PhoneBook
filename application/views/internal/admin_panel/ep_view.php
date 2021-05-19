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
                            <th>Education Partner ID</th>
                            <th>User ID</th>
                            <th>Contact Number</th>
                            <th>Business email</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Job title</th>
                            <th>Submit Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        foreach($eplist->result() as $ep)
                        echo "<tr>"
                            ."<td>$ep->ep_id</td>"
                            ."<td>$ep->user_id</td>"
                            ."<td>$ep->ep_phonenumber</td>"
                            ."<td>$ep->ep_businessemail</td>"
                            ."<td>$ep->ep_nationality</td>"
                            ."<td>$ep->ep_gender</td>"
                            ."<td>$ep->ep_dob</td>"
                            ."<td><a class='btn btn-primary btn-block' href='"
                            .base_url()
                            ."assets/uploads/education_partner/$ep->ep_document' role='button' target='_blank'>View</a></td>" 
                            ."<td>$ep->ep_jobtitle</td>" 
                            ."<td>$ep->ep_submitdate</td>" 
                            ."</tr>"
                    ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
</div>

