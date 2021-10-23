<?php  

    if ($_SESSION['auth'] != true) {
        header('location: index.php');
    }
?>

<?php  
    if (isset($_POST['hapus'])) {        include 'koneksidb.php';
        $id = $_POST['idbuku'];
        $sql = "delete from t_buku where idBuku = '$id'";

        $query = mysqli_query($koneksi,$sql);

        if ($query) {
            echo "<script> alert('Berhasil dihapus')</script>";
        }else{
            echo "<script> alert('Gagal dihapus')</script>";
        }

    }

?>
<html>
<head>
    <title>Menu Buku</title>
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
                        <h2>Menu Admin Buku</h2>   
                        <h5>Penambahan, Pengubahan, dan Penghapusan buku dilakukan disini. </h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #428bca; color: white">
                            Daftar Buku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" contenteditable="true">
                                    <thead>
                                        <tr>
                                            <th>Id Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Jumlah Eksampelar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                            include 'koneksidb.php';

                                            $tampil = "select * from t_buku";
                                            $tampil_data = mysqli_query($koneksi,$tampil);

                                            while ($data = mysqli_fetch_array($tampil_data)) {
                                                echo "<tr>";
                                                echo "<td>". $data['idBuku']. "</td>";
                                                echo "<td>". $data['Judul']. "</td>";
                                                echo "<td>". $data['Penerbit']. "</td>";
                                                echo "<td>". $data['Tahun_terbit']. "</td>";
                                                echo "<td>". $data['Jumlah']. "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <div style="padding-bottom: 20px">
                                    <form action="" method="post">
                                    <a href="tambah_buku.php"><button class="btn btn-primary" type="button">tambah</button></a>
                                    <button class="btn btn-info" type="submit">Ubah</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                      Hapus
                                    </button>
                                    <form action="" method="POST">
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">DELETE BUKU</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            Select ID Buku you are gonna delete
                                            <select name="idbuku" class="form-control" style="margin-top: 10px">
                                                <?php
                                                    $sql2 = "select idBuku from t_buku";
                                                    $query2 = mysqli_query($koneksi,$sql2);
                                                    while ($data = mysqli_fetch_array($query2)) {
                                                          echo "<option value='{$data['idBuku']}'>
                                                          {$data['idBuku']}</option>";
                                                      }  
                                                    
                                                ?>
                                            </select>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="hapus">Delete</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    </form>
                                </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
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
