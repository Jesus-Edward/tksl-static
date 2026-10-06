<?php 
$adminPageTitle = 'All Categories'; 

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
</style>

<div class="content-wrapper">
    <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Categories</h4>
                  <div class="text-end">
                    <a href="<?= url('/category/create') ?>" class="btn btn-primary">Create</a>
                  </div>

                  <?php if(!empty($_SESSION['success'])): ?>
                    <?php foreach($_SESSION['success'] as $success): ?>
                        <div class="alert alert-warning text-center my-3">
                          <?= htmlspecialchars($success) ?>
                        </div>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['success']); ?>
                  <?php endif; ?>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Name </th>
                          <th> Slug </th>
                          <th> Created At </th>
                          <th> Update At </th>
                          <th> Actions </th>
                        </tr>
                      </thead>
                      <tbody class="cat_table">
                        <?php if(!empty($categories)) { ?>
                            <?php foreach($categories as $category) : ?>
                                <tr>
                                    <td>
                                        <?php echo $category['name']; ?>
                                    </td>
                                    <td> <?php echo $category['slug']; ?> </td>
                                    <td> <?php echo $category['created_at']; ?> </td>
                                    <td> <?php echo $category['updated_at']; ?> </td>
                                    <td>
                                        <a href="<?= url('/category/edit/'). htmlspecialchars($category['slug']) ?>" class="badge badge-info">Edit</a>
                                        <form class="delete-form" action="<?= url('/category/delete/'). htmlspecialchars($category['slug']); ?>" method="POST">
                                          <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                                          <input type="hidden" name="_method" value="DELETE">
                                          <button type="submit" onclick="alert('Are you sure you want to delete this category?')" name="delete-btn" class="destroy badge badge-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else { ?>
                                <tr">
                                    <td colspan="6">
                                        <div class="text-center font-weight-bold">No Categories to display</div>
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