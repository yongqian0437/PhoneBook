<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="main_content" style="background-color: #fafafa">    
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 pt-3">
            <h1 class="h3 mb-0 text-gray-800">Chat Room</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- FIRST CARD -->
            <div class="col-xl-12 col-lg-12" id="chat_section">
                <div class="card mb-4">

                    <!-- Card Header -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #dbe7e4">
                        <h6 class="m-0 font-weight-bold" id="receiver_name" style="color: #595959">Select someone to chat</h6> <!--<php echo $chat_title; ?>-->
                        <span title="Clear Chat" class="clear_chat"><i class="fas fa-trash"></i></span>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Direct Chat-->
                        <div class="direct-chat direct-chat-primary">
        
                                <!--Conversations are loaded here-->
                                <div class="direct-chat-messages" id="content">
                                    <div id="dump_content"></div>
                                </div>

                            <hr>

                                <!--<form action="#" method="post">-->
                                <div class="input-group">
                                    <?php
                                    $obj = &get_instance();
                                    $obj->load->model('user_model');
                                    $user = $obj->user_model->get_user_data(); // check in model
                                    // var_dump($user);
                                    // die;
                                    ?>

                                    <input type="hidden" id="sender_name" value="<?= $user['user_fname'] ?>">
                                    <input type="hidden" id="sender_pic" value="<?= $profile_pic; ?>">

                                    <input type="hidden" id="receiver_id">

                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Type Message..."
                                            aria-label="Search" aria-describedby="basic-addon2" name="message" id="message">

                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-flat btn_send" id="nav_down">Send</button>
                                        <div class="fileDiv btn btn-info btn-flat"><i class="fa fa-upload"></i>
                                            <input type="file" name="file" class="upload_attachment" />
                                        </div>                                    
                                    </span>
                                </div>
                                <!--</form>-->
                                
                        </div>
                        <!-- /.direct-chat-->
                        <!--direct chat ends-->

                    </div>
                    <!--card-body end is above me-->

                </div>
            </div>
            <!--chat section ends-->
        </div>

        <div class="row">
            <!-- SECOND CARD -->
            <div class="col-xl-12 col-lg-12">
                <div class="card mb-4">

                    <!-- Card Header -->
                    <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All contacts</h6> -->
                    
                        <!-- Card Header - Accordion -->
                        <a href="#collapse_card" class="d-block card-header py-3 d-flex flex-row align-items-center justify-content-between" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapse_card" style="background-color: #dbe7e4">
                            <h6 class="m-0 font-weight-bold" style="color: #595959">All Contacts</h6>
                            <span>&nbsp</span>
                                <!-- Display number of users on top. Ex: ~2 Students~ ~3 Employers~ -->
                                <span class="label label-danger font-weight-bold" style="background-color: #57cc99; color: #FFFFFF; padding: 5px"><?php if ($this->session->userdata['user_role'] == 'Student') {
                                                                                    echo count($userslist) . ' ';
                                                                                    echo $sub_title; ?> </span>
                                <span>&nbsp</span>
                                <span  class="label label-danger" style="background-color: #FFFFFF"><?php echo count($userslist2) . ' ';
                                                                        echo $sub_title2; } 
                                                                        else { echo count($userslist) . ' ';
                                                                        echo $sub_title; } ?>
                                </span>
                        </a>
                        
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapse_card">
                            <div class="card-body">
                                <div class="table-reponsive">
                                    <table class="table table-bordered dt-bootstrap4" id="chat_table"> 

                                        <!-- Display different table with different columns if user logged in is a Student -->
                                        <?php if ($this->session->userdata['user_role'] == 'Student') { ?>

                                            <?php
                                                echo "<thead>";
                                                echo    "<tr>";
                                                echo        "<th>ID</th>";
                                                echo        "<th>First Name</th>";
                                                echo        "<th>Last Name</th>";
                                                echo        "<th>Role</th>";
                                                echo        "<th>Email</th>";
                                                echo    "</tr>";
                                                echo "</thead>";
                                                ?>

                                        <tbody>
                                            <?php if (!empty($userslist)) {
                                                foreach ($userslist as $user) : ?>
                                                    <tr>
                                                        <td class="select_user" id="<?php echo $user['user_id']; ?>" title="<?php echo $user['user_fname'] . ' ' .$user['user_lname'];  ?>">
                                                            <a href="#"><?php echo $user['user_id']; ?></a></td>
                                                        <td><?php echo $user['user_fname']; ?></td>                                     
                                                        <td><?php echo $user['user_lname']; ?></td>                                   
                                                        <td><?php echo $user['user_role']; ?></td>
                                                        <td><?php echo $user['ac_businessemail']; ?></td>
                                                    </tr>
                                                <?php endforeach;
                                            }

                                            if (!empty($userslist2)) {
                                                foreach ($userslist2 as $user2) : ?>
                                                    <tr>
                                                        <td class="select_user" id="<?php echo $user2['user_id']; ?>" title="<?php echo $user2['user_fname'] . ' ' .$user2['user_lname'];  ?>">
                                                            <a href="#"><?php echo $user2['user_id']; ?></a></td>
                                                        <td><?php echo $user2['user_fname']; ?></td>                                        
                                                        <td><?php echo $user2['user_lname']; ?></td>                                   
                                                        <td><?php echo $user2['user_role']; ?></td>
                                                        <td><?php echo $user2['e_businessemail']; ?></td>
                                                    </tr>
                                                <?php endforeach;
                                            }

                                        // Display different table with different columns if user logged in is an Employer or AC
                                        } else { ?>
                                            <?php
                                                echo "<thead>";
                                                echo    "<tr>";
                                                echo        "<th>ID</th>";
                                                echo        "<th>First Name</th>";
                                                echo        "<th>Last Name</th>";
                                                echo        "<th>Field of Interest</th>";
                                                echo        "<th>Current Level</th>";
                                                echo    "</tr>";
                                                echo "</thead>";
                                                ?>
                                            <?php if (!empty($userslist)) {
                                                foreach($userslist as $user): ?>
                                                    <tr>
                                                        <td class="select_user" id="<?php echo $user['user_id']; ?>" title="<?php echo $user['user_fname'] . ' ' .$user['user_lname'];  ?>">
                                                            <a href="#"><?php echo $user['user_id']; ?></a></td>
                                                        <td><?php echo $user['user_fname']; ?></td>                                      
                                                        <td><?php echo $user['user_lname']; ?></td>                                   
                                                        <td><?php echo $user['student_interest']; ?></td>
                                                        <td><?php echo $user['student_currentlevel']; ?></td>
                                                    </tr>
                                                <?php endforeach;
                                            } 
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- ./table-responsive -->
                            </div>
                            <!-- ./card-body -->
                        </div>
                        <!-- ./collapse_card -->



                    <!-- </div> -->
                    <!-- End of card header -->

                    <!-- Card Body -->
                    <!-- <div class="card-body">

                    replaced by card content - collapse

                    </div> -->
                    <!-- End of card body -->


                </div>
                <!-- End of card -->
            </div>
            <!-- End of second card col -->
            
        </div>
        <!-- End of Row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->