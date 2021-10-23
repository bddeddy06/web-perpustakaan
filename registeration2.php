<?php  
   session_start();

    if ($_SESSION['auth'] != true) {
       header('location: index.php');
    }
?>

<?php
 
  include "koneksidb.php";
  // mencari kode barang dengan nilai paling besar
  $query = "SELECT max(idAdmin) as maxAdmin FROM t_admin2";
  $hasil = mysqli_query($koneksi,$query);
  $data = mysqli_fetch_array($hasil);
  $kodeAdmin = $data['maxAdmin'];

  $noUrut = (int) substr($kodeAdmin, 3, 3);
   
  $noUrut++;
   
  $char = "ADM";
  $kodeAdmin = $char . sprintf("%03s", $noUrut);

?>

<?php  
    echo '<link rel="stylesheet" href="assets/css/sweetalert2.css">';
    echo '<script src="assets/js/sweetalert2.all.js"></script>';
    include 'koneksidb.php';
    if (isset($_POST['simpan'])) {
    $id = $_POST['idadmin'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['passwd'];

    $tambah = mysqli_query($koneksi,"insert into t_admin2 (idAdmin, Nama, Alamat, Email, Username, Password) values ('$id','$nama','$alamat','$email','$username','$password')");

    
        
    if($tambah){    
        echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'SUCCESS',
                            position: 'top-end',
                            text:  'Berhasil Mendaftar',
                            type: 'success',
                            timer: 55500,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('registeration2.php');
             } ,3000); 
    </script>";
    }else {
        echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'GAGAL',
                            text:  'mysqli_error($koneksi);',
                            type: 'error',
                            timer: 3000,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('registeration.php');
             } ,3000); 
    </script>";
        
    }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registeration</title>
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
                <h2 style="color: white">Admin : Register Form</h2>
               
                <h5>( Register yourself to get access )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  New Admin ? Register Yourself </strong>  
                            </div>
                            <div class="panel-body">
                                <form action="" method="POST">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-file-o"  ></i></span>
                                            <input value="<?= $kodeAdmin ?>" name="idadmin" type="text" class="form-control" placeholder="Your ID" required="" oninvalid="this.setCustomValidity('Please Enter Your ID')"
                                                oninput="setCustomValidity('')" readonly/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input name="nama" type="text" class="form-control" placeholder="Your Name" required="" oninvalid="this.setCustomValidity('Please Enter Your Name')" oninput="setCustomValidity('')"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-home"  ></i></span>
                                            <input name="alamat" type="text" class="form-control" placeholder="Your Address" required="" oninvalid="this.setCustomValidity('Please Enter Your Address')" oninput="setCustomValidity('')"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input name="username" type="text" class="form-control" placeholder="Desired Username" required="" oninvalid="this.setCustomValidity('Please Enter Your Username')" oninput="setCustomValidity('')"/>
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input name="email" type="text" class="form-control" placeholder="Your Email" required="" oninvalid="this.setCustomValidity('Please Enter Your E-mail')" oninput="setCustomValidity('')"/>
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="passwd" type="password" class="form-control" placeholder="Enter Password" required="" oninvalid="this.setCustomValidity('Please Enter Your Password')" oninput="setCustomValidity('')"/>
                                        </div>
                                        <!-- Button trigger modal -->
                                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                        Register Me
                                      </button>

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
                                                  <p style="font-size: 16px">Are You Sure You Enter The Correct Data ? </p>
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
                                    Done Registered ?  <a href="main.php?file=admin" >admin form</a>
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
