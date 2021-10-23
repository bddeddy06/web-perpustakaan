<?php  
    session_start();
    //$_SESSION['auth'] == "login";
    if ($_SESSION['auth'] != "login") {
        header('location: index.php');
    }
?>


<!DOCTYPE HTML>
<!--
	Escape Velocity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Escape Velocity by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
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
	<body class="homepage is-preload">
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

			<!-- Intro -->
				<section id="intro" class="wrapper style1">
					<div class="title">APA ITU PERPUSTAKAAN ?</div>
					<div class="container">
						<p class="style1">Jadi, Jika Anda Ingin Mengetahui Apa Sebenarnya Perpustakaan Itu ?</p>
						<p class="style2">
							Menurut Wikipedia, Perpustakaan adalah ...
						</p>
						<p class="style3">sebuah koleksi buku dan majalah. Walaupun dapat diartikan sebagai koleksi pribadi perseorangan, namun perpustakaan lebih umum dikenal sebagai sebuah koleksi besar yang dibiayai dan dioperasikan oleh sebuah kota atau institusi, serta dimanfaatkan oleh masyarakat yang rata-rata tidak mampu membeli sekian banyak buku dengan biaya sendiri. </p>
						<ul class="actions">
							<li><a href="#" class="btn btn-warning btn-lg">Proceed</a></li>
						</ul>
					</div>
				</section>

			<!-- Main -->
				<section id="main" class="wrapper style2">
					<div class="title">KOLEKSI PERPUSTAKAAN</div>
					<div class="container">

						<!-- Image -->
							<a href="#" class="image featured">
								<img src="Gambar/library.jpg" alt="" />
							</a>

						<!-- Features -->
							<section id="features">
								<header class="style1">
									<h4>PERPUSTAKAAN KAMI MENGOLEKSI RIBUAN EKSAMPELAR BUKU DENGAN BERBAGAI MACAM KATEGORI</h4>
									<p>Berikut merupakan kategori - kategori buku yang tersedia</p>
								</header>
								<div class="feature-list">
									<div class="row">
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="icon fa-laptop">Koleksi Buku Komputer</h3>
												<p>Berisikan buku-buku yang menjelaskan tentang pengoperasian komputer, programming, networking, multimedia, dan lain-lain.</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="icon fa-university">Koleksi Buku Sekolah</h3>
												<p>Berisikan buku-buku tentang matematika, fisika, kimia, biologi, geografi, dan lain - lain.</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="icon fa-child">Koleksi Buku Anak</h3>
												<p>Berikan buku - buku tentang belajar membaca, berhitung, angka, huruf, mengenal warna, dan lain-lain.</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="icon fa-female">Koleksi Buku Wanita</h3>
												<p>Berisikan buku - buku panduan yang biasa ditujukan untuk seorang wanita seperti mengurus anak, mengurus rumah tangga, tentang menstruasi, haid, kehamilan, dan lain-lain</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="icon fa-usd">Koleksi Buku Ekonomi</h3>
												<p>Berisikan buku - buku yang menjelaskan tentang perekonomian seperti teknik bisnis, jual-beli, dan lain - lain.</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="icon fa-users">Koleksi Buku Agama</h3>
												<p>Berisikan buku - buku tentang agama seperti Al-Qur'an, Buku Tauhid, Fiqh, bahasa arab, Buku agama kristen, katholik, hindu, budha, konghucu, dan lain - lain.</p>
											</section>
										</div>
									</div>
								</div>
								<ul class="actions special">
									<li><a href="#" class="button style1 large">Get Started</a></li>
									<li><a href="#" class="button style2 large">More Info</a></li>
								</ul>
							</section>

					</div>
				</section>

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

			<!-- Footer -->
				<section id="footer" class="wrapper">
					<div class="title">TANYA KAMI</div>
					<div class="container">
						<header class="style1">
							<h2>Masih Bingung ? Anda Memiliki Pertanyaan tentang Perpustakaan Ini ? </h2>
							<p>
								Silahkan Kirim pesan dibwah ini atau<br />
								Anda Bisa menghubungi kami melalui kontak dibawah<br /><br><br>
								TERIMA KASIH TELAH BERKUNJUNG KE PERPUSTAKAAN WEB KAMI
							</p>
						</header>
						<div class="row">
							<div class="col-6 col-12-medium">

								<!-- Contact Form -->
									<section>
										<form method="post" action="#" style="color: black;">
											<div class="row gtr-50">
												<div class="col-6 col-12-small">
													<input type="text" name="namapengirim" id="contact-name" placeholder="Name" />
												</div>
												<div class="col-6 col-12-small">
													<input type="text" name="nohppengirim" id="contact-email" placeholder="No Handphone" />
												</div>
												<div class="col-12">
													<textarea name="pesan" id="contact-message" placeholder="Pesan" rows="4"></textarea>
												</div>
												<div class="col-12">
													<ul class="actions">
														<li><input style="height: 50px; width: 70px" type="submit" class="btn btn-success" value="Send" name="kirim" /></li>
														<li><input style="height: 50px; width: 70px" type="reset" class="btn btn-danger" value="Reset" /></li>
													</ul>
												</div>
											</div>
										</form>
									</section>
									<?php  
										include 'koneksidb.php';

										if (isset($_POST['kirim'])) {
											$namapengirim = $_POST['namapengirim'];
										$nohppengirim = $_POST['nohppengirim'];
										$pesan = $_POST['pesan'];
											$sql = "insert into t_komentar_anggota (Nama,No_HandPhone,Pesan) values ('$namapengirim','$nohppengirim','$pesan')";

											

											$tambah = mysqli_query($koneksi,$sql) or die($koneksi);

											if ($tambah) {
												echo "
									            <script type='text/javascript'>
									                 setTimeout(function () { 
									                 swal({
									                            title: 'SUCCESS',
									                            text:  'Pesan Terkirim',
									                            type: 'success',
									                            timer: 1500,
									                            showConfirmButton: false
									                        });  
									                 },10); 
									                 window.setTimeout(function(){ 
									                  window.location.replace('usermain.php');
									             } ,3000); 
									    		</script>";
											}else{
													echo "
										            <script type='text/javascript'>
										                 setTimeout(function () { 
										                 swal({
										                            title: 'GAGAL',
										                            text:  'Gagal Mengirim pesan',
										                            type: 'error',
										                            timer: 1500,
										                            showConfirmButton: false
										                        });  
										                 },10); 
										                 window.setTimeout(function(){ 
										                  window.location.replace('usermain.php');
										             } ,3000); 
										    	</script>";
											    }
											}
										
										

									?>

							</div>
							<div class="col-6 col-12-medium">

								<!-- Contact -->
									<section class="feature-list small">
										<div class="row">
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon fa-home">Mailing Address</h3>
													<p>
														Jalan Kelapa Tiga no.23<br />
														Panjitilar Negara<br />
														Mataram, NTB 83115
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon fa-comment">Social</h3>
													<p>
														<a href="#">@untitled-corp</a><br />
														<a href="#">linkedin.com/untitled</a><br />
														<a href="#">facebook.com/untitled</a>
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon fa-envelope">Email</h3>
													<p>
														<a href="#">1610530143@stmikbumigora.ac.id</a>
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon fa-phone">Phone</h3>
													<p>
														(000) 555-0000
													</p>
												</section>
											</div>
										</div>
									</section>

							</div>
						</div>
						<div id="copyright">
							<ul>
								<li>Copyright &copy; RBDLM.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</div>
				</section>

		</div>

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