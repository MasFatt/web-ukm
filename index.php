<?php
//Mulai Sesion
session_start();

if (isset($_SESSION["ses_username"]) == "") {
	//header("location: view/index.php");
	header("location: login.php");
	
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_status = $_SESSION["ses_status"];
}

//KONEKSI DB
include "inc/koneksi.php";


$sql = $koneksi->query("SELECT * from tb_profil");
while ($data = $sql->fetch_assoc()) {

	$nama = $data['ukm'];
	$nama = $data['nama_instansi'];
}
?>
<!-- <?php

		setlocale(LC_TIME, 'id_ID.utf8');

		$hariIni = new DateTime();

		?> -->


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DATA </title>
	<link rel="icon" href="dist/img/logo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-blue"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">


				<li class="nav-item d-none d-sm-inline-block">

					<a href="index.php" class="nav-link">
						<font color="white">
							<b>
								<?php echo $nama; ?>
							</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">

				<span class="brand-text"> SIMPRASKA</span>
			</a>


			<!-- Sidebar -->
			<div class="sidebar" style="background-image: linear-gradient(45deg, #996633, transparent)">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/img/user.png" class="img-circle elevation-1" alt="User Image">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_status; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- status  -->
						<?php
						if ($data_status == "Admin") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-anggota" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Data Anggota 

									</p>
								</a>
							</li>


							<li class="nav-item">
								<a href="?page=data-pembina" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Data Pembina

									</p>
								</a>
							</li>


							<li class="nav-item">
								<a href="?page=data-kdr" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Data KDR
									</p>
								</a>
							</li>


							<li class="nav-item">
								<a href="?page=data-kabag" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Data Kabag Racana

									</p>
								</a>
							</li>



							<li class="nav-item">
								<a href="?page=data-lpj" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Laporan Pertanggungjawaban

									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-penanggungjawab" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Data Penanggungjawab

									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-clipboard-list"></i>
									<p>
										Laporan
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>

							<li class="nav-item">
								<a href="?page=laporan-data_anggota" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Data Anggota</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=laporan-data_pembina" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Data Pembina</p>
								</a>
							</li>


							<li class="nav-item">
								<a href="?page=laporan-data_kdr" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Data KDR</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=laporan-datakabag" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Data Kabag Racana</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=laporan-data_lpj" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Data LPJ</p>
								</a>
							</li>

							</li>


							<li class="nav-header">Setting</li>
							<li class="nav-item">
								<a href="?page=data-profil" class="nav-link">
									<i class="nav-icon far fa fa-flag"></i>
									<p>
										Profil 
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pengguna" class="nav-link">
									<i class="nav-icon far fa-user"></i>
									<p>
										Pengguna Sistem
									</p>
								</a>
							</li>

						<?php
						} elseif ($data_status == "Anggota") {
						?>

                        <li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-anggota2" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Data Anggota 

									</p>
								</a>
							</li>


							<li class="nav-item">
								<a href="?page=data-pembina2" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Data Pembina

									</p>
								</a>
							</li>


							<li class="nav-item">
								<a href="?page=data-kdr2" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Data KDR
									</p>
								</a>
							</li>


							<li class="nav-item">
								<a href="?page=data-kabag2" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Data Kabag Racana

									</p>
								</a>
							</li>



							<li class="nav-item">
								<a href="?page=data-lpj2" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Laporan Pertanggungjawaban

									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-penanggungjawab2" class="nav-link">
									<i class="nav-icon far fa fa-users"></i>
									<p>
										Data Penanggungjawab

									</p>
								</a>
							</li>


							<li class="nav-header">Setting</li>

						<?php
						}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon far fa-circle text-danger"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {
								//Klik Halaman Home Pengguna
							case 'Admin':
								include "home/Admin.php";
								break;
							case 'Anggota':
								include "home/Anggota.php";
								break;


								//Asrama

								case 'data-Anggota':
									include "admin/data_anggota/data_anggota.php";
									break;
								case 'data-data_anggota':
									include "admin/data_anggota/data_anggota2.php";
									break;
								case 'add-data_anggota':
									include "admin/data_anggota/add_anggota.php";
									break;
								case 'edit-data_anggota':
									include "admin/data_anggota/edit_anggota.php";
									break;
								case 'del-data_anggota':
									include "admin/data_anggota/del_anggota.php"; 
									break;
								case 'status-data_anggota-verifikasi':
									include "admin/data_anggota/data_anggota_aktif.php";
									break;
								case 'update-status-data_anggota':
									include "admin/data_anggota/updateStatusanggota.php";
									break;
								case 'verify':
									include "admin/data_anggota/data_data_anggota_verifikasi.php";
									break;
								case 'not-verify':
									include "admin/data_anggota/data_anggota_tidak_aktif.php";
									break;
								case 'view-data_anggota':
									include "admin/data_anggota/view_anggota.php";
									break;
								case 'laporan-data_anggota':
									include "admin/data_anggota/laporan_data_anggota.php";
									break;
								case 'add-data_anggota2':
									include "admin/data_anggota/add_data_anggota2.php";
									break;
								case 'edit-data_anggota2':
									include "admin/data_anggota/edit_data_anggota2.php";
									break;
								case 'del-data_anggota2':
									include "admin/data_anggota/del_data_anggota2.php"; 
									break;
								case 'status-data_anggota-aktif2':
									include "admin/data_anggota/data_anggota_aktif2.php";
									break;
								case 'update-status-data_anggota2':
									include "admin/data_anggota/updateStatusdata_anggota2.php";
									break;
								case 'verify2':
									include "admin/data_anggota/data_data_anggota_verifikasi2.php";
									break;
								case 'not-verify2':
									include "admin/data_anggota/data_data_anggota_belum_diverifikasi2.php";
									break;
								case 'view-data_anggota2':
										include "admin/data_anggota/view_data_anggota2.php";
										break;


						

								//Pengguna
							case 'data-pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'add-pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'edit-pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'del-pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

								//Profil
							case 'data-profil':
								include "admin/profil/data_profil.php";
								break;
							case 'edit-profil':
								include "admin/profil/edit_profil.php";
								break;
								// laporan
							case 'data-laporan':
								include "admin/laporan/perpanjang.php";
								break;
							case 'cetak':
								include "admin/laporan/cetak.php";
								break;
								// laporan
							case 'data-report':
								include "report/cetak-data-member.php";
								break;
							// case 'cetak':
							// 	include "admin/laporan/cetak.php";
							// 	break;



								//default
							default:
								echo "<center><h1> ERROR !</h1></center>";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_status== "Admin") {
							include "home/Admin.php";
						} elseif ($data_status== "Anggota") {
							include "home/Anggota.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<span>Universitas Islam Kalimantan Muhammad Arsyad Al-Banjari Banjarmasin</span>

				<!-- All rights reserved. -->
			</div>
			<b>UKM PRAMUKA</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>