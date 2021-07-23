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
            <h1 class="m-0 text-dark">Activate User</h1>
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
         
           
         
             
              </div>
		 
            <!-- /.card-header -->
            <div class="card-body text-center" >
           
           
<br>

<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php
                 echo  "This member's registration is pending due to non-payment of registration fees. ";
           
              ?>
              
            </div>

            <h3 style="color:grey">Payment of registration fees by this user has not been confirmed. If otherwise, please press the button to activate the account</h3>

            <a href="<?php echo base_url('members/activate/'.$user_data["id"]); ?>"><button class="btn btn-primary" id="deactivate-btn" role="button">Activate Account</button></a>
           
           <br><p>*If you are activating this user for the first time please unsure receipt of the the right amount in membership fee</p>
         


            
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


