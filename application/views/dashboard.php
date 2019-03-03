<?php if ($this->session->userdata('type') != 'google' && $user->status == '0') { ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#myModal").modal({
            backdrop: 'static',
            keyboard: false
        });
		});
	</script>
<?php } 
foreach($debit as $a){
            $merk[] = $a->waktu;
            $stok[] = $a->uang;
        }
foreach($kredit as $b){
            $waktu[] = $b->waktu;
            $uang[] = $b->uang;
        }
foreach($celengan as $q){
            $jumlah_uang = $q->jumlah_tabungan;
        }
foreach($dt as $z){
            $debit = $z->uang;
        }
foreach($kt as $h){
            $kredit = $h->uang;
        }
?>
<div id="myModal" class="modal fade" style="margin-top: 150px ">
	<div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	            <h4 class="modal-title">Change Password </h4>
	            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
	        </div>
	        <div class="modal-body">
	            <form action="<?php echo base_url();?>Home/change_pass" method="POST">
	                <div class="form-group">
	                    <input type="password" name="pass1" class="form-control" placeholder="New Password" required>
	                </div>
	                <div class="form-group">
	                    <input type="password" name="pass2" class="form-control" placeholder="Confirm New Password" required>
	                </div>
	                <button type="submit" class="btn btn-info" style="float: right;">Submit</button>
	            </form>
	        </div>
	    </div>
	</div>
</div>

<div class="content">
	<?php echo $this->session->flashdata('notif') ?>
	<div class="row">
		<div class="col-lg-12">
            <div class="card card-chart" style="padding-bottom: 45px">
              <div class="card-header">
                <h5 class="card-category">Amount Of Money</h5>
                <h3 class="card-title"><i class="tim-icons icon-money-coins text-info"></i>Rp. <?= number_format($jumlah_uang, 0, ".", "."); ?>,00</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                	<h5 class="card-category">&nbsp;&nbsp;&nbsp;Debit This Month ( Rp. <?= number_format($debit, 0, ".", "."); ?>,00 )</h5>
                  	<canvas id="chartLinePurple"></canvas>
                </div>
                <hr  style="margin-top: 45px">
                <div class="chart-area">
                	<h5 class="card-category">&nbsp;&nbsp;&nbsp;Kredit This Month ( Rp. <?= number_format($kredit, 0, ".", "."); ?>,00 )</h5>
                  	<canvas id="chartLineRed"></canvas>
                </div>
              </div>
            </div>
        </div>
	</div>
</div>

<script>
      $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

      });
    </script>
    <script type="text/javascript">
      type = ['primary', 'info', 'success', 'warning', 'danger'];

demo = {
  initPickColor: function() {
    $('.pick-class-label').click(function() {
      var new_class = $(this).attr('new-class');
      var old_class = $('#display-buttons').attr('data-class');
      var display_div = $('#display-buttons');
      if (display_div.length) {
        var display_buttons = display_div.find('.btn');
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr('data-class', new_class);
      }
    });
  },

  initDocChart: function() {
    chartColor = "#FFFFFF";

    // General configuration for the charts with Line gradientStroke
    gradientChartOptionsConfiguration = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      tooltips: {
        bodySpacing: 4,
        mode: "nearest",
        intersect: 0,
        position: "nearest",
        xPadding: 10,
        yPadding: 10,
        caretPadding: 10
      },
      responsive: true,
      scales: {
        yAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }],
        xAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }]
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 15,
          bottom: 15
        }
      }
    };

    ctx = document.getElementById('lineChartExample').getContext("2d");

    gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, chartColor);

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");

    myChart = new Chart(ctx, {
      type: 'line',
      responsive: true,
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Active Users",
          borderColor: "#f96332",
          pointBorderColor: "#FFF",
          pointBackgroundColor: "#f96332",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          backgroundColor: gradientFill,
          borderWidth: 2,
          data: [542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 630]
        }]
      },
      options: gradientChartOptionsConfiguration
    });
  },

  initDashboardPageCharts: function() {

    gradientChartOptionsConfigurationWithTooltipPurple = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },

      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.0)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 60,
            suggestedMax: 125,
            padding: 20,
            fontColor: "#9a9a9a"
          }
        }],

        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(225,78,202,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#9a9a9a"
          }
        }]
      }
    };


    gradientBarChartConfiguration = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },

      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{

          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 60,
            suggestedMax: 120,
            padding: 20,
            fontColor: "#9e9e9e"
          }
        }],

        xAxes: [{

          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#9e9e9e"
          }
        }]
      }
    };

    var ctx = document.getElementById("chartLinePurple").getContext("2d");

    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(29,140,248,0.2)');
    gradientStroke.addColorStop(0.4, 'rgba(29,140,248,0.0)');
    gradientStroke.addColorStop(0, 'rgba(29,140,248,0)'); //blue colors
    
    var data = {
      labels: <?php echo json_encode($merk);?>,
      datasets: [{
        label: "Money Saved",
        fill: true,
        backgroundColor: gradientStroke,
        borderColor: '#1f8ef1',
        borderWidth: 1,
        borderDash: [],
        borderDashOffset: 0.0,
        pointBackgroundColor: '#1f8ef1',
        pointBorderColor: 'rgba(255,255,255,0)',
        pointHoverBackgroundColor: '#1f8ef1',
        pointBorderWidth: 20,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 15,
        pointRadius: 2,
        data: <?php echo json_encode($stok);?>,
      }]
    };

    var myChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: gradientChartOptionsConfigurationWithTooltipPurple
    });

    var ctx = document.getElementById("chartLineRed").getContext("2d");

    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgb(255, 0, 0, 0.2)');
    gradientStroke.addColorStop(0.4, 'rgb(255, 0, 0, 0)');
    gradientStroke.addColorStop(0, 'rgb(255, 0, 0, 0)'); //red colors
    
    var data = {
      labels: <?php echo json_encode($waktu);?>,
      datasets: [{
        label: "Data",
        fill: true,
        backgroundColor: gradientStroke,
        borderColor: '#ff0000',
        borderWidth: 1,
        borderDash: [],
        borderDashOffset: 0.0,
        pointBackgroundColor: '#ff0000',
        pointBorderColor: 'rgba(255,255,255,0)',
        pointHoverBackgroundColor: '#ff0000',
        pointBorderWidth: 20,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 15,
        pointRadius: 2,
        data: <?php echo json_encode($uang);?>,
      }]
    };

    var myChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: gradientChartOptionsConfigurationWithTooltipPurple
    });
  }
};
    </script>