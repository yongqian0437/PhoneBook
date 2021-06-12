$(document).ready(function(){
    $("#table_admin_courses").DataTable({
        //make table responsive
        "bAutoWidth":false,
        ajax: {
            url: base_url + "internal/admin_panel/content/Admin_courses/admin_courses_list",
            type: "GET",
        },
        "columnDefs": [{
            "width": "17%",
            "targets": [3]
        },
        {
            "width": "15%",
            "targets": [4]
        }
        ]
    });

}); // end of ready function

function view_admin_course(course_id){

    $.ajax({
        url: base_url + "internal/admin_panel/content/Admin_courses/view_admin_course",
        method:"POST",
        data:{ course_id:course_id},
        success:function(data)
        {
            $('#admin_course_information').html(data);

        }
    });
}