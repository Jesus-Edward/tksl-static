<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base Oil | Trans Kontinental Services Ltd.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/fontawesome-free-7.3.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/base_oil.css">
    <link rel="shortcut icon" href="<?= url('assets/imgs/small-logo-bg-removed.png') ?>" type="image/x-icon">
</head>

<style>
 
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

    <section id="hero" class="base-oil-section">
        <div class="hero-details ">
            <div class="" style="position: absolute; left: 50px; top: 100px;">
                <h6 style="letter-spacing: 11px;">HIGH PERFORMANCE LUBRICANT SOLUTIONS.</h6>
        
                <div class="base_h1">
                    <h1 style="color: #fff;">BASE <span style="color: #FFEF00;">OILS</span></h1>
                </div>
        
                <div class="">
                    <h3 class="text-light">The Essential Foundation.</h3>
                    <h3 class="text-light">for High-Performance Lubricants.</h3>
                </div>
        
                <div>
                    <p class="gl-p" style="color: #cfc4c4;">
                        Trans Kontinental Services Ltd supplies high-quality base oil for the production of lubricants, supporting industries with reliable and consistent supply for high-performance applications.
                    </p>
                </div>
        
                <div class="d-flex justify-content-between mt-3">
                    <div class="qlty">
                        <div class="icon">
                            <i class="fa-solid fa-shield"></i>
                        </div>
                        <h6 class="text-center" style="color: #cfc4c4;">QUALITY</h6>
                        <h6 class="text-center" style="color: #cfc4c4;">SUPPLY</h6>
                    </div>
                    <div class="">
                        <div class="icon">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        <h6 class="text-center" style="color: #cfc4c4;">CONSISTENT</h6>
                        <h6 class="text-center" style="color: #cfc4c4;">PERFORMANCE</h6>
                    </div>
                    <div class="">
                        <div class="icon">
                            <i class="fa-solid fa-handshake "></i>
                        </div>
                        <h6 class="text-center" style="color: #cfc4c4;">TRUSTED</h6>
                        <h6 class="text-center" style="color: #cfc4c4;">PARTNERSHIP</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="warehouses py-4 bg-light">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="title">
                    <h4>APPLICATIONS</h4>
                    <hr>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-5">
                <div class="col">
                    <div class="card h-100">
                        <img src="assets/imgs/lub_to_engine.webp" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/car-icon.jpg" height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">AUTOMOTIVE LUBRICANTS</h6>
                                <p style="color: #00001C;">For smoother, longer engine life</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="assets/imgs/industry_gears.avif" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/industry-icon.jpg" height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">INDUSTRIAL OILS</h6>
                                <p style="color: #00001C;">Reliable lubricants for heavy operations.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="assets/imgs/escavator.jpg" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/truck-icon.jpg" height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">HEAVY-DUTY APPLICATIONS</h6>
                                <p style="color: #00001C;">Built for tough environments.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="assets/imgs/vessel2.jpg" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/ship-vector.webp" height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">MARINE LUBRICANTS</h6>
                                <p style="color: #00001C;">Performance at sea.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="assets/imgs/windmill.jpg" alt="">
                        <div class="d-flex p-2">
                            <div class="" style="height: 50px; width: 50px; background-color: #00001C; border-radius: 50%;">
                                <img src="assets/imgs/special-icon.jpg" height="50" width="50" alt="">
                            </div>
                            <div>
                                <h6 style="color: #00001C;">SPECIALITY OILS</h6>
                                <p style="color: #00001C;">Customized solutions for unique needds.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 base">
        <div class="container">
            <div class="icoo d-flex justify-content-between">
                <div class="d-flex">
                    <div>
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <div>
                        <h6>GLOBAL SUPPLY</h6>
                        <p>A reliable and secure supply chain</p>
                    </div>
                </div>

                <div class="d-flex">
                    <div>
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <div>
                        <h6>TRUSTED PARTNERSHIP</h6>
                        <p>Building lasting business relationship.</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <i class="fa-solid fa-gear"></i>
                    </div>
                    <div>
                        <h6>QUALITY ASSURANCE</h6>
                        <p>Products you can trust</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>
                    <div>
                        <h6>A SMOOTHER TOMORROW</h6>
                        <p>Supporting industries for a better, more efficient future.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <section id="base_oil" class="hero-contact"  style="background-position-x: -200px;">
            <hr>
            <div class="base_oil_details">
                <div class="container">
                    <div class="p-5">
                        <h2>Let's Move Your Business Forward.</h2>

                        <p>
                            Whether you require oil & gas logistics, project cargo transportation, freight forwarding, warehousing, supply-chain solutions or base oils, our team is ready to assist.
                        </p>

                        <div class="d-flex mb-2">
                            <div class="b_oil_icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="d-block" style="margin-left: 10px; margin-top:10px">
                                <h6>(+234) 123456789</h6>
                                <h6>(+234) 123456789</h6>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="b_oil_icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="d-block" style="margin-left: 10px; margin-top:10px">
                                <h6>info@transcontinental.com</h6>
                            </div>
                        </div>
                        <div class="d-flex mb-2 text-center">
                            <div class="b_oil_icon">
                                <i class="fa-solid fa-globe"></i>
                            </div>
                            <div class="d-block" style="margin-left: 10px; margin-top:10px">
                                <h6>www.transcontinental.com</h6>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="b_oil_icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="d-block" style="margin-left: 10px; margin-top:10px">
                                <h6>Lagos, Nigeria</h6>
                                <p>Serving Africa, Connecting the World</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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