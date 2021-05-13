<?php $title?> 
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
  <div class="card-header">
    <b>Detail of Student</b>
  </div>
  <div class="card-body">
    <p class="card-title">Student ID: <?=$student ['student_id'];?></p>
    <p class="card-title">Phone Number: <?=$student ['student_phonenumber'];?></p>
    <p class="card-text">Nationality:<?=$student ['student_nationality'];?></p> 
    <p class="card-text">Gender:<?=$student ['student_gender'];?></p> 
    <p class="card-text">Date of Birth:<?=$student ['student_dob'];?></p> 
    <p class="card-text">Interest:<?=$student ['student_interest'];?></p> 
    <p class="card-text">Current Level:<?=$student ['student_currentlevel'];?></p> 
    <a href="<?=base_url();?>internal/admin_panel/Admin_dashboard/users_accounts_nav" class="btn btn-primary">Back</a>
  </div>
</div>
        </div>
    </div>
</div>