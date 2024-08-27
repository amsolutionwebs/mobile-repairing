<?php
include 'config/config.php';
// delete user type
if(isset($_GET['delete_user_type_user'])){
    $post_id = $_GET['post'];
    $emloyee_id = $_GET['emloyee_id'];
    
     $db->query("DELETE FROM employee_user_type WHERE  id = '$post_id'");
    
    $_SESSION['msg'] = md5('7');
    header("location:add_user_type_to_user.php?post=$emloyee_id&action=add");
}


// delete module

if(isset($_GET['delete_user_module'])){
    $user_module_id = $_GET['user_module_id'];
    $emloyee_id = $_GET['emloyee_id'];
    
     $db->query("DELETE FROM user_module WHERE  id = '$user_module_id'");
    
    $_SESSION['msg'] = md5('7');
    header("location:add_module_employee.php?post=$emloyee_id&action=add");
}



if(isset($_GET['delete_user_store'])){
    $user_store_id = $_GET['user_store_id'];
    $emloyee_id = $_GET['emloyee_id'];
    
     $db->query("DELETE FROM employee_store WHERE  id = '$user_store_id'");
    
    $_SESSION['msg'] = md5('7');
    header("location:add_store_to_employee.php?post=$emloyee_id&action=add");
}






if(isset($_GET['delete_user_permission'])){
    $employee_permission_id = $_GET['employee_permission_id'];
    $emloyee_id = $_GET['emloyee_id'];
    
     $db->query("DELETE FROM employee_permission WHERE  id = '$employee_permission_id'");
    
    $_SESSION['msg'] = md5('7');
    header("location:add_module_permission.php?post=$emloyee_id&action=add");
}





?>