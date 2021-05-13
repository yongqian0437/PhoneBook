<?php $title?> 
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
  <div class="card-header">
    <b>Detail of Employer</b>
  </div>
  <div class="card-body">
    <p class="card-title">Employer ID: <?=$e['e_id'];?></p>
    <p class="card-title">Phone Number: <?=$e['e_phonenumber'];?>
    <p class="card-text">Business email:<?=$e['e_businessemail'];?></p> 
    <p class="card-text">Nationality:<?=$e['e_nationality'];?></p>
    <p class="card-text">Gender:<?=$e['e_gender'];?></p> 
    <p class="card-text">Date of Birth:<?=$e['e_dob'];?></p> 
    <p class="card-text">Document:<?=$e['e_document'];?></p> 
    <p class="card-text">Jobtitle:<?=$e['e_jobtitle'];?></p>  
    <a href="<?=base_url();?>internal/admin_panel/Admin_dashboard/users_accounts_nav" class="btn btn-primary">Back</a>
  </div>
</div>
        </div>
    </div>
</div>