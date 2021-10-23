<?php  
    session_start();
    //$_SESSION['auth'] == "login";
    if ($_SESSION['auth'] != "login") {
        header('location: index.php');
    }
?>
<?php  
    session_start();
    echo '<link rel="stylesheet" href="assets/css/sweetalert2.css">';
    echo '<script src="assets/js/sweetalert2.all.js"></script>';
    include 'koneksidb.php';
    $user = $_SESSION['username'];
    $query = "SELECT * FROM t_anggota WHERE Username = '$user' ";
    $result = mysqli_query($koneksi,$query);
    $details = mysqli_fetch_array($result);
    $id = $details['idAnggota'];
    $nama = $details['Nama'];
    $alamat = $details['Alamat'];
    $username = $details['Username'];
    $email = $details['Email'];

    if (isset($_POST['simpan'])) {

    $id2 = $_POST['idanggota'];
    $nama2 = $_POST['nama'];
    $alamat2 = $_POST['alamat'];
    $username2 = $_POST['username'];
    $email2 = $_POST['email'];

    $query2 = "UPDATE t_anggota SET Nama='$nama2',Alamat='$alamat2',Username='$username2',Email='$email2' where Username = '$user'";
    $update = mysqli_query($koneksi,$query2) or die(mysqli_error($koneksi));

    $query3 = "UPDATE t_login SET username='$username2' where idAdmin = '$id2' AND status = 'user'";
    $update2 = mysqli_query($koneksi,$query3);
    
    if($update){    
        echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'SUCCESS',
                            position: 'top-end',
                            text:  'Berhasil Mengupdate',
                            type: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('login.php');
             } ,3000); 
    </script>";
    }else {
        echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'GAGAL',
                            text:  'Gagal Mengupdate',
                            type: 'error',
                            timer: 3000,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('update_anggota.php');
             } ,3000); 
    </script>";
        
    }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Member</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style="background-image: url('Gambar/register.jpg');">
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2 style="color: white">Member : Update Form</h2>
               
                <h5>( Update YOur Self )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  New Data ? Update Yourself </strong>  
                            </div>
                            <div class="panel-body">
                                <form action="" method="POST">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-file-o"  ></i></span>
                                            <input name="idanggota" type="text" class="form-control" value="<?= $id; ?>" readonly/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input value="<?= $nama; ?>" name="nama" type="text" class="form-control" placeholder="Your Name" required="" oninvalid="this.setCustomValidity('Please Enter Your Name')" oninput="setCustomValidity('')"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-home"  ></i></span>
                                            <input value="<?= $alamat; ?>" name="alamat" type="text" class="form-control" placeholder="Your Address" required="" oninvalid="this.setCustomValidity('Please Enter Your Address')" oninput="setCustomValidity('')"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input value="<?= $username; ?>" name="username" type="text" class="form-control" placeholder="Desired Username" required="" oninvalid="this.setCustomValidity('Please Enter Your Username')" oninput="setCustomValidity('')"/>
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input value="<?= $email; ?>" name="email" type="text" class="form-control" placeholder="Your Email" required="" oninvalid="this.setCustomValidity('Please Enter Your E-mail')" oninput="setCustomValidity('')"/>
                                        </div>
                                        <!-- Button trigger modal -->
                                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                        Save Changes
                                      </button>
                                      <a href="usermain.php"><button type="button" class="btn btn-danger">Kembali</button></a>

                                     <form action="" method="POST">
                                          <!-- Modal -->
                                          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title" id="exampleModalCenterTitle">REMINDER</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <p style="font-size: 16px">Are You Sure You Filed The Correct Data ? </p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                  <input type="submit" class="btn btn-success" name="simpan" value="Yes! I'm Sure">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </form>
                                    <hr />
                                    
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
