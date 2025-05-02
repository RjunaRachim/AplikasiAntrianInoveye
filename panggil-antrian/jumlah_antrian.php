<?php
include '../config/connect.php';

$sql = "SELECT COUNT(*) AS antrian FROM antrian_tb WHERE DATE(timestamp) = CURDATE()";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil data antrian
    $row = $result->fetch_assoc();
    $jumlah_antrian = $row['antrian'];

    // Kembalikan respons dalam bentuk objek JSON
    echo json_encode(['antrian' => $jumlah_antrian]);
} else {
    // Kembalikan pesan jika tidak ada data
    echo json_encode(['error' => 'Tidak ada data antrian']);
}

$conn->close();
?>
