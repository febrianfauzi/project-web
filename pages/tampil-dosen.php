<?php 
include ("../database/koneksi.php");
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
  <div class="col-md-12">
    <div class="card card-hero">
      <div class="card-header">
        <h4>Dosen</h4>
      </div>
      <div class="card-body p-0">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
          <table class="table table-striped">
            <tr>
              <th scope="col">NIDK</th>
              <th scope="col">Nama</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Konsentrasi</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
            <tbody>
              <?php 
              $data = mysqli_query($conn,"select * from dosen");
              while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $d['nidn'] ?></td>
                  <td class="font-weight-600"><?php echo $d['nama'] ?></td>
                  <td class="font-weight-600"><?php echo $d['jurusan'] ?></td>
                  <td class="font-weight-600"><?php echo $d['konsentrasi'] ?></td>
                  <td class="font-weight-600"><?php echo $d['email'] ?></td>
                  <td>
                    <a href="dosen.php?e_dos=<?php echo $d['nidn'] ?>" type="button" name="edit" id="edit" title="Hapus data?" class="btn btn-warning rounded-circle edit"><i class="fas fa-pen"></i></a>
                    <a href="dosen.php?h_dos=<?php echo $d['nidn'] ?>" type="button" name="status" title="Hapus data?" class="btn btn-danger rounded-circle"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
  
 ?>
