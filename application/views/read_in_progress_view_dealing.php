<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    var last = "<?php echo $reading_progress_data->dealing_last; ?>";
    console.log(last);
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

                    <div class="row justify-content-md-center py-5" id="main_quiz_card">
                        <div class="col-md-8">

                            <div class="card shadow">
                                <div class="card-header">

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-2 pt-2" style="font-size: 1.2rem;"></i>Dealing With People With Dementia</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <a id="leave_button" class="btn btn-danger"><i class="fas fa-arrow-left pr-2"></i>Leave</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body question_card_body text-left" style="height: 100px;">
                                    <h4 class="card-title  px-5" id="contents">Content</h4>
                                </div>
                                <div class="card-body question_card_body text-left" style="height: 100px;">
                                    <h5 class="card-title  px-5" id="explanations">Explanations</h5>
                                </div>
                                <div class="card-header">

                                    <div class="row">
                                        <div class="col-md-9 text-left">
                                            <button id="previous_button" class="btn btn-danger"><i class="fas fa-arrow-left pr-2"></i>Previous</a>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <button id="next_button" class="btn btn-danger"><i class="fas fa-arrow-right pr-2"></i>Next</button>
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