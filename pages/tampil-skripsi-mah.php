<?php 
error_reporting(0);
include "../database/koneksi.php";
include ("../akses.php");
include ("../akses-dosen.php");

$user = $_SESSION["nama"];
$nidn = $_SESSION['id'];

?>

<div class="col-lg-12">
	<h4>Ide Skripsi Yang Tersedia!</h4>
	<table>
		<?php 
		$data = mysqli_query($conn,"select * from skripsi where nama = '$user'");
		while($r=mysqli_fetch_array($data)){
			?>
			<tr>
				<td>
					<div class="card">
						<div class="card-body border border-info rounded">
							<h5><small><i class="fa fa-book"></i></small> <?php echo $r['judul']; if ($r['status'] == 'Diterima') {
								echo " <span class='badge badge-success'>Diterima</span></h5>";
								echo '<span class="badge badge-light">Pembimbing : ';echo $r['dosen'];echo '</span>';
							}elseif($r['status'] == 'Ditolak'){
								echo " <span class='badge badge-danger'>Ditolak</span></h5>";
							}elseif($r['status'] == 'Tunggu'){
								echo " <span class='badge badge-info'>Proses</span></h5>";
							} ?>
							<br>
							<small><?php echo $r['deskripsi']; ?></small>
						</div>
					</div>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>