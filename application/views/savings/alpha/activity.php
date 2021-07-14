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
            <h1 class="m-0 text-dark">Transactions - All Alpha Savings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transactions</li>
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
            <div class="card-body">
           
          
            <table class="custom-table">
  <tr>
    <th>Member</th>
    <th>Transaction Type</th>
    <th>Transaction Details</th>
    <th>Amount </th>
    <th>Date</th>
  </tr>

  <tr>
    <td>Amadi James</td>
    <td>Deposits</td>
    <td>Deposit to <b><span style="color:#32CD32">Alpha Savings 1  month plan.</span> </b><br><b>Amount: </b>₦20000</td>
    <td><span style="color:brown">₦20,000</span></td>
    <td>20/03/2020</td>
  </tr>

  <tr>
    <td>Kelly Adura</td>
    <td>Deposits</td>
    <td>Deposit to <b><span style="color:#32CD32">Alpha Savings 6  months plan. </span></b><br><b>Amount: </b>₦3000</td>
    <td><span style="color:brown">₦20,000</span></td>
    <td>20/03/2020</td>
  </tr>

  <tr>
    <td>Chime Chima</td>
    <td>Deposits</td>
    <td>Deposit to <b><span style="color:#32CD32">Alpha Savings 9  months plan. </span></b><br><b>Amount: </b>₦1200</td>
    <td><span style="color:brown">₦20,000</span></td>
    <td>20/03/2020</td>
  </tr>
 
</table>

<br>

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
    $(document).ready(function() {
      $("#alpha-savings-li").addClass('active');
    });
  </script>

