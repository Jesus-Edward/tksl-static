<?php
$adminPageTitle = 'Edit Product';

$errors = $_SESSION['errors'] ?? [];

unset($_SESSION['errors']);

requiredRole('admin');

?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Products</h4>
                    <div class="text-end">
                        <a href="<?= url('/product/index') ?>" class="btn btn-primary">Back</a>
                    </div>

                    <?php if (!empty($errors)): ?>
                        <?php foreach ($errors as $error): ?>
                            <div class="alert alert-danger my-2 text-center text-white" style="background-color: #f82121;">
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <form action="<?= url('/product/update/' . htmlspecialchars($product['id'] ?? '')) ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="<?= htmlspecialchars($product['name'] ?? '') ?>">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="exampleInputUsername1">Price</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="price" value="<?= htmlspecialchars($product['price'] ?? '') ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputUsername1">Offer Price</label>
                                <input type="text" class="form-control" id="" name="offer_price" value="<?= htmlspecialchars($product['offer_price'] ?? '') ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputUsername1">Categories</label>
                                <?php if (isset($categories)): ?>
                                    <select name="category" id="" class="form-select">
                                        <option value="">Select Category</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option <?= isset($product['category_id']) && (int)$product['category_id'] === (int)$category['id'] ? 'selected' : '' ?>
                                                value="<?= htmlspecialchars($category['id']); ?>"> <?= htmlspecialchars($category['name']) ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="form-label">Quantity</label>
                                <input type="number" name="qty" value="<?= htmlspecialchars($product['qty']) ?>" class="form-control file-upload-info">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="form-label">Images</label>
                                <input type="file" name="image" accept="image/jpeg,image/png,image/webp/avif" class="form-control file-upload-info">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputUsername1">Image 1</label>
                                <input type="file" class="form-control" name="image1" accept="image/jpeg,image/png,image/webp/avif" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputUsername1">Image 2</label>
                                <input type="file" class="form-control" name="image2" accept="image/jpeg,image/png,image/webp/avif" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputUsername1">Image 3</label>
                                <input type="file" class="form-control" name="image3" accept="image/jpeg,image/png,image/webp/avif" >
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" rows="8" id="" class="form-control"> <?= htmlspecialchars($product['description'] ?? '') ?></textarea>
                            </div>
                            
                        </div>
                        <button type="submit" name="update-product" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>