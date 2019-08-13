<?php
//Select table
$mysql= "INSERT INTO notes (title, content, made_at)
            VALUES ('$titleClean', '$contentClean', '$date')";
$result = $conn->query($mysql);
if ($result) {
    echo ($mysql);
} else {
    echo "Error: " . $mysql . "<br>" . $conn->error;
}
?>