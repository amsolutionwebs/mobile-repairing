<?php

$usertype = $_SESSION['usertype_admin'];
$a_idchk = $_SESSION['user_id_admin'];
$store_id = $_SESSION['store_id'];
$user_id = $_SESSION['user_id_admin'];

?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-bold text-light">EMPLOYEE PANEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
           <?php $datapic = $db->query("SELECT profile_picture FROM admin WHERE id='$a_idchk'");
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

        <?php } ?>

        
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

          

          <li class="nav-item menu-open" >
            <a href="dashboard.php" class="nav-link <?php echo $page == 'dashboard.php' ? 'active':'' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a>
          </li>
        
  
          <li class="nav-header">SETTINGS SECTION</li>


         

                   	 	 <li class="nav-item">
							<a href="leads_management_list.php" class="nav-link <?php echo $page == 'leads_management_list.php' || $page == 'add_leads_management.php' || $page=='view_leads_managment.php' ? 'active':'' ?>"> <i class="nav-icon fas fa-book"></i>
								<p>Leads Management  </p>
							</a>
							
		</li>

                 

                   	 <li class="nav-item <?php echo $page == 'vendor_management_list.php' || $page == 'add_vendor_management.php' || $page == 'purhase_managment_list.php' || $page=='view_vendor_managment.php' || $page == 'add_purchase_managment.php' ? 'menu-is-opening menu-open':'' ?>">
							<a href="#" class="nav-link <?php echo $page == 'vendor_management_list.php' || $page == 'add_vendor_management.php' || $page == 'purhase_managment_list.php' || $page == 'add_purchase_managment.php' || $page=='view_vendor_managment.php' ? 'active':'' ?>"> <i class="nav-icon fa fa-users"></i>
								<p> Vendor Management <i class="fas fa-angle-left right"></i> </p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="vendor_management_list.php" class="nav-link <?php echo $page == 'vendor_management_list.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Vendor Management List</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="add_vendor_management.php" class="nav-link <?php echo $page == 'add_vendor_management.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Add Vendor Management</p>
									</a>
								</li>
								
								<li class="nav-item">
									<a href="purhase_managment_list.php" class="nav-link <?php echo $page == 'purhase_managment_list.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>P.O Management List</p>
									</a>
								</li>
								
								<li class="nav-item">
									<a href="add_purchase_managment.php" class="nav-link <?php echo $page == 'add_purchase_managment.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Add P.O Management</p>
									</a>
								</li>
								
							</ul>
		</li>
                 

                   	   <li class="nav-item <?php echo $page == 'category_list.php' || $page == 'add_category.php' || $page=='sub_category_list.php' || $page=='add_sub_category.php' || $page=='brand_list.php' || $page=='add_brand.php' || $page=='model_no_list.php' || $page=='add_model_number.php' || $page=='product_list.php' || $page=='add_product.php' || $page == 'variation_list.php' || $page == 'add_variation.php' || $page=='sub_variation_list.php' || $page=='add_sub_variation.php' || $page=='variation_product_images_list.php' || $page=='add_variation_product_images.php' || $page=='add_product_variation.php' || $page=='single_product_variation.php' ? 'menu-is-opening menu-open':'' ?>">
							<a href="#" class="nav-link <?php echo $page == 'category_list.php' || $page == 'add_category.php' || $page=='sub_category_list.php' || $page=='add_sub_category.php' || $page=='brand_list.php' || $page=='add_brand.php' || $page=='model_no_list.php' || $page=='add_model_number.php' || $page=='product_list.php' || $page=='add_product.php' || $page == 'variation_list.php' || $page == 'add_variation.php' || $page=='sub_variation_list.php' || $page=='add_sub_variation.php' || $page=='variation_product_images_list.php' || $page=='add_product_variation.php' || $page=='single_product_variation.php' || $page=='add_variation_product_images.php' ? 'active':'' ?>"> <i class="nav-icon fas fa-edit"></i>
								<p>Inventory Management  <i class="fas fa-angle-left right"></i> </p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="category_list.php" class="nav-link <?php echo $page == 'category_list.php' || $page=='add_category.php' ? 'active':'' ?> "> <i class="far fa-circle nav-icon"></i>
										<p>Category List</p>
									</a>
								</li>
								
								
								<li class="nav-item">
									<a href="sub_category_list.php" class="nav-link <?php echo $page == 'sub_category_list.php' || $page=='add_sub_category.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Sub Category List</p>
									</a>
								</li>

								
								<li class="nav-item">
									<a href="brand_list.php" class="nav-link <?php echo $page == 'brand_list.php' || $page=='add_brand.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Brand  List</p>
									</a>
								</li>
								
								
								<li class="nav-item">
									<a href="model_no_list.php" class="nav-link <?php echo $page == 'model_no_list.php' || $page=='add_brand.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Model Number List</p>
									</a>
								</li>
								
						
								
								
							<li class="nav-item">
							    	<a href="#" class="nav-link <?php echo $page == 'variation_list.php' || $page == 'add_variation.php' || $page=='sub_variation_list.php' || $page=='add_sub_variation.php' ? 'active':'' ?>"> <i class="nav-icon fas fa-edit"></i>
								<p>Variation  <i class="fas fa-angle-left right"></i> </p></a>
								
									<ul class="nav nav-treeview">
									    
									    <li class="nav-item">
									<a href="variation_list.php" class="nav-link <?php echo $page == 'variation_list.php' || $page=='add_variation.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Variation Type</p>
									</a>
								</li>
								
								<li class="nav-item">
									<a href="sub_variation_list.php" class="nav-link <?php echo $page == 'sub_variation_list.php' || $page=='add_sub_variation.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Sub Variation List</p>
									</a>
								</li>
							</ul>
							
							</li>	
							
								<li class="nav-item">
									<a href="product_list.php" class="nav-link <?php echo $page == 'product_list.php' || $page=='add_product.php' || $page=='single_product_variation.php' || $page=='variation_product_images_list.php' || $page=='add_variation_product_images.php' || $page=='add_product_variation.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Product List</p>
									</a>
								</li>
								
								
								
							</ul>
			</li>
                   	
                 

                   	  <li class="nav-item <?php echo $page == 'customer_management_list.php' || $page == 'add_customer_management.php' || $page == 'credit_management_list.php' || $page == 'view_refer_customer_list.php' || $page == 'view_customer_management' ? 'menu-is-opening menu-open':'' ?>">
							<a href="#" class="nav-link <?php echo $page == 'customer_management_list.php' || $page == 'add_customer_management.php' || $page == 'credit_management_list.php' || $page == 'view_refer_customer_list.php' || $page == 'view_customer_management' ? 'active':'' ?>"> <i class="nav-icon fa fa-id-card"></i>
								<p> Customer Management  <i class="fas fa-angle-left right"></i> </p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="customer_management_list.php" class="nav-link <?php echo $page == 'customer_management_list.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Customer Management List</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="add_customer_management.php" class="nav-link <?php echo $page == 'add_customer_management.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Add Customer Management</p>
									</a>
								</li>
								
								<li class="nav-item">
									<a href="credit_management_list.php" class="nav-link <?php echo $page == 'credit_management_list.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Credit Management List</p>
									</a>
								</li>
								
								
								
							</ul>
		</li>
                  
                   	 <li class="nav-item">
							<a href="order_management_list.php" class="nav-link <?php echo $page == 'order_management_list.php' || $page == 'add_order_management.php' ? 'active':'' ?>"> <i class="nav-icon fa fa-shopping-cart"></i>
								<p> Order Management   </p>
							</a>
						
		       </li>
                  
                   		 <li class="nav-item <?php echo $page == 'return_management_list.php' || $page == 'add_return_management.php' ? 'menu-is-opening menu-open':'' ?>">
							<a href="return_management_list.php" class="nav-link <?php echo $page == 'return_management_list.php' || $page == 'add_return_management.php' ? 'active':'' ?>"> <i class="nav-icon fa fa-window-close"></i>
								<p>Return Management   </p>
							</a>
							
		       </li>

		        <li class="nav-item <?php echo $page == 'repair_management_list.php' || $page == 'add_repair_management.php' || $page == 'por_repair_management_list.php' || $page=='add_por_repair_management.php' || $page=='add_product_repair_management.php' || $page=='update_repair_management.php' || $page=='view_repair_managment.php' || $page=='update_por_repair_management.php' || $page=='view_por_repair_management.php' || $page=='add_product_por_repair_management.php' ? 'menu-is-opening menu-open':'' ?>">
							<a href="#" class="nav-link <?php echo $page == 'repair_management_list.php' || $page == 'add_repair_management.php' || $page == 'por_repair_management_list.php' || $page=='add_por_repair_management.php' || $page=='update_repair_management.php' || $page=='add_product_repair_management.php' || $page=='view_repair_managment.php' || $page=='update_por_repair_management.php' || $page=='view_por_repair_management.php' || $page=='add_product_por_repair_management.php' ? 'active':'' ?>"> <i class="nav-icon fa fa-wrench"></i>
								<p>Repair Management  <i class="fas fa-angle-left right"></i> </p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="repair_management_list.php" class="nav-link <?php echo $page == 'repair_management_list.php' || $page=='view_repair_managment.php' || $page=='update_repair_management.php' || $page=='add_product_repair_management.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Repair List</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="por_repair_management_list.php" class="nav-link <?php echo $page == 'por_repair_management_list.php' || $page=='add_por_repair_management.php' || $page=='update_por_repair_management.php' || $page=='view_por_repair_management.php' || $page=='add_product_por_repair_management.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Purchase Repair List</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="add_repair_management.php" class="nav-link <?php echo $page == 'add_repair_management.php' ? 'active':'' ?>"> <i class="far fa-circle nav-icon"></i>
										<p>Add Repair</p>
									</a>
								</li>
							</ul>
		       </li>
                   	
                 
                   	<li class="nav-item">
							<a href="task_managment_list.php" class="nav-link <?php echo $page == 'task_managment_list.php' || $page == 'view_task_for_eng.php' ? 'active':'' ?>"> <i class="nav-icon fa fa-tasks"></i>
								<p>Task Managment </p>
							</a>
							
		       </li>
                   	
                   	<li class="nav-item <?php echo $page == 'purchase_managment_list.php' || $page == 'add_purchase_management.php' || $page == 'view_purchase_managment.php' ? 'menu-is-opening menu-open':'' ?>">
							<a href="purchase_managment_list.php" class="nav-link <?php echo $page == 'purchase_managment_list.php' || $page == 'add_purchase_management.php' || $page == 'view_purchase_managment.php' || $page=='view_purchase_management.php' ? 'active':'' ?>"> <i class="nav-icon fas fa-shopping-cart"></i>
								<p>Purchase Managment </p>
							</a>
						
		       </li>

                 
                   	<li class="nav-item">
							<a href="sales_managment_list.php" class="nav-link <?php echo $page == 'add_sales_managment.php' || $page == 'sales_managment_list.php' || $page == 'view_task_for_eng.php' || $page=='view_sales_managment.php' || $page=='add_product_sales_managment.php' || $page=='update_sales_managment.php' ? 'active':'' ?>"> <i class="nav-icon far fa-credit-card"></i>
								<p>Sales Managment  </p>
							</a>
						
		       </li>

                  
                    	<li class="nav-item <?php echo $page == 'earning_history.php' ? 'menu-is-opening menu-open':'' ?>">
							<a href="earning_history.php" class="nav-link <?php echo $page == 'earning_history.php' ? 'active':'' ?>"> <i class="nav-icon fa fa-rupee"></i>
								<p> Transations History  </p>
							</a>
							
		       </li>

                  
          
          <!-- report -->
          <li class="nav-item ">
							<a href="report.php" class="nav-link "> <i class="nav-icon fas fa-bar-chart"></i>
								<p>Report </p>
							</a>
							
						</li>  

          <!-- end report -->
           	<!--switch store  -->

						<!-- earning histroy -->
       


         
       
         
           


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