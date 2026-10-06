<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Trans Kontinental Services Ltd.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/fontawesome-free-7.3.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/base_oil.css">
    <link rel="stylesheet" href="assets/css/contact.css">
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


    <!-- HERO -->



    <section class="base">
        <section id="base_oil" class="hero-contact" style="background-position-x: -200px;">
            <!-- <hr> -->
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
            <div id="form-card">
                <div class="card p-4">
                    <?php if (!empty($_SESSION['errors'])) { ?>
                        <?php foreach ($_SESSION['errors'] as $error): ?>
                            <div class="mx-auto my-3" style="background-color: red; color:white; padding:8px; text-align:center; border-radius:8px">
                                <i class="fa-solid fa-circle-info"></i> <?php echo $error; ?>
                            </div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['errors']); ?>
                    <?php } ?>
                    <?php if (!empty($_SESSION['success'])): ?>
                        <?php foreach ($_SESSION['success'] as $success): ?>
                            <div class="alert alert-warning text-center my-3 font-weight-bold">
                                <?= htmlspecialchars($success) ?>
                            </div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
                    <h4>Send Us an Enquiry</h4>

                    <form id="contactForms" action="<?= url('/send/contact/form') ?>" method="post">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Company</label>
                                    <input type="text" name="company" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label for="">Service Required</label>
                            <select name="services" id="" class="form-select">
                                <option value="">Select a service</option>
                                <option value="Cargo Renting">Cargo Renting</option>
                                <option value="Lubricants">Lubricants</option>
                                <option value="Global Logistics">Global Logistics</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="">Message</label>
                            <textarea name="message" id="" class="form-control"></textarea>
                        </div>

                        <div class="g-recaptcha" data-sitekey="6LfsEtctAAAAAIsdMtaU1ZHIk4vF5bwfjdMLqUKj" data-callback="enableSubmit"></div>

                        <button id="submitButtons"
                            type="submit" class="btn btn-warning w-100 fw-bold" name="contact-form-btn">
                            <i class="fa-solid fa-paper-plane"></i> Send Enquiry
                        </button>

                    </form>
                </div>
            </div>


        </section>
    </section>


    <!-- FOOTER -->
    <footer class="bg-light">
        <div class="container py-5">
            <div class="row footer-contents">
                <div class="col-md-3 col-sm-6">
                    <div class="d-flex">
                        <a href="/trans-ks-ltd">
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
                    <circle cx="20" cy="20" r="17" />
                    <ellipse cx="20" cy="20" rx="7" ry="17" />
                    <line x1="3" y1="20" x2="37" y2="20" />
                    <line x1="6" y1="11" x2="34" y2="11" />
                    <line x1="6" y1="29" x2="34" y2="29" />
                    <circle class="dot" cx="20" cy="3" r="1.6" />
                    <circle class="dot" cx="20" cy="37" r="1.6" />
                    <circle class="dot" cx="3" cy="20" r="1.6" />
                    <circle class="dot" cx="37" cy="20" r="1.6" />
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

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- <script src="https://web3forms.com/client/script.js" async defer></script> -->

    <!-- <script>

        const form = document.getElementById('contactForm');

        const button = document.getElementById('submitButton');

        form.addEventListener('submit', async function (e) {

            e.preventDefault();

            button.disabled = true;
            button.textContent = 'Sending...';

            try {

                const token = await grecaptcha.enterprise.execute('6LcAmcAtAAAAABu--EFntdyieQt4TDenNw0yw5Eg', {action: 'CONTACT'});
                
                const formData = new FormData(form);
                formData.append('recaptcha_token', token);

                const response = await fetch(
                    'api/contact.php',
                    {
                        method: 'POST',
                        body: formData
                    }
                );

                const result = await response.json();

                // const text = await response.text();

                // console.log('PHP response:', text);

                // const result = JSON.parse(text);

                if (!response.ok || !result.success) {
                    throw new Error(result.message);
                }

                alert(result.message);

                form.reset();
            } catch (error) {

                alert(
                    error.message ||
                    'Something went wrong. Please try again.'
                );

            } finally {

                button.disabled = false;
                button.textContent = 'Send Enquiry';

            }

        });

    </script> -->
</body>

</html>