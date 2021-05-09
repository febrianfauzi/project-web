<?php 
include '../../database/koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$konsentrasi = $_POST['konsentrasi'];
$email = $_POST['email'];

mysqli_query($conn,"update mahasiswa set nama='$nama',jurusan='$jurusan',konsentrasi='$konsentrasi',email='$email' where nim='$nim'");
mysqli_query($conn,"update user set nama='$nama' where user='$nim'");
?>