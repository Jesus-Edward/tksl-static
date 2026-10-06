<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Successful</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6">

            <div class="card border-0 shadow-sm">
                <div class="card-body text-center p-5">

                    <!-- Success Icon -->
                    <div class="mb-4">
                        <div
                            class="bg-success bg-opacity-10 text-success rounded-circle
                                   d-inline-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px;"
                        >
                            <span class="fs-1">&#10003;</span>
                        </div>
                    </div>

                    <h1 class="h3 fw-bold text-success mb-3">
                        Order Successful!
                    </h1>

                    <?php if ($_SESSION['success']): ?>
                        <?php foreach($_SESSION['success'] as $success): ?>
                            <div class="alert alert-success mb-4" role="alert">
                                <?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?>
                            </div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['success']); ?>
                    <?php else: ?>

                        <p class="text-muted mb-4">
                            Your order has been successfully placed.
                        </p>

                    <?php endif; ?>

                    <p class="text-muted mb-4">
                        Thank you for your order. We have received your request
                        and will process it shortly.
                    </p>

                    <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center">
                        <a href="<?= url('/store') ?>" class="btn btn-success px-4">
                            Continue Shopping
                        </a>

                        <!-- <a href="<?= url('/dashboard') ?>" class="btn btn-outline-secondary px-4">
                            View My Orders
                        </a> -->
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>
