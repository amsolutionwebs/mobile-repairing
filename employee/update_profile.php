<?php 
require_once("common/header.php");
require_once("a_all_data.php");

?>
<style>
  .student_details td {
    padding: 5px !important;
  }
  table {
    border: none !important;
  }
  .text-right {
    font-weight: bold;
    text-align: right;
    background-color: lightblue;
  }

.avatar-wrapper{
  position: relative;
  height: 200px;
  width: 200px;
  margin: 50px auto;
  border-radius: 50%;
  overflow: hidden;
  box-shadow: 1px 1px 15px -5px black;
  transition: all .3s ease;
  }

</style>

<?php require_once("common/navbar.php");
require_once("common/sidebar.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h4 class="m-0"><i class="fas fa-envelope text-success"></i> UPDATE PROFILES HERE !</h4></div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo ROOTINDEX; ?>">Home</a></li>
              
              <li class="breadcrumb-item active">Update Profile</li>
            </ol>
          </div><!-- /.col -->
        </div>
      </div>
      <hr>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
<form class="update_profile" method="post" enctype="multipart/form-data" action="profile_action.php">
        <div class="row border mb-3 p-4" style="background-color: #fff !important;">
        
          <div class="col-md-12 d-flex justify-content-center">

        



            <div class="profile-pic avatar-wrapper" style="height: 200px; width: 200px;border-radius: 50%;border:1px solid #ddd; ">
             <?php $datapic = $db->query("SELECT profile_picture FROM employee WHERE id = '$a_idchk'");
    $valuepic = $datapic->fetch_object();
     $profile_picture = $valuepic->profile_picture;
    if(!empty($profile_picture)){ ?>
<img src="<?php echo ROOTPIMG;?>/<?php echo $profile_picture; ?>" id="output1" style="width: 100%; border:7px solid #fff;border-radius: 50%;width: 200px;height: 200px;" />
<?php
    }else{ ?><span style="width: 100%; border:7px solid #fff;
    border-radius: 50%;
    width: 200px;
    height: 200px;
    font-size: 116px;
    justify-content: center;
    display: flex;
    align-items: center;
    font-weight: bold;
    color: #0d613fd6;
    text-transform: uppercase;
    "><?php echo $character; ?></span>
<?php
    }?>

              
            </div>
          </div>

          <div class="col-md-12">
            
      <div class="form-group">
        <label>Choose Profile Pic </label>
        <input type="file" name="profile_image" class="form-control" onchange="loadFile(event)" /> </div>
    
      </div>


     
      <div class="col-md-6 ">
      <div class="form-group">
        <div class="custom-file">
          <label>Employee Id</label>
            <input type="text" name="employee_id" placeholder="Employee Id" class="form-control" value="<?php echo $employee_id; ?>" readonly />
                      
        </div>
       </div>
     </div>

       <div class="col-md-6 ">
      <div class="form-group">
        <div class="custom-file">
          <label>First Name</label>
            <input type="text" name="first_name" placeholder="First Name" class="form-control" value="<?php echo $ab1; ?>" required />
                      
        </div>
       </div>
     </div>

     <div class="col-md-6 ">
       <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="last_name" placeholder="Last Name" value="<?php echo $ab2; ?>" class="form-control" /> </div>
        
      </div>

   <div class="col-md-6 ">
      <div class="form-group">
        <div class="custom-file">
          <label>Email Id</label>
            <input type="email" name="email_id" placeholder="example@mail.com" value="<?php echo $email_id; ?>" class="form-control" required />
                      
        </div>
    </div>
    </div>
    
    <div class="col-md-6 ">
       
       <div class="form-group">
        <label>Mobile Number</label>
        <input type="text" name="phone" placeholder="Phone Number"  value="<?php echo $mobile_number; ?>" class="form-control" maxlength="10" minlength="10" required /> </div>
        
      </div>

      <div class="col-md-6 ">
       
       <div class="form-group">
        <label>Alternate Mobile Number</label>
        <input type="text" name="alternate_phone" placeholder="Alternate Phone Number" value="<?php echo $alternate_mobile_number; ?>" maxlength="10" minlength="10" class="form-control" required /> </div>
        
      </div>

      <div class="col-md-6 ">
       
       <div class="form-group">
        <label>Whatsapp Number</label>
        <input type="text" name="whatsapp_number" placeholder="Whatsapp Number" value="<?php echo $whatsapp_number; ?>" class="form-control" maxlength="10" minlength="10" required /> </div>
        
      </div>

       <div class="col-md-6 ">
      <div class="form-group">
        <div class="custom-file">
          <label>Age</label>
            <input type="number" name="age" placeholder="Age" value="<?php echo $age; ?>" class="form-control" maxlength="2" minlength="2" required />
                      
        </div>
       </div>
      </div>

      <div class="col-md-12 ">
      <div class="form-group">
        <div class="custom-file">
          <label>Address</label><textarea class="form-control" name="address" cols="2"><?php echo $address; ?></textarea>
                      
        </div>
       </div>
      </div>

      <div class="col-md-12 ">
      <div class="form-group">
        <input type="hidden" name="user_id" value="<?php echo $a_idchk; ?>" >
        <input type="submit" name="update_profile" class="btn form-control" style="background-color: yellowgreen;color:white;" > </div>
      </div>   
             
         
        <!-- /.row (main row) -->
      
    </div>
    </form>
    </div> 
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

     <!-- Main content -->
    <!-- /.content -->

  

    
   
  </div>
  <!-- /.content-wrapper -->
<?php 
require_once("common/footer.php");
require_once("common/script.php");

?>
<script>
loadFile = function (event) {
var output = document.getElementById('output1');
output.style.width = "200px";
output.style.height = "200px";
output.src = URL.createObjectURL(event.target.files[0]);
};
</script>
</body>
</html>
