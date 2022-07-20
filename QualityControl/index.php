
<?php 

if(isset($_GET['pesan'])){
  if($_GET['pesan']=="gagal"){
    echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Quality Control</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">

  <!-- Choices.js-->
  <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">

  <!-- Google fonts - Muli-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">

  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">

  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom-style.css?version=2">

  <!-- Favicon-->
  <link rel="shortcut icon" href="img/quality.png">

</head>
<body>
  <div class="login-page">
    <div class="container d-flex align-items-center position-relative py-5">

      <div class="card shadow-sm w-100 rounded overflow-hidden bg-none">
        <div class="card-header">
          <center>QUALITY CONTROL</center>
        </div>

        <div class="card-body p-0">
          <div class="gx-0 align-items-stretch">
            <!-- Form Panel    -->

            <div class="d-flex align-items-center px-4 px-lg-5 h-100 bg-dash-dark-2">

              <form class="login-form py-5 w-100" method="POST" action="config.php">

                <div class="input-material-group mb-3">
                  <input class="input-material" id="login-username" type="text" name="username" autocomplete="off" required="on">
                  <label class="label-material" for="login-username">Username</label>
                </div>

                <div class="input-material-group mb-4">
                  <input class="input-material" id="login-password" type="password" name="password" autocomplete="off" required="on">
                  <label class="label-material" for="login-password">Password</label>
                </div>

                <button class="btn btn-primary mb-3" id="login" value="LOGIN" type="submit">Login</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/just-validate/js/just-validate.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
  <!-- Main File-->
  <script src="js/front.js"></script>
  <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
        }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
  </html>