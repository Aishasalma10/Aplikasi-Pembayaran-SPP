<?php
include 'koneksi.php';
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan Transaksi.doc");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Transaksi Pembayaran SPP</title>
</head>

<body>

<?php
if (isset($_POST['daritanggal'])) {
    $daritanggal 	= ($_POST['daritanggal']);
 	$sampaitanggal 	= ($_POST['sampaitanggal']);}
?>

<p align="center" img="img/dosq15.jpg"></p>
<p align="center">LAPORAN TRANSAKSI PEMBAYARAN SPP</p>
<p align="center">SMAS MUHAMMADIYAH 15 JAKARTA</p><br>
<p align="left">Dari Tanggal 	: <?php echo $daritanggal;?> <br>
				Sampai Tanggal 	: <?php echo $sampaitanggal;?></p>
<p>&nbsp;</p>

  	<table border="2" align="center">
			<thead>
				<tr>
					<th scope="col">NO</th>
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
			$query = "SELECT * FROM pembayaran WHERE tgl_bayar between '$daritanggal' 
			AND '$sampaitanggal' ORDER BY tgl_bayar ASC";
			$result = mysqli_query($koneksi, $query);

			if(!$result){
			die ("Query Error: ".mysqli_errno($koneksi).
				" - ".mysqli_error($koneksi)); }			
			$no=1;
			while ($row = mysqli_fetch_assoc($result)) {
			?>
            <tr>
                <td><center><?php echo $no; ?></td></center>
				<td><?php echo $row ['nisn']; ?></td>
				<td><?php echo $row ['nis']; ?></td>
				<td><?php echo $row ['nama']; ?></td>
				<td><center><?php echo $row ['bulan']; ?></td></center>
				<td><center><?php echo $row ['tgl_bayar']; ?></td></center>
				<td><center><?php echo $row ['jumlah_bayar']; ?></td></center>
            </tr> 
			<?php
				$no++; }
			?>
		</tbody>
    </table>	
</body>
</html>