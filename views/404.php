<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

    <main class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 text-center">

                    <!-- 404 -->
                    <div class="display-1 fw-bold text-primary mb-2">
                        404
                    </div>

                    <!-- Message -->
                    <h1 class="fw-bold mb-3">
                        Page Not Found
                    </h1>

                    <p class="text-secondary fs-5 mb-4">
                        Sorry, the page you're looking for doesn't exist,
                        has been moved, or may have been removed.
                    </p>

                    <!-- Buttons -->
                    <div class="d-flex flex-column flex-sm-row
                                justify-content-center gap-2">

                        <a href="<?= url('/') ?>" class="btn btn-primary btn-lg px-4">
                            ← Go Home
                        </a>

                        <button
                            type="button"
                            class="btn btn-outline-secondary btn-lg px-4"
                            onclick="history.back()"
                        >
                            Go Back
                        </button>

                    </div>

                    <!-- Small footer text -->
                    <p class="text-muted mt-5 mb-0 small">
                        Error code: 404
                    </p>

                </div>
            </div>
        </div>
    </main>

</body>
</html>
