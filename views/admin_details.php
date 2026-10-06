
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
                                JD
                            </div>

                            <button
                                type="button"
                                class="profile-camera"
                                title="Change profile picture"
                            >
                                <i class="bi bi-camera-fill"></i>
                            </button>

                        </div>


                        <div class="profile-header-info">

                            <h5>
                                John Doe
                            </h5>

                            <p>
                                Administrator
                            </p>

                            <button
                                type="button"
                                class="btn btn-sm btn-light"
                                id="changePhotoBtn"
                            >
                                <i class="bi bi-image me-1"></i>
                                Change Photo
                            </button>

                        </div>

                    </div>


                    <hr class="my-4">


                    <!-- Profile Form -->

                    <form id="profileForm">

                        <div class="row g-4">

                            <!-- First Name -->
                            <div class="col-md-6">

                                <label
                                    for="firstName"
                                    class="form-label"
                                >
                                    First Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control modern-input"
                                    id="firstName"
                                    name="first_name"
                                    value="John"
                                    required
                                >

                            </div>


                            <!-- Last Name -->
                            <div class="col-md-6">

                                <label
                                    for="lastName"
                                    class="form-label"
                                >
                                    Last Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control modern-input"
                                    id="lastName"
                                    name="last_name"
                                    value="Doe"
                                    required
                                >

                            </div>


                            <!-- Email -->
                            <div class="col-md-6">

                                <label
                                    for="email"
                                    class="form-label"
                                >
                                    Email Address
                                </label>

                                <div class="input-icon-wrapper">

                                    <i class="bi bi-envelope"></i>

                                    <input
                                        type="email"
                                        class="form-control modern-input input-with-icon"
                                        id="email"
                                        name="email"
                                        value="john@example.com"
                                        required
                                    >

                                </div>

                            </div>


                            <!-- Phone -->
                            <div class="col-md-6">

                                <label
                                    for="phone"
                                    class="form-label"
                                >
                                    Phone Number
                                </label>

                                <div class="input-icon-wrapper">

                                    <i class="bi bi-telephone"></i>

                                    <input
                                        type="tel"
                                        class="form-control modern-input input-with-icon"
                                        id="phone"
                                        name="phone"
                                        value="+234 801 234 5678"
                                    >

                                </div>

                            </div>


                            <!-- Job Title -->
                            <div class="col-md-6">

                                <label
                                    for="jobTitle"
                                    class="form-label"
                                >
                                    Job Title
                                </label>

                                <input
                                    type="text"
                                    class="form-control modern-input"
                                    id="jobTitle"
                                    name="job_title"
                                    value="Administrator"
                                >

                            </div>


                            <!-- Department -->
                            <div class="col-md-6">

                                <label
                                    for="department"
                                    class="form-label"
                                >
                                    Department
                                </label>

                                <select
                                    class="form-select modern-input"
                                    id="department"
                                    name="department"
                                >
                                    <option selected>
                                        Administration
                                    </option>

                                    <option>
                                        Management
                                    </option>

                                    <option>
                                        Finance
                                    </option>

                                    <option>
                                        Operations
                                    </option>

                                    <option>
                                        Support
                                    </option>
                                </select>

                            </div>


                            <!-- Bio -->
                            <div class="col-12">

                                <label
                                    for="bio"
                                    class="form-label"
                                >
                                    About
                                </label>

                                <textarea
                                    class="form-control modern-input"
                                    id="bio"
                                    name="bio"
                                    rows="4"
                                    placeholder="Tell us a little about yourself..."
                                >Administrator of the platform.</textarea>

                                <div class="form-text">
                                    Keep your profile information up to date.
                                </div>

                            </div>

                        </div>


                        <!-- Form Actions -->

                        <div class="form-actions">

                            <button
                                type="button"
                                class="btn btn-light px-4"
                                id="cancelProfile"
                            >
                                Cancel
                            </button>

                            <button
                                type="submit"
                                class="btn btn-primary px-4"
                            >
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

                    <form id="passwordForm">

                        <!-- Current Password -->

                        <div class="mb-4">

                            <label
                                for="currentPassword"
                                class="form-label"
                            >
                                Current Password
                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    class="form-control modern-input"
                                    id="currentPassword"
                                    name="current_password"
                                    placeholder="Enter your current password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="password-toggle"
                                    data-target="currentPassword"
                                >
                                    <i class="bi bi-eye"></i>
                                </button>

                            </div>

                        </div>


                        <div class="row g-4">

                            <!-- New Password -->

                            <div class="col-md-6">

                                <label
                                    for="newPassword"
                                    class="form-label"
                                >
                                    New Password
                                </label>

                                <div class="password-wrapper">

                                    <input
                                        type="password"
                                        class="form-control modern-input"
                                        id="newPassword"
                                        name="new_password"
                                        placeholder="Enter new password"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-target="newPassword"
                                    >
                                        <i class="bi bi-eye"></i>
                                    </button>

                                </div>

                            </div>


                            <!-- Confirm Password -->

                            <div class="col-md-6">

                                <label
                                    for="confirmPassword"
                                    class="form-label"
                                >
                                    Confirm New Password
                                </label>

                                <div class="password-wrapper">

                                    <input
                                        type="password"
                                        class="form-control modern-input"
                                        id="confirmPassword"
                                        name="confirm_password"
                                        placeholder="Confirm new password"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-target="confirmPassword"
                                    >
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
                                    id="lengthRequirement"
                                >
                                    <i class="bi bi-circle"></i>
                                    At least 8 characters
                                </div>

                                <div
                                    class="requirement"
                                    id="uppercaseRequirement"
                                >
                                    <i class="bi bi-circle"></i>
                                    One uppercase letter
                                </div>

                                <div
                                    class="requirement"
                                    id="numberRequirement"
                                >
                                    <i class="bi bi-circle"></i>
                                    One number
                                </div>

                                <div
                                    class="requirement"
                                    id="specialRequirement"
                                >
                                    <i class="bi bi-circle"></i>
                                    One special character
                                </div>

                            </div>

                        </div>


                        <div class="form-actions">

                            <button
                                type="submit"
                                class="btn btn-primary px-4"
                            >
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
                                    Administrator
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
                                    January 2024
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


                        <div class="overview-item">

                            <div class="overview-icon orange">
                                <i class="bi bi-clock-history"></i>
                            </div>

                            <div>
                                <small>
                                    Last Login
                                </small>

                                <strong>
                                    Today, 10:42 AM
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
                        Your password was last updated 24 days ago.
                        We recommend changing your password regularly.
                    </p>


                    <div class="security-progress">

                        <div class="d-flex justify-content-between mb-2">

                            <span class="small fw-semibold">
                                Security strength
                            </span>

                            <span class="small text-success fw-semibold">
                                Good
                            </span>

                        </div>

                        <div class="progress">

                            <div
                                class="progress-bar bg-success"
                                style="width: 82%"
                            ></div>

                        </div>

                    </div>


                    <div class="security-tip">

                        <i class="bi bi-info-circle"></i>

                        <span>
                            Enable two-factor authentication for
                            additional protection.
                        </span>

                    </div>


                    <button
                        type="button"
                        class="btn btn-outline-primary w-100 mt-3"
                    >
                        <i class="bi bi-shield-lock me-1"></i>
                        Manage 2FA
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>