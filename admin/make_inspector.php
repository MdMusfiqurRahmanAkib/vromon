<?php
  session_start();
  ob_start();
  include "../inc/db.php";
  $id = $_GET["id"];

  $sql2 = "UPDATE `users` SET `business_involved` = 'True' WHERE `users`.`user_id` = '$id'";
  $result2 = mysqli_query($con, $sql2);


  $sql2 = "SELECT nid, postal_code FROM `users` where user_id='$id'";
  $result2 = mysqli_query($con, $sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $postal_code = $row2["postal_code"];

  $sql2 = "SELECT ds_id, upazilla from postal_codes where postal_code='$postal_code'";
  $result2 = mysqli_query($con, $sql2);
  $row = mysqli_fetch_assoc($result2);

  $nid = $row2['nid'];
  $ds_id = $row['ds_id'];
  $upazilla = $row['upazilla'];

  $sql = "INSERT INTO `inspectors` (`user_id`, `nid`, `ds_id`, `upazilla`, `postal_code`) VALUES('$id','$nid','$ds_id','$upazilla','$postal_code')";
  $result = mysqli_query($con, $sql);

  if($result){
    header('Location: table.php?name=users');
  }
?>
