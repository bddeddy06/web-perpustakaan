<?php  
   session_start();

    if ($_SESSION['auth'] != "login") {
       header('location: index.php');
    }
?>

<?php
 
  include "koneksidb.php";
  // mencari kode barang dengan nilai paling besar
  $query = "SELECT max(idBuku) as maxBuku FROM t_buku";
  $hasil = mysqli_query($koneksi,$query);
  $data = mysqli_fetch_array($hasil);
  $kodeBuku = $data['maxBuku'];

  $noUrut = (int) substr($kodeBuku, 3, 3);
   
  $noUrut++;
   
  $char = "BK";
  $kodeBuku = $char . sprintf("%03s", $noUrut);

?>
<?php  
    echo '<link rel="stylesheet" href="assets/css/sweetalert2.css">';
    echo '<script src="assets/js/sweetalert2.all.js"></script>';
    include 'koneksidb.php';
    if (isset($_POST['simpan'])) {
    $id = $_POST['idbuku'];
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $jumlah = $_POST['jumlah'];

    $tambah = mysqli_query($koneksi,"insert into t_buku (idBuku, Judul, Penerbit, Tahun_terbit, Jumlah) values ('$id','$judul','$penerbit','$tahun','$jumlah')");

        
    if($tambah){    
        echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'SUCCESS',
                            position: 'top-end',
                            text:  'Berhasil Menambahkan Buku',
                            type: 'success',
                            timer: 55500,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('tambah_buku.php');
             } ,3000); 
    </script>";
    }else {
        echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'GAGAL',
                            text:  'Gagal Menambahkan Buku',
                            type: 'error',
                            timer: 3000,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('tambah_buku.php');
             } ,3000); 
    </script>";
        
    }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Buku</title>
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
                <h2 style="color: white">Admin : Tambah Buku Form</h2>
               
                <h5>( Tambah buku untuk melengkapkan koleksi )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  Tambah Buku Baru </strong>  
                            </div>
                            <div class="panel-body">
                                <form action="" method="POST">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-star-o"  ></i></span>
                                            <input value="<?= $kodeBuku ?>" name="idbuku" type="text" class="form-control" placeholder="ID Buku" required="" oninvalid="this.setCustomValidity('Masukkan ID Buku')"
                                                oninput="setCustomValidity('')" readonly/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-book"  ></i></span>
                                            <input name="judul" type="text" class="form-control" placeholder="Judul Buku" required="" oninvalid="this.setCustomValidity('Masukkan Judul Buku')" oninput="setCustomValidity('')"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input name="penerbit" type="text" class="form-control" placeholder="Penerbit" required="" oninvalid="this.setCustomValidity('Masukkan Penerbit Buku')" oninput="setCustomValidity('')"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"  ></i></span>
                                            <select name="tahun" class="form-control">
                                              <option value="">Tahun Terbit</option>
                                                <?php
                                                $thn_skr = date('Y');
                                                for ($x = $thn_skr; $x >= 2000; $x--) {
                                                ?>
                                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input name="jumlah" type="text" class="form-control" placeholder="Jumlah Buku" required="" oninvalid="this.setCustomValidity('Masukkan Jumlah Buku')" oninput="setCustomValidity('')"/>
                                        </div>
                                        <!-- Button trigger modal -->
                                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                        Tambah buku
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
                                                  <p style="font-size: 16px">Apakah anda sudah yakin mengisi data buku secara tepat ? </p>
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
                                    Done Registered ?  <a href="main.php?file=buku" >admin_buku form</a>
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
