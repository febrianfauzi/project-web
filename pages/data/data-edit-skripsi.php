<?php 
include '../../database/koneksi.php';

$nim = $_GET['nim'];

if (isset($_GET['status'])) {
	mysqli_query($conn,"update mahasiswa set status='Skripsi' where nim='$nim'");
}

?>