<?php


include "config.php";

$sql = "SELECT * FROM `users`";

$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $username = $row["username"];
    $email = $row["email"];
    $address = $row["address"];
    $city = $row["city"];
    $zipcode = $row["zipcode"];
    $usertype = $row["userType"];
    $profile = $row["profile"];
    $user_status = $row["user_status"];
 echo "<tr>
        <td>$id</td>
        <td>$username</td>
        <td>$address</td>
        <td>$profile</td>
        <td>$city</td>
        <td>$zipcode</td>
        <td>$usertype</td>
        <td>$user_status</td>
        <td><a href='../API/userActive.php?id=$id'><button type='button' class='btn btn-success'>Active</button></a> </td>
        <td><a href='../API/userInactive.php?id=$id'><button type='button' class='btn btn-warning'>Inactive</button></a> </td>
        <td><a href='../API/deleteUser.php?id=$id'><button type='button' class='btn btn-danger'>Delete</button></a> </td>
        
        </tr>";
}
// "</table>";

} 
else
 {
      echo "<tr><td>0 results</td></tr>";
     }
$connect->close();
?>
