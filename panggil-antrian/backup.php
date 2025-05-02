<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include '../config/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangani data yang diterima dari formulir
    $dateA = $_POST["dateA"];
    $dateB = $_POST["dateB"];

    $query = "SELECT * FROM antrian_tb WHERE DATE(timestamp) BETWEEN '$dateA' AND '$dateB';";
    $result = mysqli_query($conn, $query);

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $columnIndex = 1;
    while ($column = mysqli_fetch_field($result)) {
        $sheet->setCellValueByColumnAndRow($columnIndex++, 1, $column->name);
    }

    $rowIndex = 2;
    while ($row = mysqli_fetch_assoc($result)) {
        $columnIndex = 1;
        foreach ($row as $value) {
            $sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $value);
        }
        $rowIndex++;
    }

    $writer = new Xlsx($spreadsheet);
    $excelFileName = 'backup_laporan.xlsx';
    $writer->save($excelFileName);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $excelFileName . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
} else {
    echo "Metode yang tidak valid.";
}

mysqli_close($conn);
?>
