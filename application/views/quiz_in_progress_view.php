<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    const database = "<?= $database ?>";
    var progress = <?= $quiz_data->progress ?>;
    var current_streak = <?= $quiz_data->current_streak ?>;
    var score = <?= $quiz_data->score ?>;
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

                <div id="spinnerContainer"></div>

                    <div class="row justify-content-md-center py-5" id="main_quiz_card">
                        <div class="col-md-8">

                            <div class="card shadow">
                                <div class="card-header">

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-2 pt-2" style="font-size: 1.2rem;"><i class="fas fa-fire pr-2" style="color:red;"></i>Streak:</label>
                                                <div class="progress flex-grow-1" style="height:35px;">
                                                    <div class="progress-bar progress-bar-striped bg-danger" id="progress_bar" role="progressbar" style="width: 50%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="progress-box">
                                                <span class="progress-number" id="current_question">i</span>/10
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div style="font-size: 1.2rem;">Score:
                                                <div class="progress-box">
                                                    <span class="progress-number" id="current_score" style="font-size: 1.2em !important;">i</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <a id="leave_button" class="btn btn-danger"><i class="fas fa-arrow-left pr-2"></i>Leave</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body question_card_body text-center" style="height: 200px;">
                                    <h3 class="card-title  px-5" id="question">Questions</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card question-card" onclick="check_answer_streak(1)" id="card_body1" style="background-color: #347ac2; color:white;">
                                                <div class="icon-card text-center" style="background-color: #347ac2;">
                                                    A
                                                </div>
                                                <div class="card-body question-body text-center">
                                                    <h5 class="card-title" id="answer1">Answer 1</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card question-card" onclick="check_answer_streak(2)" id="card_body2" style="background-color: #2c9ca6; color:white;">
                                                <div class="icon-card text-center" style="background-color: #2c9ca6;">
                                                    B
                                                </div>
                                                <div class="card-body question-body text-center">
                                                    <h5 class="card-title" id="answer2">Answer 2</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card question-card" onclick="check_answer_streak(3)" id="card_body3" style="background-color: #eca82c; color:white;">
                                                <div class="icon-card text-center" style="background-color: #eca82c;">
                                                    C
                                                </div>
                                                <div class="card-body question-body text-center">
                                                    <h5 class="card-title" id="answer3">Answer 3</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card question-card" onclick="check_answer_streak(4)" id="card_body4" style="background-color: #d4546a; color:white;">
                                                <div class="icon-card text-center" style="background-color: #d4546a;">
                                                    D
                                                </div>
                                                <div class="card-body question-body text-center">
                                                    <h5 class="card-title" id="answer4">Answer 4</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-md-center py-5" id="success_card">
                        <div class="col-md-3">
                            <!-- show only after quiz is completed -->
                            <div class="card shadow-lg rounded border-success mb-3"style="max-width: 100%;">
                                <div class="card-header bg-success text-white">
                                    Great Job!
                                </div>
                                <div class="card-body text-success text-center">
                                    <h5 class="card-title">Congratulations!</h5>
                                    <p class="card-text px-5" id="card_score"></p>
                                    <a href="<?= base_url('quiz'); ?>" class="btn btn-success">OK</a>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->