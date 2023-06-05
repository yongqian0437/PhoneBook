toastr.options = {
    "progressBar": true,
    "positionClass": "toast-bottom-center",
    "preventDuplicates": true,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

$(document).ready(function () {

    //Update email_notification and notification time whenever the input is changed
    $('#check_notification, #hoursDropdown').change(function () {
        // Code to be executed when the checkbox or select value changes
        var isChecked = $('#check_notification').is(':checked');
        var selectedHour = $('#hoursDropdown').val();
        var email_notification;
        if (isChecked) {
            email_notification = 1;
        }
        else {
            email_notification = 0;
        }

        $.ajax({
            url: base_url + "user/profile/update_notfication_settings",
            type: 'POST',
            data: {
                email_notification: email_notification,
                notification_time: selectedHour,
            },
            dataType: 'json',
            success: function (response) {
                // Handle the response
                if (response.success) {
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Update error, please try again',
                })
            }
        });
    });

    $('#copy_link').click(function () {

        var button = $('#copy_link');
        var invite_code = button.data('id');

        var linkToCopy = base_url + "user/Auth/registration/" + invite_code; // Replace with your desired link
        navigator.clipboard.writeText(linkToCopy)
            .then(function () {

                var button = $('#copy_link');
                var originalText = button.text();
                var originalIcon = button.find('i').attr('class');

                // Change the text and icon of the button
                button.html('<i class="fas fa-check pr-2"></i>Copied');

                // Set a timeout to change the text and icon back after 3 seconds
                setTimeout(function () {
                    button.html('<i class="' + originalIcon + ' pr-2"></i>' + originalText);
                }, 3000);
            })
            .catch(function (error) {
                console.error('Failed to copy link: ', error);
            });
    });

});

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
                    success: function (response) {
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
                    error: function (xhr, status, error) {
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

function update_password(event) {

    event.preventDefault();
    var old_password = $('#old_password').val();
    var user_password = $('#user_password').val();
    var confirm_password = $('#confirm_password').val();

    //check if old_password matches
    $.ajax({
        url: base_url + "user/profile/check_password",
        type: 'POST',
        data: { user_password: old_password },
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
                //check password and confirm password matches
                if (user_password === confirm_password) {
                    event.target.form.submit();
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Confirm password does not match password',
                    })
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Wrong old password!',
                })
            }
        }
    });

}