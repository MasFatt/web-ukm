<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_penanggungjawab WHERE kd_rapat='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Data Penangungjawab</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 150px">
								<b>ID PJ</b>
							</td>
							<td>:
								<?php echo $data_cek['id_pj']; ?>
							</td>
						</tr>

						<tr>
							<td style="width: 150px">
								<b>NAR/NIP</b>
							</td>
							<td>:
								<?php echo $data_cek['nar/nip']; ?>
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
								<?php echo $data_cek['Jabatan']; ?>
							</td>
						</tr>
						
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-penangungjawab" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak_penangungjawab.php?id_pj=<?php echo $data_cek['id_pjt']; ?>" target=" _blank"
					 title="Cetak Data Penangungjawab" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Foto
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
					<?php echo $data_cek['nama']; ?>
					
				</h3>
			</div>
		</div>
	</div>

</div>