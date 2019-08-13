<?php
//Update objects
$update = "UPDATE notes SET title='Lennert' WHERE content= 'Hallo allemaal'";
$resultUpdate = $conn -> query ($update);

if ($resultUpdate) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
?>