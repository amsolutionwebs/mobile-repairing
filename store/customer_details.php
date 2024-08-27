<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");


$user_id  =  $_GET['post'];
$data = $db->query("SELECT * FROM users WHERE id='$user_id'");
$value = $data->fetch_object();

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
           
          <div class="card mt-1 px-1" style="border-top:3px solid tomato;">
              <!-- /.card-header -->
              <div class="card-body">
               
               
  <section style="background-color: #eee;">
  <div class="container py-1">
    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body text-center">
            
            <h5 class="my-1">USER DETAILS</h5>
            
            
          </div>
        </div>
        
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="dist/img/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3" style="text-transform: capitalize;"><?php echo $value->user_name;?> <?php echo $value->user_last_name;?></h5>
            <p class="text-muted mb-1"><?php   echo $a_company; ?> User</p>
            
          </div>
        </div>
        
      </div>
      
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"><?php echo $value->user_name;?> <?php echo $value->user_last_name;?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $value->user_email;?></p>
              </div>
            </div>
        
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $value->mobile_number;?></p>
              </div>
            </div>
            <hr>
             <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Country</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"><?php $data3 = $db->query("SELECT * FROM country WHERE country_id='$value->country'");
                $value3 = $data3->fetch_object();
                echo $value3->country_name;?></p>
              </div>
            </div>
            <hr>
            
             <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">State</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"><?php  $data2 = $db->query("SELECT * FROM state WHERE state_id='$value->state'");
                $value2 = $data2->fetch_object();
                echo $value2->state_name;?></p>
              </div>
            </div>
            <hr>
            
             <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">City</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"><?php echo $value->city;?></p>
              </div>
            </div>
            <hr>
           
            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Pincode</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $value->pincode;?></p>
              </div>
            </div>
            <hr>
            
             <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address One</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"><?php echo $value->address_one;?></p>
              </div>
            </div>
            <hr>
            
             <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address Two</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="text-transform: capitalize;"><?php echo $value->address_two;?></p>
              </div>
            </div>
            <hr>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>     
               </div>
               
                
              </div>
              <!-- /.card-body -->
              
            </div>
          </div>
          <div class="col-md-1"></div>
      </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
   
  </div>
  <!-- /.content-wrapper -->
<?php 
require_once("common/footer.php");
require_once("common/script.php");
?>

</body>
</html>