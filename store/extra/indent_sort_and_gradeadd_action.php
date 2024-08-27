<?php
include 'config/config.php';
  
  if(isset($_POST['submit'])){
  $indent_id = $_POST['post_id'];
  $sort = json_decode($_POST['json_Data1']);
 $grade = json_decode($_POST['json_Data2']);
 $quantity = json_decode($_POST['json_Data3']);
 $price = json_decode($_POST['json_Data4']);
 $length = count($sort);
    for($count=0;$count<$length;$count++)
     {

        	$result = $db->query("INSERT INTO `indent_plus`(`indent_id`, `sort_id`, `grade_id`, `quantity`, `price`) VALUES ('$indent_id','$sort[$count]','$grade[$count]','$quantity[$count]','$price[$count]')");
       
    }
    if($result){
    	 $_SESSION['msg'] = md5('6');
        echo "yes";
    }else{
    	$_SESSION['msg'] = md5('11');
        echo "no";
    }



}


?>