<?php 
include'../config/connect.php';

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


$sql2 = "DELETE FROM display_dokter";

if ($conn->query($sql2) === TRUE) {
    echo "Reset Berhasil";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql3 = "DELETE FROM display_kasir";

if ($conn->query($sql3) === TRUE) {
    echo "Reset Berhasil";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql4 = "DELETE FROM display_obat";

if ($conn->query($sql4) === TRUE) {
    echo "Reset Berhasil";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "DELETE FROM display_perawat";

if ($conn->query($sql) === TRUE) {
    echo "Reset Berhasil";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "DELETE FROM display_sekarang";

if ($conn->query($sql) === TRUE) {
    echo "Reset Berhasil";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>