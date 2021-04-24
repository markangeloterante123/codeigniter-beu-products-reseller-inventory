<link rel="stylesheet" href="<?php echo base_url(); ?>assets/body/plugins/daterangepicker/daterangepicker.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SALES GRAPHS</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title title_daily"></h3>

                <div class="card-tools">
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="daily_date" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                            <a href="javascript:void(0)" class="btn btn-info view_daily" title="VIEW"><i class="fas fa-check"></i></a>
                        </div>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                    </div>

                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="dailyBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">WEEKLY BAR CHART</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
             <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">MONTHLY BAR CHART</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary ">
              <div class="card-header">
                <h3 class="card-title">WEEKLY CHART</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            <!-- DONUT CHART -->
            <div class="card card-info  collapsed-card">
              <div class="card-header">
                <h3 class="card-title">CATEGORY ITEM SOLD</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>

          </div>

          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">MONTHLY CHART</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-info collapsed-card">
              <div class="card-header">
                <h3 class="card-title">DAILY ITEM SOLD</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
           
          

          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="<?php echo base_url(); ?>assets/body/plugins/plugins/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/body/plugins/daterangepicker/daterangepicker.js"></script>
<script>
  $(function () {
       $('#reservationdate').datetimepicker({
          format: 'MMMM D, YYYY'
        });
  });
</script>
  <script>
  $(function () {
          $.ajax({
              url:'<?=base_url()?>index.php/pages/graphData',
              type: 'POST',
              dataType : "JSON",
              error: function() {
                      alert('Error Cart No.');
                   },
              success: function (data) {
                  var month = [];
                  var monthprofit = [];
                  var montTotal = [];
                  for(i=0; i<data.length; i++){
                        month.push(data[i].name);
                        monthprofit.push(data[i].profit);
                        montTotal.push(data[i].total);
                    }
                  //MONTHLY

                  var areaChartCanvas = $('#lineChart').get(0).getContext('2d')
                  var areaChartData = {
                    labels  : month,
                    datasets: [
                      {
                        label               : 'NET',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : monthprofit
                      },
                      {
                        label               : 'TOTAL SALES',
                        backgroundColor     : 'rgba(210, 214, 222, 1)',
                        borderColor         : 'rgba(210, 214, 222, 1)',
                        pointRadius         : false,
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : montTotal
                      },
                    ]
                  }

                  var areaChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                      display: false
                    },
                    scales: {
                      xAxes: [{
                        gridLines : {
                          display : false,
                        }
                      }],
                      yAxes: [{
                        gridLines : {
                          display : false,
                        }
                      }]
                    }
                  }
                  var areaChart       = new Chart(areaChartCanvas, {
                    type: 'line',
                    data: areaChartData,
                    options: areaChartOptions
                  })

                  //-------------
                  //- LINE CHART -
                  //--------------
                  var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
                  var lineChartOptions = $.extend(true, {}, areaChartOptions)
                  var lineChartData = $.extend(true, {}, areaChartData)
                  lineChartData.datasets[0].fill = false;
                  lineChartData.datasets[1].fill = false;
                  lineChartOptions.datasetFill = false

                  var lineChart = new Chart(lineChartCanvas, {
                    type: 'line',
                    data: lineChartData,
                    options: lineChartOptions
                  })

                  var barChartCanvas = $('#barChart').get(0).getContext('2d')
                  var barChartData = $.extend(true, {}, areaChartData)
                  var temp0 = areaChartData.datasets[0]
                  var temp1 = areaChartData.datasets[1]
                  barChartData.datasets[0] = temp1
                  barChartData.datasets[1] = temp0

                  var barChartOptions = {
                    responsive              : true,
                    maintainAspectRatio     : false,
                    datasetFill             : false
                  }

                  var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                  })
              }
            });

    
  })
</script>

 <script>
  $(function () {
          $.ajax({
              url:'<?=base_url()?>index.php/pages/graphData2',
              type: 'POST',
              dataType : "JSON",
              success: function (data) {
                  var week = [];
                  var weekprofit = [];
                  var weekTotal = [];
                  for(i=0; i<data.length; i++){
                        week.push(data[i].name);
                        weekprofit.push(data[i].profit);
                        weekTotal.push(data[i].total);
                    }
                  //week

                  var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
                  var areaChartData = {
                    labels  : week,
                    datasets: [
                      {
                        label               : 'NET',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : weekprofit
                      },
                      {
                        label               : 'TOTAL SALES',
                        backgroundColor     : 'rgba(210, 214, 222, 1)',
                        borderColor         : 'rgba(210, 214, 222, 1)',
                        pointRadius         : false,
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : weekTotal
                      },
                    ]
                  }

                  var areaChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                      display: false
                    },
                    scales: {
                      xAxes: [{
                        gridLines : {
                          display : false,
                        }
                      }],
                      yAxes: [{
                        gridLines : {
                          display : false,
                        }
                      }]
                    }
                  }
                  var areaChart       = new Chart(areaChartCanvas, {
                    type: 'line',
                    data: areaChartData,
                    options: areaChartOptions
                  })

                  var barChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
                  var barChartData = $.extend(true, {}, areaChartData)
                  var temp0 = areaChartData.datasets[0]
                  var temp1 = areaChartData.datasets[1]
                  barChartData.datasets[0] = temp1
                  barChartData.datasets[1] = temp0

                  var barChartOptions = {
                    responsive              : true,
                    maintainAspectRatio     : false,
                    datasetFill             : false
                  }

                  var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                  })

                  //---------------------
                  //- STACKED BAR CHART -
                  //---------------------
                  var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
                  var stackedBarChartData = $.extend(true, {}, barChartData)

                  var stackedBarChartOptions = {
                    responsive              : true,
                    maintainAspectRatio     : false,
                    scales: {
                      xAxes: [{
                        stacked: true,
                      }],
                      yAxes: [{
                        stacked: true
                      }]
                    }
                  }

                  var stackedBarChart = new Chart(stackedBarChartCanvas, {
                    type: 'bar',
                    data: stackedBarChartData,
                    options: stackedBarChartOptions
                  })
              }
            });
  })
</script>
<script>
  $(function () {
          $.ajax({
              url:'<?=base_url()?>index.php/pages/graphCategData',
              type: 'POST',
              dataType : "JSON",
              success: function (data) {
                  var categ = [];
                  var qty = [];
                  for(i=0; i<data.length; i++){
                      categ.push(data[i].item_name);
                      qty.push(data[i].sold);
                    }

                 var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                  var donutData        = {
                    labels: categ,
                    datasets: [
                      {
                        data:qty,
                        backgroundColor : ['maroon','coral','gray','green','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', 'red' ,'pink' ,'blue'],
                      }
                    ]
                  }
                  var donutOptions     = {
                    maintainAspectRatio : false,
                    responsive : true,
                  }
                  var donutChart = new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                  })
              }
            });

    
  })
</script>
 <script type="text/javascript">
  $(document).ready(function () {
    dailyReports();
    daily();

    function daily(){
      var date = moment();
      var dates = date.format('MMMM D, YYYY');
      
      $.ajax({
              url:'<?=base_url()?>index.php/pages/graphSales',
              type: 'POST',
              data:{dates:dates},
              dataType : "JSON",
              success: function (data) {
                  var categ = [];
                  var net = [];
                  var total = 0;
                  for(i=0; i<data.length; i++){
                      categ.push(data[i].name_of_item);
                      net.push(data[i].net);
                      total += parseFloat(data[i].net);
                    }
                $('.title_daily').html('<i class="fas fa-calendar"></i> '+dates +' TOTAL NET: ₱'+Number((total).toFixed(1)));
                 var barChartCanvas = $('#dailyBarChart').get(0).getContext('2d')
                  var barChartData = {
                    labels  : categ,
                    datasets: [
                      {
                        label               : 'TOTAL NET',
                        backgroundColor     : 'rgba(210, 214, 222, 1)',
                        borderColor         : 'rgba(210, 214, 222, 1)',
                        pointRadius         : false,
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : net
                      },
                    ]
                  }
                  var temp0 = barChartData.datasets[0]
                  barChartData.datasets[0] = temp0

                  var barChartOptions = {
                    responsive              : true,
                    maintainAspectRatio     : false,
                    datasetFill             : false
                  }

                  var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                  })
                 
              }
            });
    }

    function dailyReports(){
      var date = moment();
      var dates = date.format('MMMM D, YYYY');
      $.ajax({
              url:'<?=base_url()?>index.php/pages/graphSales',
              type: 'POST',
              data:{dates:dates},
              dataType : "JSON",
              success: function (data) {
                  var categ = [];
                  var net = [];
                  for(i=0; i<data.length; i++){
                      categ.push(data[i].name_of_item+" NET: ₱ "+data[i].net);
                      net.push(data[i].net);
                    }

                 var donutChartCanvas = $('#pieChart').get(0).getContext('2d')
                  var donutData        = {
                    labels: categ,
                    datasets: [
                      {
                        data:net,
                        backgroundColor : ['maroon','coral','gray','green','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', 'red' ,'pink' ,'blue'],
                      }
                    ]
                  }
                  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                  var pieData        = donutData;
                  var pieOptions     = {
                    maintainAspectRatio : false,
                    responsive : true,
                  }
                  //Create pie or douhnut chart
                  // You can switch between pie and douhnut using the method below.
                  var pieChart = new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: pieData,
                    options: pieOptions
                  })
              }
            });
        }

    $('.view_daily').click(function(){
      var dates = $('input[name="daily_date"]').val();
      $.ajax({
              url:'<?=base_url()?>index.php/pages/graphSales',
              type: 'POST',
              data:{dates:dates},
              dataType : "JSON",
              success: function (data) {
                  var categ = [];
                  var net = [];
                  var total = 0;
                  for(i=0; i<data.length; i++){
                      categ.push(data[i].name_of_item);
                      net.push(data[i].net);
                      total += parseFloat(data[i].net);
                    }
                $('.title_daily').html('<i class="fas fa-calendar"></i> '+dates +' TOTAL NET: ₱'+Number((total).toFixed(1)));
                 var barChartCanvas = $('#dailyBarChart').get(0).getContext('2d')
                  var barChartData = {
                    labels  : categ,
                    datasets: [
                      {
                        label               : 'TOTAL NET',
                        backgroundColor     : 'rgba(210, 214, 222, 1)',
                        borderColor         : 'rgba(210, 214, 222, 1)',
                        pointRadius         : false,
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : net
                      },
                    ]
                  }
                  var temp0 = barChartData.datasets[0]
                  barChartData.datasets[0] = temp0

                  var barChartOptions = {
                    responsive              : true,
                    maintainAspectRatio     : false,
                    datasetFill             : false
                  }

                  var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                  })
                 
              }
            });
    });

  });
</script>