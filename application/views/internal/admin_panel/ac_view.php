<!-- Content Wrapper -->
<div id="content-wrapper" >

<!-- Main Content -->
<div id="content">    
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Academic Counsellors</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User ID</th>
                            <th>Contact Number</th>
                            <th>Business email</th>
                            <th>University</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Document</th>
                            <th>Submit Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                   
                    <?php $count=1;?>
                    <?php foreach($aclist->result() as $ac):?>
                    <?php  
                    echo "<tr>"
                    ."<td>$count</td>"
                    ."<td>$ac->user_id</td>"
                    ."<td>$ac->ac_phonenumber</td>"
                    ."<td>$ac->ac_businessemail</td>"
                    ."<td>$ac->ac_university</td>"
                    ."<td>$ac->ac_nationality</td>"
                    ."<td>$ac->ac_gender</td>"
                    ."<td>$ac->ac_dob</td>" 
                    ."<td><a class='btn btn-primary btn-block' href='"
                    .base_url()
                    ."assets/uploads/academic_counsellor/$ac->ac_document' role='button' target='_blank'>View</a></td>" 
                    ."<td>$ac->ac_submitdate</td>" 
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

