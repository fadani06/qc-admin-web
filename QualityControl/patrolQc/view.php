<?php 

session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../index.php?pesan=gagal");
}

require 'config.php';

//Ambil Data
$id_PatrolQc = $_GET['id_PatrolQc'];

// Query Data berdasarkan id_PatrolQc
$ambil = query("SELECT * FROM patrol_qc INNER JOIN tb_produk ON patrol_qc.id_Produk = tb_produk.id_Produk WHERE id_PatrolQc = $id_PatrolQc") [0];



?>


<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet"> 

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="style.css?version=1">

    <title>Website Quality Control</title>
  </head>
  <body>

    <div class="card view-page">
      <div class="card-body" id="body">
        <div class="card-header">
          <h4 class="card-title"><?php echo $ambil["partName"]; ?></h4>
        </div>
        <div class="table-data">
          <table class="table table-bordered table-resposive">
            <tr>
              <th scope="col" width="30%">Tanggal Check</th>
              <td><?php echo $ambil["tgl_check"]; ?>
            </tr>
            <tr>
              <th scope="col" width="30%">Kode Barang</th>
              <td><?php echo $ambil["kodeBarang"]; ?> </td>
            </tr>
            <tr>
              <th scope="col" width="30%">Customer</th>
              <td><?php echo $ambil["customer"]; ?> </td>
            </tr>
            <tr>
              <th scope="col" width="30%">Shift</th>
              <td><?php echo $ambil["shift"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">PIC</th>
              <td><?php echo $ambil["pic"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">Area</th>
              <td><?php echo $ambil["area"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">Equipment Check</th>
              <td><?php echo $ambil["eq_cek"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">Problem</th>
              <td><?php echo $ambil["problem"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">Tanggal Produksi</th>
              <td><?php echo $ambil["tgl_pro"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">Shift Produksi</th>
              <td><?php echo $ambil["shift_pro"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">Keterangan Problem</th>
              <td><?php echo $ambil["ket_prob"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">QTY Check</th>
              <td><?php echo $ambil["qty_cek"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">QTY Problem</th>
              <td><?php echo $ambil["qty_prob"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">Act</th>
              <td><?php echo $ambil["act"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">Status</th>
              <td><?php echo $ambil["stat"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">Keterangan Status</th>
              <td><?php echo $ambil["ket_stat"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">Tanggal Close</th>
              <td><?php echo $ambil["tgl_close"]; ?></td>
            </tr>
            <tr>
              <th scope="col" width="30%">Foto Problem</th>
              <td>
                <img src="../img/patrolQC/fotoProb/<?php echo $ambil["foto_prob"]; ?>">
              </td>
            </tr>
            <tr>
              <th scope="col" width="30%">Foto Action</th>
              <td>
                <img src="../img/patrolQC/fotoAct/<?php echo $ambil["foto_act"]; ?>">
              </td>
            </tr>       
          </table>
        </div>
        <div class="d-grid gap-2">
          <a class="btn btn-secondary" href="index.php" role="button">Close</a>
        </div>
      </div>
      
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
  </html>