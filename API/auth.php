<?php
session_start();

include "config.php";
$email=$_REQUEST['email'];
//$password=$_REQUEST['password'];

 $password = mysqli_real_escape_string($connect, $_POST["password"]);  

$password = md5($password);



$sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'AND `user_status`='Active';";
$result = $connect->query($sql);

//echo $sql;
echo '<br>';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id= $row["id"];
        $name= $row["username"];

        //Asign variable usrtype colom in datbase
        $userType=$row["userType"];
        echo $userType;
        echo '<br>';

        $_SESSION["name"] =$name;
        $_SESSION["userId"] =$id;

        setcookie("userID", $id, time() + (86400 * 2), "/");
        setcookie("user", $name, time() + (86400 * 2), "/");

        echo 'login.scuess';
       //cheak and set location accoding to the usertype
       if($userType=='admin')
       {
        echo "login to admin page";
            
      //  header("Location:../Admin/"); 

       }
    
       else
       {

      header("Location:../shop.php");

       }
       
     
      exit;
    }
  
} else {
    
    echo '<script>alert("please check username and password is not active")</script>';
    echo '<script>window.location="../login.html"</script>';
   //  header("Location:../index.php"); 
exit    ;
}
$conn->close()

?>