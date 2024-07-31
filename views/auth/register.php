
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/cotizaciones_app/assets/css/styles.css">
    <link rel="stylesheet" href="/cotizaciones_app/assets/css/custom.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/registrations/registration-7/assets/css/registration-7.css">
    <script src="/cotizaciones_app/assets/js/register.js" defer></script>
</head>

<body>
    <?php include "../../layouts/header.php" ?>
    <section class="bg-light py-3 py-md-5 py-xl-8">
        <div class="container">
            <?php if (isset($_GET['error'])) : ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php endif; ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                        <div class="mb-5">
                            <h4 class="text-center mb-4">Registro</h4>
                        </div>
                        <div class="card border border-light-subtle rounded-4">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <form id="registerForm" action="/cotizaciones_app/controllers/authController.php" method="POST">
                                    <input type="hidden" name="action" value="register">

                                    <p class="text-center mb-4">Sign up using email</p>
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="username" id="username" placeholder="First Name" required>
                                                <label for="username" class="form-label">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                                <label for="password" class="form-label">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                                <label for="email" class="form-label">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" required>
                                                <label class="form-check-label text-secondary" for="iAgree">
                                                    I agree to the <a href="/cotizaciones_app/views/extras/terms.php" target="_blank class=" link-primary text-decoration-none">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary btn-lg" type="submit">Sign up</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-4">
                            <p class="m-0 text-secondary text-center">Already have an account? <a href="/cotizaciones_app/views/auth/login.php" class="link-primary text-decoration-none">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <?php include "../../layouts/footer.php" ?>
</body>

</html>