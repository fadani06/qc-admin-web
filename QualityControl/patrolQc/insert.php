<?php 

session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../index.php?pesan=gagal");
}

require 'config.php';

if (isset($_POST['submit'])) {


  //cek data sudah berhasil ditambahkan atau belum

  if(tambah($_POST) > 0) {
    echo "
    <script>
    alert('Data berhasil ditambahkan!');
    document.location.href = 'index.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('Data gagal ditambahkan!');
    document.location.href = 'index.php';
    </script>
    ";
  }
}

$kontener = query("SELECT * FROM tb_produk");


date_default_timezone_set('Asia/jakarta');
$date = date('d-m-y h:i:s');

?>

<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Select2 CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

    <!-- jQuery --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

    <!-- Select2 JS --> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

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

    <div class="card insert-page">
      <div class="card-body">
        <div class="card-header">
          <h3 class="card-title">Form Input Data Patrol QC</h3>
        </div>
        <div class="container">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm">

                <div class="form-group">
                  <label for="input1">Tanggal Check</label>
                  <input type="text" class="form-control" id="input1" name="tgl_check" readonly="on" value="<?php echo $date; ?>">
                </div>

                <div class="form-group">
                  <label for="input2">Part Name / Part Number</label>
                  <select class="custom-select" id="input2" name="id_Produk" aria-label="Default select example">
                    <option selected disabled hidden>Pilih</option>
                    <?php foreach ($kontener as $row) : ?>
                      <option value="<?php echo $row['id_Produk'];?>"><?php echo $row['partName'];?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="input3">Shift</label>
                  <input type="text" class="form-control" id="input3" name="shift" readonly="on" value="
                  <?php

                  $time = date("Hi");

                  if ($time >= "700" && $time <= "1500" ) {
                    echo "1";
                    } else if ($time >= "1501" && $time <= "2300") {
                      echo "2";
                      } elseif ($time >= "2301" && $time <= "2459") {
                        echo "3";
                        } elseif ($time >= "100" && $time <= "659") {
                          echo "3";
                        }

                      ?>">
                    </div>

                    <div class="form-group">
                      <label for="input4">PIC</label>
                      <input type="text" class="form-control" id="input4" name="pic" value="<?php echo $_SESSION['username']; ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                      <label for="input4">Area</label>
                      <select name="area" class="custom-select">
                        <option disabled="on" selected="on" hidden="on">Pilih</option>
                        <option value="Incoming Material">Incoming Material</option>
                        <option value="Incoming Submaterial">Incoming Submaterial</option>
                        <option value="Inspeksi IPQC">Inspeksi IPQC</option>
                        <option value="Inspeksi IQC">Inspeksi IQC</option>
                        <option value="Mesin EPP">Mesin EPP</option> 
                        <option value="Mesin EPS">Mesin EPS</option>
                        <option value="Selector">Selector</option>
                        <option value="Ruang CF/QC">Ruang CF/QC</option>
                        <option value="Export">Export</option>
                        <option value="Packing EPP">Packing EPP</option>
                        <option value="Packing EPS">Packing EPS</option>
                        <option value="Oven EPP">Oven EPP</option>
                        <option value="Oven EPS">Oven EPS</option>
                        <option value="Sheeting Blok">Sheeting Blok</option>
                        <option value="Gudang F/G">Gudang F/G</option>
                        <option value="Gudang Material EPP">Gudang Material EPP</option>
                        <option value="Gudang Material EPS">Gudang Material EPS</option>
                        <option value="Preparation">Preparation</option>
                        <option value="Rework">Rework</option>
                        <option value="ABF">ABF</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="input5">Equipment Check</label>
                      <input type="text" class="form-control" id="input5" name="eq_cek" required="on" autocomplete="off" placeholder="Tulis Disini...">
                    </div>

                    <div class="form-group">
                      <label for="input6">Problem</label>
                      <input type="text" class="form-control" id="input6" name="problem" required="on" autocomplete="off" placeholder="Tulis Disini...">
                    </div>

                    <div class="form-group">
                      <label for="input7">Tanggal Produksi</label>
                      <input type="date" class="form-control" id="input7" name="tgl_pro" required="on" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="input8">Shift Produksi</label>
                      <select name="shift_pro" class="custom-select">
                        <option disabled="on" selected="on" hidden="on">Pilih</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="input9">Keterangan Problem</label>
                      <textarea type="text" class="form-control" id="input9" name="ket_prob" required="on" autocomplete="off" placeholder="Tulis Disini..." style="padding-bottom: 23px;"></textarea>
                    </div>
                  </div>

                  <div class="col-sm">
                    <div class="form-group">
                      <label for="input10">QTY Check</label>
                      <input type="number" class="form-control" id="input10" name="qty_cek" required="on" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="input11">QTY Problem</label>
                      <input type="number" class="form-control" id="input11" name="qty_prob" required="on" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="input12">Action</label>
                      <input type="text" class="form-control" id="input12" name="act" required="on" autocomplete="off" placeholder="Tulis Disini...">
                    </div>

                    <div class="form-group">
                      <label for="input13">Status</label>
                      <select name="stat" class="custom-select">
                        <option disabled="on" selected="on" hidden="on">Pilih</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                        <option value="Belum Ada Action">Belum Ada Action</option>
                        <option value="Tahap Sortir">Tahap Sortir</option>
                        <option value="Tahap Rework">Tahap Rework</option>
                        <option value="Belum Tuntas">Belum Tuntas</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="input14">Keterangan Status</label>
                      <textarea type="text" class="form-control" id="input14" name="ket_stat" required="on" autocomplete="off" placeholder="Tulis Disini..." style="padding-bottom: 68px;"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="input15">Tanggal Closed</label>
                      <input type="date" class="form-control" id="input15" name="tgl_close" required="on" autocomplete="off" placeholder="Tulis Disini...">
                    </div>

                    <div class="form-group">
                      <label for="input16">Foto Problem</label>
                      <input type="file" class="form-control" id="input16" name="foto_prob" required="on" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="input17">Foto Action</label>
                      <input type="file" class="form-control" id="input17" name="foto_act" required="on" autocomplete="off">
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

        <script type="text/javascript">
        // Initialize select2
          $("#input2").select2();
        </script>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Javascript -->

      </body>
      </html>