<?php


include "config.php";

$sql = "SELECT * FROM `tbl_product`";

$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $name = $row["name"];
    $image = $row["image"];
    $price = $row["price"];
    $pdes = $row["pdes"];
 echo "<tr>
        <td>$id</td>
        <td>$name</td>
        <td>$image</td>
        <td>$price</td>
        <td>$pdes</td>    
        <td><a href='../Admin/EditProduct.php?id=$id'><button type='button' class='btn btn-warning'>Edit</button></a> </td>
        <td><a href='../API/deleteProduct.php?id=$id'><button type='button' class='btn btn-danger'>Delete</button></a> </td>
        
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
