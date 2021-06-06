<!-- Jquery plugin -->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#form1 #select-all").click(function(){
        $("#form1 input[type='checkbox']").prop('checked',this.checked);
    });
});

</script>

<script>
//Js to remove alert message after university information is edited
setTimeout(function() {
    $('#alert_message').fadeOut();
}, 5000); // <-- time in milliseconds
</script>
<!-- Content Wrapper -->
<div id="content-wrapper" >
    
    <!-- Main Content -->
    <div id="content">    
        
        <!-- Begin Page Content -->
        <div class="container-fluid">
     
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

        <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link"  href="<?=base_url('internal/admin_panel/Admin_dashboard/users_accounts_nav');?>">All Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=base_url('internal/admin_panel/Admin_dashboard/show_activated_acc');?>">Activated</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('internal/admin_panel/Admin_dashboard/show_inactivate_acc');?>">Inactivated</a>
                </li>
        </ul>

            <?=$this->session->flashdata('message')?> 
            <div class="card-body">
                <div class="table-reponsive col-20" >
               
               <form id= "form1" method="post" action="<?= base_url('internal/admin_panel/Admin_dashboard/inactivate_all_acc');?>">
               <input type="checkbox" id="select-all"/> Select All
                    <button type="submit" class="btn btn-warning" name="inactivate_all_acc">Inactivate</button>
                    <br>
                        <table class="table table-bordered dt-bootstrap4" style="width:auto" id="activated_table">
                    <br>
                        <thead>
                        <tr>
                        <!-- <th><button class="btn btn-warning btn-sm" type="submit" name="inactivate_all_acc">Inactivate</button></th> -->
                                <th> </th>
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
                        <?php foreach($userslist as $re):?>
                        <?php
                                echo "<tr>"
                                // ."<td class=text-center><input type=checkbox name=checkbox_value[] value=$re[user_id]></td>"
                                ."<td class=text-center><input type=checkbox name=checkbox_value[] value=$re[user_id]></td>"
                                ."<td class=text-center>$count</td>"
                                ."<td>$re[user_fname]</td>"
                                ."<td>$re[user_lname]</td>"
                                ."<td>$re[user_email]</td>"
                                ."<td>$re[user_role]</td>"
                                ."<td>$re[user_submitdate]</td>"
                        ?>
                         <?php $count++; ?>
                          
                                    <td><button type="button" class="btn btn-success"  disabled data-bs-toggle>Activated</button>
                                    <!-- <a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/delete_acc?sid=<?php echo $re['user_id'];?>" class="btn btn-danger"  onclick=" return confirm ('confirm to delete?');">Delete</a> -->
                                
                                    <!--user is student-->
                                    <?php if($re['user_role']=='Student'){?>
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_student/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th> 
                                    
                                    <!--user is education partner-->
                                    <?php } else if($re['user_role']=='Education Partner') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_education_partner/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th> 
                                    

                                    <!--user is academic counsellor-->
                                    <?php } else if($re['user_role']=='Academic Counsellor') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_academic_counsellor/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th> 

                                    <!--user is education agent-->
                                    <?php } else if($re['user_role']=='Education Agent') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_education_agents/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th> 
                                    
                                    <!--user is employer-->
                                    <?php } else if($re['user_role']=='Employer') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_employer/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th> 
                                </td>
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
<!-- <a href="<?=base_url('internal/admin_panel/Admin_dashboard/show_activated_acc');?>" class="btn btn-success" role="button" data-bs-toggle="button">Activated</a> -->


