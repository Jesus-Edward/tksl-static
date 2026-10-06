<?php 

require __DIR__ . "/../../../server/conn.php";

$user_id = $_SESSION['user_id'];
        $sql = "SELECT email, name, photo, role FROM users WHERE id = ? LIMIT 1";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $user_id);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo isset($adminPageTitle) ? $adminPageTitle : 'Admin Dashboard'; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= url('assets/admin/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/vendors/font-awesome/css/font-awesome.min.css') ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= url('assets/admin/vendors/font-awesome/css/font-awesome.min.css') ?>" />
    <link rel="stylesheet" href="<?= url('assets/admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= url('/assets/admin/css/style.css') ?>">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="<?= url('assets/imgs/logo-bg-removed.png') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.8/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/3.1.1/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo" href="<?= url("/admin/dashboard") ?>"><img src="<?= url("assets/imgs/logo-bg-removed.png") ?>" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="<?= url("/admin/dashboard") ?>"><img src="<?= url("assets/imgs/small-logo-bg-removed.png") ?>" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link" href="<?= url('/admin/details') ?>">
                            <div class="nav-profile-img">
                                <img src="<?= url('/public/uploads/admin/' . htmlspecialchars($user['photo'])) ?>" alt="image">
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><?= $user['name'] ?></p>
                            </div>
                        </a>
                    </li>
                    
                    <li class="nav-item nav-logout d-none d-lg-block">
                        <form action="<?= url('/logout') ?>" method="POST">
                            <button class="nav-link" type="submit" name="Logout-btn">
                                <i class="mdi mdi-logout me-2 text-primary"></i>
                            </button>
                        </form>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>