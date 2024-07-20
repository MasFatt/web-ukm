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
 
	$query = mysqli_query($koneksi, "SELECT max(idhonor) as kodeTerbesar FROM tb_data_honor");
	$data = mysqli_fetch_array($query);
	$idhonor = $data['kodeTerbesar'];
 
	
	$urutan = (int) substr($idhonor, 3, 3);
	$urutan++;
 
	$huruf = "PH";
	$idhonor = $huruf . sprintf("%03s", $urutan);
	?>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Pegawai Honor</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" id="idhonor" name="idhonor" placeholder="idhonor" required="required" value="<?php echo $idhonor ?>" readonly>
				
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">nuptk</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nuptk" name="nuptk" placeholder="Nuptk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pegawai</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pegawai" required>
				</div>
			</div>



			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kelamin</label>
				<div class="col-sm-5">
					<select name="kelamin" id="kelamin" class="form-control">
						<option>- Pilih -</option>
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="agama" name="agama" placeholder="Agama" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kecamatan</label>
				<div class="col-sm-5">
					<select name="kecamatan" id="kecamatan" class="form-control">
						<option>- Pilih -</option>
						<option>Banjarmasin Utara</option>
						<option>Banjarmasin Selatan</option>
						<option>Banjarmasin Timur</option>
						<option>Banjarmasin Barat</option>
						<option>Banjarmasin Tengah</option>

					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No HP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Sekolah</label>
				<div class="col-sm-5">
					<select name="nama_sekolah" id="nama_sekolah" class="form-control">
						<?php
						$sql = $koneksi->query("SELECT * from tb_datasekolah");
						while ($data = $sql->fetch_assoc()) { ?>
							<option><?php echo $data['namasekolah'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis PTK</label>
				<div class="col-sm-5">
					<select name="jenisptk" id="jenisptk" class="form-control">
						<option>- Pilih -</option>
						<option>Guru Mapel</option>
						<option>Tenaga Administrasi Sekolah</option>
						<option>Guru BK</option>
						<option>Tenaga Perpustakaan</option>

					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Pegawai</label>
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
			<a href="?page=data-guru_honor_user2" title="Kembali" class="btn btn-secondary">Batal</a>
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
		$sql_simpan = "INSERT INTO tb_data_honor (idhonor,nuptk, nama, tempat_lahir, tgl_lahir, kelamin, agama, kecamatan, no_hp,  nama_sekolah, jenisptk, foto) VALUES (
           '" . $_POST['idhonor'] . "',
		    '" . $_POST['nuptk'] . "',
			'" . $_POST['nama'] . "',
			'" . $_POST['tempat_lahir'] . "',
			'" . $_POST['tgl_lahir'] . "',
			'" . $_POST['kelamin'] . "',
			'" . $_POST['agama'] . "',
			'" . $_POST['kecamatan'] . "',
			'" . $_POST['no_hp'] . "',
			'" . $_POST['nama_sekolah'] . "',
			'" . $_POST['jenisptk'] . "',
            '" . $nama_file . "')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);

		
	 if ($query_simpan && $_SESSION['ses_level'] == 'Pegawai') {
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=data-guru_honor_user2';
			}
		})</script>";
	} elseif ($query_simpan && $_SESSION['ses_level'] == 'Admin_Dinas') {
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=data-guru_honor';
			}
		})</script>";
	}
	else {
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=add-guru_honor_user2';
			}
		})</script>";
	}
} elseif (empty($sumber)) {
	echo "<script>
		  Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
		  }).then((result) => {
			  if (result.value) {
				  window.location = 'index.php?page=add-guru_honor_user2';
			  }
		  })</script>";
}
}