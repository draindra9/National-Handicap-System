<!DOCTYPE html>

<?php
  include('classes/DB.php');
  include('classes/Login.php');

  //print_r(get_declared_classes());

  if (isset($_POST['login']))
  {
    $un = $_POST['un'];
    $pwd = $_POST['pwd'];

    if (DB::query('SELECT username FROM users WHERE username=:un', array(':un'=>$un)))
    {
      if (password_verify($pwd, DB::query('SELECT password FROM users WHERE username=:un', array(':un'=>$un))[0]['password']))
      {
        $cstrong = True;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

        $user_id = DB::query('SELECT id FROM users WHERE username=:un', array(':un'=>$un))[0]['id'];

        DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));

        setcookie("NHSID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
        setcookie("NHSID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

        header('Location: index.php');
      }
      else
      {
        ?>
          <div style="margin-bottom:0px;" class="alert alert-danger fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Incorrect Password!</strong>
          </div>
        <?php
      }
    }
    else
    {
      ?>
        <div style="margin-bottom:0px;" class="alert alert-danger fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>User Not Registered!</strong>
        </div>
      <?php
    }
  }

  if (isset($_POST['logout']))
  {
    if (isset($_POST['alldevices']))
    {
      DB::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>Login::isLoggedIn()));
    }
    else
    {
      if (isset($_COOKIE['NHSID']))
      {
        DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['NHSID'])));
      }
      setcookie('NHSID', '1', time()-3600);
      setcookie('NHSID_', '1', time()-3600);
    }
    header('Location: index.php');
  }

  // if (Login::isLoggedIn())
  // {
  //   echo "Logged In!";
  //   echo Login::isLoggedIn();
  // }
  // else
  // {
  //   echo "Not Logged In!";
  // }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>National Handicap System</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- JavaScript & jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="images/favicon/manifest.json">
    <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#87d37c">
    <!-- Plugins & Individual Files -->
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="plugins/DataTables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/DataTables/css/responsive.bootstrap.min.css">
    <script src="plugins/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="plugins/DataTables/js/dataTables.bootstrap.min.js"></script>
    <script src="plugins/DataTables/js/dataTables.responsive.min.js"></script>
    <script src="plugins/DataTables/js/responsive.bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/Font Awesome/css/font-awesome.min.css">
    <!-- bootstrap-datepicker -->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-daterangepicker/css/daterangepicker.css">
    <script src="plugins/bootstrap-daterangepicker/js/moment.min.js"></script>
    <script src="plugins/bootstrap-daterangepicker/js/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <script src="plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Individual Files -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <script src="js/custom.js"></script>
  </head>
  <body style="background:#DADFE1;">
    <?php include('files/nav.control.php'); ?>
    <div class="main">
      <div id="jumbotron" class="jumbotron" style="background:url('images/grass-free-texture.jpg')center;color:#fff;">
        <center>
          <img class="img-responsive" src="images/pgi_logo.png" alt="Indonesian Golf Association" /> <h1>Persatuan Golf Indonesia</h1>
          <p>National Handicap System</p>
        </center>
      </div>
      <ol class="breadcrumb">
        <?php include('files/views/nav.view.php'); ?>
        <div id="toggle" class="pull-right"><a href="#"><img style="width:20px;" src="images/collapse3.png" alt="collapse" /></a></div>
      </ol>
      <div class="row">
        <div class="col-sm-12">
          <div class="alert alert-success">
            <center><strong>INFORMATION:</strong> <em>Handicap Index will be updated monthly.</em></center>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="page-header">
            <h2><?php include('files/views/header.view.php'); ?></h2>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="col-sm-12 canvas-custom">
            <?php include('files/views/modul.view.php'); ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
