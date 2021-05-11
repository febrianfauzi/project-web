<?php 
error_reporting(0);
include "../database/koneksi.php";
include ("../akses.php");

$user = $_SESSION["nama"];
$nidn = $_SESSION['id'];
$sta = mysqli_query($conn,"select * from dosen where nidn='$nidn'");
$d=mysqli_fetch_array($sta);
$konsen = $d['konsentrasi'];
?>

<div class="col-lg-12">
	<h4>Kumpulan Skripsi</h4>
	<div class="card">
		<div class="card-body border border-info rounded">
			<table>
				<?php 
				$data = mysqli_query($conn,"select * from list_skripsi");
				while($r=mysqli_fetch_array($data)){
					?>
					<tr>
						<td>
							<h5><small><i class="fas fa-book"></i><small> <a href="upload-skripsi.php?file=<?php echo $r['file']; ?>"><?php echo $r['file']; ?></a></small></h5>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>