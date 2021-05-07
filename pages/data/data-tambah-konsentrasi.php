<?php 
include "../../database/koneksi.php";
$id_kon = $_POST['id_kon'];
$konsentrasi = $_POST['konsentrasi'];
$fakultas = $_POST['fakultas'];

if ($id_kon != "") {
	$dup = mysqli_num_rows(mysqli_query($conn,"select * from konsentrasi where id_kon = '$id_kon'"));
	if ($dup == 0) {
		mysqli_query($conn,"insert into konsentrasi values('$id_kon','$konsentrasi','$fakultas')");
	}
}
?>