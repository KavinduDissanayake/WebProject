<?php
include "config.php";
$id=$_REQUEST["id"];

$sql ="UPDATE `users` SET `user_status`='Inactive' WHERE `id`= $id";


if ($connect->query($sql) === TRUE) {
    $uniId = $connect->insert_id;
    echo "Active successfully. Last inserted ID is: " . $uniId;
    header("Location:../Admin/"); 
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

?>