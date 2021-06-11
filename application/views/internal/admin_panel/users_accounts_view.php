<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<!-- Jquery plugin -->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>

<script type="text/javascript">
    var base_url = "<?php echo base_url();?>";
</script>

<script>
setTimeout(function() {
    $('#alert_message').fadeOut();
}, 5000); // <-- time in milliseconds
</script>

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
        <div class="card shadow mb-4" id="all_table">
            <!-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
            </div> -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=base_url('internal/admin_panel/Admin_dashboard/users_accounts_nav');?>">All Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('internal/admin_panel/Admin_dashboard/show_activated_acc');?>">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('internal/admin_panel/Admin_dashboard/show_inactivate_acc');?>">Inactive</a>
                </li>
                
            </ul>
        
                <div class="card-body">
                <?=$this->session->flashdata('message')?> 
           
                <div class="table-reponsive col-20">
                <br>
                    <table class="table table-striped " style="width:100%" id="all_users_table">
                        <thead>
                        <tr>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Submit Date</th>
                                <th>Status</th>
                                <th>Action</th>
                               
                            </tr>
                            
                        </thead>
                        <tbody>
                        <?php $count=1; ?>
                        <?php foreach($userslist->result() as $re):?>
                        <?php
                                echo "<tr>"
                                ."<td>$count</td>"
                                ."<td>$re->user_fname $re->user_lname</td>"
                                ."<td>$re->user_email</td>"
                                ."<td>$re->user_role</td>"
                                ."<td>$re->user_submitdate</td>"
                        ?>
                         <?php $count++; ?>
                        
                            <?php if($re->user_approval==1){?>
                                <td>
                                    <a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/update_acc_approval?&sid=<?php echo $re->user_id;?>&sapproval=<?php echo $re->user_approval;?>" class="btn btn-success">Active</a>
                                </td>

                                <td>
                                <!-- <td><button type="button" class="btn btn-success" id="change_action_1"  onclick= "change_action(1)" data-id="<?php echo $re->user_id;?>">Activated</button> -->
                                
                                <!--user is student-->
                                <?php if($re->user_role=='Student'){?>
                                    <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_student/<?php echo $re->user_id;?>" class="btn btn-info"><span class="fas fa-eye"></span></th> 
                                
                                <!--user is education partner-->
                                <?php } else if($re->user_role=='Education Partner') {?> 
                                    <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_education_partner/<?php echo $re->user_id;?>" class="btn btn-info"><span class="fas fa-eye"></span></th> 

                                <!--user is academic counsellor-->
                                <?php } else if($re->user_role=='Academic Counsellor') {?> 
                                    <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_academic_counsellor/<?php echo $re->user_id;?>" class="btn btn-info"><span class="fas fa-eye"></span></th> 

                                <!--user is education agent-->
                                <?php } else if($re->user_role=='Education Agent') {?> 
                                    <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_education_agents/<?php echo $re->user_id;?>" class="btn btn-info"><span class="fas fa-eye"></span></th>
                                
                                <!--user is employer-->
                                <?php } else if($re->user_role=='Employer') {?> 
                                    <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_employer/<?php echo $re->user_id;?>" class="btn btn-info"><span class="fas fa-eye"></span></th>
                            <?php } ?> 
                           
                            </td>
                                <?php } else{ ?>
                                <td>
                                    <!-- <button type="button" class="btn btn-success" id="change_action_1"  onclick= "delete_user_id(<?php echo $re->user_id?>)">Delete2</button> -->
                                    <a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/update_acc_approval?slname=<?php echo $re->user_lname;?>&sfname=<?php echo $re->user_fname;?>&semail=<?php echo $re->user_email;?>&spassword=<?php echo $re->user_password;?>&sid=<?php echo $re->user_id;?>&sapproval=<?php echo $re->user_approval;?>" class="btn btn-danger ">Inactive</a>
                                </td> 

                                <td>
                                <!-- <a onclick= "change_action(0)" data-id="<?php echo $re->user_id;?>"  id="change_action_2" class="btn btn-warning ">Inactivate</a> -->
                               
                                <!-- <button type="button" class="btn btn-success" id="change_action_1"  onclick= "delete_user_id(<?php echo $re->user_id?>)">Delete2</button> -->
                                    <!--user is student-->
                                    <?php if($re->user_role=='Student'){?>
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_student/<?php echo $re->user_id;?>" class="btn btn-info"><span class="fas fa-eye"></span></th> 
                                  
                                    <!--user is education partner-->
                                    <?php } else if($re->user_role=='Education Partner'){ ?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_education_partner/<?php echo $re->user_id;?>"class="btn btn-info"><span class="fas fa-eye"></span></th>
                                
                                    <!--user is academic counsellor-->
                                    <?php } else if($re->user_role=='Academic Counsellor') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_academic_counsellor/<?php echo $re->user_id;?>" class="btn btn-info"><span class="fas fa-eye"></span></th>
                                
                                    <!--user is education agent-->
                                    <?php } else if($re->user_role=='Education Agent') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_education_agents/<?php echo $re->user_id;?>" class="btn btn-info"><span class="fas fa-eye"></span></th> 
                                
                                    <!--user is employer-->
                                    <?php } else if($re->user_role=='Employer') {?> 
                                        <a href="<?= base_url(); ?>internal/admin_panel/Users_information/detail_employer/<?php echo $re->user_id;?>" class="btn btn-info"><span class="fas fa-eye"></span></th> 
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

<script>
// function change_action(user_approval) {

//     if(user_approval==1)
//     {
//         var user_id = $('#change_action_1').data('id');// select id  (.)//select class, (#) select id
//     }
//     else
//     {
//         var user_id = $('#change_action_2').data('id');// select id  (.)//select class, (#) select id
//     }
   
   
// Swal.fire({
//     title: 'Are you sure?',
//     text: "You won't be able to revert this!",
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Yes, update it!'
// }).then((result) => {
//     if (result.isConfirmed) {

//         $.ajax({
//             url: base_url + "internal/admin_panel/Admin_dashboard/update_acc_approval",
//             method: "POST",
//             data: {user_id:user_id, user_approval: user_approval},
           
//             success: function (data) {
//                 Swal.fire(
//                     'Updated!',
//                     'Action has been updated.',
//                     'success'
//                 )

//                 //reload datatable
//                 // var xin_table = $("#all_users_table").DataTable();
//                 // xin_table.ajax.reload(null, false);
//             }
//         });

//     }
// })
// }

function change_action(user_approval) {

if(user_approval==1)
{
    var user_id = $('#change_action_1').data('id');// select id  (.)//select class, (#) select id
}
else
{
    var user_id = $('#change_action_2').data('id');// select id  (.)//select class, (#) select id
}


Swal.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, update it!'
}).then((result) => {
if (result.isConfirmed) {

    $.ajax({
        url: base_url + "internal/admin_panel/Admin_dashboard/update_acc_approval",
        method: "POST",
        data: {user_id:user_id, user_approval: user_approval},
       
        success: function (data) {
            Swal.fire(
                'Updated!',
                'Action has been updated.',
                'success'
            )

            //reload datatable
            var xin_table = $("#all_users_table").DataTable();
            xin_table.ajax.reload(null, false);
        }
    });

}
})
}


// function delete_user_id(user_id) {

// Swal.fire({
//     title: 'Are you sure?',
//     text: "You won't be able to revert this!",
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Yes, delete it!'
// }).then((result) => {
//     if (result.isConfirmed) {
//         $.ajax({

//             url: base_url + "internal/admin_panel/Admin_dashboard/delete_user_id",
//             method: "POST",
//             data: { user_id: user_id },
//             success: function (data) {
//                 Swal.fire(
//                     'Deleted!',
//                     'Course Applicant has been deleted.',
//                     'success'
//                 )

//                 //reload datatable
//                 var xin_table = $("#all_users_table").DataTable();
//                 xin_table.ajax.reload(null, false);
//             }
//         });

//     }
// })
// }





</script>

