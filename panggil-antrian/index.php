<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panggil Antrian</title>
    <link rel="icon" href="../src/img/favicon.png">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
        background-color: rgb(190, 190, 190)1;
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
              <a class="nav-link active text-white" aria-current="page" href="#">Dashboard</a>
              <a class="nav-link" href="../ambil-antrian/index.php">Antrian</a>
              <a class="nav-link" href="../monitor-display/index.php">Display</a>
              <a class="nav-link" href="../pengaturan/index.html">Pengaturan</a>
            </div>
          </div>
          <div class="navbar-text">
            <span class="fs-4 text-white" id="tanggal"></span>
          </div>
        </div>
    </nav>

    <div class="container h-100 mt-4">
          <div class="row">
            <div class="col-2 p-3 mx-3 rounded-2 text-white" style="background-color: #0f838c;">
              Jumlah antrian
              <div class="fs-1 text-white" id="jumlahAntrian">
                --
              </div>
            </div>

            <div class="col-2 p-3 mx-3 rounded-2 text-white" style="background-color: #0f838c;">
              Antrian Selesai
              <div class="fs-1 text-white" id="antrianSelesai">
                --
              </div>
            </div>

            <div class="col p-3 mx-3 rounded-2 text-white" style="background-color: #0f838c;">
              <ul>
                <li>Refresh antrian otomatis setiap 1 menit. Klik <b>Refesh Antrian</b> jika ingin refresh manual</li>
              </ul>
            </div>
          </div>

          <div class="container bg-body-secondary rounded-2 mt-4 p-4">
            <div class="row">

              <button class="col-2 p-3 mx-3 mb-3 rounded-2 text-white" style="background-color: #0f838c;" onclick="autoRefresh()">
              Refresh Antrian
              </button>
            </div>

            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari nomor antrian..." id="searchInput">
            </div>

            <table id="antrianTable" class="table table-hover text-center table-bordered">
              <thead>
                <tr>
                  <th scope="col" class="col-2">Antrian</th>
                  <th scope="col">Status</th>
                  <th scope="col">Panggil</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'ambil_data.php';

                $dataAntrian = ambilData();

                foreach ($dataAntrian as $data) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $data["antrian"] . "</th>";
                    echo '<td>
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">';
                
                    // Checkbox Perawat
                    echo '<input type="checkbox" class="btn-check" id="btncheck' . $data['id'] . '-1" autocomplete="off" onclick="updateDatabase(' . $data['id'] . ', this.checked, \'pemeriksaan_perawat\')" value="' . $data['pemeriksaan_perawat'] . '"';
                    echo $data['pemeriksaan_perawat'] == 1 ? ' checked' : '';
                    echo '><label class="btn btn-outline-success" for="btncheck' . $data['id'] . '-1">Perawat</label>';

                
                    // Checkbox Dokter
                    echo '<input type="checkbox" class="btn-check" id="btncheck' . $data['id'] . '-2" autocomplete="off" onclick="updateDatabase(' . $data['id'] . ', this.checked, \'pemeriksaan_dokter\')" value="' . $data['pemeriksaan_dokter'] . '"';
                    echo $data['pemeriksaan_dokter'] == 1 ? ' checked' : '';
                    echo '><label class="btn btn-outline-success" for="btncheck' . $data['id'] . '-2">Dokter</label>';
                
                    // Checkbox Kasir
                    echo '<input type="checkbox" class="btn-check" id="btncheck' . $data['id'] . '-3" autocomplete="off" onclick="updateDatabase(' . $data['id'] . ', this.checked, \'kasir\')" value="' . $data['kasir'] . '"';
                    echo $data['kasir'] == 1 ? ' checked' : '';
                    echo '><label class="btn btn-outline-success" for="btncheck' . $data['id'] . '-3">Kasir</label>';
                
                    // Checkbox Obat
                    echo '<input type="checkbox" class="btn-check" id="btncheck' . $data['id'] . '-4" autocomplete="off" onclick="updateDatabase(' . $data['id'] . ', this.checked, \'obat\')" value="' . $data['obat'] . '"';
                    echo $data['obat'] == 1 ? ' checked' : '';
                    echo '><label class="btn btn-outline-success" for="btncheck' . $data['id'] . '-4">Obat</label>';
                
                    echo '</div>
                          </td>';
                
                    echo "<td>
                    <button class='btn text-white panggil-periksa' data-antrian='" . $data["antrian"] . "' data-jenis='P. PERAWAT' style='background-color: #0f838c;'>Pmrks. Perawat</button>

                    <button class='btn text-white panggil-periksa-dokter' data-antrian='" . $data["antrian"] . "' data-jenis='P. DOKTER' style='background-color: #0f838c;'>Pmrks. Dokter</button>

                    <button class='btn text-white panggil-kasir' data-antrian='" . $data["antrian"] . "' data-jenis='KASIR' style='background-color: #0f838c;'>Kasir</button>

                    <button class='btn text-white panggil-obat' data-antrian='" . $data["antrian"] . "' data-jenis='OBAT' style='background-color: #0f838c;'>Obat</button>
                    </td>";

                    echo '<td>';
                    echo '<div class="dropdown">';
                    echo '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">';
                    echo '<i class="bi bi-three-dots"></i>';
                    echo '</button>';
                    echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                    echo '<li><a class="dropdown-item" href="#" onclick="hapusAntrian(' . $data["id"] . ', \'' . $data["antrian"] . '\')">Hapus Antrian</a></li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '</td>';

                    echo "</tr>";
                }

                // Jika tidak ada data
                if (empty($dataAntrian)) {
                  echo "<tr><td colspan='2'>Tidak ada data antrian</td></tr>";
                }
                ?>
                
              </tbody>
            </table>
          </div>
          
    </div>

    <!-- MODAL HAPUS ANTRIAN -->
    <div class="modal fade" id="hapusAntrianModal" tabindex="-1" aria-labelledby="hapusAntrianModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="hapusAntrianModalLabel">Hapus Antrian</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin menghapus antrian <b><span id="antrianID"></span></b> ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-danger" id="hapusAntrianButton">Hapus</button>
          </div>
        </div>
      </div>
    </div>


    <p id="displayantrian" hidden>nomor antrian akan ditampilkan di sini.</p>
    
    <footer class="bg-white text-center p-2">
      <div class="container">
        <div class="copyright text-center mb-2 mb-md-0">
          &copy; 2024 - Rjuna. All rights reserved.
        </div>
      </div>
    </footer>

    <audio id="tingtung" src="../src/audio/tingtung.mp3"></audio>

    <script src="../bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=HiGBx7yy"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Fungsi untuk melakukan prerender
            function prerenderVoice() {
                responsiveVoice.speak("Antrian suara berhasil dijalankan.", "Indonesian Female", {
                    volume: 0,  // volume 0 agar suara tidak terdengar
                    rate: 1,    // rate standar
                    pitch: 1,   // pitch standar
                    onstart: function() {
                        console.log("Prerender dimulai.");
                    },
                    onend: function() {
                        console.log("Prerender selesai. Suara siap digunakan.");
                    }
                });
            }

            // Memanggil fungsi prerender ketika halaman pertama kali dimuat
            prerenderVoice();
        });
    </script>

    <!-- FUNGSI TANGGAL -->
    <script>
        function updateTanggal() {
        var sekarang = new Date();

        var options = { weekday: 'long', day: 'numeric', month: 'short', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: false };
        var formatter = new Intl.DateTimeFormat('id-ID', options);
        var tanggalString = formatter.format(sekarang);

        document.getElementById("tanggal").innerHTML = tanggalString;
        }

        
        // Update setiap detik
        setInterval(updateTanggal, 60000);
        
        // Panggil untuk pertama kali
        updateTanggal();
    </script>

    <!-- CARI ANTRIAN -->
    <script>
    document.getElementById("searchInput").addEventListener("input", function() {
      var input, filter, table, tr, th, i, txtValue;
      input = this.value.toUpperCase();
      table = document.getElementById("antrianTable"); 
      tr = table.getElementsByTagName("tr");
      th = table.getElementsByTagName("th");

      // Periksa setiap kolom Antrian dan tampilkan baris yang cocok
      for (i = 0; i < tr.length; i++) {
        var displayStyle = "";
        for (var j = 0; j < th.length; j++) {
          td = tr[i].getElementsByTagName("th")[j];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(input) > -1) {
              displayStyle = "";
              break;
            } else {
              displayStyle = "none";
            }
          }
        }
        tr[i].style.display = displayStyle;
      }
    });
    </script>


    <!-- UPDATE DATABASE -->
    <script>
    function updateDatabase(id, checked, location) {
        // Kirim permintaan AJAX ke server untuk memperbarui nilai di database
        $.ajax({
            type: 'POST',
            url: 'update_status.php', 
            data: {
                id: id,
                checked: checked ? '1' : '0',
                location: location
            },
            success: function(response) {
                console.log('Database updated successfully');
            },
            error: function(error) {
                console.error('Error updating database:', error);
            }
        });
    }
    </script>

    <!-- HAPUS ANTRIAN -->
    <script>
    function hapusAntrian(id, antrian) {

        document.getElementById('antrianID').innerText = antrian;

        var modal = new bootstrap.Modal(document.getElementById('hapusAntrianModal'));
        modal.show();

        document.getElementById('hapusAntrianButton').addEventListener('click', function() {
            hapusAntrianPHP(id);
        });
    }


    function hapusAntrianPHP(id) {
        // Kirim permintaan AJAX ke server untuk menghapus antrian
        $.ajax({
            type: 'POST',
            url: 'hapus_antrian.php',
            data: {
                id: id
            },
            success: function(response) {
                console.log('Antrian berhasil dihapus');

                location.reload();
            },
            error: function(error) {
                console.error('Error menghapus antrian:', error);
            }
        });
    }
    </script>

    <!-- RESET DATABASE -->
    <script>
      function confirmReset() {
          // Menampilkan alert konfirmasi
          var confirmation = confirm("ANDA YAKIN MERESET ANTRIAN ? LAKUKAN INI HANYA SAAT BERGANTI HARI");

          // Jika pengguna menekan OK, panggil fungsi resetAntrian
          if (confirmation) {
              resetAntrian();
              location.reload();
              localStorage.clear();
          }
      }

      function resetAntrian() {
          $.ajax({
              type: 'POST',
              url: 'reset_antrian.php', 
              success: function(response) {
                  console.log('Antrian diatur ulang');
              },
              error: function(error) {
                  console.error('Error resetting antrian:', error);
              }
          });
      }
    </script>

    <!-- AUTOREFRESH
    <script>
        function autoRefresh() {
            location.reload();
        }

        setInterval(autoRefresh, 60000); 
    </script> -->

    <!-- JUMLAH ANTRIAN -->
    <script>
      function ambilJumlahAntrian() {
          var xhr = new XMLHttpRequest();

          // Mengonfigurasi permintaan GET ke server
          xhr.open('GET', 'jumlah_antrian.php', true);

          // Menangani perubahan status permintaan
          xhr.onreadystatechange = function () {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                  if (xhr.status === 200) {
                      // Menangani data yang diterima dari server
                      var hasil = JSON.parse(xhr.responseText);

                      if (hasil.antrian) {
                          document.getElementById('jumlahAntrian').innerText = hasil.antrian;
                      } else {
                          console.error('Data antrian tidak ditemukan dalam respons:', xhr.responseText);
                      }
                  } else {
                      console.error('Gagal mengambil data dari server. Kode status:', xhr.status);
                  }
              }
          };

          // Menangani kesalahan jaringan
          xhr.onerror = function () {
              console.error('Gagal melakukan permintaan ke server.');
          };

          // Mengirim permintaan ke server
          xhr.send();
      }

      function ambilAntrianSelesai() {
          var xhr = new XMLHttpRequest();

          // Mengonfigurasi permintaan GET ke server
          xhr.open('GET', 'antrian_selesai.php', true);

          // Menangani perubahan status permintaan
          xhr.onreadystatechange = function () {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                  if (xhr.status === 200) {
                      // Menangani data yang diterima dari server
                      var hasil = JSON.parse(xhr.responseText);

                      if (hasil.antrian) {
                          document.getElementById('antrianSelesai').innerText = hasil.antrian;
                      } else {
                          console.error('Data antrian tidak ditemukan dalam respons:', xhr.responseText);
                      }
                  } else {
                      console.error('Gagal mengambil data dari server. Kode status:', xhr.status);
                  }
              }
          };

          // Menangani kesalahan jaringan
          xhr.onerror = function () {
              console.error('Gagal melakukan permintaan ke server.');
          };

          // Mengirim permintaan ke server
          xhr.send();
      }


      var ambilAntrianFunctions = [ambilJumlahAntrian, ambilAntrianSelesai];

      // Memanggil semua fungsi pengambilan antrian
      ambilAntrianFunctions.forEach(function (ambilAntrianFunction) {
          ambilAntrianFunction();
      });

      // Menetapkan interval untuk semua fungsi pengambilan antrian
      setInterval(function () {
          ambilAntrianFunctions.forEach(function (ambilAntrianFunction) {
              ambilAntrianFunction();
          });
      }, 30000);
    </script>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.panggil-periksa').forEach(function (button) {
          button.addEventListener('click', function () {
            var antrian = this.getAttribute('data-antrian');
            var jenis = this.getAttribute('data-jenis');
            panggilPeriksa(antrian, jenis);

            antrianSekarang(antrian, jenis);
          });
        });

        function antrianSekarang(antrian, jenis) {
            // Membuat objek FormData untuk menyimpan data
            var formData = new FormData();
            formData.append('antrian', antrian);
            formData.append('jenis', jenis);

            // Membuat objek XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Mengonfigurasi permintaan
            xhr.open('POST', 'antrian_sekarang.php', true);

            // Menangani perubahan status permintaan
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log('Data berhasil dikirim ke server');
                        // Mungkin Anda ingin melakukan sesuatu setelah data terkirim
                    } else {
                        console.error('Gagal mengirim data ke server');
                    }
                }
            };

            // Mengirim data ke server
            xhr.send(formData);
        }

        document.querySelectorAll('.panggil-periksa-dokter').forEach(function (button) {
          button.addEventListener('click', function () {
            var antrian = this.getAttribute('data-antrian');
            var jenis = this.getAttribute('data-jenis');
            panggilPeriksaDokter(antrian, jenis);

            antrianSekarang(antrian, jenis);
          });
        });

        document.querySelectorAll('.panggil-kasir').forEach(function (button) {
          button.addEventListener('click', function () {
            var antrian = this.getAttribute('data-antrian');
            var jenis = this.getAttribute('data-jenis');
            panggilKasir(antrian, jenis);

            antrianSekarang(antrian, jenis);
          });
        });

        document.querySelectorAll('.panggil-obat').forEach(function (button) {
          button.addEventListener('click', function () {
            var antrian = this.getAttribute('data-antrian');
            var jenis = this.getAttribute('data-jenis');  
            panggilObat(antrian, jenis);

            antrianSekarang(antrian, jenis);
          });
        });

        function panggilPeriksa(antrian) {
          var bell = document.getElementById('tingtung');
          bell.pause();
          bell.currentTime = 0;
          bell.play();

          durasi_bell = bell.duration * 770;

          var hurufPertama = antrian.charAt(0);

          setTimeout(function () {
            responsiveVoice.speak("Nomor Antrian, " + hurufPertama, "Indonesian Female", {
              rate: 1,
              pitch: 1,
              volume: 1,
              onend: function() {
                var angka = antrian.substring(1); 
                responsiveVoice.speak(angka + ", menuju, ruang pemeriksaan", "Indonesian Female", {
                  rate: 1,
                  pitch: 1,
                  volume: 1
                });
              }
            });
          }, durasi_bell);
        }

        function panggilPeriksaDokter(antrian, jenis) {
          var bell = document.getElementById('tingtung');
          bell.pause();
          bell.currentTime = 0;
          bell.play();

          durasi_bell = bell.duration * 770;

          var hurufPertama = antrian.charAt(0);
          var angka = antrian.substring(1);

          setTimeout(function () {
            responsiveVoice.speak("Nomor Antrian, " + hurufPertama, "Indonesian Female", {
              rate: 1,
              pitch: 1,
              volume: 1,
              onend: function() {
                setTimeout(function() {
                  responsiveVoice.speak(angka + ", menuju, ruang pemeriksaan", "Indonesian Female", {
                    rate: 1,
                    pitch: 1,
                    volume: 1
                  });
                }, 500);
              }
            });
          }, durasi_bell);
        }


        function panggilKasir(antrian, jenis) {
          var bell = document.getElementById('tingtung');
          bell.pause();
          bell.currentTime = 0;
          bell.play();

          durasi_bell = bell.duration * 770;

          var hurufPertama = antrian.charAt(0);
          var angka = antrian.substring(1);

          setTimeout(function () {
            responsiveVoice.speak("Nomor Antrian, " + hurufPertama, "Indonesian Female", {
              rate: 1,
              pitch: 1,
              volume: 1,
              onend: function() {
                setTimeout(function() {
                  responsiveVoice.speak(angka + ", menuju, kasir", "Indonesian Female", {
                    rate: 1,
                    pitch: 1,
                    volume: 1
                  });
                }, 500);
              }
            });
          }, durasi_bell);
        }

        function panggilObat(antrian, jenis) {
          var bell = document.getElementById('tingtung');
          bell.pause();
          bell.currentTime = 0;
          bell.play();

          durasi_bell = bell.duration * 770;

          var hurufPertama = antrian.charAt(0);
          var angka = antrian.substring(1);

          setTimeout(function () {
            responsiveVoice.speak("Nomor Antrian, " + hurufPertama, "Indonesian Female", {
              rate: 1,
              pitch: 1,
              volume: 1,
              onend: function() {
                setTimeout(function() {
                  responsiveVoice.speak(angka + ", menuju, pengambilan obat", "Indonesian Female", {
                    rate: 1,
                    pitch: 1,
                    volume: 1
                  });
                }, 500);
              }
            });
          }, durasi_bell);
        }


      });

    </script>


  </body>
</html>