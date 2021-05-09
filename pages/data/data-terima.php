<?php 
include '../../database/koneksi.php';

$des = $_POST['des-dosen'];
$id = $_POST['id_skripsi'];
$dosen = $_POST['pembimbing'];

if (isset($_POST['pembimbing'])) {
	mysqli_query($conn,"update skripsi set dosen='$dosen',des_dosen='$des',status='Diterima' where id_skripsi='$id'");
}

?>