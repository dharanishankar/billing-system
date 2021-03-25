<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['aid'])){
      header("location:index.php");
  }
if(!empty($_POST['name_startsWith'])){
	$name = $_POST['name_startsWith'];
	$query = "SELECT name,cost FROM products WHERE UPPER(name) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($conn, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['name'].'|'.$row['cost'];
		array_push($data, $name);
	}	
	echo json_encode($data);exit;
}