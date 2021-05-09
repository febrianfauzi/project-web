<?php 
include '../../database/koneksi.php';
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$nama = $_POST['nama'];
$konsentrasi = $_POST['konsentrasi'];

if ($judul != "") {

	mysqli_query($conn,"insert into skripsi values(null,'$judul','$deskripsi','$nama','','Tunggu','$konsentrasi')");

}
?>
