<?php
header('Content-Type: application/json; charset=utf8');
include_once('koneksi.php');

$kode_konsumen = $_POST['kd_kons'];
$query = "SELECT * FROM invoices WHERE kd_kons='".$kode_konsumen."'";
$result = mysqli_query($koneksi,$query);
$response = array();

while($row = mysqli_fetch_assoc($result))	
{
 $response[] = $row;

}
mysqli_close($koneksi);	
echo json_encode($response);
?> 