<?php 

include 'config/config.php';
$usertype = $_SESSION['usertype'];
$a_idchk = $_SESSION['user_id'];

if($usertype=='suparadmin'){
if(isset($_POST['update_password'])){
    
    
$student_id = mysqli_real_escape_string($db,$_POST['a_id']);
$current_password1 = mysqli_real_escape_string($db, $_POST['p_current_password']);
$current_password = md5($current_password1);
$password = mysqli_real_escape_string($db, $_POST['p_new_password']);
$confirm = mysqli_real_escape_string($db, $_POST['p_confirm_password']);

$data2 = $db->query("SELECT password FROM supar_admin WHERE id='$student_id'");
$value2 = $data2->fetch_object();
if($value2->password==$current_password){
	if($password==$confirm){
		$confirm_password = md5($confirm);
		$query = $db->query("UPDATE supar_admin SET password='$confirm_password' WHERE id = '$student_id'");
		if($query){
			$_SESSION['msg'] = md5('3');
header("Location: dashboard.php");
		}else{
			$_SESSION['msg'] = md5('11');
header("Location: dashboard.php");
		}
	}else{
		$_SESSION['msg'] = md5('11');
header("Location: dashboard.php");
	}
	
}else{
	$_SESSION['msg'] = md5('not_match');
header("Location: dashboard.php?msg=" . md5('not_match') . "");
}





}
    
    
    
}



if($usertype=='admin'){
    
 if(isset($_POST['update_password'])){
    
    
$student_id = mysqli_real_escape_string($db,$_POST['a_id']);
$current_password = mysqli_real_escape_string($db, $_POST['p_current_password']);

$password = mysqli_real_escape_string($db, $_POST['p_new_password']);
$confirm = mysqli_real_escape_string($db, $_POST['p_confirm_password']);

$data2 = $db->query("SELECT password FROM admin WHERE id='$student_id'");
$value2 = $data2->fetch_object();
if($value2->password==$current_password){
	if($password==$confirm){
		$confirm_password = $confirm;
		$query = $db->query("UPDATE admin SET password='$confirm_password' WHERE id = '$student_id'");
		if($query){
			$_SESSION['msg'] = md5('3');
header("Location: dashboard.php");
		}else{
			$_SESSION['msg'] = md5('11');
header("Location: dashboard.php");
		}
	}else{
		$_SESSION['msg'] = md5('11');
header("Location: dashboard.php");
	}
	
}else{
	$_SESSION['msg'] = md5('not_match');
header("Location: dashboard.php?msg=" . md5('3') . "");
}





}   
    
    
}






?>