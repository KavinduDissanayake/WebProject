<?php
include "config.php";
$username=$_POST["username"];
$email=$_POST["email"];

$address=$_POST["address"];

$city=$_POST["city"];

$zipcode=$_POST["zipcode"];

$password = mysqli_real_escape_string($connect, $_POST["password"]);  
$password = md5($password);

if(isset($_POST['but_upload'])){

    //$filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
    $folder = "../assets/Profile/".$username.".png"; 
    move_uploaded_file($tempname, $folder);

}
 $sql ="INSERT INTO `users` (`id`, `email`, `username`, `password`, `address`, `userType`, `user_status`, `profile`)
  VALUES (NULL, '$email', '$username', '$password', '$address', 'client', 'Active', '$username.png');
 ";


if ($connect->query($sql) === TRUE) {
    $uniId = $connect->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $uniId;

  header("Location:../login.html");


} else {
    //echo "Error: " . $sql . "<br>" . $connect->error;
    echo '<script>alert("Somthing went worrong !")</script>';
    echo '<script>window.location="../register.html"</script>';
}

?>