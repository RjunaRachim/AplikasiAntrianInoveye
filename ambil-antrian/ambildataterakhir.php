<?php
include '../config/connect.php';

$prefix = $_GET['prefix'];

$sql = "SELECT antrian
        FROM antrian_tb
        WHERE LEFT(antrian, 1) = '$prefix'
        AND DATE(timestamp) = CURDATE()
        ORDER BY CAST(SUBSTRING(antrian, 3) AS SIGNED) DESC
        LIMIT 1";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row['antrian'];
    }

    echo json_encode($data);
} else {
    echo "Tidak ada data";
}

$conn->close();
?>
