<?php
$adminPageTitle = 'All Orders';

$errors = $_SESSION['errors'] ?? [];

unset($_SESSION['errors']);

requiredRole('admin');
?>



<div class="content-card">

                <div class="card-header-modern">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h5 class="card-title">
                                All Orders
                            </h5>

                            <div class="card-description">
                                Manage and monitor all your orders
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
                            id="order-able"
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