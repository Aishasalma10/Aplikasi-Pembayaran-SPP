<?php
function profileFunction($function, ...$args) {
  
  $start_time = microtime(true);
  $start_memory = memory_get_usage();

  $result = call_user_func_array($function, $args);

  $end_time = microtime(true);
  $end_memory = memory_get_usage();

  $execution_time = $end_time - $start_time;
  $memory_used = $end_memory - $start_memory;

  echo "  Fungsi $function\n";
  echo "Waktu Eksekusi: " . $execution_time . " detik.\n";
  echo "Penggunaan Memori: " . $memory_used . " bytes.\n";

  return $result;
}

function PROFILING() {


  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA PENGGUNA</title>
    
  </head>
<body>

	<?php

  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');
?>
      
   <!-- Main Content -->
      <div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>DATA PETUGAS</h1>
          </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>LIST PETUGAS</h4>
                    <div class="card-header-form">
                      <form>
                          <div class="input-group-btn">
                            <a href="tambah_petugas.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                          <th>USERNAME</th>
                          <th>PASSWORD</th>
                          <th>NAMA PETUGAS</th>
                          <th>LEVEL</th>
                          <th>ACTION</th>
                        </tr>
                        </thead>
                         <tbody>
                           <?php

                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "CREATE INDEX idx_level ON petugas(level='petugas')";
                              $query = "SELECT * FROM petugas ORDER BY level ASC";
                              

                              $result = mysqli_query($koneksi, $query);
                              //mengecek apakah ada error ketika menjalankan query
                              if(!$result){
                                die ("Query Error: ".mysqli_errno($koneksi).
                                   " - ".mysqli_error($koneksi));
                              }

                              //buat perulangan untuk element tabel dari data mahasiswa
                              $no = 1; //variabel untuk membuat nomor urut
                              // hasil query akan disimpan dalam variabel $data dalam bentuk array
                              // kemudian dicetak dengan perulangan while
                              while($row = mysqli_fetch_assoc($result))
                              {
                              ?>
                        <tr>  
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['nama_pengguna']; ?> </td>
                            <td><?php echo $row['level']; ?></td>   
                          <td>
                            <a href="edit_petugas.php?id=<?php echo $row['id_petugas']; ?>"class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="proses_hapuspetugas.php?id=<?php echo $row['id_petugas']; ?>" class="btn btn-danger" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                         <?php
                           $no++; //untuk nomor urut terus bertambah 1
                           }
                         ?>
                         <?php }

profileFunction('Profiling');?>
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
          Copyright &copy; 2023 - SMA MUHAMMADIYAH 15 JAKARTA.
        </div>
  </div>
</body>
</html>