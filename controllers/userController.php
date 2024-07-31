<?php
include_once __DIR__ . '/../models/User.php';
include_once __DIR__ . '/../config/db.php';
include_once __DIR__ . '/../helpers/utils.php';

class UserController
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
            case 'GET':
                if (isset($_GET['action']) && $_GET['action'] == 'getusers') {
                    $this->getAllUsers();
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


    // Obtener todos los usuarios
    public function getAllUsers() {
        $result = $this->user->getAll();
        if (empty($result)) {
            error_log("No users found");
        }
        echo json_encode($result);
    }
    

    // Obtener un usuario por ID
    public function getUserById($id)
    {
        $user = $this->user->getById($id);
        if ($user) {
            return json_encode($user);
        } else {
            return json_encode(['message' => 'User not found']);
        }
    }

    // Actualizar un usuario
    public function updateUser($id, $username, $password, $type)
    {
        if (empty($id) || empty($username) || empty($type)) {
            return json_encode(['message' => 'ID, username, and type are required']);
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $result = $this->user->update($id, $username, $hashedPassword, $type);

        if ($result) {
            return json_encode(['message' => 'User updated successfully']);
        } else {
            return json_encode(['message' => 'Failed to update user']);
        }
    }

    // Eliminar un usuario
    public function deleteUser($id)
    {
        if (empty($id)) {
            return json_encode(['message' => 'ID is required']);
        }

        $result = $this->user->delete($id);

        if ($result) {
            return json_encode(['message' => 'User deleted successfully']);
        } else {
            return json_encode(['message' => 'Failed to delete user']);
        }
    }
    private function notFoundResponse()
    {
        header('HTTP/1.1 404 Not Found');
        echo json_encode(['message' => 'Not Found']);
    }
}
