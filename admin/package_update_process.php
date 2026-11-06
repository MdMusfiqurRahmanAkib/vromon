<?php
include "../inc/db.php";
include "table_description.php";
$id = $_GET["id"];

foreach ($_POST as $key => $value) {

    $sql = "UPDATE `tour_packages` SET `$key` = '$value' WHERE `tour_packages`.`package_id` = '$id'";
    $result = mysqli_query($con, $sql);
}
header('Location: table.php?name=tour_packages');
?>
