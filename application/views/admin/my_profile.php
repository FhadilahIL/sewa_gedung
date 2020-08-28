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
                <h1>My Profile</h1>
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
                <form action="<?= base_url('admin/update_my') ?>" method="post">
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="<?= $user->nama ?>">
                            <input type="hidden" class="form-control" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" value="<?= $user->username ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="<?= $user->email ?>">
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
            </div>
        </div>

        <!-- *************************************************************** -->
        <!-- End Isi -->
        <!-- *************************************************************** -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->