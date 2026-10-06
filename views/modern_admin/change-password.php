<?php
// dd(__DIR__);
// require __DIR__ . "/../../middlewares/AuthenticatedUser.php";

requiredRole('admin');
?>

<div class="page-content">

    <!-- Page Header -->
    <div class="mb-4">
        <h3 class="page-title">
            Profile & Security
        </h3>

        <div class="page-subtitle">
            Manage your personal information and account security.
        </div>
    </div>

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


    <div class="row justify-content-center align-item-center g-4">

        <div class="col-xl-8">
            <!-- =================================
                 PASSWORD
            ================================== -->

            <div class="content-card">

                <div class="card-header-modern">

                    <div class="d-flex align-items-center gap-3">

                        <div class="security-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>

                        <div>

                            <h5 class="card-title">
                                Change Password
                            </h5>

                            <div class="card-description">
                                Keep your account secure with a strong password.
                            </div>

                        </div>

                    </div>

                </div>


                <div class="card-body-modern">

                    <form id="passwordForm" action="<?= url('/admin/update/password') ?>" method="post">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                        <!-- Email -->

                        <div class="mb-4">

                            <label
                                for="currentPassword"
                                class="form-label">
                                Email
                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="email"
                                    class="form-control modern-input"
                                    value="<?= htmlspecialchars($user['email']) ?>"
                                    name="email"
                                    required>

                            </div>

                        </div>


                        <div class="row g-4">

                            <!-- New Password -->

                            <div class="col-md-6">

                                <label
                                    for="newPassword"
                                    class="form-label">
                                    New Password
                                </label>

                                <div class="password-wrapper">

                                    <input
                                        type="password"
                                        class="form-control modern-input"
                                        id="newPassword"
                                        name="password"
                                        placeholder="Enter new password"
                                        required>

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-target="newPassword">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                </div>

                            </div>


                            <!-- Confirm Password -->

                            <div class="col-md-6">

                                <label
                                    for="confirmPassword"
                                    class="form-label">
                                    Confirm New Password
                                </label>

                                <div class="password-wrapper">

                                    <input
                                        type="password"
                                        class="form-control modern-input"
                                        id="confirmPassword"
                                        name="confirm_password"
                                        placeholder="Confirm new password"
                                        required>

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-target="confirmPassword">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                </div>

                            </div>

                        </div>


                        <!-- Password Requirements -->

                        <div class="password-requirements mt-4">

                            <div class="requirements-title">
                                Password requirements
                            </div>

                            <div class="requirements-list">

                                <div
                                    class="requirement"
                                    id="lengthRequirement">
                                    <i class="bi bi-circle"></i>
                                    At least 8 characters
                                </div>

                                <div
                                    class="requirement"
                                    id="uppercaseRequirement">
                                    <i class="bi bi-circle"></i>
                                    One uppercase letter
                                </div>

                                <div
                                    class="requirement"
                                    id="numberRequirement">
                                    <i class="bi bi-circle"></i>
                                    One number
                                </div>

                                <div
                                    class="requirement"
                                    id="specialRequirement">
                                    <i class="bi bi-circle"></i>
                                    One special character
                                </div>

                            </div>

                        </div>


                        <div class="form-actions">

                            <button
                                type="submit"
                                class="btn btn-primary px-4" name="change-password-btn">
                                <i class="bi bi-shield-check me-1"></i>
                                Update Password
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>