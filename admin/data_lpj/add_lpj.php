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
 
	$query = mysqli_query($koneksi, "SELECT max(id_lpj) as kodeTerbesar FROM tb_lpj");
	$data = mysqli_fetch_array($query);
	$id_lpj = $data['kodeTerbesar'];
 
	
	$urutan = (int) substr($id_lpj, 3, 3);
	$urutan++;
 
	$huruf = "PH";
	$id_lpj = $huruf . sprintf("%03s", $urutan);
	?>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID LPJ</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" id="id_lpj" name="id_lpj" placeholder="id_lpj" required="required" value="<?php echo $id_lpj ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Kegiatan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="nama_kegiatan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tahun</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="kategori" name="kategori" placeholder="kategori Pegawai" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kategori</label>
				<div class="col-sm-5">
					<select name="kategori" id="kategori" class="form-control">
						<option>- Pilih -</option>
						<option>LPJ Kegiatan</option>
						<option>LPJ Pengurus</option>
					</select>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Tempat Lahir" required>
				</div>
			</div>

			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Upload File</label>
				<div class="col-sm-6">
					<input type="file" id="upload_file" name="upload_file">
					<p class="help-block">
						<font color="red">"Format file PDF"</font>
					</p>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-lpj" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
$sumber = @$_FILES['file']['tmp_name'];
$target = 'file/';
$nama_file = @$_FILES['file']['name'];
$pindah = move_uploaded_file($sumber, $target . $nama_file);

if (isset($_POST['Simpan'])) {

	if (!empty($sumber)) {
		$sql_simpan = "INSERT INTO tb_lpj (id_lpj,nama_kegiatan, tahun,kategori, upload_file) VALUES (
           '" . $_POST['id_lpj'] . "',
		    '" . $_POST['nama_kegiatan'] . "',
			'" . $_POST['tahun'] . "',
			'" . $_POST['kategori'] . "',
			'" . $_POST['keterangan'] . "',
            '" . $nama_file . "')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);

		
	 if ($query_simpan && $_SESSION['ses_status'] == 'anggota_racana') {
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=data_lpj';
			}
		})</script>";
	} elseif ($query_simpan && $_SESSION['ses_status'] == 'Admin') {
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=data-lpj';
			}
		})</script>";
	}
	else {
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=add-lpj';
			}
		})</script>";
	}
} elseif (empty($sumber)) {
	echo "<script>
		  Swal.fire({title: 'Gagal, File Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
		  }).then((result) => {
			  if (result.value) {
				  window.location = 'index.php?page=add-lpj';
			  }
		  })</script>";
}
}