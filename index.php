<?php

// Incluir los archivos de configuración y utilidades
include_once './config.php';
include_once './helpers/utils.php';

// Ruta predeterminada
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Manejar la autenticación
if ($page == 'register' || $page == 'login' || $page == 'logout') {
    include './controllers/authController.php';
    exit();
}

// Comprobar si el usuario está autenticado para acceder a otras páginas
if (!isset($_SESSION['user_id']) && $page != 'home') {
    redirect(BASE_URL . '/index.php?page=login');
}

// Incluir las vistas según la ruta
switch ($page) {
    case 'home':
        include './views/home.php';
        break;
    case 'register':
        include './views/auth/register.php';
        break;
    case 'login':
        include './views/auth/login.php';
        break;
    case 'quotes':
        include './views/quotes/list.php';
        break;
    case 'create_quote':
        include './views/quotes/create.php';
        break;
    case 'edit_quote':
        include './views/quotes/edit.php';
        break;
    default:
        include './views/404.php';
        break;
}

