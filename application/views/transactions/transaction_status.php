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
            <h1 class="m-0 text-dark">Transaction Status</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('members/memberActivity/'.$user_data['id']);?>">Activity</a></li>
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

                  <h4><a href="">Export as PDF </a> <h4>

               
              </div>
		 
            <!-- /.card-header -->
            <div class="card-body">
           
            <div class="row">

          
                 <div class="col-md-12 col-xs-12 ">
                 
                 <h3>Your transaction was successful!</h3>
                 <h5 style="color:green">View transaction details  below</h5><br>

                 <h4>Transaction Type .......<span style="color:green"><?php  if($type) echo $type;?> </span></h4>
                 <h4>Transaction Amount ......... <span style="color:green"><?php  if($amount) echo "₦". $amount;?></span></h4>
                 <h4>Transaction Time ......... <span style="color:green"><?php  if($date) echo $date;?> </span></h4>
                 <h4>Savings Plan .........<span style="color:green"> <?php  if($plan){
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
                 
                 ?></span></h4>
                 <h4>Member ........<span style="color:green"><?php  if($user_data) echo $user_data["firstname"]."  ".$user_data["lastname"];?> </span></h4>

                 <h4>Channel  .......<span style="color:green"><?php  if($channel) 
                 
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
                 
                 ?> </span></h4>
                 </div>

            

            </div>

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

