<?php 
include "config.php";
$pname=$_POST["pname"];
$price=$_POST["price"];
$pdes=$_POST["pdes"];
$id=$_POST["id"];

//echo $id;

if(isset($_POST['but_upload'])){

    //$filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
    $folder = "../assets/Product/".$pname.".png"; 
    move_uploaded_file($tempname, $folder);

}

$sql ="UPDATE `tbl_product` SET `name`='$pname',`image`='$pname.png',`price`='$price',`pdes`='$pdes' WHERE id='$id';
";


if ($connect->query($sql) === TRUE) {
   $uniId = $connect->insert_id;
   echo " record Edit successfully. Last inserted ID is: " . $uniId;

 header("Location:../Admin");


} else {
   //echo "Error: " . $sql . "<br>" . $connect->error;
  echo '<script>alert("Somthing went worrong !")</script>';
  echo '<script>window.location="../Admin"</script>';
}



?>