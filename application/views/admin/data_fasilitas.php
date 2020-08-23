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
                <a href="" class="btn btn-primary mt-2 mb-3">+ Tambah Data Gedung</a>
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
                                <td class="text-center"><a href="<?= base_url('admin/edit_gedung/') . $data->id_gedung ?>" class="btn btn-warning btn-sm">Edit</a> <a href="<?= base_url('admin/hapus_gedung/') . $data->id_gedung ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                            </tr>
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