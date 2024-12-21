<?php  
session_start();
include "../../../koneksi.php";

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	return $pecahkan[$tanggal] ?? null;
}

$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];
$status = $_POST['status'];
$v_data = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan INNER JOIN pembayaran ON pesanan.id_pesanan = pembayaran.id_pesanan
                                WHERE status='$status' AND tanggal_pesan BETWEEN '$fromDate' AND '$toDate'");
if(mysqli_num_rows($v_data) == 0){
	echo "<script type='text/javascript'>alert('Tidak ada data.'); close();</script>";
} else {
?>

	<script type="text/javascript">
	window.print() 
	</script>
    
	<style type="text/css">
	#print {
		margin:auto;
		text-align:center;
		font-family:"Calibri", Courier, monospace;
		width:1200px;
		font-size:14px;
	}
	#print .title {
		margin:20px;
		text-align:right;
		font-family:"Calibri", Courier, monospace;
		font-size:12px;
	}
	#print span {
		text-align:center;
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;	
		font-size:18px;
	}
	#print table {
		border-collapse:collapse;
		width:100%;
		margin:10px;
	}
	#print .table1 {
		border-collapse:collapse;
		width:90%;
		text-align:center;
		margin:10px;
	}
	#print table hr {
		border:3px double #000;	
	}
	#print .ttd {
		float:right;
		width:250px;
		background-position:center;
		background-size:contain;
	}
	#print table th {
		color:#000;
		font-family:Verdana, Geneva, sans-serif;
		font-size:12px;
	}
	#logo{
		width:111px;
		height:90px;
		padding-top:10px;	
		margin-left:10px;
	}

	h2,h3{
		margin: 0px 0px 0px 0px;
	}
	</style>

	<title>Laporan Cetak</title>
    <div id="print">
	<table class='table1'>
			<tr>
				<td>
<h2>Laporan Penjualan</h2>
<h2>Alvindo Computama</h2>
<p style="font-size:14px;"><i> Jl. Jend. Sudirman No.20, Kuningan, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45511</i></p>
	</td>
	</tr>
</table>
	
<table class='table'>	
<td><hr /></td>

</table>
<tr>
<td>
<table border='1' class='table' width="90%">
<tr>
<th>No.Invoice</th>
<th>Nama Pelanggan</th>
<th>Tanggal Pesan</th>
<th>Status</th>
<th>Pemasukkan</th>
</tr>
<?php 
$data = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan INNER JOIN pembayaran ON pesanan.id_pesanan = pembayaran.id_pesanan
                                WHERE status='$status' AND tanggal_pesan BETWEEN '$fromDate' AND '$toDate'");
$q=0;
while ($row = mysqli_fetch_array($data)) {
    $tanggal = date('Y-m-d', strtotime($row['tanggal_pesan']));
    $jam = date('H:i', strtotime($row['tanggal_pesan']));
    $sql_sum = mysqli_query($koneksi, "SELECT SUM(total) AS total_pemasukkan FROM pesanan INNER JOIN pembayaran ON pesanan.id_pesanan = pembayaran.id_pesanan
    WHERE status='$status' AND tanggal_pesan BETWEEN '$fromDate' AND '$toDate'");
    $total_pemasukkan = mysqli_fetch_array($sql_sum);
$q++;?> 
<tr>
<td>&nbsp;&nbsp;INV-AC-<?php echo $row['id_pesanan']; ?></td>
<td>&nbsp;&nbsp;<?php echo $row['nama_lengkap']; ?></td>
<td>&nbsp;&nbsp;<?php echo tgl_indo($tanggal); ?></td>
<td>&nbsp;&nbsp;<?php echo $row['status']; ?></td>
<td>&nbsp;&nbsp;<?php echo "Rp. ".number_format($row['total'])." ,-" ?></td>
</tr>
<?php } ?>
<tr>
    <td colspan="4"><strong>Total Pemasukkan</strong></td>
    <td>&nbsp;&nbsp;<?php echo "Rp. ".number_format($total_pemasukkan['total_pemasukkan'])." ,-" ?></td>
</tr>
</table>
</tr>
</table>
</div>
<div id="print">
<table width="450" align="right" class="ttd">
<tr>
<td width="100px" style="padding:20px 20px 20px 20px;" align="center">
<strong>Kuningan, <?php echo tgl_indo(date('Y-m-d')); ?></strong>
      <br><br><br><br>
<strong><u>Alvindo Computama</u><br></strong><small></small>
</td>
</tr>
</table>
</div>
<?php } ?>
