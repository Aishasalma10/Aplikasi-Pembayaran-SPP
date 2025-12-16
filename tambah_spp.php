<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TAMBAH SPP</title>
   
  </head>
<body>
  <?php
  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');
?>
  
<div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>TAMBAH SPP</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="spp.php">Data SPP</a></div>
              <div class="breadcrumb-item text-primary">Tambah SPP</div>
            </div>
          </div>
          <div class="row">
              <div class="col-12">
                <div class="card">
                  </div>
                  <div class="card-body bg-primary">
                      <div class="col-10 col-lg-6 offset-lg-3">
                        <div class="wizard-steps">
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-money-check-alt"></i>
                            </div>
                            <div class="wizard-step-label">
                              FORMULIR SPP
                            </div><br>
                            <form class="wizard-content" method="post" action="proses_tambahspp.php"> 
                            <div class="wizard-pane">
                                <div class="form-group row align-items-center">
                                  <label class="col-md-4 text-md-right text-white">KELAS</label>
                                  <div class="col-lg-4 col-md-6">
                                    <input type="text" name="kelas" class="form-control">
                                  </div>
                                </div>
                                
                                <div class="form-group row align-items-center">
                                  <label class="col-md-4 text-md-right text-white">NOMINAL</label>
                                  <div class="col-lg-4 col-md-6">
                                    <input type="text" name="jumlah_bayar" class="form-control">
                                  </div>
                                </div>
                              <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-lg-4 col-md-6 text-center">
                                  <button type="submit" class="btn-icon btn-icon icon-right btn-primary">TAMBAH SPP <i class="fas fa-arrow-right"></i></button>
                                </div>
                              </div>
                            </div>
                          </form>
                          </div>
          </div>
        </section>
      </div>    
        <div class="col-lg-10 col-lg-6 offset-lg-2 text-center">
          Copyright &copy; 2023 - SMA MUHAMMADIYAH 15 JAKARTA.
        </div>
      </div>