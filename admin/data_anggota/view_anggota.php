<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_anggota WHERE id_anggota='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Anggota</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
					<tr>
							<td style="width: 150px">
								<b>id Anggota</b>
							</td>
							<td>:
								<?php echo $data_cek['id_anggota']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>NAR</b>
							</td>
							<td>:
								<?php echo $data_cek['nae']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nama</b>
							</td>
							<td>:
								<?php echo $data_cek['nama']; ?>
							</td>
						</tr>


						<tr>
							<td style="width: 150px">
								<b>TTL</b>
							</td>
							<td>:
								<?php echo $data_cek['ttl']; ?>
							</td>
						</tr>

					
						<tr>
							<td style="width: 150px">
								<b>Alamat</b>
							</td>
							<td>:
								<?php echo $data_cek['alamat']; ?>
							</td>
						</tr>

						<tr>
							<td style="width: 150px">
								<b>NPM</b>
							</td>
							<td>:
								<?php echo $data_cek['npm']; ?>
							</td>
						</tr>

						<tr>
							<td style="width: 150px">
								<b>Fakultas</b>
							</td>
							<td>:
								<?php echo $data_cek['fakultas']; ?>
							</td>
						</tr>

						<tr>
							<td style="width: 150px">
								<b>Jurusan</b>
							</td>
							<td>:
								<?php echo $data_cek['jurusan']; ?>
							</td>
						</tr>
						
						<tr>
							<td style="width: 150px">
								<b>No Tlpn</b>
							</td>
							<td>:
								<?php echo $data_cek['no_telp']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Status</b>
							</td>
							<td>:
								<?php echo $data_cek['status']; ?>
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
					<a href="?page=data-anggota" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak-anggota.php?id_anggota=<?php echo $data_cek['id_anggota']; ?>" target=" _blank"
					 title="Cetak Data Anggota" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Foto Anggota
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
					<?php echo $data_cek['nar']; ?>
					-
					<?php echo $data_cek['nama']; ?>
				</h3>
			</div>
		</div>
	</div>

</div>