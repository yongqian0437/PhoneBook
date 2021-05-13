$(document).ready(function(){
    $("#table_university").DataTable({
        "bInfo" : false,
        "ordering": false,
        ajax: {
            url: base_url + "external/universities/universities_list",
            type: "GET",
        },
        "columnDefs": [{
            "width": "15%",
            "targets": [4]
        },]
    });

    //Styling for search bar in datatables
    $('.dataTables_filter input[type="search"]').
     attr('placeholder','Search University').
    css({'width':'350px', 'height':'40px', 'font-size':'17px', 'margin-bottom':'30px', 'margin-right':'40px', 'display':'inline-block'});

    //Styling for pagination in datatables
    $('.dataTables_length').
    css({'margin-top':'20px', 'display':'inline-block'});

}); // end of ready function

function changeApproval(id){

    $.ajax({
        url: base_url + "external/Universities/switch_approval",
        method:"POST",
        data:{uni_id:id},
        success:function(data)
        {
            var xin_table = $("#table_university").DataTable();
            xin_table.ajax.reload();
        }
    });
    
}