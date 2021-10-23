<?php
    session_start();
    echo '<link rel="stylesheet" href="assets/css/sweetalert2.css">';
    echo '<script src="assets/js/sweetalert2.all.js"></script>';
    include 'koneksidb.php';
    if(isset($_POST['login'])){
    $namauser = $_POST['username'];
    $passwd = $_POST['pass'];

    $login = mysqli_query($koneksi,"select * from t_admin2 where Username = '$namauser' and Password = '$passwd'");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
         echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'Oops...',
                            text:  'Username atau Password Salah',
                            type: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('main.php?file=beranda');
             } ,3000); 
        </script>";
        
        $user = mysqli_fetch_array($login);

        $_SESSION['username'] = $user['Username'];
        $_SESSION['auth'] = "login";   
  
    }else{
          echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'Oops...',
                            text:  'Username atau Password Salah',
                            type: 'error',
                            timer: 3000,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('login_admin.php');
             } ,3000); 
        </script>";
        
    }
  }

  if (!empty($_SESSION['auth'])) {
    header('location: main.php');
  }
?>
<?php  
  include 'koneksidb.php';

  if (isset($_POST['save'])) {
    $user = $_POST['user'];
    $pass = $_POST['passwd'];

    $query = "update t_admin2 set Password='$pass' where Username='$user'";

    $update = mysqli_query($koneksi,$query);

    if ($update) {
              echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'Good Job',
                            text:  'Berhasil Mengganti Password',
                            type: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('login_admin.php');
             } ,3000); 
</script>";
    }else{
              echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'Gagal',
                            text:  'Gagal Mengganti Password, Username dan Password tidak boleh kosong',
                            type: 'error',
                            timer: 3000,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('login_admin.php');
             } ,3000); 
</script>";
    }
  }
?>
<html>

<head>
  <meta charset="UTF-8">
  <title>LogIn Form</title>
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>  
      <link href="assets/css/bootstrap.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/cssloginadmin/style.css">

  
</head>

<body style="background: url('Gambar/adminlogin.jpg');">

  <div id="login-button" style="height: 200px; width: 200px">
  <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
  </img>
</div>
<div id="container" style="height: 260px; width: 500px                                                                                                                                                                              ">
  <h1>Log In</h1>
  <span class="close-btn">
    <img src="Gambar/close.png"></img>
  </span>

  <form action="" method="post">
    <input type="text" name="username" placeholder="Username" style="color: white">
    <input type="password" name="pass" placeholder="Password" style="color: white">
    <input type="submit" name="login" value="Login" class="btn-btn primary">
    <div id="remember-container">
      <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
      <span id="remember">Remember me</span>
      <span id="forgotten" style="color: white">Forgotten password</span>
    </div>
</form>
</div>

<!-- Forgotten Password Container -->
<div id="forgotten-container" style="height: 210px">
   <h1>Forgotten</h1>
  <span class="close-btn">
    <img src="Gambar/close.png"></img>
  </span>

  <form action="" method="post">
    <input type="text" name="user" placeholder="Username">
    <input type="password" name="passwd" placeholder="Password Baru">
    <input type="submit" name="save" value="Simpan" class="orange-btn">
</form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="assets/jsloginadmin/index.js"></script>




</body>

</html>
