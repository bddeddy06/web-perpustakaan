<?php  
   session_start();

    if ($_SESSION['auth'] != true) {
       header('location: index.php');
    }
?>
<?php  
	include 'koneksidb.php';
	echo '<link rel="stylesheet" href="assets/css/sweetalert2.css">';
	echo '<script src="assets/js/sweetalert2.all.js"></script>';

	 $query = "SELECT max(NoPinjam) as maxPinjam FROM t_peminjaman";
	 $hasil = mysqli_query($koneksi,$query);
	 $data = mysqli_fetch_array($hasil);
	 $no_pinjam = $data['maxPinjam'];

	 $noUrut = (int) substr($no_pinjam, 3, 3);
	   
	 $noUrut++;
	   
	 $char = "PJM";
	 $no_pinjam = $char . sprintf("%03s", $noUrut);

	$id = $_GET['id'];
	$sql = "select * from t_buku where idBuku = '$id'";
	$query = mysqli_query($koneksi,$sql);
	$data = mysqli_fetch_array($query);
	$user = $_SESSION['username'];              
	$hariini= mktime(date("m"),date("j"),date("Y"));
	$pinjam = date("Y-m-d", $hariini);
	$tujuh_hari = mktime(0,0,0,date("m"),date("j")+7,date("Y"));
	$kembali = date("Y-m-d", $tujuh_hari);
	$idbuku = $data['idBuku'];
	$judul = $data['Judul'];

	$jumlah = 1;
	if (isset($_POST['simpan'])) {
		$query = "insert into t_peminjaman set NoPinjam = '%s', User_Peminjam = '%s', Idbuku_Pinjam = '%s', Jumlah_Pinjam = '%s', Tgl_Pinjam = '%s', Tgl_Kembali = '%s'";

	    $query = sprintf($query,$no_pinjam,$user,$idbuku,$jumlah,$pinjam,$kembali);

	    $tambah = mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	    if ($tambah) {
	    	echo "
            <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'SUCCESS',
                            position: 'top-end',
                            text:  'Berhasil Meminjam Buku',
                            type: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('userbuku.php');
             } ,3000); 
    		</script>";
	    }else{
	    // 	echo "
     //        <script type='text/javascript'>
     //             setTimeout(function () { 
     //             swal({
     //                        title: 'GAGAL',
     //                        text:  'Gagal Meminjam Buku',
     //                        type: 'error',
     //                        timer: 1500,
     //                        showConfirmButton: false
     //                    });  
     //             },10); 
     //             window.setTimeout(function(){ 
     //              window.location.replace('userbuku.php');
     //         } ,3000); 
    	// </script>";
	    // }
	    	
	}}

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
<body style="background: url(Gambar/backpinjam.jpg); background-size: cover;">
<form action="" method="post">
			<!-- Button trigger modal -->
		<div class="col-md-12" align="center">
		<button style="margin-top: 50px; color: white; font-size: 40px; font-family: nabila;" type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
		  Tampilkan Data Peminjaman
		</button>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Apakah Data-Data Peminjaman Berikut Benar ?</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body" style="color: black">
		      	Data - data peminjaman adalah sebagai berikut.<br><br>
		      	<table style="color: black">
		      		<tr>
		      			<td>User Peminjam </td>
		      			<td>: </td>
		      			<td><?php echo $user; ?></td>
		      		</tr>
		      		<tr>
		      			<td>Id Buku </td>
		      			<td>: </td>
		      			<td><?php echo $id; ?></td>
		      		</tr>
		      		<tr>
		      			<td>Judul Buku </td>
		      			<td>: </td>
		      			<td><?php echo $judul; ?></td>
		      		</tr>
		      	</table>
		      </div>
		      <div class="modal-footer">
		        <a href="userbuku.php"><button type="button" class="btn btn-danger" data-dismiss="modal">Salah</button></a>
		        <button type="submit" class="btn btn-primary" name="simpan">Benar</button>
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