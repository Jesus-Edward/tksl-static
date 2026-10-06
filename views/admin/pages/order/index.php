<?php
// session_start();
$adminPageTitle = 'All Orders';

$errors = $_SESSION['errors'] ?? [];

unset($_SESSION['errors']);

requiredRole('admin');
?>

<style>
    .delete-form {
        display: inline !important;
    }

    .destroy {
        background-color: red !important;
    }

    .table-responsive .cat_table a {
        text-decoration: none !important;
    }

    .table.dataTable td, 
.table.dataTable th {
    padding: 8px 12px !important; /* Adjust values to your preference */
}
</style>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Orders</h4>

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
                        <table class="table table-striped table-hover table-borderless" id="order-table">
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
                            <tbody class="cat_table">
                                <?php if (!empty($orders)) { ?>
                                    <?php foreach ($orders as $order) : ?>
                                        <tr>
                                            <td> 
                                                <span class="badge badge-primary">
                                                    <?php echo $order['created_at']; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($order['name']) ?>
                                            </td>
                                            <td>
                                                <?php echo $order['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $order['phone']; ?>
                                            </td>
                                            <td> <?php echo $order['product_name']; ?> </td>
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
                                            
                                            <td>
                                                <a href="<?= url('/view-order/'. htmlspecialchars($order['id'])) ?>" class="badge badge-info">View</a>
                                                <!-- <button type="button" class="badge badge-info update-status-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" data-id="<?= $order['id']; ?>"
                                                    data-status="<?= htmlspecialchars($order['status']); ?>" >Edit</button> -->
                                            </td>
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




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Order Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= url('/update-status') ?>" method="post">
                    <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                    <input type="hidden" name="order_id" id="modalOrderId">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="">Status</label>
                            <select name="status" id="modalStatus" class="form-select">
                                <option value="">Choose Status</option>
                                <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="contacted" <?php $order['status'] === 'contacted' ? 'selected' : "" ?>>Contacted</option>
                                <option value="completed" <?php $order['status'] === 'completed' ? 'selected' : "" ?>>Completed</option>
                                <option value="cancelled" <?php $order['status'] === 'cancelled' ? 'selected' : "" ?>>Cancelled</option>
                                
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="submitBtn" name="update-status-btn" class="btn btn-primary" disabled>Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.update-status-btn').forEach(button => {

        button.addEventListener('click', () => {

            document.getElementById('modalOrderId').value = button.dataset.id;
            document.getElementById('modalStatus').value = button.dataset.status;

        });

    });
</script>
