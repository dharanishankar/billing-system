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
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="jquery-ui.css">
    <title>Billing</title>
     <style>
  .fl
  {
  
  float: left; 
  }
  
  span{
      display: block; 
            overflow: hidden; 
            padding: 0px 4px 0px 6px; 

  }
  </style>
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
        <a class="nav-link active" href="home.php">Billing</a>
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
  <form method="post">
    <div class="row">
      <div class="col-lg-6 col-md-8 shadow p-4 mb-4 bg-white rounded ">
       <div class="form-group">
          <label>Invoice Number:</label>
          <input type="text" class="form-control" name="invoiceno" placeholder="" autocomplete="off">
        </div>
      <div class="form-group">
        <label>Buyer Name:</label>
        <input type="text" class="form-control" name="buyername" placeholder="" autocomplete="off">
      </div>
     
     
      </div>
      <div class="col-lg-6 col-md-8 shadow p-4 mb-4 bg-white rounded ">
      <div class="form-group">
        <label>Date:</label>
        <input type="text" class="form-control datepicker" placeholder="Choose Date" id="date" name="date" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Time:</label>
        <input type="text" class="form-control" id="time" name="time" autocomplete="off">
      </div>
      
       </div>
     
      </div>

      <table class="table table-bordered" id="items">
    <thead>
      <tr class="item-row">
       
        <th>Product Name</th>
        <th>Unit Cost</th>
        <th>Qty</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      <tr class="item-row">
         <td><a class="delete fl" href="javascript:;" title="Remove row">X</a><span><input type="text" class="form-control in autocomplete_txt" id="pn_1" name="pn[]" placeholder="Name" autocomplete="off"></span></td>
          
           
            <td><input type="text" class="form-control cost" value="" placeholder="Unit Cost" id="uc_1" name="uc[]" autocomplete="off"></td>
             <td><input type="number" class="form-control qty" value="" placeholder="Qty" id="qt_1" name="qt[]" autocomplete="off"></td>
              <td><input type="text" class="form-control price" value="" placeholder="Price" id="pr_1" name="pr[]" autocomplete="off"></td>
               
      </tr>
      <tr id="hiderow">
        <td colspan="4"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
      </tr>
      <tr>

          <td colspan="2" class="blank"> </td>
          <td colspan="1" class="total-line">Total</td>
          <td class="total-value"><div id="total"></div></td>
          <input type="text" name="tot" id="tot" hidden>
          <input type="text" name="totnos" id="totnos" hidden>
          <input type="text" name="dueamount" id="dueamount" hidden>


      </tr>
    </tbody>
  </table>
  <div class="row">
      <div class="col-lg-6 col-md-8 shadow p-4 mb-4 bg-white rounded ">
       <div class="form-group">
          <label>Discount%:</label>
          <input type="number" class="form-control" name="dp" id="dp" placeholder="" autocomplete="off">
        </div>
      
      <div class="form-group">
        <label>Total:</label>
        <input type="text" class="form-control" name="gtot" id="gtot" placeholder="" autocomplete="off">
      </div>
      
      </div>
      <div class="col-lg-6 col-md-8 shadow p-4 mb-4 bg-white rounded ">
      <div class="form-group">
          <label>Discount Amount:</label>
          <input type="text" class="form-control" name="da" id="da" placeholder="" autocomplete="off">
        </div>
      
      <div class="form-group">
        <label>Term of Payment:</label>
        <input type="text" class="form-control" name="top" placeholder="" autocomplete="off">
      </div>
       </div>
     
      </div>
<div class="mb-5">
       <button type="submit" formtarget="_blank" formaction="preview.php" class="btn btn-success flex mb-5">Print</button>
       </div>
      </form>
  </div>
<nav class="navbar fixed-bottom  bg-dark navbar-dark">
  <a class="navbar-brand" href="#">2020 ©️ All Rights Reserved</a>
</nav>
    <script src="jquery.js"></script>
    <script src="popper.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="jquery1.js"></script>
  <script src="jquery-ui.js"></script>
  <script type='text/javascript' src='js/custom.js'></script>/body>
</html>