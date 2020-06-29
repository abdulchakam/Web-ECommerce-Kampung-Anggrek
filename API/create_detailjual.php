<?php
include_once('koneksi.php');
$inv_id=$_POST['invoices_id'];
$kode=$_POST['kode'];
$ambil=mysqli_query($koneksi,"SELECT nm_brg ,harga FROM barang WHERE kd_brg='$kode'");
$row=mysqli_fetch_row($ambil);
$nama=$row[0];
$harga=$row[1];
$jumlah=$_POST['jumlah'];

$insert = "INSERT INTO orders(`invoice_id`, `kd_brg`, `nm_brg`, `harga`, `quantity`) VALUES('$inv_id','$kode','$nama','$harga', '$jumlah')";
$exeinsert = mysqli_query($koneksi,$insert);
$response = array();
if($exeinsert)
{
$response['code'] =1;
$response['message'] = "Success ! Detail pemesanan dibuat";
}
else
{
$response['code'] =0;
$response['message'] = "Failed ! Detail pemesanan gagal dibuat";
}
echo json_encode($response);
?>