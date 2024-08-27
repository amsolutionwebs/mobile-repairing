<?php 
include_once 'a_all_data.php';
include_once 'a_module_data.php';

$commission_select=$db->query("SELECT * FROM `employee_commission` WHERE employee_id='$user_id'"); 
$commission_fetch=$commission_select->fetch_object(); 
$emp_commission = $commission_fetch->commission;
?>
<style>
    .my_border_top
{
border-top: 8px solid #3794bf !important;
border-top-left-radius: 8px !important;
-moz-border-top-left-radius: 8px !important;
-webkit-border-top-left-radius: 8px !important;
border-top-right-radius: 8px !important;
-moz-border-top-right-radius: 8px !important;
-webkit-border-top-right-radius: 8px !important;
}
.my_background_color {
  background: #3794bf !important;
}
.test{border:2px solid red;}
.p-show-icon{
  position: absolute;
  right: 45px;
  margin-top: -29px;
  color:#ccc;
  z-index:1;
  cursor:pointer;
}
  </style>


<?php 
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
$usertype = $_SESSION['usertype'];
$a_idchk = $_SESSION['user_id'];

 ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed <?php echo $page == 'add_leads_management.php' || $page=='view_leads_managment.php' || $page=='view_vendor_managment.php' || $page=='add_vendor_management.php' || $page=='update_repair_management.php' || $page=='add_product_repair_management.php' || $page=='view_repair_managment.php' || $page=='view_por_repair_management.php' || $page=='add_product_por_repair_management.php' || $page=='update_por_repair_management.php' || $page=='view_sales_managment.php' || $page=='update_sales_managment.php' || $page=='add_product_sales_managment.php' || $page=='order_management_list.php' || $page=='add_repair_management.php' || $page=='vendor_purchase_managment_list.php' || $page=='add_vendor_purchase_management.php' || $page=='update_vendor_purchase_mangament.php' || $page=='view_vendor_purchase_management.php' || $page=='add_return_management.php' || $page=='product_list.php' || $page=='task_managment_list.php' || $page=='product_variation_view_list.php' || $page=='por_repair_management_list.php' || $page=='repair_management_list.php' || $page=='inventory.php' || $page=='category_list.php' || $page=='sub_category_list.php' || $page=='brand_list.php' || $page=='model_no_list.php' || $page=='variation_list.php' || $page=='sub_variation_list.php' || $page=='leads_management_list.php' || $page=='report.php' || $page=='purchase_managment_list.php' || $page=='sales_managment_list.php' || $page=='add_product_variation.php' || $page=='single_product_variation.php' ? 'sidebar-collapse':'' ?>">
<div id="setloader"></div>
    
<?php include_once 'msg.php'; ?>

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item mt-2">
        <a href="earning_history.php" style="color: #000;
    font-weight: bold;margin-top: 5px;">



  <?php 


    if ($employee_type=='Engineer' || $employee_type=='Salesman') { ?>
      <span class="mr-2 d-flex" style="flex-direction: row;align-items: center;"> <i class="fa fa-inr mr-1"></i>
        
        <?php  

    $query_all_amt = $db->query("SELECT sum(total_amount) as total_amount1 FROM repair_managment WHERE store_id='$store_id' AND user_id='$user_id' AND task='Complete'");
$value_total_amt = $query_all_amt->fetch_object();
$all_total_amount = $value_total_amt->total_amount1;



        $data4 = $db->query("SELECT sum(service_charge) as total_amt1 FROM repair_managment WHERE store_id='$store_id' AND user_id='$user_id' AND task='Complete'");
$total_amount1 = $data4->fetch_object();





$data5 = $db->query("SELECT sum(service_charge) as total_amt2 FROM por_repair_managment WHERE store_id='$store_id' AND user_id='$user_id' AND task='Complete'");
$total_amount5 = $data5->fetch_object();
$total_service_charge = $total_amount5->total_amt2+$total_amount1->total_amt1;

// service tax value

$dataservice = $db->query("SELECT sum(total_service_tax) as total_service_taxs FROM repair_managment WHERE store_id='$store_id' AND user_id='$user_id' AND task='Complete'");
$total_service_tax = $dataservice->fetch_object();

// service tax amount

$dataservice_amt = $db->query("SELECT sum(total_service_tax_amount) as total_service_tax_amounts FROM repair_managment WHERE store_id='$store_id' AND user_id='$user_id' AND task='Complete'");
$total_service_tax_amt = $dataservice_amt->fetch_object();
$service_tax_value = $total_service_tax_amt->total_service_tax_amounts;
// product amount purchase

$data_product_amt = $db->query("SELECT sum(total_product_purchase_amount) as total_product_purchase_amounts FROM repair_managment WHERE store_id='$store_id' AND user_id='$user_id' AND task='Complete'");
$total_data_product_amt = $data_product_amt->fetch_object();
$value_purchase_amt = $total_data_product_amt->total_product_purchase_amounts;




$totals1 = ($all_total_amount)-($service_tax_value+$value_purchase_amt);


echo number_format(($emp_commission / 100) * $totals1,2);


?>
                </span>
 <?php } ?>



        
              </a>
      </li>
    </ul>
     <marquee behavior="alternate" scrollamount="1"><h5 class="font-weight-bold text-dark" style="text-transform:uppercase;"><?php echo $company_name_login; ?> - <?php echo $loged_store_value->store_name; ?> (<?php echo $employee_type; ?>)</h5></marquee>
    <!-- SEARCH FORM -->
  

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <!--<li class="nav-item dropdown">-->
      <!--  <a class="nav-link" data-toggle="dropdown" href="#">-->
      <!--    <i class="far fa-bell"></i>-->
      <!--    <span class="badge badge-warning navbar-badge">15</span>-->
      <!--  </a>-->
      <!--  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">-->
      <!--    <span class="dropdown-item dropdown-header">15 Notifications</span>-->
      <!--    <div class="dropdown-divider"></div>-->
      <!--    <a href="#" class="dropdown-item">-->
      <!--      <i class="fas fa-envelope mr-2"></i> 4 new messages-->
      <!--      <span class="float-right text-muted text-sm">3 mins</span>-->
      <!--    </a>-->
      <!--    <div class="dropdown-divider"></div>-->
      <!--    <a href="#" class="dropdown-item">-->
      <!--      <i class="fas fa-users mr-2"></i> 8 friend requests-->
      <!--      <span class="float-right text-muted text-sm">12 hours</span>-->
      <!--    </a>-->
      <!--    <div class="dropdown-divider"></div>-->
      <!--    <a href="#" class="dropdown-item">-->
      <!--      <i class="fas fa-file mr-2"></i> 3 new reports-->
      <!--      <span class="float-right text-muted text-sm">2 days</span>-->
      <!--    </a>-->
      <!--    <div class="dropdown-divider"></div>-->
      <!--    <a href="notification.php" class="dropdown-item dropdown-footer">See All Notifications</a>-->
      <!--  </div>-->
      <!--</li>-->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      


      

      <li class="nav-item dropdown no-arrow">
         

              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: -5px;flex-direction: row;
    display: flex;
    justify-content: center;
    align-items: center;">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="text-transform: capitalize;">
                  
              <?php echo $a_company; ?>
                 
                </span>
                

                <?php $datapic = $db->query("SELECT profile_picture FROM employee WHERE id = '$a_idchk'");
    $valuepic = $datapic->fetch_object();
    $profile_picture = $valuepic->profile_picture;
    if(!empty($profile_picture)){ ?>
            <img src="<?php echo ROOTPIMG;?>/<?php echo $profile_picture; ?>" style="width:35px;height: 35px; border-radius:50%;" />
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
                
                
               
              </a>
              <!-- Dropdown - User Information -->
             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="update_profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
              
                <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#chang_password">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php?submit=logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
    </ul>
  </nav>
  <!-- /.navbar -->
 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="modal fade" id="chang_password">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
              <div class="col-sm-12 text-center mb-2">
                <center>
                  <?php $datapic = $db->query("SELECT profile_picture FROM supar_admin WHERE id = '$a_idchk'");
    $valuepic = $datapic->fetch_object();
    $profile_picture = $valuepic->profile_picture;
    if(!empty($profile_picture)){ ?>
            <img src="<?php echo ROOTPIMG;?>/<?php echo $profile_picture; ?>" style="width:80px;height: 80px; border-radius:50%;" />
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
          </center></div>
              <div class="col-sm-12">
            <h5 class="ml-4"><i class="fas fa-envelope text-success"></i> PLEASE FILL CAREFULLY DETAILS HERE !</h5></div>
              <form class="form-horizontal" action="updatep_action.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
          
                  <div class="form-group">
                    <input type="password" name="p_current_password" class="form-control current_password_p" placeholder="Current Password" >
                   <i class="fa fa-eye p-show-icon" style="font-size:18px;"></i>
                  </div>

                  <div class="form-group">
                    
                   <input type="password" name="p_new_password" class="form-control" id="password" placeholder="New Password">
                  
                  </div>
                  <div class="form-group ">
                  
                      <input type="password" name="p_confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                  
                  </div>

                  
                  

                  

                  <div class="form-group ">
                    
                      <input type="hidden" class="form-control" name="a_id" value="<?php echo $a_idchk; ?>">
                    
                  </div>

                   <div class="form-group ">
                   
                      <input type="submit" name="update_password" class="btn form-control" style="background-color: yellowgreen;color:white;" >
                    <span id='message'></span>
                  </div>

                </div>
                <!-- /.card-body -->
               
                <!-- /.card-footer -->
              </form>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div></div>
  </section>

  <!--  -->
  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="modal fade" id="social_links">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
              <div class="col-sm-12 text-center mb-2">
               <center>
                  <?php $datapic = $db->query("SELECT profile_picture FROM supar_admin WHERE id = '$a_idchk'");
    $valuepic = $datapic->fetch_object();
    $profile_picture = $valuepic->profile_picture;
    if($valuepic){ ?>
            <img src="<?php echo ROOTPIMG;?>/<?php echo $valuepic->profile_picture; ?>" style="width:80px;height: 80px; border-radius:50%;" />
        <?php }else{ ?>
          <img src="dist/img/No-Image-Basic.png" style="width:80px;height: 80px; border-radius:50%;" />

        <?php } ?>
          </center></div>
              <div class="col-sm-12">
            <h5 class="ml-4"><i class="fas fa-envelope text-success"></i> PLEASE FILL CAREFULLY DETAILS HERE !</h5></div>
              <form class="form-horizontal" action="social_links_action.php" method="post" enctype="multipart/form-data">
                <div class="card-body">

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone-alt" style="color: green;"></i></span>
                  </div>
                  <input type="number" class="form-control" placeholder="Professional Phone Number" name="phone" maxlength="10" minlength="10">
                </div>
          
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope" style="color: red;"></i></span>
                  </div>
                  <input type="email" class="form-control" name="email" placeholder="Professional email">
                </div>
                  
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-whatsapp" style="color: #25D366;"></i></span>
                  </div>
                  <input type="number" class="form-control" name="whatsapp_number" placeholder="Whatspp Number" minlength="10" maxlength="10">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-google" style="color: #EA4335;"></i></span>
                  </div>
                  <input type="url" class="form-control"  name="google_map" placeholder="Google Map">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-facebook-square" style="color: #4267B2;"></i></span>
                  </div>
                  <input type="url" class="form-control" name="facebook" placeholder="Facebook">
                </div>

                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-youtube" style="color: #FF0000;"></i></span>
                  </div>
                  <input type="url" class="form-control" name="youtube" placeholder="Youtube">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-instagram" style="color: red;"></i></span>
                  </div>
                  <input type="url" class="form-control" name="instagram" placeholder="Instagram">
                </div>


                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-twitter" style="color: #1DA1F2;"></i></span>
                  </div>
                  <input type="url" class="form-control" name="twitter" placeholder="Twitter">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-linkedin" style="color: #1293d2;"></i></span>
                  </div>
                  <input type="url" class="form-control" name="linkdin" placeholder="Linkdin">
                </div>

                  <div class="form-group ">
                    
                      <input type="hidden" class="form-control" name="user_id" value="<?php echo $a_idchk; ?>">
                    
                  </div>

                   <div class="form-group ">
                   
                      <input type="submit" name="update_social" class="btn form-control" style="background-color: yellowgreen;color:white;" >
                    <span id='message'></span>
                  </div>

                </div>
                <!-- /.card-body -->
               
                <!-- /.card-footer -->
              </form>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div></div>
  </section>



  