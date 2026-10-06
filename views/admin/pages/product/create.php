<?php 
$adminPageTitle = 'Create Product'; 

$errors = $_SESSION['errors'] ?? [];

unset($_SESSION['errors']);

// require_once __DIR__ . "/../../../../middleware/csrf.middleware.php";
requiredRole('admin');
?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Products</h4>
                    <div class="text-end">
                        <a href="<?= url('/product/index') ?>" class="btn btn-primary">Back</a>
                    </div>

                    <?php if(!empty($errors)): ?>
                        <?php foreach($errors as $error): ?>
                            <div class="alert alert-danger my-2 text-center text-white" style="background-color: #f82121;">
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <form action="<?= url('/product/store') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="name">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Category</label>
                                <?php if(isset($categories)): ?>
                                    <select name="category" id="" class="form-select">
                                        <option value="">Select Category</option>
                                        <?php foreach($categories as $category): ?>
                                            <option value="<?= htmlspecialchars($category['id']); ?>"><?= htmlspecialchars($category['name']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Offer Price</label>
                                <input type="text" name="offer_price" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Quantity</label>
                                <input type="number" name="qty" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Image</label>
                                <input type="file" name="images[]" multiple class="form-control">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" rows="8" id="" class="form-control"></textarea>
                            </div>


                        </div>
                        <button type="submit" name="create-product" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>