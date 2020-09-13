<?php
	ini_set('error_reporting',E_ALL & ~E_NOTICE );
		$sel=$_POST['status1'];
		$num=$_POST['credit'];
		$ID = $_POST['from'];
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
		$result =mysqli_query($conn, "SELECT credit FROM user WHERE name='". $sel ."' ");
		$res=mysqli_fetch_array($result);
		$num=(int)$num;
		if($num <= 0){
			echo "<script>alert(\"Enter credit > 0 (INVALID CREDIT) \");window.location.href=\"http://localhost/internship/transfer.php\";</script> ";
					}
		else if($num > $res['credit']){
			echo "<script>alert(\"INSUFFICIENT CREDITS!!\");window.location.href=\"http://localhost/internship/transfer.php\";</script>";
				}
		else if(strcmp($sel,$ID)==0){
			echo "<script>alert(\"CANNOT TRANSFER TO SELF \");window.location.href=\"http://localhost/internship/transfer.php\";</script> ";
					}
		if($num <= $res['credit'] && $num>0 ){
			$result1=mysqli_query($conn, "UPDATE user SET credit= credit+$num  WHERE name='".$sel."' ");
			$result2=mysqli_query($conn, "UPDATE `user` SET `credit`=credit-$num WHERE name= '".$ID."' ");
			if($result1 ==1){
			echo "<script>alert(\"TRANSACTION SUCCESFULL\");window.location.href=\"http://localhost/internship/transfer.php\";</script>";
			}
		}
		

?>