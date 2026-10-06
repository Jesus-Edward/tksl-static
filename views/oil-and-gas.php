<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oil & GAS | Trans Kontinental Services Ltd.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/fontawesome-free-7.3.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/base_oil.css">
    <link rel="stylesheet" href="assets/css/oil_and_gas.css">
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

    <section id="hero" class="oil-gas">
        <div class="hero-details ">
            <div class="" style="position: absolute; left: 50px; top: 100px;">
                <h6 style="letter-spacing: 11px;">YOUR TRUSTED LOGISTICS PARTNER.</h6>
        
                <div class="base_h1">
                    <h1 style="color: #FFEF00;">OIL & GAS</h1>
                </div>
        
                <div class="">
                    <h2 class="text-light fw-bold">INDUSTRY LOGISTICS.</h2>
                </div>
        
                <div>
                    <p class="gl-p" style="color: #cfc4c4;">
                        Trans Kontinental Services Ltd. provides end-to-end logistics solutions to the oil & gas industry, delivering safe, efficient and reliable support at every stage of your project - from exploration to distribution.
                    </p>
                </div>
        
                <div class="d-flex justify-content-evenly mt-3">
                    <div class="qlty">
                        <div class="icon">
                            <i class="fa-solid fa-shield"></i>
                        </div>
                        <h6 class="text-center" style="color: #cfc4c4;">SAFE</h6>
                        <h6 class="text-center" style="color: #cfc4c4;">HANDLING</h6>
                    </div>
                    <div class="">
                        <div class="icon">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        <h6 class="text-center" style="color: #cfc4c4;">EXPERT</h6>
                        <h6 class="text-center" style="color: #cfc4c4;">PLANNING</h6>
                    </div>
                    <div class="">
                        <div class="icon">
                            <i class="fa-solid fa-globe "></i>
                        </div>
                        <h6 class="text-center" style="color: #cfc4c4;">GLOBAL</h6>
                        <h6 class="text-center" style="color: #cfc4c4;">REACH</h6>
                    </div>
                    <div class="">
                        <div class="icon">
                            <i class="fa-solid fa-clock "></i>
                        </div>
                        <h6 class="text-center" style="color: #cfc4c4;">ON-TIME</h6>
                        <h6 class="text-center" style="color: #cfc4c4;">DELIVERY</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="warehouses py-4 bg-light">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="title">
                    <h4>OUR OIL & GAS LOGISTICS SERVICES</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <img src="assets/imgs/transported_heavy_equipment.jpg" alt="">
                        <div class="text-center p-2 h-100" style="background-color: #00001C;">
                            <h6 style="color: #FFF;">HEAVY & OVERSIZED TRANSPORT</h6>
                            <p style="color: #FFF;">Safe and efficient movement of large and heavy equipments.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <img src="assets/imgs/port.jpg" alt="">
                        <div class="text-center p-2 h-100" style="background-color: #00001C;">
                            <h6 style="color: #FFF;">PORT HANDLING & SHIPPING</h6>
                            <p style="color: #FFF;">Efficient terminal operations and vessel chartering.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <img src="assets/imgs/cargo_plane_luggage.jpg" alt="">
                        <div class="text-center p-2" style="background-color: #00001C;">
                            <h6 style="color: #FFF;">AIR FRIEGHT SOLUTIONS</h6>
                            <p style="color: #FFF;">Time-critical spares of equipments delivery.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <img src="assets/imgs/offshore_logistics.avif" alt="">
                        <div class="text-center p-2 h-100" style="background-color: #00001C;">
                            <h6 style="color: #FFF;">OFFSHORE LOGISTICS</h6>
                            <p style="color: #FFF;">Supply chain support for offshore operations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <img src="assets/imgs/pipeline.jpg" alt="">
                        <div class="text-center p-2 h-100" style="background-color: #00001C;">
                            <h6 style="color: #FFF;">WAREHOUSING AND MATERIALS MANAGEMENT</h6>
                            <p style="color: #FFF;">Storage, consolidation, and inventory services.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <img src="assets/imgs/pipeline2.jpg" alt="">
                        <div class="text-center p-2 h-100" style="background-color: #00001C;">
                            <h6 style="color: #FFF;">PIPELINE & FIELD LOGISTICS</h6>
                            <p style="color: #FFF;">End-to-end logistics for field development.</p>
                        </div>
                    </div>
                </div>
                
                
                
                </div>
            </div>
        </div>
    </section>

      <!-- Value chain + diagonal cutout photo -->
  <section class="value-chain">
    <div class="value-chain-content">
      <h1>SERVING THE ENTIRE OIL &amp; GAS VALUE CHAIN</h1>
      <div class="underline"></div>

      <div class="chain-icons">
        <div class="chain-item">
          <svg viewBox="0 0 48 48"><path d="M8 40h32M12 40V20l10-10 10 10v20M18 40V26h12v14M6 20h36" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <span>EXPLORATION</span>
        </div>
        <div class="chain-item">
          <svg viewBox="0 0 48 48"><path d="M6 40h20M10 40V24l4-4M18 34l10-18 6 6-14 14M32 12l4 4-4 4-4-4z" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <span>PRODUCTION</span>
        </div>
        <div class="chain-item">
          <svg viewBox="0 0 48 48"><path d="M6 40h36M10 40V22h6v18M20 40V16h8v24M32 40V26h6v14M14 22V16h4v6M22 16h4v-4h-4z" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <span>PROCESSING</span>
        </div>
        <div class="chain-item">
          <svg viewBox="0 0 48 48"><path d="M6 20h14M28 20h14M20 20a4 4 0 004-4 4 4 0 014-4M20 20a4 4 0 014 4 4 4 0 004 4M8 28h10M30 28h10M14 28a4 4 0 004-4M14 28a4 4 0 014 4M34 28a4 4 0 01-4-4M34 28a4 4 0 00-4 4" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <span>PIPELINES</span>
        </div>
        <div class="chain-item">
          <svg viewBox="0 0 48 48"><path d="M8 40h32M12 40V26l8-8 8 8v14M28 40V22l6-6 6 6v18M16 40v-8h6v8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <span>REFINING</span>
        </div>
        <div class="chain-item">
          <svg viewBox="0 0 48 48"><ellipse cx="24" cy="14" rx="14" ry="5"/><path d="M10 14v14c0 2.8 6.3 5 14 5s14-2.2 14-5V14M24 33v7M18 40h12" stroke-linecap="round"/></svg>
          <span>STORAGE &amp; TERMINALS</span>
        </div>
        <div class="chain-item">
          <svg viewBox="0 0 48 48"><path d="M4 30h24V16H4zM28 22h9l6 6v2h-2M8 34a3 3 0 100 6 3 3 0 000-6zM33 34a3 3 0 100 6 3 3 0 000-6zM11 34h19" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <span>DISTRIBUTION</span>
        </div>
      </div>
    </div>

    <div class="value-chain-photo">
      <img src="assets/imgs/evening_refinery.png" alt="Oil refinery at dusk">
      <div class="photo-caption">
        <p>YOUR ENERGY PROJECTS.<br>OUR LOGISTICS EXPERTISE.</p>
        <div class="tagline">SAFE <span class="accent">|</span> RELIABLE <span class="accent">|</span> GLOBAL</div>
      </div>
    </div>
  </section>

  <!-- Our Advantage -->
  <section class="advantage">
    <h2>OUR ADVANTAGE</h2>
    <div class="underline"></div>

    <div class="advantage-grid">
      <div class="advantage-item">
        <div class="badge">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="3"/><path d="M5 20c0-3.3 3.1-6 7-6s7 2.7 7 6" stroke-linecap="round"/></svg>
        </div>
        <div>
          <h3>INDUSTRY EXPERTISE</h3>
          <p>Deep understanding of the oil &amp; gas sector.</p>
        </div>
      </div>

      <div class="advantage-item">
        <div class="badge">
          <svg viewBox="0 0 24 24"><path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6z" stroke-linejoin="round"/></svg>
        </div>
        <div>
          <h3>SAFETY FIRST</h3>
          <p>Commitment to HSE and international standards.</p>
        </div>
      </div>

      <div class="advantage-item">
        <div class="badge">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 3v2M12 19v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M3 12h2M19 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4" stroke-linecap="round"/></svg>
        </div>
        <div>
          <h3>TAILORED SOLUTIONS</h3>
          <p>Customized to meet your project requirements.</p>
        </div>
      </div>

      <div class="advantage-item">
        <div class="badge">
          <svg viewBox="0 0 24 24"><path d="M3 12l4-3 3 2 4-4 4 3M9 11v5M15 10v6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <div>
          <h3>A TRUSTED PARTNER</h3>
          <p>Committed to your success, today and tomorrow.</p>
        </div>
      </div>
    </div>
  </section>

<!-- GLOBAL NETWORK -->

     <section id="global-network" class="py-5">
        <div class="container">
            <div class="row gx-0 gap-2 p-2">
                <div class="col-md-4">
                    <img src="assets/imgs/evening_refinery.png" alt="">
                </div>
                <div class="col md-4 reform">
                    <div class="container-fluid">

                        <h4 class="">From Origin to Operation,</h4>
                        <h4 class="sec">We Keep Your Projects Moving.</h4>
                        <button class="w-100 btn btn-warning quote"><i class="fa-solid fa-circle-arrow-right"> </i>Get in Touch Today</button>
                    </div>
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
<div class="topbar">
  <div class="orange-block"></div>
  <div class="navy-block"></div>

  <div class="region-links">
    <span>AFRICA</span><span class="sep">|</span>
    <span>EUROPE</span><span class="sep">|</span>
    <span>ASIA</span><span class="sep">|</span>
    <span>MIDDLE EAST</span><span class="sep">|</span>
    <span>AMERICAS</span>
  </div>

  <div class="brand-message">
    <div class="globe-icon">
      <svg viewBox="0 0 40 40">
        <circle cx="20" cy="20" r="17"/>
        <ellipse cx="20" cy="20" rx="7" ry="17"/>
        <line x1="3" y1="20" x2="37" y2="20"/>
        <line x1="6" y1="11" x2="34" y2="11"/>
        <line x1="6" y1="29" x2="34" y2="29"/>
        <circle class="dot" cx="20" cy="3" r="1.6"/>
        <circle class="dot" cx="20" cy="37" r="1.6"/>
        <circle class="dot" cx="3" cy="20" r="1.6"/>
        <circle class="dot" cx="37" cy="20" r="1.6"/>
      </svg>
    </div>
    <div class="text">
      A STRONGER AFRICA<br>
      A BRIGHTER TOMORROW.
    </div>
  </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="assets/fontawesome-free-7.3.1/js/all.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>
</html>