<?php 
$adminPageTitle = 'Create Category'; 

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
                    <h4 class="card-title">Create Categories</h4>
                    <div class="text-end">
                        <a href="/category/index" class="btn btn-primary">Back</a>
                    </div>

                    <?php if(!empty($errors)): ?>
                        <?php foreach($errors as $error): ?>
                            <div class="alert alert-danger my-2 text-center text-white" style="background-color: #f82121;">
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <form action="<?= url('/category/store') ?>" method="post">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="name">
                            </div>
                        </div>
                        <button type="submit" name="create-category" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>