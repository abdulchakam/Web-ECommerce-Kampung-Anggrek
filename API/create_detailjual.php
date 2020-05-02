<?php
include_once('koneksi.php');

$inv_id=$_POST['invoices_id'];

$kode=$_POST['kode'];
$ambil=mysqli_query($koneksi,"SELECT product_name ,product_price FROM products WHERE product_id='$kode'");
$row=mysqli_fetch_row($ambil);
$nama=$row[0];
$harga=$row[1];

$jumlah=$_POST['jumlah'];

echo $inv_id." ".$kode." ".$nama." ".$jumlah." ".$harga;


$insert = "INSERT INTO orders(`invoice_id`, `product_id`, `product_name`, `qty`, `price`) VALUES('$inv_id','$kode','$nama','$jumlah', '$harga')";
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