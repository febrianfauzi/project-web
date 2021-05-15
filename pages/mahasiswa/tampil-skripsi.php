<?php 
error_reporting(0);
include "../../database/koneksi.php";
include ("../../akses.php");
include ("../../akses-dosen.php");

$user = $_SESSION["nama"];
?>
<style type="text/css">
	.my-custom-scrollbar {
		position: relative;
		height: 420px;
		overflow: auto;
	}
	.table-wrapper-scroll-y {
		display: block;
	}
</style>
<div class="col-lg-12">
	<div class="table-wrapper-scroll-y my-custom-scrollbar">
		<table>
			<?php 
			$data = mysqli_query($conn,"select * from skripsi where nama='$user'");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td>
						<div class="card">
							<div class="card-body border border-info rounded">
								<h5><small><i class="fa fa-book"></i></small> <?php echo $d['judul']; ?></h5>
								<h6><span class="badge badge-info">Pembimbing: <?php echo $d['dosen']; ?></span></h6>
								<small><?php echo $d['deskripsi']; ?></small><br><br>
								<small><b>Download Proposal: </b><a href="ide-skripsi.php?file=<?php echo $d['file']; ?>"><?php echo $d['file']; ?></a></small>
							</div>
						</div>
					</td>

				</tr>
			<?php } ?>
		</table>
	</div>
</div>