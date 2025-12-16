<?php
/*Modul ini digunakan untuk menghubungkan aplikasi dengan database MySQL
@package MyProject
*/

// Parameter koneksi
$host = "localhost"; // Nama host
$user = "root"; // Nama pengguna database
$password = ""; // Kata sandi database
$database = "db15"; // Nama database

/*Membuat koneksi ke database
 * @return mysqli Koneksi ke database
 * @throws Exception Jika koneksi gagal */

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error()); 
} // Menampilkan pesan error jika koneksi gagal
?>
