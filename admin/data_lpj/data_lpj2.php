<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Laporan Pertanggungjawaban</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
		<div>
				<a href="?page=add-lpj" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data
				</a>
				<a href="?page=data-lpj" class="btn btn-info">
                    <i class="fa fa-edit"></i> Semua Data LPJ
                </a>
                <a href="?page=lpj_kegiatan" class="btn btn-success">
                    <i class="fa fa-edit"></i> LPJ Kegiatan
                </a>
                <a href="?page=lpj_pengurus" class="btn btn-danger ">
                    <i class="fa fa-edit"></i> LPJ Pengurus
                </a>




			</div>
			
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						
						<th>Kegiatan</th>
						<th>Tahun</th>
						<th>Kategori</th>
						<th>Keterangan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from tb_lpjr");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						
						<td>
							<?php echo $data['nama_kegiatan']; ?>
						</td>
						<td>
							<?php echo $data['tahun']; ?>
						</td>

						</td>
						<td class="">
								<form action="?page=update-kategori-lpj" method="POST" class="d-flex justfiy-content-center align-items-center flex-column flex-wrap">
									<?php $tahun = $data['nama_kegiatan'];
									$kategori = $data['kategori']; ?>
									<input type="hidden" name="nama_kegiatan" value="<?php echo $nip; ?>">
									<select name="kategori" id="">
										<option value="LPJ_Kegiatan" <?php if ($kategori == 'LPJ_Kegiatan') echo 'selected'; ?>>LPJ Kegiatan</option>
										<option value="LPJ_Pengurus" <?php if ($kategori == 'LPJ_Pengurus') echo 'selected'; ?>>LPJ Pengurus</option>
									</select>
									<input type="submit" value="Ubah" name="" class="btn btn-primary mt-2">
								</form>
							</td>
				
						<td>
							<?php echo $data['keterangan']; ?>
						</td>

						
						<td>
							<a href="?page=view-lpj2&kode=<?php echo $data['id_lpj']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							</a>
							<a href="?page=edit-lpj2&kode=<?php echo $data['id_lpj']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-lpj2&kode=<?php echo $data['id_lpj']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
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