<?php 

session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../index.php?pesan=gagal");
}

require 'config.php';

//Pagination 

$limitData = 100;
$jmlData = count(query("SELECT * FROM patrol_qc"));
$jmlHal = ceil($jmlData/$limitData);
if (isset($_GET['halaman'])) {
  $halAktif = $_GET['halaman'];
} else {
  $halAktif = 1;
}

$awalData = ($limitData * $halAktif) - $limitData;

$kontener = query("SELECT * FROM patrol_qc INNER JOIN tb_produk ON patrol_qc.id_Produk = tb_produk.id_Produk ORDER BY id_PatrolQc DESC LIMIT $awalData, $limitData");


//Tombol cari diKlik
if (isset($_POST['cari'])) {
  $kontener = cari($_POST["keyword"]); 
}

require '../template/header.php';

?>
<div class="page-content">
  <!-- Page Header-->

  <section class="tables py-0">
    <div class="container-fluid">
      <div class="card mb-0">
        <div class="card-header">
          
          <div class="header">
            <span>Patrol Quality Control</span>
            <a class="btn btn-success btn-sm" type="button" href="insert.php">Add Data</a>
          </div>

          <form class="form-inline" method="POST" action="">
            <div class="input-group input-group-sm mb-3">
              <input type="text" class="form-control" name="keyword" placeholder="Cari" aria-describedby="button-addon2">
              <button class="btn btn-primary" type="submit" name="cari" id="button-addon2"><i class='bx bx-search bx-fw'></i></button>
            </div>
          </form>
        </div>
        <div class="card-body pt-0">
          <div class="table-responsive ">
            <table class="table table-sm table-bordered mb-0">
              <thead>
                <tr>
                  <th width="1%">No</th>
                  <th>Part Name</th>
                  <th>Tanggal Input</th>
                  <th>Status</th>
                  <th width="13%">Action</th>
                </tr>
              </thead>
              <tbody>

                <?php $i = 1; ?>
                <?php foreach ($kontener as $row) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row ["partName"]; ?></td>
                    <td><?= $row ["tgl_check"]; ?></td>
                    <td><?= $row ["stat"]; ?></td>
                    <td>
                      <a class="btn btn-info btn-sm" href="view.php?id_PatrolQc=<?=$row["id_PatrolQc"];?>" role="button"><i class='bx bxs-detail'></i></a>
                      <a class="btn btn-dark btn-sm" href="edit.php?id_PatrolQc=<?=$row["id_PatrolQc"];?>" role="button"><i class='bx bxs-edit'></i></a>
                      <a class="btn btn-danger btn-sm" href="delete.php?id_PatrolQc=<?=$row["id_PatrolQc"];?>" onclick="return confirm('Anda akan menghapus data ini!');" role="button"><i class='bx bxs-trash'></i></a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <nav id="pagination" aria-label="Page navigation example" style="display: inline-block;">
            <ul class="pagination pagination-sm">

              <li class="page-item">
                <a class="page-link btn" href="" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>

              <?php for ($hal=1; $hal<=$jmlHal; $hal++) : ?>

                <?php if ($hal>5) {

                } ?>

                <li class="page-item">
                  <a class="page-link btn" href="?halaman=<?php echo $hal; ?>"><?php echo $hal; ?></a>
                </li>

              <?php endfor ?>


              <li class="page-item">
                <a class="page-link btn" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>


            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>

</div>


<?php 
require '../template/footer.php';


?>