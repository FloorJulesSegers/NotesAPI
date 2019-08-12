<?php
$servername = "localhost";
$username = "admin";
$password = "tmkH6eIrKT0w";
$mydb ="APInotes";

$myTitle = $_GET['title'];
$titleClean = filter_var( $myTitle,FILTER_SANITIZE_STRING);
echo "<p>My title is: <?php $titleClean ?>.</p>";


$myContent = $_POST['content'];
$contentClean = filter_var($myContent, FILTER_SANITIZE_STRING);
echo "$myContent";

// Create connection
$conn = new mysqli($servername, $username, $password,$mydb);


//Select table
$mysql= "INSERT INTO notes (title, content, made_at)
            VALUES ('$titleClean', '$contentClean','2019-08-12')";
$result = $conn->query($mysql);
if ($result) {
    echo "New record created successfully";
} else {
    echo "Error: " . $mysql . "<br>" . $conn->error;
}

$conn->close;


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>