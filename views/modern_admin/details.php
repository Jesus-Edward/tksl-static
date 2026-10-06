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


    <div class="row g-4">

        <!-- =================================
             LEFT COLUMN - PROFILE
        ================================== -->

        <div class="col-xl-8">

            <!-- Profile Information -->
            <div class="content-card mb-4">

                <div class="card-header-modern">

                    <h5 class="card-title">
                        Personal Information
                    </h5>

                    <div class="card-description">
                        Update your personal details and profile information.
                    </div>

                </div>


                <div class="card-body-modern">

                    <!-- Profile Picture -->
                    <div class="profile-header">

                        <div class="profile-avatar-wrapper">

                            <div class="profile-avatar">
                                <div style="width: 82px; height:82px">
                                    <img style="width: 100%; height:100%; border-radius: 8px" src="<?= url('public/uploads/admin/') . htmlspecialchars($user['photo']) ?>" alt="">
                                </div>
                            </div>

                        </div>


                        <div class="profile-header-info">

                            <h5>
                                <?= htmlspecialchars($user['name']) ?>
                            </h5>

                            <p>
                                Administrator
                            </p>

                        </div>

                    </div>


                    <hr class="my-4">


                    <!-- Profile Form -->
                    <form id="profileForm" method="POST"
                          action="<?= url('/admin/update/details') ?>"
                          enctype="multipart/form-data">
                          <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">

                        <div class="row g-4">

                            <!-- First Name -->
                            <div class="col-md-6">

                                <label
                                    for="firstName"
                                    class="form-label">
                                    Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control modern-input"
                                    id="firstName"
                                    name="name"
                                    value="<?= htmlspecialchars($user['name']) ?>"
                                    required>

                            </div>


                            <!-- Email -->
                            <div class="col-md-6">

                                <label
                                    for="email"
                                    class="form-label">
                                    Email Address
                                </label>

                                <div class="input-icon-wrapper">

                                    <i class="bi bi-envelope"></i>

                                    <input
                                        type="email"
                                        class="form-control modern-input input-with-icon"
                                        id="email"
                                        name="email"
                                        value="<?= htmlspecialchars($user['email']) ?>"
                                        required>

                                </div>

                            </div>


                            <!-- Phone -->
                            <div class="col-md-6">

                                <label
                                    for="phone"
                                    class="form-label">
                                    Profile Photo
                                </label>

                                <div class="input-icon-wrapper">

                                    <i class="bi bi-image"></i>

                                    <input
                                        type="file"
                                        class="form-control modern-input input-with-icon"
                                        id=""
                                        name="profile-pic">

                                </div>

                            </div>


                            <!-- Job Title -->
                            <div class="col-md-6">

                                <label
                                    for="jobTitle"
                                    class="form-label">
                                    Job Title
                                </label>

                                <input
                                    type="text"
                                    class="form-control modern-input"
                                    id="jobTitle"
                                    name="job_title"
                                    value="Administrator"
                                    disabled>

                            </div>


                            <!-- Bio -->
                            <div class="col-12">

                                <div class="form-text">
                                    Keep your profile information up to date.
                                </div>

                            </div>

                        </div>


                        <!-- Form Actions -->

                        <div class="form-actions">

                            <button
                                type="submit"
                                name="update-btn"
                                class="btn btn-primary px-4">
                                <i class="bi bi-check2 me-1"></i>
                                Save Changes
                            </button>

                        </div>

                    </form>

                </div>

            </div>


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


        <!-- =================================
             RIGHT COLUMN
        ================================== -->

        <div class="col-xl-4">

            <!-- Account Summary -->

            <div class="content-card mb-4">

                <div class="card-header-modern">

                    <h5 class="card-title">
                        Account Overview
                    </h5>

                </div>


                <div class="card-body-modern">

                    <div class="account-overview">

                        <div class="overview-item">

                            <div class="overview-icon purple">
                                <i class="bi bi-person"></i>
                            </div>

                            <div>
                                <small>
                                    Account Type
                                </small>

                                <strong>
                                    <?= htmlspecialchars($user['role']) ?>
                                </strong>
                            </div>

                        </div>


                        <div class="overview-item">

                            <div class="overview-icon blue">
                                <i class="bi bi-calendar3"></i>
                            </div>

                            <div>
                                <small>
                                    Member Since
                                </small>

                                <strong>
                                    <?= timeAgo(htmlspecialchars($user['created_at'])) ?>
                                </strong>
                            </div>

                        </div>


                        <div class="overview-item">

                            <div class="overview-icon green">
                                <i class="bi bi-check-circle"></i>
                            </div>

                            <div>
                                <small>
                                    Account Status
                                </small>

                                <strong class="text-success">
                                    Active
                                </strong>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Security Status -->

            <div class="content-card security-card">

                <div class="card-body-modern">

                    <div class="security-status-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h5 class="mt-3">
                        Your account is secure
                    </h5>

                    <p class="text-muted small">
                        Your password was last updated <?= timeAgo(htmlspecialchars($user['password_updated_at'])) ?? timeAgo(htmlspecialchars($user['updated_at'])) ?>.
                        We recommend changing your password regularly.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>