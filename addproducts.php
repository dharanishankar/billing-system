<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['aid'])){
      header("location:index.php");
  }
$name=$_POST['name'];
$cost=$_POST['cost'];
$qty=$_POST['quantity'];
$insert="insert into products(name,cost,qty) value('$name','$cost','$qty');";
if(mysqli_query($conn,$insert)==true)
{
	echo "<script>
alert('successfully added');
window.location.href='adproducts.php';
</script>";
}
else
{
	echo "<script>
alert('Invalid Data/already added');
window.location.href='adproducts.php';
</script>";
}
?>