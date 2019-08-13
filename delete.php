<?php
//Delete objects
$deleteObject = "DELETE FROM notes WHERE content= ''";
$resultDelete = $conn -> query ($deleteObject);
if ($resultDelete) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>