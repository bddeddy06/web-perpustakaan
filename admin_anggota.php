<?php  
   

    if ($_SESSION['auth'] != true) {
       header('location: index.php');
    }
?>
<?php  
    //Database initialization
include 'koneksidb.php';
echo '<link rel="stylesheet" href="assets/css/sweetalert2.css">';
echo '<script src="assets/js/sweetalert2.all.js"></script>';
$result2 = mysqli_query($koneksi,"select idAdmin from t_admin2 order by idAdmin");

if (isset($_POST['btndelete'])) {
    $id = $_POST['idadmin'];
    $query = "DELETE from t_admin2 WHERE idAdmin = '$id'";
    $query2 = "DELETE from t_login WHERE idAdmin = '$id'";
    $delete = mysqli_query($koneksi,$query);
    $delete2 = mysqli_query($koneksi,$query2);

    if($delete){
        session_start();

        echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'DELETED!',
                            text:  'Your file has been deleted',
                            type: 'success',
                            timer: 1000,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('main.php?file=admin');
             } ,3000); 
    </script>";
    }
}
?>
<html>
<head>
    <title>Menu Anggota</title>
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
    <link rel="stylesheet" href="assets/css/sweetalert2.css">
</head>
<body>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Menu Admin</h2>   
                        <h5>Data - data tentang anggota admin perpustakaan </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Admin
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Admin</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>E-mail</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                            include 'koneksidb.php';

                                            $tampil = "select * from t_admin2";
                                            $tampil_data = mysqli_query($koneksi,$tampil);

                                            while ($data = mysqli_fetch_array($tampil_data)) {
                                                echo "<tr>";
                                                echo "<td>". $data['idAdmin']. "</td>";
                                                echo "<td>". $data['Nama']. "</td>";
                                                echo "<td>". $data['Alamat']. "</td>";
                                                echo "<td>". $data['Email']. "</td>";
                                                echo "<td>". $data['Username']. "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <div style="padding-bottom: 20px">
                                    <a href="registeration2.php"><button class="btn btn-primary" type="submit">Tambah</button></a>
                                    <a href="Update_admin.php"><button class="btn btn-warning" type="submit">Ubah</button></a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                      Hapus
                                    </button>
                                    <form action="" method="POST">
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">DELETE ADMIN</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            Select Admin ID you are gonna delete
                                            <select name="idadmin" class="form-control" style="margin-top: 10px">
                                                <?php
                                                    while ($data = mysqli_fetch_array($result2)) {
                                                          echo "<option value='{$data['idAdmin']}'>
                                                          {$data['idAdmin']}</option>";
                                                      }  
                                                    
                                                ?>
                                            </select>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="btndelete">Delete</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
              
             <!-- /. PAGE INNER  -->
            </div>
        </div>
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
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable( {
                "lengthMenu" : [5, 10, 15, 20]
            });
        });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    
   
</body>
</html>