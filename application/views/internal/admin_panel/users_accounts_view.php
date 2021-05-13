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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                                      
                    <tbody>
                      <?php foreach($users as $re):?>
                      <?php
                            echo "<tr>"
                            ."<td>$re[user_id]</td>"
                            ."<td>$re[user_fname]</td>"
                            ."<td>$re[user_lname]</td>"
                            ."<td>$re[user_email]</td>"
                            ."<td>$re[user_password]</td>"
                            ."<td>$re[user_role]</td>";
                            
                      ?>
                      <?php if($re['user_approval']==1){?>
                            <td><button type="button" class="btn btn-success"  disabled data-bs-toggle>Approved</button></td>
                            <td><a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/delete_acc?sid=<?php echo $re['user_id'];?>" class="btn btn-danger"  onclick=" return confirm ('confirm to delete?');">Delete</a></td>
                            <!--user is student-->
                            <?php if($re['user_role']=='Student'){?>
                            <td><a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_student/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th>

                            <!--user is education partner-->
                            <?php } else if($re['user_role']=='Education Partner') {?>
                            <!-- <td><a href="<?= base_url(); ?>external/education_partner/detail_education_partner/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th> -->
                            <?php } ?>

                            <?php } else{ ?>
                            <td><a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/update_acc_approval?slname=<?php echo $re['user_lname'];?>&semail=<?php echo $re['user_email'];?>&spassword=<?php echo $re['user_password'];?>&sid=<?php echo $re['user_id'];?>&sapproval=<?php echo $re['user_approval'];?>" class="btn btn-warning">Pending</a></td>
                            <td><a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/decline_acc?slname=<?php echo $re['user_lname'];?>&semail=<?php echo $re['user_email'];?>&spassword=<?php echo $re['user_password'];?>&sid=<?php echo $re['user_id'];?>&sapproval=<?php echo $re['user_approval'];?>" class="btn btn-info"  onclick=" return confirm ('Confirm to decline?');">Decline</a></td>

                            <!--user is student-->
                            <?php if($re['user_role']=='Student'){ ?>
                            <td><a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_student/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th>
                            <?php } else if($re['user_role']=='Education Partner') {?>
                            <!-- <td><a href="<?= base_url(); ?>external/education_partner/detail_education_partner/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th> -->
                            <?php } ?>
                            <?php }?>
                            </tr>    
                            <?php endforeach ;?>
                    </tbody>        
                 </table>
             </div>
          </div>
     </div>
</div>
</div>

