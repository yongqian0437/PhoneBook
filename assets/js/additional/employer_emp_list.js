$(document).ready(function(){
    $("#table_emps").DataTable({
        //make table responsive
        "bAutoWidth":false,
        ajax: {
            url: base_url + "internal/level_2/employer/employer_emps/emp_list",
            type: "GET",
        },
        "columnDefs": [{
            "width": "18%",
            "targets": [6]
        }
        ]
    });

}); // end of ready function

// function delete_course(course_id){

//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'
//       }).then((result) => {
//         if (result.isConfirmed) {

//             $.ajax({
//                 url: base_url + "internal/level_2/educational_partner/ep_courses/delete_course",
//                 method:"POST",
//                 data:{ course_id:course_id},
//                 success:function(data)
//                 {
//                     Swal.fire(
//                         'Deleted!',
//                         'Course has been deleted.',
//                         'success'
//                     )

//                     //reload datatable
//                     var xin_table = $("#table_courses").DataTable();
//                     xin_table.ajax.reload(null, false);
//                 }
//             });
          
//         }
//       })
// }

function view_emp(emp_id){

    $.ajax({
        url: base_url + "internal/level_2/employer/employer_emps/view_emp",
        method:"POST",
        data:{ emp_id:emp_id},
        success:function(data)
        {
            $('#emp_information').html(data);

        }
    });
}