<?php
include '../config/connect.php';



$sql = "DELETE FROM antrian_tb WHERE DATE(timestamp) = CURDATE()";
$sql2 = "DELETE FROM display_kasir WHERE DATE(timestamp) = CURDATE()";
$sql3 = "DELETE FROM display_obat WHERE DATE(timestamp) = CURDATE()";
$sql4 = "DELETE FROM display_perawat WHERE DATE(timestamp) = CURDATE()";
$sql5 = "DELETE FROM display_sekarang WHERE DATE(timestamp) = CURDATE()";
$sql6 = "DELETE FROM display_dokter WHERE DATE(timestamp) = CURDATE()";

// Eksekusi perintah SQL
$result1 = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
$result4 = mysqli_query($conn, $sql4);
$result5 = mysqli_query($conn, $sql5);
$result6 = mysqli_query($conn, $sql6);

mysqli_query($conn, $sql);


echo "Seluruh antrian berhasil dihapus.";
?>
