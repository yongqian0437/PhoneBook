$(function () {
    // To apply for a specific EP
    $('.apply_emp').click(function () {
        var ep_id = $(this).data('id');
        // Ask user for confirmation
        swal({
                title: "Confirm application?",
                text: "This application will be submitted to the employer.\nUpon reviewal, you will be contacted.",
                icon: "info",
                buttons: ['Cancel', 'Confirm']
            })
            // Send application into db once confirmed
            .then((send_application) => {
                if (send_application) {
                    $.ajax({
                        url: 'Employer_projects/send_emp_application/',
                        type: 'post',
                        data: {ep_id: ep_id},
                        success: function() { 
                            swal({
                                title: "Thank you!",
                                text: "Your application has been submitted.",
                                icon: "success",
                            })
                            .then((send_application) => {
                                location.reload();
                            });
                        }
                    });
                }
            });
    });
});

function view_emp(emp_id){

    $.ajax({
        url: base_url + "external/Employer_projects/fetch_emp_information",
        method:"POST",
        data:{ emp_id:emp_id},
        success:function(data)
        {
            $('#emp_information').html(data);
        }
    });
}