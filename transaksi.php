<?php
    include('koneksi.php'); 
    //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

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
            <h1>TRANSAKSI</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item text-primary">Transaksi</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                <h3>TRANSAKSI PEMBAYARAN</h3> 
                    <div class="card-header-form">
                      <form action="proses_transaksi.php" method="post">
                    </div>
                </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">NISN</span>
                          </div>
                          <input type="text" name="nisn" class="form-control" placeholder="masukkan nisn" 
                          aria-label="masukkan nisn" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">NIS</span>
                          </div>
                          <input type="text" name="nis" class="form-control" placeholder="masukkan nis" 
                          aria-label="masukkan nis" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama</span>
                          </div>
                          <input type="text" name="nama" class="form-control" placeholder=" masukkan nama siswa" 
                          aria-label="masukkan nama siswa" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Bulan</span>
                          </div>
                          <input type="text" name="bulan" class="form-control" placeholder=" masukkan bulan pembayaran" 
                          aria-label="masukkan bulan pembayaran" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Tanggal Bayar</span>
                          </div>
                          <input type="date" name="tgl_bayar" class="form-control" placeholder=" masukkan tgl_bayar" 
                          aria-label="masukkan tanggal bayar" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nominal</span>
                          </div>
                          <input type="text" name="jumlah_bayar" class="form-control" placeholder="masukkan nominal" 
                          aria-label="masukkan nominal" aria-describedby="basic-addon1">
                        </div>

                        <div class="d-flex justify-content-center">
                          <button type="submit" class="btn btn-success">Bayar</button>
                      </form>
              </div>
              <br>   
                   <form action="" method="get">
                    <div class="col-md-12">
                      <h3>DATA BAYAR SISWA SESUAI NISN</h3>
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
  </div>
      <div class="col-lg-10 col-lg-6 offset-lg-2 text-center">
        Copyright &copy; 2023 - SMA MUHAMMADIYAH 15 JAKARTA.
      </div>
  </body>
</html>