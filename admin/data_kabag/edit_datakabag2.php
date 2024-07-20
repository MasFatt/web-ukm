<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_barang_kabagracana WHERE id_barang='".$_GET['kode']."'";
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

			

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Barang</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="id_barang" name="id_barang" value="<?php echo $data_cek['id_barang']; ?>"
					readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Barang</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $data_cek['nama_barang']; ?>"
					 />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $data_cek['jumlah']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kondisi</label>
				<div class="col-sm-5">
					<select name="kondisi" id="kondisi" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['kondisi'] == "Baik") echo "<option value='Baik' selected>Baik</option>";
                else echo "<option value='Baik'>Baik</option>";

                if ($data_cek['kondisi'] == "Sedang") echo "<option value='Sedang' selected>Sedang</option>";
                else echo "<option value='Sedang'>Sedang</option>";

				if ($data_cek['kondisi'] == "Rusak") echo "<option value='Rusak' selected>Rusak</option>";
                else echo "<option value='Rusak'>Rusak</option>";
            			?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tgl Pengecekan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="tgl_pengecekan" name="tgl_pengecekan" value="<?php echo $data_cek['tgl_pengecekan']; ?>"
					/>
				</div>
			</div>

		
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Barang</label>
				<div class="col-sm-6">
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="160px" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ubah Foto</label>
				<div class="col-sm-6">
					<input type="file" id="foto" name="foto">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-kabag2" title="Kembali" class="btn btn-secondary">Batal</a>
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

        $sql_ubah = "UPDATE tb_barang_kabagracana SET
			id_barang='".$_POST['id_barang']."',
			nama_barang='".$_POST['nama_barang']."',
			jumlah='".$_POST['jumlah']."',
			kondisi='".$_POST['kondisi']."',
			keterangan='".$_POST['keterangan']."',
			tgl_pengecekan='".$_POST['tgl_pengecekan']."',
			
			
			foto='".$nama_file."'		
            WHERE id_barang='".$_POST['id_barang']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

   }elseif(empty($sumber)){
	$sql_ubah = "UPDATE tb_barang_kabagracana SET
		   id_barang='".$_POST['id_barang']."',
	       nama_barang='".$_POST['nama_barang']."',
		   jumlah='".$_POST['jumlah']."',
	       kondisi='".$_POST['kondisi']."',
		   keterangan='".$_POST['keterangan']."',
		   tgl_pengecekan='".$_POST['tgl_pengecekan']."',
		
		
	       WHERE id_barang='".$_POST['id_barang']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
      }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-kabag2';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-kabag2';
            }
        })</script>";
    }
}
