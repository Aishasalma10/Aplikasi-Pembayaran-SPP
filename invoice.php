<?php
	include 'koneksi.php';
	header("Content-type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=INVOICE.doc");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Rincian Transaksi Pembayaran SPP</title>
</head>

<body>

<?php
if (isset($_POST['nisn'])) {
    $nisn 	= ($_POST['nisn']);
 	}
?>

<?php 
		$query = "SELECT * FROM pembayaran WHERE bulan='JULI' AND nisn='$nisn' ";
		$result = mysqli_query($koneksi, $query);
		if(!$result){
		die ("Query Error: ".mysqli_errno($koneksi).
			" - ".mysqli_error($koneksi)); }			
		while ($row = mysqli_fetch_assoc($result)) {
?>

<p align="center" img="img/dosq15.jpg"></p>
<p align="center">RINCIAN TRANSAKSI PEMBAYARAN SPP</p>
<p align="center">SMAS MUHAMMADIYAH 15 JAKARTA</p><br>
<p align="justify">Berikut rincian transaksi pembayaran yang telah dilakukan, atas nama :</p>
<p align="left">NISN 	      : <?php echo $row ['nisn']; ?> 
<p align="left">Nama          : <?php echo $row ['nama']; ?> 
<p align="left">Bulan         : <?php echo $row ['bulan']; ?> 
<p align="left">Tanggal Bayar : <?php echo $row ['tgl_bayar']; ?> 
<p align="left">Jumlah        : <?php echo $row ['jumlah_bayar']; ?>  

<p align="justify">Terima kasih telah melakukan pembayaran spp pada bulan ini. Mohon simpan invoice pembayaran ini sebagai bukti bahwa sudah melakukan pembayaran. </p><br><br>
<?php
	}
?>

</body>
</html>