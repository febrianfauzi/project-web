<?php 
include '../../database/koneksi.php';
$kode = $_POST['id_fak'];
$fakultas = $_POST['fakultas'];

if ($kode != "") {
	mysqli_query($conn,"insert into fakultas values('$kode','$fakultas')");
}

$nik = $_POST['nik'];
$nama_dosen = $_POST['nama_dosen'];
$matkul = $_POST['matkul'];

if ($kode != "") {
	mysqli_query($conn,"insert into dosen values('$nik','$nama_dosen','$matkul')");
}
?>
