<?php

requiredRole('admin');
?>


<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard
        </h3>
    </div>

    <div class="container py-5">

    <?php if(!empty($_SESSION['errors'])): ?>
    <?php foreach($_SESSION['errors'] as $error): ?>
            <div class="alert alert-danger text-center my-3 font-weight-bold">
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
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="mb-4">Admin Profile</h4>

                    <!-- Current Details -->
                    <div class="text-center mb-4">
                        <img
                            src="<?= url('/public/uploads/admin/' . $user['photo']) ?>"
                            alt="Profile"
                            class="rounded-circle border"
                            width="100"
                            height="100"
                            style="object-fit: cover;"
                        >

                        <h5 class="mt-3 mb-1">
                            <?= htmlspecialchars($user['name']) ?>
                        </h5>

                        <p class="text-muted mb-0">
                            <?= htmlspecialchars($user['email']) ?>
                        </p>
                    </div>

                    <hr>

                    <!-- Update Form -->
                    <form method="POST"
                          action="<?= url('/admin/update/details') ?>"
                          enctype="multipart/form-data">
                          <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="<?= htmlspecialchars($user['name']) ?>"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="<?= htmlspecialchars($user['email']) ?>"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Profile Image</label>
                            <input
                                type="file"
                                name="profile-pic"
                                class="form-control"
                                accept="image/*"
                            >
                        </div>

                        <button
                            type="submit"
                            name="update-btn"
                            class="btn btn-primary w-100">
                            Update Profile
                        </button>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    <h4 class="mb-4">Update Password</h4>

                    <!-- Current Details -->
                    <div class="text-center mb-4">
                        <img
                            src="<?= url('/public/uploads/admin/' . $user['photo']) ?>"
                            alt="Profile"
                            class="rounded-circle border"
                            width="100"
                            height="100"
                            style="object-fit: cover;"
                        >

                        <h5 class="mt-3 mb-1">
                            <?= htmlspecialchars($user['name']) ?>
                        </h5>

                        <p class="text-muted mb-0">
                            <?= htmlspecialchars($user['email']) ?>
                        </p>
                    </div>

                    <hr>

                    <!-- Update Form -->
                    <form method="POST" action="<?= url('/admin/update/password') ?>">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="<?= htmlspecialchars($user['email']) ?>"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input
                                type="password"
                                name="confirm_password"
                                class="form-control"
                                required
                            >
                        </div>

                        <button
                            type="submit"
                            name="change-password-btn"
                            class="btn btn-primary w-100">
                            Update Password
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


</div>