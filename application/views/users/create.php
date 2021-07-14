  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Member</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo validation_errors(); ?>
              
            </div>
          <?php } ?>

          <div class="card">

            <form role="form" action="<?php base_url('users/create') ?>" method="post">
              <div class="card-body">

                

                <div class="form-group">
                  <label for="groups">Membership</label>
                  <select class="form-control" id="groups" name="groups" style="width:100%">
                    <option value="">Membership Type</option>
                    <?php foreach ($group_data as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['group_name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="groups">Store</label>
                  <select class="form-control" id="store" name="store">
                    <option value="">Select store</option>
                    <?php foreach ($store_data as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="fname">First name</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="lname">Last name (Surname)</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="mname">Middle Name (if any)</label>
                  <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle name" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone Number" autocomplete="off">
                </div>

               <!-- <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
                </div>-->

               

                <div class="form-group">
                  <label for="phone">Alternative Phone Number</label>
                  <input type="phone" class="form-control" id="aphone" name="aphone" placeholder=" Second Phone Number" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="gender">Gender</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" value="1">
                      Male
                    </label> 
                    <label>
                      <input type="radio" name="gender" id="female" value="2">
                      Female
                    </label>
                  </div>
                </div>

                <div class="form-group"> <!-- Date input -->
                  <label class="control-label" for="date">Date of Birth</label>
                    <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date"/>
                </div>

                <div class="form-group">
                  <label for="groups">Marital Status</label>
                  <select class="form-control" id="groups" name="groups" style="width:100%">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                    
                  </select>`
                </div>

                <div class="form-group">
                  <label for="address">Residential Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Address" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="landmark">Landmark (Nearby Bus stop)</label>
                  <input type="text" class="form-control" id="bstop" name="bstop" placeholder="A-B Bustop, Ageri Street" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="city">City of Residence</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="City" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="lga">L.G.A</label>
                  <input type="text" class="form-control" id="lga" name="lga" placeholder="L.G.A" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="state">State of Residence</label>
                  <input type="text" class="form-control" id="state" name="state" placeholder="State" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="state">State of Origin</label>
                  <input type="text" class="form-control" id="ostate" name="sostate" placeholder="State of Origin" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="state">L.G.A of Origin</label>
                  <input type="text" class="form-control" id="olga" name="olga" placeholder="L.G.A of Origin" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="state">City of Origin</label>
                  <input type="text" class="form-control" id="ocity" name="ocity" placeholder="City of Origin" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="state">Origin/Hometown Address</label>
                  <input type="text" class="form-control" id="haddress" name="haddress" placeholder="Origin/Hometown Address" autocomplete="off">
                </div>

                <div class="form-group">
                <label for="groups">Preferred Govt Issued ID</label>
                  <select class="form-control" id="groups" name="groups" style="width:100%">
                    <option value="nationalID">National ID Card</option>
                    <option value="voterID">Voter's Card</option>
                    <option value="IntlPassport">International Passport</option>
                    <option value="DLicence">Driver's License</option>
                    
                  </select>`
                </div>

                <div class="form-group">
                  <label for="idnumber">ID Card Number</label>
                  <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="ID Card Number" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="nin">NIN </label>
                  <input type="text" class="form-control" id="nin" name="nin" placeholder="xxxxxxxxxxxxxx" autocomplete="off">
                </div>

              

             <h3 style="color:orange">Business Details</h3>

                
                <div class="form-group">
                  <label for="profession">Current Business/Profession</label>
                  <input type="text" class="form-control" id="profession" name="profession" placeholder="Current Business/Profession" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="profession">Business Address (Where You Work?)</label>
                  <input type="text" class="form-control" id="baddress" name="baddress" placeholder="Business Address" autocomplete="off">
                </div>


                <h3 style="color:orange">Next of Kin Details</h3>

                
                  <div class="form-group">
                    <label for="profession">Next of Kin Name</label>
                    <input type="text" class="form-control" id="kinname" name="kinname" placeholder="Next of KIN Full Name" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="profession">Next of KIN Phone</label>
                    <input type="text" class="form-control" id="kinphone" name="kinphone" placeholder="Next of Kin Phone" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="profession">Next of KIN Address</label>
                    <input type="text" class="form-control" id="kinaddress" name="kinaddress" placeholder="Next of Kin Address" autocomplete="off">
                  </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                </div>

               <!-- <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>-->

                <div class="form-group">
                  <label for="password">User password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
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
    $("#add-users").addClass('active');
    
  });
</script>
