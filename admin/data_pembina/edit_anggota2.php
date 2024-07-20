<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_anggota WHERE id_anggota='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
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
				<input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?php echo $data_cek['id_anggota']; ?>"
				readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAR</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nar" name="nar" value="<?php echo $data_cek['nar']; ?>"
					/>
				</div>
			</div>
				
			

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lengkap</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					/>
				</div>
			</div>

			

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="ttl" name="ttl" value="<?php echo $data_cek['ttl']; ?>"
					/>
				</div>
			</div>

			

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NPM</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="npm" name="npm" value="<?php echo $data_cek['npm']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Fakultas</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="fakultas" name="fakultas" value="<?php echo $data_cek['fakultas']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jurusan</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="jurusan" name="jurusan" value="<?php echo $data_cek['jurusan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Tlpn</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="no_telp" name="no_telp" value="<?php echo $data_cek['no_telp']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-5">
					<select name="status" id="status" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['status'] == "Aktif-Aktif") echo "<option value='Aktif-Aktif' selected>Aktif-Aktif</option>";
                else echo "<option value='Aktif-Aktif'>Aktif-Aktif</option>";

                if ($data_cek['status'] == "Tidak Aktif") echo "<option value='Tidak Aktif' selected>Tidak Aktif</option>";
                else echo "<option value='Tidak Aktif'>Tidak Aktif</option>";
            			?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>"
					/>
				</div>
			</div>
			

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Anggota</label>
				<div class="col-sm-6">
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="160px" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ubah Foto</label>
				<div class="col-sm-5">
					<input type="file" id="foto" name="foto">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pegawai" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = 'foto/';
	$nama_file = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

	
if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $foto= $data_cek['foto'];
            if (file_exists("foto/$foto")){
            unlink("foto/$foto");}

        $sql_ubah = "UPDATE tb_anggota SET
			nar='".$_POST['nar']."',
			nama='".$_POST['nama']."',
			
			ttl='".$_POST['ttl']."',
			
			alamat='".$_POST['alamat']."',
			npm='".$_POST['npmg']."',
			fakultas='".$_POST['fakultas']."',
			jurusan='".$_POST['jurusan']."',
			no_telp='".$_POST['no_telp']."',
			status='".$_POST['status']."',
			keterangan='".$_POST['keterangan']."',
		
			foto='".$nama_file."'		
            WHERE id_anggota='".$_POST['id_anggota']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_anggota SET
		    nar='".$_POST['nar']."',
			nama='".$_POST['nama']."',
			
			ttl='".$_POST['ttl']."',
			
			alamat='".$_POST['alamat']."',
			npm='".$_POST['npmg']."',
			fakultas='".$_POST['fakultas']."',
			jurusan='".$_POST['jurusan']."',
			no_telp='".$_POST['no_telp']."',
			status='".$_POST['status']."',
			keterangan='".$_POST['keterangan']."',
            
			foto='".$nama_file."'
		    WHERE id_anggota='".$_POST['id_anggota']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-anggota2';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-anggota2';
            }
        })</script>";
    }
}

