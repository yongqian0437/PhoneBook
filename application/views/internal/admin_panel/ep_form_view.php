<?php $title?> 
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
  <div class="card-header">
    <b>Detail of Education Partner</b>
  </div>
  <div class="card-body">
    <p class="card-title">Education Partner ID: <?=$ep['ep_id'];?></p>
    <p class="card-title">Phone Number: <?=$ep['ep_phonenumber'];?>
    <p class="card-text">Business email:<?=$ep['ep_businessemail'];?></p> 
    <p class="card-text">Nationality:<?=$ep ['ep_nationality'];?></p>
    <p class="card-text">Gender:<?=$ep ['ep_gender'];?></p> 
    <p class="card-text">Date of Birth:<?=$ep ['ep_dob'];?></p> 
    <p class="card-text">Job title:<?=$ep ['ep_jobtitle'];?></p>  
    <a href="<?=base_url();?>internal/admin_panel/Admin_dashboard/users_accounts_nav" class="btn btn-primary">Back</a>
  </div>
</div>
        </div>
    </div>
</div>