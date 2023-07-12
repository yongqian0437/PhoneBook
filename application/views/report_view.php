<!-- Set base url to javascript variable-->
<script>
    var base_url = "<?php echo base_url(); ?>";
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="script.js"></script>


<!-- Styles-->
<style>
    html {
        scroll-behavior: smooth;
    }

    /* Chart */
    .graphbox {
        position: relative;
        width: 100%;
        padding: 20px;
        display: grid;
        grid-template-columns: 8fr 4fr;
        grid-gap: 30px;
        min-height: 200px;
        border-radius: 20px;
    }

    .graphbox .box {
        position: relative;
        width: 100%;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 12fr));
        grid-gap: 30px;
        min-height: 200px;
        border-radius: 20px;
    }

    .graphbox2 {
        position: relative;
        width: 100%;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        grid-gap: 30px;
        min-height: 200px;
        border-radius: 50px;
    }


    /* .container-fluid {
        width: 100%;
        height: 100vh;
        background-image: url(<?php echo base_url('assets/img/background3.jpg'); ?>);
        background-color: #F5F5F5;
        background-position: center;
        position: relative;
        overflow: auto;
    } */


    .radius {
        border-radius: 20px;
    }

    @media (max-width: 991px) {
        .graphbox {
            grid-template-columns: 1fr;
            height: auto;
        }

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
                <div class="container-fluid" style="background:#FFFF">

                    <div class="row">
                        <div class="col-12 md-8">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-2 px-4">
                                <h1 class="h3 mb-0 pt-4 font-weight-bold " style="color:#000000">Report</h1>
                            </div>
                            <div class="py-2 px-4" style="text-align: justify; font-weight:500;color:#000000 ">This report is generated based on the Reading Progress & Quiz's result.</div>
                        </div>
                    </div>

                    <div class="px-4 pb-4">
                        <hr style=" width :100%; height:2px; background-color:#000000">
                    </div>
                    <div class="row justify-content-center" style="box-shadow:30px;">

                        <div class="col-4 mb-4 ">
                            <div class="card border-left-success shadow h-100 py-2" style="border-radius: 30px;">

                                <div class="card-body ">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-center text-xs font-weight-bold text-uppercase mb-2">
                                                You have scored more than
                                                <h1 class="text-danger">50% </h1> of individuals on your very first attempt in the <h3 class="text-success" style="font-family: 'Roboto', sans-serif;">Dementia Symptoms</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>


                        <div class="col-4 mb-4 ">
                            <div class="card border-left-success shadow h-100 py-2" style="border-radius: 30px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-center text-xs font-weight-bold text-uppercase mb-2">
                                                You have scored more than
                                                <h1 class="text-danger">80%</h1> of individuals on your very first attempt in the <h3 class="text-success" style="font-family: 'Roboto', sans-serif;">Tips for communicating with Dementia
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- </a> -->
                        </div>

                        <div class="col mb-4">
                            <div class="card border-left-success shadow h-100 py-2" style="border-radius: 30px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-center text-xs font-weight-bold text-uppercase mb-2">
                                                You have scored more than
                                                <h1 class="text-danger"></i>60%</h1> of individuals on your very first attempt in the <h3 class="text-success" style="font-family: 'Roboto', sans-serif;">Dealing with people with Dementia
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class=row>
                        <!-- Pending Requests Card Example -->
                        <div class="col mb-4">
                            <div class="card  shadow h-100 py-2" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="font-family: 'Roboto', sans-serif;">
                                                Highest Streak in Quiz Dementia Symptoms
                                            </div>
                                            <div id="ac_counter" class="h5 mb-0 font-weight-bold text-gray-800 counting_number"><i class="fas fa-fire pr-2" style="color:red;"></i><?= $qs_data->max_streak ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col mb-4">
                            <div class="card shadow h-100 py-2" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="font-family: 'Roboto', sans-serif;">
                                                Highest Streak in Quiz Tips for communicating with a person with Dementia
                                            </div>
                                            <div id="ep_counter" class="h5 mb-0 font-weight-bold text-gray-800 counting_number"><i class="fas fa-fire pr-2" style="color:red;"></i><?= $qt_data->max_streak ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col mb-4">
                            <div class="card border-left shadow h-100 py-2" style="border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="font-family: 'Roboto', sans-serif;">
                                                Highest Streak in Quiz Dealing with the Troubling Behavior of A Person with Dementia
                                            </div>
                                            <div id="ep_counter" class="h5 mb-0 font-weight-bold text-gray-800 counting_number text-warning "><i class="fas fa-fire pr-2" style="color:red;"></i><?= $qd_data->max_streak ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <!-- Graph -->
                    <div class="graphbox">

                        <div class="box mb-4">
                            <div class="col-xl-12 col-lg-12" style=" background-color: #FFFF">
                                <div class="card h-100 shadow mb-4 " style="border-radius: 20px;">
                                    <div class="card-header py-3" style="background-color: white">
                                        <div class="text-xs font-weight-bold mb-1" style="color: black; text-transform: uppercase;">QUIZ Score</div>
                                    </div>
                                    <div class="card-body" style="background-color: white">
                                        <div class="box">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="box mb-4">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card h-100 shadow mb-4">
                                    <div class="card-header py-3" style="background-color: white">
                                        <div class="text-xs font-weight-bold mb-1" style="color: black; text-transform: uppercase;">Score</div>
                                    </div>

                                    <div class="card-body" style="background-color: white">
                                        <div class="box">
                                            <canvas id="pieChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>


                    <div class="graphbox2">


                        <div class="box">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card h-100 shadow mb-4">
                                    <div class="card-header py-3" style="background-color: white">
                                        <div class="text-xs font-weight-bold mb-1" style="color: black; text-transform: uppercase;">Dementia Symptoms</div>
                                    </div>

                                    <div class="card-body" style="background-color: white;">
                                        <div class="box">
                                            <canvas id="chartProgress"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="col-xl-12 col-lg-12 ">
                                <div class="card h-100 shadow mb-4">
                                    <div class="card-header py-3" style="background-color: white ">
                                        <div class="text-xs font-weight-bold mb-1" style="color: black; text-transform: uppercase;">Tips for communicating with a person with Dementia</div>
                                    </div>

                                    <div class="card-body" style="background-color: white">
                                        <div class="box">
                                            <canvas id="doughnutChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card h-100 shadow mb-4">
                                    <div class="card-header py-2" style="background-color: white">
                                        <div class="text-xs font-weight-bold mb-1" style="color: black; text-transform: uppercase;">Dealing with the Troubling Behavior of A Person with Dementia</div>
                                    </div>

                                    <div class="card-body" style="background-color: white">
                                        <div class="box">
                                            <canvas id="doughnutChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>






                </div>
                <!-- /.container-fluid -->

                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    // const ctx = document.getElementById('myChart');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Understanding Dementia Symptoms', 'Tips For Communicating With Dementia', 'Dealing With People With Dementia'],
                            datasets: [{
                                    label: 'First Attempt',
                                    data: [<?= $qs_data->first_attempt_score ?>, <?= $qt_data->first_attempt_score ?>, <?= $qd_data->first_attempt_score ?>],
                                    backgroundColor: [
                                        'rgba(153, 102, 255, 0.2)',
                                        // 'rgba(75, 192, 192, 0.2)',
                                        // 'rgba(54, 162, 235, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(153, 102, 255, 0.2)'


                                    ],
                                    borderColor: [
                                        'rgb(153, 102, 255)',
                                        'rgb(153, 102, 255)',
                                        'rgb(153, 102, 255)'
                                        // 'rgb(75, 192, 192)',
                                        // 'rgb(54, 162, 235)',

                                    ],
                                    borderWidth: 2
                                }, {
                                    label: 'Current Score',
                                    data: [<?= $qs_data->score ?>, <?= $qt_data->score ?>, <?= $qd_data->score ?>],
                                    backgroundColor: [
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(75, 192, 192, 0.2)'

                                    ],
                                    borderColor: [

                                        'rgb(75, 192, 192)',
                                        'rgb(75, 192, 192)',
                                        'rgb(75, 192, 192)'


                                    ],
                                    borderWidth: 2
                                },
                                {
                                    label: 'Highest Streak',
                                    data: [<?= $qs_data->max_streak ?>, <?= $qt_data->max_streak ?>, <?= $qd_data->max_streak ?>],
                                    backgroundColor: [

                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(54, 162, 235, 0.2)'

                                    ],
                                    borderColor: [

                                        'rgb(54, 162, 235)',
                                        'rgb(54, 162, 235)',
                                        'rgb(54, 162, 235)'

                                    ],
                                    borderWidth: 2
                                }
                            ]
                        },
                        options: {
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,

                                }


                            }


                        }
                    });
                </script>


                <!-- //piechart -->
                <script>
                    var pieChart = document.getElementById('pieChart').getContext('2d');
                    var myChart = new Chart(pieChart, {
                        type: 'pie',
                        data: {
                            labels: ['Understanding Dementia Symptoms', 'Tips For Communicating With Dementia', 'Dealing With People With Dementia'],
                            datasets: [{
                                label: 'Quiz Score',
                                data: [5, 10, 1],
                                backgroundColor: [
                                    'rgb(240, 159, 0)',
                                    'rgb(153, 102, 255)',
                                    'rgb(75, 192, 192)'
                                ],
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                    });
                </script>


                <!-- // donutchart -->
                <script>
                    var pieChart = document.getElementById('chartProgress').getContext('2d');
                    var myChart = new Chart(chartProgress, {
                        type: 'doughnut',
                        data: {
                            labels: ['Reading Progress'],
                            datasets: [{
                                label: '',
                                data: [10],
                                backgroundColor: [

                                    'rgb(255, 205, 86)'
                                ],
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                    });
                </script>

                <script>
                    var pieChart = document.getElementById('doughnutChart2').getContext('2d');
                    var myChart = new Chart(doughnutChart2, {
                        type: 'doughnut',
                        data: {
                            labels: ['Reading Progress'],
                            datasets: [{
                                label: '',
                                data: [10],
                                backgroundColor: [

                                    'rgb(255, 205, 86)'
                                ],
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                    });
                </script>

                <script>
                    var pieChart = document.getElementById('doughnutChart3').getContext('2d');
                    var myChart = new Chart(doughnutChart3, {
                        type: 'doughnut',
                        data: {
                            labels: ['Reading Progress'],
                            datasets: [{
                                label: '',
                                data: [300],
                                backgroundColor: [

                                    'rgb(54, 162, 235)'
                                ],

                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                    });
                </script>