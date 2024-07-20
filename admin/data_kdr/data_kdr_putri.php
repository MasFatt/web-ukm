<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data KDR Putri
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-kdr" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data
				</a>
				<a href="?page=data-kdr" class="btn btn-info">
                    <i class="fa fa-edit"></i> Semua Data KDR
                </a>
                <a href="?page=data-kdrputra" class="btn btn-success">
                    <i class="fa fa-edit"></i> KDR Putra
                </a>
                <a href="?page=data-kdrputri" class="btn btn-danger ">
                    <i class="fa fa-edit"></i> KDR Putri
                </a>


           	
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>

						<th>NAR</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Periode</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * from tb_kdr");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>

							<td>
								<?php echo $data['nar']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							</td>
							<td class="">
								<form action="?page=update-jabatan-kdr" method="POST" class="d-flex justfiy-content-center align-items-center flex-column flex-wrap">
									<?php $id_kdr = $data['nama'];
									$jabatan = $data['jabatan']; ?>
									<input type="hidden" name="nama" value="<?php echo $id_kdr; ?>">
									<select name="jabatan" id="">
										<option value="KDR Putra" <?php if ($jabatan == 'KDR Putra') echo 'selected'; ?>>KDR Putra</option>
										<option value="KDR Putri" <?php if ($jabatan == 'KDR Putri') echo 'selected'; ?>>KDR Putri</option>
									</select>
									<input type="submit" value="Ubah" name="" class="btn btn-primary mt-2">
								</form>
							</td>
							<td>
								<?php echo $data['periode']; ?>
							</td>

							<td>
								<a href="?page=view-kdr&kode=<?php echo $data['id_kdr']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-eye"></i>
								</a>
								</a>
								<a href="?page=edit-kdr&kode=<?php echo $data['id_kdr']; ?>" title="Ubah" class="btn btn-success btn-sm ">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-kdr&kode=<?php echo $data['id_kdr']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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