<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

  // membuat variabel untuk menampung data dari form
  $id           = $_POST['id'];
  $nisn         = $_POST['nisn'];
  $nis          = $_POST['nis'];
  $nama         = $_POST['nama'];
  $nama_kelas   = $_POST['nama_kelas'];
  $alamat       = $_POST['alamat'];
  $no_telp      = $_POST['no_telp'];

  //cek dulu jika merubah gambar produk jalankan coding ini
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                    $query  = "UPDATE siswa SET nisn = '$nisn' WHERE id_siswa = '$id'";
                    $result = mysqli_query($koneksi, $query);

                    $query  = "UPDATE siswa SET nis = '$nis' WHERE id_siswa = '$id'";
                    $result = mysqli_query($koneksi, $query);

                    $query  = "UPDATE siswa SET nama = '$nama' WHERE id_siswa = '$id'";
                    $result = mysqli_query($koneksi, $query);

                    $query  = "UPDATE siswa SET nama_kelas= '$nama_kelas' WHERE id_siswa = '$id'";
                    $result = mysqli_query($koneksi, $query);

                    $query  = "UPDATE siswa SET alamat = '$alamat' WHERE id_siswa = '$id'";
                    $result = mysqli_query($koneksi, $query);

                    $query  = "UPDATE siswa SET no_telp = '$no_telp' WHERE id_siswa = '$id'";
                    $result = mysqli_query($koneksi, $query);

                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='siswa.php';</script>";
                    }       
        ?>
