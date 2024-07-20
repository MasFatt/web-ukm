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
 
	$query = mysqli_query($koneksi, "SELECT max(id_anggota) as kodeTerbesar FROM tb_anggota");
	$data = mysqli_fetch_array($query);
	$id_anggota = $data['kodeTerbesar'];
 
	
	$urutan = (int) substr($id_anggota, 3, 3);
	$urutan++;
 
	$huruf = "P";
	$id_anggota = $huruf . sprintf("%03s", $urutan);
	?>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Anggota</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" id="id_anggota" name="id_anggota" placeholder="id_anggota" required="required" value="<?php echo $id_anggota ?>" readonly>
				
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
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="ttl" nae="ttl" placeholder="ttl" required>
				</div>
			</div>

			

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NPM</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="npm" name="npm" placeholder="npm" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Fakultas</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="fakultas" name="fakultas" placeholder="fakultas" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jurusan</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="jurusan" name="jurusan" placeholder="jurusan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Tlpn</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="no_telpn" name="no_telpn" placeholder="no_telpn" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-5">
					<select name="status" id="status" class="form-control">
						<option>- Pilih -</option>
						<option>Aktif</option>
						<option>Tidak Aktif</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="keteragan" name="keteragan" placeholder="keteragan" required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Anggota</label>
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
			<a href="?page=data-anggota" title="Kembali" class="btn btn-secondary">Batal</a>
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
		$sql_simpan = "INSERT INTO tb_anggota (id_anggota, nar, nama, ttl, alamat, npm, fakutas, jurusan, no_telp, status, keterangan,   foto) VALUES (
             '" . $_POST['id_anggota'] . "',
		    '" . $_POST['nar'] . "',

			'" . $_POST['nama'] . "',
			
			'" . $_POST['ttl'] . "',
			
			'" . $_POST['alamat'] . "',
			'" . $_POST['npm'] . "',
			'" . $_POST['fakultas'] . "',
			'" . $_POST['jurusan'] . "',
			'" . $_POST['no_telp'] . "',
			'" . $_POST['status'] . "',
			'" . $_POST['keterangan'] . "',
			
            '" . $nama_file . "')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);

		if ($query_simpan && $_SESSION['ses_status'] == 'Anggota') {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-anggota2';
				}
			})</script>";
		} elseif ($query_simpan && $_SESSION['ses_status'] == 'Admin') {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-anggota';
				}
			})</script>";
		}
		else {
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-anggota';
				}
			})</script>";
		}
	} elseif (empty($sumber)) {
		echo "<script>
			  Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
			  }).then((result) => {
				  if (result.value) {
					  window.location = 'index.php?page=add-anggota';
				  }
			  })</script>";
	}
}
     //selesai proses simpan data
