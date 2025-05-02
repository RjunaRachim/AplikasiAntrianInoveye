<?php
// Simulasi data dari array
$array_teks = ["SELAMAT", "SELAMAT", "JADWAL"];

$padding = str_repeat("&nbsp;", 10);

$imploded_string = ""; // Inisialisasi string kosong untuk menyimpan hasil gabungan
$count = count($array_teks); // Hitung jumlah elemen dalam array

foreach ($array_teks as $index => $teks) {
    $imploded_string .= $teks . $padding;
    if ($index < $count - 1) {
        $imploded_string .= " ║ " . $padding;
    }
}

echo $imploded_string;
?>
