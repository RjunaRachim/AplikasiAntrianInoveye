<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan</title>
    <link rel="icon" href="../src/img/favicon.png">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(190, 190, 190)1;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #0f838c;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../src/img/inovnav.png" style="width: 200px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="../panggil-antrian/index.php">Dashboard</a>
                    <a class="nav-link" href="../ambil-antrian/index.php">Antrian</a>
                    <a class="nav-link" href="../monitor-display/index.php">Display</a>
                    <a class="nav-link active text-white" aria-current="page" href="../pengaturan/index.html">Pengaturan</a>
                </div>
            </div>
            <div class="navbar-text">
                <span class="fs-4 text-white" id="tanggal"></span>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="row fs-2 my-4 fw-bold justify-content-center">
                Running Text
            </div>
        </div>

        <div class="row">
            <div class="col p-3 mx-3 rounded-2 text-white" style="background-color: #0f838c;">
                    <ul>
                        <li>Refresh antrian otomatis setiap 1 menit. Klik <b>Refesh Antrian</b> jika ingin refresh manual</li>
                    </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-8 m-3">
            <button type="button" class="btn text-white" data-bs-toggle="modal" data-bs-target="#formTambahTextModal" style="background-color: #0f838c;">Tambah Text</button>
            </div>
        </div>
    
        <div class="row align-items-center text-center">
            <div class="alert alert-success fs-5 fw-bold" role="alert" id="successCreateAlert" style="display:none;">
                TEXT BERHASIL DITAMBAHKAN
            </div>
        </div>
    
        <div class="row align-items-center text-center">
            <div class="alert alert-success fs-5 fw-bold" role="alert" id="successEditAlert" style="display:none;">
                TEXT BERHASIL DIRUBAH
            </div>
        </div>
    
        <div class="row align-items-center text-center">
            <div class="alert alert-danger fs-5 fw-bold" role="alert" id="successDeleteAlert" style="display:none;">
                TEXT BERHASIL DIHAPUS
            </div>
        </div>
    
        <div class="row align-items-center text-center">
            <div class="alert alert-danger fs-5 fw-bold" role="alert" id="failedAlert" style="display:none;">
                PROSES GAGAL
            </div>
        </div>
    
        <!-- Modal Tambah -->
        <div class="modal fade" id="formTambahTextModal" tabindex="-1" aria-labelledby="formTambahTextModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formTambahTextModalLabel">Tambah Text</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="tambahText">
                            <label for="text" class="my-2">Masukkan text yang akan ditampilan :</label>
                            <textarea class="form-control" type="text" id="text" name="text" autocomplete="off" placeholder="Maksimal 100 karakter - Huruf akan otomatis KAPITAL ketika data dikirim"></textarea>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submitBtn" onclick="tambahText()">
                            <span id="submitBtnText">Tambah Text</span>
                            <div class="spinner-grow spinner-grow-sm" role="status" id="submitLoader" style="display:none;">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-2 rounded-2">
            <table id="data-table" class="table table-bordered my-2 rounded-2 table-striped table-hover mx-auto mb-5">
                <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Running Text</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    include 'ambil_runningtext.php';

                    $nomor = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr draggable="true" id="row-' . $row['id'] . '" ondragstart="dragStart(event, ' . $row['id'] . ')">';
                        echo '<td class="text-center" style="vertical-align: middle;">' . $nomor . '</td>';
                        echo '<td id="text-' . $row['id'] . '" class="text-left" style="vertical-align: middle;">' . $row['text'] . '</td>';
                        echo '<td class="text-center">';
                        echo '<button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editTextModal" data-row="' . $row['id'] . '" onclick="editRow(' . $row['id'] . ')">Edit</button>';
                        echo '<button class="btn btn-danger " type="button" onclick="confirmDelete(' . $row['id'] . ')">Delete</button>';
                        echo '</td>';
                        echo '</tr>';

                        $nomor++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- MODAL HAPUS -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus running text ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Edit -->
    <div class="modal fade" id="editTextModal" tabindex="-1" aria-labelledby="editTextModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTextModalLabel">Edit Text</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Edit Text -->
                    <form id="formEditText">
                        <input type="hidden" id="editId" name="id">
                        <label for="editText" class="form-label">Text :</label>
                        <textarea type="text" class="form-control" id="editText" name="text" required></textarea>
    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="saveEditBtn">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <footer class="bg-white fixed-bottom text-center p-2 footer">
        <div class="container">
            <div class="copyright text-center mb-2 mb-md-0">
                &copy; 2023 - Rjuna. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="../bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    
    <script>
        function updateTanggal() {
            var sekarang = new Date();

            var options = { weekday: 'long', day: 'numeric', month: 'short', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: false };
            var formatter = new Intl.DateTimeFormat('id-ID', options);
            var tanggalString = formatter.format(sekarang);

            document.getElementById("tanggal").innerHTML = tanggalString;
        }

        setInterval(updateTanggal, 1000);

        updateTanggal();
    </script>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    const table = document.querySelector('tbody');

    table.addEventListener('dragstart', function (e) {
        e.dataTransfer.setData('text/plain', e.target.closest('tr').id.replace('row-', ''));
    });

    table.addEventListener('dragover', function (e) {
        e.preventDefault();
    });

    table.addEventListener('drop', function (e) {
        e.preventDefault();
        const id = e.dataTransfer.getData('text/plain');
        const draggedRow = document.getElementById('row-' + id);
        const targetRow = e.target.closest('tr');

        if (targetRow && targetRow !== draggedRow) {
            const rows = Array.from(table.children);
            const draggedIndex = rows.indexOf(draggedRow);
            const targetIndex = rows.indexOf(targetRow);

            // Ubah urutan baris dalam array
            const rowsCopy = [...rows];
            rowsCopy.splice(draggedIndex, 1);
            rowsCopy.splice(targetIndex, 0, draggedRow);

            // Perbarui nomor urut dan ID baris
            rowsCopy.forEach((row, index) => {
                row.querySelector('td:first-child').textContent = index + 1;
                row.id = 'row-' + row.dataset.rowId;
            });

            // Sisipkan ulang baris dalam tabel
            table.innerHTML = '';
            rowsCopy.forEach(row => table.appendChild(row));

            // Jika perlu, perbarui nomor urut dalam database
            // Anda dapat menggunakan AJAX untuk mengirim permintaan ke server untuk memperbarui urutan.
        }
    });
});

    </script>

    <script>
        function tambahText() {
            var text = $('#text').val();
            var submitBtn = $('#submitBtn');
            var submitBtnText = $('#submitBtnText');
            var submitLoader = $('#submitLoader');
            var successAlert = $('#successCreateAlert');
            var failedAlert = $('#failedAlert');

            submitBtnText.hide();
            submitLoader.show();

            setTimeout(function () {
                $.ajax({
                    type: 'POST',
                    url: 'tambah_text.php',
                    data: {
                        text: text,
                    },
                    success: function (response) {
                        if (response === 'success') {
                            hideAllAlerts();
                            // Tampilkan modal
                            $('#formTambahTextModal').modal('hide');
                            successAlert.fadeIn(1000).delay(2000).fadeOut(1000);

                            setTimeout(function () {
                                location.reload();
                            }, 4000);

                            clearTextForm();
                        } else {
                            hideAllAlerts();
                            failedAlert.fadeIn(1000).delay(2000).fadeOut(1000);
                        }
                    },
                    error: function () {
                        alert('Terjadi kesalahan saat membuat Text.');
                    },
                    complete: function () {
                        submitBtnText.show();
                        submitLoader.hide();
                    }
                });
            }, 2000);
        }

        function hideAllAlerts() {
            $('#successAlert').hide();
        }

        function clearTextForm() {
            $('#text').val('');
        }

    </script>

    <script>
        function toggleForm() {
            var formTambahText = document.getElementById("formTambahText");
            formTambahText.style.display = (formTambahText.style.display === "none" || formTambahText.style.display === "") ? "block" : "none";
        }

        function editRow(rowId) {
            var id = rowId;
            var username = document.getElementById('text-' + rowId).innerText;

            // Mengisi formulir modal dengan data yang benar
            $('#editId').val(id);
            $('#editText').val(username);

        }

        function saveEditRow() {
            var id = $('#editId').val();
            var editedText = $('#editText').val();
            var successEditAlert = $('#successEditAlert');
            var saveEditBtn = $('#saveEditBtn');

            saveEditBtn.html('Menyimpan... <span class="spinner-border spinner-border-sm" role="status"></span>');

            setTimeout(function () {
                $.ajax({
                type: 'POST',
                url: 'edit_text.php',
                data: {
                    id: id,
                    text: editedText,
                },
                success: function (response) {
                    if (response === 'success') {
                        saveEditBtn.attr('disabled', true); 
                        $('#editTextModal').modal('hide');

                        successEditAlert.fadeIn(1000).delay(2000).fadeOut(1000);

                        saveEditBtn.attr('disabled', false);

                        setTimeout(function () {
                                location.reload();
                            }, 4000);
                    } else {
                        alert('Gagal menyimpan perubahan. Silakan coba lagi.');
                    }
                },
                error: function () {
                    alert('Terjadi kesalahan saat menyimpan perubahan.');
                },
                complete: function () {
                    saveEditBtn.html('Simpan Perubahan');
                }
            });
                }, 2000);
            
        }



        $(document).ready(function () {
            $('#saveEditBtn').click(function () {
                saveEditRow();
            });
        });


        function confirmDelete(id) {
            $('#deleteConfirmationModal').modal('show');

            $('#confirmDeleteButton').off().on('click', function () {
                var confirmDeleteButton = $(this); // Simpan referensi tombol konfirmasi delete
                confirmDeleteButton.html('Menghapus... <span class="spinner-border spinner-border-sm" role="status"></span>');

                setTimeout(function () {
                    $.ajax({
                        type: 'POST',
                        url: 'delete_Text.php',
                        data: { id: id },
                        success: function (response) {
                            if (response === 'success') {
                                $('#deleteConfirmationModal').modal('hide');
                                // Tampilkan alert delete sukses
                                $('#successDeleteAlert').fadeIn(1000).delay(2000).fadeOut(1000);

                                // Hapus baris dari tabel
                                setTimeout(function () {
                                    location.reload();
                                }, 4000);

                                $('#row-' + id).remove();
                            } else {
                                // Tampilkan alert delete gagal
                                $('#failedAlert').fadeIn(1000).delay(2000).fadeOut(1000);
                            }
                        },
                        error: function () {
                            alert('Terjadi kesalahan saat menghapus Text.');
                        },
                        complete: function () {
                            // Kembalikan teks tombol ke semula
                            confirmDeleteButton.html('Delete');
                        }
                    });
                }, 2000);
            });
        }

    </script>

</body>
</html>
