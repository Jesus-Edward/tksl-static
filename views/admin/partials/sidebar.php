<?php 

require __DIR__ . "/../../../server/conn.php";


$user_id = $_SESSION['user_id'];
        $sql = "SELECT email, name, photo, role FROM users WHERE id = ? LIMIT 1";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $user_id);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $user = mysqli_fetch_assoc($result);

$sql = "SELECT COUNT(*) AS pending_orders
        FROM orders
        WHERE status = 'pending'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $pending_orders = $row['pending_orders'];

?>


<div class="container-fluid page-body-wrapper">
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="<?= url('/admin/dashboard') ?>" class="nav-link">
                <div class="nav-profile-image">
                    <img src="<?= url('/public/uploads/admin/' . htmlspecialchars($user['photo'])) ?>" alt="profile" />
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?= $user['name'] ?></span>
                    <!-- <span class="text-secondary text-small"><?= $user['email'] ?></span> -->
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= url('/category/index') ?>">
                <span class="menu-title">Category</span>
                <i class="mdi mdi-stack menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('/product/index') ?>">
                <span class="menu-title">Products</span>
                <i class="mdi mdi-stack menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('/order/index') ?>">
                <span class="menu-title">Orders (<?= $pending_orders  ?>)</span>
                <i class="mdi mdi-stack menu-icon"></i>
            </a>
        </li>

    </ul>
</nav>