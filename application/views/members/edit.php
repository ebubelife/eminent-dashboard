  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Profile - <span style="color:orange"><?php echo $user_data['firstname'] ?>  <?php echo $user_data['lastname'] ?> </span> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <?php if($this->session->flashdata('errors')){ ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php  echo validation_errors(); ?>
              
            </div>
          <?php } ?>

        

          <div class="card">

            <form role="form" action="<?php echo base_url('members/edit/'.$user_data["id"]) ?>" method="post">
              <div class="card-body">

                
<!--
                <div class="form-group">
                  <label for="groups">Membership</label>
                  <select class="form-control" id="groups" name="groups" style="width:100%">
                    <option value="">Membership Type</option>
                    <?php foreach ($group_data as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['group_name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>-->

                <div class="form-group">
                  <label for="groups">Membership</label>
                  <select class="form-control" id="groups" name="groups" style="width:100%">

                 <?php if($user_data['member_type']=="manager"):  ?>
                  <option value="member" >Member</option>
                   <option value="manager" selected >Account Manager</option>

                   <?php endif; ?>

                   <?php if($user_data['member_type']=="member"):  ?>
                  <option value="member" selected>Member</option>
                   <option value="manager"  >Account Manager</option>

                   <?php endif; ?>

                  
                   
                  </select>
                </div>

                
                <!-- Account loccation -->

                <div class="form-group">
                  <label for="groups">Account Location</label>
                  <select class="form-control" id="account-location" name="account-location" style="width:100%">
                     

                  <?php if($user_data['account_location']=="ufuma"):  ?>
                    <option value="account_location" selected>Ufuma</option>
                    <option value="account_location" >Asaba</option>
                  

                   <?php elseif($user_data['account_location']=="asaba"):  ?>
                    <option value="account_location" >Ufuma</option>
                    <option value="account_location" selected>Asaba</option>
                  
                    <?php else:  ?>
                    <option value="account_location" >Ufuma</option>
                    <option value="account_location" selected>Asaba</option>

                    

                   <?php endif; ?>

                    
                  
                    
                  </select>
                </div><br>

              

                <div class="form-group">
                  <label for="fname">First name</label>
                  <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user_data['firstname'] ?>" placeholder="First name" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="lname">Last name (Surname)</label>
                  <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user_data['lastname'] ?>" placeholder="Last name" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="mname">Middle Name (if any)</label>
                  <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $user_data['middlename'] ?>" placeholder="Middle name" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="phone" class="form-control" id="phone" name="phone" value="<?php echo $user_data['phone'] ?>" placeholder="Phone Number" autocomplete="off">
                </div>

               <!-- <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
                </div>-->

               

                <div class="form-group">
                  <label for="phone">Alternative Phone Number</label>
                  <input type="phone" class="form-control" id="aphone" name="aphone" value="<?php echo $user_data['altphone'] ?>" placeholder=" Second Phone Number" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select class="form-control" id="gender" name="gender">
                  
                  <?php if($user_data['gender']=="male"):  ?>

                    <option value="male">Male</option>
                    <option value="female">Female</option>


                    <?php elseif($user_data['gender']=="female"):  ?>

                      <option value="female">Female</option>
                    <option value="male">Male</option>
                 
                    <?php else:  ?>
                    <option value="female">Female</option>
                    <option value="male">Male</option>

                    <?php endif; ?>

                  
                    
                  </select>
                </div>

                <div class="form-group"> <!-- Date input -->
                  <label class="control-label" for="date">Date of Birth</label>
                    <input class="form-control" id="date" name="date" value="<?php echo $user_data['birth_date'] ?>" placeholder="MM/DD/YYY" type="date"/>
                </div>

                <div class="form-group"> <!-- Date input -->
                  <label class="control-label" for="date_of_reg">Date of Registration</label>
                    <input class="form-control" id="date_of_reg" value="<?php echo $user_data['date_of_registration'] ?>" name="date_of_reg" placeholder="MM/DD/YYY" type="date" required/>
                </div>

                <div class="form-group">
                  <label for="mstatus">Marital Status</label>
                  <select class="form-control" id="mstatus" name="mstatus" style="width:100%">
                 
                  <?php if($user_data['m_status']=="single"):  ?>
                    
                    
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>

                    <?php endif ?>


                    <?php if($user_data['m_status']=="married"):  ?>
                    
                      <option value="married">Married</option>
                    <option value="single">Single</option>
                    <option value="divorced">Divorced</option>

                    <?php elseif($user_data['m_status']=="divorced"):  ?>
                    
                    <option value="divorced">Divorced</option>
                    <option value="married">Married</option>
                   <option value="single">Single</option>

                   <?php else:  ?>
                    
                    <option value="divorced">Divorced</option>
                    <option value="married">Married</option>
                   <option value="single">Single</option>

                    <?php endif ?>

                   
                 

                    
                  </select>`
                </div>

                <div class="form-group">
                  <label for="address">Residential Address</label>
                  <input type="text" class="form-control" id="address" value="<?php echo $user_data['residence_address'] ?>" name="address" placeholder="Address" autocomplete="off">
                </div>
               
                <div class="form-group">
                  <label for="city">City of Residence</label>
                  <input type="text" class="form-control" id="city" name="city" value="<?php echo $user_data['residence_city'] ?>" placeholder="City" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="lga">L.G.A</label>
                  <input type="text" class="form-control" id="lga" name="lga" value="<?php echo $user_data['residence_lga'] ?>" placeholder="L.G.A" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="state">State of Residence</label>
                  <input type="text" class="form-control" id="state" name="state" value="<?php echo $user_data['residence_state'] ?>" placeholder="State" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="state">State of Origin</label>
                  <input type="text" class="form-control" id="ostate" name="ostate" value="<?php echo $user_data['origin_state'] ?>" placeholder="State of Origin" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="state">L.G.A of Origin</label>
                  <input type="text" class="form-control" id="olga" name="olga" value="<?php echo $user_data['origin_lga'] ?>" placeholder="L.G.A of Origin" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="state">City of Origin</label>
                  <input type="text" class="form-control" id="ocity" name="ocity" value="<?php echo $user_data['origin_city'] ?>" placeholder="City of Origin" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="state">Origin/Hometown Address</label>
                  <input type="text" class="form-control" id="haddress" name="haddress" value="<?php echo $user_data['origin_address'] ?>" placeholder="Origin/Hometown Address" autocomplete="off">
                </div>

                <div class="form-group">
                <label for="idcard">Preferred Govt Issued ID</label>
                  <select class="form-control" id="idcard" name="idcard" style="width:100%">
                 
                 
                    <option value="nationalID">National ID Card</option>
                    <option value="voterID">Voter's Card</option>
                    <option value="IntlPassport">International Passport</option>
                    <option value="DLicence">Driver's License</option>

                    
                  </select>
                </div>

                <div class="form-group">
                  <label for="idnumber">ID Card Number</label>
                  <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?php echo $user_data['id_number'] ?>" placeholder="ID Card Number" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="nin">NIN </label>
                  <input type="text" class="form-control" value="<?php echo $user_data['nin'] ?>" id="nin" name="nin" placeholder="xxxxxxxxxxxxxx" autocomplete="off">
                </div>

              

             <h3 style="color:orange">Business Details</h3>

                
                <div class="form-group">
                  <label for="profession">Current Business/Profession</label>
                  <input type="text" class="form-control" id="profession" name="profession" value="<?php echo $user_data['profession'] ?>" placeholder="Current Business/Profession" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="baddress">Business Address (Where You Work?)</label>
                  <input type="text" class="form-control" id="baddress" value="<?php echo $user_data['business_address'] ?>" name="baddress" placeholder="Business Address" autocomplete="off">
                </div>


                <h3 style="color:orange">Next of Kin Details</h3>

                
                  <div class="form-group">
                    <label for="kinname">Next of Kin Name</label>
                    <input type="text" class="form-control" id="kinname" value="<?php echo $user_data['kin_name'] ?>" name="kinname" placeholder="Next of KIN Full Name" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="kinphone">Next of KIN Phone</label>
                    <input type="text" class="form-control" id="kinphone" value="<?php echo $user_data['kin_phone'] ?>" name="kinphone" placeholder="Next of Kin Phone" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="kinaddress">Next of KIN Address</label>
                    <input type="text" class="form-control" id="kinaddress"  value="<?php echo $user_data['kin_address'] ?>" name="kinaddress" placeholder="Next of Kin Address" autocomplete="off">
                  </div>

                  <h3 style="color:orange">Bank Account Details</h3>

                <div class="form-group">
                  <label for="profession">Bank Account Number</label>
                  <input type="text" class="form-control" id="b_account_number" value="<?php echo $user_data['b_account_number']; ?>" name="b_account_number" placeholder="Bank Account NUmber" autocomplete="off" required>
                </div>

                <div class="form-group">
                  <label for="profession">Name On Bank Account</label>
                  <input type="text" class="form-control" id="b_account_name" value="<?php echo $user_data['b_account_name']; ?>" name="b_account_name" placeholder="Name On Bank Account" autocomplete="off" required>
                </div>

                <div class="form-group">
                  <label for="profession">Bank</label>
                  <input type="text" class="form-control" id="bank" value="<?php echo $user_data['bank']; ?>" name="bank" placeholder="Bank" autocomplete="off" required>
                </div>

                <h3 style="color:orange">Set Account Login</h3>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_data['email'] ?>" placeholder="Email" autocomplete="off">
                </div>

               <!-- <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>-->

                <div class="form-group">
                  <label for="password">User password</label>
                  <input type="password" class="form-control" id="password" value="xxxx" name="password" placeholder="Password" autocomplete="off">
                </div>

                
                

             

              </div>
              <!-- /.box-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
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
	$("#li-users").addClass('menu-open');
    $("#link-users").addClass('active');
  //  $("#add-users").addClass('active');
    
  });
</script>
