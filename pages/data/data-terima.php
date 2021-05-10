<?php 
include '../../database/koneksi.php';

$des = $_POST['des-dosen'];
$id = $_POST['id_skripsi'];

if (isset($_POST['id_skripsi'])) {
	mysqli_query($conn,"update skripsi set des_dosen='$des',status='Diterima' where id_skripsi='$id'");
}

?>