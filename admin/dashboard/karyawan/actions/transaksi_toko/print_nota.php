<html>
<head>
<title>Faktur Pembayaran</title>
<style>
 
#tabel
{
font-size:15px;
border-collapse:collapse;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
</style>

</head>
<body style='font-family:tahoma; font-size:8pt;'>
<center><table style='width:350px; font-size:16pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='CENTER' vertical-align:top'><span style='color:black;'>
<b>ALVINDO COMPUTAMA</b></br>Jl. Jend. Sudirman No.20, Kuningan, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45511</span></br>
 
<?php
include "../../../../../koneksi.php";
$id_transaksi = $_GET['id_transaksi'];
$sql = mysqli_query($koneksi, "SELECT * FROM transaksi_toko INNER JOIN akun ON transaksi_toko.id_akun=akun.id_akun WHERE id_transaksi='$id_transaksi'");
$data = mysqli_fetch_array($sql);
$tanggal = date('d-m-Y', strtotime($data['tanggal_order']));
$jam = date('H:i:s', strtotime($data['tanggal_order']));
?>
 
<span style='font-size:12pt'>No. : TRANS-<?php echo $data['id_transaksi'] ?> , <?php echo $tanggal; ?> (user:<?php echo $data['username']; ?>), <?php echo $jam; ?></span></br>
</td>
</table>
<style>
hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
} 
</style>
<table cellspacing='0' cellpadding='0' style='width:450px; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>
 
<tr align='center'>
<td width='10%'>Item</td>
<td width='13%'>Price</td>
<td width='4%'>Qty</td>
<td width='7%'>Diskon %</td>
<td width='13%'>Total</td><tr>
<td colspan='5'><hr></td></tr>
</tr>
<?php
$detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi_toko INNER JOIN produk ON detail_transaksi_toko.id_produk=produk.id_produk WHERE id_transaksi='$id_transaksi'");
while($d_detail = mysqli_fetch_array($detail)){
    $total = $d_detail['harga_jual'] * $d_detail['kuantitas'];
?>
<tr><td style='vertical-align:top'><?= $d_detail['nama_produk']; ?></td>
<td style='vertical-align:top; text-align:right; padding-right:10px'><?= "Rp. ".number_format($d_detail['harga'])."" ?></td>
<td style='vertical-align:top; text-align:right; padding-right:10px'><?= $d_detail['kuantitas']; ?></td>
<td style='vertical-align:top; text-align:right; padding-right:10px'><?= $d_detail['diskon']; ?>%</td>
<td style='text-align:right; vertical-align:top'><?= "Rp. ".number_format($total)."" ?></td></tr>
<?php } ?>
<tr>
<td colspan='5'><hr></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Total : </div></td><td style='text-align:right; font-size:16pt; color:black'><?= "Rp. ".number_format($data['total'])."" ?></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Cash : </div></td><td style='text-align:right; font-size:16pt; color:black'><?= "Rp. ".number_format($data['bayar'])."" ?></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Change : </div></td><td style='text-align:right; font-size:16pt; color:black'><?= "Rp. ".number_format($data['kembali'])."" ?></td>
</tr>
</table>
<table style='width:350; font-size:12pt;' cellspacing='2'><tr></br><td align='center'>****** TERIMAKASIH ******</br></td></tr></table></center></body>

<script>
		window.print();
	</script>

</html>