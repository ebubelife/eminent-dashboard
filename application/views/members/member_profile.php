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
            <h1 class="m-0 text-dark">Member Profile</h1>
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
         
      <a href="<?php echo base_url('members/create') ?>" class="btn btn-primary">Add Member</a>
           
                <h3 class="card-title">&nbsp;</h3>
                <a href="<?php echo base_url('members/manage/suspend') ?>"><button class="btn btn-success" id="suspend-btn"  >Suspend</button></a>
            <a href="<?php echo base_url('members/manage/activate') ?>"><button class="btn btn-warning" id="activate-btn" role="button">Activate</button></a>
          
            <a href="<?php echo base_url('members/manage/deactivate') ?>"><button class="btn btn-default" id="deactivate-btn" role="button">De-activate</button></a>
          
         

                <div class="card-tools">

                
                  <a href="<?php echo base_url('members/edit');?>"><button class="btn btn-block btn-primary" role="button" role="button">Edit Profile</button></a>
                </div>
              </div>
		 
            <!-- /.card-header -->
            <div class="card-body">
           
            <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-12 single-info-card">

            <p style="color:orange">Total Alpha Savings - 1 month</p>
            <h4>₦20,000 - <a href="<?php echo base_url('members/memberActivity/'.$user_data['id']);?>">View Activity</a></h4>

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

            

            </div>

              <table class="table table-bordered table-condensed table-hovered" id="profile-table" style="margin-top:20px;">
                <tr>
                  <th>Membership Type</th>
                  <td><?php echo "Individual"; ?></td>
                </tr>
                <tr>
                  <th>Full Name</th>
                  <td><?php echo $user_data['firstname'] ."   " .$user_data['lastname']; ?></td>
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
                  <td><?php echo" +234 32121212"; ?></td>
                </tr>
                <tr>
                  <th>Gender</th>
                  <td><?php "female"; ?></td>
                </tr>

                <tr>
                  <th>D.O.B</th>
                  <td><?php echo "20/04/1988"; ?></td>
                </tr>

                <tr>
                  <th>Marital Status</th>
                  <td><?php echo "Single"; ?></td>
                </tr>

                <tr>
                  <th>Date Of Reg</th>
                  <td><?php echo $user_data['date_of_registration']; ?></td>
                </tr>
                
                <tr>
                  <th>Residential Addr</th>
                  <td><?php echo "Anambra Broadcasting Service, A232 Awka south, Awka"; ?></td>
                </tr>

                <tr>
                  <th>Landmark (Nearest B.stop)</th>
                  <td><?php echo "Arooma junction, Awka"; ?></td>
                </tr>

                <tr>
                  <th>City of Residence</th>
                  <td><?php echo "Awka"; ?></td>
                </tr>

                <tr>
                  <th>L.G.A of Residence</th>
                  <td><?php echo "Awka south"; ?></td>
                </tr>

                <tr>
                  <th>State of Residence</th>
                  <td><?php echo "Anambra"; ?></td>
                </tr>


                <tr>
                  <th>City of Origin</th>
                  <td><?php echo "Mbaise"; ?></td>
                </tr>

                <tr>
                  <th>L.G.A of Origin</th>
                  <td><?php echo "Ezinihitte Mbaise" ;?></td>
                </tr>

                <tr>
                  <th>State of Origin</th>
                  <td><?php echo "Imo State"; ?></td>
                </tr>


                <tr>
                  <th>Origin/Hometown Address</th>
                  <td><?php echo "Obizi, Ezinihitte, Mbaise"; ?></td>
                </tr>

                <tr>
                  <th>ID Card Type</th>
                  <td><?php echo "National ID"; ?></td>
                </tr>

                <tr>
                  <th>NIN</th>
                  <td><?php echo "101412106534"; ?></td>
                </tr>

                <tr>
                  <th>ID Card Number</th>
                  <td><?php echo "101412106534"; ?></td>
                </tr>

                <tr>
                  <th>Occupation</th>
                  <td><?php echo "IT Personnel"; ?></td>
                </tr>


                <tr>
                  <th>Business Address</th>
                  <td><?php echo "Apunam street, onitsha north, onitsha, Anambra"; ?></td>
                </tr>

                <tr>
                  <th>Next of Kin - Name</th>
                  <td><?php echo "Adaku" ?></td>
                </tr>

                <tr>
                  <th>Next of Kin - Addr</th>
                  <td><?php echo "Apunam street, onitsha north, onitsha, Anambra" ; ?></td>
                </tr>

                <tr>
                  <th>Next of Kin - Addr</th>
                  <td><?php echo "09022323323";  ?></td>
                </tr>

                <tr>
                  <th>Account Status</th>
                  <td style="color:green; font-weight:bold"><?php echo "<span id='account-status' style='green' >Pending</span>";  ?></td>
                </tr>

                <tr>
                  <th>Registration Status</th>
                  <td ><?php echo  "<span id='reg-status'>Complete</span>";  ?></td>
                </tr>

                <tr>
                  <th>Registration Mode</th>
                  <td ><?php echo  "Offline";  ?></td>
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

 if(y =="Complete" & z=="Pending"){
  
        $("#deactivate-btn").attr("disabled","disable");
        $("#suspend-btn").attr("disabled","disable");
   
 }

     
    });

  </script>

