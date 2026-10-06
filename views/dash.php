<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>AdminPro Dashboard</title>


    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">


    <!-- DataTables -->
    <link
        href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"
        rel="stylesheet">


    <!-- Your CSS -->
    <link
        rel="stylesheet"
        href="<?= url('assets/dash/styles.css') ?>">

</head>


<body>


    <!-- =====================================================
     SIDEBAR
===================================================== -->

    <aside
        class="sidebar"
        id="sidebar">

        <!-- Brand -->

        <div class="brand">

            <div class="brand-icon">
                <i class="bi bi-grid-fill"></i>
            </div>

            <span>
                AdminPro
            </span>

        </div>


        <!-- Main -->

        <div class="sidebar-label">
            Main
        </div>


        <nav class="sidebar-nav">

            <a
                href="#dashboard"
                class="nav-link active"
                data-page="dashboard"
                title="Dashboard">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>


            <a
                href="#customers"
                class="nav-link"
                data-page="customers"
                title="Customers">
                <i class="bi bi-people"></i>
                <span>Customers</span>
            </a>


            <a
                href="#orders"
                class="nav-link"
                data-page="orders"
                title="Orders">
                <i class="bi bi-bag"></i>
                <span>Orders</span>
            </a>


            <a
                href="#analytics"
                class="nav-link"
                data-page="analytics"
                title="Analytics">
                <i class="bi bi-bar-chart"></i>
                <span>Analytics</span>
            </a>

        </nav>


        <!-- Management -->

        <div class="sidebar-label">
            Management
        </div>


        <nav class="sidebar-nav">

            <a
                href="#products"
                class="nav-link"
                data-page="products"
                title="Products">
                <i class="bi bi-box-seam"></i>
                <span>Products</span>
            </a>


            <a
                href="#payments"
                class="nav-link"
                data-page="payments"
                title="Payments">
                <i class="bi bi-credit-card"></i>
                <span>Payments</span>
            </a>


            <a
                href="#settings"
                class="nav-link"
                data-page="settings"
                title="Settings">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>

        </nav>


        <!-- Collapse -->

        <button
            type="button"
            class="sidebar-collapse-btn"
            id="sidebarCollapseBtn"
            title="Collapse sidebar">

            <i class="bi bi-chevron-left"></i>

            <span>
                Collapse sidebar
            </span>

        </button>

    </aside>


    <!-- Mobile overlay -->

    <div class="sidebar-overlay" id="sidebarOverlay"></div>



    <!-- =====================================================
     MAIN
===================================================== -->

    <main class="main">


        <!-- =================================================
         TOPBAR
    ================================================== -->

        <header class="topbar">


            <!-- Left -->

            <div class="topbar-left">

                <!-- Mobile menu -->

                <button
                    type="button"
                    class="btn btn-light mobile-menu-btn"
                    id="mobileMenuBtn"
                    title="Open menu">
                    <i class="bi bi-list"></i>
                </button>


                <!-- Desktop sidebar toggle -->

                <button
                    type="button"
                    class="sidebar-toggle"
                    id="desktopSidebarToggle"
                    title="Toggle sidebar">
                    <i class="bi bi-layout-sidebar-inset-reverse"></i>
                </button>

            </div>



            <!-- Right -->

            <div class="d-flex align-items-center gap-3">


                <!-- Notifications -->

                <button
                    type="button"
                    class="btn btn-light rounded-circle notification-btn"
                    title="Notifications">

                    <i class="bi bi-bell"></i>

                    <span class="notification-dot">
                        3
                    </span>

                </button>



                <!-- User -->

                <div class="dropdown">

                    <button
                        type="button"
                        class="user-dropdown-btn"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <div class="avatar">
                            JD
                        </div>


                        <div class="user-info">

                            <div class="fw-semibold small">
                                John Doe
                            </div>

                            <div class="text-muted small">
                                Administrator
                            </div>

                        </div>


                        <i class="bi bi-chevron-down user-chevron"></i>

                    </button>


                    <!-- User dropdown -->

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">


                        <li>

                            <div class="user-dropdown-header">

                                <div class="avatar avatar-small">
                                    JD
                                </div>

                                <div>

                                    <div class="fw-semibold">
                                        John Doe
                                    </div>

                                    <small class="text-muted">
                                        john@example.com
                                    </small>

                                </div>

                            </div>

                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="#profile"
                                data-page="profile">
                                <i class="bi bi-person"></i>
                                View Profile
                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="#settings"
                                data-page="settings">
                                <i class="bi bi-gear"></i>
                                Account Settings
                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="#notifications"
                                data-page="notifications">
                                <i class="bi bi-bell"></i>
                                Notifications

                                <span class="badge bg-danger ms-auto">
                                    3
                                </span>

                            </a>

                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>

                            <a
                                class="dropdown-item text-danger"
                                href="#logout"
                                id="logoutBtn">
                                <i class="bi bi-box-arrow-right"></i>
                                Logout
                            </a>

                        </li>

                    </ul>

                </div>

            </div>

        </header>



        <!-- =================================================
         PAGE CONTENT
    ================================================== -->

        <div class="page-content">


            <!-- =================================================
             DASHBOARD PAGE
        ================================================== -->

            <section
                id="page-dashboard"
                class="page-section">


                <!-- Heading -->

                <div class="page-heading">

                    <div>

                        <h3 class="page-title">
                            Dashboard
                        </h3>

                        <div class="page-subtitle">
                            Welcome back, John. Here's what's happening today.
                        </div>

                    </div>


                    <button
                        class="btn btn-primary"
                        type="button">
                        <i class="bi bi-plus-lg me-1"></i>
                        Add Customer
                    </button>

                </div>



                <!-- Statistics -->

                <div class="row g-4 mb-4">


                    <!-- Customers -->

                    <div class="col-xl-3 col-md-6">

                        <div class="stat-card gradient-purple">

                            <div class="stat-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>

                            <div class="stat-label">
                                Total Customers
                            </div>

                            <div class="stat-value">
                                24,892
                            </div>

                            <div class="stat-change">
                                <i class="bi bi-arrow-up"></i>
                                12.8% from last month
                            </div>

                        </div>

                    </div>



                    <!-- Orders -->

                    <div class="col-xl-3 col-md-6">

                        <div class="stat-card gradient-blue">

                            <div class="stat-icon">
                                <i class="bi bi-cart-check-fill"></i>
                            </div>

                            <div class="stat-label">
                                Total Orders
                            </div>

                            <div class="stat-value">
                                8,421
                            </div>

                            <div class="stat-change">
                                <i class="bi bi-arrow-up"></i>
                                8.2% from last month
                            </div>

                        </div>

                    </div>



                    <!-- Revenue -->

                    <div class="col-xl-3 col-md-6">

                        <div class="stat-card gradient-green">

                            <div class="stat-icon">
                                <i class="bi bi-currency-dollar"></i>
                            </div>

                            <div class="stat-label">
                                Revenue
                            </div>

                            <div class="stat-value">
                                $128.4K
                            </div>

                            <div class="stat-change">
                                <i class="bi bi-arrow-up"></i>
                                14.6% from last month
                            </div>

                        </div>

                    </div>



                    <!-- Conversion -->

                    <div class="col-xl-3 col-md-6">

                        <div class="stat-card gradient-orange">

                            <div class="stat-icon">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>

                            <div class="stat-label">
                                Conversion Rate
                            </div>

                            <div class="stat-value">
                                8.74%
                            </div>

                            <div class="stat-change">
                                <i class="bi bi-arrow-up"></i>
                                3.1% from last month
                            </div>

                        </div>

                    </div>

                </div>



                <!-- Customers Table -->

                <div class="content-card">


                    <div class="card-header-modern">

                        <div>

                            <h5 class="card-title">
                                Recent Customers
                            </h5>

                            <div class="card-description">
                                Manage and monitor your latest customers.
                            </div>

                        </div>

                    </div>


                    <div class="card-body-modern">

                        <div class="table-responsive">


                            <table
                                id="customersTable"
                                class="table table-striped table-hover"
                                style="width:100%">

                                <thead>

                                    <tr>

                                        <th>
                                            Customer
                                        </th>

                                        <th>
                                            Email
                                        </th>

                                        <th>
                                            Company
                                        </th>

                                        <th>
                                            Orders
                                        </th>

                                        <th>
                                            Revenue
                                        </th>

                                        <th>
                                            Status
                                        </th>

                                        <th>
                                            Joined
                                        </th>

                                        <th>
                                            Action
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>


                                    <tr>

                                        <td>

                                            <div class="d-flex align-items-center gap-3">

                                                <div class="avatar">
                                                    AM
                                                </div>

                                                <div>

                                                    <div class="fw-semibold">
                                                        Alice Morgan
                                                    </div>

                                                    <small class="text-muted">
                                                        #CUS-1024
                                                    </small>

                                                </div>

                                            </div>

                                        </td>

                                        <td>
                                            alice@example.com
                                        </td>

                                        <td>
                                            Acme Inc.
                                        </td>

                                        <td>
                                            42
                                        </td>

                                        <td class="fw-semibold">
                                            $8,420
                                        </td>

                                        <td>

                                            <span class="status-badge status-active">
                                                Active
                                            </span>

                                        </td>

                                        <td>
                                            Oct 01, 2026
                                        </td>

                                        <td>

                                            <button class="btn btn-sm btn-light">
                                                <i class="bi bi-three-dots"></i>
                                            </button>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td>

                                            <div class="d-flex align-items-center gap-3">

                                                <div class="avatar">
                                                    JD
                                                </div>

                                                <div>

                                                    <div class="fw-semibold">
                                                        James Davis
                                                    </div>

                                                    <small class="text-muted">
                                                        #CUS-1023
                                                    </small>

                                                </div>

                                            </div>

                                        </td>

                                        <td>
                                            james@example.com
                                        </td>

                                        <td>
                                            Nova Labs
                                        </td>

                                        <td>
                                            31
                                        </td>

                                        <td class="fw-semibold">
                                            $6,840
                                        </td>

                                        <td>

                                            <span class="status-badge status-active">
                                                Active
                                            </span>

                                        </td>

                                        <td>
                                            Sep 28, 2026
                                        </td>

                                        <td>

                                            <button class="btn btn-sm btn-light">
                                                <i class="bi bi-three-dots"></i>
                                            </button>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td>

                                            <div class="d-flex align-items-center gap-3">

                                                <div class="avatar">
                                                    SL
                                                </div>

                                                <div>

                                                    <div class="fw-semibold">
                                                        Sarah Lewis
                                                    </div>

                                                    <small class="text-muted">
                                                        #CUS-1022
                                                    </small>

                                                </div>

                                            </div>

                                        </td>

                                        <td>
                                            sarah@example.com
                                        </td>

                                        <td>
                                            Bright Studio
                                        </td>

                                        <td>
                                            18
                                        </td>

                                        <td class="fw-semibold">
                                            $3,290
                                        </td>

                                        <td>

                                            <span class="status-badge status-pending">
                                                Pending
                                            </span>

                                        </td>

                                        <td>
                                            Sep 25, 2026
                                        </td>

                                        <td>

                                            <button class="btn btn-sm btn-light">
                                                <i class="bi bi-three-dots"></i>
                                            </button>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td>

                                            <div class="d-flex align-items-center gap-3">

                                                <div class="avatar">
                                                    RW
                                                </div>

                                                <div>

                                                    <div class="fw-semibold">
                                                        Robert Wilson
                                                    </div>

                                                    <small class="text-muted">
                                                        #CUS-1021
                                                    </small>

                                                </div>

                                            </div>

                                        </td>

                                        <td>
                                            robert@example.com
                                        </td>

                                        <td>
                                            Vertex Group
                                        </td>

                                        <td>
                                            27
                                        </td>

                                        <td class="fw-semibold">
                                            $5,620
                                        </td>

                                        <td>

                                            <span class="status-badge status-active">
                                                Active
                                            </span>

                                        </td>

                                        <td>
                                            Sep 22, 2026
                                        </td>

                                        <td>

                                            <button class="btn btn-sm btn-light">
                                                <i class="bi bi-three-dots"></i>
                                            </button>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td>

                                            <div class="d-flex align-items-center gap-3">

                                                <div class="avatar">
                                                    EM
                                                </div>

                                                <div>

                                                    <div class="fw-semibold">
                                                        Emma Miller
                                                    </div>

                                                    <small class="text-muted">
                                                        #CUS-1020
                                                    </small>

                                                </div>

                                            </div>

                                        </td>

                                        <td>
                                            emma@example.com
                                        </td>

                                        <td>
                                            Pixel Works
                                        </td>

                                        <td>
                                            12
                                        </td>

                                        <td class="fw-semibold">
                                            $1,940
                                        </td>

                                        <td>

                                            <span class="status-badge status-inactive">
                                                Inactive
                                            </span>

                                        </td>

                                        <td>
                                            Sep 20, 2026
                                        </td>

                                        <td>

                                            <button class="btn btn-sm btn-light">
                                                <i class="bi bi-three-dots"></i>
                                            </button>

                                        </td>

                                    </tr>



                                    <tr>

                                        <td>

                                            <div class="d-flex align-items-center gap-3">

                                                <div class="avatar">
                                                    KT
                                                </div>

                                                <div>

                                                    <div class="fw-semibold">
                                                        Kevin Taylor
                                                    </div>

                                                    <small class="text-muted">
                                                        #CUS-1019
                                                    </small>

                                                </div>

                                            </div>

                                        </td>

                                        <td>
                                            kevin@example.com
                                        </td>

                                        <td>
                                            Orbit Systems
                                        </td>

                                        <td>
                                            36
                                        </td>

                                        <td class="fw-semibold">
                                            $7,210
                                        </td>

                                        <td>

                                            <span class="status-badge status-active">
                                                Active
                                            </span>

                                        </td>

                                        <td>
                                            Sep 18, 2026
                                        </td>

                                        <td>

                                            <button class="btn btn-sm btn-light">
                                                <i class="bi bi-three-dots"></i>
                                            </button>

                                        </td>

                                    </tr>


                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </section>



            <!-- =================================================
             PROFILE PAGE
        ================================================== -->

            <section
                id="page-profile"
                class="page-section d-none">


                <!-- Heading -->

                <div class="page-heading">

                    <div>

                        <h3 class="page-title">
                            Profile & Security
                        </h3>

                        <div class="page-subtitle">
                            Manage your personal information and account security.
                        </div>

                    </div>

                </div>



                <div class="row g-4">


                    <!-- LEFT -->

                    <div class="col-xl-8">


                        <!-- Personal Information -->

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


                                <!-- Profile Header -->

                                <div class="profile-header">


                                    <div class="profile-avatar-wrapper">

                                        <div class="profile-avatar">
                                            JD
                                        </div>

                                        <button
                                            type="button"
                                            class="profile-camera"
                                            id="changePhotoIcon"
                                            title="Change profile picture">
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
                                            id="changePhotoBtn">
                                            <i class="bi bi-image me-1"></i>
                                            Change Photo
                                        </button>

                                    </div>

                                </div>


                                <hr class="my-4">



                                <!-- Profile form -->

                                <form id="profileForm">


                                    <div class="row g-4">


                                        <!-- First -->

                                        <div class="col-md-6">

                                            <label
                                                for="firstName"
                                                class="form-label">
                                                First Name
                                            </label>

                                            <input
                                                type="text"
                                                class="form-control modern-input"
                                                id="firstName"
                                                value="John"
                                                required>

                                        </div>



                                        <!-- Last -->

                                        <div class="col-md-6">

                                            <label
                                                for="lastName"
                                                class="form-label">
                                                Last Name
                                            </label>

                                            <input
                                                type="text"
                                                class="form-control modern-input"
                                                id="lastName"
                                                value="Doe"
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
                                                    value="john@example.com"
                                                    required>

                                            </div>

                                        </div>



                                        <!-- Phone -->

                                        <div class="col-md-6">

                                            <label
                                                for="phone"
                                                class="form-label">
                                                Phone Number
                                            </label>

                                            <div class="input-icon-wrapper">

                                                <i class="bi bi-telephone"></i>

                                                <input
                                                    type="tel"
                                                    class="form-control modern-input input-with-icon"
                                                    id="phone"
                                                    value="+234 801 234 5678">

                                            </div>

                                        </div>



                                        <!-- Job -->

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
                                                value="Administrator">

                                        </div>



                                        <!-- Department -->

                                        <div class="col-md-6">

                                            <label
                                                for="department"
                                                class="form-label">
                                                Department
                                            </label>

                                            <select
                                                class="form-select modern-input"
                                                id="department">

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
                                                class="form-label">
                                                About
                                            </label>

                                            <textarea
                                                class="form-control modern-input"
                                                id="bio"
                                                rows="4">Administrator of the platform.</textarea>

                                        </div>

                                    </div>



                                    <!-- Actions -->

                                    <div class="form-actions">

                                        <button
                                            type="button"
                                            class="btn btn-light px-4"
                                            id="cancelProfile">
                                            Cancel
                                        </button>


                                        <button
                                            type="submit"
                                            class="btn btn-primary px-4">
                                            <i class="bi bi-check2 me-1"></i>
                                            Save Changes
                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>



                        <!-- Change Password -->

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


                                    <!-- Current -->

                                    <div class="mb-4">

                                        <label
                                            for="currentPassword"
                                            class="form-label">
                                            Current Password
                                        </label>


                                        <div class="password-wrapper">

                                            <input
                                                type="password"
                                                class="form-control modern-input"
                                                id="currentPassword"
                                                placeholder="Enter your current password"
                                                required>


                                            <button
                                                type="button"
                                                class="password-toggle"
                                                data-target="currentPassword">
                                                <i class="bi bi-eye"></i>
                                            </button>

                                        </div>

                                    </div>



                                    <div class="row g-4">


                                        <!-- New -->

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



                                        <!-- Confirm -->

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



                                    <!-- Requirements -->

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
                                            class="btn btn-primary px-4">
                                            <i class="bi bi-shield-check me-1"></i>
                                            Update Password
                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>



                    <!-- RIGHT -->

                    <div class="col-xl-4">


                        <!-- Overview -->

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



                        <!-- Security -->

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
                                            style="width:82%"></div>

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
                                    class="btn btn-outline-primary w-100 mt-3">
                                    <i class="bi bi-shield-lock me-1"></i>
                                    Manage 2FA
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </section>



            <!-- =================================================
             GENERIC PAGES
        ================================================== -->

            <section
                id="page-placeholder"
                class="page-section d-none">

                <div class="content-card">

                    <div class="card-body-modern text-center py-5">

                        <div class="placeholder-icon">
                            <i class="bi bi-grid"></i>
                        </div>

                        <h4 id="placeholderTitle">
                            Page
                        </h4>

                        <p
                            class="text-muted"
                            id="placeholderText">
                            This section is ready for your content.
                        </p>

                        <button
                            class="btn btn-primary"
                            data-page="dashboard"
                            id="backToDashboard">
                            <i class="bi bi-arrow-left me-1"></i>
                            Back to Dashboard
                        </button>

                    </div>

                </div>

            </section>


        </div>



        <!-- =================================================
         FOOTER
    ================================================== -->

        <footer class="admin-footer">

            <div>
                © 2026
                <strong>AdminPro</strong>.
                All rights reserved.
            </div>


            <div class="footer-links">

                <a href="#">
                    Privacy
                </a>

                <a href="#">
                    Terms
                </a>

                <a href="#">
                    Support
                </a>

            </div>

        </footer>


    </main>



    <!-- =====================================================
     JAVASCRIPT LIBRARIES
===================================================== -->

    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script
        src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>


    <script
        src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>


    <!-- Your JavaScript -->

    <script src="<?= url('assets/dash/dash.js') ?>"></script>


</body>

</html>