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
            <h1 class="m-0 text-dark">Activation Status</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Activation</li>
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

           
            <?php if($assign_status == 1):?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php
               echo  "Account officer has been successfully assigned" ."<a href='".base_url("members/profile/".$id)."' style='font-weight:600;'>". "  Back to profile"."</a> ";
              
              ?>
              
            </div>

            

            <?php endif;?>

            <div class="row">

          
                 <div class="col-md-12 col-xs-12 text-center ">

               <!--  <i class="fa fa-check" style="font-size:40px; color:#32cd32;"></i>-->
                 
               
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

