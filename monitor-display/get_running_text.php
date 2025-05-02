<?php
include '../config/connect.php';

$sql = "SELECT text FROM runningtext_tb"; 

$result = $conn->query($sql);

// Inisialisasi array
$array_teks = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $array_teks[] = $row["text"]; 
    }
} else {
    echo "0 hasil";
}

$conn->close();

$padding = str_repeat("&nbsp;", 10);

$imploded_string = "";

$count = count($array_teks); 

foreach ($array_teks as $index => $teks) {
    $imploded_string .= $teks . $padding;
    if ($index < $count - 1) {
        $imploded_string .= " ║ " . $padding;
    }
}

echo $imploded_string;
?>