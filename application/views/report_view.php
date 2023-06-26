<!-- Set base url to javascript variable-->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/chart.js/Chart.min.js"></script>

<script>
    var month = [];
    var i = 0;
</script>


<!-- Styles-->
<style>
    html {
        scroll-behavior: smooth;
    }

    #report_button {
        background-color: #1cc88a;
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

                    <div class="row">
                        <div class="col-md-8">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-2 px-4">
                                <h1 class="h3 mb-0 text-gray-800 pt-4 font-weight-bold">Report</h1>
                            </div>
                            <div class="py-2 px-4" style="text-align: justify; font-weight:500;">Reports</div>
                        </div>
                        <div class="col-md-4 pt-5 pr-5">
                            <a id="report_button" class="btn btn-primary" style="float:right; width:auto;">Get Result</a>
                        </div>
                    </div>

                    <div class="px-4 pb-4">
                        <hr style=" width :100%; height:2px; background-color:#EAF4F4">
                    </div>
                    <!-- /.container-fluid -->
                    <!-- Bar Chart -->
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="quiz_barChart"></canvas>
                        </div>
                    </div>

                </div>
                <!-- End of Main Content -->
                <script>
                    var counter1 = <?= number_format($total_latest_sales[0]->total_sales_today, 2, '.', '') ?>;
                    var counter2 = <?= $total_items ?>;
                    var counter3 = <?= $items_low_on_stock ?>;

                    // Bar Chart
                    var ctx = document.getElementById("quiz_barChart");
                    var myBarChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [<?php $counter = 0;
                                        foreach ($total_items_by_category as $row) : ?> "<?php if ($counter < 3) {
                                                                                                echo $row['quiz_dealing'];
                                                                                            }
                                                                                            $counter++; ?>", <?php endforeach; ?>],
                            datasets: [{
                                label: "Result",
                                backgroundColor: ["#3bceac", "#ff99c8", "#ca7df9"],
                                borderColor: "#4e73df",
                                data: [<?php $counter = 0;
                                        foreach ($total_items_by_category as $row) : ?> "<?php if ($counter < 3) {
                                                                                                echo $row['COUNT(quiz_dealing.score)'];
                                                                                            }
                                                                                            $counter++; ?>", <?php endforeach; ?>],
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 25,
                                    top: 25,
                                    bottom: 0
                                }
                            },
                            scales: {
                                xAxes: [{
                                    time: {
                                        unit: 'month'
                                    },
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    },
                                    ticks: {
                                        maxTicksLimit: 5
                                    },
                                    maxBarThickness: 25,
                                }],
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                        max: 6,
                                        maxTicksLimit: 5,
                                        padding: 10,
                                    },
                                    gridLines: {
                                        color: "rgb(234, 236, 244)",
                                        zeroLineColor: "rgb(234, 236, 244)",
                                        drawBorder: false,
                                        borderDash: [2],
                                        zeroLineBorderDash: [2]
                                    }
                                }],
                            },
                            legend: {
                                display: false
                            },
                            tooltips: {
                                titleMarginBottom: 10,
                                titleFontColor: '#6e707e',
                                titleFontSize: 14,
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                caretPadding: 10,
                                callbacks: {
                                    label: function(tooltipItem, chart) {
                                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                                    }
                                }
                            },
                        }
                    });
                </script>