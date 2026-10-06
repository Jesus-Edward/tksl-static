<?php 
// session_start();
$adminPageTitle = 'All Products'; 

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
                  <h4 class="card-title">All Products</h4>
                  <div class="text-end">
                    <a href="<?= url('/product/create') ?>" class="btn btn-primary">Create</a>
                  </div>

                  <?php if(!empty($_SESSION['errors'])): ?>
                    <?php foreach($_SESSION['errors'] as $error): ?>
                            <div class="alert alert-warning text-center my-3 font-weight-bold">
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['errors']); ?>
                    <?php endif; ?>
                    
                  <?php if(!empty($_SESSION['success'])): ?>
                    <?php foreach($_SESSION['success'] as $success): ?>
                            <div class="alert alert-warning text-center my-3 font-weight-bold">
                                <?= htmlspecialchars($success) ?>
                            </div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
                  <div class="table-responsive">
                    <table class="table" id="product-table">
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
                      <tbody class="cat_table">
                        <?php if(!empty($products)) { ?>
                            <?php foreach($products as $product) : ?>
                                <tr>
                                    <td>
                                        <img src="<?= url('/public/uploads/products/'. htmlspecialchars($product['image'])) ?>" alt="">
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
                                      <?php echo $product['offer_price'] ?? 'N/A'; ?>
                                    </td>
                                    <td> <?php echo $product['created_at']; ?> </td>
                                    <td> <?php echo $product['updated_at']; ?> </td>
                                    <td>
                                        <a href="<?= url('/product/edit/' . htmlspecialchars($product['slug'])); ?>" class="badge badge-info">Edit</a>
                                        <form class="delete-form" action="<?= url('/product/delete/' . htmlspecialchars($product['id'])); ?>" method="POST">
                                          <input type="hidden" name="_method" value="DELETE">
                                          <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                                          <button type="submit" onclick="alert('Are you sure you want to delete this product?')" name="delete-btn" class="destroy badge badge-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else { ?>
                                <tr">
                                    <td colspan="6">
                                        <div class="text-center font-weight-bold">No Products to display</div>
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