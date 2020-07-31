
<?php include "API/product.php"?>
<?php

if( $_SESSION["name"]==""){
  header("Location:login.html");
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mobile Phone Shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <!--Font Awesome cdn-->
     <script src="https://kit.fontawesome.com/31d8eedc6b.js" crossorigin="anonymous"></script>
     <!--Custom Stylesheet-->
     <link rel="stylesheet" href="./css/style.css"/>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


</head>
<body>

    <!--header-->
    <header>
        <div class="container">
            <div class="row">
                <div  class="col-sm-12 col-md-4 col-12 ">
                    <div class="btn-group">
                        <button class="btn boder dropdown-toggle my-md-4my-2" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">LKR</button>
                    </div>
                </div>

                <div class="col-md-5 col-12 text-center ">
                    <h2 class="my-md-3 site-title text-white"><b>Mobile Phone Shop</b> </h2>
                </div>
    <!--User Data-->

                <div class="col-md-3 col-12 text-right ">
                    <div class="row">
                    <div class="col-md-8 header-links">
                        <h3><?php echo $_SESSION["name"] ?></h3>
                        <a href="index.php" class="px-1" onclick="<?php session_destroy();?>" >Logout</a>
                        
</div>

<?php			
$uname=$_SESSION["name"];
				$query = "SELECT * FROM `users` WHERE `username`='$uname'";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
                    <div class="col-md-4 header-links">
                    <img src="assets/profile/<?php echo $row["profile"]; ?>" style="width:60px;height:60px;border-radius:40px;"/>

      <?php }
        }?>                 
</div>
                    
                </div>    
</div>        
            </div>

   <!--User Data-->
        </div>
       <div class="container-fuild p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About us</a>
                </li>
                
              </ul>
            </div>
            <div class="navbar-nav">
            
            </div>
          </nav>
       </div>
       

    </header>
     <!--/header-->
    <main>
    <div class="container">
    <?php			
				$query = "SELECT * FROM tbl_product ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<img src="assets/<?php echo $row["image"]; ?>" class="img-responsive1" /><br />

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">RS <?php echo $row["price"]; ?></h4>
                        <p><?php echo $row["pdes"]; ?></p>
						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>RS <?php echo $values["item_price"]; ?></td>
						<td>RS <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="shop.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">RS <?php echo number_format($total, 2); ?></td>
						<td><button type="button" class="btn btn-success">BuyNow</button>
            </td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
      
    </main>
   <!-- Footer -->
<footer>
  <div class="container-fluid text-center text-md-left">

  <div class="footer-copyright text-center py-3">© 2020  Desgin by:
    <a href="#"> Amandi</a>
  </div>

</footer>
<!-- Footer -->
</body>
</html>