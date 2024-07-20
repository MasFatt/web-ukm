<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

		<?php
	
	include 'koneksi.php';
 
	$query = mysqli_query($koneksi, "SELECT max(id_pj) as kodeTerbesar FROM tb_penanggungjawab");
	$data = mysqli_fetch_array($query);
	$id_pj = $data['kodeTerbesar'];
 
	
	$urutan = (int) substr($id_pj, 3, 3);
	$urutan++;
 
	$huruf = "P";
	$id_pj = $huruf . sprintf("%03s", $urutan);
	?>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Pj</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" id="id_pj" name="id_pj" placeholder="id_pj" required="required" value="<?php echo $id_pj ?>" readonly>
				
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAR/NIP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nar/nip" name="nar/nip" placeholder="nar/nip" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan" required>
				</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto PJ</label>
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
			<a href="?page=data-penanggungjawab" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = 'foto/';
	$nama_file = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Simpan'])){

		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tb_penanggungjawab (id_pj, nar/nip, nama, jabatan,  foto) VALUES (
			 '".$_POST['id_pj']."',
			  '".$_POST['nar/nip']."',
		    '".$_POST['nama']."',
			'".$_POST['jabatan']."',
			
            '".$nama_file."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=data-penanggungjawab';
				}
			})</script>";
			}else{
			echo "<script>
			Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=add-penanggungjawab';
				}
			})</script>";
		  }
		  }elseif(empty($sumber)){
			  echo "<script>
			  Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
			  }).then((result) => {
				  if (result.value) {
					  window.location = 'index.php?page=add-penanggungjawab';
				  }
			  })</script>";
		  }
		  }
     //selesai proses simpan data
