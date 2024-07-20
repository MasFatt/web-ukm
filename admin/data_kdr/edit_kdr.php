<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_kdr WHERE id_kdr='".$_GET['kode']."'";
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
				<input type="text" class="form-control" id="id_kdr" name="id_kdr" value="<?php echo $data_cek['id_kdr']; ?>"
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
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-5">
					<select name="jabatan" id="jabatan" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['jabatan'] == "KDR Putra") echo "<option value='KDR Putra' selected>KDR Putra</option>";
                else echo "<option value='KDR Putra'>KDR Putra</option>";

                if ($data_cek['jabatan'] == "KDR Putri") echo "<option value='KDR Putri' selected>KDR Putri</option>";
                else echo "<option value='KDR Putri'>KDR Putri</option>";
            			?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Periode</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="periode" name="periode" value="<?php echo $data_cek['periode']; ?>"
					/>
				</div>
			</div>
			

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto KDR</label>
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
			<a href="?page=data-kdr" title="Kembali" class="btn btn-secondary">Batal</a>
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

        $sql_ubah = "UPDATE tb_kdr SET
			nar='".$_POST['nar']."',
			nama='".$_POST['nama']."',
			
			jabatan='".$_POST['jabatan']."',
			periode='".$_POST['periode']."',
		
			foto='".$nama_file."'		
            WHERE id_kdr='".$_POST['id_kdr']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_kdr SET
		    nar='".$_POST['nar']."',
			nama='".$_POST['nama']."',
			
			jabatan='".$_POST['jabatan']."',
			periode='".$_POST['periode']."',
            
			foto='".$nama_file."'
		    WHERE id_kdr='".$_POST['id_kdr']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-kdr';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-kdr';
            }
        })</script>";
    }
}

