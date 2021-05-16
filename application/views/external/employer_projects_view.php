<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="flex-fill">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div style="background-color: green; display:block;">Navigation bar here<br><br><br></div>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800" style="color: #A4C3B2"><?= $title ?></h1>
                    <p class="mb-4">To provide students the opportunity to gain real, hands-on work experience while still studying, 
                    INTI has built close ties with the industry to develop employer projects – a programme that enables students to work 
                    on actual business case studies and industry-relevant problems.</p>

                    <!-- Content Row -->
                    <div class="row">

                        <?php foreach ($eps as $ep): ?>
                            <!-- First Column -->
                            <div class="col-lg-4 mb-4">
                                <!-- Custom Text Color Utilities -->
                                <div class="card shadow mb-4 h-100"> <!-- h-100 to make cards same height despite some content being lesser than some-->
                                    <div class="card-header py-3" style="background-color: #EAF4F4" >
                                        <h6 class="m-0 font-weight-bold" style="color: #6B9080"><?= $ep['c_name']?></h6>
                                    </div>
                                    <div class="card-body" style="text-align: center;">
                                        <img src="<?= base_url("assets/img/company_logos/{$ep['c_logo']}");?>" width="300" height="70" style="margin-bottom: 30px; "/>
                                        <!-- <div class="project_title"> -->
                                            <h6><strong>Project Title: <?= $ep['emp_title']?></strong></h6>
                                            <span>Level: <?= $ep['emp_level']?><br></span>
                                            <span>Area: <?= $ep['emp_area']?><br></span>
                                        <!-- </div> -->
                                        <span>Description: <?= $ep['emp_description'] ?></span>
                                        <br><br>
                                        <!--WIP-->
                                        <button type="button" class="btn" style="bottom: 0; background-color: #A4C3B2; color:#FFFFFF">View</button>
                                        <button type="button" class="btn" style="bottom: 0; background-color: #A4C3B2; color:#FFFFFF">Apply</button>
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