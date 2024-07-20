<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Laporan Data Ajar
		</h3>
	</div>

	<!-- <style>
		. {}
	</style> -->

	<?php
	// Load file koneksi.php
	include "koneksi.php";
	
	
	$query = "select tb_datapelajaran.*,tb_datasekolah.npsn,tb_datasekolah.namasekolah from tb_datapelajaran
	inner join tb_datasekolah on tb_datapelajaran.npsn =tb_datasekolah.npsn ";
	$url_cetak = "admin/dataajar/cetak.php";
	$label = "( Semua Data Ajar )";
	
	
	?>
	<div style="padding: 15px;">
		<form method="POST">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="form-group">
					</div>
				</div>
			</div>
		</form>
		<div>
			<h6 style="margin-left: auto;"><b>Laporan Data Ajar</b>
				<?php echo $label ?>
			</h6>
			<a href="<?php echo $url_cetak ?>">
				<button class="btn btn-success">Cetak PDF</button>
			</a>
		</div>
		<hr />
		<div class="card-body">
			<div class="table-responsive" style="margin-top: auto;">
				<br>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr style="background-color: #343A40; color :aliceblue;">
							<th>No</th>
						
							<th>Mata Pelajaran</th>
							<th>kurikulum</th>
							<th>Nama Sekolah</th>
							<th>Nama Guru</th>
							
							<th>tgl_mulai</th>
							<th>tgl_selesai</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
						$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
						if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
							while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
								echo "<tr>";
								echo "<td>" . $no++ . "</td>";
								
						
								echo "<td>" . $data['mapel'] . "</td>";
								
								echo "<td>" . $data['kurikulum'] . "</td>";
								echo "<td>" . $data['namasekolah'] . "</td>";
						
								
								echo "<td>" . $data['nama'] . "</td>";
								
								echo "<td>" . $data['tgl_mulai'] . "</td>";
								echo "<td>" . $data['tgl_selesai'] . "</td>";
								echo "</tr>";
							}
						} else { // Jika data tidak ada
							echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
						}
						?>
					</tbody>
					</tfoot>
				</table>
			</div>
		</div>
		<!-- Include File JS Bootstrap -->
		<script src="../assets/js/bootstrap.min.js"></script>
		<!-- Include library Bootstrap Datepicker -->
		<script src="../assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<!-- Include File JS Custom (untuk fungsi Datepicker) -->
		<script src="../assets/js/custom.js"></script>
		<script>
			$(document).ready(function() {
				setDateRangePicker(".nip", ".nip")
			})
		</script>
		</body>

		</html>