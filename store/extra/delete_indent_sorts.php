<?php
include 'config/config.php';
$post_id = $_POST['value'];
$query_delete = $db->query("DELETE FROM indent_plus WHERE id='$post_id'");

if ($query_delete) {
	 $_SESSION['msg'] = md5('7');
	echo "yes";
}else{
	 $_SESSION['msg'] = md5('11');
	echo "no";
}


?>