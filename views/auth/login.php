<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="/cotizaciones_app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/cotizaciones_app/assets/css/styles.css">
    <link rel="stylesheet" href="/cotizaciones_app/assets/css/custom.css">

    <script src="/cotizaciones_app/assets/js/login.js" defer></script>


</head>

<body class="d-flex h-100 text-center text-white bg-light">
    <?php include "../../layouts/header.php" ?>
    <div class="container align-items-center justify-content-center min-vh-200 my-4 ">
        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card border border-light-subtle rounded-3 shadow-sm">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="col-12">
                            <img src="/cotizaciones_app/assets/img/Logo.PNG" alt="Logo" class="logo">
                        </div>
                        <hr>
                        <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign in to your account</h2>
                        <form id="loginForm" action="/cotizaciones_app/controllers/authController.php" method="POST">
                            <input type="hidden" name="action" value="login">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="col-12">
                                <div class="d-grid my-3">
                                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex gap-2 justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="rememberMe" id="rememberMe">
                                        <label class="form-check-label text-secondary" for="rememberMe">
                                            Keep me logged in
                                        </label>
                                    </div>
                                    <a href="#!" class="link-primary text-decoration-none">Forgot password?</a>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="m-0 text-secondary text-center">Don't have an account? <a href="/cotizaciones_app/views/auth/register.php" class="link-primary text-decoration-none">Sign up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../../layouts/footer.php" ?>
</body>


</html>