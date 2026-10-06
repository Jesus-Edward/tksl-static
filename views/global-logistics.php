<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Logistics | Trans Kontinental Services Ltd.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/fontawesome-free-7.3.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/global-log.css">
    <link rel="shortcut icon" href="<?= url('assets/imgs/small-logo-bg-removed.png') ?>" type="image/x-icon">
</head>

<style>
    .gl-p, .gl-g h6 {
        color: #FFFAFA;
    }

    .icon {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        background-color: #00001C;
        padding-bottom: 20px;
        padding-top: 10px;
        outline: 2px solid #FFEF00;
    }

    .icon .fa-globe, .fa-chart-simple, .fa-shield, .fa-people-group {
        color: #FFEF00 !important;
        font-size: 1.5rem;
    }

    .fa-circle-check {
        color: #FFEF00 !important;
    }

    .title h4, .sec-goal h6 {
        font-weight: bold;
    }

    .carding .p-2 {
        background-color: #00001C;
    }

    .card h6 {
        color: #fff;
        font-weight: bold;
    }

    .carding {
        border-radius: 6px !important;
    }

    .card p {
        color: #cfc4c4;
    }

    footer .fa-globe {
        color: #00001C !important;
        font-size: 2rem !important;
    }

    .warehouses-h img {
        height: 200px !important;
    }

    .warehouses-h .card {
        height: 320px !important;
    }

    .frieght {
        height: 250px !important;
    }

    @media (max-width: 556px) {
        .hero-details h1 {
            font-size: 4rem !important;
        }

        .hero-details {
            width: 100% !important;
        }
    }
</style>
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
                    <!-- <?php if(!isset($_SESSION['user_id'])) { ?>
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


  <!-- HERO -->

    <section id="hero" class="global-log-section">
        <div class="hero-details ">
            <div class="" style="position: absolute; left: 50px; top: 100px;">
                <h6 style="letter-spacing: 11px;">TRANS KONTINENTAL SERVICES LTD.</h6>
        
                <h1 class="text-light">GLOBAL FRIEGHT &</h1>
                <h1>LOGISTIC PARTNER</h1>
        
                <div class="">
                    <h4 class="text-light">END-TO-END SOLUTIONS.</h4>
                    <h4 class="text-light">A STRONGER AFRICA.</h4>
                </div>
        
                <div>
                    <p class="gl-p">
                        We provide reliable and efficient frieght and logistics solution with strategic warehouses worldwide, connecting Africa to global marketplace.
                    </p>
                </div>
        
                <div class="d-flex justify-content-between gl-g mt-3">
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                        <h6>GLOBAL REACH</h6>
                    </div>
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa-solid fa-people-group"></i>
                        </div>
                        <h6>LOCAL EXPERTISE</h6>
                    </div>
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa-solid fa-shield "></i>
                        </div>
                        <h6>RELIABLE SOLUTIONS</h6>
                    </div>
                    <div class="text-center">
                        <div class="icon">
                            <i class="fa-solid fa-chart-simple"></i>
                        </div>
                        <h6 class="text-center">COST-EFFECTIVE SERVICES</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="warehouses warehouses-h py-4 bg-light">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="title">
                    <h4>STRATEGIC WAREHOUSES AROUND THE WORLD</h4>
                    <hr>
                </div>

                <div class="sec-goal">
                    <h6>STORE | CONSOLIDATE | FORWARD</h6>
                </div>
            </div>
            <div class="row gap-0">
                <div class="col-md-2">
                    <div class="card carding">
                        <img src="assets/imgs/us_warehouse.png" alt="">
                        <div class="p-2 h-100">
                            <h6>US Warehouse</h6>
                            <p>Consolidation & Distribution for America and Africa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 h-100">
                    <div class="card carding">
                        <img src="assets/imgs/uk_warehouse.png" alt="">
                        <div class="p-2 h-100">
                            <h6>UK Warehouse</h6>
                            <p>Consolidation & Fullfilment for Europe and Africa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card carding">
                        <img src="assets/imgs/ch_warehouse.png" alt="">
                        <div class="p-2 h-100">
                            <h6>CHINA Warehouse</h6>
                            <p>Supply consolidation & Export Handling for Africa and China</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card carding">
                        <img src="assets/imgs/uae_warehouse.png" alt="">
                        <div class="p-2 h-100">
                            <h6>UAE Warehouse</h6>
                            <p>Middle East Hub for Africa and Global Trade</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card carding">
                        <img src="assets/imgs/india_warehouse.png" alt="">
                        <div class="p-2 h-100">
                            <h6>INDIA Warehouse</h6>
                            <p>Consolidation & Procurement for India and Africa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card p-2" style="background-color: #00001C;">
                        <p class="text-light" style="font-size: 1.2rem; font-weight: bold;">
                            <i class="fa-solid fa-globe"></i> AND BEYOND
                        </p>
                        <p>
                            <i class="fa-solid fa-circle-check"></i> EUROPE
                        </p>
                        <p>
                            <i class="fa-solid fa-circle-check"></i> TURKEY
                        </p>
                        <p>
                            <i class="fa-solid fa-circle-check"></i> SINGAPORE
                        </p>
                        <p>
                            <i class="fa-solid fa-circle-check"></i> HONG KONG
                        </p>

                        <p class="text-center text-light">
                            A GROWING GLOBAL NETWORK
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="warehouses py-4 bg-light">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="title">
                    <h4>OUR FREIGHT & LOGISTICS SERVICES</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-2">
                    <div class="card">
                        <img class="frieght" src="assets/imgs/vessel2.jpg" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/ship-vector.webp" height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">OCEAN FRIEGHT</h6>
                                <p style="color: #00001C;">FCL | LCL | Project Cargo Worldwide</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="frieght" src="assets/imgs/cargo_plane.jpg" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/plane-icon.jpg" height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">AIR FRIEGHT</h6>
                                <p style="color: #00001C;">Fast | Secure | Reliable</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="frieght" src="assets/imgs/cargo_truck.jpg" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/truck-icon.jpg" height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">LAND TRANSPORT</h6>
                                <p style="color: #00001C;">Regional & Inland Distribution</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="frieght" src="assets/imgs/warehouse_with_carriers.jpg" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/warehouse-icon.png" height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">WAREHOUSING & DISTRIBUTION</h6>
                                <p style="color: #00001C;">Global Warehousing & Fullfilment</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="frieght" src="assets/imgs/custom_warehouse.jpg" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/clearance-icon.png" height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">CUSTOM CLEARANCE</h6>
                                <p style="color: #00001C;">Exper Handling & Compliance</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="frieght" src="assets/imgs/supply_chain.jpg" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/chain-icon.png" height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">SUPPLY CHAIN SOLUTIONS</h6>
                                <p style="color: #00001C;">Procurement, Consolidation, and Inventory Management</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="frieght" src="assets/imgs/cargo_insurance.jpg" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/shield-ixcon.png " height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">CARGO INSURANCE</h6>
                                <p style="color: #00001C;">Protection For Your Shipments</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="frieght" src="assets/imgs/transported_heavy_equipment.jpg" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/bulldozer-icon.png" height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">SPECIAL CARGO</h6>
                                <p style="color: #00001C;">Machinery, Oil & Gas and More</p>
                            </div>
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

        <hr class="hrr">

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
                        <a href="<?= url("/") ?>">
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