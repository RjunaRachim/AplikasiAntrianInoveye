<?php
include '../config/connect.php';

$query = "SELECT * FROM runningtext_tb;";

$result = mysqli_query($conn, $query);

// Memeriksa apakah query berhasil dieksekusi
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}


// Menutup koneksi ke database
mysqli_close($conn);
?>
