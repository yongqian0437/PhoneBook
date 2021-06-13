$(document).ready(function () {

    document.getElementById("all_users").style.color = "black";

    // ALL Users
    $("#table_all_users").DataTable({
        //make table responsive
        "bAutoWidth": false,
        ajax: {
            url: base_url + "internal/admin_panel/Admin_dashboard/all_users_list",
            type: "GET",
        },
    });

    // Active Users
    $("#table_active_users").DataTable({
        //make table responsive
        "bAutoWidth": false,
        ajax: {
            url: base_url + "internal/admin_panel/Admin_dashboard/active_users_list",
            type: "GET",
        },

    });

    // Inactive Users
    $("#table_inactive_users").DataTable({
        //make table responsive
        "bAutoWidth": false,
        ajax: {
            url: base_url + "internal/admin_panel/Admin_dashboard/inactive_users_list",
            type: "GET",
        },

    });

    $('#select_all_active_users').click(function () {
        var checked = this.checked;
        $('input[type="checkbox"]').each(function () {
            this.checked = checked;
        });
    })

    $('#select_all_inactive_users').click(function () {
        var checked = this.checked;
        $('input[type="checkbox"]').each(function () {
            this.checked = checked;
        });
    })
}); // end of ready function


function inactive_users_tab() {
    $('#all_users').hide();
    $('#active_users').hide();
    $('#inactive_users').show();
}

function all_users_tab() {
    $('#inactive_users').hide();
    $('#active_users').hide();
    $('#all_users').show();
}

function active_users_tab() {
    $('#all_users').hide();
    $('#inactive_users').hide();
    $('#active_users').show();
}

function view_user(user_id) {
    $.ajax({
        url: base_url + "internal/admin_panel/Admin_dashboard/view_user",
        method: "POST",
        data: { user_id: user_id },
        success: function (data) {
            $('#user_information').html(data);

        }
    });


}

// function next_page(user_id) {
//     $.ajax({
//         url: base_url + "internal/admin_panel/Admin_dashboard/view_uni",
//         method: "POST",
//         data: { user_id: user_id },
//         success: function (data) {
//             $('#user_information').html(data);

//         }
//     });
// }


// activate 1 User
function activate_user(user_id) {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approve it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url + "internal/admin_panel/Admin_dashboard/activate_user",
                method: "POST",
                data: { user_id: user_id },
                success: function (data) {
                    Swal.fire(
                        'Activated!',
                        'Account of user has been activated.',
                        'success'
                    )

                    //reload both datatables
                    var xin_table = $("#table_inactive_users").DataTable();
                    xin_table.ajax.reload(null, false);

                    var xin_table2 = $("#table_all_users").DataTable();
                    xin_table2.ajax.reload(null, false);

                    var xin_table = $("#table_active_users").DataTable();
                    xin_table.ajax.reload(null, false);
                }
            });
        }
    })
}


// deactivate 1 User
function deactivate_user(user_id) {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approve it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url + "internal/admin_panel/Admin_dashboard/deactivate_user",
                method: "POST",
                data: { user_id: user_id },
                success: function (data) {
                    Swal.fire(
                        'Deactivated!',
                        'Account of user has been deactivated.',
                        'success'
                    )

                    //reload both datatables
                    var xin_table = $("#table_inactive_users").DataTable();
                    xin_table.ajax.reload(null, false);

                    var xin_table2 = $("#table_all_users").DataTable();
                    xin_table2.ajax.reload(null, false);

                    var xin_table = $("#table_active_users").DataTable();
                    xin_table.ajax.reload(null, false);
                }
            });
        }
    })
}

// Activate >1 User
function activate_all_users() {

    if ($('input[type=checkbox]').is(':checked')) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $('input[type=checkbox]:checked').each(function () {
                    //alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
                    $user_id = $(this).val();

                    $.ajax({
                        url: base_url + "internal/admin_panel/Admin_dashboard/activate_user",
                        method: "POST",
                        data: { user_id: $user_id },

                    });
                });

                if ($('input[type=checkbox]').is(':checked')) {
                    Swal.fire(
                        'Approved!',
                        'Accounts of users have been approved.',
                        'success'
                    )

                    //reload both datatables
                    var xin_table = $("#table_inactive_users").DataTable();
                    xin_table.ajax.reload(null, false);

                    var xin_table2 = $("#table_all_users").DataTable();
                    xin_table2.ajax.reload(null, false);

                    var xin_table = $("#table_active_users").DataTable();
                    xin_table.ajax.reload(null, false);
                }
            }
        })
    }
}


function deactivate_all_users() {

    if ($('input[type=checkbox]').is(':checked')) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $('input[type=checkbox]:checked').each(function () {
                    //alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
                    $user_id = $(this).val();

                    $.ajax({
                        url: base_url + "internal/admin_panel/Admin_dashboard/deactivate_user",
                        method: "POST",
                        data: { user_id: $user_id },

                    });
                });

                if ($('input[type=checkbox]').is(':checked')) {
                    Swal.fire(
                        'Approved!',
                        'Accounts of users have been approved.',
                        'success'
                    )

                    //reload both datatables
                    var xin_table = $("#table_inactive_users").DataTable();
                    xin_table.ajax.reload(null, false);

                    var xin_table2 = $("#table_all_users").DataTable();
                    xin_table2.ajax.reload(null, false);

                    var xin_table = $("#table_active_users").DataTable();
                    xin_table.ajax.reload(null, false);
                }
            }
        })
    }
}