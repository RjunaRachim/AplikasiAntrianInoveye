<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menerima data dari permintaan POST
    $antrian = $_POST['antrian'];
    $jenis = $_POST['jenis'];


    include '../config/connect.php';


    $sql = "INSERT INTO display_sekarang (antrian, jenis) VALUES ('$antrian', '$jenis')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if ($jenis === 'P. PERAWAT'){
        $sql = "INSERT INTO display_perawat (antrian) VALUES ('$antrian')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else if ($jenis === 'P. DOKTER'){
        $sql = "INSERT INTO display_dokter (antrian) VALUES ('$antrian')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else if ($jenis === 'KASIR'){
        $sql = "INSERT INTO display_kasir (antrian) VALUES ('$antrian')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else if ($jenis === 'OBAT'){
        $sql = "INSERT INTO display_obat (antrian) VALUES ('$antrian')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }



    $conn->close();
}
?>
