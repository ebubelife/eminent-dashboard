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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Account Activity - <a href="">Ebube Life (0099221122)</a></li>
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

            <p style="color:orange">Total Alpha Savings</p>
            <h4>₦20,000 </h4>

            </div><!--/single-info-card-->

            <div class="col-lg-3 col-md-3 col-sm-12 single-info-card">

            <p style="color:orange">Total Alpha Savings - 30 Days</p>
            <h4> ₦12,000</h4>

            </div><!--/single-info-card-->


             
            <div class="col-lg-3 col-md-3 col-sm-12 single-info-card">
            <p style="color:orange">Available Funds</p>
            <h4> ₦18,000</h4>


            </div><!--/single-info-card-->

            <div class="col-lg-3 col-md-3 col-sm-12 single-info-card">
            <p style="color:orange">Withdrawn</p>
            <h4> ₦1,000</h4>

            </div><!--/single-info-card-->

            

            </div><br>

            <h2 class="m-0 text-dark">Update Savings </h2>
            <br>


            <form role="form" action="<?php echo  base_url('transactions/new/'.$user_data['id']) ?>" method="post">

          
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

                   <option value="Alpha Savings (One Month)" selected>Alpha One Month</option>
                   
                   
                  </select>
                </div>

            <div class="form-group">
                  <label for="savingsAmt">Amount</label>
                  <input type="text" style="width:100%;" class="form-control" id="savings-amt" name="savingsAmt" value="" placeholder="minimum amout allowed for deposit 100" autocomplete="off">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
          

            </form>

            <p style="color:green">Minimum allowed for deposit - 100 naira</p>
            <p style="color:green">Minimum allowed for withdrawal - 2000 naira</p>
            <p style="color:green">Maximum allowed for deposit - 1000000 naira</p>
            <p style="color:green">Maximum allowed for withdrawal - 1000000 naira</p>

            <br>


              <table class="table table-bordered table-condensed table-hovered" style="margin-top:20px;">
              
              <thead style="border-bottom:2px solid #ccc">
                <tr >
                  <th>Date</th>
                  <th>Transaction Type</th>
                  <th>Details</th>
                  <th>Amount</th>
                </tr>
               <thead>

               <tbody>

               <tr>
                  <td>20/04/2021</td>
                  <td>Deposit</td>
                  <td><b>Deposit</b> to <b>daily savings(one month)</b></td>
                  <td>N200 </td>
                </tr>

                <tr>
                  <td>20/04/2021</td>
                  <td>Deposit</td>
                  <td><b>Deposit</b> to <b>daily savings(one month)</b></td>
                  <td>N200 </td>
                </tr>

                <tr>
                  <td>20/04/2021</td>
                  <td>Deposit</td>
                  <td><b>Deposit</b> to <b>daily savings(one month)</b></td>
                  <td>N200 </td>
                </tr>

                <tr>
                  <td>20/04/2021</td>
                  <td>Deposit</td>
                  <td><b>Deposit</b> to <b>daily savings(one month)</b></td>
                  <td>N200 </td>
                </tr>

                

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

