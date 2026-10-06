<?php

 requireLogin();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Store | Trans Kontinental Services Ltd.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/fontawesome-free-7.3.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/store.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="shortcut icon" href="<?= url('assets/imgs/small-logo-bg-removed.png') ?>" type="image/x-icon">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" id="navbar">
        <div class="container my-2">
            <a class="navbar-brand" href="<?= url("/") ?>"><img src="assets/imgs/logo-bg-removed.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse nav-ul nav-content navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav text-end ms-auto me-auto mb-2 mb-lg-0" id="myNav">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= url("/") ?>">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= url("/about") ?>">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url("/oil-and-gas") ?>" class="nav-link">Oil & Gas</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url("/global-logistics") ?>" class="nav-link" >Global Logistics</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url("/base-oil") ?>" class="nav-link" >Base Oil</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url("/contact") ?>" class="nav-link" >Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url("/store") ?>" class="nav-link" >Store</a>
                    </li>
                </ul>
                <div class="d-flex get_in_touch">
                    <?php if(!isset($_SESSION['user_id'])) { ?>
                        <div class="d-flex" style="margin-right: 2px;">
                            <a href="<?= url('/admin/master/login') ?>" class="btn btn-warning" style="margin-right: 4px;">Login</a>
                            <a href="<?= url('/register') ?>" class="btn btn-success">Register</a>
                        </div>
                    <?php } else { ?>
                        <div class="d-flex" style="margin-right: 2px;">
                            <a href="<?= url('/dashboard') ?>" class="btn btn-warning" style="margin-right: 4px;">Dashboard</a>
                        </div>
                    <?php } ?>
                    <a href="<?= url("/contact") ?>" class="btn btn-outline-success w-100" type="submit">Get in Touch <i class="fa-solid fa-paper-plane pap-plain"></i></a>
                </div>
            </div>
        </div>
    </nav>


    <!--Account-->
    <section class="my-3 py-3 account">
        <div class="row container mx-auto">
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
            <div class="container py-5 card mx-auto text-center col-lg-6 col-md-6 col-sm-12">
                <h3 class="font-weight-bold text-center text-light">Account Info</h3>
                <hr class="mx-auto">

                <div class="user-img my-5">
                    <img src="<?= url('/public/uploads/users/' . htmlspecialchars($user['photo'])) ?>" alt="">
                </div>

                <div class="account-info">
                    <p>Name: <span><?= $user['name'] ?></span></p>
                    <p>Email: <span><?= $user['email'] ?></span></p>
                    <p><a href="" class="" id="orders-btn">Your Orders</a></p>

                    <form action="<?= url('/logout') ?>" method="POST">
                        <button type="submit" class="btn btn-success my-2" name="Logout-btn">Logout</button>
                    </form>
                </div>

                <form action="<?= url('/update/user/details') ?>" method="POST" id="account-form" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                    <h3 class="text-center">Update Details</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input class="form-control" type="text" name="name" value="<?= $user['name'] ?>" id="new-name" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input class="form-control" type="text" name="email" value="<?= $user['email'] ?>" id="current-email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Name">Photo</label>
                        <input class="form-control" type="file" name="profile-pic" id="new-photo">
                    </div>
                    <div class="form-group my-3">
                        <input class="" type="submit" name="update-btn" id="update-details" value="Update">
                    </div>
                </form>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 card update-pass">
                <form id="account-form" method="POST" action="<?= url('/update/user/password') ?>">
                    <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                    <h3 class="text-center">Update Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label for="Password">Email</label>
                        <input class="form-control" type="text" name="email" value="<?= $user['email'] ?>" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="Password">New Password</label>
                        <input class="form-control" type="password" name="password" id="new-pass" required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Confirm Password</label>
                        <input class="form-control" name="confirm_password" type="password" id="confirm-pass" required>
                    </div>
                    <div class="form-group my-3">
                        <button type="submit" name="change-password-btn" id="update-pass">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
        

    </section>

    <!--Orders-->
    <section class="cart container my-3 py-3">
        <div class="container text-center mt-5">
            <h2 class="font-weight-bold text-light">Your Orders</h2>
            <hr class="mx-auto">
        </div>



        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Date</th>
            </tr>
            <?php foreach($orders as $order): ?>
            <tr>
                <td>
                    <div class="product-info">
                        <!-- <img src="./assets/imgs/coat4.jpg" alt=""> -->
                        <div>
                            <p class="mt-3"><?= $order['product_name'] ?></p>
                        </div>
                    </div>
                </td>

                <td>
                    <span><?= date('Y-m-d', strtotime($order['created_at'])) ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>



    <!-- FOOTER -->
    <footer class="bg-light">
        <div class="container py-5">
            <div class="row footer-contents">
                <div class="col-md-3 col-sm-6">
                    <div class="d-flex">
                        <a href="<?= url('/') ?>">
                            <img src="assets/imgs/logo-bg-removed.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="d-flex">
                        <div class="text-center" style="font-size:2rem;">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h6>Lagos, Nigeria.</h6>
                            <p>Serving Africa, Connecting the world</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="d-flex">
                        <div class="text-center" style="font-size:2rem;">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h6>info@transkontinental.com</h6>
                            <p>www.transcontinental.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="d-flex">
                        <div class="text-center" style="font-size:2rem;">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                        <div>
                            <h6>AFRICA | EUROPE | ASIA | MIDDLE EAST | AMERICA</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/fontawesome-free-7.3.1/js/all.min.js"></script>
</body>

</html>