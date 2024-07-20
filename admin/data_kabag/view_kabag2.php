<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_barang_kabagracana WHERE id_barang='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Data Barang Kabag Racana</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
					<tr>
							<td style="width: 150px">
								<b>ID </b>
							</td>
							<td>:
								<?php echo $data_cek['id_barang']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nama Barang</b>
							</td>
							<td>:
								<?php echo $data_cek['nama_barang']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Jumlah</b>
							</td>
							<td>:
								<?php echo $data_cek['jumlah']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Kondisi</b>
							</td>
							<td>:
								<?php echo $data_cek['kondisi']; ?>
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
						
						<tr>
							<td style="width: 150px">
								<b>Tgl Pengecekan</b>
							</td>
							<td>:
								<?php echo $data_cek['tgl_pengecekan']; ?>
							</td>
						</tr>
						
						
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-kabag2" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak_data_kabag.php?id_ajar=<?php echo $data_cek['id_ajar']; ?>" target=" _blank"
					 title="Cetak Data Barang Kabag Racana" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Foto Barang
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<div class="text-center">
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="280px" />
				</div>

				<h3 class="profile-username text-center">
					<?php echo $data_cek['id_baranf']; ?>
					
					<?php echo $data_cek['nama_barang']; ?>
				</h3>
			</div>
		</div>
	</div>

</div>