<?php
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
?>