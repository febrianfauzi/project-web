<?php 
error_reporting(0);
include ("../database/koneksi.php");
include ("data/data-hapus-jurusan.php");
include ("data/data-hapus-konsentrasi.php");
include ("../akses.php");

$user = $_SESSION["nama"];
$nim = $_SESSION["id"];
$sta = mysqli_query($conn,"select * from mahasiswa where nim='$nim'");
$d=mysqli_fetch_array($sta);

$data = $_POST['data'];
$fak = mysqli_num_rows(mysqli_query($conn,"select * from fakultas"));
$kon = mysqli_num_rows(mysqli_query($conn,"select * from konsentrasi"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title> SISTEM SKRIPSI</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

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
              <li class="active"><a class="nav-link" href="index-mahasiswa.php"><i class="fas fa-university"></i> <span>Pemberitahuan</span></a></li>
              <?php if ($d['status'] == "Mahasiswa")
              { echo '<li><a class="nav-link disabled" href="ide-skripsi.php"><i class="fas fa-file-alt"></i> <span class="text-muted">Ide Skripsi</span></a></li>';}else{ echo '<li><a class="nav-link" href="ide-skripsi.php"><i class="fas fa-file-alt"></i> <span>Ide Skripsi</span></a></li>';} ?>
              <?php if ($d['status'] == "Mahasiswa")
              { echo '<li><a class="nav-link disabled" href="#"><i class="fas fa-comment-dots"></i> <span class="text-muted">Pesan</span></a></li>';}else{echo '<li><a class="nav-link" href="#"><i class="fas fa-comment-dots"></i> <span >Pesan</span></a></li>';} ?>
            </ul>
          </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Beranda Mahasiswa</h1>
            </div>
            <?php if ($d['status'] == "Mahasiswa"){ echo '
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-9 mt-5 pl-5">
                        <h3>Selamat Datang, '; echo $user; echo '. Mahasiswa Baru Ya.</h3>
                        <span>Saat ini sistem hanya bisa melakukan login!, sistem ini akan bisa digunakan jika admin telah menerima dan memvalidasimu jika kamu sudah mulai melakukan skripsi!, tetep semangat ya menjalani kehidupanmu di kampus !!!, jika kamu sudah memasuki semester akhir dan masih belum bisa mengakses ide skripsi. silahkan tanyakan ke fakultasnya masing-masing.
                        </span>  
                      </div>
                      <div class="col-lg-3">
                          <img alt="image" src="../assets/img/jelaskan.jpg" class="img-fluid" alt="Responsive image">
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            '; }; ?>
            <?php if ($d['status'] == "Skripsi"){ echo '
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-9 mt-5 pl-5">
                        <h3>Selamat Datang, '; echo $user; echo '. Sang Pejuang Skripsi.</h3>
                        <span>Selamat ya karena menempuh semester akhir dimana setiap mahasiswa S1 pasti akan mengalami namanya fase pengerjaan Skripsi. Saat ini menu Ide Skripsi dan Pesan sudah bisa diakses. Kamu bisa mengajukan ide skripsi dan dapat bertanya seputar skripsi pada menu pesan. Jadi, Semangat untuk skripsimu !!! 
                        </span>  
                      </div>
                      <div class="col-lg-3">
                          <img alt="image" src="../assets/img/jelaskan.jpg" class="img-fluid" alt="Responsive image">
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            '; }; ?>
          </div>
        </div>
      </section>
    </div>
    <footer class="main-footer">
      <div class="footer-left">
        Copyright &copy; 2021 <div class="bullet">
          <div class="footer-right">
            2.3.0
          </div>
        </footer>
      </div>
    </div>

    <script type="text/javascript">

      $(".info").show().fadeOut(3000);

      $(".tambah-jurusan").click(function(){
        $('.form-input').load('tambah-jurusan.php').hide().fadeIn(500);
      });

      $(".tambah-konsentrasi").click(function(){
        $('.form-input').load('tambah-konsentrasi.php').hide().fadeIn(500);
      });

      $('.tampil-fakultas').load('tampil-fakultas.php').hide().fadeIn(500);

    </script>

    <!-- General JS Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="../assets/js/page/index.js"></script>
  </body>
  </html>
