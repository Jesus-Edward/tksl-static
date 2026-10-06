<?php
protectAuthPage();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register | Trans Kontinental Services Ltd.</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= url('assets/admin/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/vendors/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/css/style.css') ?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= url('assets/imgs/small-logo-bg-removed.png') ?>" type="image/x-icon">
  </head>
  <style>
    .home-icon a {
      text-decoration: none !important;
      color: #00001c;
      font-family: monospace;
    }
    .fa-home {
      font-size: 1.2rem;
      font-weight: bold;
      color: #00001c;
    }

  </style>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth" style="background-color: #00001c;">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?= url('assets/imgs/logo-bg-removed.png') ?>">
                </div>
                <div class="mb-3 home-icon">
                  <a href="<?= url('/') ?>">
                    <i class="fa fa-home"></i> <span>-> HOME</span>
                  </a>
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign up to continue.</h6>
                <?php if (!empty($_SESSION['errors'])) { ?>
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <div class="mx-auto my-2" style="background-color: red; color:white; padding:8px; text-align:center; border-radius:8px">
                            <i class="fa-solid fa-circle-info"></i> <?php echo $error; ?>
                        </div>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['errors']); ?>
                <?php } ?>
                <form class="pt-3" action="<?= url("/store") ?>" method="post">
                    <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                  <div class="form-group">
                    <input type="name" name="name" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm-password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password" required>
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" name="signup-btn" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="<?= url('/admin/master/admin/master/login') ?>" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./assets/admin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./assets/admin/js/off-canvas.js"></script>
    <script src="./assets/admin/js/misc.js"></script>
    <script src="./assets/admin/js/settings.js"></script>
    <script src="./assets/admin/js/todolist.js"></script>
    <script src="./assets/admin/js/jquery.cookie.js"></script>
    <!-- endinject -->
  </body>
</html>