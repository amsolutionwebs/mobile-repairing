<?php
include 'config/config.php';

if(isset($_GET['action'])){
  $post_id = mysqli_real_escape_string($db,$_GET['post']); 
    $db->query("DELETE FROM `product_variation` WHERE id='$post_id'");
    
    $_SESSION['msg'] = md5('7');
    header("location:product_variation_view_list.php");
  
  }

?>