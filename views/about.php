<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Trans Kontinental Services Ltd.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/fontawesome-free-7.3.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/about.css">
    <link rel="shortcut icon" href="<?= url('assets/imgs/small-logo-bg-removed.png') ?>" type="image/x-icon">
</head>

<style>

.cad {
        --bs-card-spacer-y: 1rem;
    --bs-card-spacer-x: 1rem;
    --bs-card-title-spacer-y: 0.5rem;
    --bs-card-title-color: ;
    --bs-card-subtitle-color: ;
    --bs-card-border-width: var(--bs-border-width);
    --bs-card-border-color: var(--bs-border-color-translucent);
    --bs-card-border-radius: var(--bs-border-radius);
    --bs-card-box-shadow: ;
    --bs-card-inner-border-radius: calc(var(--bs-border-radius) - (var(--bs-border-width)));
    --bs-card-cap-padding-y: 0.5rem;
    --bs-card-cap-padding-x: 1rem;
    --bs-card-cap-bg: rgba(var(--bs-body-color-rgb), 0.03);
    --bs-card-cap-color: ;
    --bs-card-height: ;
    --bs-card-color: ;
    --bs-card-bg: var(--bs-body-bg);
    --bs-card-img-overlay-padding: 1rem;
    --bs-card-group-margin: 0.75rem;
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    height: var(--bs-card-height);
    color: var(--bs-body-color);
    word-wrap: break-word;
    background-color: var(--bs-card-bg);
    background-clip: border-box;
    border: var(--bs-card-border-width) solid var(--bs-card-border-color);
    border-radius: var(--bs-card-border-radius);
}


</style>
<body>

    <!-- NAVBAR -->

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


     <section id="hero" class="about-section">
        <div class="hero-details">
            <div class="" style="position: absolute; left: 50px; top: 100px;">
                <div class="about-tag">
                    <h6>PEOPLE <span>|</span> PARTNERSHIP <span>|</span> SOLUTIONS <span>|</span> RESULTS</h6>
                </div>
        
                <div class="about-header">
                    <h1>ABOUT <span>US</span></h1>
                </div>
                <h2>A GLOBAL LOGISTICS PARTNER CONNECTING AFRICA TO THE WORLD</h2>
        
                <div>
                    <p>
                        Trans Kontinental Services Ltd. is a leading logistics and freight solutions company, providding end-to-end logistic support for businesses across Africa and the global marketplace.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="who-we-are bg-light">
        <div class="container d-flex gap-2 py-2 sec-div">
            <div class="w-50 abt-vis">
                <h1>WHO WE ARE</h1>
                <hr>

                <div>
                    <p class="mb-3">
                        <span>Trans Kontinental Services Ltd.</span> is a global logistics and freight solutions company focused on connecting Africa to the world.
                    </p>

                    <p class="mb-3">
                        We provide end-to-end logistic services for businesses operating across different industries, with particular expertise in Oil & Gas energy, industrial projects, heavy cargo, and international trade. 
                    </p>

                    Our commitment is to provide logistics solutions that are:

                    <div class="d-flex justify-content-between text-center mt-3">
                        <div>
                            <i class="fa-solid fa-shield"></i>
                            <h6>Safe</h6>
                            <i class="fa fa-database"></i>
                        </div>

                        <div>
                            <i class="fa-solid fa-gear"></i>
                            <h6>Reliable</h6>
                            <h6>Cost-effective</h6>
                        </div>
                        <div>
                            <i class="fa-regular fa-square-check"></i>
                            <h6>Efficient</h6>
                            <i class="fa fa-people-group"></i>
                        </div>
                        <div>
                            <i class="fa-solid fa-list-check"></i>
                            <h6>Completed</h6>
                            <h6>Customized</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex card-div">
                <div class="col-md-4">
                    <div class="card first_card p-2 text-center h-100">
                        <i class="fa-solid fa-globe  mx-auto"></i>
                        <h4>OUR VISION</h4>
                        <hr class="mx-auto">
                        <h4 class="conn">Connecting Africa to the World</h4>

                        <p class="py-1 text-wrap text-light">
                            We are committed to building a stronger logitic 
                            network that enables Africa businesses to access global marketplace while prividing international companies with reliable logictics solutions across Africa.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card2 p-2 h-100">
                        <h4>OUR APROACH</h4>
                        <hr class="">
                        <div class="mb-2 reach">
                            <h5>GLOBAL REACH.</h5>
                            <h5>LOCAL EXPERTISE.</h5>
                            <h5>AFRICA FOCUS.</h5>
                        </div>

                        <p class="font-weight-bold">
                            Our international network allows us to combine global logictics capabilities with local knowledge and expertise. Whether your cargo is moving across a city, between African countries or across continents, we coordinate the journey from origin to destination.
                            
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center third h-100">
                        <img src="assets/imgs/globe_ship.jpg" style="height: 100%; object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="vision" class="py-5">
        <div class="container">
            <h1>WHY CHOOSE US?</h1>
            <hr>
            <div class="d-flex vision my-4">
                <div class="wch-row" style="width: 75%; margin-right: 10px;">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 mb-2 obj">
                            <div class="cad p-2 h-100">
                                <div class="text-center">
                                    <div class="ico">
                                        <i class="fa-solid fa-people-group"></i>
                                    </div>
                                    <h4>Experienced Team</h4>
                                    <p >
                                        Industry knowledge you can trust.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2 obj">
                            <div class="cad p-2 h-100">
                                <div class="text-center">
                                    <div class="ico" >
                                        <i class="fa-solid fa-shield"></i>
                                    </div>
                                    <h4>Compliance & HSE Focus</h4>
                                    <p >
                                        Meeting international standards while priotizing safety and responsible operations.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2 obj">
                            <div class="cad p-2 h-100">
                                <div class="text-center">
                                    <div class="ico">
                                        <i class="fa-solid fa-gear"></i>
                                    </div>
                                    <h4>Customized Solutions</h4>
                                    <p >
                                        Tailored logistics solutions for project of all sizes.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2 obj">
                            <div class="cad p-2 h-100">
                                <div class="text-center">
                                    <div class="ico">
                                        <i class="fa-solid fa-handshake"></i>
                                    </div>
                                    <h4>Long-Term Partnership</h4>
                                    <p >
                                       We work with our client to build lasting relationship and deliver consistent results.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wcu-img" style="width: 24%;">
                    <img style="width: 100%; height: 100%;" src="assets/imgs/hand_shake.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="industry-focus" class="bg-light py-3">
        <div class="container-fluid">
            <h2 class="fw-bold fs-1">OUR INDUSTRY FOCUS</h2>
            <hr>
            <div class="row">
                <div class="col-md-2 col-sm-12 px-0">
                    <div class="card mb-2 h-100">
                        <img src="assets/imgs/rig.jpg" alt="">
                        <div class="p-2 h-100" style="background-color: #00001C; color: #ccc2c2;">
                            <h5 class="fw-bold">OIL & GAS</h5>
                            <p>
                                Logistic support for the entire value chain.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 px-0">
                    <div class="card mb-2 h-100">
                        <img src="assets/imgs/rig.jpg" alt="">
                        <div class="p-2 h-100" style="background-color: #00001C; color: #ccc2c2;">
                            <h5 class="fw-bold">INDUSTRIAL PROJECTS</h5>
                            <p>
                                Logistic support for the entire value chain.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 px-0">
                    <div class="card mb-2 h-100">
                        <img src="assets/imgs/vessel2.jpg" alt="">
                        <div class="p-2 h-100" style="background-color: #00001C; color: #ccc2c2;">
                            <h5 class="fw-bold">FRIEGHT & LOGISTICS</h5>
                            <p>
                                Global and regional supply chain solutions.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 px-0">
                    <div class="card mb-2 h-100">
                        <img src="assets/imgs/cargo_plane.jpg" alt="">
                        <div class="p-2 h-100" style="background-color: #00001C; color: #ccc2c2;">
                            <h5 class="fw-bold">AIR FRIEGHT</h5>
                            <p>
                                Time-critical cargo and spares.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 px-0">
                    <div class="card mb-2 h-100">
                        <img src="assets/imgs/warehouse_with_carriers.jpg" alt="">
                        <div class="p-2 h-100" style="background-color: #00001C; color: #ccc2c2;">
                            <h5 class="fw-bold">WAREHOUSING</h5>
                            <p>
                                Storage, consolidtion and inventory management.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 px-0">
                    <div class="card mb-2 h-100">
                        <img src="assets/imgs/cargo_truck.jpg" alt="">
                        <div class="p-2 h-100" style="background-color: #00001C; color: #ccc2c2;">
                            <h5 class="fw-bold">LAND TRANSPORT</h5>
                            <p>
                                Regional and inland distribution.
                            </p>
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