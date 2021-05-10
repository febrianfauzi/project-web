<?php 
error_reporting(0);
include "../database/koneksi.php";
include ("../akses.php");
include ("../akses-mahasiswa.php");

$user = $_SESSION["nama"];
$nidn = $_SESSION['id'];
$sta = mysqli_query($conn,"select * from dosen where nidn='$nidn'");
$d=mysqli_fetch_array($sta);
$konsen = $d['konsentrasi'];
?>

<div class="col-lg-12">
	<h4>Judul Skripsi Yang Dibimbing!</h4>
	<table>
		<?php 
		$data = mysqli_query($conn,"select * from skripsi where konsentrasi='$konsen' and status = 'Diterima' and dosen='$user'");
		while($r=mysqli_fetch_array($data)){
			?>
			<tr>
				<td>
					<div class="card">
						<div class="card-body border border-info rounded">
							<h5><small><i class="fa fa-book"></i></small> <?php echo $r['judul']; ?></h5>
							<h6><span class="badge badge-info"><i class="fa fa-graduation-cap"></i> <?php echo $r['nama']; ?></span></h6>
							<small><?php echo $r['deskripsi']; ?></small><br>
							<small><b>Download Proposal: </b><a href="dosen-acc-skripsi.php?file=<?php echo $r['file']; ?>"><?php echo $r['file']; ?></a></small>
						</div>
					</div>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>