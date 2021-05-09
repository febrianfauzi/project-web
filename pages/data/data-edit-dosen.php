<?php 
include '../../database/koneksi.php';

$nidn = $_POST['nidn'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$konsentrasi = $_POST['konsentrasi'];
$email = $_POST['email'];

mysqli_query($conn,"update dosen set nama='$nama',jurusan='$jurusan',konsentrasi='$konsentrasi',email='$email' where nidn='$nidn'");
mysqli_query($conn,"update user set nama='$nama' where user='$nidn'");
?>