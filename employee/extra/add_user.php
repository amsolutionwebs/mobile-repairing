<?php 
require_once("common/header.php");
require_once("common/navbar.php");
require_once("common/sidebar.php");

if($_GET['action']){
$action = $_GET['action'];
$id = $_GET['post'];
$get_data = "SELECT * FROM pages WHERE id='$id'";
$response = $db->query($get_data);
$data = $response->fetch_assoc();
$post_title = $data['post_title'];
$post_content = $data['post_content'];
$seo_title = $data['seo_title'];
$meta_keywords = $data['meta_keywords'];
$meta_description = $data['meta_description'];
$canonical_tag = $data['canonical_tag'];
$post_status = $data['post_status'];
$sort_order = $data['sort_order'];
$post_image = $data['post_image'];


}

$data = $db->query("SELECT * FROM users ORDER BY id DESC LIMIT 1");
$value = $data->fetch_object();

$recipt_name = $value->registration_number;
if($recipt_name=='')
{
  $freciept_name = 'NIDHI'."-REG-01";
}else
{
  $explode_val= explode("-",$recipt_name);
  $exe_value =  $explode_val[2]+1;
  $freciept_name = 'NIDHI'.'-REG-0'.$exe_value;
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
                  <h5 class="d-flex justify-content-center align-items-center text-center">Add User</h5> </div>
                <div class="col-1 d-flex justify-content-right align-items-right">
                  <div class="d-flex justify-content-center align-items-center" style="background-color: tomato;border-radius: 50%; width: 40px; height: 40px; text-align: center;"> <a href="user_list.php"><i class="fas fa-arrow-left" style="font-size: 25px; color:#fff;"></i></a> </div>
                </div>
              </div>
              <!--  -->
               <form role="form" method="post" id="student-addmission-form" enctype="multipart/form-data" action="student_action.php">
        
          
          <div class="row px-2 py-3">
            
            <!-- registration page -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Personal Details:-</b></h4>
              <hr> </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Addmission No.</label>
                <br>
                <input type="text" name="student_addmission_number" value="<?php echo $freciept_name; ?>" class="form-control" readonly=""> </div>
            </div>
            <!-- student ad date -->
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Date Of Registration</label>
                <input type="text" name="student_date_of_admission" placeholder="" value="<?php echo date("d-m-Y"); ?>" class="form-control" readonly=""> </div>
            </div>
            <!-- adm type -->
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Registration Type</label>
                <select class="form-control" name="student_admission_type" id="student_admission_type" required="">
                  <option <?php if($student_admission_type=='Regular' ) echo "selected"; ?> value="Regular">Regular</option>
                  <option <?php if($student_admission_type=='Private' ) echo "selected"; ?> value="Private">Private</option>
                </select>
              </div>
            </div>
            <!--  -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Registration Scheme</label>
                <select class="form-control" name="student_admission_scheme" required="">
                  <option <?php if($student_admission_scheme=='NON-RTE' ) echo "selected"; ?> value="NON-RTE">NON-RTE</option>
                  <option <?php if($student_admission_scheme=='RTE' ) echo "selected"; ?> value="RTE">RTE</option>
                </select>
              </div>
            </div>
            <!--  -->
            <div class="col-md-3">
              <div class="form-group">
                <label>User Type New Old</label>
                <select class="form-control" name="stuent_old_or_new" selected="<?php echo $student_new_old; ?>" required="">
                  <option value="New" <?php if($student_admission_scheme=='New' ) echo "selected"; ?>>New</option>
                  <option value="Old" <?php if($student_admission_scheme=='Old' ) echo "selected"; ?>>Old</option>
                </select>
              </div>
            </div>
         
            
            <div class="col-md-3 ">
              <div class="form-group">
                <label>First Name<font style="color:red"><b>*</b></font></label>
                <input type="text" name="student_name" id="student_name" required="" placeholder="student Name" value="<?php echo $student_name; ?>" class="form-control new_student"> </div>
            </div>

            <div class="col-md-3 ">
              <div class="form-group">
                <label>Last Name<font style="color:red"><b>*</b></font></label>
                <input type="text" name="student_name" id="student_name" required="" placeholder="student Name" value="<?php echo $student_name; ?>" class="form-control new_student"> </div>
            </div>

            <!--  -->
            <!-- st gender -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Gender</label>
                <br>
                <select class="form-control new_student" name="student_gender" id="student_gender" selected="'.$gender.'" required="">
                  <option value="Male" <?php if($student_gender=='Male' ) echo "selected"; ?>>Male</option>
                  <option value="Female" <?php if($student_gender=='Female' ) echo "selected"; ?>>Female</option>
                  <option value="Other" <?php if($student_gender=='Other' ) echo "selected"; ?> >Other</option>
                </select>
              </div>
            </div>
            <!--  -->
            <!-- dob -->
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Date Of Birth<font style="color:red"><b>*</b></font></label>
                <input type="date" name="student_date_of_birth" placeholder="" id="student_date_of_birth" value="<?php echo $student_date_of_birth; ?>" class="form-control new_student" readonly> </div>
            </div>
            <!-- dob in word -->
            <div class="col-md-3">
              <div class="form-group">
                <label>D.O.B In Word</label>
                <input type="text" id="student_date_of_birth_in_word1" name="student_date_of_birth_in_word" value="<?php echo $student_date_of_birth_in_word; ?>" class="form-control" placeholder="DoB In Word" readonly=""> </div>
            </div>

            <div class="col-md-3 ">
              <div class="form-group">
                <label>User Name<font style="color:red"><b>*</b></font></label>
                <input type="text" name="student_name" id="student_name" required="" placeholder="student Name" value="<?php echo $student_name; ?>" class="form-control new_student"> </div>
            </div>


            <!-- father name -->
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Father's Name</label>
                <input type="text" name="student_father_name" id="student_father_name" placeholder="Father s Name" value="<?php echo $student_father_name; ?>" class="form-control new_student" required=""> </div>
            </div>
            <!-- mother name -->
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Mother's Name</label>
                <input type="text" name="student_mother_name" id="student_mother_name" placeholder="Mother s Name" value="<?php echo $student_mother_name; ?>" class="form-control new_student" required=""> </div>
            </div>
            <!-- father OC -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Father Occupation</label>
                <input type="text" name="student_father_occu" placeholder="" value="<?php echo $student_father_occu; ?>" id="student_father_occu" class="form-control new_student" required=""> </div>
            </div>
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Religion</label>
                <select class="form-control" name="student_religion">
                  <option value="">Select Religion</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Muslim">Muslim</option>
                  <option value="Sikh">Sikh</option>
                  <option value="Christian">Christian</option>
                  <option value="Jain">Jain</option>
                  <option value="Buddh">Buddh</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="student_category">
                  <option value="">Select Category</option>
                  <option value="General">General</option>
                  <option value="OBC">OBC</option>
                  <option value="SC">SC</option>
                  <option value="ST">ST</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <!--  -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Do You Have Bike</label>
                <select class="form-control" name="student_bus" required="">
                  <option value="No" <?php if($student_bus=='No' ) echo "selected"; ?>>No</option>
                  <option value="Yes" <?php if($student_bus=='Yes' ) echo "selected"; ?>>Yes</option>
                </select>
              </div>
            </div>
            <!--  -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Are You Employee</label>
                <select class="form-control" name="student_library"  required="">
                  <option value="No" <?php if($student_library=='No' ) echo "selected"; ?>>No</option>
                  <option value="Yes" <?php if($student_library=='Yes' ) echo "selected"; ?>>Yes</option>
                </select>
              </div>
            </div>
            <!--  -->
            <!-- adhar card -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Adhar No</label>
                <input type="text" id="student_adhar_no" name="student_adhar_no" value="" class="form-control" placeholder="" maxlength="12" required=""> </div>
            </div>
            <!--  -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Contact Details:-</b></h4>
              <hr> </div>
            <!--  -->
            <!-- father contact no -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Father Contact No1.<font style="color:red"><b>*</b></font></label>
                <input type="text" minlength="10" maxlength="10" name="student_father_contact_number" placeholder="Father Contact No1." value="<?php echo $student_father_contact_number; ?>" id="student_father_contact_number" class="form-control new_student" required=""> </div>
            </div>
            <!-- father contact 2 -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Father Contact No2.</label>
                <input type="text" minlength="10" maxlength="10" name="student_father_contact_number2" placeholder="Father Contact No2." value="<?php echo $student_father_contact_number2; ?>" id="student_father_contact_number2" class="form-control new_student" maxlength="10" required=""> </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Student Email</label>
                <input type="email" name="student_email" id="student_email" placeholder="SMS Contact No" value="<?php echo $student_email; ?>" class="form-control" required=""> </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>SMS Contact No<font style="color:red"><b>*</b></font></label>
                <input type="text" name="student_sms_contact_number" id="student_sms_contact_number" placeholder="SMS Contact No" value="<?php echo $student_sms_contact_number; ?>" class="form-control" required="" maxlength="10" > </div>
            </div>
            <!--  -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Education Details:-</b></h4>
              <hr> </div>
            <!--  -->
            <div class="col-md-3">
              <div class="form-group">
                <label>BOARD</label>
                <select class="form-control" name="student_board" required="">
                  <option value="UP BOARD">UP BOARD</option>
                  <option value="CBSE">CBSE</option>
                  <option value="MP Board">MP Board</option>
                </select>
              </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="col-md-3">
              <div class="form-group">
                <label>QUALIFICATION</label>
                <select class="form-control" name="student_qualification" required="">
                  <option value="">Select</option>
                  <option value="BELLOW HIGHSCHOOL">BELLOW HIGHSCHOOL</option>
                  <option value="HIGHSCHOOL">HIGHSCHOOL</option>
                  <option value="HIGHSCHOOL">INTERMIDIATE</option>
                  <option value="GRADUCATION">GRADUCATION</option>
                  <option value="POST GRADUCATION">POST GRADUCATION</option>
                  <option value="OTHER">OTHER</option>
                </select>
              </div>
            </div>
            <!--  -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Medium</label>
                <select class="form-control" name="student_medium" required="">
                  <option value="English" <?php if($student_medium=='English' ) echo "selected"; ?>>English</option>
                  <option value="Hindi" <?php if($student_medium=='Hindi' ) echo "selected"; ?>>Hindi</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label>Other</label>
                <input type="text" name="student_other_qualification" placeholder="Student other qualification" class="form-control"> </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label>Previous Class</label>
                <input type="text" name="student_previous_class" placeholder="student_previous_class" value="<?php echo $student_previous_class; ?>" class="form-control" required=""> </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Previous School</label>
                <input type="text" name="student_previous_school" placeholder="student_previous_school" value="<?php echo $student_previous_school; ?>" class="form-control" required=""> </div>
            </div>
            <!--  -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Fee Details:-</b></h4>
              <hr> </div>
            <!--  -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Fee Category</label>
                <select class="form-control" name="student_fee_category" required="">
                  <option value="Old Student" <?php if($student_medium=='Old Student' ) echo "selected"; ?>>Old Student</option>
                  <option value="New Student" <?php if($student_medium=='New Student' ) echo "selected"; ?>>New Student</option>
                  <option value="Sibling" <?php if($student_medium=='Sibling' ) echo "selected"; ?>>Sibling</option>
                  <option value="Hostel" <?php if($student_medium=='Hostel' ) echo "selected"; ?>>Hostel</option>
                  <option value="Staff Children" <?php if($student_medium=='Staff Children' ) echo "selected"; ?>>Staff Children</option>
                </select>
              </div>
            </div>
            <!--  -->
           

            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label>Addmission Fees</label>
                <input type="text" name="student_addmission_fee" placeholder="" value="<?php echo $tc_fees; ?>" class="form-control"> </div>
            </div>
            <!--  -->
          
            <div class="col-md-12 mt-3">
              <h4 style="color:#d9534f;"><b>Address Details:-</b></h4>
              <hr> </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Village/City</label>
                <input type="text" name="student_city" id="student_city" value="<?php echo $student_city; ?>" class="form-control" required=""> </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Landmark</label>
                <input type="text" name="student_landmark" id="student_landmark" value="<?php echo $student_landmark ?>" class="form-control" required=""> </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Block</label>
                <input type="text" name="student_block" id="student_block" value="<?php echo $student_block; ?>" class="form-control" required=""> </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="col-md-3">
              <div class="form-group">
                <label>District</label>
                <input type="text" name="student_district" id="student_district" value="<?php echo $student_district; ?>" class="form-control" required=""> </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>State</label>
                <!-- <select name="student_state" class="form-control">
                  <option>1</option>
                </select> -->
                <input type="text" name="student_state" id="student_state" value="<?php echo $student_state; ?>" class="form-control" required=""> </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Pincode</label>
                <input type="text" name="student_pincode" id="student_pincode" value="<?php echo $student_pincode; ?>" class="form-control" required=""> </div>
            </div>
            <!--  -->
            
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Documents Details:-</b></h4>
              <hr> </div>
          
             <div class="col-md-3">
              <div class="mb-2" style="width: 200px;">
                <img src="dist/img/dummyadhar.jpg" width="200" id="output_adhars" style="width: 200px; height: 250px;">
              </div>
              <div class="form-group">
                <label>Student Photo</label>
                <input type="file" name="student_adhar_card" id="student_photo" placeholder="" class="form-control" accept=".jpg, .jpeg," onchange="loadadhar(event)"> </div>
            </div>

            <div class="col-md-3">
              <div class="mb-2" style="width: 200px;">
                <img src="dist/img/dummyadhar.jpg" width="200" id="output_adhars" style="width: 200px; height: 250px;">
              </div>
              <div class="form-group">
                <label>Student Adhar card</label>
                <input type="file" name="student_adhar_card" id="student_photo" placeholder="" class="form-control" accept=".jpg, .jpeg," onchange="loadadhar(event)"> </div>
            </div>

            <div class="col-md-3 mb-3">
              <div class="mb-2" style="width: 200px;">
                <img src="dist/img/hischooldummy.jpg" id="output_highschools" style="width: 200px; height: 250px;">
              </div>
              <div class="form-group">
                <label>High School Marksheet</label>
                <input type="file" name="student_highschool" id="student_photo" class="form-control" accept=".jpg, .jpeg," onchange="loadhighschool(event)" > </div>
            </div>
            
            <div class="col-md-3">
              <div class="mb-2" style="width: 200px;">
                <img src="dist/img/intermediatdummy.jpg" width="200" id="output_intermediates" style="width: 200px; height: 250px;">
              </div>
              <div class="form-group">
                <label>Intermediate</label>
                <input type="file" name="student_intermediate" id="student_intermediate" placeholder="" class="form-control" accept=".jpg, .jpeg," onchange="loadpintermediate(event)"> </div>
            </div>

            <div class="col-md-3">
              <div class="mb-2" style="width: 200px;">
                <img src="dist/img/dummyadhar.jpg" width="200" id="output_adhars" style="width: 200px; height: 250px;">
              </div>
              <div class="form-group">
                <label>Student Photo</label>
                <input type="file" name="student_adhar_card" id="student_photo" placeholder="" class="form-control" accept=".jpg, .jpeg," onchange="loadadhar(event)"> </div>
            </div>

            <div class="col-md-3">
              <div class="mb-2" style="width: 200px;">
                <img src="dist/img/dummyadhar.jpg" width="200" id="output_adhars" style="width: 200px; height: 250px;">
              </div>
              <div class="form-group">
                <label>Student Adhar card</label>
                <input type="file" name="student_adhar_card" id="student_photo" placeholder="" class="form-control" accept=".jpg, .jpeg," onchange="loadadhar(event)"> </div>
            </div>

            <div class="col-md-3">
              <div class="mb-2" style="width: 200px;">
                <img src="dist/img/hischooldummy.jpg" id="output_highschools" style="width: 200px; height: 250px;">
              </div>
              <div class="form-group">
                <label>High School Marksheet</label>
                <input type="file" name="student_highschool" id="student_photo" class="form-control" accept=".jpg, .jpeg," onchange="loadhighschool(event)" > </div>
            </div>

            <div class="col-md-3">
              <div class="mb-2" style="width: 200px;">
                <img src="dist/img/intermediatdummy.jpg" width="200" id="output_intermediates" style="width: 200px; height: 250px;">
              </div>
              <div class="form-group">
                <label>Intermediate</label>
                <input type="file" name="student_intermediate" id="student_intermediate" placeholder="" class="form-control" accept=".jpg, .jpeg," onchange="loadpintermediate(event)"> </div>
            </div>
            <!--  -->
            <div class="col-md-12">
              <h4 style="color:#d9534f;"><b>Other Details:-</b></h4>
              <hr> </div>
            <!--  -->
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Motivated By</label>
                <input type="text" name="student_motivated_by" placeholder="Motivated by" value="" class="form-control"> </div>
            </div>
            <!--  -->
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Purpose</label>
                <input type="text" name="student_purpose" placeholder="Purpose" value="" class="form-control"> </div>
            </div>
            <!--  -->
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Target</label>
                <input type="text" name="student_target" placeholder="Target" value="" class="form-control"> </div>
            </div>
            <!--  -->
            <div class="col-md-3 mb-3">
              <div class="form-group">
                <label>Ideal</label>
                <input type="text" name="student_ideal" placeholder="Ideal" value="" class="form-control"> </div>
            </div>
            <!--  -->
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Remark 1</label>
                <input type="text" name="student_remark_1" placeholder="Remark 1" value="<?php echo $student_remark_1; ?>" class="form-control"> </div>
            </div>
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Remark 2</label>
                <input type="text" name="student_remark_2" placeholder="Remark 2" value="<?php echo $student_remark_2; ?>" class="form-control"> </div>
            </div>
            <div class="col-md-3 ">
              <div class="form-group">
                <label>Remark 3</label>
                <input type="text" name="student_remark_3" placeholder="Remark 3" value="<?php echo $student_remark_3; ?>" class="form-control"> </div>
            </div>
            <div class="col-md-3 mb-3">
              <div class="form-group">
                <label>Remark 4</label>
                <input type="text" name="student_remark_4" placeholder="Remark 4" value="<?php echo $student_remark_4; ?>" class="form-control"> </div>
            </div>
            <!--  -->
            <div class="col-md-12">
              <input type="hidden" name="res" value="<?php echo $student_registration_number; ?>">
              <input type="hidden" name="resid" value="<?php echo $resid;?>">
              <input type="submit" name="student_addmission" id="submitButtonId" value="Final Submit" class="btn btn-primary float-right"> </div>
            <!--  -->
            
          </div>
          </form>
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