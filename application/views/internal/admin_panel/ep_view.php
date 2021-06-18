<style>
th{
    color:black;
}
td{
    color: rgba(0,0,0,0.7);
}
</style>

<!-- Content Wrapper -->
<div id="content-wrapper" >

<!-- Main Content -->
<div id="content">    
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Education Partners</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Full Name</th>
                            <th>Contact Number</th>
                            <th>Business Email</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Document</th>
                            <th>Job Title</th>
                            <th>Submitted Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                    <?php $count=1;?>
                    <?php foreach($eplist->result() as $ep):?>

                    <?php
                        echo "<tr>"
                            ."<td>$count</td>"
                            ."<td>$ep->user_fname $ep->user_lname</td>"
                            ."<td>$ep->ep_phonenumber</td>"
                            ."<td>$ep->ep_businessemail</td>"
                            ."<td>$ep->ep_nationality</td>"
                            ."<td>$ep->ep_gender</td>"
                            ."<td>$ep->ep_dob</td>"
                            ."<td style='text-align:center'><a class='btn btn-info ' href='"
                            .base_url()
                            ."assets/uploads/education_partner/$ep->ep_document' role='button' target='_blank'><span class='fas fa-eye'></span></a></td>" 
                            ."<td>$ep->ep_jobtitle</td>" 
                            ."<td>$ep->ep_submitdate</td>" 
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

