$(document).ready(function(){
    $("#table_university").DataTable({
        "bInfo" : false,
        ajax: {
            url: base_url + "external/universities/universities_list",
            type: "GET",
        },
        // "columnDefs": [{
        //     "width": "10%",
        //     "targets": [0,1,2,3]
        // },]
    });

    //Styling for search bar in datatables
    $('.dataTables_filter input[type="search"]').
     attr('placeholder','Search University').
    css({'width':'350px', 'height':'40px', 'font-size':'17px', 'margin-bottom':'30px', 'margin-right':'40px', 'display':'inline-block'});

    //Styling for pagination in datatables
    $('.dataTables_length').
    css({'margin-top':'20px', 'display':'inline-block'});

}); // end of ready function