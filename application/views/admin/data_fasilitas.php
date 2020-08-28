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
                <h1>Data Fasilitas</h1>
                <button type="button" data-toggle="modal" data-target="#bs-example-modal-lg-tambah" class="btn btn-primary mt-2 mb-3">+ Tambah Data Fasilitas</button>
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
                        <th style="min-width: 300px;">Nama Fasilitas</th>
                        <th style="min-width: 400px;">Gedung</th>
                        <th style="min-width: 180px;">Foto Fasilitas</th>
                        <th style="min-width: 200px;" class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($fasilitas as $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_fasilitas ?></td>
                                <td class="text-text-justify"><?= $data->nama_gedung ?></td>
                                <td><?= $data->gambar_fasilitas ?></td>
                                <td class="text-center">
                                    <button type="button" data-toggle="modal" data-target="#bs-example-modal-lg-edit-<?= $data->id_fasilitas ?>" class="btn btn-warning btn-sm">Edit</button>
                                    <button type="button" data-toggle="modal" data-target="#bs-example-modal-lg-hapus-<?= $data->id_fasilitas ?>" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                                <div class="modal fade" id="bs-example-modal-lg-edit-<?= $data->id_fasilitas ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Data - <?= $data->nama_fasilitas ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('admin/update_fasilitas') ?>" enctype="multipart/form-data" method="post">
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Nama Fasilitas</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama_fasilitas" value="<?= ucfirst($data->nama_fasilitas) ?>">
                                                            <input type="hidden" class="form-control" name="id_fasilitas" value="<?= $data->id_fasilitas ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Nama Gedung</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="staticEmail" name="id_gedung">
                                                                <option>-- Pilih Nama Gedung --</option>
                                                                <?php foreach ($data_gedung as $gedung) {
                                                                    if ($data->id_gedung == $gedung->id_gedung) { ?>
                                                                        <option value="<?= $gedung->id_gedung ?>" selected><?= $gedung->nama_gedung ?></option>
                                                                    <?php } else { ?>
                                                                        <option value="<?= $gedung->id_gedung ?>"><?= $gedung->nama_gedung ?></option>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                        <div class="col-sm-9">
                                                            <img src="<?= base_url('/') ?>assets/img/fasilitas/<?= $data->gambar_gedung ?>" width="30%">
                                                            <input type="file" class="form-control-file mt-2" name="gambar_fasilitas" accept=".jpg, .png, .jpeg">
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
                                <div class="modal fade" id="bs-example-modal-lg-hapus-<?= $data->id_fasilitas ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Hapus Data Fasilitas - <?= $data->nama_fasilitas ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda Ingin Menghapus Data Fasilitas Dengan Nama <strong><?= $data->nama_fasilitas ?></strong> ?</p>
                                                <div class="float-right">
                                                    <button data-dismiss="modal" class="btn btn-secondary">Tutup</button>
                                                    <a href="<?= base_url('admin/hapus_fasilitas/' . $data->id_fasilitas) ?>" class="btn btn-danger">Ya, Hapus Data</a>
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
                        <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Fasilitas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/tambah_fasilitas') ?>" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Nama Fasilitas</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_fasilitas" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Nama Gedung</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_gedung" id="staticEmail" required>
                                        <option>-- Pilih Nama Gedung --</option>
                                        <?php foreach ($data_gedung as $data) { ?>
                                            <option value="<?= $data->id_gedung ?>"><?= $data->nama_gedung ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Gambar Fasilitas</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control-file mt-2" name="gambar_fasilitas" id="gambar" accept=".jpg, .png, .jpeg" onchange="tampilkanPreview(this,'preview')">
                                    <p id="hasil" hidden></p>
                                    <img id="preview" class="mt-2 rounded" hidden />
                                </div>
                            </div>
                            <div class="float-right">
                                <button data-dismiss="modal" class="btn btn-secondary">Tutup</button>
                                <button type="submit" class="btn btn-success" id="tombol" disabled>Simpan Data</button>
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