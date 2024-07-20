<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

		<?php
	
	include 'koneksi.php';
 
	$query = mysqli_query($koneksi, "SELECT max(id_kdr) as kodeTerbesar FROM tb_kdr");
	$data = mysqli_fetch_array($query);
	$id_kdr = $data['kodeTerbesar'];
 
	
	$urutan = (int) substr($id_kdr, 3, 3);
	$urutan++;
 
	$huruf = "P";
	$id_kdr = $huruf . sprintf("%03s", $urutan);
	?>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID KDR</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" id="id_kdr" name="id_kdr" placeholder="id_kdr" required="required" value="<?php echo $id_kdr ?>" readonly>
				
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAR</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nar" name="nar" placeholder="nar" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lengkap</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-5">
					<select name="jabatan" id="jabatan" class="form-control">
						<option>- Pilih -</option>
						<option>KDR Putra</option>
						<option>KDR Putri</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Periode</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="periode" name="periode" placeholder="periode" required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto KDR</label>
				<div class="col-sm-6">
					<input type="file" id="foto" name="foto">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-kdr" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
$sumber = @$_FILES['foto']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['foto']['name'];
$pindah = move_uploaded_file($sumber, $target . $nama_file);

if (isset($_POST['Simpan'])) {

	if (!empty($sumber)) {
		$sql_simpan = "INSERT INTO tb_kdr (id_kdr, nar, nama, jabatan, periode,   foto) VALUES (
            '" . $_POST['id_kdr'] . "',
		    '" . $_POST['nar'] . "',

			'" . $_POST['nama'] . "',
			
			'" . $_POST['jabatan'] . "',
			
			'" . $_POST['periode'] . "',
			
            '" . $nama_file . "')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);

		if ($query_simpan && $_SESSION['ses_status'] == 'Anggota') {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-kdr2';
				}
			})</script>";
		} elseif ($query_simpan && $_SESSION['ses_status'] == 'Admin') {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-kdr';
				}
			})</script>";
		}
		else {
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-kdr';
				}
			})</script>";
		}
	} elseif (empty($sumber)) {
		echo "<script>
			  Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
			  }).then((result) => {
				  if (result.value) {
					  window.location = 'index.php?page=add-kdr';
				  }
			  })</script>";
	}
}
     //selesai proses simpan data
