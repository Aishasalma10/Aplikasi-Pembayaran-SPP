<?php
  include('koneksi.php'); // Menghubungkan ke database
  include('tampilan/header.php'); // Menyertakan header
  include('tampilan/sidebar.php'); // Menyertakan sidebar
  include('tampilan/footer.php'); // Menyertakan footer
?>

<?php
  if ($_SESSION['level'] == "petugas") {
?>
<body>
  <!-- Main Content -->
  <div class="main-content bg-primary">
    <section class="section">
      <div class="card card-statistic-2">
        <br>
        <center>
          <p>
            <h3>W E L C O M E<br>SMA MUHAMMADIYAH 15 JAKARTA</h3>
          </p>
          <br>
          <img src="img/smam15.jpg">
          <br><br>
          <p>
            <h4>Jl. Anggrek Nelly Murni Blok B-C Komplek Slipi <br>
              Kemanggisan Palmerah - Jakarta Barat <br>
              Telp : 5364464
            </h4>
          </p>
        </center>
      </div>
    </section>
  </div>
  <div class="col-lg-10 col-lg-6 offset-lg-2 text-center">
    Copyright &copy; 2023 - SMA MUHAMMADIYAH 15 JAKARTA.
  </div>
</body>
<?php
} else if ($_SESSION['level'] == "siswa") {
?>
<body>
  <!-- Main Content -->
  <div class="main-content bg-primary">
    <section class="section">
      <div class="card card-statistic-2">
        <br>
        <center>
          <p>
            <h3>W E L C O M E<br>SMA MUHAMMADIYAH 15 JAKARTA</h3>
          </p>
          <br>
          <img width="1152px" height="698px" src="img/smam15.jpg">
          <br><br>
          <p>
            <h4>Jl. Anggrek Nelly Murni Blok B-C Komplek Slipi <br>
              Kemanggisan Palmerah - Jakarta Barat <br>
              Telp : 5364464
            </h4>
          </p>
        </center>
      </div>
    </section>
  </div>
  <div class="col-lg-10 col-lg-6 offset-lg-2 text-center">
    Copyright &copy; 2023 - SMA MUHAMMADIYAH 15 JAKARTA.
  </div>
</body>
<?php
}
?>
