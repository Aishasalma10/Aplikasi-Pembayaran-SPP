<?php

  include('koneksi.php'); // Menghubungkan ke database
  
?>

<!DOCTYPE html>
<html>
  <head>
    <title>DATA SPP</title> 
  </head>
<body>

  <?php
  include ('tampilan/header.php'); // Menginclude file header
  include ('tampilan/sidebar.php'); // Menginclude file sidebar
  include ('tampilan/footer.php'); // Menginclude file footer
?>

<?php
// Cek apakah pengguna sudah login
if ($_SESSION['level']==""){
  header("location: index.php?presan=belummasuk"); // Jika belum, arahkan ke halaman login
}

?>

<?php
if ($_SESSION['level']=="petugas"){ // Jika pengguna adalah petugas
  ?>
      
   <!-- Main Content -->
      <div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>DATA SPP</h1> <!-- Judul halaman -->
          </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>LIST SPP</h4>
                    <div class="card-header-form">
                      <form>
                          <div class="input-group-btn">
                            <a href="tambah_spp.php" class="btn btn-primary"><i class="fas fa-plus"></i></a> <!-- Tombol tambah data SPP -->
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                       <thead>
                          <tr>
                          <th>NO</th>
                          <th>KELAS</th>
                          <th>NOMINAL</th>
                          <th>ACTION</th>
                        </tr>
                        </thead>
                         <tbody>
                           <?php
                              // Jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "SELECT * FROM spp ORDER BY kelas ASC";
                              $result = mysqli_query($koneksi, $query);

                             
                              // Mengecek apakah ada error ketika menjalankan query
                              if(!$result){
                                die ("Query Error: ".mysqli_error($koneksi).
                                   " - ".mysqli_error($koneksi));
                              }

                              // Buat perulangan untuk elemen tabel dari data SPP
                              $no = 1; // Variabel untuk membuat nomor urut
                              // Hasil query akan disimpan dalam variabel $data dalam bentuk array
                              // Kemudian dicetak dengan perulangan while
                              while($row = mysqli_fetch_assoc($result))
                              {
                              ?>
                        <tr>  
                          <td><?php echo $no; ?></td> <!-- Cetak nomor urut -->
                          <td><?php echo $row['kelas']; ?></td> <!-- Cetak kelas -->
                          <td><?php echo substr($row['jumlah_bayar'], 0, 20); ?></td> <!-- Cetak nominal SPP -->
                          <td>
                          <a href="edit_spp.php?id=<?php echo $row['id_spp']; ?>"class="btn btn-primary"><i class="fas fa-edit"></i></a> <!-- Tombol edit data SPP -->
                          <a href="proses_hapusspp.php?id=<?php echo $row['id_spp']; ?>" class="btn btn-danger" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a> <!-- Tombol hapus data SPP -->
                          </td>
                        </tr>
                         <?php
                           $no++; // Untuk nomor urut terus bertambah 1
                           }
                         ?>
                         </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
    </div>
  </div>
        <div class="col-lg-10 col-lg-6 offset-lg-2 text-center">
          Copyright &copy; 2023 - SMA MUHAMMADIYAH 15 JAKARTA. <!-- Hak cipta -->
        </div>

<?php
}

  elseif ($_SESSION ['level']=="siswa") { // Jika pengguna adalah siswa
  ?>
  <!-- Main Content -->
  <div class="main-content bg-primary">
          <section class="section">
            <div class="section-header">
              <h1>DATA SPP</h1> <!-- Judul halaman -->
            </div>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>LIST SPP</h4>
                      <div class="card-header-form">
                        
                      </div>
                    </div>
                    <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                       <thead>
                          <tr>
                          <th>NO</th>
                          <th>KELAS</th>
                          <th>NOMINAL</th>
                          
                        </tr>
                        </thead>
                         <tbody>
                           <?php
                              // Jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "SELECT * FROM spp ORDER BY kelas ASC";
                              $result = mysqli_query($koneksi, $query);

                             
                              // Mengecek apakah ada error ketika menjalankan query
                              if(!$result){
                                die ("Query Error: ".mysqli_error($koneksi).
                                   " - ".mysqli_error($koneksi));
                              }

                              // Buat perulangan untuk elemen tabel dari data SPP
                              $no = 1; // Variabel untuk membuat nomor urut
                              // Hasil query akan disimpan dalam variabel $data dalam bentuk array
                              // Kemudian dicetak dengan perulangan while
                              while($row = mysqli_fetch_assoc($result))
                              {
                              ?>
                        <tr>  
                          <td><?php echo $no; ?></td> <!-- Cetak nomor urut -->
                          <td><?php echo $row['kelas']; ?></td> <!-- Cetak kelas -->
                          <td><?php echo substr($row['jumlah_bayar'], 0, 20); ?></td> <!-- Cetak nominal SPP -->
                          
                        </tr>
                         <?php
                           $no++; // Untuk nomor urut terus bertambah 1
                           }
                         ?>
                         </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
          </section>
        </div>
      </div>
    </div>
    <div class="col-lg-10 col-lg-6 offset-lg-2 text-center">
      Copyright &copy; 2023 - SMA MUHAMMADIYAH 15 JAKARTA. <!-- Hak cipta -->
    </div>
</div>
  <?php
  }
    else {
      header("location:index.php?pesan=gagal"); // Jika level pengguna tidak dikenali, arahkan ke halaman login
    }

  
?>
