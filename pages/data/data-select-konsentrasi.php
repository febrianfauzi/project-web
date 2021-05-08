<?php 
include "../../database/koneksi.php";

if (isset($_POST['jurusan'])) {
	$jurusan = $_POST["jurusan"];

	$sql = "select * from konsentrasi where fakultas = '$jurusan'";
	$hasil = mysqli_query($conn, $sql);
	
	echo '<option selected disabled>Pilih Konsentrasi</option>';
	while ($data = mysqli_fetch_array($hasil)) {
		?>
		<option value="<?php echo  $data['konsentrasi']; ?>"><?php echo $data['konsentrasi']; ?></option>
		<?php
	}
}

?>