
<?php
    session_start();
    echo '<link rel="stylesheet" href="assets/css/sweetalert2.css">';
    echo '<script src="assets/js/sweetalert2.all.js"></script>';
    include 'koneksidb.php';
    if(isset($_POST['login'])){
    $namauser = $_POST['username'];
    $passwd = $_POST['password'];

    $login = mysqli_query($koneksi,"select * from t_anggota where Username = '$namauser' and Password = '$passwd'");
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
                  window.location.replace('usermain.php');
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
                  window.location.replace('login.php');
             } ,3000); 
        </script>";
        
    }
  }

  if (!empty($_SESSION['auth'])) {
    header('location: usermain.php');
  }
?>
<?php  
  include 'koneksidb.php';

  if (isset($_POST['save'])) {
    $user = $_POST['user'];
    $pass = $_POST['passwd'];

    $query = "update t_anggota set Password='$pass' where Username='$user'";

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
                  window.location.replace('login.php');
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
                  window.location.replace('login.php');
             } ,3000); 
</script>";
    }
  }
?>
<html>
<head>
    <title> Login Form </title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"> 
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/sweetalert2.css">
      <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />   
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    
</head>
    <body>
    <div class="login-box">
    <img src="Gambar/avatar.png" class="avatar" style="background-color: #FAEBD0">
        <h1>Login Here</h1>
            <form action="" method="POST">
            <p>Username</p>
            <input type="text" name="username" id="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" id="password" placeholder="Enter Password">
            <button type="submit" class="btn btn-primary btn-sm btn-lg btn-block" value="Login" style="background-color: #6697a7" name="login">Login Now</button>
            <br>

            
            <hr>
            Not Register ? <a name="daftar" href="registeration.php" style="color: #1c8adb">Click here</a>
            <!-- Button trigger modal -->
              <button style="margin-left: 60px" type="button" class="btn btn-danger btn-sm" data-toggle="modal"  data-target="#exampleModalCenter">
                Lupa password ?
              </button>

            </form>
        </div>
            <form action="" method="POST">
              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Username : <br><input name="user" type="text" class="form-control" placeholder="Enter Your Username" required="" oninvalid="this.setCustomValidity('Please Enter Your Username')" oninput="setCustomValidity('')"/><br>
                      New Password : <br><input name="passwd" type="text" class="form-control" placeholder="Enter Your New Password" required="" oninvalid="this.setCustomValidity('Please Enter Your New Password')" oninput="setCustomValidity('')"/><br>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input name="save" type="submit" class="btn btn-primary" value="Save Changes"></button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
        
                 <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/sweetalert2.all.js"></script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    </body>
</html>