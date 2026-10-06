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
                        <a href="<?= url("/global-logistics") ?>" class="nav-link">Global Logistics</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url("/base-oil") ?>" class="nav-link">Base Oil</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url("/contact") ?>" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url("/store") ?>" class="nav-link">Store</a>
                    </li>
                </ul>
                <div class="d-flex get_in_touch">
                    <!-- <?php if (!isset($_SESSION['user_id'])) { ?>
                        <div class="d-flex" style="margin-right: 2px;">
                            <a href="<?= url('/admin/master/login') ?>" class="btn btn-warning" style="margin-right: 4px;">Login</a>
                            <a href="<?= url('/register') ?>" class="btn btn-success">Register</a>
                        </div>
                    <?php } else { ?>
                        <div class="d-flex" style="margin-right: 2px;">
                            <a href="<?= url('/dashboard') ?>" class="btn btn-warning" style="margin-right: 4px;">Dashboard</a>
                        </div>
                    <?php } ?> -->
                    <a href="<?= url("/contact") ?>" class="btn btn-outline-success w-100" type="submit">Get in Touch <i class="fa-solid fa-paper-plane pap-plain"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-lg-4 store-wrapper my-3">
        <div class="row g-3" style="margin-left: 0; margin-right:0">
            <div>
                <h5 class="m-0 fw-bold text-light fs-2">Showroom</h5>
                <hr>
            </div>
            <!-- LEFT -->
            <div class="col-lg-3">
                <div class="category-box sticky">

                <?php $activeCategory = isset($_GET['category']) ? (int) $_GET['category'] : 0; ?>
                    <!-- Mobile Top Bar -->
                    <div class="d-flex d-lg-none justify-content-between align-items-center mb-2">
                        <h5 class="m-0 fw-bold">Store</h5>
                        <button class="btn btn-dark btn-sm rounded-pill px-3" data-bs-toggle="offcanvas"
                            data-bs-target="#filterOffcanvas">
                            <i class="bi bi-sliders"></i> Filter
                        </button>
                    </div>

                    <!-- Mobile Pills -->
                    <div class="mobile-cats d-lg-none">
                        <a class="cat-pill <?= $activeCategory === 0 ? 'active' : '' ?>" href="<?= url('/store') ?>" style="text-decoration: none; text-underline:none; color: #00001C">All</a>
                        <?php if (isset($categories)) { ?>
                            <?php foreach ($categories as $category): ?>
                                <a href="<?= url('/store?category=' . $category['id']) ?>" style="text-decoration: none; text-underline:none; color: #00001C" class="cat-pill <?= $activeCategory === (int) $category['id'] ? 'active' : '' ?>"><?= htmlspecialchars($category['name']) ?></a>
                            <?php endforeach ?>
                        <?php } ?>
                    </div>


                    <!-- Desktop List -->
                    
                    <div class="d-none d-lg-block">
                        <h6>CATEGORIES</h6>
                        <ul class="cat-list">
                            <li class="<?= $activeCategory === 0 ? 'active' : '' ?>">
                                <a href="<?= url('/store') ?>" >All Products</a>
                            </li>
                            <?php if (isset($categories)) { ?>
                                <?php foreach ($categories as $category): ?>
                                    <li class="<?= $activeCategory === (int) $category['id'] ? 'active' : '' ?>">
                                        <a href="<?= url('/store?category=' . $category['id']) ?>"><?= htmlspecialchars($category['name']) ?> </a>
                                    </li>
                                <?php endforeach ?>
                            <?php } ?>
                        </ul>

                        <!-- <button class="btn btn-dark w-100 mt-3 rounded-pill">
                            Apply Filter
                        </button> -->
                    </div>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- <p class="m-0 text-light small d-none d-lg-block">
                        Showing 128 products
                    </p> -->
                    <!-- <select class="form-select form-select-sm w-auto ms-auto rounded-pill">
                        <option>Sort by: Popular</option>
                        <option>Price Low to High</option>
                        <option>Price High to Low</option>
                        <option>Newest</option>
                    </select> -->
                </div>

                <div class="row g-3">
                    <!-- PRODUCT CARD - COPY THIS -->
                    <?php if (isset($products)) { ?>
                        <?php foreach ($products as $product): ?>
                            <div class="col-6 col-md-4 col-xl-3">
                                <div class="product-card position-relative">
                                    <span class="badge badge-sale rounded-pill"><?= $product['offer_price'] > 0 ? -$product['offer_price']. 'off' : '0% off' ?></span>
                                    <a href="<?= url('/single-product/'. htmlspecialchars($product['slug'])) ?>">
                                        <div class="product-img">  
                                            <img src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image'])) ?>" alt="" />
                                        </div>
                                    </a>
                                    <div class="product-info">
                                        <h3><?= htmlspecialchars($product['name']) ?></h3>
                                        <div class="d-flex gap-2 align-items-center">
                                            <?php if($product['offer_price'] > 0) { ?>
                                                <span class="price">₦<?= htmlspecialchars(number_format($product['offer_price'], 2)) ?></span>
                                                <span class="old-price">₦<?= number_format($product['price'], 2) ?></span>
                                            <?php }else { ?>
                                                <span class="price">₦<?= htmlspecialchars(number_format($product['price'], 2)) ?></span>
                                                <span class="old-price">0% off</span>
                                            <?php } ?>

                                        </div>
                                        <div class="small text-light mt-1 badge text-bg-success rounded-pill">
                                            <small><?= $product['category_name'] ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- <div class="col-md-12">
                            <div class="card">
                                <p class="text-dark text-center mt-2">
                                    No Products to Display for this Category.
                                </p>
                            </div>
                        </div> -->
                    <?php } ?>
                        

                    <?php if($totalPages > 1): ?>
                        <nav aria-label="Product pagination" class="d-flex justify-content-end">
                            <ul class="pagination">

                                <!-- Previous -->
                                <li class="page-item <?= $currentPage == 1 ? 'disabled' : '' ?>">
                                    <a class="page-link"
                                        href="<?= $currentPage > 1 ? url('/store?page=' . ($currentPage - 1)) : '#' ?>">
                                        Previous
                                    </a>
                                </li>

                                <!-- Page Numbers -->
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                                    <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                                        <a class="page-link"
                                            href="<?= url('/store?page=' . $i) ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>

                                <?php endfor; ?>

                                <!-- Next -->
                                <li class="page-item <?= $currentPage == $totalPages ? 'disabled' : '' ?>">
                                    <a class="page-link"
                                        href="<?= $currentPage < $totalPages ? url('/store?page=' . ($currentPage + 1)) : '#' ?>">
                                        Next
                                    </a>
                                </li>

                            </ul>
                        </nav>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

    <!-- MOBILE OFFCANVAS -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="filterOffcanvas">
        <div class="offcanvas-header">
            <h5 class="fw-bold">Filter</h5>
            <button class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <h6>CATEGORIES</h6>
            <ul class="cat-list">
                <li class="<?= $activeCategory === 0 ? 'active' : '' ?>">
                    <a href="<?= url('/store') ?>" >All Products</a>
                </li>
                <?php if (isset($categories)) { ?>
                    <?php foreach ($categories as $category): ?>
                        <li class="<?= $activeCategory === (int) $category['id'] ? 'active' : '' ?>">
                            <a href="<?= url('/store?category=' . $category['id']) ?>"><?= htmlspecialchars($category['name']) ?> </a>
                        </li>
                    <?php endforeach ?>
                <?php } ?>
            </ul>
        </div>
    </div>

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