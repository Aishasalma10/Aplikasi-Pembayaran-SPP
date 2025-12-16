<?php
    include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>
<head>
    <title>TRANSAKSI</title>

</head>
<body>

    <?php

    include ('tampilan/header.php');
    include ('tampilan/footer.php');
    include ('tampilan/sidebar.php');
?>

    <!-- main content -->
    <div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>HISTORY</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="history.php">History</a></div>
            </div>
          </div>
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3>History Pembayaran</h3>
                    <div class="card-header-form">
                    </div>
                  </div>
                    <form action="" method="get">
                    <div class="col-md-12">
                        <table class="table">
                          <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td>
                            <input class="form-control" type="text" name="nisn" placeholder="--Data NISN Lihat Di Form Siswa--">
                            </td>
                            <td>
                            <button class="btn btn-success" type="submit" name="cari">Cari</button>
                            </td>
                          </tr>
                        </table>
                    </form>
                <?php 
                if (isset($_GET['nisn']) && $_GET['nisn']!='') {
                  $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$_GET[nisn]'");
                
                ?>

                <h3>DATA SISWA</h3>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">NISN</th>
                      <th scope="col">NAMA SISWA</th>
                      <th scope="col">KELAS</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($data=mysqli_fetch_array($query)) {
                  echo"
                    <tr>
                      <td>$data[nisn]</td>
                      <td>$data[nama]</td>
                      <td>$data[nama_kelas]</td>
                    </tr>";
                    }
                  ?>
                  </tbody>
                </table>

                <h3>DATA SPP SISWA</h3>
                <table class="table table-striped table-responsive">
                    <thead> 
                      <tr>
                        <!-- <th scope="col">Id Pembayaran</th> -->
                        <th scope="col">NISN</th>
                        <th scope="col">NIS</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">BULAN</th>
                        <th scope="col">TANGGAL BAYAR</th>                        
                        <th scope="col">JUMLAH</th>               
                      </tr>
                    </thead>

                    <tbody>
                      <?php 
                        $query = mysqli_query($koneksi,"SELECT * FROM pembayaran WHERE nisn='$_GET[nisn]' 
                        ORDER BY tgl_bayar ASC");
                        while ($data=mysqli_fetch_array($query)) {
                          echo" 
                          <tr>                 
                                <td>$data[nisn]</td>
                                <td>$data[nis]</td>
                                <td>$data[nama]</td>
                                <td>$data[bulan]</td>
                                <td>$data[tgl_bayar]</td>                           
                                <td>$data[jumlah_bayar]</td>
                          </tr>";
                        }
                      ?>
                    </tbody>
                </table> 
                        <br>   
              <?php 
              } else {
                
              }
              ?> 
            </div>
          </div>
        </section>
      </div>
    </div>                              
        <div class="col-lg-10 col-lg-6 offset-lg-2 text-center">
          Copyright &copy; 2023 - SMA MUHAMMADIYAH 15 JAKARTA.
        </div>
  </body>
</html>