<?php
$adminPageTitle = 'All Categories';

$errors = $_SESSION['errors'] ?? [];

unset($_SESSION['errors']);

requiredRole('admin');
?>



<div class="content-card">

                <div class="card-header-modern">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h5 class="card-title">
                                All Categories
                            </h5>

                            <div class="card-description">
                                Manage and monitor all your categories
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-header-modern">

                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary" href="<?= url('/category/create') ?>">Create Category</a>
                    </div>

                </div>

                <?php if(!empty($_SESSION['success'])): ?>
                    <?php foreach($_SESSION['success'] as $success): ?>
                        <div class="alert alert-warning text-center my-3">
                          <?= htmlspecialchars($success) ?>
                        </div>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['success']); ?>
                  <?php endif; ?>

                <div class="card-body-modern">

                    <div class="table-responsive">

                        <table
                            id="customersTable"
                            class="table table-striped table-hover align-middle"
                            style="width:100%">

                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Slug </th>
                                    <th> Created At </th>
                                    <th> Update At </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (!empty($categories)) { ?>
                                    <?php foreach ($categories as $category) : ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">

                                                    <div>
                                                        <div class="fw-semibold">
                                                            <?= htmlspecialchars($category['name']) ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($category['slug']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($category['created_at']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($category['updated_at']) ?>
                                            </td>

                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a style="text-decoration: none;" href="<?= url('/category/edit/'). htmlspecialchars($category['slug']) ?>" class="badge badge-info">Edit</a>

                                                    <form class="delete-form mb-0" action="<?= url('/category/delete/'). htmlspecialchars($category['slug']); ?>" method="POST">
                                                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" onclick="alert('Are you sure you want to delete this category?')" name="delete-btn" class="destroy badge badge-danger">Delete</button>
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