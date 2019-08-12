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

$date = date('Y-m-d H:i:s');
date_default_timezone_set("Europe/Brussels");


// Create connection
$conn = new mysqli($servername, $username, $password,$mydb);


//Select table
$mysql= "INSERT INTO notes (title, content, made_at)
            VALUES ('$titleClean', '$contentClean', '$date')";
$result = $conn->query($mysql);
if ($result) {
    echo ($mysql);
} else {
    echo "Error: " . $mysql . "<br>" . $conn->error;
}

$list = "SELECT * FROM notes";
$resultList = $conn -> query ($list);
if ($resultList->num_rows > 0) {
    // output data of each row
    while($row = $resultList->fetch_assoc()) {
        echo "<br> Title: ". $row["title"]. " - Content: ". $row["content"]. " " . $row["made_at"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close;


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>