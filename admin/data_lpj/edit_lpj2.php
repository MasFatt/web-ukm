<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_lpj WHERE id_lpj='".$_GET['kode']."'";
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
				<input type="text" class="form-control" id="id_lpj" name="id_lpj" value="<?php echo $data_cek['id_lpj']; ?>"
				readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Kegiatan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo $data_cek['nama_kegiatan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tahun</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $data_cek['tahun']; ?>"
					/>
				</div>
			</div>
  
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kategori</label>
				<div class="col-sm-5">
					<select name="kategori" id="kategori" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['kategori'] == "LPJ_Kegiatan") echo "<option value='LPJ_Kegiatan' selected>LPJ_Kegiatan</option>";
                else echo "<option value='LPJ_Kegiatan'>LPJ_Kegiatan</option>";

                if ($data_cek['kategori'] == "LPJ_Pengurus") echo "<option value='LPJ_Pengurus' selected>LPJ_Pengurus</option>";
                else echo "<option value='LPJ_Pengurus'>LPJ_Pengurus</option>";
            			?>
					</select>
				</div>
			</div>
			

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">keterangan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Upload File</label>
				<div class="col-sm-6">
					<img src="file/<?php echo $data_cek['upload_file']; ?>" width="160px" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ubah File</label>
				<div class="col-sm-5">
					<input type="file" id="upload_file" name="upload_file">
					<p class="help-block">
						<font color="red">"Format file PDF"</font>
					</p>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-lpj" title="Kembali" class="btn btn-secondary">Batal</a>
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
        $file= $data_cek['upload_file'];
            if (file_exists("foto/$file")){
            unlink("upload_file/$file");}

        $sql_ubah = "UPDATE tb_lpj SET
			id_lpj='".$_POST['id_lpj']."',
			nama_kegiatan='".$_POST['nama_kegiaatn']."',
			
			tahun='".$_POST['tahun']."',
			kategori='".$_POST['kategori']."',
			keterangan='".$_POST['keterangan']."',
	
			upload_file='".$nama_file."'			
            WHERE id_lpj='".$_POST['id_lpj']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

  }elseif(empty($sumber)){
	$sql_ubah = "UPDATE tb_lpj SET
	        id_lpj='".$_POST['id_lpj']."',
		    nama_kegiatan='".$_POST['nama_kegiatan']."',
			
			tahun='".$_POST['tahun']."',
		    kategori='".$_POST['kategori']."',
		    keterangan='".$_POST['keterangan']."',
		
	        WHERE id_lpj='".$_POST['id_lpj']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-lpj2';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-lpj2';
            }
        })</script>";
    }
}

