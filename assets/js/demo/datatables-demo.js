// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTable').DataTable();

  $('table.display').DataTable({
    "lengthMenu": [10, 25, 50, 100],
  });


  $('#all_users_table').DataTable({
    "lengthMenu": [10, 25, 50, 100],
    "scrollX": true,
  });


  $('#activated_table').DataTable({
    "lengthMenu": [10, 25, 50, 100],
    "scrollX": true,

  });

  $('#inactivate_table').DataTable({
    "lengthMenu": [10, 25, 50, 100],
    "scrollX": true,

  });

  $('#chat_table').DataTable({
    "lengthMenu": [5, 10, 25, 50],
    // "bInfo": false, // show x of y 
    //"paging": false,
    // "ordering": false,
    // "columnDefs": [{
    //   "width": "5%",
    //   "targets": [0]
    // }]
  });

});

