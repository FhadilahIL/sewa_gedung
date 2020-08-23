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
                <a href="" class="btn btn-primary mt-2 mb-3">+ Tambah Data Penyewa</a>
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
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td><?= ucfirst($data->nama_penyewa) ?></td>
                            <td><?= $data->email ?></td>
                            <td><?= $data->jenis_kelamin ?></td>
                            <td><?= $data->alamat ?></td>
                            <td><?= $data->no_tlp ?></td>
                            <td class="text-center"><a href="<?= base_url('admin/edit_penyewa/1') ?>" class="btn btn-warning btn-sm">Edit Data</a></td>
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