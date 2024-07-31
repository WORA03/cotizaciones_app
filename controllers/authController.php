<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;


include_once __DIR__ . '/../models/User.php';
include_once __DIR__ . '/../config/db.php';
include_once __DIR__ . '/../helpers/utils.php';
include_once __DIR__ . '/../vendor/autoload.php';

class AuthController
{
    private $db;
    private $requestMethod;
    private $user;

    public function __construct($db, $requestMethod)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->user = new User($db);
    }

    public function processRequest()
    {
        error_log("Request Method: " . $this->requestMethod);
        switch ($this->requestMethod) {
            case 'POST':
                if (isset($_POST['action'])) {
                    if ($_POST['action'] == 'register') {
                        $this->register();
                    } elseif ($_POST['action'] == 'login') {
                        $this->login();
                    }
                } else {
                    $this->badRequestResponse();
                }
                break;
            case 'GET':
                if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                    $this->logout();
                } else {
                    // Maneja cualquier solicitud GET
                    echo json_encode(['message' => 'GET request received']);
                }
                break;
            default:
                $this->notFoundResponse();
                break;
        }
    }

    private function register()
    {
        $input = $_POST;
        if ($this->validateUser($input)) {
            $userId = $this->user->register($input);
            if ($userId) {
                $this->createdResponse($userId);
            } else {
                $this->unprocessableEntityResponse();
            }
        } else {
            $this->unprocessableEntityResponse();
        }
    }

    private function login()
    {
        
        $input = $_POST;
        $user = $this->user->login($input);
        if ($user) {
            error_log("Login successful for user: " . $user['username']);

            // Guardar información del usuario en la sesión
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Generar token JWT
            $token = $this->generateJWT($user);

            // Responder con información del usuario y el token JWT
            $this->okResponse([
                'user' => [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ],
                'token' => $token
            ]);
        } else {
            error_log("Login failed for user: " . $input['username']);
            $this->unauthorizedResponse();
        }
    }

    private function logout()
    {
        session_start();
        session_destroy();
        redirect('/cotizaciones_app/views/auth/login.php');
    }

    private function generateJWT($user)
    {
        $key = 'A42sadf3gF5TBcssGf7y43sCss';
        $issuedAt = time();
        $expirationTime = $issuedAt + 3600;  // jwt válido por 1 hora
        $payload = [
            'iat' => $issuedAt,
            'exp' => $expirationTime,
            'userId' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role']
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;
    }

    public function validateToken($token)
    {
        $key = 'A42sadf3gF5TBcssGf7y43sCss';
        
        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            
            // Verificar si el token ha expirado
            if ($decoded->exp < time()) {
                return false;
            }
            
            // Si llegamos aquí, el token es válido
            return $decoded;
        } catch (ExpiredException $e) {
            // El token ha expirado
            return false;
        } catch (Exception $e) {
            // Cualquier otro error (firma inválida, token malformado, etc.)
            return false;
        }
    }


    private function validateUser($input)
    {
        if (!isset($input['username']) || !isset($input['password']) || !isset($input['email'])) {
            return false;
        }
        return true;
    }

    private function createdResponse($data)
    {
        header('HTTP/1.1 201 Created');
        echo json_encode(['id' => $data]);
    }

    private function okResponse($data)
    {
        header('HTTP/1.1 200 OK');
        echo json_encode($data);
    }

    private function unauthorizedResponse()
    {
        header('HTTP/1.1 401 Unauthorized');
        include('../views/errors/401.html');
        exit();
    }

    private function unprocessableEntityResponse()
    {
        header('HTTP/1.1 422 Unprocessable Entity');
        echo json_encode(['message' => 'Invalid input']);
    }

    private function notFoundResponse()
    {
        header('HTTP/1.1 404 Not Found');
        echo json_encode(['message' => 'Not Found']);
    }

    private function badRequestResponse()
    {
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['message' => 'Bad Request']);
    }
}
// Crear la conexión a la base de datos
$db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Procesar la solicitud
$requestMethod = $_SERVER["REQUEST_METHOD"];
$controller = new AuthController($db, $requestMethod);
$controller->processRequest();
