<?php
// session_start();
$adminPageTitle = 'All Products';

$errors = $_SESSION['errors'] ?? [];

unset($_SESSION['errors']);

requiredRole('admin');
?>


<div class="content-card">

    <div class="card-header-modern">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h5 class="card-title">
                    All Products
                </h5>

                <div class="card-description">
                    Manage and monitor all your products
                </div>
            </div>

        </div>
        <div class="card-header-modern">

                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary" href="<?= url('/product/create') ?>">Create Product</a>
                    </div>

                </div>

    </div>


    <div class="card-body-modern">

        <div class="table-responsive">

            <table
                id="product-table"
                class="table table-striped table-hover align-middle"
                style="width:100%">

                <thead>
                    <tr>
                        <th> Image </th>
                        <th> Name </th>
                        <th> Slug </th>
                        <th> Category </th>
                        <th> Qty </th>
                        <th> Price </th>
                        <th> Offer Price </th>
                        <th> Created At </th>
                        <th> Update At </th>
                        <th> Actions </th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($products)) { ?>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td>
                                    <div style="width: 70px; height:70px; border-radius: 50%">
                                        <img style="height: 100%; width:100%; border-radius: 50%" src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image'])) ?>" alt="">
                                    </div>
                                </td>
                                <td>
                                    <?php echo $product['name']; ?>
                                </td>
                                <td>
                                    <?php echo $product['slug']; ?>
                                </td>
                                <td> <?php echo $product['category_name']; ?> </td>
                                <td> <?php echo $product['qty']; ?> </td>
                                <td>
                                    <?php echo $product['price']; ?>
                                </td>
                                <td>
                                    <?php echo $product['offer_price'] ?? 0; ?>
                                </td>
                                <td> <?php echo $product['created_at']; ?> </td>
                                <td> <?php echo $product['updated_at']; ?> </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="<?= url('/product/edit/' . htmlspecialchars($product['slug'])); ?>" class="badge badge-info">Edit</a>
                                        <form class="delete-form mb-0" action="<?= url('/product/delete/' . htmlspecialchars($product['id'])); ?>" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                                            <button type="submit" onclick="alert('Are you sure you want to delete this product?')" name="delete-btn" class="destroy badge badge-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } ?>
                </tbody>

            </table>

        </div>

    </div>

</div>