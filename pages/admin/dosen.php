<?php 
error_reporting(0);
include ("../../database/koneksi.php");
include ("../data/data-hapus-dosen.php");
include ("../../akses.php");
include ("../../akses-mahasiswa.php");
include ("../../akses-dosen.php");

$user = $_SESSION["nama"];

$data = $_POST['data'];
$dos = mysqli_num_rows(mysqli_query($conn,"select * from dosen"));
$info = $_POST['info'];

?>
<?php include ("../../template/header.php"); ?>
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
            <li><a class="nav-link" href="../chat/chatAdmin.php"><i class="fas fa-comment-dots"></i> <span>Pesan</span></a></li>
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

    <?php include ("../../template/footer.php"); ?>
    
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
