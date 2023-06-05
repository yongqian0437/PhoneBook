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
                                                <a class="nav-link custom_nav" id="tab3" data-toggle="pill" href="#invitefriend"><i class="fas fa-bell pr-3"></i>Invite a friend</a>
                                            </li>
                                        </ul>
                                        <div style="height:100px"></div>
                                    </div>
                                    <div class="col-md-8 column-padding py-4 px-5">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="accounts">
                                                <h3 class="font-weight-bold">General Info</h3>
                                                <div class="row pt-4">
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
                                                    <button type="button" class="btn btn-success" style="float:right; width:auto;" data-toggle="modal" data-target="#edit_user"><i class="fas fa-pen pr-2"></i>Edit</button>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="password">
                                                <h3 class="font-weight-bold">Password</h3>
                                                <p>Display profile settings here...</p>
                                            </div>
                                            <div class="tab-pane fade" id="notification">
                                                <h3 class="font-weight-bold">Notification</h3>
                                                <p>Display profile preferences here...</p>
                                            </div>
                                            <div class="tab-pane fade" id="invitefriend">
                                                <h3 class="font-weight-bold">Invite a friend</h3>
                                                <p>Display profile preferences here...</p>
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