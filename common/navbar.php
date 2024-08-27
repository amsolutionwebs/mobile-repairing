<?php 
include_once 'a_all_data.php';
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

</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
    </ul>
     <marquee behavior="alternate" scrollamount="1"><h5 class="font-weight-bold text-dark"><?php echo $company_name_login; ?></h5></marquee>
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
              
                <?php if($usertype=='suparadmin'){ ?>
             <?php $datapic = $db->query("SELECT profile_picture FROM supar_admin WHERE id='$a_idchk'");
    $valuepic = $datapic->fetch_object();
     $profile_picture = $valuepic->profile_picture;
    if(!empty($profile_picture)){ ?>
            <img src="<?php echo ROOTPIMG;?>/<?php echo $profile_picture; ?>" style="width:35px;height: 35px; border-radius:50%; border:2px solid #fff;" />
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
            <img src="<?php echo ROOTPIMG;?>/<?php echo $profile_picture; ?>" style="width:35px;height: 35px; border-radius:50%; border:2px solid #fff;" />
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


              </a>
              <!-- Dropdown - User Information -->
             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="update_profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <!--<a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#social_links">-->
                <!--  <i class="fas fa-bell fa-sm fa-fw mr-2 text-gray-400"></i>-->
                <!--  <i class="fa-solid fa-share-nodes"></i>-->
                <!--  Social Links-->
                <!--</a>-->
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
                 <?php if($usertype=='suparadmin'){ ?>
             <?php $datapic = $db->query("SELECT profile_picture FROM supar_admin WHERE id='$a_idchk'");
     $valuepic = $datapic->fetch_object();
     $profile_picture = $valuepic->profile_picture;
    if(!empty($profile_picture)){ ?>
            <img src="<?php echo ROOTPIMG;?>/<?php echo $profile_picture; ?>" style="width:35px;height: 35px; border-radius:50%; border:2px solid #fff;" />
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
            <img src="<?php echo ROOTPIMG;?>/<?php echo $profile_picture; ?>" style="width:35px;height: 35px; border-radius:50%; border:2px solid #fff;" />
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
      <div class="modal fade" id="delete_model">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
              <div class="col-sm-12 text-center mb-2">
                <center>
                 <?php if ($usertype=='admin') { 

           $datapic = $db->query("SELECT profile_picture FROM admin WHERE id='$a_idchk'");
    $valuepic = $datapic->fetch_object();
     $profile_picture = $valuepic->profile_picture;
    if(!empty($profile_picture)){ ?>
            <img src="<?php echo ROOTPIMG;?>/<?php echo $profile_picture; ?>" style="width:35px;height: 35px; border-radius:50%; border:2px solid #fff;" />
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
          </center></div>
              <div class="col-sm-12">
            <h5 class="ml-4"><i class="fas fa-envelope text-success"></i> ENTER OTP FOR DELETE DATA HERE !</h5>
          </div>
              <form class="form-horizontal" action="delete_otp_match.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
          
                 

                  <div class="form-group">
                    
                   <input type="text" maxlength="6" minlength="6"  name="otp" class="form-control" id="otp" placeholder="Please enter six digit otp " oninput="validateNumberInput(this)">
                  
                  </div>
                  

                  
                  

                  

                  <div class="form-group ">
                    
                      <input type="hidden" name="user_id" value="<?php echo $a_idchk; ?>">
                      <input type="hidden" name="delete_id" id="delete_id" value="<?php echo $a_idchk; ?>">
                      <input type="hidden" name="delete_type" id="delete_type" value="store_delete">

                  </div>

                   <div class="form-group ">
                    <input type="hidden" name="submit" value="submit">
                      <input type="submit" name="submit" value="submit" class="btn form-control" style="background-color: yellowgreen;color:white;" >
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
      <div class="modal fade" id="delete_supar_admin_model">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
             
              <div class="col-sm-12">
            <h5 class="ml-4"><i class="fas fa-envelope text-success"></i> ENTER OTP FOR DELETE DATA HERE !</h5>
          </div>
              <form class="form-horizontal" action="delete_otp_match_supar_admin.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
          

                  <div class="form-group">
                    
                   <input type="text" maxlength="6" minlength="6"  name="otp" class="form-control" id="otp" placeholder="Please enter six digit otp " oninput="validateNumberInput(this)">
                  
                  </div>
                  

                  
                  

                  

                  <div class="form-group ">
                    
                      <input type="hidden" name="user_id" value="<?php echo $a_idchk; ?>">
                      <input type="hidden" name="delete_id" id="delete_id_supar_admin" >
                      <input type="hidden" name="delete_type_supar_admin" id="delete_type" value="admin_delete">

                  </div>

                   <div class="form-group ">
                    <input type="hidden" name="submit" value="submit">
                      <input type="submit" name="submit" value="submit" class="btn form-control" style="background-color: yellowgreen;color:white;" >
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
  <!---->
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
                 <?php if($usertype=='suparadmin'){ ?>
             <?php $datapic = $db->query("SELECT profile_picture FROM supar_admin WHERE id='$a_idchk'");
     $valuepic = $datapic->fetch_object();
     $profile_picture = $valuepic->profile_picture;
    if(!empty($profile_picture)){ ?>
            <img src="<?php echo ROOTPIMG;?>/<?php echo $profile_picture; ?>" style="width:35px;height: 35px; border-radius:50%; border:2px solid #fff;" />
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
            <img src="<?php echo ROOTPIMG;?>/<?php echo $profile_picture; ?>" style="width:35px;height: 35px; border-radius:50%; border:2px solid #fff;" />
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