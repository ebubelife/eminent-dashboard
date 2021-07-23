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
            <h1 class="m-0 text-dark">Transaction Confirmation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Member Profile</li>
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
         
          <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php
               echo  "This member's registration is pending due to non-payment of registration fees.";
              
              ?>
              
            </div>
         
             
              </div>
		 
            <!-- /.card-header -->
            <div class="card-body text-center" >
           
            
              
            <div class="col-lg-3 col-md-3 col-sm-12 single-info-card" style="display: inline-block;">

<p style="color:orange">Total Available Savings</p>
<h4> <?php echo "₦".$savings_balance;  ?> </h4>

<?php if ($savings_balance >= 1000){
echo '<p style="color:#32cd32">If you click the button below, the sum of  ₦1000 will be deducted as membership fee for this member</p>';

} 
else{

    echo '<p style="color:red">This member does not have enough funds in savings to complete this transaction</p>';

}

if($savings_balance >= 1000){
    
    ?>

<a href="<?php echo base_url('members/deduction/'.$member_id); ?>"><button class="btn btn-default" id="deactivate-btn" role="button">Pay ₦1000 </button></a>
 

    <?php

}

else{

?>
<a href="<?php echo base_url('members/deduction/'.$member_id); ?>"><button class="btn btn-default" id="deactivate-btn" role="button" disabled = "disable">Pay ₦1000 </button></a>
 

<?php }?>


                 

</div><!--/single-info-card-->

<br><br><hr>

<h3>OR YOU CAN MAKE A DIRECT DEPOSIT TO MAKE THIS PAYMENT</h3>


          


<div class="form-group">
                  <label for="savingsAmt">Amount</label>
                  <input type="text" style="width:100%;text-align:center" class="form-control" id="savings-amt" name="savingsAmt" value="₦1000" min="200" placeholder=" " autocomplete="off" readonly>
                </div>

                <a href="<?php echo base_url('members/direct_payment/'.$member_id); ?>"><button class="btn btn-default" id="deactivate-btn" role="button">Complete </button></a>





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


