<!-- Content Wrapper -->
<div id="content-wrapper" >
    
    <!-- Main Content -->
    <div id="content">    
        
        <!-- Begin Page Content -->
        <div class="container-fluid">
     
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
            </div> -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=base_url('internal/admin_panel/Admin_dashboard/users_accounts_nav');?>">All Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('internal/admin_panel/Admin_dashboard/show_activated_acc');?>">Activated</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('internal/admin_panel/Admin_dashboard/show_inactivate_acc');?>">Inactivated</a>
                </li>
                
            </ul>
        
                <div class="card-body">
                <!-- <a href="<?=base_url('internal/admin_panel/Admin_dashboard/show_activated_acc');?>" class="btn btn-success" role="button" data-bs-toggle="button">Activated</a>
                <a href="<?=base_url('internal/admin_panel/Admin_dashboard/show_inactivate_acc');?>" class="btn btn-warning" role="button" data-bs-toggle="button">Inactivated</a> -->
            
           
                <div class="table-reponsive col-20">
                <br>
                    <table class="table table-bordered " style="width:100%" id="all_users_table">
                        <thead>
                        <tr>
                                <th>No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Submit Date</th>
                                <th>Action</th>
                               
                            </tr>
                            
                        </thead>
                        <tbody>
                        <?php $count=1; ?>
                        <?php foreach($userslist->result() as $re):?>
                        <?php
                                echo "<tr>"
                                ."<td>$count</td>"
                                ."<td>$re->user_fname</td>"
                                ."<td>$re->user_lname</td>"
                                ."<td>$re->user_email</td>"
                                ."<td>$re->user_role</td>"
                                ."<td>$re->user_submitdate</td>"
                        ?>
                         <?php $count++; ?>

                            <?php if($re->user_approval==1){?>
                                <td><button type="button" class="btn btn-success"  disabled data-bs-toggle>Activated</button>
                                    <!-- <a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/delete_acc?sid=<?php echo $re->user_id;?>" class="btn btn-danger"  onclick=" return confirm ('confirm to delete?');">Delete</a> -->
                                
                                    <!--user is student-->
                                    <?php if($re->user_role=='Student'){?>
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_student/<?php echo $re->user_id;?>" class="btn btn-secondary">View</th> 
                                    
                                    <!--user is education partner-->
                                    <?php } else if($re->user_role=='Education Partner') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_education_partner/<?php echo $re->user_id;?>" class="btn btn-secondary">View</th> 
                                    

                                    <!--user is academic counsellor-->
                                    <?php } else if($re->user_role=='Academic Counsellor') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_academic_counsellor/<?php echo $re->user_id;?>" class="btn btn-secondary">View</th> 

                                    <!--user is education agent-->
                                    <?php } else if($re->user_role=='Education Agent') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_education_agents/<?php echo $re->user_id;?>" class="btn btn-secondary">View</th> 
                                    
                                    <!--user is employer-->
                                    <?php } else if($re->user_role=='Employer') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_employer/<?php echo $re->user_id;?>" class="btn btn-secondary">View</th> 

                                <?php } ?> 
                                </td>

                                <?php } else{ ?>
                                <td>
                                <a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/update_acc_approval?slname=<?php echo $re->user_lname;?>&sfname=<?php echo $re->user_fname;?>&semail=<?php echo $re->user_email;?>&spassword=<?php echo $re->user_password;?>&sid=<?php echo $re->user_id;?>&sapproval=<?php echo $re->user_approval;?>" class="btn btn-warning ">Inactivate</a>
                            
                                    <!--user is student-->
                                    <?php if($re->user_role=='Student'){?>
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_student/<?php echo $re->user_id;?>" class="btn btn-secondary">View</th> 
                                  
                                    <!--user is education partner-->
                                    <?php } else if($re->user_role=='Education Partner'){ ?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_education_partner/<?php echo $re->user_id;?>" class="btn btn-secondary">View</th>
                                
                                    <!--user is academic counsellor-->
                                    <?php } else if($re->user_role=='Academic Counsellor') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_academic_counsellor/<?php echo $re->user_id;?>" class="btn btn-secondary">View</th> 
                                
                                    <!--user is education agent-->
                                    <?php } else if($re->user_role=='Education Agent') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_education_agents/<?php echo $re->user_id;?>" class="btn btn-secondary">View</th> 
                                
                                    <!--user is employer-->
                                    <?php } else if($re->user_role=='Employer') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_employer/<?php echo $re->user_id;?>" class="btn btn-secondary">View</th> 
                                </td> 
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

