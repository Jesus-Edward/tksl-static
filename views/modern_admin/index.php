<div class="mb-4">

                <h3 class="page-title">
                    Dashboard
                </h3>

                <div class="page-subtitle">
                    Welcome back. Here's what's happening today.
                </div>

            </div>


            <!-- =========================
             Stats
            ========================= -->

            <div class="row g-4 mb-4">

                <div class="col-xl-3 col-md-6">

                    <div class="stat-card gradient-purple">

                        <div class="stat-icon">
                            <i class="bi bi-card-list"></i>
                        </div>

                        <div class="stat-label">
                            Pending Orders
                        </div>

                        <div class="stat-value">
                            <?= $pending ?? 'No Pending Orders' ?>
                        </div>

                        <div class="stat-change">
                            <i class="bi bi-arrow-up"></i>
                        </div>

                    </div>

                </div>


                <div class="col-xl-3 col-md-6">

                    <div class="stat-card gradient-blue">

                        <div class="stat-icon">
                            <i class="bi bi-card-list"></i>
                        </div>

                        <div class="stat-label">
                            Contacted Orders
                        </div>

                        <div class="stat-value">
                            <?= $contacted ?? 'No Contacted Orders' ?>
                        </div>

                        <div class="stat-change">
                            <i class="bi bi-arrow-up"></i>
                        </div>

                    </div>

                </div>


                <div class="col-xl-3 col-md-6">

                    <div class="stat-card gradient-green">

                        <div class="stat-icon">
                            <i class="bi bi-card-list"></i>
                        </div>

                        <div class="stat-label">
                            Completed Orders
                        </div>

                        <div class="stat-value">
                            <?= $completed ?? 'No Contacted Orders' ?>
                        </div>

                        <div class="stat-change">
                            <i class="bi bi-arrow-up"></i>
                        </div>

                    </div>

                </div>

                <div class="col-xl-3 col-md-6">

                    <div class="stat-card gradient-orange">

                        <div class="stat-icon">
                            <i class="bi bi-card-list"></i>
                        </div>

                        <div class="stat-label">
                            Cancelled Orders
                        </div>

                        <div class="stat-value">
                            <?= $cancelled ?? 'No Contacted Orders' ?>
                        </div>

                        <div class="stat-change">
                            <i class="bi bi-arrow-up"></i>
                        </div>

                    </div>

                </div>

                <div class="col-xl-6 col-md-6">

                    <div class="stat-card gradient-blue">

                        <div class="stat-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>

                        <div class="stat-label">
                            Total Products
                        </div>

                        <div class="stat-value">
                            <?= $product_count ?? 'No Products' ?>
                        </div>

                        <div class="stat-change">
                            <i class="bi bi-arrow-up"></i>
                        </div>

                    </div>

                </div>

                <div class="col-xl-6 col-md-6">

                    <div class="stat-card gradient-green">

                        <div class="stat-icon">
                            <i class="bi bi-card-checklist"></i>
                        </div>

                        <div class="stat-label">
                            Total Orders
                        </div>

                        <div class="stat-value">
                            <?= $order_count ?? 'No Orders to Display' ?>
                        </div>

                        <div class="stat-change">
                            <i class="bi bi-arrow-up"></i>
                        </div>

                    </div>

                </div>

            </div>


            <!-- =========================
             Main Table
        ========================= -->

            <div class="content-card">

                <div class="card-header-modern">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h5 class="card-title">
                                Recent Orders
                            </h5>

                            <div class="card-description">
                                Manage and monitor your latest orders
                            </div>
                        </div>

                        <!-- <button class="btn btn-primary rounded-3 px-3">
                            <i class="bi bi-plus-lg me-1"></i>
                            Add Customer
                        </button> -->

                    </div>

                </div>


                <div class="card-body-modern">

                    <div class="table-responsive">

                        <table
                            id="order-table"
                            class="table table-striped table-hover align-middle"
                            style="width:100%">

                            <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> User </th>
                                    <th> Email </th>
                                    <th> Phone </th>
                                    <th> Product </th>
                                    <th> Status </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (!empty($orders)) { ?>
                                    <?php foreach ($orders as $order) : ?>
                                        <tr>
                                            <td>
                                                <span class="status-badge status-pending">
                                                    <?= htmlentities($order['created_at']) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">

                                                    <div>
                                                        <div class="fw-semibold">
                                                            <?= htmlspecialchars($order['name']) ?>
                                                        </div>

                                                        <small class="text-muted">
                                                            <?= htmlspecialchars($order['order_number']) ?>
                                                        </small>
                                                    </div>

                                                </div>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($order['email']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($order['phone']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($order['product_name']) ?>
                                            </td>

                                            <td>
                                                <?php if($order['status'] === 'pending') { ?>
                                                    <span class="badge badge-warning"><?php echo $order['status']; ?></span>
                                                <?php } elseif($order['status'] === 'contacted') { ?> 
                                                    <span class="badge badge-success"><?php echo $order['status']; ?></span>
                                                <?php } elseif($order['status'] === 'completed') { ?> 
                                                    <span class="badge badge-primary"><?php echo $order['status']; ?></span>
                                                <?php } else { ?> 
                                                    <span class="badge badge-danger"><?php echo $order['status']; ?></span>
                                                <?php } ?>
                                            </td>

                                            <td class="">
                                                <a style="text-decoration: none;" href="<?= url('/view-order/'. htmlspecialchars($order['id'])) ?>" class="badge badge-info">View</a>
                                                
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php } ?>
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>