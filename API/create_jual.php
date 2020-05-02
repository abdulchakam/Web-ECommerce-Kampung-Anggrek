<?php 
 include_once('koneksi.php');

	

$email =$_POST['username']; 
$total=$_POST['total'];
$pembayaran=$_POST['pembayaran'];
$kembalian=$_POST['kembalian'];

$date = date('Y-m-d H:i:s');
$due_date = date('Y-m-d H:i:s', mktime( date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y')));
$status	= "unpaid";

	$ambil=mysqli_query($koneksi,"SELECT kd_kons FROM konsumen WHERE email='$email'"); 
	$row=mysqli_fetch_row($ambil); 
	$kode_konsumen=$row[0]; 
	

$insert = "INSERT INTO invoices(`date`, `kd_kons`, `due_date`, `status`) value('$date', '$kode_konsumen', '$due_date', '$status')";
$exeinsert = mysqli_query($koneksi,$insert);
$response = array();

$get_id = mysqli_fetch_row( mysqli_query($koneksi,"SELECT id from invoices where `date`='$date' "));
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
?>