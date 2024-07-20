<div class="card card-info">
	<h3 class="card-title">
		<i class="fa fa-table"></i> Profil 
	</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
	<div class="table-responsive">
		<table id="" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Unit Kegiatan Mahasiswa</th>
					<th>Racana</th>
					<th>Nama Instansi</th>
					<th>Alamat</th>
					<th>Kelola</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$no = 1;
				$sql = $koneksi->query("select * from tb_profil");
				while ($data = $sql->fetch_assoc()) {
				?>

					<tr>
						<td>
							<?php echo $data['ukm']; ?>
						</td>
						<td>
							<?php echo $data['racana']; ?>
						</td>
						<td>
							<?php echo $data['nama_instansi']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<a href="?page=edit-profil&kode=<?php echo $data['id_profil']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-wrench"></i>
							</a>
						</td>
					</tr>

				<?php
				}
				?>
			</tbody>
			</tfoot>
		</table>
	</div>
</div>
<!-- /.card-body -->