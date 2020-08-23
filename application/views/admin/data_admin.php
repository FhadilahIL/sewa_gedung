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
                <a href="" class="btn btn-primary mt-2 mb-3">+ Tambah Data Admin</a>
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
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->username ?></td>
                            <td><?= $data->email ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#bs-example-modal-lg-<?= $data->id_user ?>">Lihat Data</button>
                            </td>
                            <div class="modal fade" id="bs-example-modal-lg-<?= $data->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Lihat Data - <?= $data->nama ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Isi -->
        <!-- *************************************************************** -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->