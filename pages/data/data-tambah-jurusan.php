<?php 
	include '../../database/koneksi.php';
	$kode = $_POST['id_fak'];
	$fakultas = $_POST['fakultas'];

	if ($kode != "") {
		$dup = mysqli_num_rows(mysqli_query($conn,"select * from fakultas where id_fak = '$kode'"));
		if ($dup == 0) {
			mysqli_query($conn,"insert into fakultas values('$kode','$fakultas')");
		}
	}
?>
