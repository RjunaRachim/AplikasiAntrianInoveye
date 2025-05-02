<?php
include '../config/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    $deleteQuery = "DELETE FROM runningtext_tb WHERE id = '$id'";
    $result = $conn->query($deleteQuery);

    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}

mysqli_close($conn);
?>
