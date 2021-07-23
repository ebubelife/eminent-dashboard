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
            <h1 class="m-0 text-dark"><?php  if($user_data['member_type']=='member') echo "Member Profile -"; if($user_data['member_type']=='manager') echo "Account Manager-"?>  <span style="color:#357ec7"><?php echo $user_data['firstname'] ." " .$user_data['lastname']; ?></span> </h1>
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
         
               
                <h3 class="card-title">&nbsp;</h3>
              <?php if(!$user_data['member_type']=='manager'){?>
                <a href="<?php echo base_url('members/manage/suspend') ?>"><button class="btn btn-success" id="suspend-btn"  >Suspend</button></a>

                <?php } ?>

          
          
          <!--  <a href="<?php //echo base_url('members/manage/deactivate') ?>"><button class="btn btn-danger" id="deactivate-btn" role="button" disabled = "disable">Delete</button></a>-->
          
            <a href="<?php echo base_url('members/memberActivity/'.$user_data['id']); ?>"><button class="btn btn-default" id="deactivate-btn" role="button">Account Activity</button></a>
         
          <?php if($user_data['member_type']=='manager'){ ?> 
          <a href="<?php echo base_url('members/memberActivity/'.$user_data['id']); ?>"><button class="btn btn-default" id="deactivate-btn" role="button">View Managed Accounts</button></a>
          <?php }?>
            
         
         
                <div class="card-tools">

                
                  <a href="<?php echo base_url('members/edit/'.$user_data['id']);?>"><button class="btn btn-block btn-primary" role="button" role="button">Edit Profile</button></a>
                </div>
              </div>
		 
            <!-- /.card-header -->
            <div class="card-body">
           
           
<br>
<?php if($verifyMembership==null): ?>
<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php
               echo  "This member's registration is pending due to non-payment of registration fees. You can  "."<a href='".base_url("members/confirm_pay/".$user_data["id"])."' style='font-weight:600;'>". "      deduct the fee from savings"."</a> ";
              
              ?>
              
            </div>

            <?php endif;?>

            <?php if(!$user_data['account_manager']>0): ?>

              <?php if($user_data['member_type']=='member'): ?>

            <div class="alert alert-primary alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php
               echo  "This account has not been assigned an account manager. You can  "."<a href='".base_url("members/assign_Officer/".$user_data["id"])."' style='font-weight:600;'>". "    Assign an account manager"."</a> ";
              
              ?>
              
            </div>
            <?php endif;?>
            <?php endif;?>


              <table class="table table-bordered table-condensed table-hovered" id="profile-table" style="margin-top:20px;">
                <tr>
                  <th>Membership Type</th>
                  <td><?php echo "Individual"; ?></td>
                </tr>
                <tr>
                  <th>Full Name</th>
                  <td><?php echo $user_data['firstname'] ."   ".$user_data['middlename']. "   " .$user_data['lastname']; ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $user_data['email']; ?></td>
                </tr>
                <tr>
                  <th>Main Phone</th>
                  <td><?php echo  $user_data['phone']; ?></td>
                </tr>
                <tr>
                  <th>Alt. Phone</th>
                  <td><?php echo $user_data['altphone']; ?></td>
                </tr>
                <tr>
                  <th>Gender</th>
                  <td><?php echo  $user_data['gender']; ?></td>
                </tr>

                <tr>
                  <th>D.O.B</th>
                  <td><?php echo $user_data['birth_date']; ?></td>
                </tr>

                <tr>
                  <th>Marital Status</th>
                  <td><?php echo $user_data['m_status']; ?></td>
                </tr>

                <tr>
                  <th>Date Of Reg</th>
                  <td><?php echo $user_data['date_of_registration']; ?></td>
                </tr>

                
                
                <tr>
                  <th>Residential Addr</th>
                  <td><?php echo $user_data['residence_address']; ?></td>
                </tr>

            
                <tr>
                  <th>City of Residence</th>
                  <td><?php echo $user_data['residence_city']; ?></td>
                </tr>

                <tr>
                  <th>L.G.A of Residence</th>
                  <td><?php echo $user_data['residence_lga'];; ?></td>
                </tr>

                <tr>
                  <th>State of Residence</th>
                  <td><?php echo $user_data['residence_state']; ?></td>
                </tr>


                <tr>
                  <th>City of Origin</th>
                  <td><?php echo $user_data['origin_city']; ?></td>
                </tr>

                <tr>
                  <th>L.G.A of Origin</th>
                  <td><?php echo $user_data['origin_lga'] ;?></td>
                </tr>

                <tr>
                  <th>State of Origin</th>
                  <td><?php echo $user_data['residence_state']; ?></td>
                </tr>


                <tr>
                  <th>Origin/Hometown Address</th>
                  <td><?php echo $user_data['origin_address']; ?></td>
                </tr>

                <tr>
                  <th>ID Card Type</th>
                  <td><?php echo $user_data['id_card']; ?></td>
                </tr>

                <tr>
                  <th>NIN</th>
                  <td><?php echo $user_data['nin']; ?></td>
                </tr>

                <tr>
                  <th>ID Card Number</th>
                  <td><?php echo $user_data['nin']; ?></td>
                </tr>

                <tr>
                  <th>Occupation</th>
                  <td><?php echo $user_data['profession']; ?></td>
                </tr>


                <tr>
                  <th>Business Address</th>
                  <td><?php echo $user_data['business_address']; ?></td>
                </tr>

                <tr>
                  <th>Next of Kin - Name</th>
                  <td><?php echo $user_data['kin_name']; ?></td>
                </tr>

                <tr>
                  <th>Next of Kin - Addr</th>
                  <td><?php echo $user_data['kin_address']; ?></td>
                </tr>

                <tr>
                  <th>Next of Kin - Phone</th>
                  <td><?php echo $user_data['kin_phone'];  ?></td>
                </tr>

</table><br>

<h3 style="color:#357ec7">REGISTRATION DETAILS</h3>
<table class="table table-bordered table-condensed table-hovered" id="profile-table" style="margin-top:20px;">

<?php if($user_data['member_type']=='member'){?>
                <tr>
                  <th>Account Manager</th>
                  <td style="color:#357ec7; font-weight:bold"><?php if($account_manager_name) {
                  echo "<span id='account-status' style='green;cursor:pointer;text-decoration:underline;' >". $account_manager_name."</span>" ;  
                  } ?>- <span ><a style="color:green;cursor:pointer;text-decoration:underline;" href ="<?php echo  base_url("members/assign_Officer/".$user_data["id"])?>">Change</a></span></td>
                </tr>
<?php }?>

                <tr>
                  <th>Account Status</th>
                  <td style="color:#357ec7; font-weight:bold"><?php echo "<span id='account-status' style='green' >". $user_data['account_status']."</span>";  ?></td>
                </tr>

                <tr>
                  <th>Registration Status</th>
                  <td ><?php echo  "<span id='reg-status' style='color:orange; font-weight:bold'>".$user_data['reg_status']."</span>";  ?></td>
                </tr>

                <tr>
                  <th>Registration Mode</th>
                  <td ><?php echo  "<span id='reg-status'>".$user_data['mode_of_reg']."</span>";  ?></td>
                </tr>

                <tr>
                  <th>Account Number</th>
                  <td ><b><?php echo  "<span id='reg-status'>".$user_data['account_id']."</span>";  ?></b></td>
                </tr>

              
               


              </table><br>

              <h3 style="color:#357ec7">BANK DETAILS</h3>

              <table class="table table-bordered table-condensed table-hovered" id="profile-table" style="margin-top:20px;">
                <tr>
                  <th>Bank Account Number</th>
                  <td><?php echo "009900221122"; ?></td>
                </tr>
                <tr>
                  <th>Bank Account Name</th>
                  <td><?php echo $user_data['b_account_name']; ?></td>
                </tr>
                <tr>
                  <th>Bank Account Number</th>
                  <td><?php echo $user_data['b_account_number']; ?></td>
                </tr>
                <tr>
                  <th>Bank</th>
                  <td><b><?php echo  $user_data['bank']; ?></b></td>
                </tr>

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
  /*  $(document).ready(function() {
      $("#profileMainNav").addClass('active');
    });*/
  </script>

<script>

$(document).ready(function() {

var y = $("#reg-status").html();
var z = $("#account-status").html();

 if(y =="complete" & z=="pending"){
  
        $("#deactivate-btn").attr("disabled","disable");
        $("#suspend-btn").attr("disabled","disable");
   
 }

 if(z=="active"){

  $("#activate-btn").attr("disabled","disable");
       

 }

  $("$activate-btn").click({

    alert("hello world");

  });

     
    });

  </script>

