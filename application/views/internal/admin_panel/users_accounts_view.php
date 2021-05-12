<div class="container">
<div class="row">
<div class="col-md-6">
<?=$this->session->flashdata('message')?>

</div>
<div class="row mt-3">
  <div class="col-md-6">
  <form action =" " method="post">
  <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search For..." 
  name="keyword">
<div class="inpuyt-group-append">
  <button class="btn btn-primary" type="submit" >Search</button>
  </div>
</div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  
  <?php
foreach($users as $re):?>
 
 <?php
  echo "<tr>"
      ."<td>$re[user_id]</td>"
      ."<td>$re[user_fname]</td>"
      ."<td>$re[user_lname]</td>"
      ."<td>$re[user_email]</td>"
      ."<td>$re[user_password]</td>"
      ."<td>$re[user_role]</td>";
      
      ?>
      <?php
      if($re['user_approval']==1){
        ?>
        
        <!-- <td><a href="users/update_approval?slname=<?php echo $re['user_lname'];?>&semail=<?php echo $re['user_email'];?>&spassword=<?php echo $re['user_password'];?>&sid=<?php echo $re['user_id'];?>&sapproval=<?php echo $re['user_approval'];?>" class="btn btn-success">Approve</a></td> -->
        <td><button type="button" class="btn btn-success"  disabled data-bs-toggle>Approved</button></td>
        <td><a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/delete_acc?sid=<?php echo $re['user_id'];?>" class="btn btn-danger" onclick=" return confirm ('confirm to delete?');">Delete</a></td>
        
        <!--user is student-->
        <?php if($re['user_role']=='student'){ ?>
        <td><a href="<?= base_url(); ?>internal/admin_panel/Users_information/detailstudent/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th>
       
        <!--user is education partner-->
        <?php } 
        else if($re['user_role']=='education_partner') {?>
          <!-- <td><a href="<?= base_url(); ?>external/education_partner/detaileducation_partner/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th> -->
          <?php } ?>
        <?php }
        else{
          ?>
         <td><a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/update_acc_approval?slname=<?php echo $re['user_lname'];?>&semail=<?php echo $re['user_email'];?>&spassword=<?php echo $re['user_password'];?>&sid=<?php echo $re['user_id'];?>&sapproval=<?php echo $re['user_approval'];?>" class="btn btn-warning">Pending</a></td>
         <td><a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/decline_acc?slname=<?php echo $re['user_lname'];?>&semail=<?php echo $re['user_email'];?>&spassword=<?php echo $re['user_password'];?>&sid=<?php echo $re['user_id'];?>&sapproval=<?php echo $re['user_approval'];?>" class="btn btn-info"  onclick=" return confirm ('Confirm to decline?');">Decline</a></td>
        
         <!--user is student-->
         <?php if($re['user_role']=='student'){ ?>
         <td><a href="<?= base_url(); ?>internal/admin_panel/Users_information/detailstudent/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th>
         <?php } 
        else if($re['user_role']=='education_partner') {?>
          <!-- <td><a href="<?= base_url(); ?>external/education_partner/detaileducation_partner/<?php echo $re['user_id'];?>" class="btn btn-secondary">View</th> -->
          <?php } ?>

         
         

       <?php 
      }
      ?>
    
      </tr>

      
    <?php endforeach ;?>
    <div class="row mt-3">
  <div class="col-md-10">
    <a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/users_accounts_nav" class="btn btn-secondary " >All Users</a>
    <a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/show_approve_acc " class="btn btn-success " >Approved</a>
    <a href="<?= base_url(); ?>internal/admin_panel/Admin_dashboard/show_pending_acc " class="btn btn-warning " >Pending</a>
    </div>
</div>
<br>
    
    
  </tbody>

  
</table>


</div>
</div>
</div>