<?php
include '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomorAntrian = isset($_POST['antrian']) ? $_POST['antrian'] : '';

    

    $query = "INSERT INTO antrian_tb (antrian) VALUES ('$nomorAntrian')";

    if ($conn->query($query) === TRUE) {
        echo "Nomor antrian berhasil disimpan ke dalam database";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>
