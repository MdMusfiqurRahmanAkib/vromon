<?php
include "../inc/db.php";

$verdict = $_GET["verdict"];
$id = $_GET["id"];


?>
  <form action="post_approval_notification.php?verdict=<?php echo $verdict;?>&id=<?php echo $id;?>" id="usrform" method="POST">
    <textarea rows="4" cols="50" name="comment" placeholder="ফিডব্যাক এখানে লিখুন" form="usrform"></textarea>
    <input type="submit" value="জমা দিন">
  </form>
