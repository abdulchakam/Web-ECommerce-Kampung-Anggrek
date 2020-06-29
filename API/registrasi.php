<?php
include_once("koneksi.php");
include_once("kode.php");

$kode = $kode_otomatis;
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$kodepos = $_POST['kodepos'];
$phone = $_POST['phone'];
$email=$_POST['email'];
$password=md5($_POST['password']);


$insert = "INSERT INTO konsumen (`kd_kons`, `nm_kons`, `alm_kons`, `kota_kons`, `kd_pos`, `phone`, `email`, `foto_kons`, `password`) 
VALUES('$kode','$nama','$alamat','$kota','$kodepos','$phone','$email','default.png','$password')";

$exeinsert = mysqli_query($koneksi,$insert);
$response = array();
if($exeinsert)
{
$response['success'] =1;
$response['email'] = $email;
$response['message'] = "Success ! Registrasi Berhasil";
}
else
{
$response['gagal'] =0;
$response['email'] = $email;
$response['message'] = "Failed ! Registrasi Gagal";
}
echo json_encode($response);

?>