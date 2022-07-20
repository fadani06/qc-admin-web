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

if (isset($_POST['submit'])) {

    //cek data sudah berhasil diubah atau belum

  if(ubah($_POST) > 0) {
    echo "
    <script>
    alert('Data berhasil diubah!');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo "
    <script>
    alert('Data gagal diubah!');
    document.location.href = 'index.php';
    </script>";
  }
}

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

    <link rel="stylesheet" type="text/css" href="style.css?version=10">

    <title>Website Quality Control</title>
  </head>
  <body>

    <div class="card edit-page">
      <div class="card-body">
        <div class="card-header">
          <h4 class="card-title">Form Edit Data Quality Control</h4>
        </div>
        <div class="container">
          <h5><?php echo $ambil['partName'];?></h5>
          <form action="" method="POST" enctype="multipart/form-data">

            <div class="row">
              <div class="col-sm">

                <div class="form-group">
                  <label for="input1">Tanggal Check</label>
                  <input type="text" class="form-control" id="input1" name="tgl_check" readonly="on" value="<?php echo $ambil["tgl_check"]; ?>">
                </div>

                <div class="form-group">
                  <label for="input3">Shift</label>
                  <input type="text" class="form-control" id="input3" name="shift" readonly="on" value="<?php echo $ambil["shift"]; ?>">
                </div>

                <div class="form-group">
                  <label for="input4">PIC</label>
                  <input type="text" class="form-control" id="input4" name="pic" readonly="on" value="<?php echo $ambil["pic"]; ?>">
                </div>

                <div class="form-group">
                  <label for="input5">Area</label>
                  <select class="custom-select" name="area" id="input5">
                    <option disabled selected hidden>- Pilih -</option>
                    <option value="Incoming Material"    <?php if($ambil['area']=='Incoming Material') echo 'selected'?>>Incoming Material</option>
                    <option value="Incoming Submaterial" <?php if($ambil['area']=='Incoming Submaterial') echo 'selected'?>>Incoming Submaterial</option>
                    <option value="Inspeksi IPQC"        <?php if($ambil['area']=='Inspeksi IPQC') echo 'selected'?>>Inspeksi IPQC</option>
                    <option value="Inspeksi IQC"         <?php if($ambil['area']=='Inspeksi IQC') echo 'selected'?>>Inspeksi IQC</option>
                    <option value="Mesin EPP"            <?php if($ambil['area']=='Mesin EPP') echo 'selected'?>>Mesin EPP</option> 
                    <option value="Mesin EPS"            <?php if($ambil['area']=='Mesin EPS') echo 'selected'?>>Mesin EPS</option>
                    <option value="Selector"             <?php if($ambil['area']=='Selector') echo 'selected'?>>Selector</option>
                    <option value="Ruang QC/CF"          <?php if($ambil['area']=='Ruang QC/CF') echo 'selected'?>>Ruang QC/CF</option>
                    <option value="Export"               <?php if($ambil['area']=='Export') echo 'selected'?>>Export</option>
                    <option value="Packing EPP"          <?php if($ambil['area']=='Packing EPP') echo 'selected'?>>Packing EPP</option>
                    <option value="Packing EPS"          <?php if($ambil['area']=='Packing EPS') echo 'selected'?>>Packing EPS</option>
                    <option value="Oven EPP"             <?php if($ambil['area']=='Oven EPP') echo 'selected'?>>Oven EPP</option>
                    <option value="Oven EPS"             <?php if($ambil['area']=='Oven EPS') echo 'selected'?>>Oven EPS</option>
                    <option value="Sheeting Blok"        <?php if($ambil['area']=='Sheeting Blok') echo 'selected'?>>Sheeting Blok</option>
                    <option value="Gudang F/G"           <?php if($ambil['area']=='Gudang F/G') echo 'selected'?>>Gudang F/G</option>
                    <option value="Gudang Material EPP"  <?php if($ambil['area']=='Gudang Material EPP') echo 'selected'?>>Gudang Material EPP</option>
                    <option value="Gudang Material EPS"  <?php if($ambil['area']=='Gudang Material EPS') echo 'selected'?>>Gudang Material EPs</option>
                    <option value="Preparation"          <?php if($ambil['area']=='Preparation') echo 'selected'?>>Preparation</option>
                    <option value="Rework"               <?php if($ambil['area']=='Rework') echo 'selected'?>>Rework</option>
                    <option value="ABF"                  <?php if($ambil['area']=='ABF') echo 'selected'?>>ABF</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="input6">Equipment Check</label>
                  <input type="text" class="form-control" id="input6" autocomplete="on" name="eq_cek" value="<?php echo $ambil["eq_cek"]; ?>">
                </div>

                <div class="form-group">
                  <label for="input7">Problem</label>
                  <input type="text" class="form-control" id="input7" autocomplete="on" name="problem" value="<?php echo $ambil["problem"]; ?>">
                </div>

                <div class="form-group">
                  <label for="input8">Tanggal Produksi</label>
                  <input type="date" class="form-control" id="input8" autocomplete="on" name="tgl_pro" value="<?php echo $ambil["tgl_pro"]; ?>">
                </div>

                <div class="form-group">
                  <label for="input9">Shift Produksi</label>
                  <select class="custom-select" name="shift_pro" id="input9">
                    <option disabled selected hidden>- Pilih -</option>
                    <option value="1" <?php if($ambil['shift_pro']=='1') echo 'selected'?>>1</option>
                    <option value="2" <?php if($ambil['shift_pro']=='2') echo 'selected'?>>2</option>
                    <option value="3" <?php if($ambil['shift_pro']=='3') echo 'selected'?>>3</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="input10">Keterangan Problem</label>
                  <textarea type="text" class="form-control" id="input10" autocomplete="on" name="ket_prob" style="padding-bottom: 40px;"><?php echo $ambil["ket_prob"]; ?></textarea>
                </div>

                <div class="form-group">
                  <label for="input11">QTY Check</label>
                  <input type="number" class="form-control" id="input11" value="<?php echo $ambil["qty_cek"]; ?>" autocomplete="on" name="qty_cek">
                </div>

              </div>

              <div class="col-sm">

                <div class="form-group">
                  <label for="input12">QTY Problem</label>
                  <input type="number" class="form-control" id="input12" value="<?php echo $ambil["qty_prob"]; ?>" autocomplete="on" name="qty_prob">
                </div>

                <div class="form-group">
                  <label for="input13">Action</label>
                  <input type="text" class="form-control" id="input13" value="<?php echo $ambil["act"]; ?>" autocomplete="on" name="act">
                </div>

                <div class="form-group">
                  <label for="input14">Status</label>
                  <select class="custom-select" id="input14" name="stat">
                    <option disabled selected hidden>- Pilih -</option>
                    <option value="OK"                  <?php if($ambil['stat']=='OK') echo 'selected'?>>! OK</option>
                    <option value="NG"                  <?php if($ambil['stat']=='NG') echo 'selected'?>>! NG</option>
                    <option value="Belum Ada Action"    <?php if($ambil['stat']=='Belum Ada Action') echo 'selected'?>>! Belum Ada Action</option>
                    <option value="Tahap Sortir"        <?php if($ambil['stat']=='Tahap Sortir') echo 'selected'?>>! Tahap Sortir</option>
                    <option value="Tahap Rework"        <?php if($ambil['stat']=='Tahap Rework') echo 'selected'?>>! Tahap Rework</option>
                    <option value="Belum Tuntas"        <?php if($ambil['stat']=='Belum Tuntas') echo 'selected'?>>! Belum Tuntas</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="input15">Keterangan Status</label>
                  <textarea type="text" class="form-control" id="input15" autocomplete="on" name="ket_stat" style="padding-bottom: 68px;"><?php echo $ambil["ket_stat"]; ?></textarea>
                </div>

                <div class="form-group">
                  <label for="input16">Tanggal Closed</label>
                  <input type="date" class="form-control" id="input16" autocomplete="on" name="tgl_close" value="<?php echo $ambil["tgl_close"]; ?>">
                </div>

                <div class="form-group">
                  <input type="hidden" name="fotoProb2" value="<?php echo $ambil["foto_prob"]; ?>">
                </div>

                <div class="form-group">
                  <input type="hidden" name="fotoAct2" value="<?php echo $ambil["foto_act"]; ?>">
                </div>

                <div class="row">
                  <div class="form-group col">
                    <label for="input17">Foto Problem</label> 
                    <div class="holder">
                      <img src="../img/patrolQC/fotoProb/<?php echo $ambil["foto_prob"]; ?>">
                    </div>
                    <input type="file" id="input17" name="foto_prob">
                  </div>

                  <div class="form-group col">
                    <label for="input18">Foto Action</label> 
                    <div class="holder">
                      <img src="../img/patrolQC/fotoAct/<?php echo $ambil["foto_act"]; ?>">
                    </div>
                    <input type="file" id="input18" name="foto_act">
                  </div>
                </div>

                <div class="form-group">
                  <input type="hidden" name="id_PatrolQc" value="<?php echo $ambil["id_PatrolQc"]; ?>">
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-6 d-grid gap-2">
                <input class="btn btn-primary" type="submit" name="submit" value="Save">
              </div>
              <div class="col-6 d-grid gap-2">
                <a class="btn btn-secondary" href="index.php" role="button">Close</a>
              </div>
            </div>
          </form>
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