$(document).ready(function(){
    $("#table_admin_rd_project_app").DataTable({
        //make table responsive
        "bAutoWidth":false,
        ajax: {
            url: base_url + "internal/admin_panel/applicants/Admin_rd_app/admin_rd_project_app_list",
            type: "GET",
        }
    });

}); // end of ready function

function view_rd_project(rd_applicant_id){

    $.ajax({
        url: base_url + "internal/admin_panel/applicants/Admin_rd_app/view_admin_rd_project_app",
        method:"POST",
        data:{ rd_applicant_id:rd_applicant_id},
        success:function(data)
        {
            $('#admin_rd_project_app_information').html(data);

        }
    });
}