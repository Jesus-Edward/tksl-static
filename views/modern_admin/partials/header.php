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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo isset($adminPageTitle) ? $adminPageTitle : 'Admin Dashboard'; ?></title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

    <!-- DataTables -->
    <link
        href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= url('assets/dash/styles.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/dash/admin-details.css') ?>">
    <link rel="shortcut icon" href="<?= url('assets/imgs/small-logo-bg-removed.png') ?>" />


</head>

<body>

    <main class="main">


        <!-- =================================================
         TOPBAR
    ================================================== -->

        <header class="topbar">


            <!-- Left -->

            <div class="topbar-left">

                <!-- Mobile menu -->

                <button
                    type="button"
                    class="btn btn-light mobile-menu-btn"
                    id="mobileMenuBtn"
                    title="Open menu">
                    <i class="bi bi-list"></i>
                </button>


                <!-- Desktop sidebar toggle -->

                <button
                    type="button"
                    class="sidebar-toggle"
                    id="desktopSidebarToggle"
                    title="Toggle sidebar">
                    <i class="bi bi-layout-sidebar-inset-reverse"></i>
                </button>

            </div>



            <!-- Right -->

            <div class="d-flex align-items-center gap-3">

                <!-- User -->

                <div class="dropdown">

                    <button
                        type="button"
                        class="user-dropdown-btn"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <div class="avatar">
                            <img src="<?= url('/public/uploads/admin/' . htmlspecialchars($user['photo'])) ?>" style="width: 100% !important height: 100% !important; border-radius: 500% !important;" alt="JD">
                        </div>


                        <div class="user-info">

                            <div class="fw-semibold small">
                                <?= htmlspecialchars($user['name']) ?>
                            </div>

                            <div class="text-muted small">
                                Administrator
                            </div>

                        </div>


                        <i class="bi bi-chevron-down user-chevron"></i>

                    </button>


                    <!-- User dropdown -->

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">


                        <li>

                            <div class="user-dropdown-header">

                                <div class="avatar avatar-small">
                                    <img src="<?= url('/public/uploads/admin/' . htmlspecialchars($user['photo'])) ?>" style="width: 100% !important height: 100% !important; border-radius: 500% !important;" alt="JD">
                                </div>

                                <div>

                                    <div class="fw-semibold">
                                        <?= htmlspecialchars($user['name']) ?>
                                    </div>

                                    <small class="text-muted">
                                        <?= htmlspecialchars($user['email']) ?>
                                    </small>

                                </div>

                            </div>

                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="<?= url('/admin/details') ?>"
                                data-page="profile">
                                <i class="bi bi-person"></i>
                                View Profile
                            </a>

                            <a
                                class="dropdown-item"
                                href="<?= url('/admin/change/password') ?>"
                                data-page="profile">
                                <i class="bi bi-gear"></i>
                                Change Password
                            </a>

                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>

                        <form action="<?= url('/logout') ?>" method="POST">
                            <button
                                class="dropdown-item text-danger"
                                type="submit"
                                name="Logout-btn">
                                <i class="bi bi-box-arrow-right"></i>
                                Logout
                            </button>
                        </form>
                        </li>

                    </ul>

                </div>

            </div>

        </header>