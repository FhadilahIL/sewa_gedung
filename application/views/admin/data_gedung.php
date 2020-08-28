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
                <h1>Data Gedung</h1>
                <button type="button" data-toggle="modal" data-target="#bs-example-modal-lg-tambah" class="btn btn-primary mt-2 mb-3">+ Tambah Data Gedung</button>
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
                        <th>No.</th>
                        <th style="min-width: 300px;">Nama Gedung</th>
                        <th style="min-width: 400px;">Deskripsi</th>
                        <th style="min-width: 180px;">Foto Gedung</th>
                        <th style="min-width: 180px;">Fasilitas</th>
                        <th style="min-width: 150px;">Harga</th>
                        <th style="min-width: 200px;" class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($gedung as $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_gedung ?></td>
                                <td class="text-text-justify"><?= $data->deskripsi_gedung ?></td>
                                <td><?= $data->gambar_gedung ?></td>
                                <td>
                                    <?php $nomor = 1;
                                    foreach ($fasilitas as $fas) {
                                        if ($fas->id_gedung == $data->id_gedung) { ?>
                                            <?= $nomor++ . '. ' . $fas->nama_fasilitas ?> <br>
                                    <?php }
                                    } ?>
                                </td>
                                <td><?= $data->harga_gedung ?></td>
                                <td class="text-center">
                                    <button type="button" data-toggle="modal" data-target="#bs-example-modal-lg-edit-<?= $data->id_gedung ?>" class="btn btn-warning btn-sm">Edit</button>
                                    <button type="button" data-toggle="modal" data-target="#bs-example-modal-lg-hapus-<?= $data->id_gedung ?>" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                                <div class="modal fade" id="bs-example-modal-lg-edit-<?= $data->id_gedung ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Data - <?= $data->nama_gedung ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('admin/update_gedung') ?>" enctype="multipart/form-data" method="post">
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Nama Gedung</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama" value="<?= ucfirst($data->nama_gedung) ?>">
                                                            <input type="hidden" readonly class="form-control" name="id_gedung" value="<?= $data->id_gedung ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Harga Gedung</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="harga" value="<?= $data->harga_gedung ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Deskripsi</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" name="deskripsi"><?= $data->deskripsi_gedung ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Gambar Gedung</label>
                                                        <div class="col-sm-9">
                                                            <img src="<?= base_url('/') ?>assets/img/gedung/<?= $data->gambar_gedung ?>" width="30%">
                                                            <input type="file" class="form-control-file mt-2" name="gambar_gedung" accept=".jpg, .png, .jpeg">
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
                                <div class="modal fade" id="bs-example-modal-lg-hapus-<?= $data->id_gedung ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Hapus Data - <strong><?= $data->nama_gedung ?></strong></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda Ingin Menghapus Data Gedung dengan Nama <strong><?= $data->nama_gedung ?></strong> ?</p>
                                                <div class="float-right mt-3">
                                                    <button data-dismiss="modal" class="btn btn-secondary">Tutup</button>
                                                    <a href="<?= base_url('admin/hapus_gedung/' . $data->id_gedung) ?>" class="btn btn-danger">Ya, Hapus Data</a>
                                                </div>
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
                        <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Gedung</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/tambah_gedung') ?>" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Nama Gedung</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Harga Gedung</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="harga">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="5" name="deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Gambar Gedung</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control-file mt-2" name="gambar_gedung" id="gambar" accept=".jpg, .png, .jpeg" onchange="tampilkanPreview(this,'preview')">
                                    <p id="hasil" hidden></p>
                                    <img id="preview" class="mt-3 rounded" hidden />
                                </div>
                            </div>
                            <div class="float-right">
                                <button data-dismiss="modal" class="btn btn-secondary">Tutup</button>
                                <button type="submit" class="btn btn-success" id="tombol" disabled>Simpan Data Gedung</button>
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