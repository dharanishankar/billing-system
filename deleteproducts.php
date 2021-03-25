<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['aid'])){
      header("location:index.php");
  }
$name=$_POST['prname'];
$insert="delete from products where name='$name';";
if(mysqli_query($conn,$insert)==true)
{
	echo "<script>
alert('successfully deleted');
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