
<?php include "API/product.php"?>
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

                <div class="col-md-4 col-12 text-center ">
                    <h2 class="my-md-3 site-title text-white"><b>Mobile Phone Shop</b> </h2>
                </div>
                <div class="col-md-4 col-12 text-right ">
                    <p class="my-md-4 header-links">
                        <a href="login.html" class="px-2">Sign in</a>|
                        <a href="register.html" class="px-1">Create an account</a>
                    </p>
                </div>            
            </div>


        </div>
       <div class="container-fuild p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About us</a>
                </li>
                
              </ul>
            </div>
            <div class="navbar-nav">
                <li class="nav-item boder rounded-circle mx-2 serach-icon">
                    <i class="fas fa-search p-2"></i>
                </li>
                <li class="nav-item boder rounded-circle mx-2 serach-icon">
                    <i class="fas fa-shopping-basket p-2"></i>
                </li>
    
            </div>
          </nav>
       </div>
       

    </header>
     <!--/header-->
    <main>
 
        <div id="demo" class="carousel slide" data-ride="carousel" ">
            <ul class="carousel-indicators" >
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner"  >
              <div class="carousel-item active">
                <img src="https://i.ibb.co/1vrGDLF/sid3.jpg" alt="Image 1" width="1100" height="500">                
                <div class="carousel-caption">
                  <h3>Your Mobile phone healer</h3>
                  <p>get good condition product</p>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="https://i.ibb.co/3p93hpV/sid2.jpg" alt="Image 2" width="1100" height="500">
                <div class="carousel-caption">
                  <h3>Your Mobile phone healer</h3>
                  <p>get good condition product</p>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="https://i.ibb.co/GVC9b3y/sid1.jpg" alt="Image 3" width="1100" height="500">
                <div class="carousel-caption">
                  <h3>Your Mobile phone healer</h3>
                  <p>get good condition product</p>
                </div>   
              </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>

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
					

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart_shop" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
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