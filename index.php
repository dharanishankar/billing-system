<?php
include 'conn.php';
session_start();
if(isset($_SESSION['aid'])){
      header("location:home.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cheran Restaurant</title>
	<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" href="https://i.ibb.co/7yvvvL2/ui-logo.png" type="image/x-icon"> -->
	<link rel="stylesheet" href="bootstrap.min.css">
<style>
  body {
    background-color: #dbd7d469;
  }

</style>
</head>

<body>
 <nav class="navbar bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Cheran Restaurant</a>
</nav>
  <br><br><br>
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-6 col-md-8 shadow p-4 mb-4 bg-white rounded ">
        <center>
          <h1>Login</h1>
        </center>
    <form action="login.php" method="post">
       <div class="form-group">
          <label>User Name:</label>
          <input type="text" class="form-control" name="username" placeholder="Enter User Name" requiredb autocomplete="off">
        </div>
      <div class="form-group">
        <label>Password:</label>
        <input type="password" class="form-control" name="password" placeholder="Enter password" required autocomplete="off">
      </div>

      <button type="submit" class="btn btn-success flex">Login</button>
      </form>
      </div>
  </div>
</div>
<nav class="navbar fixed-bottom  bg-dark navbar-dark">
  <a class="navbar-brand" href="#">2020 ©️ All Rights Reserved</a>
</nav>
</body>
</html>