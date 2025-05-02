<?php
include '../config/connect.php';

// Kueri SQL untuk mengambil dua data terakhir, satu dengan awalan 'A' dan satu dengan awalan 'B'
$sql = "SELECT antrian
        FROM (
            SELECT antrian, 
                ROW_NUMBER() OVER (PARTITION BY LEFT(antrian, 1) ORDER BY CAST(SUBSTRING(antrian, 3) AS SIGNED) DESC) AS row_num
            FROM display_perawat
            WHERE LEFT(antrian, 1) IN ('A', 'B')
            AND DATE(timestamp) = CURDATE() 
        ) AS result
        WHERE row_num = 1
        ORDER BY antrian;
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil data dari hasil query
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row['antrian'];
    }

    // Mengembalikan data sebagai JSON
    echo json_encode($data);
} else {
    echo "Tidak ada data";
}

$conn->close();
?>
