<?php 
header('Content-Type: application/json');
 include_once('koneksi.php');

$email =$_POST['username']; 
$pembelian=$_POST['pembelian'];
$date = date('Y-m-d H:i:s');
$due_date = date('Y-m-d H:i:s', mktime( date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y')));
$status	= "unpaid";
$ongkir = $_POST['ongkir'];
$total = $_POST['total'];
$alamat_tujuan = $_POST['alamat_tujuan'];
$kode_kab = '873';
$kurir = '732';
$image = '23890';

	$ambil=mysqli_query($koneksi,"SELECT kd_kons FROM konsumen WHERE email='$email'"); 
	$row=mysqli_fetch_row($ambil); 
	$kode_konsumen=$row[0]; 
	

$insert = "INSERT INTO invoices(kd_kons, date, due_date, status, pembelian, alm_tujuan, kode_kab, kurir, ongkir, total_biaya, image) 
			VALUES ('$kode_konsumen', '$date', '$due_date', '$status', '$pembelian', '$alamat_tujuan', '$kode_kab', '$kurir', '$ongkir','$total','$image')";
$exeinsert = mysqli_query($koneksi,$insert);
$response = array();

$get_id = mysqli_fetch_row( mysqli_query($koneksi,"SELECT id from invoices where date='$date' and total_biaya='$total' "));
$invoices_id = $get_id[0];

if($exeinsert)
{
$response['code'] =1;
$response['invoices_id'] =$invoices_id;
$response['message'] = "Success ! Pemesanan dibuat";
}
else
{
$response['code'] =0;
$response['invoices_id'] =$invoices_id;
$response['message'] = "Failed ! Pemesanan gagal dibuat";
}
echo json_encode($response);
echo $exeinsert;
?>