<?php    
    session_start();

        function dd($data){
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            die;
        }
    include "lib/class_db.php";
	?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SISTEM INFORMASI PEMBAYARAN SPP MELISA </title>
	<link rel="stylesheet" type="text/css" href="bootstrap5/css/bootstrap.min.css">

	<!-- <link rel="stylesheet" type="text/css" href="bootstrap5/css/bootstrap.min.css"> -->
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
		<a href='#' class="navbar-brand col-md-3 col-lg-2 meta-0 px-3"> APP SPP</a>
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a href="#" class="btn btn-danger"> Sign Out</a>
			</li>
		</ul>
	</nav>

	<div class="row">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2">
					<ul class="nav flex-column">
						<li class="nav-item bg-info border-bottom border-drak"> 
							<a href="?hal=kelas" class="nav-link text-light"><span data-feather="file"></span>Kelas</a>
						</li>
						<li class="nav-item bg-info border-bottom border-drak">
							<a href="?hal=petugas" class="nav-link text-light"><span data-feather="file"></span>Petugas</a>
						</li>
						<li class="nav-item bg-info border-bottom border-drak">
							<a href="?hal=siswa" class="nav-link text-light"><span data-feather="file"></span>Siswa</a>
						</li>
						<li class="nav-item bg-info border-bottom border-drak">
							<a href="?hal=spp" class="nav-link text-light"><span data-feather="file"></span>SPP</a>
						</li>
						<li class="nav-item bg-info border-bottom border-drak">
							<a href="?hal=pembayaran" class="nav-link text-light"><span data-feather="file"></span>Pembayaran</a>
						</li>
						<li class="nav-item bg-info border-bottom border-drak">
							<a href="login.php" class="nav-link text-light"><span data-feather="file"></span>Login</a>
						</li>
						<li class="nav-item bg-info border-bottom border-drak">
							<a href="logout.php" class="nav-link text-light"><span data-feather="file"></span>Logout</a>
						</li>
					</ul>
				</div>
				<div class="col-md-10">
					<!-- Isi Konten <br> -->
					<?php
					     $hal=$fg->get("hal");
					     if(!empty($hal)){
					     	include "page/".strtolower($hal).".php";
					     }
					    
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html> 