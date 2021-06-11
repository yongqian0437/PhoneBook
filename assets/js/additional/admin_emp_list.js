$(document).ready(function(){
    
document.getElementById("all_emps").style.color = "black";

// ALL Employer Projects
$("#table_all_emps").DataTable({
    //make table responsive
    "bAutoWidth":false,
    ajax: {
        url: base_url + "internal/admin_panel/content/admin_emps/all_emp_list",
        type: "GET",
    },
    // "columnDefs": [{
    //     "width": "18%",
    //     "targets": [5]
    // }
    // ]
});

// PENDING Employer Projects
$("#table_pending_emps").DataTable({
    //make table responsive
    "bAutoWidth":false,
    ajax: {
        url: base_url + "internal/admin_panel/content/admin_emps/pending_emp_list",
        type: "GET",
    },
    //"lengthMenu": [3, 5, 10],
});

$('#select_all_emp').click(function() {
    var checked = this.checked;
    $('input[type="checkbox"]').each(function() {
        this.checked = checked;
    });
})
}); // end of ready function


function pending_emps_tab() {
    $('#all_emps').hide();
    $('#pending_emps').show();
}

function all_emps_tab() {
    $('#pending_emps').hide();
    $('#all_emps').show();
}

function view_emp(emp_id) {
    $.ajax({
        url: base_url + "internal/admin_panel/content/admin_emps/view_emp",
        method:"POST",
        data:{ emp_id:emp_id},
        success:function(data)
        {
            $('#emp_information').html(data);

        }
    });
}

// Approve 1 EMP 
function approve_emp(emp_id){
    $.ajax({
        url: base_url + "internal/admin_panel/content/admin_emps/approve_emp",
        method:"POST",
        data:{emp_id:emp_id},
        success:function(data)
        {
            Swal.fire(
                'Approved!',
                'Employer Project has been approved.',
                'success'
            )

            //reload both datatables
            var xin_table = $("#table_pending_emps").DataTable();
            xin_table.ajax.reload(null, false);

            var xin_table2 = $("#table_all_emps").DataTable();
            xin_table2.ajax.reload(null, false);
        }
    });
}

// Approve >1 EMP
function approve_all_emps() {
    $('input[type=checkbox]:checked').each(function() {
        //alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
        $emp_id = $(this).val();

        $.ajax({
            url: base_url + "internal/admin_panel/content/admin_emps/approve_emp",
            method:"POST",
            data:{ emp_id:$emp_id},
        });
    });

    if($('input[type=checkbox]').is(':checked')){
        Swal.fire(
            'Approved!',
            'Employer Projects have been approved.',
            'success'
        )
    
        //reload both datatables
        var xin_table = $("#table_pending_emps").DataTable();
        xin_table.ajax.reload(null, false);
    
        var xin_table2 = $("#table_all_emps").DataTable();
        xin_table2.ajax.reload(null, false);
    }
}