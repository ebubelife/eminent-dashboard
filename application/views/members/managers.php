<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Account Managers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Account Managers</li>
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

          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>
          
       

    


     
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage Users</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="userTable" class="table table-hover text-nowrap">
                  <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Phone</th>
                  <th>Alt. Phone</th>
                  <th>Email</th>
                  <th>D.O.B</th>
                  <th>Account ID</th>
                  <th>Gender</th>
                  <th>Marital Status</th>
                  <th>Profession</th>
                  <th>Kin - Name</th>
                  <th>Kin - Phone</th>
                  <th>Kin - Address</th>
                  <th>NIN</th>
                  <th>Account - Location</th>
                  <th>Account - ID </th>
                  <th>Residential Addr</th>
                  <th>Business Addr</th>
                  <th>Origin Addr</th>
                  <th>City - Origin</th>
                  <th>L.G.A - Origin</th>
                  <th>State - Origin</th>
                  <th>City - Residence</th>
                  <th>L.G.A - Residence</th>
                  <th>State - Residence</th>
                  
                  
                  <th>Membership Type</th>
                  <th>Account Manager</th>
                  



                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                  <tbody>
                  <?php if($user_data): ?>                  
                    <?php foreach ($user_data as $k => $v): ?>
                      <tr>
                        <td><?php echo $v['user_info']['firstname']." ".$v['user_info']['middlename']." ".$v['user_info']['lastname'];?></td>
                        <td><?php echo $v['user_info']['phone']; ?></td>
                        <td><?php echo $v['user_info']['altphone'] .' '. $v['user_info']['lastname']; ?></td>
                        <td><?php echo $v['user_info']['email']; ?></td>
                        <td><?php echo  $v['user_info']['birth_date']; ?></td>
                        <td><?php echo  $v['user_info']['gender']; ?></td>
                        <td><?php echo $v['user_info']['m_status']; ?></td>
                        <td><?php echo $v['user_info']['profession']; ?></td>
                        <td><?php echo $v['user_info']['kin_name'] .' '. $v['user_info']['lastname']; ?></td>
                        <td><?php echo $v['user_info']['kin_phone']; ?></td>
                        <td><?php echo $v['user_info']['kin_address']; ?></td>
                        <td><?php echo $v['user_info']['account_id']; ?></td>
                        <td><?php echo "232323" ?></td>
                        <td><?php echo $v['user_info']['nin']; ?></td>
                       


                        <td><?php echo $v['user_info']['firstname'] .' '. $v['user_info']['lastname']; ?></td>
                        <td><?php echo $v['user_info']['phone']; ?></td>
                        <td><?php echo "Member"; ?></td>
                        <td><?php echo "Member"; ?></td>
                        <td><?php echo "Ebube Emeka Life"?></td>
                        <td><?php echo $v['user_info']['email']; ?></td>
                        <td><?php echo $v['user_info']['firstname'] .' '. $v['user_info']['lastname']; ?></td>
                        <td><?php echo $v['user_info']['phone']; ?></td>
                        <td><?php echo "Member"; ?></td>
                        <td><?php echo "Member"; ?></td>
                        <td><?php echo "Member"; ?></td>
                        <td><?php echo "Member"; ?></td>

                        <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>

                        <td>
                          <?php if(in_array('updateUser', $user_permission)): ?>
                            <a href="<?php echo base_url('users/edit/'.$v['user_info']['id']) ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                          <?php endif; ?>
                          <?php if(in_array('deleteUser', $user_permission)): ?>
                            <a href="<?php echo base_url('users/delete/'.$this->atri->en($v['user_info']['id'])) ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                          <?php endif; ?>

                          <?php if(in_array('updateUser', $user_permission)): ?>
                            <a href="<?php echo base_url('users/delete/'.$this->atri->en($v['user_info']['id'])) ?>" class="btn btn-default"><i class="fa fa-eye"></i></a>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                      </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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
    $("#account-managers").addClass('active');
    });
  </script>
