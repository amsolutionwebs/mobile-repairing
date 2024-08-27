<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if(isset($_GET['post']))
{
	$action = $_GET['action'];
	$id = $_GET['post'];
	$data_emp = $db->query("SELECT * FROM vendor_managment WHERE id='$id'");
	$value_emp = $data_emp->fetch_object();
	$post_status = $value_emp->status;
}


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card mt-2 px-1" style="border-top:3px solid tomato;">
              <!-- /.card-header -->
              <div class="row py-2 px-1 border-bottom" style="background: #e0f7e870;">
                <div class="col-11 px-2 d-flex">
                  <div class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-users" style="font-size: 25px; color:#fff;"></i> </div>
                  <h5 class="d-flex justify-content-center align-items-center text-center"> Vendor Details:-</h5> </div>
                  
                  <div class="col-1 px-2 d-flex">
                  <a href="vendor_management_list.php" class="mr-2 d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <i class="fa fa-arrow-left" style="font-size: 25px; color:#fff;"></i> </a>
                   </div>
              
              </div>
              <!--  -->
        
       
          
        <div class="row">
     
      
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Vendor Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"><?php echo $value_emp->vendor_name; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $value_emp->mobile_number; ?></p>
              </div>
            </div>
        
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Whatsapp Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $value_emp->whatsapp_number; ?></p>
              </div>
            </div>
            
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email Id</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $value_emp->email_id; ?></p>
              </div>
            </div>
            
            <hr>
             <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Country</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;">
                    
                    <?php $data_country = $db->query("SELECT * FROM countries WHERE id='$value_emp->country'");
                $value_country = $data_country->fetch_object();
                echo $value_country->country_name;?></p>
              </div>
            </div>
            <hr>
            
             <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">State</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"> <?php 
                   $data_state = $db->query("SELECT * FROM `states` WHERE id='$value_emp->state'");
                    $value_state = $data_state->fetch_object();
                    echo $value_state->state_name;
                    ?></p>
              </div>
            </div>
            <hr>
            
             <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">City</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"><?php echo $value_emp->city; ?></p>
              </div>
            </div>
            <hr>
           
            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Pincode</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $value_emp->pincode; ?></p>
              </div>
            </div>
            <hr>
            
             <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"><?php echo $value_emp->address; ?></p>
              </div>
            </div>
            <hr>
            
             <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Remark</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"><?php echo $value_emp->remark; ?></p>
              </div>
            </div>
            <hr>
            
               <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Status</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"><?php echo $post_status; ?></p>
              </div>
            </div>
            <hr>
            
               <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Opening Balance</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"><?php echo $value_emp->opening_blance; ?></p>
              </div>
            </div>
            <hr>
          </div>
        </div>
        
      </div>
    </div>
      
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.container-fluid -->
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
require_once("common/footer.php");
require_once("common/script.php");

?>
</body>
</html>