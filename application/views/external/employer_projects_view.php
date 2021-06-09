<!-- Jquery plugin -->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    $(function () {
        // To apply for a specific RDP
        $('.apply_rdp').click(function () {
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
                            url: 'Employer_projects/send_rdp_application/',
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
</script>

<!-- Top Navigation -->
<?php $this->load->view('external/templates/topnav');?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="flex-fill">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800 pt-4 px-4 pb-2 font-weight-bold">Employer Projects</h1>
                    <p class="mb-4 px-4" style="text-align: justify;">To provide students the opportunity to gain real, hands-on work experience while still studying, 
                    INTI has built close ties with the industry to develop employer projects – a programme that enables students to work 
                    on actual business case studies and industry-relevant problems. Through these projects, students are presented with 
                    immediate challenges faced by businesses, and are required to work together in teams to develop and present their proposals.
                    Through these projects, students are presented with immediate challenges faced by businesses, and are required to work together
                    in teams to develop and present their proposals.</p> <!-- Edit description later -->

                    <div class="px-4 pb-4">
                        <hr style=" width :100%; height:2px; background-color:#EAF4F4">
                        <p class="pt-2 font-weight-bold"><i>*To apply for an EP or view further details of the project, you are required to be logged in to the system or register for an account if you don't have one yet.</i></p>
                    </div>

                    <!-- Content Row. 1 row = 3 cards -->
                    <div class="row px-4">

                    <!-- <php foreach ($eps as $ep): var_dump($ep); ?> hello <br><br> <php endforeach; die;?> -->

                        <?php foreach ($eps as $ep): ?>
                            <div class="col-lg-4 mb-4">
                                <div class="card mb-4 h-100"> <!-- h-100 to make cards same height despite some content being lesser than some-->
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold company_name"><?= $ep['c_name']?></h6>
                                    </div>
                                    <div class="card-body" >
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list_class">
                                            <img class="img-fluid img_class" src="<?= base_url("assets/img/company_logos/{$ep['c_logo']}");?>" width="300";/>
                                                <h6><b>Project Title: <?= $ep['emp_title']?></b></h6>
                                            </li>
                                            <li class="list-group-item" >
                                                <table>
                                                    <tr>
                                                        <th>Level: </th>
                                                        <td><?= $ep['emp_level']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Field: </th>
                                                        <td><?= $ep['emp_area']?></td>
                                                    </tr>
                                                </table>
                                            </li>
                                            <li class="list-group-item">
                                                <span style="text-align: justify"><?= $ep['emp_description'] ?></span>
                                            </li>
                                        </ul>
                                        <br>

                                        <!-- 2 Bottom Buttons -->
                                        <div class="bottom_buttons">

                                            <!-- *Check if session is established and if the role is a Student. If yes, show the 'View' and 'Apply Now' button -->
                                            <?php if ($user_role == 'Student') { ?> 
                                                <!-- 'View' button becomes visible once student is logged in -->
                                                <a class="btn view_doc" href="<?=base_url('assets/uploads/employer_projects/'.$ep['emp_document'])?>" role="button" target="_blank" style="background-color: #8993a3; color:#FFFFFF">View</a>

                                                <!-- **Check if student has already applied to this specific EP. If yes, disable the apply button -->
                                                    <?php $response = $this->emp_applicants_model->past_application($ep['emp_id'], $student_id);
                                                        if ($response == true) { ?>
                                                            <button type="button" class="btn applied_emp" disabled>Applied</button>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn apply_emp" data-id="<?= $ep['emp_id'] ?>">Apply Now</button>
                                                    <?php } ?>
                                                
                                                <?php } else { ?>
                                        
                                                <!-- ***If Student is not logged in, 'Apply Now' button will redirect to Login page -->   
                                                    <a class="btn apply_reg" href="<?= base_url('user/login/Auth/login');?>">Apply Now</a>

                                                <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /.content -->
