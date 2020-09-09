<?php
	ini_set('error_reporting',E_ALL & ~E_NOTICE );
		$name=$_POST['name'];
		$id=$_POST['id'];
		$email = $_POST['email'];
		$credit = $_POST['credit'];
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
					    $result="INSERT INTO `user`(`name`, `id`, `email`, `credit`) VALUES (?,?,?,?)";
					    $stmt=$conn->prepare($result);
				$stmt->bind_param("sisi",$name,$id,$email,$credit);
				$stmt->execute();
?>


<!DOCTYPE HTML>
<HTML>
<head>
	<title>Add user</title>
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
 .submitt{
 	background: transparent;
  		border-radius: 10px;
  		padding: 3px 20px;
  		text-align: center;
 }
 .form{
 	position: absolute;
 	top: 30%;
 	left:39%;
 	text-align: center;
 }
</style>
</head>
<body>
	<h1>Add User</h1>
	<img alt="Brand" src="http://localhost/internship/logo.png" width="100" height="100" style="position: absolute;top:-1.5%;left:10%;">
	<div class="form">
		<form method="Post" action="addd_user.php">
			<input type="text" name="name" placeholder="Enter name of the new user"  style="border-radius:5px;padding:4px 15px;border-width:1px;border-color:black; width:140%; " required><br><br>
			<input type="number" name="id" placeholder="Enter ID of the new user"  style="border-radius:5px;padding:4px 15px;border-width:1px;border-color:black; width:140%; " required><br><br>
			<input type="text" name="email" placeholder="Enter Email of the new user"  style="border-radius:5px;padding:4px 15px;border-width:1px;border-color:black; width:140%; " required><br><br>
			<input type="number" name="credit" placeholder="Enter credit of the new user"  style="border-radius:5px;padding:4px 15px;border-width:1px;border-color:black; width:140%; " required><br><br>
			<input type="submit" name="" value="Add user" class="submitt">
			<br><br>
  				<a href="http://localhost/internship/transfer.php" style="color:black">Back to Home!!</a>
		</form>
	</div>
</body>
</HTML>