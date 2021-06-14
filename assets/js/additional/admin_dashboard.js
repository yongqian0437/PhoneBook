$(document).ready(function(){

    function update_course_count() {
        $('#course_counter').animate({
            counter: counter1
        }, {
            duration: 2000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            },
            complete: update_course_count
        });
    };
    update_course_count();

    function update_my_rd_count() {
        $('#my_rd_counter').animate({
            counter: counter2
        }, {
            duration: 2000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            },
            complete: update_my_rd_count
        });
    };
    update_my_rd_count();

    function update_my_app_count() {
        $('#my_app_counter').animate({
            counter: counter3
        }, {
            duration: 2000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            },
            complete: update_my_app_count
        });
    };
    update_my_app_count();

    function update_partner_count() {
        $('#partner_counter').animate({
            counter: counter4
        }, {
            duration: 2000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            },
            complete: update_partner_count
        });
    };
    update_partner_count();

}); // end of ready function

// Area Chart Example
var ctx = document.getElementById("userChartArea");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
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
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
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
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
