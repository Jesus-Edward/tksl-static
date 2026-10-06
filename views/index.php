<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Trans Kontinental Services Ltd.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/fontawesome-free-7.3.1/css/all.min.css">
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


    <!-- HERO -->

    <section id="hero">
        <div class="hero-details ">
            <div class="" style="position: absolute; left: 50px; top: 100px;">
                <h6 style="letter-spacing: 8px;">TRANS KONTINENTAL SERVICES LTD.</h6>
                <h6 style="letter-spacing: 8px;">LOGISTICS BEYOND BORDERS</h6>

                <h2 class="trusted">YOUR TRUSTED</h2>
                <h1>LOGISTIC PARTNER</h1>
                <h2>FOR THE OIL & GAS INDUSTRY</h2>

                <div class="safe">
                    <h5>SAFE <span style="color: #FFEF00;">|</span> RELIABLE <span style="color: #FFEF00;">|</span> GLOBAL</h5>
                </div>

                <div>
                    <p>
                        We deliver end-to-end frieght, logistic, project cargo and supply-chain solutions
                        designed to keep businesses, energy projects and cargo-moving from origin to destination.
                    </p>
                </div>

                <div class="d-flex global">
                    <h4>Global Reach.</h4>
                    <h4>Local Enterprise.</h4>
                    <h4>Africa Focus.</h4>
                </div>

                <div class="d-flex mt-3">
                    <button class="btn btn-secondary quote" style="margin-right: 5px;"><i class="fa-solid fa-circle-arrow-right"></i> Get a Quote</button>
                    <button class="btn btn-secondary touch">Get in Touch</button>
                </div>
            </div>
        </div>
    </section>

    <!-- VSION/MISSION -->

    <section id="vision" class="py-5">
        <div class="container">
            <div class="vision d-flex" style="justify-content: space-evenly;">
                <img src="assets/imgs/refinery.jpg" alt="">

                <div class="vision-details mt-3" style="margin-bottom: -12px;">
                    <h3>MOVING BUSINESSES.</h3>
                    <h3 class="mb-2">CONNECTING CONTINENTS.</h3>

                    <hr>

                    <p class="mt-2">
                        At <span>Trans Kontinental Services Ltd.,</span> we provide reliable logistics solutions across Africa and the global marketplace.
                    </p>
                    <p class="mt-2">
                        From heavy and oversized equipments to tim-critical air freight, offshore logistics, warehousing, shipping and specialized cargo, our experienced team provides custimized solutions that meet the demands of today's fast-moving industries.
                    </p>

                    <h6>Our approach is simple</h6>
                    <div class="d-flex approach">
                        <h5>Trusted People.</h5>
                        <h5>Reliable Solutions.</h5>
                        <h5>A Stronger Africa.</h5>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class="row">
                    <div class="col-md-3 mb-2 obj">
                        <div class="card p-2 h-100">
                            <div class="text-center">
                                <div class="ico">
                                    <i class="fa-solid fa-people-group"></i>
                                </div>
                                <h4>Experienced Team</h4>
                                <p>
                                    Industry knowledge you can trust.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2 obj">
                        <div class="card p-2 h-100">
                            <div class="text-center">
                                <div class="ico">
                                    <i class="fa-solid fa-shield"></i>
                                </div>
                                <h4>Compliance & HSE Focus</h4>
                                <p>
                                    Meeting international standards with a strong focus on safety and responsible operations.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2 obj">
                        <div class="card p-2 h-100">
                            <div class="text-center">
                                <div class="ico">
                                    <i class="fa-solid fa-gear"></i>
                                </div>
                                <h4>Customized Solutions</h4>
                                <p>
                                    Tailored logistics solutions for projects of all sizes.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2 obj">
                        <div class="card p-2 h-100">
                            <div class="text-center">
                                <div class="ico">
                                    <i class="fa-solid fa-handshake"></i>
                                </div>
                                <h4>Long-Term Partnership</h4>
                                <p>
                                    Building lasting relationships delivering consistent results.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GLOBAL NETWORK -->

    <section id="global-network" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 global-reach">
                    <h1>GLOBAL NETWORK</h1>
                    <hr>
                    <p>We connect businesses across:</p>
                    <div class="">
                        <h5>AFRICA | EUROPE | ASIA | MIDDLE EAST | AMERICA</h5>
                    </div>

                    <P>Strategically positioned warehouses and logistics partners enable us to provide efficient solutions across international trade routes.</P>

                </div>

                <div class="col-md-5">
                    <img src="assets/imgs/world_map2.png" alt="">
                </div>

                <div class="col-md-2 col-sm-12 means">
                    <div class="d-flex flex-column">
                        <span>
                            <i class="fa-solid fa-plane-departure"></i> | AIR
                        </span>
                        <span>
                            <i class="fa-solid fa-ship"></i> | SEA
                        </span>
                        <span>
                            <i class="fa-solid fa-truck"></i> | LAND
                        </span>
                        <span>
                            <i class="fa-solid fa-warehouse"></i> | WAREHOUSES
                        </span>
                        <span>
                            <i class="fa-solid fa-globe"></i> | GLOBAL REACH
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Base Oil Production Section -->
        <div class="base-oil-section py-5" style="background: linear-gradient(135deg,#f8fbff 0%,#ffffff 100%); overflow:hidden">
            <div class="container">
                <div class="row align-items-center g-5">

                    <!-- Left Content -->
                    <div class="col-lg-6">
                        <span class="section-tag">
                            <i class="fas fa-flask"></i> Base Oil Production
                        </span>

                        <h2 class="section-title mt-3">
                            Premium Base Oil Manufacturing & Global Supply
                        </h2>

                        <h5 class="company-name">
                            Trans Kontinental Services Ltd
                        </h5>

                        <p class="section-text">
                            Trans Kontinental Services Ltd specializes in the production,
                            storage, and international distribution of premium quality base oils
                            for industrial and commercial applications. Our integrated logistics
                            network ensures reliable supply, consistent quality, and timely
                            delivery across global markets.
                        </p>

                        <!-- Features -->
                        <div class="feature-list">
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                Premium Quality
                            </div>

                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                Global Export
                            </div>

                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                Reliable Supply Chain
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-4 d-flex flex-wrap gap-3">
                            <a href="contact.html" class="btn btn-primary px-4" style="background-color: #00001C;">
                                Contact Sales
                            </a>

                            <a href="#" class="btn btn-outline-primary px-4">
                                Product Catalogue
                            </a>
                        </div>
                    </div>

                    <!-- Right Image -->
                    <div class="col-lg-6">
                        <div class="image-wrapper">
                            <img src="<?= url('assets/imgs/base-oil-home-pic.jpg') ?>"
                                alt="Base Oil Production"
                                class="img-fluid">
                        </div>
                    </div>

                </div>

                <!-- Gradient Divider -->
                <div class="gradient-divider my-5"></div>

                <!-- Statistics -->
                <div class="row text-center g-4">

                    <div class="col-6 col-lg-3">
                        <div class="stat-card">
                            <i class="fas fa-industry"></i>
                            <h3>500K+</h3>
                            <p>Annual Capacity</p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="stat-card">
                            <i class="fas fa-ship"></i>
                            <h3>40+</h3>
                            <p>Global Ports</p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="stat-card">
                            <i class="fas fa-globe"></i>
                            <h3>30+</h3>
                            <p>Countries Served</p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="stat-card">
                            <i class="fas fa-clock"></i>
                            <h3>24/7</h3>
                            <p>Logistics Support</p>
                        </div>
                    </div>

                </div>
            </div>
</div>

    <div class="row gx-0 gap-2 p-2">
        <div class="col-md-4">
            <img src="assets/imgs/evening_offloading.png" alt="">
        </div>
        <div class="col md-4 reform">
            <h4 class="">From Origin to Operation,</h4>
            <h4 class="sec">We Keep Your Projects Moving.</h4>
            <button class="btn btn-warning quote"><i class="fa-solid fa-circle-arrow-right"> </i>Get in Touch Today</button>
        </div>

        <div class="col-md-3 p-3" style="background-image: url('assets/imgs/world_map.png'); background-position: center; color: antiquewhite;">
            <div class="collab">
                <h6>PEOPLE</h6>
                <h6>PARTNERSHIP</h6>
                <h6>SOLUTIONS</h6>
                <h6>RESULTS</h6>
            </div>
            <hr>
        </div>
    </div>
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="assets/fontawesome-free-7.3.1/js/all.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>

</html>