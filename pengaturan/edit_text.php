<?php

include '../config/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $text = $_POST["text"];

    $text = strtoupper($text);

    $updateQuery = "UPDATE runningtext_tb SET text='$text' WHERE id='$id'";
    $result = $conn->query($updateQuery);

    if ($result) {
        echo "success";
    } else {
        echo "error";
        echo "Kesalahan: " . $mysqli->error;
    }

    $conn->close();
} else {
    echo "error";
}
?>
