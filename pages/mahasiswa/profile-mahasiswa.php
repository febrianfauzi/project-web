<?php 
error_reporting(0);
include ("../../database/koneksi.php");
include ("../data/data-hapus-jurusan.php");
include ("../data/data-hapus-konsentrasi.php");
include ("../../akses-dosen.php");

$user = $_SESSION["nama"];
$nim = $_SESSION["id"];
$sta = mysqli_query($conn,"select * from mahasiswa where nim='$nim'");
$d=mysqli_fetch_array($sta);

$cek = mysqli_num_rows(mysqli_query($conn,"select * from skripsi where nama = '$user'"));

?>
<?php include ("../../template/header.php"); ?>

        <div class="main-sidebar">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="index-mahasiswa.php">Sistem Skripsi</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="index-mahasiswa.php">SS</a>
            </div>
            <ul class="sidebar-menu">
              <li class="active"><a class="nav-link" href="profile-mahasiswa.php"><i class="fas fa-user"></i> <span>Profile</span></a></li>
              <li><a class="nav-link" href="index-mahasiswa.php"><i class="fas fa-university"></i> <span>Pemberitahuan</span></a></li>
              <?php if ($d['status'] == "Mahasiswa")
              { echo '<li><a class="nav-link disabled" href="ide-skripsi.php"><i class="fas fa-file-alt"></i> <span class="text-muted">Skripsi</span></a></li>';}else{ echo '<li><a class="nav-link" href="ide-skripsi.php"><i class="fas fa-file-alt"></i> <span>Skripsi</span></a></li>';} ?>
              <?php if ($d['status'] == "Mahasiswa")
              { echo '<li><a class="nav-link disabled" href="../chat/chatMahasiswa.php"><i class="fas fa-comment-dots"></i> <span class="text-muted">Pesan</span></a></li>';}else{echo '<li><a class="nav-link" href="../chat/chatMahasiswa.php"><i class="fas fa-comment-dots"></i> <span >Pesan</span></a></li>';} ?>
              <li><a class="nav-link" href="upload-skripsi.php"><i class="fas fa-folder-open"></i> <span>Upload Skripsi</span></a></li>
            </ul>
          </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="col-lg-7">
        <h1>Profile Mahasiswa</h1>
      </div>
      <div class="d-flex d-flex align-items-end flex-column bd-highlight col-lg-5">
        <span><?php echo $d['jurusan']; echo "(".$d['konsentrasi'].")"; ?></span>
        <h5><?php echo $d['nama'];?></h5>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-lg-2">
                <center>
                  <img src="<?php echo $_SESSION['picture']; ?>" alt="logo" width="120" class="rounded-circle d-block mb-2">
                  <a href="#"><button type="button" class="btn btn-primary">Ganti Foto</button></a></center>
                </div>
                <h2 class="d-flex align-items-center justify-content-center col"><center>Selamat Datang Mahasiswa, <?php echo $d['nama'];?></center></h2>
              </div>
              <hr>
              <div class="row">
                <div class="card col-lg-12">
                  <div class="card-body rounded" style="border-style: double;">
                    <ul class="nav nav-pills mb-3 pb-2" id="pills-tab" role="tablist" style="border-style: none none double none;">
                      <li class="nav-item mr-2">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-user"></i> Profile</a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-id-card"></i> Kontak</a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-key"></i> Ganti Password</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <span>
                          <b>Nama</b>     : <?php echo $d['nama'];?><br>
                          <b>Fakultas</b> : <?php echo $d['fakultas'];?><br>
                          <b>Jurusan</b>  : <?php echo $d['jurusan'];?>
                        </span></div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                          <form>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $d['email'];?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Kontak</button>
                          </form></div>
                          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><form>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Password Lama</label>
                              <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Password Baru</label>
                              <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Konfirmasi Password Baru</label>
                              <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ganti Password</button>
                          </form></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    
    <?php include ("../../template/footer.php"); ?>

    <script type="text/javascript">

      $('.isi-skripsi').load('tampil-skripsi-mah.php');

    </script>
  </body>
  </html>
