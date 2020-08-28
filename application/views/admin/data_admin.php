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
                <h1>Data Admin</h1>
                <button type="button" class="btn btn-info mt-2 mb-3" data-toggle="modal" data-target="#bs-example-modal-lg-tambah">+ Tambah Data Admin</button>
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
                        <th style="min-width: 150px;">Username</th>
                        <th style="min-width: 300px;">Email</th>
                        <th style="min-width: 150px;" class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($admin as $data) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?>.</td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->username ?></td>
                                <td><?= $data->email ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#bs-example-modal-lg-<?= $data->id_user ?>">Lihat Data</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="bs-example-modal-lg-<?= $data->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Lihat Data - <?= $data->nama ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $data->nama ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $data->email ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                                                <div class="col-sm-10">
                                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $data->username ?>">
                                                </div>
                                            </div>
                                            <button data-dismiss="modal" class="btn btn-secondary float-right">Tutup</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="bs-example-modal-lg-tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/tambah_admin') ?>" method="post">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Simpan Data</button>
                        </form>
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