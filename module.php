
<?php  
	$file = $_GET['file'];

	if ($file == "buku") {
		include "admin_buku.php";
	}elseif ($file == "beranda") {
		include "beranda.php";
	}elseif ($file == "admin") {
		include "admin_anggota.php";
	}elseif ($file == "anggota") {
		include "anggota.php";
	}elseif ($file == "peminjaman") {
		include "peminjaman_admin.php";
	}elseif ($file == "komentar") {
		include "komentar_anggota.php";
	}elseif ($file == "pengembalian") {
		include 'pengembalian_admin.php';
	}

?>