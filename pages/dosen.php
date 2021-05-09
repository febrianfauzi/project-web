<?php 
error_reporting(0);
include ("../database/koneksi.php");
include ("data/data-hapus-dosen.php");
include ("../akses.php");
include ("../akses-mahasiswa.php");
include ("../akses-dosen.php");

$user = $_SESSION["nama"];

$data = $_POST['data'];
$dos = mysqli_num_rows(mysqli_query($conn,"select * from dosen"));
$info = $_POST['info'];

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
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
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
            <a href="index.php">Sistem Skripsi</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">SS</a>
          </div>
          <ul class="sidebar-menu">
            <li><a class="nav-link" href="index.php"><i class="fas fa-university"></i> <span>Beranda</span></a></li>
            <li><a class="nav-link" href="mahasiswa.php"><i class="fas fa-graduation-cap"></i> <span>Mahasiswa</span></a></li>
            <li class="active"><a class="nav-link" href="dosen.php"><i class="fas fa-chalkboard-teacher"></i> <span>Dosen</span></a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dosen</h1>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-5 col-lg-2 d-xl-none mb-2">
                      <button class="btn btn-primary tambah-dosen btn-lg btn-block"><i class="fas fa-plus"></i> Dosen</button>
                    </div>
                    <div class="d-none d-sm-block d-sm-none d-md-block d-md-none d-md-block d-lg-none d-xl-block mb-2 ml-2">
                      <button class="btn btn-primary tambah-dosen btn-lg btn-block"><i class="fas fa-plus"></i> Dosen</button>
                    </div>
                    <div class="col-lg-10 d-flex justify-content-end align-items-center">
                      <?php
                      if (isset($data)) {
                        if ($data < $dos) {
                          echo "<span class='badge badge-success info'>Data Berhasil Ditambahkan!</span>";
                        }else{
                          if (empty($info)) {
                            echo "<span class='badge badge-danger info'>Data Gagal Ditambahkan!</span>";
                          }else{
                            echo "<span class='badge badge-info info'>Data Berhasil Diubah!</span>";
                          }
                        }
                      }
                      if (isset($_GET['h_dos'])) {
                        echo "<span class='badge badge-warning info'>Data Berhasil Dihapus!</span>";
                      }
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="col-lg-12 mb-2">
                    <div class="form-input"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tampil-dosen"></div>
        </div>
      </section>
    </div>

    <?php include ("../template/footer.php"); ?>
    
    <?php 
    if (isset($_GET['e_dos'])) {
      ?>
      <script type="text/javascript">
        var nidn = "<?php echo $_GET['e_dos']; ?>";

        $.ajax({
          type: "POST",
          dataType: "html",
          url: "edit-dosen.php",
          data: "nidn="+nidn,
          success: function(data){
            $(".form-input").html(data);
          }
        });
      </script>
      <?php
    }
    ?>

    <script type="text/javascript">

      $(".info").show().fadeOut(3000);

      $(".tambah-dosen").click(function(){
        $('.form-input').load('tambah-dosen.php').hide().fadeIn(500);
      });

      $('.tampil-dosen').load('tampil-dosen.php').hide().fadeIn(500);

    </script>

  </body>
  </html>
