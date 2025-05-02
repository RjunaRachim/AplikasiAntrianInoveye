<?php
include '../config/connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $text = $_POST["text"];

    $text = strtoupper($text);


    $insertQuery = "INSERT INTO runningtext_tb (text) VALUES ('$text')";
    $result = $conn->query($insertQuery);

    if ($result) {
        echo "success";
    } else {
        echo "error";
        echo "Kesalahan: " . $conn->error;
    }

    $conn->close();
} else {
    echo "error";
}
?>
