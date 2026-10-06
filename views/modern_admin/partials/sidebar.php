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


<!-- =====================================================
     SIDEBAR
===================================================== -->

    <aside
        class="sidebar"
        id="sidebar">

        <!-- Brand -->

        <div class="brand">
            
            <div class="brand-icon" id="main-icon">
                <img style="height: 50px; width:100%" src="<?= url('assets/imgs/small-logo-bg-removed.png') ?>" alt="">
            </div>

            <span>
                <img style="height: 50px; width:100%" src="<?= url('assets/imgs/logo-bg-removed.png') ?>" alt="">
            </span>

        </div>


        <!-- Main -->

        <div class="sidebar-label">
            Main
        </div>


        <nav class="sidebar-nav">

            <a
                href="<?= url('/admin/dashboard') ?>"
                class="nav-link">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>

        </nav>


        <!-- Management -->

        <div class="sidebar-label">
            Management
        </div>


        <nav class="sidebar-nav">

            <a
                href="<?= url('/product/index') ?>"
                class="nav-link">
                <i class="bi bi-box-seam"></i>
                <span>Products</span>
            </a>


            <a
                href="<?= url('/category/index') ?>"
                class="nav-link">
                <i class="bi bi-tags"></i>
                <span>Category</span>
            </a>


            <a
                href="<?= url('/order/index') ?>"
                class="nav-link">
                <i class="bi bi-card-list"></i>
                <span>Orders (<?= $pending_orders  ?>)</span>
            </a>

            <hr>

            
            <form action="<?= url('/logout') ?>" method="POST">
                <button
                    style="background: #f4f3ff;"
                    class="nav-link text-danger text-center w-100"
                    type="submit"
                    name="Logout-btn">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>
        </nav>

        <button
            type="button"
            class="sidebar-collapse-btn"
            id="sidebarCollapseBtn"
            title="Collapse sidebar">

            <i class="bi bi-chevron-left"></i>

            <span>
                Collapse sidebar
            </span>

        </button>

    </aside>


    <!-- Mobile overlay -->

    <div class="sidebar-overlay" id="sidebarOverlay"></div>