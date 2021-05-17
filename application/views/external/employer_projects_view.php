<!-- Will transfer styling in a separate css file later -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="flex-fill">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div style="background-color: green; display:block;">Navigation bar here<br><br><br></div> <!-- Remove this later -->
                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800"><?= $title ?></h1>
                    <p class="mb-4">To provide students the opportunity to gain real, hands-on work experience while still studying, 
                    INTI has built close ties with the industry to develop employer projects – a programme that enables students to work 
                    on actual business case studies and industry-relevant problems.</p> <!-- Edit description later -->

                    <!-- Content Row. 1 row = 3 cards -->
                    <div class="row">

                        <?php foreach ($eps as $ep): ?>
                            <div class="col-lg-4 mb-4">
                                <div class="card shadow mb-4 h-100"> <!-- h-100 to make cards same height despite some content being lesser than some-->
                                    <div class="card-header py-3" style="background-color: #EAF4F4" >
                                        <h6 class="m-0 font-weight-bold" style="color: #6B9080"><?= $ep['c_name']?></h6>
                                    </div>
                                    <div class="card-body" >
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item" style="text-align: center;">
                                            <img class="img-fluid" src="<?= base_url("assets/img/company_logos/{$ep['c_logo']}");?>" width="300" style="margin-bottom: 30px; "/>
                                                <h6><b>Project Title: <?= $ep['emp_title']?></b></h6>
                                            </li>
                                            <li class="list-group-item" >
                                                <table>
                                                    <tr>
                                                        <th style="vertical-align: top">Level: </th>
                                                        <td style="text-align: left;"><?= $ep['emp_level']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align: top">Area: </th>
                                                        <td style="text-align: left;"><?= $ep['emp_area']?></td>
                                                    </tr>
                                                </table>
                                            </li>
                                            <li class="list-group-item">
                                                <span style="text-align: left"><?= $ep['emp_description'] ?></span>
                                            </li>
                                        </ul>
                                        <br>
                                        <!-- 2 Bottom Buttons -->
                                        <div class="bottom-buttons" style="position: absolute; bottom: 0; right: 0; margin: 0px 10px 10px 0px">
                                            <button type="button" class="btn" style="background-color: #A4C3B2; color:#FFFFFF">View</button>
                                            <button type="button" class="btn" style="background-color: #A4C3B2; color:#FFFFFF">Apply</button>
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