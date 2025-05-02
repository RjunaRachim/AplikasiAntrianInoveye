<?php
// Konfigurasi database
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "antrian_db"; 

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
} 

?>
