<?php  
   session_start();

    if ($_SESSION['auth'] != true) {
       header('location: index.php');
    } 
?>

<?php 
    $tanggal= mktime(date("m"),date("d"),date("Y"));
    date_default_timezone_set('Asia/Jakarta');
    $jam=date("H:i:s");
    $a = date ("H");
    $tampil = "";
    if (($a>=6) && ($a<=11)){
        $tampil = "WIB, Selamat Pagi !!";
    }
    else if(($a>11) && ($a<=15))
    {
        $tampil = "WIB, Selamat Siang !!";
    }

    else if (($a>15) && ($a<=18)){
        $tampil = "WIB, Selamat Sore !!";
    }else 
        { $tampil = "WIB, Selamat Malam !!";}

    $link = "main.php?file=beranda";
?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main Menu</title>
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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="main.php" style="font-size: 24px">Perpustakaan Web</a> 
            </div>
      <div style="color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;"><?php echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b>". "| Pukul : <b>". $jam." "."</b>". $tampil; ?><a style="margin-left: 20px" href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="Gambar/buku1.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a href="<?= $link; ?>"><i class="fa fa-dashboard fa-3x"></i> Beranda</a>
                    </li>
                      <li>
                        <a  href="main.php?file=buku"><i class="fa fa-book fa-3x"></i> Buku</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-3x"></i>Users <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                            <a  href="main.php?file=admin">Admin</a>
                            </li>
                            <li>
                            <a href="main.php?file=anggota">Anggota</a>
                            </li> 
                        </ul>
                    </li>						                   
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Transaksi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="main.php?file=peminjaman">Peminjaman buku</a>
                            </li>
                            <li>
                                <a href="main.php?file=pengembalian">Pengembalian buku</a>
                            </li>
                        </ul>
                      </li>
                      <li>
                        <a href="main.php?file=komentar"><i class="fa fa-comment fa-3x"></i>Komentar Anggota</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include "module.php"; ?>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
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
