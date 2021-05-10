<?php 
error_reporting(0);
include ("../database/koneksi.php");
include ("data/data-hapus-jurusan.php");
include ("data/data-hapus-konsentrasi.php");
include ("../akses.php");
include ("../akses-dosen.php");

$user = $_SESSION["nama"];
$nim = $_SESSION["id"];

$cek = mysqli_num_rows(mysqli_query($conn,"select * from skripsi where nama='$user'"));
$sta = mysqli_query($conn,"select * from mahasiswa where nim='$nim'");
$d=mysqli_fetch_array($sta);
$konsen = $d['konsentrasi'];

if(ISSET($_REQUEST['file'])){
 $file = $_REQUEST['file'];
 
  //header("Cache-Control: public");
  //header("Content-Description: File Transfer");
 header("Content-Disposition: attachment; filename=".basename($file));
 header("Content-Type: application/octet-stream;");
  //header("Content-Transfer-Encoding: binary");
 readfile("files/".$file);
}

?>
<?php include ("../template/header.php"); ?>
<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block"><?php echo $user; ?></div></a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="../logout.php" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="main-sidebar">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="index-mahasiswa.php">Sistem Skripsi</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="index-mahasiswa.php">SS</a>
            </div>
            <ul class="sidebar-menu">
              <li><a class="nav-link" href="index-mahasiswa.php"><i class="fas fa-university"></i> <span>Pemberitahuan</span></a></li>
              <li class="active"><a class="nav-link" href="ide-skripsi.php"><i class="fas fa-file-alt"></i> <span>Skripsi</span></a></li>
              <li><a class="nav-link" href="#"><i class="fas fa-comment-dots"></i> <span >Pesan</span></a></li>
              <li><a class="nav-link" href="upload-skripsi.php"><i class="fas fa-folder-open"></i> <span>Upload Skripsi</span></a></li>
            </ul>
          </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <div class="col-lg-7">
                <h1>Ide Skripsi</h1>
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
                    <div class="row">
                      <div class="col-lg-5">
                        <div class="card">
                          <div class="card-body">
                            <form action="data/data-tambah-skripsi.php" method="post" class="form-user" enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" class="form-control" name="judul" placeholder="Judul Skripsi" required>
                                <input type="hidden" name="nama" value="<?php echo $user; ?>">
                                <input type="hidden" name="konsentrasi" value="<?php echo $d['konsentrasi']; ?>">
                              </div>
                              <div class="form-group">
                                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" style="height: 200px;" required></textarea>
                                <small class="form-text text-muted">Minimal 200 Kata.</small>
                              </div>
                              <div class="form-group">
                                <select class="form-control" name="pembimbing" style="width: 300px;" required>
                                  <option selected disabled>Dosen Pembimbing</option>
                                  <?php 
                                  $dosen = mysqli_query($conn,"select * from dosen where konsentrasi='$konsen'");
                                  while($p=mysqli_fetch_array($dosen)){
                                    ?>
                                    <option value="<?php echo $p['nama'] ?>"><?php echo $p['nama'] ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="input-group mb-3">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="nama_file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih Proposal Skripsi(.pdf)</label>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary tombol-simpan"><span><i class="fa fa-paper-plane"></i> Simpan</button></span>
                            </form>  
                          </div>
                        </div>
                      </div>
                      <?php if ($cek == 0){ echo '
                      <div class="row col-lg-7">
                      <div class="col-lg-7 align-self-center">
                      <h3>Ide Skripsi Tidak Ditemukan.</h3>
                      <span>Hi, Teman! Saat ini tidak ada ide skripsimu yang sedang dalam proses. Silahkan ajukan ide skripsimu selengkap dan sebagus mungkin ya!!. Isi form tersebut untuk mengajukan ide skripsi yang ingin kamu ajukan. Kamu bisa mengajukan ide skripsi sebanyak mungkin. Tetap semangat !!!.
                      </span>
                      </div>
                      <div class="col-lg-5">
                      <img alt="image" src="../assets/img/ide.jpg" class="img-fluid" alt="Responsive image">
                      </div>
                      </div>
                      ';}else{
                        echo '<div class="isi-skripsi col"></div>';
                      } ?>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <script type="text/javascript">

      document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("inputGroupFile01").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      })

      $('.isi-skripsi').load('tampil-skripsi.php');

      $(document).ready(function(){
        $(".tombol-simpan").click(function(){
          var data = $('.form-user').serialize();
          $.ajax({
            type: 'post',
            url: "data/data-tambah-skripsi.php",
            data: data,
            success: function() {

            }
          });
        });
      });
    </script>
    <?php include ("../template/footer.php"); ?>
  </body>
  </html>
