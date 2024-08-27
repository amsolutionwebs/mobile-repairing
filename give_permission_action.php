<?php
include 'config/config.php';


// for add
if (isset($_POST['foradd'])) {

 $module_id = $_POST['module_id'];
 $permission = $_POST['permission'];

 if ($permission==='no') {
 	$permission_given = 'yes';
 }

 if ($permission==='yes') {
 	$permission_given = 'no';
 }


 $query_update = $db->query("UPDATE `user_module` SET `add`='$permission_given' WHERE id='$module_id'");


 if ($query_update) {
 	echo "success";
 }else{
 	echo "failed";
 }

}

// for edit
if (isset($_POST['forview'])) {

 $module_id = $_POST['module_id'];
 $permission = $_POST['permission'];

 if ($permission==='no') {
 	$permission_given = 'yes';
 }

 if ($permission==='yes') {
 	$permission_given = 'no';
 }


 $query_update = $db->query("UPDATE `user_module` SET `view`='$permission_given' WHERE id='$module_id'");


 if ($query_update) {
 	echo "success";
 }else{
 	echo "failed";
 }

}


// for edit

if (isset($_POST['foredit'])) {

 $module_id = $_POST['module_id'];
 $permission = $_POST['permission'];


 if ($permission==='no') {
 	$permission_given = 'yes';
 }else if($permission==='yes') {
 	$permission_given = 'no';
 }

 
 $query_update = $db->query("UPDATE `user_module` SET `edit`='$permission_given' WHERE id='$module_id'");

 if ($query_update) {
 	echo "success";
 }else{
 	echo "failed";
 }

}
 
// for delete

if (isset($_POST['fordelete'])) {

 $module_id = $_POST['module_id'];
 $permission = $_POST['permission'];

 if ($permission==='no') {
 	$permission_given = 'yes';
 }

 if ($permission==='yes') {
 	$permission_given = 'no';
 }


 $query_update = $db->query("UPDATE `user_module` SET `delete_module`='$permission_given' WHERE id='$module_id'");

 if ($query_update) {
 	echo "success";
 }else{
 	echo "failed";
 }

}
 









?>