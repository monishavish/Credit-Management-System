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
    $ID=$_GET['ID'];
    $result=mysqli_query($conn,"DELETE FROM user WHERE name='".$ID."' ");
    header("Location:http://localhost/internship/transfer.php");
    ?>