<?php 
 include_once('koneksi.php');

$id =$_POST['id']; 
$gambar=$_POST['gambar'];
$status	= "paid";

$query = "UPDATE invoices SET `status`='$status', `image`='$gambar' WHERE id='$id'";
$result = mysqli_query($koneksi,$query);

$response = array();
if($result)
{
$response['message'] = "Success ! Data berhasil diperbarui";
}
else
{
$response['message'] = "Failed ! Data gagal diperbarui";
}
echo json_encode($response);
?>
