$(document).ready(function(){
    $("#table_admin_emp_applicants").DataTable({
        //make table responsive
        "bAutoWidth":false,
        ajax: {
            url: base_url + "internal/admin_panel/applicants/admin_emp_applicants/all_emp_applicants_list",
            type: "GET",
        }
    });

}); // end of ready function

function view_emp_applicant(emp_applicant_id){

    $.ajax({
        url: base_url + "internal/admin_panel/applicants/admin_emp_applicants/view_emp_applicant",
        method:"POST",
        data:{ emp_applicant_id:emp_applicant_id},
        success:function(data)
        {
            $('#emp_applicant_information').html(data);

        }
    });
}