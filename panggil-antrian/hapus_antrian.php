<?php
include '../config/connect.php';

$id = $_POST['id'];


$sql = "DELETE FROM antrian_tb WHERE id = '$id'";
mysqli_query($conn, $sql);


echo "Antrian dengan nomor $id berhasil dihapus.";
?>
