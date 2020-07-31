
<!DOCTYPE html>
<html>
<head>
<title>Edit Product</title>
<meta http-equiv="refresh" content="30">
<meta charset="UTF-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body>

<h1>Edit Profile</h1>
<?php

include "../API/config.php";
$id=$_REQUEST["id"];
//echo $id;
			
$query = "SELECT * FROM `tbl_product` WHERE `id`=$id";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        ?>
<div class="modal-body">
      <form class="forms-sample" name="myForm" onsubmit="return validateForm()" enctype='multipart/form-data' action="../API/AdminEditProduct.php"  method="post" >
                
                  <div class="form-group">
                    <label for="exampleInputUsername1">Product  Name</label>
                    <input type="text" class="form-control"  value="<?php echo $row["name"]; ?>" name="pname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" class="form-control"  value="<?php echo $row["price"]; ?>" name="price">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Descrpiton</label>
                    <input type="text" class="form-control"  value="<?php echo $row["pdes"]; ?>" name="pdes">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" class="form-control"  name="uploadfile">
                  </div>
                
                  <input type="hidden"  name="id" value="<?php echo $row["id"]; ?>">

                  <button type="submit" class="btn btn-primary" name='but_upload'>Submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </form>

      </div>
      
<br>
<?php
}
}
?>
</body>
</html>