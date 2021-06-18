// Call the dataTables jQuery plugin
$(document).ready(function () {
  var t = $('#dataTable').DataTable();

  t.on('order.dt search.dt', function () {
    t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
      cell.innerHTML = i + 1;
    });
  }).draw();

  $('table.display').DataTable({
    "lengthMenu": [10, 25, 50, 100],
  });


  $('#all_users_table').DataTable({
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

