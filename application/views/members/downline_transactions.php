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
            <h1 class="m-0 text-dark">Downline 1:   <span style="color: #357ec7">Charles Okike</span> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('members/profile/'.$user_data['id'])?>">Charles Okike</a></li>
              <li class="breadcrumb-item active"><a href=""><?php echo $user_data['firstname'] ." " .$user_data['lastname']; ?></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

  
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

  <!--  <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php
            
              ?>
              
            </div>-->


      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div class="card">
		  <div class="card-header">
                <h3 class="card-title">&nbsp;</h3>

                <div class="row">

        
                <table class="table table-bordered table-condensed table-hovered" id="profile-table" style="margin-top:20px;">
                <tr>
                  <th>Date of Registration</th>
                  <td><?php echo $user_data["date_of_registration"] ?></td>
                </tr>
                <tr>
                  <th>Current Alpha Plan</th>
                  <td><?php 
                  
                  $currentPlan = $downline_alpha_details["savings_plan"];
                  if($currentPlan == "alpha3")
                    echo "Alpha 3 Months";
                  
                  else if($currentPlan == "alpha1")
                  echo "Alpha One Month";

                  else if($currentPlan == "alpha6")
                  echo "Alpha 6 Months";

                  else if($currentPlan == "alpha9")
                  echo "Alpha 9 Months";

                  else if($currentPlan == "alpha12")
                  echo "Alpha 12 Months";

                  ?>
                  
                  </td>
                </tr>
                <tr>
                  <th>Alpha Plan Join Date</th>
                  <td><?php echo $downline_alpha_details["join_date"] ?></td>
                </tr>
                <tr>
                  <th>Alpha Plan End Date</th>
                  <td><?php echo $downline_alpha_details["end_date"] ?></td>
                </tr>
                <tr>
                  <th>Alpha Plan Join Type</th>
                  <td>Renewal</td>
                </tr>

                <tr>
                  <th>Current Month</th>
                  <td><?php 
                  $date1 = strtotime("2016-06-01 22:45:00"); 
                  $date2 = strtotime("2018-09-21 10:44:01"); 

                  $today = time();
                  $join_date = strtotime($downline_alpha_details["join_date"]);

                  $diff = abs($today -  $join_date); 

                  // To get the year divide the resultant date into
                  // total seconds in a year (365*60*60*24)
                  $years = floor($diff / (365*60*60*24)); 
                    
                    
                  // To get the month, subtract it with years and
                  // divide the resultant date into
                  // total seconds in a month (30*60*60*24)
                  $months = floor(($diff - $years * 365*60*60*24)
                                                / (30*60*60*24)); 

                                               if($months>0)
                                                  echo $months;
                                                else
                                                echo "1";
                  
                  ?>
                  
                  </td>
                </tr>

                <tr>
                  <th>No. of Commissions Earned</th>
                  <td>5</td>
                </tr>

                <tr>
                  <th>Total Commissions Earned</th>
                  <td style="color:#357ec7;">#13490</td>
                </tr>

                </table>

                <h3 style="color:orange">Account officer Bonus Details -  <span style="color: #357ec7">Current Plan</span></h3>

             

             
                <table class="table table-bordered table-condensed table-hovered" id="profile-table" style="margin-top:20px;">

                <tr>
                <th>Month 1</th>
                <td style="color:green">0.35% of total savings</td>
                <td style="color:green">#3000</td>
                </tr>

                <tr>
                <th>Month 2</th>
                <td style="color:green">0.30% of total savings</td>
                <td style="color:green">#3000</td>
                </tr>
                <tr>
                <th>Month 3</th>
                <td >0.25% of total savings</td>
                <td >--</td>
                </tr>

                </table>
              

                <h4 ><span style="color:orange">AO Bonus Details:</span>  <span style="color: #357ec7"> 01/01/2021 -  01/01/2021</span></h4>

                <table class="table table-bordered table-condensed table-hovered" id="profile-table" style="margin-top:20px;">

                <tr>
                <th>Month 1</th>
                <td style="color:green">0.5% of total savings</td>
                <td style="color:green">#3000</td>
                </tr>

                <tr>
                <th>Month 2</th>
                <td style="color:green">0.45% of total savings</td>
                <td style="color:green">#3000</td>
                </tr>
                <tr>
                <th>Month 3</th>
                <td  style="color:green">0.40% of total savings</td>
                <td >--</td>
                </tr>

                </table>


</div>
              


               
              </div>
		 
            <!-- /.card-header -->
            <div class="card-body">

            <div class="row">
      
                
                <table class="table table-bordered table-condensed table-hovered table-transactions" style="margin-top:20px;">
                
                <thead style="border-bottom:2px solid #ccc">
                  <tr >
                    <th>Plan Type</th>
                    <th>Started</th>
                    <th>Ended</th>
                    <th>Duration(days)</th>
                    <th>Status</th>
                    <th>Balance (at end date)</th>
                    <th>Paid Bonus</th>
                    <th>Interest Yield</th>

                  </tr>
                 <thead>
  
                 <tbody>
  
                 <?php for($v =0; $v<3;$v++): ?>
  
                 <tr>

                 <td>Alpha 1</td>
                 <td>12/06/2021</td>
                 <td>12/06/2021</td>
                 <td>60</td>
                 <td>ended</td>
                 <td>#30000</td>
                 <td>#300</td>
                 <td>#900</td>

                   </tr>
  
                  <?php endfor ?>
                 
  
                
  
                 </tbody>
  
  
                </table>

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
   /* $(document).ready(function() {
      $("#profileMainNav").addClass('active');
    });*/
  </script>

  

