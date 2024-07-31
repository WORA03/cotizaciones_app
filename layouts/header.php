<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header con Logo y Botones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos para centrar el contenido del header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f9fa;
            border-bottom: 1.50px solid #c5c6c6;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .logo {
            width: 70px;
            /* Ajusta el tamaño del logo según sea necesario */
        }

        .logodrop {
            width: 30px;
        }

        .btn {
            display: auto;
            gap: 15px;
        }

        .dropdown {
            display: auto;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            /* Ajusta el ancho máximo si es necesario */
            margin: 0 auto;
        }

        .no-border {
            border: none;
        }

        .header.compact {
            padding: 15px;
            /* Ajusta el padding según lo que necesites */
            height: 52px;
            /* Ajusta la altura según lo que necesites */
        }
    </style>
</head>

<body>

    <header class="header compact">
        <div class="header-content">
            <!-- Logo a la izquierda -->
            <div>
                <a href="/cotizaciones_app"><img src="/cotizaciones_app/assets/img/Logo.PNG" alt="Logo" class="logo"></a> <span class="fs-4"></span>
            </div>
            <!-- Titulo -->

            <!-- Botones a la derecha -->
            <div class="buttons">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <a href="/cotizaciones_app" class="btn btn-outline-dark">Home</a>
                    <a href="/views/registrar_factura.php" class="btn btn-inline-light">Crear Cotizacion</a>
                    <a href="/cotizaciones_app/views/quotes/list.php" class="btn btn-inline-light">Ver Cotizaciones</a>
                <?php else : ?>
                    <a href="/cotizaciones_app" class="btn btn-outline-dark ">Home</a>
                    <a href="/cotizaciones_app/views/extras/about.php" class="btn btn-inline-light no-border">About</a>
                    <a href="/cotizaciones_app/views/extras/contact_us.php" class="btn btn-inline-light">Contact us</a>
                <?php endif; ?>
            </div>

            <div class="dropdown">
                <button class=" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/cotizaciones_app/assets/img/icons8-avatar-50.png" class="logodrop">
                </button>
                
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <li><a class="dropdown-item" href="/cotizaciones_app/controllers/authController.php?action=logout">Logout</a></li>
                    <?php else : ?>
                        <li><a class="dropdown-item" href="/cotizaciones_app/views/auth/login.php">Iniciar Sesión</a></li>
                        <li><a class="dropdown-item" href="/cotizaciones_app/views/auth/register.php">Registrarse</a></li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
        <hr>
    </header>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>