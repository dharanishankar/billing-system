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
if(isset($_POST["del"]))
{
  mysqli_autocommit($conn,FALSE);
  $inno=$_POST['inno'];
  $query="select * from orders where sid='$inno';";
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)){
    $q=$row['qty'];
    $n=$row['productname'];
     $update="update products set qty=qty+'$q' where name='$n'";
  mysqli_query($conn,$update);
  }
  $del1="delete from sales where sid='$inno'";
  $del2="delete from orders where sid='$inno'";
  mysqli_query($conn,$del1);
  mysqli_query($conn,$del2);
  if (mysqli_commit($conn))
{
  echo "<script>
alert('successfully Deleted');
window.location.href='sales.php';
</script>";
}
else
{
  echo "<script>
alert('Invalid Data');
window.location.href='sales.php';
</script>";
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <title>Report</title>

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
        <a class="nav-link" href="plist.php">Stocks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="report.php">Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="sales.php">Sales</a>
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
    <form method="post">
    <div class="form-group">
        <label>Date:</label>
        <input type="text" class="form-control datepicker" placeholder="Choose Date" name="date" autocomplete="off" required>
      </div>
      <button type="submit" class="btn btn-success" name="show">Submit</button>
    </form>
    </div>
</div>
<br><br>
<?php
if(isset($_POST['show']))
{
  $dt=$_POST['date'];
  $dts=explode('/', $dt);
  $dcrt=$dts[2]."/".$dts[0]."/".$dts[1];
  $check="select * from sales where date='$dcrt'";
$result = mysqli_query($conn,$check);
$count = mysqli_num_rows($result);
if($count==0)
{
  echo "<script>
alert('No data found');
window.location.href='sales.php';
</script>";
}
echo '<div class="container mb-5">
    <div class="row">
      <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Buyer Name</th>
        <th>Total</th>
        <th>Preview</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>';
      while ($row = mysqli_fetch_assoc($result)){
        $datesplit=explode("-", $row['date']);
        $datecrt=$datesplit[2]."/".$datesplit[1]."/".$datesplit[0];
        $bn=$row['name'];
        $tl=$row['gtotal'];
        $in=$row['invoiceno'];
        $sid=$row['sid'];
        echo '<tr>
        <td>'.$in.'</td>
        <td>'.$datecrt.'</td>
        <td>'.$bn.'</td>
        <td>'.$tl.'</td>
        <td><form method="post"><input type="text" name="inno" value="'.$sid.'" hidden><button type="submit" formtarget="_blank" formaction="rpreview.php" class="btn btn-success">Preview</button></form></td>
        <td><form method="post"><input type="text" name="inno" value="'.$sid.'" hidden><button type="submit" name="del" class="btn btn-success">Delete</button></form></td>
      </tr>';
      } 
    echo '</tbody>
  </table>
  </div>
</div>';
}
?>
<nav class="navbar fixed-bottom  bg-dark navbar-dark">
  <a class="navbar-brand" href="#">2020 ©️ All Rights Reserved</a>
</nav>
    <script src="jquery.js"></script>
    <script src="popper.js"></script>
    <script src="ootstrap.min.js"></script>
    <script src="jquery1.js"></script>
  <script src="jquery-ui.js"></script>
  <script src="select2.js"></script>
  <script>
           $( function() {
      $( ".datepicker" ).datepicker();
            $('.select2').select2();
          });
 </script>
  </body>
</html>