<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Confirmation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transaction</li>
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

       

               
              </div>
		 
            <!-- /.card-header -->
            <div class="card-body text-center">
           
            <div class="row">

          
                 <div class="col-md-12 col-xs-12 text-center ">

                 <h3>Your about to make a transaction of type - <span style="color:#357ec7"><?php  if($type) echo $type;?> </span></h3>

                 <h1><span style="color:green; font-size:55px;"><?php  if($amount) echo "₦". $amount;?></span></h1>

                 <h3><span style="color:orange"><?php  if($plan){
                   if($plan=="alpha1")
                      echo "Alpha One Month";
                

                    else if($plan=="alpha3")
                    echo "Alpha Three Months";
                

                    else if($plan=="alpha6")
                    echo "Alpha Six Months";
              

                    else if($plan=="alpha9")
                    echo "Alpha Nine Months";
                  

                    else if($plan=="alpha12")
                    echo "Alpha Twelve Months";
          

          }
                 
                 ?></span></h3>

                 
                <h4><?php  if($channel) 
                 
                   if($channel == 1)
                   echo "OTC Cash";

                   else if($channel == 2)
                   echo "Bank Transfer";

                   else if($channel == 4)
                   echo "ATM";

                   else if($channel == 3)
                   echo "POS";

                   else if($channel == 5)
                   echo "Mobile App";
                 
                 ?> </h4>
                 </div>

                   
            
      

            </div>

            <a href="<?php echo base_url('members/memberActivity/'.$user_data['id']); ?>"><button class="btn btn-default" id="deactivate-btn" role="button">Back </button></a>
         
         <a href="<?php echo base_url('transactions/new/'.$user_data['id']."/proceeed"); ?>"><button class="btn btn-primary" id="deactivate-btn" role="button">Complete transaction</button></a>

         

            <!-- Identify where the chart should be drawn. -->
         

            
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

