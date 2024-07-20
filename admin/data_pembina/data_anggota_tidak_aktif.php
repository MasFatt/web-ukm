<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Anggota Pramuka
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-anggota" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data</a>
                <a href="?page=data-anggota" class="btn btn-info">
                    <i class="fa fa-edit"></i> Semua Data Anggota
                </a>
                <a href="?page=verify" class="btn btn-success">
                    <i class="fa fa-edit"></i> Anggota Aktif
                </a>
                <a href="?page=not-verify" class="btn btn-danger ">
                    <i class="fa fa-edit"></i> Anggota Tidak Aktif
                </a>



            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>No</th>

                    <th>NAR</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>NPM</th>

                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>No Tlpn</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                     <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT * from tb_anggota where status = 'tidak aktif' ");
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




                            <td>
                                <?php echo $data['ttl']; ?>
                            </td>
                            <td>
                                <?php echo $data['alamat']; ?>
                            </td>
                            <td>
                                <?php echo $data['npm']; ?>
                            </td>

                            <td>
                                <?php echo $data['fakultas']; ?>
                            </td>
                            <td>
                                <?php echo $data['jurusan']; ?>
                            </td>
                            <td class="">
                                <form action="?page=update-status-anggota" method="POST" class="d-flex justfiy-content-center align-items-center flex-column flex-wrap">
                                    <?php $id_anggota = $data['nama'];
                                    $status = $data['status']; ?>
                                    <input type="hidden" name="nama" value="<?php echo $id_anggota; ?>">
                                    <select name="status" id="">
                                        <option value="Aktif" <?php if ($status == 'Aktif') echo 'selected'; ?>>Aktif</option>
                                        <option value="Tidak Aktif" <?php if ($status == 'Tidak Aktif') echo 'selected'; ?>>Tidak Aktif</option>
                                    </select>
                                    <input type="submit" value="Ubah" name="" class="btn btn-primary mt-2">
                                </form>
                            </td>

                            <td>
                                <a href="?page=view-anggota&kode=<?php echo $data['id_anggota']; ?>" title="Detail" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                </a>
                                <a href="?page=edit-anggota&kode=<?php echo $data['id_anggota']; ?>" title="Ubah" class="btn btn-success btn-sm ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-anggota&kode=<?php echo $data['id_anggota']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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