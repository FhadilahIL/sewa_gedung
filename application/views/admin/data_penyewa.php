<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Mulai Isi -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h1>Data Penyewa</h1>
                <button type="button" class="btn btn-info mt-2 mb-3" data-toggle="modal" data-target="#bs-example-modal-lg-tambah">+ Tambah Data Penyewa</button>
                <?php if ($this->session->flashdata('gagal')) { ?>
                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Gagal!</strong> <?= $this->session->flashdata('gagal'); ?>
                    </div>
                <?php } else if ($this->session->flashdata('berhasil')) { ?>
                    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Berhasil!</strong> <?= $this->session->flashdata('berhasil'); ?>
                    </div>
                <?php } ?>
                <table class="table table-responsive">
                    <thead>
                        <th class="text-center">No.</th>
                        <th style="min-width: 300px;">Nama</th>
                        <th style="min-width: 250px;">Email</th>
                        <th style="min-width: 180px;">Jenis Kelamin</th>
                        <th style="min-width: 300px;">Alamat</th>
                        <th style="min-width: 150px;">No. Telp</th>
                        <th style="min-width: 150px;" class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($penyewa as $data) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?>.</td>
                                <td><?= ucfirst($data->nama_penyewa) ?></td>
                                <td><?= $data->email ?></td>
                                <td><?= $data->jenis_kelamin ?></td>
                                <td><?= $data->alamat ?></td>
                                <td><?= $data->no_tlp ?></td>
                                <td class="text-center">
                                    <button type="button" data-toggle="modal" data-target="#bs-example-modal-lg-edit-<?= $data->id_penyewa ?>" class="btn btn-warning btn-sm">Edit Data</button>
                                </td>
                                <div class="modal fade" id="bs-example-modal-lg-edit-<?= $data->id_penyewa ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Data - <?= $data->nama_penyewa ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('admin/edit_penyewa') ?>" method="post">
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama" id="staticEmail" value="<?= ucfirst($data->nama_penyewa) ?>">
                                                            <input type="hidden" class="form-control" name="id_penyewa" id="staticEmail" value="<?= $data->id_penyewa ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="email" id="staticEmail" value="<?= $data->email ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-sm-9">
                                                            <input type="password" class="form-control" name="password" id="staticEmail">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                        <div class="col-sm-9">
                                                            <select name="jenis_kelamin" class="form-control">
                                                                <option>-- Pilh Jenis Kelamin --</option>
                                                                <?php if ($data->jenis_kelamin == 'Laki - Laki') { ?>
                                                                    <option value="Laki - Laki" selected>Laki - Laki</option>
                                                                    <option value="Perempuan">Perempuan</option>
                                                                <?php } else { ?>
                                                                    <option value="Laki - Laki">Laki - Laki</option>
                                                                    <option value="Perempuan" selected>Perempuan</option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Alamat</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" name="alamat" id="staticEmail" rows="5"><?= $data->alamat ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">No. Telepon</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="no_telp" id="staticEmail" value="<?= $data->no_tlp ?>">
                                                        </div>
                                                    </div>
                                                    <div class="float-right">
                                                        <button data-dismiss="modal" class="btn btn-secondary">Tutup</button>
                                                        <button type="submit" class="btn btn-success">Update Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="bs-example-modal-lg-tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Penyewa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/tambah_penyewa') ?>" method="post">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" id="staticEmail" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="staticEmail" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="staticEmail" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki - Laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="staticEmail" name="alamat" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">No. Telepon</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="no_telp" id="staticEmail" required>
                                </div>
                            </div>
                            <div class="float-right">
                                <button data-dismiss="modal" class="btn btn-secondary">Tutup</button>
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- *************************************************************** -->
        <!-- End Isi -->
        <!-- *************************************************************** -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->