<?php
$servername = "localhost";
$username = "admin";
$password = "tmkH6eIrKT0w";
$mydb ="APInotes";

$feedback=[];

$myTitle = filter_var($_GET['title'], FILTER_SANITIZE_STRING);
//$titleClean = filter_var( $myTitle,FILTER_SANITIZE_STRING);
$myContent = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
//$contentClean = filter_var($myContent, FILTER_SANITIZE_STRING);
date_default_timezone_set("Europe/Brussels");
$date = date('Y-m-d H:i:s');
//$date = filter_var($_GET['made_at'], FILTER_SANITIZE_STRING);

$feedback = [];

// Create connection
$conn = new mysqli($servername, $username, $password,$mydb);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

//Validation
//Select table
if(isset($_GET['title'])){
if(isset($_POST['content'])) {
    //$result = $conn->query($mysql);
    $mysql= "INSERT INTO notes (title, content, made_at)
            VALUES ('$titleClean', '$contentClean', '$date')";
    $result = $conn->query($mysql);
    if ($result){
        echo "Record created succesfully";
    }
    else {
    echo "Error: " . $mysql . "<br>" . $conn->error;
    }
        } elseif (isset($_POST['update'])) {
            $update = "UPDATE notes SET content = '$update' WHERE Title = '$title'";
            $resultUpdate = $conn -> query ($update);
            if ($resultUpdate) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
}
}
if(isset($_GET['title'])){
if(isset($_POST['content'])){
    $list = "SELECT * FROM notes";
    $resultList = $conn -> query ($list);
    $i = 0;
    $array_result = [];
    if ($resultList->num_rows > 0) {
    // output data of each row
    while($row = $resultList->fetch_assoc()) {
        echo "<br> Title: ". $row["title"]. " <br> Content: ". $row["content"]. "<br> Made at: " . $row["made_at"] . "<br>";
    }
    print json_encode($array_result); 
} else {
    echo "0 results";
}
}

if(isset($_GET['title'])){
if(isset($_POST['content'])){
    $deleteObject = "DELETE FROM notes WHERE content= ''";
    $resultDelete = $conn -> query ($deleteObject);
    if ($resultDelete) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    }
}

$conn->close();
?>