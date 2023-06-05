function confirm_edit(event) {
    event.preventDefault();

    var user_fname = $('#user_fname').val();
    var user_lname = $('#user_lname').val();
    var user_email = $('#user_email').val();
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (user_fname === '' || user_lname === '' || user_email === '') {
        Swal.fire({
            icon: 'error',
            title: 'Please fill in all fields',
        })
    } else if (!emailPattern.test(user_email)) {
        Swal.fire({
            icon: 'error',
            title: 'Please provide a proper email',
        })
    } else {
        //Edit profile confirmation message
        Swal.fire({
            text: 'Are you sure you want edit your details?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            //if user confirms
            if (result.isConfirmed) {


                $.ajax({
                    url: base_url + "user/profile/edit_profile",
                    type: 'POST',
                    data: {
                        user_fname: user_fname,
                        user_lname: user_lname,
                        user_email: user_email
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Handle the response
                        if (response.success) {
                            event.target.form.submit();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Update failed, please try again',
                            })
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Update failed, please try again',
                        })
                    }
                });
            }
        })
    }
}