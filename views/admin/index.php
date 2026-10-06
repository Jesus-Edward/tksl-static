<?php
// dd(__DIR__);
// require __DIR__ . "/../../middlewares/AuthenticatedUser.php";

requiredRole('admin');
?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Pending Orders <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"># <?= $pending ?? 'No Pending Orders' ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Contacted Orders <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"># <?= $contacted ?? 'No Contacted Orders' ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Completed Orders <i class="mdi mdi-diamond mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"># <?= $completed ?? 'No Completed Orders' ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Cancelled Orders <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"># <?= $cancelled ?? 'No Cancelled Orders' ?></h2>
                </div>
            </div>
        </div>
    </div>

     <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Orders</h4>

                    <?php if (!empty($_SESSION['errors'])): ?>
                        <?php foreach ($_SESSION['errors'] as $error): ?>
                            <div class="alert alert-success text-center my-3 font-weight-bold">
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
                    <?php if (!empty($_SESSION['success'])): ?>
                        <?php foreach ($_SESSION['success'] as $success): ?>
                            <div class="alert alert-warning text-center my-3 font-weight-bold">
                                <?= htmlspecialchars($success) ?>
                            </div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table" id="order-table">
                            <thead>
                                <tr>
                                    <th> User </th>
                                    <th> Email </th>
                                    <th> Phone </th>
                                    <th> Company </th>
                                    <th> Address </th>
                                    <th> City </th>
                                    <th> Product </th>
                                    <th> Price </th>
                                    <th> Qty </th>
                                    <th> Status </th>
                                    <th> Created At </th>
                                    <th> Update At </th>
                                </tr>
                            </thead>
                            <tbody class="cat_table">
                                <?php if (!empty($orders)) { ?>
                                    <?php foreach ($orders as $order) : ?>
                                        <tr>
                                            <td>
                                                <?= htmlspecialchars($order['name']) ?>
                                            </td>
                                            <td>
                                                <?php echo $order['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $order['phone']; ?>
                                            </td>
                                            <td> <?php echo $order['company']; ?> </td>
                                            <td> <?php echo $order['address']; ?> </td>
                                            <td> <?php echo $order['city']; ?> </td>
                                            <td> <?php echo $order['product_name']; ?> </td>
                                            <td>
                                                <?php echo $order['price']; ?>
                                            </td>
                                            <td>
                                                <?php echo $order['quantity']; ?>
                                            </td>
                                            <td>
                                                <?php echo $order['status']; ?>
                                            </td>
                                            <td> <?php echo $order['created_at']; ?> </td>
                                            <td> <?php echo $order['updated_at']; ?> </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <tr">
                                        <td colspan="12">
                                            <div class="text-center font-weight-bold">No Orders to display</div>
                                        </td>
                                        </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
