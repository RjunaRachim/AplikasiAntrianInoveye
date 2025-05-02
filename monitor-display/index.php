<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Monitor Display</title>
        <link rel="icon" href="../src/img/favicon.png">
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        <style>
            body {
                overflow: hidden;
                background-image: url(../src/img/bf.jpg);
            }

            .blinking {
                animation: blinker 1s linear infinite;
            }

            @keyframes blinker {
                50% {
                    opacity: 0;
                }
            }

            .marquee {
                overflow: hidden; 
                white-space: pre;
            }

            .marquee span {
                display: inline-block;
                animation: marquee linear infinite;
                font-size: 60px;
            }


            @keyframes marquee {
                from { transform: translateX(80%); }
                to { transform: translateX(-80%); }
            }
        </style>
    </head>
    <body>
        <?php 
        $antrian = '--';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data antrian dari POST request
        $antrian = isset($_POST['antrian']) ? $_POST['antrian'] : '---';

        echo $antrian;

        }
        ?>

        <nav class="navbar navbar-expand-lg" style="background-color: #0f838c; height: 105px;">
            <div class="container-fluid">
            <a class="navbar-brand" href="">
                <img src="../src/img/inovnav.png" style="width: 250px;">
            </a>

            <div class="marquee d-flex justify-content-center align-items-center" id="marqueeContainer" style="width: 1000px; height: 80px;">
                <span id="marqueeText" class="text-white fw-bold"></span>
            </div>

            <div class="navbar-text">
                <div id="tanggal" class="fs-4 text-white"></div>
                <div id="jam" class="fw-bold text-white" style="text-align: center; font-size: 50px; padding-top: 0;"></div>
            </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-4 h-100">
                <div class="d-flex align-item-center justify-content-center">
                    <div class="w-100 p-3 mt-4 mb-2 mx-4 rounded-2 shadow-sm" style="background-color: #0f838c;">
                    <div class="fs-2 fw-bold text-center text-white">
                        ANTRIAN SEKARANG
                    </div>
                    </div>
                </div>
                <!-- NOMOR ANTRIAN SEKARANG -->
                <div class="d-flex align-item-center justify-content-center">
                    <div class="w-100 p-3 my-2 mx-4 rounded-2 shadow-sm" id="antrianSekarangDiv" style="background-color: #0f838c;">
                        <div class="fw-bold text-center text-white" style="font-size: 150px;" id="antrianSekarang">
                            --
                        </div>
                    </div>
                </div>
                <!-- RUANG PANGGILAN ANTRIAN -->
                <div class="d-flex align-item-center justify-content-center">
                    <div class="w-100 p-3 mt-2 mb-4 mx-4 rounded-2 shadow-sm" id="jenisAntrianDiv" style="background-color: #0f838c;">
                        <div class="fw-bold text-center text-white" id="jenisAntrian" style="font-size: 60px;">
                        --
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 align-item-center justify-content-center">
                <iframe id="youtubePlaylist" class="m-4 rounded-2" width="90%" height="90%" src="https://www.youtube.com/embed/videoseries?si=mDzrYS4URb7-EZh6&amp;list=PLbsnVVSFJ9YlXkgkX2brleXHuO26Hd71W&mute=1&autoplay=1&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="d-flex align-item-center justify-content-center">
                    <div class="w-100 p-4 mx-1 mb-2 mt-3 rounded-2 shadow-sm" style="background-color: #0f838c;">
                    <div class="fs-4 fw-bold text-center text-white">
                        PEMERIKSAAN PERAWAT
                    </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex align-item-center justify-content-center">
                    <div class="w-100 p-4 mx-1 mt-3 rounded-2 shadow-sm" style="background-color: #0f838c;">
                    <div class="fs-4 fw-bold text-center text-white">
                        PEMERIKSAAN DOKTER
                    </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex align-item-center justify-content-center">
                    <div class="w-100 p-4 mx-2 mt-3 rounded-2 shadow-sm" style="background-color: #0f838c;">
                    <div class="fs-4 fw-bold text-center text-white">
                        KASIR
                    </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex align-item-center justify-content-center">
                    <div class="w-100 p-4 mx-2 mt-3 rounded-2 shadow-sm" style="background-color: #0f838c;">
                    <div class="fs-4 fw-bold text-center text-white">
                        PENGAMBILAN OBAT
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="d-flex align-item-center justify-content-center">
                <!-- NOMOR ANTRIAN PERAWAT A -->
                    <div class="w-100 p-3 mx-1 rounded-2 shadow-sm" id="pemeriksaanPerawatADiv" style="background-color: #0f838c;">
                        <div class="fw-bold text-center text-white" style="font-size: 50px;" id="pemeriksaanPerawatA">
                            --
                        </div>
                    </div>
                    <!-- NOMOR ANTRIAN PERTAWAT B -->
                    <div class="w-100 p-3 mx-1 rounded-2 shadow-sm" id="pemeriksaanPerawatBDiv" style="background-color: #0f838c;">
                        <div class="fw-bold text-center text-white" style="font-size: 50px;" id="pemeriksaanPerawatB">
                            --
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex align-item-center justify-content-center">
                <!-- NOMOR ANTRIAN DOKTER A -->
                <div class="w-100 p-3 mx-1 rounded-2 shadow-sm" id="pemeriksaanDokterADiv" style="background-color: #0f838c;">
                    <div class="fw-bold text-center text-white" style="font-size: 50px;" id="pemeriksaanDokterA">
                        --
                    </div>
                </div>
                <!-- NOMER ANTRIAN DOKTER B -->
                <div class="w-100 p-3 mx-1 rounded-2 shadow-sm" id="pemeriksaanDokterBDiv" style="background-color: #0f838c;">
                    <div class="fw-bold text-center text-white" style="font-size: 50px;" id="pemeriksaanDokterB">
                        --
                    </div>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex align-item-center justify-content-center">
                <!-- NOMER ANTRAIN KASIR A -->
                <div class="w-100 p-3 mx-1 rounded-2 shadow-sm" id="kasirADiv" style="background-color: #0f838c;">
                    <div class="fw-bold text-center text-white" style="font-size: 50px;" id="kasirA">
                        --
                    </div>
                </div>
                <!-- NOMOR ANTIAN KASIR B -->
                <div class="w-100 p-3 mx-1 rounded-2 shadow-sm" id="kasirBDiv" style="background-color: #0f838c;">
                    <div class="fw-bold text-center text-white" style="font-size: 50px;" id="kasirB">
                        --
                    </div>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex align-item-center justify-content-center">
                <!-- NOMOR ANTRIAN OBAT A -->
                <div class="w-100 p-3 mx-1 rounded-2 shadow-sm" id="obatADiv" style="background-color: #0f838c;">
                    <div class="fw-bold text-center text-white" style="font-size: 50px;" id="obatA">
                        --
                    </div>
                </div>
                <!-- NOMOR ANTRIAN OBAT B -->
                <div class="w-100 p-3 mx-1 rounded-2 shadow-sm" id="obatBDiv" style="background-color: #0f838c;">
                    <div class="fw-bold text-center text-white" style="font-size: 50px;" id="obatB">
                        --
                    </div>
                </div>
                </div>
            </div>
        </div>


        <script src="../bootstrap/js/bootstrap.bundle.js"></script>
        <script src="https://www.youtube.com/iframe_api"></script>

        <script>
        function updateTanggal() {
            var sekarang = new Date();

            var options = { weekday: 'long', day: 'numeric', month: 'short', year: 'numeric' };
            var formatter = new Intl.DateTimeFormat('id-ID', options);
            var tanggalString = formatter.format(sekarang);

            document.getElementById("tanggal").innerHTML = tanggalString;

            var jamString = sekarang.getHours().toString().padStart(2, '0') + " <span class='blinking'>:</span> " + sekarang.getMinutes().toString().padStart(2, '0');
            document.getElementById("jam").innerHTML = jamString;
        }

        setInterval(updateTanggal, 1000);

        updateTanggal();
        </script>

        <script>
        function ambilRunningText() {
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var marqueeText = this.responseText;


                    document.getElementById("marqueeText").innerHTML = marqueeText;


                    // Set ulang durasi animasi berdasarkan panjang teks yang baru
                    var marqueeContainer = document.getElementById("marqueeContainer");
                    var marqueeTextElement = document.getElementById("marqueeText");
                    var textWidth = marqueeTextElement.offsetWidth;
                    var containerWidth = marqueeContainer.offsetWidth;
                    var animationDuration = textWidth / containerWidth * 15;
                    marqueeTextElement.style.animationDuration = animationDuration + "s";
                }
            };

            xhr.open("GET", "get_running_text.php", true);
            xhr.send();
        }

        window.onload = function() {
            ambilRunningText(); 

            setInterval(ambilRunningText, 5 * 60 * 1000); 
        };
        </script>


        <script>
        //TAMPILAN ANTRIAN SEKARANG
        function ambilAntrianSekarang() {
            var xhr = new XMLHttpRequest();

            xhr.open('GET', 'antrian_sekarang.php', true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var responseData = xhr.responseText.trim();

                        if (responseData === "Tidak ada data") {
                            document.getElementById('antrianSekarang').innerText = "--";
                            document.getElementById('jenisAntrian').innerText = "--";
                        } else {
                            var hasil = JSON.parse(responseData);
                            var antrianSekarangDiv = document.getElementById('antrianSekarangDiv');
                            var antrianSekarang = document.getElementById('antrianSekarang');
                            var jenisAntrianDiv = document.getElementById('jenisAntrianDiv');
                            var jenisAntrian = document.getElementById('jenisAntrian');
                            var previousBackgroundColorAntrian = antrianSekarangDiv.style.backgroundColor;
                            var previousBackgroundColorJenis = jenisAntrianDiv.style.backgroundColor;

                            if (hasil.antrian) {
                                if (antrianSekarang.innerText !== hasil.antrian) {
                                    var previousBackgroundColorAntrian = antrianSekarangDiv.style.backgroundColor;

                                    antrianSekarang.innerText = hasil.antrian;

                                    var countAntrian = 0;
                                    var blinkIntervalAntrian = setInterval(function () {
                                        if (countAntrian % 2 === 0) {
                                            antrianSekarangDiv.style.backgroundColor = previousBackgroundColorAntrian;
                                        } else {
                                            antrianSekarangDiv.style.backgroundColor = '#8c0f5a'; 
                                        }

                                        countAntrian++;

                                        if (countAntrian === 8) {
                                            clearInterval(blinkIntervalAntrian);
                                            antrianSekarangDiv.style.backgroundColor = previousBackgroundColorAntrian;
                                        }
                                    }, 800);
                                }

                                if (hasil.jenis) {
                                    var jenisAntrianText = "";
                                    if (hasil.jenis === "P. PERAWAT" || hasil.jenis === "P. DOKTER") {
                                        jenisAntrianText = "PEMERIKSAAN";
                                    } else {
                                        jenisAntrianText = hasil.jenis;
                                    }

                                    if (jenisAntrian.innerText !== jenisAntrianText) {
                                        var previousBackgroundColorJenis = jenisAntrianDiv.style.backgroundColor;

                                        jenisAntrian.innerText = jenisAntrianText;

                                        var countJenis = 0;
                                        var blinkIntervalJenis = setInterval(function () {
                                            if (countJenis % 2 === 0) {
                                                jenisAntrianDiv.style.backgroundColor = previousBackgroundColorJenis;
                                            } else {
                                                jenisAntrianDiv.style.backgroundColor = '#8c0f5a';
                                            }

                                            countJenis++;

                                            if (countJenis === 8) {
                                                clearInterval(blinkIntervalJenis);
                                                jenisAntrianDiv.style.backgroundColor = previousBackgroundColorJenis;
                                            }
                                        }, 800);
                                    }
                                }
                            }
                        }
                    } else {
                        console.error('Gagal mengambil data dari server');
                    }
                }
            };

            xhr.send();
        }


        function ambilAntrianPerawat() {
            var xhr = new XMLHttpRequest();

            xhr.open('GET', 'antrian_perawat.php', true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var responseData = xhr.responseText.trim();

                        if (responseData === "Tidak ada data") {
                            document.getElementById('pemeriksaanPerawatA').innerText = "--";
                            document.getElementById('pemeriksaanPerawatB').innerText = "--";
                        } else {
                            var hasil = JSON.parse(xhr.responseText);

                            if (Array.isArray(hasil) && hasil.length > 0) {
                                hasil.forEach(function (antrianValue) {
                                    if (antrianValue.startsWith('A') || antrianValue.startsWith('a')) {
                                        var pemeriksaanPerawatADiv = document.getElementById('pemeriksaanPerawatADiv');
                                        var previousBackgroundColorA = pemeriksaanPerawatADiv.style.backgroundColor;

                                        if (document.getElementById('pemeriksaanPerawatA').innerText !== antrianValue) {
                                            document.getElementById('pemeriksaanPerawatA').innerText = antrianValue;

                                            var countA = 0;
                                            var blinkIntervalA = setInterval(function () {
                                                if (countA % 2 === 0) {
                                                    pemeriksaanPerawatADiv.style.backgroundColor = previousBackgroundColorA;
                                                } else {
                                                    pemeriksaanPerawatADiv.style.backgroundColor = '#8c0f5a';
                                                }

                                                countA++;

                                                if (countA === 8) {
                                                    clearInterval(blinkIntervalA);
                                                    pemeriksaanPerawatADiv.style.backgroundColor = previousBackgroundColorA;
                                                }
                                            }, 800); 
                                        }
                                    }
                                    
                                    if (antrianValue.startsWith('B') || antrianValue.startsWith('b')) {
                                        var pemeriksaanPerawatBDiv = document.getElementById('pemeriksaanPerawatBDiv');
                                        var previousBackgroundColorB = pemeriksaanPerawatBDiv.style.backgroundColor;

                                        if (document.getElementById('pemeriksaanPerawatB').innerText !== antrianValue) {
                                            document.getElementById('pemeriksaanPerawatB').innerText = antrianValue;

                                            var countB = 0;
                                            var blinkIntervalB = setInterval(function () {
                                                if (countB % 2 === 0) {
                                                    pemeriksaanPerawatBDiv.style.backgroundColor = previousBackgroundColorB;
                                                } else {
                                                    pemeriksaanPerawatBDiv.style.backgroundColor = '#8c0f5a'; 
                                                }

                                                countB++;

                                                if (countB === 8) {
                                                    clearInterval(blinkIntervalB);
                                                    pemeriksaanPerawatBDiv.style.backgroundColor = previousBackgroundColorB;
                                                }
                                            }, 800); 
                                        }
                                    }
                                });
                            } else {
                                console.error('Data tidak valid atau tidak ada');
                            }
                        }
                    } else {
                        console.error('Gagal mengambil data dari server');
                    }
                }
            };

            xhr.send();
        }


        function ambilAntrianDokter() {
            var xhr = new XMLHttpRequest();

            // Mengonfigurasi permintaan GET ke server
            xhr.open('GET', 'antrian_dokter.php', true);

            // Menangani perubahan status permintaan
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var responseData = xhr.responseText.trim();

                        if (responseData === "Tidak ada data") {
                            // Jika respons adalah "Tidak ada data", ubah tampilan menjadi --
                            document.getElementById('pemeriksaanDokterA').innerText = "--";
                            document.getElementById('pemeriksaanDokterB').innerText = "--";
                        } else {
                            // Jika respons adalah JSON yang valid
                            var hasil = JSON.parse(xhr.responseText);

                            if (Array.isArray(hasil) && hasil.length > 0) {
                                hasil.forEach(function (antrianValue) {
                                    if (antrianValue.startsWith('A') || antrianValue.startsWith('a')) {
                                        var pemeriksaanDokterADiv = document.getElementById('pemeriksaanDokterADiv');
                                        var previousBackgroundColorA = pemeriksaanDokterADiv.style.backgroundColor;

                                        if (document.getElementById('pemeriksaanDokterA').innerText !== antrianValue) {
                                            document.getElementById('pemeriksaanDokterA').innerText = antrianValue;

                                            var countA = 0;
                                            var blinkIntervalA = setInterval(function () {
                                                if (countA % 2 === 0) {
                                                    pemeriksaanDokterADiv.style.backgroundColor = previousBackgroundColorA;
                                                } else {
                                                    pemeriksaanDokterADiv.style.backgroundColor = '#8c0f5a';
                                                }

                                                countA++;

                                                if (countA === 8) {
                                                    clearInterval(blinkIntervalA);
                                                    pemeriksaanDokterADiv.style.backgroundColor = previousBackgroundColorA;
                                                }
                                            }, 800); 
                                        }
                                    }

                                    if (antrianValue.startsWith('B') || antrianValue.startsWith('b')) {
                                        var pemeriksaanDokterBDiv = document.getElementById('pemeriksaanDokterBDiv');
                                        var previousBackgroundColorB = pemeriksaanDokterBDiv.style.backgroundColor;

                                        if (document.getElementById('pemeriksaanDokterB').innerText !== antrianValue) {
                                            document.getElementById('pemeriksaanDokterB').innerText = antrianValue;

                                            var countB = 0;
                                            var blinkIntervalB = setInterval(function () {
                                                if (countB % 2 === 0) {
                                                    pemeriksaanDokterBDiv.style.backgroundColor = previousBackgroundColorB;
                                                } else {
                                                    pemeriksaanDokterBDiv.style.backgroundColor = '#8c0f5a'; 
                                                }

                                                countB++;

                                                if (countB === 8) {
                                                    clearInterval(blinkIntervalB);
                                                    pemeriksaanDokterBDiv.style.backgroundColor = previousBackgroundColorB;
                                                }
                                            }, 800); 
                                        }
                                    }
                                });
                            } else {
                                console.error('Data tidak valid atau tidak ada');
                            }
                        }
                    } else {
                        console.error('Gagal mengambil data dari server');
                    }
                }
            };

            // Mengirim permintaan ke server
            xhr.send();
        }


        function ambilAntrianKasir() {
            var xhr = new XMLHttpRequest();

            // Mengonfigurasi permintaan GET ke server
            xhr.open('GET', 'antrian_kasir.php', true);

            // Menangani perubahan status permintaan
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var responseData = xhr.responseText.trim();

                        if (responseData === "Tidak ada data") {
                            // Jika respons adalah "Tidak ada data", ubah tampilan menjadi --
                            document.getElementById('kasirA').innerText = "--";
                            document.getElementById('kasirB').innerText = "--";
                        } else {
                            // Jika respons adalah JSON yang valid
                            var hasil = JSON.parse(xhr.responseText);

                            if (Array.isArray(hasil) && hasil.length > 0) {
                                hasil.forEach(function (antrianValue) {
                                    if (antrianValue.startsWith('A') || antrianValue.startsWith('a')) {
                                        var kasirADiv = document.getElementById('kasirADiv');
                                        var previousBackgroundColorA = kasirADiv.style.backgroundColor;

                                        if (document.getElementById('kasirA').innerText !== antrianValue) {
                                            document.getElementById('kasirA').innerText = antrianValue;

                                            var countA = 0;
                                            var blinkIntervalA = setInterval(function () {
                                                if (countA % 2 === 0) {
                                                    kasirADiv.style.backgroundColor = previousBackgroundColorA;
                                                } else {
                                                    kasirADiv.style.backgroundColor = '#8c0f5a'; 
                                                }

                                                countA++;

                                                if (countA === 8) {
                                                    clearInterval(blinkIntervalA);
                                                    kasirADiv.style.backgroundColor = previousBackgroundColorA;
                                                }
                                            }, 800); 
                                        }
                                    }

                                    if (antrianValue.startsWith('B') || antrianValue.startsWith('b')) {
                                        var kasirBDiv = document.getElementById('kasirBDiv');
                                        var previousBackgroundColorB = kasirBDiv.style.backgroundColor;

                                        if (document.getElementById('kasirB').innerText !== antrianValue) {
                                            document.getElementById('kasirB').innerText = antrianValue;

                                            var countB = 0;
                                            var blinkIntervalB = setInterval(function () {
                                                if (countB % 2 === 0) {
                                                    kasirBDiv.style.backgroundColor = previousBackgroundColorB;
                                                } else {
                                                    kasirBDiv.style.backgroundColor = '#8c0f5a'; 
                                                }

                                                countB++;

                                                if (countB === 8) {
                                                    clearInterval(blinkIntervalB);
                                                    kasirBDiv.style.backgroundColor = previousBackgroundColorB;
                                                }
                                            }, 800); 
                                        }
                                    }
                                });
                            } else {
                                console.error('Data tidak valid atau tidak ada');
                            }
                        }
                    } else {
                        console.error('Gagal mengambil data dari server');
                    }
                }
            };

            // Mengirim permintaan ke server
            xhr.send();
        }

        function ambilAntrianObat() {
            var xhr = new XMLHttpRequest();

            // Mengonfigurasi permintaan GET ke server
            xhr.open('GET', 'antrian_obat.php', true);

            // Menangani perubahan status permintaan
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var responseData = xhr.responseText.trim();

                        if (responseData === "Tidak ada data") {
                            document.getElementById('obatA').innerText = "--";
                            document.getElementById('obatB').innerText = "--";
                        } else {
                            // Jika respons adalah JSON yang valid
                            var hasil = JSON.parse(xhr.responseText);

                            if (Array.isArray(hasil) && hasil.length > 0) {
                                hasil.forEach(function (antrianValue) {
                                    if (antrianValue.startsWith('A') || antrianValue.startsWith('a')) {
                                        var obatADiv = document.getElementById('obatADiv');
                                        var previousBackgroundColorA = obatADiv.style.backgroundColor;

                                        if (document.getElementById('obatA').innerText !== antrianValue) {
                                            document.getElementById('obatA').innerText = antrianValue;

                                            var countA = 0;
                                            var blinkIntervalA = setInterval(function () {
                                                if (countA % 2 === 0) {
                                                    obatADiv.style.backgroundColor = previousBackgroundColorA;
                                                } else {
                                                    obatADiv.style.backgroundColor = '#8c0f5a'; 
                                                }

                                                countA++;

                                                if (countA === 8) {
                                                    clearInterval(blinkIntervalA);
                                                    obatADiv.style.backgroundColor = previousBackgroundColorA;
                                                }
                                            }, 800); 
                                        }
                                    }

                                    if (antrianValue.startsWith('B') || antrianValue.startsWith('b')) {
                                        var obatBDiv = document.getElementById('obatBDiv');
                                        var previousBackgroundColorB = obatBDiv.style.backgroundColor;

                                        if (document.getElementById('obatB').innerText !== antrianValue) {
                                            document.getElementById('obatB').innerText = antrianValue;

                                            var countB = 0;
                                            var blinkIntervalB = setInterval(function () {
                                                if (countB % 2 === 0) {
                                                    obatBDiv.style.backgroundColor = previousBackgroundColorB;
                                                } else {
                                                    obatBDiv.style.backgroundColor = '#8c0f5a'; 
                                                }

                                                countB++;

                                                if (countB === 8) {
                                                    clearInterval(blinkIntervalB);
                                                    obatBDiv.style.backgroundColor = previousBackgroundColorB;
                                                }
                                            }, 800);
                                        }
                                    }
                                });
                            } else {
                                console.error('Data tidak valid atau tidak ada');
                            }
                        }
                    } else {
                        console.error('Gagal mengambil data dari server');
                    }
                }
            };

            // Mengirim permintaan ke server
            xhr.send();
        }

        // Array berisi fungsi-fungsi pengambilan antrian
        var ambilAntrianFunctions = [ambilAntrianSekarang, ambilAntrianPerawat, ambilAntrianDokter, ambilAntrianKasir, ambilAntrianObat];

        // Memanggil semua fungsi pengambilan antrian
        ambilAntrianFunctions.forEach(function (ambilAntrianFunction) {
            ambilAntrianFunction();
        });

        // Menetapkan interval untuk semua fungsi pengambilan antrian
        setInterval(function () {
            ambilAntrianFunctions.forEach(function (ambilAntrianFunction) {
                ambilAntrianFunction();
            });
        }, 1000);
    </script>

    </body>
</html>