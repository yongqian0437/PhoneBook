<?php $title?> 
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
  <div class="card-header">
    <b>Detail of Education Partner</b>
  </div>
  <div class="card-body">
    <p class="card-title">Education Partner ID: <?=$ac['ac_id'];?></p>
    <p class="card-title">Phone Number: <?=$ac['ac_phonenumber'];?>
    <p class="card-text">Business email:<?=$ac['ac_businessemail'];?></p> 
    <p class="card-text">Gender:<?=$ac['ac_university'];?></p> 
    <p class="card-text">Nationality:<?=$ac['ac_nationality'];?></p>
    <p class="card-text">Gender:<?=$ac['ac_gender'];?></p> 
    <p class="card-text">Date of Birth:<?=$ac ['ac_dob'];?></p> 
    <p class="card-text">Document:<?=$ac ['ac_document'];?></p>  
    <a href="<?=base_url();?>internal/admin_panel/Admin_dashboard/users_accounts_nav" class="btn btn-primary">Back</a>
  </div>
</div>
        </div>
    </div>
</div>