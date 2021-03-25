<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['aid'])){
      header("location:index.php");
  }
$name=$_POST['name'];
$qty=$_POST['quantity'];
$insert="update products set qty=qty+$qty where name='$name';";
if(mysqli_query($conn,$insert)==true)
{

	echo "<script>
alert('successfully updated');
window.location.href='adproducts.php';
</script>";
}
else
{
	echo "<script>
alert('Invalid Data');
window.location.href='adproducts.php';
</script>";
}
?>