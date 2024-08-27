<?php
include 'config/config.php';
  
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

 $db->query("INSERT INTO `indent`(`company_id`,`mill_code`, `mill_name`, `sub_mill_code`, `sub_mill_name`, `indent_no`, `indent_date`, `dealer_code`, `dealer_name`, `document_through`, `destination`, `transporter`, `firt_broker`, `currency`, `description_button`, `notes`, `remark`,`date`) VALUES ('$company_id','$mill_code','$mill_name','$sub_mill_code','$sub_mill_name','$indent_no','$indent_date','$dealer_code','$dealer_name','$document_through','$destination','$transporter','$firt_broker','$currency','$description_button','$notes','$remark','$post_date_time')");
  
    //photo upload ends




$lid = $db->insert_id;
$sort = json_decode($_POST['json_Data1']);
$grade = json_decode($_POST['json_Data2']);
$quantity = json_decode($_POST['json_Data3']);
$price = json_decode($_POST['json_Data4']);
$length = count($sort);
    for($count=0;$count<$length;$count++)
     {
        $result = $db->query("INSERT INTO `indent_plus`(`indent_id`, `sort_id`, `grade_id`, `quantity`, `price`) VALUES ('$lid','$sort[$count]','$grade[$count]','$quantity[$count]','$price[$count]')");
       
    }
    if($result){
        $_SESSION['msg'] = md5('5');
        echo "yes";
    }else{
        $_SESSION['msg'] = md5('11');
        echo "no";
    }






?>