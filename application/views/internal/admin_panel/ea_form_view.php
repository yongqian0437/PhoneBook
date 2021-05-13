<?php $title?> 
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
  <div class="card-header">
    <b>Detail of Education Agent</b>
  </div>
  <div class="card-body">
    <p class="card-title">Education Agent ID: <?=$ea['ea_id'];?></p>
    <p class="card-title">Phone Number: <?=$ea['ea_phonenumber'];?>
    <p class="card-text">Business email:<?=$ea['ea_businessemail'];?></p> 
    <p class="card-text">Nationality:<?=$ea ['ea_nationality'];?></p>
    <p class="card-text">Gender:<?=$ea ['ea_gender'];?></p> 
    <p class="card-text">Date of Birth:<?=$ea ['ea_dob'];?></p> 
    <p class="card-text">Document:<?=$ea ['ea_document'];?></p>  
    <a href="<?=base_url();?>internal/admin_panel/Admin_dashboard/users_accounts_nav" class="btn btn-primary">Back</a>
  </div>
</div>
        </div>
    </div>
</div>