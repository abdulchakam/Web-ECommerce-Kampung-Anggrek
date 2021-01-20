<?php
header('Content-Type: application/json');
include_once('koneksi.php');

class usr{}
$id = $_POST['no_nota'];
$query = "SELECT * FROM invoices WHERE id='$id' ORDER BY id DESC limit 1";
$result = mysqli_query($koneksi,$query);
$row = mysqli_fetch_array($result);
$response = array();
if($result)
{
$response['code'] =1;
$response['message'] = "Success!";
}
else
{
$response['code'] =0;
$response['message'] = "Failed!";
}
while(!empty($row))	
{
 $response = new usr();
 $response->id = $row['id'];
 $response->date = $row['date'];
 $response->total_biaya = $row['total_biaya'];
 $response->status = $row['status'];
 die(json_encode($response));
}
mysqli_close($koneksi);	
echo json_encode($response);
?> 