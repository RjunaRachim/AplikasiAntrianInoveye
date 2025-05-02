<?php
include '../config/connect.php';

// Fungsi untuk mengambil data dari database
function ambilData() {
    global $conn;

    // Query untuk mengambil data dari database
    $query = "SELECT * FROM antrian_tb WHERE DATE(timestamp) = CURDATE()";
    $result = $conn->query($query);

    // Tampung data dalam array
    $data = array();

    // Periksa apakah hasil query tidak kosong
    if ($result->num_rows > 0) {
        // Loop melalui hasil query
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close(); // Tutup koneksi
    return $data;
}
?>
