<?php 
include '../../database/koneksi.php';

$nidn = $_GET['h_dos'];

if (isset($nidn)) {
	mysqli_query($conn,"delete from dosen where nidn='$nidn'");
	mysqli_query($conn,"delete from user where user='$nidn'");
}
?>