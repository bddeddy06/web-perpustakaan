<?php  
    session_start();
    //$_SESSION['auth'] == "login";
    if ($_SESSION['auth'] != "login") {
        header('location: index.php');
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
	<body  style="color: black">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" class="wrapper">

					<!-- Logo -->
						<div id="logo">
							<h1><a href="usermain.php">Perpustakaan Web</a></h1>
							<p style="font-size: 12px">Mengoleksi Berbagai Macam Buku Untuk Anda Pinjam</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="usermain.php">Beranda</a></li>
								<li><a href="userbuku.php">Buku</a></li>
								<li><a href="peminjaman.php">Peminjaman</a></li>
								<li><a href="pengembalian.php">Pengembalian</a></li>
								<li>
									<a href="#">User Login : <?php echo $_SESSION['username'] ?></a>
									<ul>
										<li><a href="update_anggota.php">Edit Profil</a></li>
										<li><a href="logout.php">Logout</a></li>
									</ul>
								</li>
							</ul>
						</nav>

				</section>

			<!-- Main -->
				<div id="main" class="wrapper style2">
					<div class="title">Menu Pengembalian</div>
					<div class="container">

						<!-- Content -->
							<div id="content">
								<article class="box post">
									<header class="style1">
										<h2>DAFTAR - DAFTAR KEMBALI<br class="mobile-hide" /></h2>
										<p>Buku - buku yang sudah anda kembalikan bisa dilihat disini</p>
									</header>

									<table class="table table-striped table-bordered table-hover table-dark" id="dataTables-example">
                                    <thead style="text-align: center;">
                                        
                                            <th>Nomor Pengembalian</th>
                                            <th>User_Peminjam</th>
                                            <th>Id Buku yang Dipinjam</th>
                                            <th>Judul</th>
                                            <th>Tanggal Kembali Seharusnya</th>
                                            <th>Tanggal di Kembalikan</th>
                                            <th>Denda</th>                                        
                                    </thead>
                                    <tbody align="center">
                                        <?php  
                                            include 'koneksidb.php';
                                            $user = $_SESSION['username'];
                                            $tampil = "select * from t_pengembalian LEFT JOIN t_buku ON t_pengembalian.id_Bukupinjam = t_buku.idBuku where Peminjam = '$user'";
                                            $tampil_data = mysqli_query($koneksi,$tampil); 


                                            while ($data = mysqli_fetch_array($tampil_data)) {

                                                echo "<tr>";
                                                echo "<td>". $data['id_Pengembalian']. "</td>";
                                                echo "<td>". $data['Peminjam']. "</td>";
                                                echo "<td>". $data['id_Bukupinjam']. "</td>";
                                                echo "<td>". $data['Judul']. "</td>";
                                                echo "<td>". $data['Tgl_kembaliawal']. "</td>";
                                                echo "<td>". $data['Tgl_kembalibuku']. "</td>";
                                                echo "<td>". $data['Denda']. "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
									
								</article>
							</div>

					</div>
				</div>

			<!-- Highlights -->
				<section id="highlights" class="wrapper style3">
					<div class="title">The Endorsements</div>
					<div class="container">
						<div class="row aln-center">
							<div class="col-4 col-12-medium">
								<section class="highlight">
									<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
									<h3><a href="#">Aliquam diam consequat</a></h3>
									<p>Eget mattis at, laoreet vel amet sed velit aliquam diam ante, dolor aliquet sit amet vulputate mattis amet laoreet lorem.</p>
									<ul class="actions">
										<li><a href="#" class="button style1">Learn More</a></li>
									</ul>
								</section>
							</div>
							<div class="col-4 col-12-medium">
								<section class="highlight">
									<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
									<h3><a href="#">Nisl adipiscing sed lorem</a></h3>
									<p>Eget mattis at, laoreet vel amet sed velit aliquam diam ante, dolor aliquet sit amet vulputate mattis amet laoreet lorem.</p>
									<ul class="actions">
										<li><a href="#" class="button style1">Learn More</a></li>
									</ul>
								</section>
							</div>
							<div class="col-4 col-12-medium">
								<section class="highlight">
									<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
									<h3><a href="#">Mattis tempus lorem</a></h3>
									<p>Eget mattis at, laoreet vel amet sed velit aliquam diam ante, dolor aliquet sit amet vulputate mattis amet laoreet lorem.</p>
									<ul class="actions">
										<li><a href="#" class="button style1">Learn More</a></li>
									</ul>
								</section>
							</div>
						</div>
					</div>
				</section>


		

		<!-- Scripts -->
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