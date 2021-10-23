<?php  


    if ($_SESSION['auth'] != true) {
       header('location: index.php');
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
                        <h2>Menu Peminjaman Buku</h2>   
                        <h5>Semua buku yang dipinjam terdata disini. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #428bca; color: white">
                             Daftar Buku Yang dipinjam
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Nomor Pinjam</th>
                                            <th style="text-align: center;">User_Peminjam</th>
                                            <th style="text-align: center;">Id Buku yang Dipinjam</th>
                                            <th style="text-align: center;">Judul</th>
                                            <th style="text-align: center;">Jumlah</th>
                                            <th style="text-align: center;">Tanggal Pinjam</th>
                                            <th style="text-align: center;">Tanggal Kembali</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody style='text-align: center;'>
                                        <form action="" method="post">
                                        <?php  
                                            include 'koneksidb.php';

                                            $tampil = "select * from t_peminjaman LEFT JOIN t_buku ON t_peminjaman.Idbuku_Pinjam = t_buku.idBuku";
                                            $tampil_data = mysqli_query($koneksi,$tampil);

                                            

                                            while ($data = mysqli_fetch_array($tampil_data)) {
                                                echo "<tr>";
                                                echo "<td>". $data['NoPinjam']. "</td>";
                                                echo "<td>". $data['User_Peminjam']. "</td>";
                                                echo "<td>". $data['Idbuku_Pinjam']. "</td>";
                                                echo "<td>". $data['Judul']. "</td>";
                                                echo "<td>". $data['Jumlah_Pinjam']. "</td>";
                                                echo "<td>". $data['Tgl_Pinjam']. "</td>";
                                                echo "<td>". $data['Tgl_Kembali']. "</td>";
                                                echo "<td><a href='proseskembali.php?nomor=$data[NoPinjam]'<button style='height: 40px; font-size: 14px;' type='button' class='btn btn-primary btn-sm' name='kembali'>Kembalikan</button></a></td>";
                                                echo "</tr>";
                
                                            }
                                        ?>
                                        </form>

                                    </tbody>
                                </table>
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
