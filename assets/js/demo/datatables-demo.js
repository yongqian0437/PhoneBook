// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();

  $('table.display').DataTable({
    "lengthMenu": [ 5, 10, 25, 50],
  });


  $('#all_users_table').DataTable({
    "lengthMenu": [ 5, 10, 25, 50],
    "columnDefs": [{
      "width": "11%",
      "targets": [4]
    }]
  });

  $('#chat_table').DataTable({
    "lengthMenu": [ 5, 10, 25, 50],
    // "bInfo": false, // show x of y 
    //"paging": false,
    // "ordering": false,
    // "columnDefs": [{
    //   "width": "5%",
    //   "targets": [0]
    // }]
  });
  
});
