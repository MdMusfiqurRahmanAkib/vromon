<?php
  session_start();
  ob_start();
  include "../inc/db.php";
  $id = $_GET["id"];
  $role = $_GET["role"];
  $sql = "UPDATE `users` SET `role` = '$role' WHERE `users`.`user_id` = '$id'";
  $result = mysqli_query($con, $sql);
  if($result){
    header('Location: table.php?name=users');
  }
?>
