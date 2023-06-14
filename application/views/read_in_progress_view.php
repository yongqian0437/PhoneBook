<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    const database = "<?= $database ?>";
    var progress = <?= $quiz_data->progress ?>;
</script>
<script>
    $(document).ready(function() {

        $('#leave_button').click(function() {
            Swal.fire({
                text: 'Are you sure you want leave?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#1cc88a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = base_url + "reading_corner";
                }
            })
        });
    });
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
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center">
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-right">
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <a id="leave_button" class="btn btn-danger"><i class="fas fa-arrow-left pr-2"></i>Leave</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body question_card_body text-center" style="height: 200px;">
                                    <h3 class="card-title  px-5" id="symptoms">Symptoms</h3>
                                </div>
                            </div>

                        </div>
                    </div>





                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->