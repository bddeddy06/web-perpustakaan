<?php  
    include 'koneksidb.php';
    $query = "SELECT max(id_Pengembalian) as maxKembali FROM t_pengembalian";
     $hasil = mysqli_query($koneksi,$query);
     $data = mysqli_fetch_array($hasil);
     $no_kembali = $data['maxKembali'];

     $noUrut = (int) substr($no_kembali, 3, 3);
       
     $noUrut++;
       
     $char = "KEM";
     $no_kembali = $char . sprintf("%03s", $noUrut);
?>

<?php  
        echo '<link rel="stylesheet" href="assets/css/sweetalert2.css">';
        echo '<script src="assets/js/sweetalert2.all.js"></script>';
        include 'koneksidb.php';
        $nomor = $_GET['nomor'];

           
            $tampil = "select * from t_peminjaman LEFT JOIN t_buku ON t_peminjaman.Idbuku_Pinjam = t_buku.idBuku";
            $query3 = mysqli_query($koneksi,$tampil);
            $hitung = mysqli_fetch_array($query3);
            $judul = $hitung['Judul'];
            
            $user = $hitung['User_Peminjam'];
            $idbuku = $hitung['Idbuku_Pinjam'];
            $jumlah = $hitung['Jumlah'];
            $kembali = $hitung['Tgl_Kembali'];
            
            $kembali2 = "2019-01-19";
            $denda = 5000;

        if (isset($_POST['kembali'])) {


            $sql = "insert into t_pengembalian set id_Pengembalian='$no_kembali', Peminjam='$user', id_Bukupinjam='$idbuku', Jumlah_K = 1, Tgl_kembaliawal='$kembali', Tgl_kembalibuku='$kembali2', Denda='$denda'";
            

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
                // echo " query salah";
                // echo mysqli_error($koneksi);
            }

        }
?>
<html>
    <head>
        <title>Menu Buku</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <!-- BOOTSTRAP STYLES-->
        
         <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />   
        <!-- CUSTOM STYLES-->
        
         <!-- GOOGLE FONTS-->
       <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
         <!-- TABLE STYLES-->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/sweetalert2.css">
    </head>
<body style="background-color: black; background-size: cover;">
<form action="" method="post">
            <!-- Button trigger modal -->
        <div class="col-md-12" align="center">
        <button style="margin-top: 50px; color: white; font-size: 40px; font-family: nabila;" type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
          Tampilkan Data Pengembalian
        </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Data-Data Pengembalian Berikut Benar ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="color: black">
                  Apakah anda akan mengembalikan Buku dengan data sebagai berikut ? 
                  <table style="color: black">
                      <tr>
                          <td>No Pinjam </td>
                          <td>: </td>
                          <td><?php echo $nomor; ?></td>
                      </tr>
                      <tr>
                          <td>Judul </td>
                          <td>: </td>
                          <td><?php echo $judul; ?></td>
                      </tr>
                  </table>
              </div>
              <div class="modal-footer">
                <a href="main.php?file=peminjaman"><button type="button" class="btn btn-danger" data-dismiss="modal">Salah</button></a>
                <button type="submit" class="btn btn-primary" name="kembali">Benar</button>
              </div>
            </div>
          </div>
        </div>
</form>
<script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.dropotron.min.js"></script>
            <script src="assets/js/browser.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
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