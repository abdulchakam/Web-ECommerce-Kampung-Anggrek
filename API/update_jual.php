<?php 
 include_once('koneksi.php');

$id =$_POST['no_nota']; 
$gambar=$_POST['gambar'];
$status	= "paid";

$nama_file = "BuktiPembayaran-".$id.".png";
		
$path = "../upload/bukti/".$nama_file;

$query = "UPDATE invoices SET `status`='$status', `image`='$nama_file' WHERE id='$id'";
$result = mysqli_query($koneksi,$query);

$response = array();
if($result)
{
	file_put_contents($path,base64_decode($gambar));
	$response['message'] = "Success ! Data berhasil diperbarui";
}
else
{
$response['message'] = "Failed ! Data gagal diperbarui";
}
echo json_encode($response);
?>