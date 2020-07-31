<?php
// Create connection
$connect = mysqli_connect("localhost", "root", "", "mobileshop");
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>