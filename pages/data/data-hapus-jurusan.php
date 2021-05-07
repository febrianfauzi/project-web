<?php 
include '../../database/koneksi.php';

$id_fak = $_GET['h_fak'];

if (isset($id_fak)) {
	mysqli_query($conn,"delete from fakultas where id_fak='$id_fak'");
}
?>