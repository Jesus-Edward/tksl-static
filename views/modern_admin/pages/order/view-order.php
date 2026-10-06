<?php
// session_start();
$adminPageTitle = 'Single Order';

$errors = $_SESSION['errors'] ?? [];

unset($_SESSION['errors']);

requiredRole('admin');
?>

<div class="content-wrapper">
    <div class="container-fluid py-4">

        <!-- Page Header -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

            <div>
                <h1 class="h3 mb-1">
                    Order for <?= htmlspecialchars($order['product_name']) ?? '' ?>
                </h1>
            </div>

            <div class="mt-3 mt-md-0">
                <a href="<?= url('/order/index') ?>" class="btn btn-outline-secondary me-2">
                    &larr; Back to Orders
                </a>
            </div>

        </div>

        <!-- Order Status -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">

                <div class="row g-3">

                    <div class="col-md-4">
                        <div class="text-muted small">
                            Order Status
                        </div>

                        <span class="badge bg-warning text-dark mt-1" id="status-<?= htmlspecialchars($order['id']) ?? '' ?>">
                            <?= htmlspecialchars($order['status']) ?? '' ?>
                        </span>
                    </div>

                    <div class="col-md-4">
                        <div class="text-muted small">
                            Product Name
                        </div>

                        <span class="badge bg-success mt-1">
                            <?= htmlspecialchars($order['product_name']) ?? '' ?>
                        </span>
                    </div>

                    <div class="col-md-4">
                        <div class="text-muted small">
                            Order Time
                        </div>

                        <div class="fw-semibold mt-1">
                            Placed <?= htmlspecialchars(timeAgo($order['created_at'])) ?? '' ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="row g-4">

            <!-- Main Content -->
            <div class="col-lg-8">

                <!-- Order Items -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            Order Items
                        </h5>
                    </div>

                    <div class="card-body p-0">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-end">Price</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>

                                        <td>
                                            <div class="fw-semibold">
                                                <?= htmlspecialchars($order['product_name']) ?>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <?= htmlspecialchars($order['quantity']) ?>
                                        </td>

                                        <td class="text-end">
                                            ₦<?= number_format($order['price'], 2) ?>
                                        </td>

                                        <td class="text-end fw-semibold">
                                            ₦<?= number_format($order['total_amount'], 2) ?>
                                        </td>

                                    </tr>


                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                <!-- Order Summary -->
                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            Order Summary
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Company</span>
                            <span>
                                <?= $order['company'] ?>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Address</span>
                            <span>
                                <?= $order['address'] ?>
                            </span>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">City</span>
                            <span>
                                <?= $order['city'] ?>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Note</span>
                            <p>
                                <?= $order['notes'] ?>
                            </p>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <span class="fs-5 fw-bold">
                                Total
                            </span>

                            <span class="fs-5 fw-bold text-primary">
                                ₦<?= number_format($order['total_amount'], 2) ?>
                            </span>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">

                <!-- Customer Information -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            Customer
                        </h5>
                    </div>

                    <div class="card-body">

                        <h6 class="mb-1">
                            <?= htmlspecialchars($order['name']) ?>
                        </h6>

                        <p class="text-muted mb-2">
                            Customer
                        </p>

                        <div class="mb-2">
                            <strong>Email:</strong><br>

                            <a
                                href="mailto:<?= htmlspecialchars($order['email']) ?>"
                                class="text-decoration-none">
                                <?= htmlspecialchars($order['email']) ?>
                            </a>
                        </div>

                        <div>
                            <strong>Phone:</strong><br>

                            <?= htmlspecialchars($order['phone']) ?>
                        </div>

                    </div>

                </div>

                <!-- Shipping Address -->
                <!-- <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            Shipping Address
                        </h5>
                    </div>

                    <div class="card-body">

                        <p class="mb-0">
                            <?= htmlspecialchars($order['customer']['name']) ?><br>

                            <?= htmlspecialchars($order['shipping']['address']) ?><br>

                            <?= htmlspecialchars($order['shipping']['city']) ?>,
                            <?= htmlspecialchars($order['shipping']['state']) ?><br>

                            <?= htmlspecialchars($order['shipping']['country']) ?>
                        </p>

                    </div>

                </div> -->

                <!-- Order Actions -->
                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">
                            Order Actions
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="d-grid gap-2">

                            <button class="btn btn-success status-btn" data-id="<?= $order['id'] ?>" data-status="completed">
                                Mark as Completed
                            </button>

                            <button class="btn btn-warning status-btn" data-id="<?= $order['id'] ?>" data-status="contacted">
                                Mark as Contacted
                            </button>

                            <button class="btn btn-outline-danger status-btn" data-id="<?= $order['id'] ?>" data-status="cancelled">
                                Mark as Cancelled
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>