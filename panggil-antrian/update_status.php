<?php
// Mendapatkan nilai id dan value dari permintaan POST
$id = $_POST['id'];
$location = $_POST['location'];
$checked = $_POST['checked'];

include'../config/connect.php';

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "UPDATE antrian_tb SET $location = '$checked' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Pembaruan berhasil";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
