# Project PKL Sistem Antrian Berbasis Web pada Klinik Mata INOVEYE


## Deskripsi
Sistem Antrian Berbasis Web pada Klinik Mata INOVEYE merupakan aplikasi yang dirancang untuk mengelola antrian pasien secara digital guna meningkatkan efisiensi pelayanan klinik. Aplikasi ini menggantikan sistem manual yang sebelumnya menggunakan buku catatan dan pemanggilan menggunakan mikrofon, sehingga lebih praktis dan sesuai dengan standar akreditasi klinik.


Fitur Utama:
1. Dashboard : Menu menuju sistem pemanggilan nomer antrian
2. Antrian : Menu menuju tampilan yang digunakan pada PC Mesin antrian
3. Display : Menu menuju tampilan yang digunakan pada PC Ruang Antrian
4. Pengaturan : Menu menuju semua pengaturan system antrian
5. Running Text : Untuk mengakses menu ini masuk kedalam pengaturan. Runing text akan tampil pada tampilan display di ruang antrian

## Persyaratan
- [XAMPP 8.2.4 / PHP 8.2.4] (https://www.apachefriends.org/index.html) atau server web lokal serupa.
- [Visual Studio Code] (https://code.visualstudio.com/) atau aplikasi code editor serupa dan digunakan hanya bila anda ingin memodifikasi isi dari website.
- [Google Chrome] (https://www.google.com/intl/id_id/chrome/) atau browser serupa.
- [WinRAR] (https://www.win-rar.com/download.html?&L=0) 


## Panduan Instalasi

1. Pastikan aplikasi XAMPP, WinRAR dan Google Chrome telah diinstall.
2. Extract file INOVEYEAntrian.zip . Pindahkan folder 'antrian' ke dalam directori htdocs (umumnya  terdapat pada C:/xampp/htdocs).
3. Buka aplikasi XAMPP Control Panel dan running Apache dan MySQL.
4. Import database ke dalam MySQL dengan langkah berikut:
	- Buka http://localhost/phpmyadmin/ di browser.
	- Buat database baru dengan nama antrian_db.
	- Import file antrian_db.sql yang terdapat dalam folder proyek ke dalam database tersebut.
5. Akses sistem dengan membuka browser dan masuk ke http://localhost/antrian/. Jika program ingin diakses dari PC lain, pastikan PC server dan PC client berada pada satu jaringan yang sama, lalu masukkan alamat IP server diikuti dengan /antrian. Contoh: http://192.168.110.3/antrian.

## Hosting 

Saat ini, sistem masih berjalan dalam jaringan lokal klinik dan belum dihosting secara publik.

## Kontak

Jika anda mempunyai kritik atau saran silahkan sampaikan ke ayuna.rachim@gmail.com

		== TERIMA KASIH ==
