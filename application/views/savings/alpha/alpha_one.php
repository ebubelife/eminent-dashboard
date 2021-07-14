<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Amount'],
          ['June',  35000],
          ['July',  102000],
          ['Aug',  412000],
          ['Sept',  921000],
          ['Nov', 910000],
        ]);

        var options = {
          title: 'Chart - Alpha Savings (one month plan) ',
         
          legend: { position: 'bottom' },
          colors: ["#b9c246"],
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }

      $(document).ready(function(){
    drawChart();

  });

    </script>

  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">One Month Alpha</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Alpha-1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div class="card">
		  <div class="card-header">
                <h3 class="card-title">&nbsp;</h3>

                
          <?php// if(in_array('createUser', $user_permission)): ?>
            <a href="<?php echo base_url('savingsplans/alpha/alphaIndex') ?>" class="btn btn-primary">General Stats</a>
            <a href="<?php echo base_url('savingsplans/alpha/alphaOne') ?>" class="btn btn-default">Alpha 1 Month</a>
            <a href="<?php echo base_url('savingsplans/alpha/alphaThree') ?>" class="btn btn-default">Alpha 3 Months</a>
            <a href="<?php echo base_url('savingsplans/alpha/alphaSix') ?>" class="btn btn-default">Alpha 6 Month</a>
            <a href="<?php echo base_url('savingsplans/alpha/alphaNine') ?>" class="btn btn-default">Alpha 9 Month</a>
            <a href="<?php echo base_url('savingsplans/alpha/alphaTwelve') ?>" class="btn btn-default">Alpha 12 Month</a>
            <div class="card-tools">
                  <a href="<?php echo base_url('users/setting');?>" class="btn btn-block btn-primary">Edit Plan</a>
                </div>
             <br><br>
          <?php //endif; ?>


               
              </div>
		 
            <!-- /.card-header -->
            <div class="card-body">
           
            <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-12 single-info-card">

            <p style="color:orange">Total Cashflow</p>
            <h4>₦20,000 - <a href="<?php echo base_url('members/memberActivity');?>">View Activity</a></h4>

            </div><!--/single-info-card-->

            <div class="col-lg-3 col-md-3 col-sm-12 single-info-card">

            <p style="color:orange">Total Cashflow - 30 Days</p>
            <h4> ₦12,000</h4>

            </div><!--/single-info-card-->


             
            <div class="col-lg-3 col-md-3 col-sm-12 single-info-card">
            <p style="color:orange">Total Members </p>
            <h4> 61 <a href="">View All </a> </h4>
           


            </div><!--/single-info-card-->

            <div class="col-lg-3 col-md-3 col-sm-12 single-info-card">
            <p style="color:orange">Defaulters</p>
            <h4> 4 <a href="">Details </a> </h4>

            </div><!--/single-info-card-->
            

            

            </div>

            <!-- Identify where the chart should be drawn. -->
            <div class="col-md-12 col-sm-12">
  <div id="curve_chart" style="height:500px;"></div>
  </div>



            
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
  /*  $(document).ready(function() {
      $("#profileMainNav").addClass('active');
    });*/
  </script>

