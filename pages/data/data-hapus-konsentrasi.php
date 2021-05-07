<?php 
include '../../database/koneksi.php';
error_reporting(0);

$id_kon = $_GET['h_kon'];

if (isset($id_kon)) {
	mysqli_query($conn,"delete from konsentrasi where id_kon='$id_kon'");
}
?>