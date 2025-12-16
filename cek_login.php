<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

// menyeleksi data petugas dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' AND password='$password' AND level='$level'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password ditemukan pada database
if($cek > 0){
    $data = mysqli_fetch_assoc($login);
    
    // buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['level'] = $level;
    
    // alihkan ke halaman dashboard sesuai level
    if($data['level'] == "petugas"){
        header("location:dashboard.php");
    } else if($data['level'] == "siswa"){
        header("location:dashboard.php");
    }
} else {
    header("location:index.php?pesan=gagal");
}
?>
