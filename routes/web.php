<?php
// routes/web.php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../controllers/QuoteController.php';

$authController = new AuthController($db, $_SERVER['REQUEST_METHOD']);
$userController = new UserController($db, $_SERVER['REQUEST_METHOD']);
//$quoteController = new QuoteController($db, $_SERVER['REQUEST_METHOD']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $action = $_GET['action'] ?? '';

    switch ($action) {
        case 'register':
            $authController->processRequest();
            break;
        case 'login':
            $authController->processRequest();
            break;
        case 'createQuote':
            echo $quoteController->createQuote($input);
            break;
        default:
            echo json_encode(['message' => 'Action not found']);
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? '';

    switch ($action) {
        case 'validate':
            $headers = getallheaders();
            $token = str_replace('Bearer ', '', $headers['Authorization'] ?? '');
            $decoded = $authController->validateToken($token);
            if ($decoded) {
                echo json_encode(['message' => 'Token is valid', 'data' => $decoded]);
            } else {
                echo json_encode(['message' => 'Token is invalid']);
            }
            break;
        case 'logout':
            echo $authController->processRequest();
            break;
        case 'users':
            echo $userController->getAllUsers();
            break;
        case 'getUser':
            $id = $_GET['id'] ?? null;
            echo $userController->getUserById($id);
            break;
        case 'listQuotes':
            echo $quoteController->listQuotes();
            break;
        default:
            echo json_encode(['message' => 'Action not found']);
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $input = json_decode(file_get_contents('php://input'), true);
    $action = $_GET['action'] ?? '';

    switch ($action) {
        case 'updateUser':
            echo $userController->updateUser($input['id'], $input['username'], $input['password'], $input['type']);
            break;
        default:
            echo json_encode(['message' => 'Action not found']);
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $action = $_GET['action'] ?? '';

    switch ($action) {
        case 'deleteUser':
            $id = $_GET['id'] ?? null;
            echo $userController->deleteUser($id);
            break;
        default:
            echo json_encode(['message' => 'Action not found']);
            break;
    }
}
