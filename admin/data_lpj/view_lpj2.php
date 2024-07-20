<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_lpj WHERE id_lpj='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Data Laporan Pertanggungjawaban</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
					<tr>
							<td style="width: 150px">
								<b>ID LPJ</b>
							</td>
							<td>:
								<?php echo $data_cek['id_lpj']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nama Kegiatan</b>
							</td>
							<td>:
								<?php echo $data_cek['nama_kegiatan']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Tahun</b>
							</td>
							<td>:
								<?php echo $data_cek['tahun']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Kategori</b>
							</td>
							<td>:
								<?php echo $data_cek['kategori']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Keterangan</b>
							</td>
							<td>:
								<?php echo $data_cek['keterangan']; ?>
							</td>
						</tr>

					
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-lpj2" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak-lpj2.php?id_lpj=<?php echo $data_cek['id_lpj']; ?>" target=" _blank"
					 title="Cetak Data LPJ" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Upload File
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<div class="text-center">
					<img src="file/<?php echo $data_cek['upload_file']; ?>" width="280px" />
				</div>

				<h3 class="profile-username text-center">
					<?php echo $data_cek['nama_kegiatan']; ?>
					-
					<?php echo $data_cek['tahun']; ?>
				</h3>
			</div>
		</div>
	</div>

</div>