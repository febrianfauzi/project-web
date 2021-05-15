<?php 
include ("../../database/koneksi.php");
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
<div class="row">
  <div class="col-md-5">
    <div class="card card-hero">
      <div class="card-header">
        <h4>Fakultas</h4>
      </div>
      <div class="card-body p-0">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
          <table class="table table-striped">
            <tr>
              <th scope="col">Kode</th>
              <th scope="col">Fakultas</th>
              <th scope="col">Action</th>
            </tr>
            <tbody>
              <?php 
              $data = mysqli_query($conn,"select * from fakultas");
              while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $d['id_fak'] ?></td>
                  <td class="font-weight-600"><?php echo $d['fakultas'] ?></td>
                  <td><a href="index.php?h_fak=<?php echo $d['id_fak'] ?>" type="button" name="status" title="Hapus data?" class="btn btn-danger rounded-circle status"><i class="fas fa-trash"></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="card card-hero">
      <div class="card-header">
        <h4>Konsentrasi</h4>
      </div>
      <div class="card-body p-0">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
          <table class="table table-striped mb-0">
            <tr>
              <th scope="col">Kode</th>
              <th scope="col">Konsentrasi</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Action</th>
            </tr>
            <tbody>
              <?php 
              $data = mysqli_query($conn,"select * from konsentrasi");
              while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $d['id_kon'] ?></td>
                  <td class="font-weight-600"><?php echo $d['konsentrasi'] ?></td>
                  <td class="font-weight-600"><?php echo $d['fakultas'] ?></td>
                  <td><a href="index.php?h_kon=<?php echo $d['id_kon'] ?>" type="button" name="status" title="Hapus data?" class="btn btn-danger rounded-circle status"><i class="fas fa-trash"></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>