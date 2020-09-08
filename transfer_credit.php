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
?>
<!DOCTYPE HTML>
<head>
	<title>Operation</title>
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
 select{
		background: transparent;
  		border-radius: 10px;
  		padding: 7px 25px;
  		text-align: center;
	}
	  	table{
	  		font-size:15px;
	  	}
	  	.heading{
	  		position: absolute;
	  		top: 0%;
	  	}
	  	.form{
	  		position: absolute;
	  		top:15%;
	  		left:45%;
	  	}
	  </style>
</head>
<body>
	<div class="heading"><img alt="Brand" src="http://localhost/internship/logo.png" width="90" height="90" style="position: absolute;top:0%;"></div>

			<?php
			ini_set('error_reporting',E_ALL & ~E_NOTICE );
				$ID = $_GET['ID'];
				$result=mysqli_query($conn,"SELECT name,id,email,credit FROM user WHERE name='". $ID ."' ");
			?>
	<div class="data">
		<table class="table" style="position: absolute;left:5%;width:30%">
			<thead>
			<tr>
			<th style="text-align: center;font-size: 20px;">YOUR DETAILS</th>	
			</tr>
			</thead>
			<tbody>
				<?php
				while($res = mysqli_fetch_array($result)) {     
    				echo "<tr>";
    				echo "<td style=\"text-align:center;\"><b>USER NAME</b><br><br>".$res['name']."</td>";
    				echo "<br>";
    				echo "</tr>";
					echo "<tr>";
    				echo "<td style=\"text-align:center;\"><b>USER ID</b><br><br>".$res['id']."</td>";
    				echo "<br>";
    				echo "</tr>";
					echo "<tr>";
    				echo "<td style=\"text-align:center;\"><b>USER EMAIL</b><br><br>".$res['email']."</td>";
    				echo "<br>";
    				echo "</tr>";
					echo "<tr>";
    				echo "<td style=\"text-align:center;\"><b>TOTAL CREDITS AVAILABLE</b><br><br>".$res['credit']."</td>";
    				echo "<br>";
    				echo "</tr>";
      			}
      			?>
			</tbody>
		</table>
	</div>
	<div class="form">
		<h3>Transfer credits
		<img alt="Brand" src="http://localhost/internship/logo.png" width="60" height="60">
	</h3>
		<form action="transfer_op.php" method="post">

			<label style="font-size:20px;">From</label>
			<?php
				echo "<input type=\"text\" name=\"from\" placeholder=\"".$ID."\" required size=\"30\"  style=\"border-radius:5px\;padding:4px 15px\;border-width:1px\;border-color:black; width:140%;\">";
				?>
				<br><br><br>
			<label style="font-size:20px;">Select user to transfer credits :</label>
			<br>
			<select name="status1" id="status">

				<option value="Select">-SELECT-</option>
				<?php
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

					$result = mysqli_query($conn, "SELECT name FROM user "); 
					while($res = mysqli_fetch_array($result)) { 
						echo "<option value='".$res['name']."' > ".$res['name']." </option>";
						
					}
  					?>	
  				</select>
  				<br>
  				<br>
  				<input type="number" name="credit" placeholder="Enter the credit to be transfered" required size="50"  style="border-radius:5px;padding:4px 15px;border-width:1px;border-color:black; width:140%;">
  				<br><br><br>
  				<input type="submit" name="" value="Transfer" class="submitt">
  				<br><br>
  				<a href="http://localhost/internship/transfer.php" style="color:black">Back to Home!!</a>
		</form>
	</div>
