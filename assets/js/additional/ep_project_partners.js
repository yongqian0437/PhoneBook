$(document).ready(function(){
    $("#table_project_partners").DataTable({
        //make table responsive
        "bAutoWidth":false,
        ajax: {
            url: base_url + "internal/level_2/educational_partner/Ep_rd_applicants/project_partners_list",
            type: "GET",
        },
        "columnDefs": [{
            "width": "5%",
            "targets": [0]
        },
        {
            "width": "15%",
            "targets": [1]
        },
        ]
    });

}); // end of ready function


function view_project_partners(rd_applicant_id){

    $.ajax({
        url: base_url + "internal/level_2/educational_partner/Ep_rd_applicants/view_project_partners",
        method:"POST",
        data:{ rd_applicant_id:rd_applicant_id},
        success:function(data)
        {
            $('#project_partner_information').html(data);

        }
    });
}