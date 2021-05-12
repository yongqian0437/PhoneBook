<div class="container">
<div class="row">
<div class="col-md-6">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Education Partner ID</th>
      <th scope="col">User ID</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Business email</th>
      <th scope="col">Nationality</th>
      <th scope="col">Gender</th>
      <th scope="col">DOB</th>
      <th scope="col">Job title</th>    
    </tr>
  </thead>
  <tbody>
  <?php
foreach($eplist->result() as $ep)
  echo "<tr>"
      ."<td>$ep->ep_id</td>"
      ."<td>$ep->user_id</td>"
      ."<td>$ep->ep_businessemail</td>"
      ."<td>$ep->ep_nationality</td>"
      ."<td>$ep->ep_gender</td>"
      ."<td>$ep->ep_dob</td>"
      ."<td>$ep->ep_jobtitle</td>" 
      ."</tr>"
?>

  </tbody>

  
</table>

</div>
</div>
</div>