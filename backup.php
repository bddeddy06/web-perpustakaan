<?php  
        echo '<link rel="stylesheet" href="assets/css/sweetalert2.css">';
        echo '<script src="assets/js/sweetalert2.all.js"></script>';
        include 'koneksidb.php';
        $nomor = $_GET['nomor'];

        if ($_SESSiON['kembali'] = "kembali") {
            
           
            $tampil = "select * from t_peminjaman LEFT JOIN t_buku ON t_peminjaman.Idbuku_Pinjam = t_buku.idBuku where NoPinjam = '$nomor'";
            $query3 = mysqli_query($koneksi,$tampil);
            $hitung = mysqli_fetch_array($query3);
            $id = "PNG001";
            $user = $hitung['User_Peminjam'];
            $idbuku = $hitung['Idbuku_Pinjam'];
            $jumlah = $hitung['Jumlah'];
            $kembali = $hitung['Tgl_Kembali'];
            $kembali2 = "2019-01-19";
            $denda = 5000;

            $sql = "insert into t_pengembalian set id_Pengembalian='%s', Peminjam='%s', id_Bukupinjam='%s', Jumlah='%s', Tgl_kembaliawal='%s', Tgl_kembalibuku='%s', Denda='%s'";
            $sql = sprintf($sql,$id,$user,$idbuku,$jumlah,$kembali,$kembali2,$denda);
            
            $query = mysqli_query($koneksi,$sql);

            $sql2 = "delete from t_peminjaman where NoPinjam = '$nomor'";
            $query2 = mysqli_query($koneksi,$sql2);

            if ($query) {
                echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'SUCCESS',
                            position: 'top-end',
                            text:  'Berhasil Mengembalikan',
                            type: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('main.php?file=pengembalian');
             } ,3000); 
            </script>";
            }else{
                echo mysqli_error($koneksi);
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
                        <h2>Menu Pengembalian Buku</h2>   
                        <h5>Semua buku yang dikembalikan terdata disini. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #428bca; color: white">
                             Daftar Buku Yang dikembalikan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor Pengembalian</th>
                                            <th>User_Peminjam</th>
                                            <th>Id Buku yang Dipinjam</th>
                                            <th>Judul</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Kembali Seharusnya</th>
                                            <th>Tanggal di Kembalikan</th>
                                            <th>Denda</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                            include 'koneksidb.php';

                                            $tampil = "select * from t_pengembalian LEFT JOIN t_buku ON t_pengembalian.id_Bukupinjam = t_buku.idBuku";
                                            $tampil_data = mysqli_query($koneksi,$tampil); 

                                            while ($data = mysqli_fetch_array($tampil_data)) {

                                                echo "<tr>";
                                                echo "<td>". $data['id_Pengembalian']. "</td>";
                                                echo "<td>". $data['Peminjam']. "</td>";
                                                echo "<td>". $data['id_Bukupinjam']. "</td>";
                                                echo "<td>". $data['Judul']. "</td>";
                                                echo "<td>". $data['Jumlah']. "</td>";
                                                echo "<td>". $data['Tgl_kembaliawal']. "</td>";
                                                echo "<td>". $data['Tgl_kembalibuku']. "</td>";
                                                echo "<td>". $data['Denda']. "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
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
