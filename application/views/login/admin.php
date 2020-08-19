<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('/') ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('/') ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Sewa Gedung</h1>
                </div>
                <hr>
                  <?php if ($this->session->flashdata('gagal')) { ?>
                    <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('gagal'); ?>
                  </div>
                  <?php } else if ($this->session->flashdata('berhasil')) { ?>
                    <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('berhasil'); ?>
                  </div>
                  <?php } ?>
                  <form class="user" method="post" action="<?= base_url('auth/login_admin') ?>">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" placeholder="Masukan Username ...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" placeholder="Masukan Password ...">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('/') ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('/') ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('/') ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>
