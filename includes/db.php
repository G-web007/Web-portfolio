<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "portfolio_new";

// Connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Checking Error
if(mysqli_connect_error()){
    die("Connection Failed" .mysqli_connect_error());
}
?>