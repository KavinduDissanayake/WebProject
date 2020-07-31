<!-- Cheack user is here -->

<!-- Cheack user is here -->


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/Adminstyle.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>

<div class="sidenav bg-light">
<img src="https://i.ibb.co/1vrGDLF/sid3.jpg" style="width:60px;height:60px;border-radius:40px;"/>
  <p>Admin</P>
  <a href="../"  onclick="<?php session_destroy();?>" >Logout</a>

</div>
  <!-- Model Strat to Add button -->
<div class="modal fade" id="UserADD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="forms-sample" name="myForm" onsubmit="return validateForm()" enctype='multipart/form-data' action="../API/AdminRegister.php"  method="post" >
                  <div class="form-group">
                    <label for="exampleSelectGender">Account Type</label>
                    <select class="form-control" id="userType"  name="userType" >
                      <option value="client">Client</option>
                      <option value="admin">Admin</option>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" class="form-control"  placeholder="Username" name="username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"  placeholder="Email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control"  placeholder="Password" name="password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control"  placeholder="Address" name="address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">city</label>
                    <input type="text" class="form-control"  placeholder="city" name="city">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">zipcode</label>
                    <input type="text" class="form-control"  placeholder="zipcode" name="zipcode">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" class="form-control" name="uploadfile">
                  </div>
                
                  
                  <button type="submit" class="btn btn-primary" name='but_upload'>Submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </form>
      </div>
      
    </div>
  </div>
</div>
   <!-- Model End to Add button -->

     <!-- Model Strat to Add button Product -->
<div class="modal fade" id="ProductAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Product Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="forms-sample" name="myForm" onsubmit="return validateForm()" enctype='multipart/form-data' action="../API/AdminAddProducts.php"  method="post" >
                
                  <div class="form-group">
                    <label for="exampleInputUsername1">Product  Name</label>
                    <input type="text" class="form-control"  placeholder="Product  Name" name="pname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" class="form-control"  placeholder="Price" name="price">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Descrpiton</label>
                    <input type="text" class="form-control"  placeholder="Product Descrpiton" name="pdes">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" class="form-control" name="uploadfile">
                  </div>
                
                  
                  <button type="submit" class="btn btn-primary" name='but_upload'>Submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </form>
      </div>
      
    </div>
  </div>
</div>
   <!-- Model End to Add button Product -->

<div class="main">
  <h2>Admin Panel</h2>
  <div class="main-panel">
          
        
          <label><b>Users Table </b></label>
            <table class="table table-hover" id="dev-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Address</th>
                  <th>Profile</th>
                  <th>City</th>
                  <th>ZipCode</th>
                  <th>User Type</th>
                  <th>User_Status</th>
                  <th>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UserADD">
                          Add
                      </button>
                    </th>
                    <th>
                    </th>
                    <th>
                    </th>
                </tr>
              </thead>
              <tbody>
                <?php include "../API/UserViewAdmin.php"; ?>
              </tbody>
            </table>

  
</div>

  <div class="main-panel">
          
        
          <label><b>Product Table </b></label>
            <table class="table table-hover" id="dev-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Image</th>                
                  <th>Price</th>
                  <th>Product Description</th>
                  <th>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ProductAdd">
                          Add
                      </button>
                    </th>
                    <th>
                </th>
                    <th>
                    </th>
                </tr>
              </thead>
              <tbody>
                <?php include "../API/ProductViewAdmin.php"; ?> 
              </tbody>
            </table>

  
</div>

</body>


</html> 