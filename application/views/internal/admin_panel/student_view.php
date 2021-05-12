<div class="container">
<div class="row">
<div class="col-md-6">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Student ID</th>
      <th scope="col">User ID</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Nationality</th>
      <th scope="col">Gender</th>
      <th scope="col">DOB</th>
      <th scope="col">Interest</th>
      <th scope="col">Study Level</th>
    </tr>
  </thead>
  <tbody>
  <?php
foreach($studentlist->result() as $student)
  echo "<tr>"
      ."<td>$student->student_id</td>"
      ."<td>$student->user_id</td>"
      ."<td>$student->student_phonenumber</td>"
      ."<td>$student->student_nationality</td>"
      ."<td>$student->student_gender</td>"
      ."<td>$student->student_dob</td>"
      ."<td>$student->student_interest</td>"
      ."<td>$student->student_currentlevel</td>" 
      ."</tr>"
 
?>
</tbody>
</table>


</div>
</div>
</div>