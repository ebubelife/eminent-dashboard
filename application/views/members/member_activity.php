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
            <h1 class="m-0 text-dark">Account Activity</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('members/profile/'.$user_data['id'])?>">Profile</a></li>
              <li class="breadcrumb-item active"><a href=""><?php echo $user_data['firstname'] ." " .$user_data['lastname']; ?></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <?php if($this->session->flashdata('errors')){ ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo validation_errors(); ?>
              
            </div>
          <?php } ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <?php if($verifyMembership==null): ?>
<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php
               echo  "This member's registration is pending due to non-payment of registration fees. You can  "."<a href='".base_url("members/confirm_pay/".$user_data["id"])."' style='font-weight:600;'>". "      deduct the fee from savings"."</a> ";
              
              ?>
              
            </div>

            <?php endif;?>
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div class="card">
		  <div class="card-header">
                <h3 class="card-title">&nbsp;</h3>

               
              </div>
		 
            <!-- /.card-header -->
            <div class="card-body">

            <div class="row">

<div class="col-lg-3 col-md-3 col-sm-12 single-info-card">

<p style="color:orange">Total Alpha Savings - <span style="color:#357ec7"><?php
 if($activeAlphaPlan) {

  

    if($activeAlphaPlan["savings_plan"]=="alpha1")
      echo "1 Month"; 
    
    else if($activeAlphaPlan["savings_plan"]=="alpha3")
      echo "3 Months"; 

    else if($activeAlphaPlan["savings_plan"]=="alpha6")
      echo "6 Months"; 
    
    else if($activeAlphaPlan["savings_plan"]=="alpha9")
      echo "9 Months"; 

    else if($activeAlphaPlan["savings_plan"]=="alpha12")
      echo "12 Months"; 

      else{}

 }

 else{

 
  echo "Inactive"; 

 }


 
 ?>
 
  </span></p>
<h4>

<?php if($activeAlphaPlan) echo "₦". $activeAlphaPlan["current_alpha_balance"]; 
else{echo "₦0";}
?> </h4>

<p>Join Date: <span style="color:#357ec7"><?php if($activeAlphaPlan)  echo $activeAlphaPlan["join_date"];  ?></span></p>

<p>End Date:<span style="color:#357ec7"> <?php if($activeAlphaPlan) echo $activeAlphaPlan["end_date"];  ?></span></p>



</div><!--/single-info-card-->



 
<div class="col-lg-3 col-md-3 col-sm-12 single-info-card">
<p style="color:orange">Available Funds</p>
<h4> 

<?php if($activeAlphaPlan){
        
          echo "₦". $activeAlphaPlan["current_alpha_balance"]; 
}

else{echo "₦0";}

?>


</h4>


</div><!--/single-info-card-->

<div class="col-lg-3 col-md-3 col-sm-12 single-info-card">
<p style="color:orange">Withdrawn</p>
<h4> 
<?php if($activeAlphaPlan)
         echo "₦". $activeAlphaPlan["total_withdrawn"];

         else{echo "₦0";}

?>
</h4>

</div><!--/single-info-card-->

<div class="col-lg-3 col-md-3 col-sm-12 single-info-card">

<p style="color:orange">Referrals (all time) - <span style="color:#000000"><?php if($totalReferrals) echo $totalReferrals?> Referrals</span></p>
<h4><?php if($unpaidReferrals) echo "₦".((int)$unpaidReferrals *200 );?> - <a href="<?php echo base_url('members/memberActivity/'.$user_data['id']);?>">View All</a></h4>
<span style="color:green;">(Unpaid)</span>

</div><!--/single-info-card-->

</div>

           
          
          <br>

          

            <h2 class="m-0 text-dark">Update Savings </h2>
            <br>


            <form role="form" action="<?php echo  base_url('transactions/new/'.$user_data['id']."/confirm") ?>" method="post">

          
            <div class="form-group">
                  <label for="transactionType">Transaction Type</label>
                  <select class="form-control" id="transaction-type" name="transactionType" style="width:100%">

                   <option value="deposit" selected>Deposit</option>
                   <option value="withdrawal"  >Withdrawal</option>
                  
                   
                  </select>
                </div>

              
                <div class="form-group">
                  <label for="savingsPlan">Savings Plan</label>
                  <select class="form-control" id="savings-plan" name="savingsPlan" style="width:100%">
                      

                  <?php if(count($savings_plans)==0){
                    ?>

                    <option value="alpha1" selected>Alpha Savings (One Month)</option>

                    <option value="alpha3" >Alpha Savings (Three Months)</option>

                    <option value="alpha6" >Alpha Savings (Six Months)</option>

                    <option value="alpha9" >Alpha Savings (Nine Months)</option>

                    <option value="alpha12" >Alpha Savings (Twelve Months)</option>



<?php

}


?>
                  
                  <?php if($savings_plans["savings_plan"]=="alpha1"){
                     echo ' <option value="alpha1" selected>Alpha Savings (One Month)</option>';
                    }

                  ?>

                  <?php if($savings_plans["savings_plan"]=="alpha3"){
                                      echo ' <option value="alpha3" selected>Alpha Savings (Three Months)</option>';
                                      }

                                    ?>

                  <?php if($savings_plans["savings_plan"]=="alpha6"){
                                      echo ' <option value="alpha6" selected>Alpha Savings (Six Months)</option>';
                                      }

                                    ?>

                  <?php if($savings_plans["savings_plan"]=="alpha9"){
                                      echo ' <option value="alpha9" selected>Alpha Savings (Nine Months)</option>';
                                      }

                                    ?>

                  <?php if($savings_plans["savings_plan"]=="alpha12"){
                                      echo ' <option value="alpha12" selected>Alpha Savings (Twelve Months)</option>';
                                      }

                                    ?>
                   
                   
                  </select>
                </div>

            <div class="form-group">
                  <label for="savingsAmt">Amount</label>
                  <input type="number" style="width:100%;" class="form-control" id="savings-amt" name="savingsAmt" value="200" min="200" placeholder="minimum amout allowed for deposit 100" autocomplete="off">
                </div>
                
                 
            <div class="form-group">
                  <label for="channel">Channel</label>
                  <select class="form-control" id="channel" name="channel" style="width:100%">

                   <option value="1" selected>OTC Cash</option>
                   <option value="2">Bank Transfer</option>
                   <option value="3">POS</option>
                   <option value="4">ATM</option>
                   <option value="5">Mobile App</option>
                   
                  </select>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
          

            </form>

            <p style="color:green">Minimum allowed for deposit - 200 naira</p>
            <p style="color:green">Minimum allowed for withdrawal - 2000 naira</p>
            <p style="color:green">Maximum allowed for deposit - 1000000 naira</p>
            <p style="color:green">Maximum allowed for withdrawal - 1000000 naira</p>

            <br>

            <?php if($transactions): ?>   
                
              <table class="table table-bordered table-condensed table-hovered" style="margin-top:20px;">
              
              <thead style="border-bottom:2px solid #ccc">
                <tr >
                  <th>Date</th>
                  <th>Transaction Type</th>
                  <th>Details</th>
                  <th>Channel</th>
                  <th>Amount</th>
                </tr>
               <thead>

               <tbody>

               <?php foreach ($transactions as $k=>$v ): ?>

               <tr>
                  <td><?php  echo $v["date"]; ?></td>
                  <td><?php
                   if($v["type"]=="deposit") {
                   echo '<span style="color:orange">'.$v["type"].'</span>';}
                   else{
                    echo '<span style="color:green">'.$v["type"].'</span>';
                   }
                   
                   ?>
                   
                   </td>
                  <td><?php echo $v["description"]; ?></td>

                  <td><?php if($v["channel"]==1)
                    echo "OTC Cash";

                  else if($v["channel"]==2)
                  echo "Bank Transfer";
                  else if($v["channel"]==3)
                  echo "POS";
                  else if($v["channel"]==4)
                  echo "ATM";
                  else if($v["channel"]==5)
                  echo "Mobile App";

                      
                  
                  ?></td>

                  <td><?php echo '<span style="color:#808000">'. "₦".$v["amount"] .'</span>'?> </td>
                </tr>

                <?php endforeach ?>
                  <?php endif; ?>

              

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

  

