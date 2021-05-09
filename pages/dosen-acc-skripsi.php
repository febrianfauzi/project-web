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
	<h4>Ide Skripsi Yang Tersedia!</h4>
	<table>
		<?php 
		$data = mysqli_query($conn,"select * from skripsi where konsentrasi='$konsen' and status = 'Tunggu' ");
		while($r=mysqli_fetch_array($data)){
			?>
			<tr>
				<td>
					<div class="card">
						<div class="card-body border border-info rounded">
							<table>
								<tr>
									<td width="12%"><span class="badge badge-primary"><i class="fa fa-graduation-cap"></i> <?php echo $r['nama']; ?></span></td>
									<td><h5><small><i class="fa fa-book"></i></small> <?php echo $r['judul']; ?></h5></td>
									<tr>
										<td colspan="2">
											<small><?php echo $r['deskripsi']; ?></small>
										</td>
									</tr>
								</tr>
								<tr>
									<td colspan="2">
										<hr>
										<form action="dosen-ideskripsi.php" method="post" class="form-user">
											<div class="form-group">
												<textarea class="form-control" name="des-dosen" placeholder="Pesan untuk mahasiswa" style="height: 80px"></textarea>
												<input type="hidden" name="id_skripsi" value="<?php echo $r['id_skripsi']; ?>">
											</div>
											<div class="form-group">
												<select class="form-control" name="pembimbing" style="width: 300px;">
													<option selected disabled>Dosen Pembimbing</option>
													<?php 
													$dosen = mysqli_query($conn,"select * from dosen where konsentrasi='$konsen'");
													while($p=mysqli_fetch_array($dosen)){
														?>
														<option value="<?php echo $p['nama'] ?>"><?php echo $p['nama'] ?></option>
													<?php } ?>
												</select>
											</div>
											<button type="submit" class="btn btn-primary tombol-terima"><span><i class="fa fa-check"></i> Terima</button></span>
											<button type="submit" class="btn btn-danger tombol-tolak"><span><i class="fa fa-times"></i> Tolak</button></span>
										</form>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".tombol-terima").click(function(){
			var data = $('.form-user').serialize();
			$.ajax({
				type: 'post',
				url: "data/data-terima.php",
				data: data,
				success: function() {

				}
			});
		});
	});

	$(document).ready(function(){
		$(".tombol-tolak").click(function(){
			var data = $('.form-user').serialize();
			$.ajax({
				type: 'post',
				url: "data/data-tolak.php",
				data: data,
				success: function() {

				}
			});
		});
	});
</script>