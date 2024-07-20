<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Majelis Pembimbing dan Pembina
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-anggota" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data
				</a>
				<a href="?page=data-anggota" class="btn btn-info">
                    <i class="fa fa-edit"></i> Semua Data Pembina
                </a>
                <a href="?page=verify" class="btn btn-success">
                    <i class="fa fa-edit"></i> Majelis Pembimbing Gugusdepan
                </a>
                <a href="?page=not-verify" class="btn btn-danger ">
                    <i class="fa fa-edit"></i> Pembina Gugusdepan Putera
                </a>
                <a href="?page=not-verify" class="btn btn-danger ">
                    <i class="fa fa-edit"></i> Pembina Gugusdepan Puteri
                </a>



			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>

						<th>NIP</th>
						<th>Nama</th>
						<th>Status</th>
						<th>Jabatan</th>
						<th>No Telp </th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * from tb_pembina");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>

							<td>
								<?php echo $data['nip']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>

							<td class="">
								<form action="?page=update-status-pembina" method="POST" class="d-flex justfiy-content-center align-items-center flex-column flex-wrap">
									<?php $id_pembina = $data['nama'];
									$status = $data['status']; ?>
									<input type="hidden" name="nama" value="<?php echo $id_pembina; ?>">
									<select name="status" id="">
										<option value="'Majelis Pembimbing Gugusdepan" <?php if ($status == 'Majelis Pembimbing Gugusdepan') echo 'selected'; ?>>'Majelis Pembimbing Gugusdepan</option>
										<option value="Pembina Gugusdepan Putera" <?php if ($status == 'Pembina Gugusdepan Putera') echo 'selected'; ?>>Pembina Gugusdepan Putera</option>
										<option value="Pembina Gugusdepan Puteri" <?php if ($status == 'Pembina Gugusdepan Puteri') echo 'selected'; ?>>Pembina Gugusdepan Puteri</option>
									</select>
									<input type="submit" value="Ubah" name="" class="btn btn-primary mt-2">
								</form>
							</td>
							<td>
								<?php echo $data['jabatan']; ?>
							</td>
							<td>
								<?php echo $data['no_telp']; ?>
							</td>

							<td>
								<a href="?page=view-pembina&kode=<?php echo $data['id_pembina']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-eye"></i>
								</a>
								</a>
								<a href="?page=edit-pembina&kode=<?php echo $data['id_pembina']; ?>" title="Ubah" class="btn btn-success btn-sm ">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-pembina&kode=<?php echo $data['id_pembina']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
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