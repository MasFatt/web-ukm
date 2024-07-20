<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_kdr WHERE id_kdr='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Ketua Dewan Racana</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
					<tr>
							<td style="width: 150px">
								<b>ID KDR</b>
							</td>
							<td>:
								<?php echo $data_cek['id_kdr']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>NAR</b>
							</td>
							<td>:
								<?php echo $data_cek['nar']; ?>
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
								<b>Jabatan</b>
							</td>
							<td>:
								<?php echo $data_cek['jabatan']; ?>
							</td>
						</tr>

					
						<tr>
							<td style="width: 150px">
								<b>Periode</b>
							</td>
							<td>:
								<?php echo $data_cek['periode']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-kdr2" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak-kdr.php?id_kdr=<?php echo $data_cek['id_kdr']; ?>" target=" _blank"
					 title="Cetak Data Ketua Dewan Racana" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Foto KDR
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