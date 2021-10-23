<?php

//Database initialization
include 'koneksidb.php';
echo '<link rel="stylesheet" href="assets/css/sweetalert2.css">';
echo '<script src="assets/js/sweetalert2.all.js"></script>';
$result2 = mysqli_query($koneksi,"select * from t_admin2 order by idAdmin");

if(isset($_POST["loadbtn"]))
{
    $id = $_POST["idadmin"];

    $query = "SELECT * FROM t_admin2 WHERE idAdmin = '$id' ";
    $result = mysqli_query($koneksi,$query);
    $details = mysqli_fetch_array($result);
    if($id == " "){
         $savedId = " ";    
    $savedNama = " ";
    $savedAlamat = " ";
    $savedEmail = " ";
    $savedUsername = " ";
}else{
    $savedId = $details["idAdmin"];    
    $savedNama = $details["Nama"];
    $savedAlamat = $details["Alamat"];
    $savedEmail = $details["Email"];
    $savedUsername = $details["Username"];
}
}else{
    $savedId = " ";    
    $savedNama = " ";
    $savedAlamat = " ";
    $savedEmail = " ";
    $savedUsername = " ";
}

if (isset($_POST['simpan'])) {

    $id = $_POST['idadmin'];
    $id2 = $_POST['idadmin2'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $query = "UPDATE t_admin2 SET Nama = '$nama', Alamat = '$alamat', Username = '$username', Email = '$email' WHERE idAdmin = '$id2'";
    $update = mysqli_query($koneksi,$query);

    $query2 = "UPDATE t_login SET username = '$username' WHERE idAdmin = '$id2'";
    if($update){
        session_start();
        if($id2 == " "){
        echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'GAGAL',
                            text:  'Gagal Mengupdate, Form belum terisi sempurna',
                            type: 'error',
                            timer: 3000,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('Update_admin.php');
             } ,3000); 
            </script>";
        }else{
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
                  window.location.replace('Update_admin.php');
             } ,3000); 
    </script>";
        }
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
                  window.location.replace('Update_admin.php');
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
                
                <h2 style="color: white">Update Admin</h2>
               
                <h5>( Update Admin data Here )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  Update Admin </strong>  
                            </div>
                            <div class="panel-body">
                                <form action="" name="upServForm" method="POST">
                                    <?php

                                        $dropdown = "<select class='form-control' name='idadmin' style='margin-bottom: 20px; margin-top: 20px'><option value=' '></option>";
                                        while($row = mysqli_fetch_assoc($result2)) 
                                        {
                                            $dropdown .= "<option value='{$row['idAdmin']}'>{$row['idAdmin']}</option>";
                                        }
                                        $dropdown .= "</select>";
                                    ?>
                                    ID Admin  <?php echo $dropdown; ?> <input type="submit" value="Load" name="loadbtn" class="btn btn-success" style="margin-bottom: 20px">   
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-file-o"  ></i></span>
                                            <input value="<?= $savedId; ?>" name="idadmin2" id="idadmin" type="text" class="form-control" readonly/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input value="<?= $savedNama; ?>" name="nama" type="text" class="form-control" placeholder="Your Name" required="" oninvalid="this.setCustomValidity('Please Enter Your Name')" oninput="setCustomValidity('')"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-home"  ></i></span>
                                            <input value="<?= $savedAlamat; ?>" name="alamat" type="text" class="form-control" placeholder="Your Address" required="" oninvalid="this.setCustomValidity('Please Enter Your Address')" oninput="setCustomValidity('')"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input value="<?= $savedUsername; ?>" name="username" type="text" class="form-control" placeholder="Desired Username" required="" oninvalid="this.setCustomValidity('Please Enter Your Username')" oninput="setCustomValidity('')"/>
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input value="<?= $savedEmail; ?>" name="email" type="text" class="form-control" placeholder="Your Email" required="" oninvalid="this.setCustomValidity('Please Enter Your E-mail')" oninput="setCustomValidity('')"/>
                                        </div>
                                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                        Save Changes
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
                                                  <p style="font-size: 16px">Are You Sure You Enter The Correct Data Update ? </p>
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
                                    Update Done ?  <a href="main.php?file=admin" >Admin Form here</a>
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
