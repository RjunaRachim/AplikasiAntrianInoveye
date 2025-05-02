<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ambil Antrian</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="icon" href="../src/img/favicon.png">
    <style>
      html {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      }

      body {
        background-color: rgb(190, 190, 190)1;
        overflow: hidden;
      }

      @media print {
          body * {
              visibility: hidden;
          }

          #hiddenDiv, #hiddenDiv * {
              visibility: visible;
          }

          #hiddenDiv {
              position: absolute;
              left: 0;
              top: 0;
          }

          body {
                size: 75mm 297mm; 
                margin: 10px;
                color: black;
                background-color: white;
            }

            .print-header {
                text-align: center;
                font-size: 15px;
                margin-bottom: 20px;
                margin-top: 20px;

            }

            .print-header img {
                max-width: 100%;
                height: auto;
            }

            .print-content {
                text-align: center;
                font-size: 18px;
            }

            #nomorAntrianPrint {
                font-size: 100px;
            }

            .print-button {
                display: none;
            }
      }

    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg" style="background-color: #0f838c;">
        <div class="container-fluid">
          <a class="navbar-brand" href="cetak_manual.html">
            <img src="../src/img/inovnav.png" style="width: 200px;">
          </a>

          <div class="navbar-text">
            <span class="fs-4 text-white" id="tanggal"></span>
          </div>
        </div>
    </nav>

    <div class="container text-center" style="height: 100vh;">
      <div class="row align-items-center" style="height: 90vh;">
        <div class="col-8">
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active text-center">
              <img src="../src/img/dr. aryati" class="w-75 h-75" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../src/img/dr. bramantya" class="w-75" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../src/img/dokter Sony.jpg" class="w-75" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        </div>
        <div class="col-4">
          <div class="d-flex justify-content-center mb-4">
            <div class="w-100 p-3 rounded-2 shadow-sm" style="background-color: #1ecad7;">
            <div class="fs-3 fw-bold">
                SELAMAT DATANG DI
            </div>
            <div class="fs-3 fw-bold">
                KLINIK MATA
            </div>
            <img class="w-100" src="../src/img/inovnav.png" alt="">
            <hr class="w-100 ">
            <div class="fs-3 fw-bold">
                SILAHKAN AMBIL
              </div>
              <div class="fs-3 fw-bold">
                NOMOR ANTRIAN
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center mb-4">
            <div id="antrianContainer" class="w-100 rounded-2 shadow-sm" style="background-color: #1ecad7; display: flex; flex-direction: column;">
              <div class="d-flex justify-content-center">
                <button id="ambilAntrianA" class="w-75 rounded-2 border-0 shadow-sm mt-4 mb-4" style="background-color: #0f838c; height: 80px;" data-bs-toggle="modal" data-bs-target="#antrianModalA">
                  <div class="fs-4 p-2 fw-bold text-white">
                    UMUM
                  </div>
                </button>
              </div>
              <div class="d-flex justify-content-center">
                <!-- <button id="ambilAntrianB" class="w-75 rounded-2 border-0 shadow-sm mt-4 mb-4" style="background-color: #0f838c; height: 80px;" data-bs-toggle="modal" data-bs-target="#antrianModalB">
                  <div class="fs-4 p-2 fw-bold text-white">
                    BPJS
                  </div>
                </button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="antrianModalA" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="antrianModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h1 class="modal-title w-100" id="antrianModalLabel">ANTRIAN UMUM</h1>
          </div>
          <div class="modal-body text-center fs-2" id="nomorAntrianContainerA">
            <!-- Nomor Antrian akan ditambahkan di sini -->
          </div>
          <div class="modal-footer d-flex justify-content-between align-items-center">
              <button type="button" class="btn btn-primary btn-lg" id="cetakButtonA">Cetak</button>
              <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="antrianModalB" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="antrianModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h1 class="modal-title w-100" id="antrianModalLabel">ANTRIAN BPJS</h1>
          </div>
          <div class="modal-body text-center fs-2" id="nomorAntrianContainerB">
            <!-- Nomor Antrian akan ditambahkan di sini -->
          </div>
          <div class="modal-footer d-flex justify-content-between align-items-center">
              <button type="button" class="btn btn-primary btn-lg" id="cetakButtonB">Cetak</button>
              <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <div id="hiddenDiv" style="visibility: hidden;">
      <div class="print-container">
          <div class="print-header">
              <img src="../src/img/inovcetak.jpg" alt="" style="width: 500px;">
              <br> 
              Jl. Merdeka 72A Kota Blitar
              <hr>
          </div>
          <div class="print-content">
              Nomor Antrian Anda
          </div>
          <div class="print-content" style="font-size: 36px;">
              <span id="nomorAntrianPrint">0</span>
          </div>
          <div class="print-header">
              Silahkan Menunggu Nomer Anda Dipanggil
          </div>
      </div>
    </div>

    

    <footer class=" fixed-bottom text-center p-2">
      <div class="container">
        <div class="copyright text-center mb-2 mb-md-0">
          &copy; 2024 - Rjuna. All rights reserved.
        </div>
      </div>
    </footer>



    



    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
      document.getElementById('ambilAntrianA').addEventListener('click', function () {
      getDataFromServer('A', function (newData) {
          console.log("Antrian Baru A:", newData);
          var nomorAntrianAPrint = newData;

          document.getElementById('nomorAntrianPrint').innerText = nomorAntrianAPrint;

          // Tampilkan nomor antrian pada modal
          document.getElementById('nomorAntrianContainerA').innerHTML = "<p>ANTRIAN ANDA<br><h1  style='font-size: 100px'><b> " + nomorAntrianAPrint + "</b></h1></p>";

          // Buka modal
          $('#antrianModalA').modal('show');

          // Kirim data ke server
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'ambilantrian.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

          var data = 'antrian=' + encodeURIComponent(nomorAntrianAPrint);

          xhr.onreadystatechange = function () {
              if (xhr.readyState === 4 && xhr.status === 200) {
                  console.log(xhr.responseText);
              }
          };

          xhr.send(data);
      });
  });

  // Event listener untuk tombol cetak modal A
  document.getElementById('cetakButtonA').addEventListener('click', function() {
      window.print();
  });

  document.getElementById('ambilAntrianB').addEventListener('click', function () {
      getDataFromServer('B', function (newData) {
          console.log("Antrian Baru B:", newData);
          var nomorAntrianBPrint = newData;

          document.getElementById('nomorAntrianPrint').innerText = nomorAntrianBPrint;

          // Tampilkan nomor antrian pada modal
          document.getElementById('nomorAntrianContainerB').innerHTML = "<p>ANTRIAN ANDA<br><h1  style='font-size: 100px'><b> " + nomorAntrianBPrint + "</b></h1></p>";

          // Buka modal
          $('#antrianModalB').modal('show');

          // Kirim data ke server
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'ambilantrian.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

          var data = 'antrian=' + encodeURIComponent(nomorAntrianBPrint);

          xhr.onreadystatechange = function () {
              if (xhr.readyState === 4 && xhr.status === 200) {
                  console.log(xhr.responseText);
              }
          };

          xhr.send(data);
      });
  });

  // Event listener untuk tombol cetak modal B
  document.getElementById('cetakButtonB').addEventListener('click', function() {
      window.print();
  });

    </script>

    <script>
        function updateTanggal() {
        var sekarang = new Date();

        var options = { weekday: 'long', day: 'numeric', month: 'short', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: false };
        var formatter = new Intl.DateTimeFormat('id-ID', options);
        var tanggalString = formatter.format(sekarang);

        document.getElementById("tanggal").innerHTML = tanggalString;
        }

        
        // Update setiap detik
        setInterval(updateTanggal, 1000);
        
        updateTanggal();
    </script>

    <script>
      function incrementAntrian(antrian) {
          var parts = antrian.split(" ");
          var prefix = parts[0];
          var numberPart = parseInt(parts[1]);
          var newNumberPart = numberPart + 1;
          return prefix + " " + newNumberPart;
      }

      function getDataFromServer(prefiks, callback) {
          var xhr = new XMLHttpRequest();
          xhr.open("GET", "ambildataterakhir.php?prefix=" + prefiks, true);
          xhr.onreadystatechange = function () {
              if (xhr.readyState == 4) {
                  if (xhr.status == 200) {
                      try {
                          var data = JSON.parse(xhr.responseText);

                          if (data.length > 0) {
                              var lastAntrian = data[0];

                              var newData = data.map(function (antrian) {
                                  return incrementAntrian(antrian);
                              });

                              callback(newData);
                          } else {
                              console.log("Data antrian kosong.");
                          }
                      } catch (error) {
                          console.error("Gagal mengurai data JSON:", error);

                          // Jika parsing JSON gagal, kita tetap inisialisasi dengan antrian 1
                          var newData = [prefiks + " 1"];
                          callback(newData);

                          console.log("Menginisialisasi dengan antrian 1.");
                      }
                  } else {
                      console.error("Gagal mengambil data antrian.");
                  }
              }
          };
          xhr.send();
      }


      // document.getElementById('ambilAntrianA').addEventListener('click', function () {
      //     getDataFromServer('A', function (newData) {
      //         console.log("Antrian Baru A:", newData);
      //         var nomorAntrianAPrint = newData;

      //         document.getElementById('nomorAntrianPrint').innerText = nomorAntrianAPrint;

      //         var xhr = new XMLHttpRequest();
      //         xhr.open('POST', 'ambilantrian.php', true);
      //         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      //         var data = 'antrian=' + encodeURIComponent(nomorAntrianAPrint);

      //         xhr.onreadystatechange = function () {
      //           if (xhr.readyState === 4 && xhr.status === 200) {
      //             console.log(xhr.responseText);
      //           }
      //         };

      //         xhr.send(data);
      //         window.print();
      //     });
      // });

      // document.getElementById('ambilAntrianB').addEventListener('click', function () {
      //     getDataFromServer('B', function (newData) {
      //         console.log("Antrian Baru B:", newData);
      //         var nomorAntrianAPrint = newData;

      //         document.getElementById('nomorAntrianPrint').innerText = nomorAntrianAPrint;

      //         var xhr = new XMLHttpRequest();
      //         xhr.open('POST', 'ambilantrian.php', true);
      //         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      //         var data = 'antrian=' + encodeURIComponent(nomorAntrianAPrint);

      //         xhr.onreadystatechange = function () {
      //           if (xhr.readyState === 4 && xhr.status === 200) {
      //             console.log(xhr.responseText);
      //           }
      //         };

      //         xhr.send(data);
      //         window.print();
      //     });
      // });

    </script>
  </body>
</html>