<?php
$servername = "localhost";
$username = "admin";
$password = "tmkH6eIrKT0w";
$mydb ="APInotes";

$myTitle = $_GET['title'];
$titleClean = filter_var( $myTitle,FILTER_SANITIZE_STRING);
//echo "$titleClean";


$myContent = $_POST['content'];
$contentClean = filter_var($myContent, FILTER_SANITIZE_STRING);
//echo "$contentClean";

date_default_timezone_set("Europe/Brussels");
$date = date('Y-m-d H:i:s');


// Create connection
$conn = new mysqli($servername, $username, $password,$mydb);

require 'select.php';
require 'list.php';
require 'delete.php';
require 'update.php';

$conn->close();


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>