  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('dashboard');?>" class="brand-link">
    <!--  <img src="<?php echo base_url('assets/AdminLTE-3.0.2/');?>dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
      <span class="brand-text font-weight-light">Eminent Administrator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/AdminLTE-3.0.2/');?>dist/img/cat.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block user_id_text" ><?php echo $_SESSION['username'];?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        
         <?php if($user_permission){ 
		   if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)){ ?>
          <li class="nav-item has-treeview" id="li-users">
            <a href="#" class="nav-link" id="link-users">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Members
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			 <?php if(in_array('createUser', $user_permission)){ ?>
              <li class="nav-item">
                <a href="<?php echo base_url('members/create');?>" class="nav-link" id="add-users">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Member</p>
                </a>
              </li>
			  <?php }
			   if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)){ ?>
              <li class="nav-item">
                <a href="<?php echo base_url('members/accountMAnagers');?>" class="nav-link" id="account-managers">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Account Managers</p>
                </a>
              </li>
              
			
              <?php }
        if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)){ ?>
              <li class="nav-item">
                <a href="<?php echo base_url('members/manage');?>" class="nav-link" id="manage-users">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Individuals</p>
                </a>
              </li>
			  <?php }?>
            </ul>
          </li>
		  <?php }
		   if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)){ ?>
		  <li class="nav-item has-treeview" id="li-groups">
            <a href="#" class="nav-link" id="link-groups">
             
              <i class="nav-icon fas fa-piggy-bank"></i>
              <p>
                Savings Plans
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			<?php if(in_array('createGroup', $user_permission)){ ?>
             
              <?php }
			  // if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)){ ?>
              <li class="nav-item" id="alpha-savings-li" >
                <a href="<?php echo base_url('savingsplans/alpha/alphaIndex');?>" class="nav-link" id="manage-groups">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:orange">Alpha Savings</p>
                </a>
              </li>
          
			  <?php 
			   if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)){ ?>
              <li class="nav-item" >
                <a href="<?php echo base_url('groups/');?>" class="nav-link" id="manage-groups">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:orange">Eagles </p>
                </a>
              </li>
              <?php }
			   if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)){ ?>
              <li class="nav-item">
                <a href="<?php echo base_url('groups/');?>" class="nav-link" id="manage-groups">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:orange">Advanced (Vehicles)</p>
                </a>
              </li>
              <?php }
			   if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)){ ?>
              <li class="nav-item">
                <a href="<?php echo base_url('groups/');?>" class="nav-link" id="manage-groups">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:orange">Ijele</p>
                </a>
              </li>
              <?php }
			   if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)){ ?>
              <li class="nav-item">
                <a href="<?php echo base_url('groups/');?>" class="nav-link" id="manage-groups">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:orange">Idara</p>
                </a>
              </li>

              <?php }
			   if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)){ ?>
              <li class="nav-item">
                <a href="<?php echo base_url('groups/');?>" class="nav-link" id="manage-groups">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:orange">Isioma</p>
                </a>
              </li> 

			  <?php }?>
            </ul>
          </li>

          

          
		  <?php }
		    if(in_array('createStore', $user_permission) || in_array('updateStore', $user_permission) || in_array('viewStore', $user_permission) || in_array('deleteStore', $user_permission)){ ?>
          <li class="nav-item">
            <a href="<?php echo base_url('stores/');?>" class="nav-link" id="storesMainNav">
              <i class="nav-icon fas fa-h-square"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          
	
		  <?php }
		    }?>
		   <li class="nav-item">
            <a href="<?php echo base_url('auth/logout');?>" class="nav-link" id="profileMainNav">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Signout
              </p>
            </a>
          </li>		
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>