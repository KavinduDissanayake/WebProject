<?php
include "config.php";
$id=$_REQUEST["id"];

$sql ="DELETE FROM `users` WHERE `id`= $id";


if ($connect->query($sql) === TRUE) {
    $uniId = $connect->insert_id;
    echo "Delete successfully. Last inserted ID is: " . $uniId;
    header("Location:../Admin/"); 
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

?>