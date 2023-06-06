<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    const database = "<?= $database ?>";
    var progress = <?= $quiz_data->progress ?>;
    var current_streak = <?= $quiz_data->max_streak ?>;
</script>


<!-- Styles-->
<style>
    html {
        scroll-behavior: smooth;
    }

    .progress-box {
        display: inline-block;
        border: 1px solid #ccc;
        padding: 3px;
        border-radius: 4px;
    }

    .progress-number {
        font-size: 1.4em;
        font-weight: bold;
    }

    .question_card_body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .question-card {

        position: relative;
        height: 150px;
        transition: transform 0.3s ease;
    }

    .icon-card {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 25px;
        height: 25px;
        background-color: #fff;
        transform: rotateX(20deg) rotateY(10deg);
        box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.4);
    }

    .question-body {
        display: flex;
        justify-content: center;
        align-items: center;
        /* Additional styles for the card body */
    }

    .question-card:hover {
        transform: scale(1.05);
        cursor: pointer;

    }
</style>

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
                <div style='background-color:white;' class="container-fluid">

                    <div class="row justify-content-md-center py-5">
                        <div class="col-md-8">

                            <div class="card shadow">
                                <div class="card-header">

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-2 pt-2" style="font-size: 1.2rem;"><i class="fas fa-fire pr-2" style="color:red;"></i>Streak:</label>
                                                <div class="progress flex-grow-1" style="height:35px;">
                                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 50%; " aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">2</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="progress-box">
                                                <span class="progress-number">2</span>/10
                                            </div>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <a id="leave_button" class="btn btn-danger"><i class="fas fa-arrow-left pr-2"></i>Leave</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body question_card_body text-center" style="height: 200px;">
                                    <h3 class="card-title" id="question">Questions</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card question-card" style="background-color: #347ac2; color:white;">
                                                <div class="icon-card text-center" style="background-color: #347ac2;">
                                                    A
                                                </div>
                                                <div class="card-body question-body text-center">
                                                    <h5 class="card-title" id="answer_a">Answer 1</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card question-card" style="background-color: #2c9ca6; color:white;">
                                                <div class="icon-card text-center" style="background-color: #2c9ca6;">
                                                    B
                                                </div>
                                                <div class="card-body question-body text-center">
                                                    <h5 class="card-title" id="answer_b">Answer 2</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card question-card" style="background-color: #eca82c; color:white;">
                                                <div class="icon-card text-center" style="background-color: #eca82c;">
                                                    C
                                                </div>
                                                <div class="card-body question-body text-center">
                                                    <h5 class="card-title" id="answer_c">Answer 3</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card question-card" style="background-color: #d4546a; color:white;">
                                                <div class="icon-card text-center" style="background-color: #d4546a;">
                                                    D
                                                </div>
                                                <div class="card-body question-body text-center">
                                                    <h5 class="card-title" id="answer_d">Answer 4</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->