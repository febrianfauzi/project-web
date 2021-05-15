<?php 
error_reporting(0);
include "../../database/koneksi.php";
include ("../../akses.php");
include ("../../akses-mahasiswa.php");

$user = $_SESSION["nama"];
$nidn = $_SESSION['id'];
$sta = mysqli_query($conn,"select * from dosen where nidn='$nidn'");
$d=mysqli_fetch_array($sta);
$konsen = $d['konsentrasi'];
?>

<div class="col-lg-12">
	<h4>Ide Skripsi Yang Tersedia!</h4>
	<table>
		<?php 
		$data = mysqli_query($conn,"select * from skripsi where konsentrasi='$konsen' and dosen='$user' and status = 'Tunggu'");
		while($r=mysqli_fetch_array($data)){
			?>
			<tr>
				<td>
					<div class="card">
						<div class="card-body border border-info rounded">
							<h5><small><i class="fa fa-book"></i></small> <?php echo $r['judul']; ?></h5>
							<small><?php echo $r['deskripsi']; ?></small>
						</div>
					</div>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>