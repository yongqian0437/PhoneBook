<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<style>
    .custom_nav:hover {
        background-color: #cce3de;
        border-radius: 20px;
    }

    .custom_nav {
        color: black !important;
        font-size: 1.1rem;
        font-weight: 600 !important;
    }

    .user-pic-small {
        height: 150px;
        width: 150px;
    }

    .custom_nav.active {
        background-color: #6b9080 !important;
        border-radius: 20px;
        color: white !important;
    }

    .capitalize-initials {
        text-transform: capitalize;
    }

    .capitalize-initials:first-letter {
        text-transform: uppercase;
    }

    .no-gutters {
        /* margin-top: 0;
        margin-bottom: 0;
        padding-top: 0;
        padding-bottom: 0; */
        padding: 0;
        margin: 0;
    }


    .custom-border {
        border-right: 2px solid lightgrey;
    }

    .container-fluid {
        padding-left: 200px;
        /* Adjust the desired left padding size */
        padding-right: 200px;
    }

    .share_icon {
    text-decoration: none;
  }
</style>

<!-- Set base url to javascript variable-->
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>

<!-- Top Navigation -->
<?php $this->load->view('templates/topnav'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid pb-5" style="background-color:white;">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-2 px-4 pt-3">
                        <h1 class="h3 mb-0 text-gray-800 pt-4 font-weight-bold">Profile Settings</h1>
                    </div>
                    <div class="pb-2 px-4" style="text-align: justify; font-weight:500;">
                        Change your profile and account settings
                    </div>
                    <div class="col-12 pt-4">

                        <div class="card shadow no-gutters">
                            <div class="card-body no-gutters">
                                <div class="row no-gutters px-2">
                                    <div class="col-md-4 custom-border column-padding py-4 px-3">
                                        <div class="pb-3 text-center">
                                            <img class="user-pic-small " src="<?= base_url('assets/img/chat_user/profile_pic.png'); ?>">
                                        </div>
                                        <div class="capitalize-initials px-auto pb-5" style="font-weight:700; font-size:1.5rem; text-align: center;">
                                            <?= $user_data->user_fname ?>
                                            <?= $user_data->user_lname ?>
                                        </div>
                                        <ul class="nav nav-pills flex-column" id="profileTabs">
                                            <li class="nav-item">
                                                <a class="nav-link custom_nav active" id="tab1" data-toggle="pill" href="#accounts"><i class="fas fa-user pr-3"></i> Accounts</a>
                                            </li>
                                            <li class="nav-item one">
                                                <a class="nav-link custom_nav" id="tab2" data-toggle="pill" href="#password"><i class="fas fa-lock pr-3"></i>Passwords</a>
                                            </li>
                                            <li class="nav-item one">
                                                <a class="nav-link custom_nav" id="tab3" data-toggle="pill" href="#notification"><i class="fas fa-bell pr-3"></i>Notification</a>
                                            </li>
                                            <li class="nav-item one">
                                                <a class="nav-link custom_nav" id="tab4" data-toggle="pill" href="#invitefriend"><i class="fas fa-share pr-3"></i>Invite a friend</a>
                                            </li>
                                        </ul>
                                        <div style="height:100px"></div>
                                    </div>
                                    <div class="col-md-8 column-padding py-4 px-5">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="accounts">
                                                <h3 class="font-weight-bold">General Info</h3>
                                                <div class="row pt-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="user_fname" style="font-weight: 700;">FIRST NAME</label>
                                                            <input type="text" class="form-control" style="border: none;" value="<?= $user_data->user_fname ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="user_lname" style="font-weight: 700;">LAST NAME</label>
                                                            <input type="text" class="form-control" style="border: none;" value="<?= $user_data->user_lname ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pt-2">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="user_email" style="font-weight: 700;">EMAIL</label>
                                                            <input type="email" class="form-control" style="border: none;" value="<?= $user_data->user_email ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pt-4 ">
                                                    <button type="button" class="btn btn-success" style="float:right; width:auto;" data-toggle="modal" data-target="#edit_user"><i class="fas fa-pen pr-2"></i>Edit Details</button>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="password">
                                                <h3 class="font-weight-bold">Update Password</h3>

                                                <form method="post" action=" <?= base_url('user/profile/update_password'); ?>">
                                                    <div class="row pt-5 pb-4">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="old_password" style="font-weight: 700;">OLD PASSWORD</label>
                                                                <input type="password" class="form-control" id="old_password" name="old_password" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="user_password" style="font-weight: 700;">NEW PASSWORD</label>
                                                                <input type="password" class="form-control" id="user_password" name="user_password" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="confirm_password" style="font-weight: 700;">CONFIRM PASSWORD</label>
                                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" onclick="update_password(event)" class="btn btn-success" style="float:right; width:auto;"><i class="fas fa-check pr-2"></i>Edit Password</button>
                                                </form>

                                            </div>
                                            <div class="tab-pane fade" id="notification">
                                                <h3 class="font-weight-bold">Notification</h3>
                                                <div class="col-md-4 pt-5">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="check_notification" style="width: 20px; height: 20px;" <?php if ($user_data->email_notification) {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } ?>>
                                                        <label class="form-check-label pl-2" for="check_notification" style="font-weight: 600; font-size:1.2rem;">
                                                            Email reminder
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pt-4">
                                                    <div class="form-group">
                                                        <label for="hoursDropdown" style="font-weight: 600; font-size:1.2rem;">Select Hour:</label>
                                                        <select class="form-control" id="hoursDropdown">
                                                            <?php
                                                            $selectedHour = $user_data->notification_time;
                                                            for ($hour = 8; $hour <= 24; $hour++) {
                                                                $displayHour = ($hour > 12) ? ($hour - 12) : $hour;
                                                                $amPm = ($hour >= 12) ? 'PM' : 'AM';
                                                                $selected = ($hour == $selectedHour) ? 'selected' : '';
                                                                echo "<option value='$hour' $selected>$displayHour $amPm</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="invitefriend">
                                                <h3 class="font-weight-bold">Invite a friend</h3>
                                                <p>Invite your friend or family to register by sharing a link with your own personal code</p>
                                                <div class="row pt-4">
                                                    <div class="col-md-7">
                                                        <label for="myInput" class="col-form-label" style="font-weight: 600; font-size:1.1rem;">Number of people you invited:</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" value="<?= $user_data->invited_times ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="row pt-2 pb-2">
                                                    <div class="col-md-7">
                                                        <label for="myInput" class="col-form-label" style="font-weight: 600; font-size:1.1rem;">Your invite code:</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" value="<?= $user_data->invite_code ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="row pt-2 pb-2">
                                                    <div class="col-md-12">
                                                        <a class="share_icon" href="https://www.messenger.com/t/<PAGE_ID>?text=Learn%20more%20about%20dementia!%20<?php echo base_url('user/auth/registration/'.$user_data->invite_code); ?>" target="_blank">
                                                            <img src="<?php echo base_url('assets/img/about_us/instagram-logo.png'); ?>" alt="Share on Instagram" style="height: 2.1rem; width: 2.1rem;">
                                                        </a>

                                                        <a class="share_icon" href="https://web.whatsapp.com/send?text=Learn%20more%20about%20dementia!%20<?php echo base_url('user/auth/registration/'.$user_data->invite_code); ?>" target="_blank">
                                                            <img src="<?php echo base_url('assets/img/about_us/whatsapp_icon.png'); ?>" alt="Share on WhatsApp" style="height: 3.6rem; width: 3.6rem;">
                                                        </a>
                                                    </div>
                                                </div>

                                                <button id="copy_link" data-id="<?= $user_data->invite_code ?>" class="btn btn-success" style="float:left; width:auto;"><i class="fas fa-copy pr-2"></i>Copy Link</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Profile Modal -->
                    <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile Info</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- Profile form -->
                                <form method="post" action=" <?= base_url('user/profile'); ?>">
                                    <div class="modal-body">
                                        <div class="row pt-4 px-2">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="user_fname" style="font-weight: 700;">FIRST NAME</label>
                                                    <input type="text" class="form-control" id="user_fname" name="user_fname" value="<?= $user_data->user_fname ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="user_lname" style="font-weight: 700;">LAST NAME</label>
                                                    <input type="text" class="form-control" id="user_lname" name="user_lname" value="<?= $user_data->user_lname ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="user_email" style="font-weight: 700;">EMAIL</label>
                                                    <input type="email" class="form-control" id="user_email" name="user_email" value="<?= $user_data->user_email ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" onclick="confirm_edit(event)" class="btn btn-success" style="float:right; width:auto;"><i class="fas fa-check pr-2"></i>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- toast to notify link copied -->
                    <div class="toast position-fixed mx-auto" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                        <div class="toast-header">
                            <strong class="mr-auto">Copied Link!</strong>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Check if session is set. If yes, display message-->
            <?php if ($this->session->userdata('edit_profile_success')) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: 'Your details has been updated.'
                    })
                </script>
            <?php }
            $this->session->unset_userdata('edit_profile_success'); ?>

            <!-- Check if session is set. If yes, display message-->
            <?php if ($this->session->userdata('edit_password_success')) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: 'Your password has been updated.'
                    })
                </script>
            <?php }
            $this->session->unset_userdata('edit_password_success'); ?>