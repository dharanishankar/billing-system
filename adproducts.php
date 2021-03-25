<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['aid'])){
      header("location:index.php");
  }
  if(isset($_POST["logout"]))
{
   session_destroy();
   header("location:index.php");
}
$check="select * from products";
$result = mysqli_query($conn,$check);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="jquery-ui.css">
    <link href="select2.css" rel="stylesheet" />
    <title>Add/Delete Products</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="home.php">Cheran Restaurant</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Billing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="adproducts.php">Add/Delete Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="plist.php">Stocks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="report.php">Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sales.php">Sales</a>
      </li>
      <li>
      <form method="post"><button name="logout" class="btn btn-danger navbar-btn pl-3">Logout</button></form>   
      </li> 
    </ul>
  </div>  
</nav>
<br>

<div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-8 shadow p-4 mb-4 bg-white rounded mb-5">
        <h3>Add Products</h3>
    <form action="addproducts.php" method="post">
       <div class="form-group">
          <label>Product Name:</label>
          <input type="text" class="form-control" name="name" placeholder="" autocomplete="off" required>
        </div>
  
      <div class="form-group">
          <label>Cost:</label>
          <input type="text" class="form-control" name="cost" placeholder="" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label>Quantity:</label>
          <input type="number" class="form-control" name="quantity" placeholder="" autocomplete="off" required>
        </div>
      <button type="submit" class="btn btn-success flex mb-5">ADD</button>
      </form>

      <h3>Edit Product</h3>
    <form action="editproducts.php" method="post">
      <div class="form-group">
          <label>Product Name:</label>
      <select class="form-control select2" style="width:100%!important;" name="pname">
        <?php while ($row = mysqli_fetch_assoc($result)):?> 
          <option value="<?php echo $row['name']?>"><?php echo $row['name'] ?></option>
    <?php endwhile ?>
        </select>
      </div>
      <div class="form-group">
          <label>Cost:</label>
          <input type="text" class="form-control" name="pcost" placeholder="" autocomplete="off" required>
        </div>
      <button type="submit" class="btn btn-success flex">Submit</button>
      </form>
      </div>
      <div class="col-lg-6 col-md-8 shadow p-4 mb-4 bg-white rounded ">
        <?php mysqli_data_seek($result, 0);?>
        <h3>Update Stocks</h3>
    <form action="updatestocks.php" method="post">
      <div class="form-group">
          <label>Product Name:</label>
      <select class="form-control select2" style="width:100%!important;" name="name">
        <?php while ($row = mysqli_fetch_assoc($result)):?> 
          <option value="<?php echo $row['name']?>"><?php echo $row['name'] ?></option>
    <?php endwhile ?>
        </select>
      </div>
       <div class="form-group">
          <label>Quantity:</label>
          <input type="number" class="form-control" name="quantity" placeholder="" autocomplete="off" required>
        </div>
      <button type="submit" class="btn btn-success flex mb-5">Update</button>
      </form>
        <?php mysqli_data_seek($result, 0);?>
        <h3>Delete Product</h3>
    <form action="deleteproducts.php" method="post">
      <div class="form-group">
          <label>Product Name:</label>
      <select class="form-control select2" style="width:100%!important;" name="prname">
        <?php while ($row = mysqli_fetch_assoc($result)):?> 
          <option value="<?php echo $row['name']?>"><?php echo $row['name'] ?></option>
    <?php endwhile ?>
        </select>
      </div>
      <button type="submit" class="btn btn-success flex">Delete</button>
      </form>
      </div>
  </div>
</div>

<nav class="navbar fixed-bottom  bg-dark navbar-dark">
  <a class="navbar-brand" href="#">2020 ©️ All Rights Reserved</a>
</nav>
    <script src="jquery.js"></script>
    <script src="popper.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="jquery1.js"></script>
  <script src="jquery-ui.js"></script>
    <script src="select2.js"></script>
    <script>
           $( function() {
      $( ".datepicker" ).datepicker();
    } );
            $('.select2').select2();
 </script>
  </body>
</html>