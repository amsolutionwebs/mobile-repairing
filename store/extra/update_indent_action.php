<?php
include 'config/config.php';
  
  if(isset($_POST['submit'])){
  $indent_id = $_POST['post_id'];
  $mill_code = mysqli_real_escape_string($db, $_POST['mill_code']);
  $mill_name = mysqli_real_escape_string($db, $_POST['mill_name']);
  $sub_mill_code = mysqli_real_escape_string($db, $_POST['sub_mill_code']);
  $sub_mill_name = mysqli_real_escape_string($db, $_POST['sub_mill_name']);
  $indent_no = mysqli_real_escape_string($db, $_POST['indent_no']);
  $indent_date = mysqli_real_escape_string($db, $_POST['indent_date']);
  $dealer_code = mysqli_real_escape_string($db, $_POST['dealer_code']);
  $dealer_name = mysqli_real_escape_string($db, $_POST['dealer_name']);
  $document_through = mysqli_real_escape_string($db, $_POST['document_through']);
  $destination = mysqli_real_escape_string($db, $_POST['destination']);
  $transporter = mysqli_real_escape_string($db, $_POST['transporter']);
  $firt_broker = mysqli_real_escape_string($db, $_POST['firt_broker']);
  $currency = mysqli_real_escape_string($db, $_POST['currency']);
  $notes = "na";
  $remark = mysqli_real_escape_string($db, $_POST['remark']);
  $description_button = mysqli_real_escape_string($db, $_POST['description_button']);
  $company_id = mysqli_real_escape_string($db, $_POST['company_id']);
  $post_date_time = date("Y-m-d H:i:s");

$query1 =  $db->query("UPDATE `indent` SET `company_id`='$company_id',`mill_code`='$mill_code',`mill_name`='$mill_name',`sub_mill_code`='$sub_mill_code',`sub_mill_name`='$sub_mill_name',`indent_no`='$indent_no',`indent_date`='$indent_date',`dealer_code`='$dealer_code',`dealer_name`='$dealer_name',`document_through`='$document_through',`destination`='$destination',`transporter`='$transporter',`firt_broker`='$firt_broker',`currency`='$currency',`description_button`='$description_button',`notes`='$notes',`remark`='$remark',`date`='$post_date_time' WHERE id='$indent_id'");
  
    //photo upload ends
if ($query1) {

$indent_id = $_POST['post_id'];
$sort = json_decode($_POST['json_Data1']);
$grade = json_decode($_POST['json_Data2']);
$quantity = json_decode($_POST['json_Data3']);
$price = json_decode($_POST['json_Data4']);
$indent_plus_id = json_decode($_POST['json_Data5']);

$length = count($sort);
    for($count=0;$count<$length;$count++)
     {

        	$result = $db->query("UPDATE `indent_plus` SET `indent_id`='$indent_id',`sort_id`='$sort[$count]',`grade_id`='$grade[$count]',`quantity`='$quantity[$count]',`price`='$price[$count]' WHERE id='$indent_plus_id[$count]'");
       
    }
    if($result){
    	 $_SESSION['msg'] = md5('6');
        echo "yes";
    }else{
    	$_SESSION['msg'] = md5('11');
        echo "no";
    }
}else{
	$_SESSION['msg'] = md5('11');
    echo "no";
}



}


?>