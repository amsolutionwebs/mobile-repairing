
<?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1); ?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-bold text-dark"><?php if($usertype=='suparadmin')echo "SUPAR "; ?>ADMIN PANEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">


           <?php if($usertype=='suparadmin'){ ?>
             <?php $datapic = $db->query("SELECT profile_picture FROM supar_admin WHERE id='$a_idchk'");
   $valuepic = $datapic->fetch_object();
     $profile_picture = $valuepic->profile_picture;
    if(!empty($profile_picture)){ ?>
            <img src="<?php echo ROOTPIMG;?>/<?php echo $profile_picture; ?>" style="width:40px;height: 40px; border-radius:50%; border:2px solid #fff;" />
        <?php }else{ ?>
          <span style="width: 100%; border:1px solid #ccc;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    font-size: 20px;
    justify-content: center;
    display: flex;
    align-items: center;
    font-weight: bold;
    color: #0d613fd6;
    text-transform: uppercase;
    "><?php echo $character; ?></span>

        <?php } 



        ?>

           <?php }elseif ($usertype=='admin') { 

           $datapic = $db->query("SELECT profile_picture FROM admin WHERE id='$a_idchk'");
    $valuepic = $datapic->fetch_object();
     $profile_picture = $valuepic->profile_picture;
    if(!empty($profile_picture)){ ?>
            <img src="<?php echo ROOTPIMG;?>/<?php echo $profile_picture; ?>" style="width:40px;height: 40px; border-radius:50%; border:2px solid #fff;" />
        <?php }else{ ?>
          <span style="width: 100%; border:1px solid #ccc;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    font-size: 20px;
    justify-content: center;
    display: flex;
    align-items: center;
    font-weight: bold;
    color: #0d613fd6;
    text-transform: uppercase;
    "><?php echo $character; ?></span>

        <?php } } ?>



       
        




        
        </div>
        <div class="info">
          <a href="dashboard.php" class="d-block" style="text-transform: capitalize;">
            <?php echo $a_company; ?>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          

          <li class="nav-item menu-open" style="background-color: #dee2e6;">
            <a href="dashboard.php" class="nav-link <?php echo $page == 'dashboard.php' ? 'active':'' ?>" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a>
          </li>
        
  
          <li class="nav-header">SETTINGS SECTION</li>


         

          
          <?php if($usertype=='suparadmin'){ ?>

            <li class="nav-item <?php echo $page == 'master.php' || $page == 'admin_list.php' || $page == 'add_admin.php' ? 'menu-is-opening menu-open':'' ?>">
            <a href="#" class="nav-link <?php echo $page == 'master.php' || $page == 'admin_list.php' || $page == 'add_admin.php' ? 'active':'' ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Admin Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin_list.php" class="nav-link <?php echo $page == 'admin_list.php' ? 'active':'' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add_admin.php" class="nav-link <?php echo $page == 'add_admin.php' ? 'active':'' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Admin</p>
                </a>
              </li>
            </ul>
          </li>

         <?php }elseif ($usertype=='admin') { ?>


          <li class="nav-item">
            <a href="store_list.php" class="nav-link <?php echo $page == 'store_list.php' || $page == 'add_store.php' ? 'active':'' ?>">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
               Store Details
               
              </p>
            </a>
           
          </li>

       <li class="nav-item">
            <a href="user_type_list.php" class="nav-link <?php echo $page == 'user_type_list.php' || $page == 'add_user_type.php' ? 'active':'' ?>">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
               User Type
                
              </p>
            </a>
          
          </li>

           <li class="nav-item">
            <a href="employee_list.php" class="nav-link <?php echo $page == 'add_module_permission.php' || $page == 'employee_list.php' || $page == 'add_employee.php' || $page=='add_user_type_to_user.php' || $page=='add_commission.php' || $page=='add_store_to_employee.php' || $page=='add_module_employee.php'  ? 'active':'' ?>">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
               Employees
               
              </p>
            </a>
          </li>


           <li class="nav-item">
            <a href="employee_details.php" class="nav-link <?php echo $page=='employee_details.php'  || $page == 'user_list_by_user_type.php' || $page == 'employee_commission_list.php' || $page == 'user_module_list.php' || $page == 'employee_store_list.php' || $page == 'employee_permission_list.php' ? 'active':'' ?>">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
               Employee Details
                
              </p>
            </a>
           
          </li>


          



          <?php } ?>

          


         
       
         
           <li class="nav-item">
            <a href="state_list.php" class="nav-link <?php echo $page == 'state_list.php' || $page=='add_state.php' ? 'active':'' ?>">
              <i class="nav-icon fas fa-city"></i>
              <p>
              State
              
              </p>
            </a>
           
          </li>


          <li class="nav-item">
            <a href="logout.php?submit=logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
            
          </li>
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>