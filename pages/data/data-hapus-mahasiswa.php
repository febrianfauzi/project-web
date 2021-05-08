<?php 
include '../../database/koneksi.php';

$nim = $_GET['h_mah'];

if (isset($nim)) {
	mysqli_query($conn,"delete from mahasiswa where nim='$nim'");
	mysqli_query($conn,"delete from user where user='$nim'");
}
?>