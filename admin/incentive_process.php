<?php
  include "../inc/db.php";
  $ps_id = $_GET["id"];
  $sql = "UPDATE `post_incentives` SET `reward_status` = 'given' WHERE `post_incentives`.`pi_id` = '$ps_id'";
  $result = mysqli_query($con, $sql);
  if($result){
    header('Location: table.php?name=post_incentives');
  }
?>
