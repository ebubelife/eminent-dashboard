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
            <h1 class="m-0 text-dark">Downlines -  <span style="color: #357ec7"><?php echo $user_data['firstname'] ." " .$user_data['lastname']; ?></span> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('members/profile/'.$user_data['id'])?>">Downlines</a></li>
              <li class="breadcrumb-item active"><a href=""><?php echo $user_data['firstname'] ." " .$user_data['lastname']; ?></a></li>
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

                <a href="<?php echo base_url('members/manage/suspend') ?>"><button class="btn btn-default" id="suspend-btn"  >Managed Accounts:<b> 17</b></button></a>

                <a href="<?php echo base_url('members/manage/suspend') ?>"><button class="btn btn-default" id="suspend-btn"  > Alpha 1 Accounts: <b>1</b></button></a>

                <a href="<?php echo base_url('members/manage/suspend') ?>"><button class="btn btn-default" id="suspend-btn"  > Alpha 3 Accounts: <b>5</b></button></a>

                <a href="<?php echo base_url('members/manage/suspend') ?>"><button class="btn btn-default" id="suspend-btn"  > Alpha 6 Accounts: <b>1</b></button></a>

                <a href="<?php echo base_url('members/manage/suspend') ?>"><button class="btn btn-default" id="suspend-btn"  >Alpha 9 Accounts: <b>7</b></button></a>

                <a href="<?php echo base_url('members/manage/suspend') ?>"><button class="btn btn-default" id="suspend-btn"  >Alpha 12 Accounts: <b>3</b></button></a>


              


               
              </div>
		 
            <!-- /.card-header -->
            <div class="card-body">

            <div class="row">

            <?php if($downline_data):?>

            <table class="table downlines table-bordered table-condensed table-hovered" style="margin-top:20px;">
              
              <thead style="border:1px solid #ccc;">
                <tr>
                  <th>Full Name</th>
                  <th>Date Joined</th>
                  <th>Current Alpha Plan</th>
                  <th>Alpha Bal</th>
                  <th>Comm. yield count</th>
                  <th>Alpha Join Date</th>
                  <th>Alpha End Date</th>
                  <th>Alpha Plan Status</th>
                  <th>Details</th>
                 
                </tr>
               <thead>

               <tbody>

              
               <?php foreach ($downline_data as $k=>$v ): ?>
               <tr >
               <td><a href="<?php base_url("members/profile/".$v["user_info"]["id"]); ?>"><?php echo $v["user_info"]["firstname"] ."  ". $v["user_info"]["lastname"] ?></b></td>
               <td><?php echo $v["user_info"]["date_of_registration"]?></td>
               <td><?php if(isset($v["downline_alpha_details"]))
                          echo  $v["downline_alpha_details"]["savings_plan"];

                          else
                           echo "Nil";
               
               ?></td>
               <td><?php if(isset($v["downline_alpha_details"]))
                          echo  $v["downline_alpha_details"]["current_alpha_balance"];

                          else
                           echo "Nil";
               
               ?></td>
               <td><?php echo $v["user_info"]["comm_yield_count"]?></td>
               <td><?php if(isset($v["downline_alpha_details"]))
                          echo  $v["downline_alpha_details"]["join_date"];

                          else
                           echo "Nil";
               
               ?></td>
               <td><?php if(isset($v["downline_alpha_details"]))
                          echo  $v["downline_alpha_details"]["end_date"];

                          else
                           echo "Nil";
               
               ?></td>

<td><span style="font-weight:bold; color:orange"><?php if(isset($v["downline_alpha_details"]))
                          echo  $v["downline_alpha_details"]["status"];

                          else
                           echo "Nil";
               
               ?></span></td>

               <td><a href="<?php  echo base_url("members/downline_data/".$v["user_info"]["id"]."/".$v["user_info"]["firstname"] ."-". $v["user_info"]["lastname"]);?>">View Details</a></td>

              

               </tr>

         

             <?php endforeach; ?>
            
              

               </tbody>


              </table>

              <?php endif?>

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

  

