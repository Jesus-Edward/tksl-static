<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Details | Trans Kontinental Services Ltd.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= url('assets/fontawesome-free-7.3.1/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/css/store.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/css/styles.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/css/single-prod.css') ?>">
    <link rel="shortcut icon" href="<?= url('assets/imgs/small-logo-bg-removed.png') ?>" type="image/x-icon">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" id="navbar">
        <div class="container my-2">
            <a class="navbar-brand" href="<?= url("/") ?>"><img src="<?= url('assets/imgs/logo-bg-removed.png') ?>" alt=""></a>
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
                            <a href="<?= url('/login') ?>" class="btn btn-warning" style="margin-right: 4px;">Login</a>
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


    <!--Single Product-->
    <div class="container py-5">
        <?php if (!empty($_SESSION['errors'])) { ?>
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <div class="mx-auto my-3" style="background-color: red; color:white; padding:8px; text-align:center; border-radius:8px">
                    <i class="fa-solid fa-circle-info"></i> <?php echo $error; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['errors']); ?>
        <?php } ?>
        <?php if(!empty($_SESSION['success'])): ?>
            <?php foreach($_SESSION['success'] as $success): ?>
                    <div class="alert alert-warning text-center my-3 font-weight-bold">
                        <?= htmlspecialchars($success) ?>
                    </div>
                <?php endforeach; ?>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <div class="row g-3 my-3">
            <div class="col-md-8 col-sm-12 mb-5" style="max-height: 500px;">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel"
                        data-bs-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image'])) ?>" class="d-block w-100" alt="...">
                            </div>
                            <?php if (empty($product['image1'])) { ?>
                                <div class="carousel-item active">
                                    <img src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image'])) ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php } else { ?>
                                <div class="carousel-item" data-bs-slide-to="1">
                                    <img src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image1'])) ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php } ?>
                            <?php if (empty($product['image2'])) { ?>
                                <div class="carousel-item active">
                                    <img src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image'])) ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php } else { ?>
                                <div class="carousel-item" data-bs-slide-to="1">
                                    <img src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image2'])) ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php } ?>
                            <?php if (empty($product['image3'])) { ?>
                                <div class="carousel-item active">
                                    <img src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image'])) ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php } else { ?>
                                <div class="carousel-item" data-bs-slide-to="1">
                                    <img src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image3'])) ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php } ?>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>
                    <div class="d-flex justify-content-evently gap-3 carousel-thumbs my-3">
                        <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0"
                            class="thumb-btn active w-25">
                            <img src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image'])) ?>" class="d-block w-100" alt="...">
                        </button>
                        <?php if (!empty($product['image1'])) { ?>
                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1"
                                class="thumb-btn active w-25">
                                <img src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image1'])) ?>" class="d-block w-100" alt="...">
                            </button>
                        <?php } ?>
                        <?php if (!empty($product['image2'])) { ?>
                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1"
                                class="thumb-btn active w-25">
                                <img src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image2'])) ?>" class="d-block w-100" alt="...">
                            </button>
                        <?php } ?>
                        <?php if (!empty($product['image3'])) { ?>
                            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1"
                                class="thumb-btn active w-25">
                                <img src="<?= url('/public/uploads/products/' . htmlspecialchars($product['image3'])) ?>" class="d-block w-100" alt="...">
                            </button>
                        <?php }?>
                    </div>
            </div>

            <div class="col-md-4 col-sm-12 details-1-card-row">
                <div class="card details-1-card c-card" style="min-height: 300px;">
                    <h3><?= $product['name'] ?></h3>
                    <span><?= $product['category_name'] ?></span>
                    <h4><span>₦ </span><?= number_format($product['price'], 2) ?></h4>
                    <input type="hidden" id="price" value="<?= $product['price'] ?>">
                    <div class="d-flex text-center" style="">
                        <button class="btn btn-outline-secondary" type="button" id="minus">−</button>
                        <input type="text" name="" class=" text-center"  id="quantity" value="" min="1">
                        <button class="btn btn-outline-secondary" type="button" id="plus">+</button>
                    </div>
                    <h3 class="mt-3">
                        Total: ₦<span id="totalPrice"><?= $product['price'] ?></span>
                    </h3>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Make Order</button>
                </div>
            </div>
        </div>

        <div class="description-card">
            <div class="col-md-12">
                <div class="details-2-card c-card">
                    <p>
                        <?= htmlspecialchars($product['description']) ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="my-5" id="featured">
            <h2 style="color: #fff; margin-bottom: 10px;">Related Products</h2>

            <div class="row">
                <div class="product text-center col-lg-3 col-md-4 col-sm-6">
                    <?php if(!empty($related_products)) { ?>
                        <?php foreach($related_products as $prod): ?>
                            <div class="card">
                                <img src="<?= url('/public/uploads/products/'. $prod['image']) ?>" alt="Featured Image" class="img-fluid mb-3">
                                <a href="<?= url('/single-product/' . $prod['slug']) ?>" class="text-dark" style="text-decoration: none;">

                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h5 class="p-name"><?= $prod['name'] ?></h5>
                                    <h4 class="p-price">₦<?= number_format($prod['price'], 2) ?></h4>
                                </a>
                                <a href="<?= url('/single-product/' . $prod['slug']) ?>" id="button" class="buy-btm">Buy Now</a>
                            </div>
                        <?php endforeach ?>
                    <?php } else { ?>
                            <p class="text-center text-light fw-bold">No Related Products Found.</p>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>

    <style>
        .form-group {
            margin-bottom: 5px;
        }
    </style>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title" id="exampleModalLongTitle">Fill the Form to make Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= url('/make-order') ?>" method="post">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input type="hidden" name="price" value="<?= $product['price'] ?>">
                        <input type="hidden" name="total" id="total-hidden" value="">
                        <input type="hidden" name="quantity" id="qty-hidden" value="">
                        <input type="hidden" name="product_name" value="<?= $product['name'] ?>">
                        <input type="hidden" name="slug" value="<?= $product['slug'] ?>">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="customer_name" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Company</label>
                                <input type="text" name="company" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <label for="">City</label>
                                <input type="text" name="city" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" name="country" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Note</label>
                                <textarea type="text" name="notes" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="g-recaptcha" data-sitekey="6LfsEtctAAAAAIsdMtaU1ZHIk4vF5bwfjdMLqUKj" data-callback="enableSubmit"></div>

                        <div class="modal-footer mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submitBtn" name="order-btn" class="btn btn-primary">Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- FOOTER -->
    <footer class="bg-light">
        <div class="container py-5">
            <div class="row footer-contents">
                <div class="col-md-3 col-sm-6">
                    <div class="d-flex">
                        <a href="<?= url('/') ?>">
                            <img src="<?= url('assets/imgs/logo-bg-removed.png') ?>" alt="">
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

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= url('assets/fontawesome-free-7.3.1/js/all.min.js') ?>"></script>
    <script>
        const qtyInput = document.getElementById("quantity");
        const price = Number(document.getElementById("price").value);
        const totalHidden = document.getElementById("total-hidden");
        const qtyHidden = document.getElementById("qty-hidden");
        const totalEl = document.getElementById("totalPrice");



        function updateTotal() {
            let qty = parseInt(qtyInput.value) || 1;
            qtyHidden.value = qty;

            if (qty < 1) qty = 1;
            qtyInput.value = qty;

            const total = price * qty;

            totalEl.textContent = total.toLocaleString("en-NG");
            totalHidden.value = total;
        }

        // Increase quantity
        document.getElementById("plus").addEventListener("click", () => {
            qtyInput.value = parseInt(qtyInput.value) + 1;
            updateTotal();
        });

        // Decrease quantity
        document.getElementById("minus").addEventListener("click", () => {
            const current = parseInt(qtyInput.value);
            if (current > 1) {
                qtyInput.value = current - 1;
                updateTotal();
            }
        });

        // Manual typing
        qtyInput.addEventListener("input", updateTotal);

        // Initial calculation
        updateTotal();
    </script>

    <script>
    function enableSubmit() {
        document.getElementById('submitBtn').disabled = false;
    }
    </script>
</body>

</html>