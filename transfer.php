<?php

//including the database connection file
    $host="localhost";
    $dbUsername="root";
    $dbpassword="";
    $dbname="transfer_credit";
/// Create a connection
    $conn= new mysqli($host,$dbUsername,$dbpassword,$dbname);
/// for error occurs in connection
    
    if (mysqli_connect_error()) {
      die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }

$result = mysqli_query($conn, "SELECT name FROM user ORDER BY id"); 
?>
<!DOCTYPE HTML>
<HTML>
<head>
	<title>Transfer</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <style type="text/css">
body{
  background-color: #b8c6db;
  background-image: linear-gradient(315deg, #b8c6db 0%, #f5f7fa 74%);
  background-repeat:no-repeat;
 }
 .add{
  left:5%;
  margin-left:3%;
 }
.navbar {
  min-height: 80px;
}

.navbar-header {
  padding: 0 15px;
  height: 80px;
  line-height: 80px;
}
	  </style>
</head>
<body>
	<h2>Credit Management System</h2>
  
	<nav class="navbar navbar-default">
  		<div class="container-fluid" >
    	<div class="navbar-header">

      <a class="navbar-brand" href="#">
      	<span><img alt="Brand" src="http://localhost/internship/logo.png" width="90" height="90" style="position: absolute;top:0%;"></span>
      </a>
      <ul class="nav navbar-nav">
      <li class="active" style="position: absolute;left:10%;top:15%;font-size:20px;"><a href="index.html">Home</a></li>
      <li style="position: absolute;left:15%;top:15%;font-size:20px;"><a href="http://localhost/internship/transfer.php">Transfer Credits</a></li>
    </ul>
    </div>
  </div>
</nav>
<div>
<table class="table" style="position: absolute;left: 35%;width:30%" cellspacing="20%">
    <thead>
      <tr>
        <th style="font-size:20px;text-align: center;">User Name</th>
        <th style="font-size:20px;text-align: left;">Operation</th>
      </tr>
    </thead>
    <tbody>
      <?php 
  
  while($res = mysqli_fetch_array($result)) {     
    echo "<tr>";
      echo "<td style=\"text-align:center\">".$res['name']."</td>";
      echo "<td ><a href=\"transfer_credit.php?ID=$res[name]\">Transfer</a></td>";
      echo "<td ><a href=\"user_delete.php?ID=$res[name]\">Delete User</a></td>";
  }
  ?>
    </tbody>
</div>
<div class="add">
  <a href="http://localhost/internship/addd_user.php"><H5>Add a user by clicking here</H5></a></div>
</body>
