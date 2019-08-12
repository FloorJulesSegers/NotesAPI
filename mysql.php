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


//Select table
$mysql= "INSERT INTO notes (title, content, made_at)
            VALUES ('$titleClean', '$contentClean', '$date')";
$result = $conn->query($mysql);
if ($result) {
    echo ($mysql);
} else {
    echo "Error: " . $mysql . "<br>" . $conn->error;
}

//Select objects from table
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

//Delete objects
$deleteObject = "DELETE FROM notes WHERE content= ''";
$resultDelete = $conn -> query ($deleteObject);
if ($resultDelete) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

//Update objects
$update = "UPDATE notes SET title='Lennert' WHERE content= 'Hallo allemaal'";
$resultUpdate = $conn -> query ($update);

if ($resultUpdate) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>