<?php
include '../config/connect.php';

// Kueri SQL untuk mengambil data terakhir berdasarkan timestamp
$sql = "SELECT antrian, jenis FROM display_sekarang WHERE DATE(timestamp) = CURDATE() ORDER BY timestamp DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil data dari hasil query
    $row = $result->fetch_assoc();
    $data = array(
        'antrian' => $row['antrian'],
        'jenis' => $row['jenis']
    );

    // Mengembalikan data sebagai JSON
    echo json_encode($data);
} else {
    echo "Tidak ada data";
}

$conn->close();
?>
