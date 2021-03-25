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
    <title>Stocks</title>
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
        <a class="nav-link" href="adproducts.php">Add/Delete Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="plist.php">Stocks</a>
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
<?php
echo '<div class="container mb-5">
    <div class="row">
      <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Cost</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>';
    $c=0;
      while ($row = mysqli_fetch_assoc($result)){
        $c++;
        $pn=$row['name'];
        $ct=$row['cost'];
        $qty=$row['qty'];
        echo '<tr>
        <td>'.$c.'</td>
        <td>'.$pn.'</td>
        <td>'.$ct.'</td>
        <td>'.$qty.'</td>
      </tr>';
      } 
    echo '</tbody>
  </table>
  </div>
</div>';
?>

<nav class="navbar fixed-bottom  bg-dark navbar-dark">
  <a class="navbar-brand" href="#">2020 ©️ All Rights Reserved</a>
</nav>
    <script src="jquery.js"></script>
    <script src="popper.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="jquery1.js"></script>
  <script src="jquery-ui.js"></script>
    <script>
    			 $( function() {
      $( ".datepicker" ).datepicker();
    } );
 </script>
  </body>
</html>