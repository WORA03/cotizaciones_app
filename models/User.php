<?php
class User
{
    private $conn;
    private $table_name = "users";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function register($data)
    {
        $username = $data['username'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_BCRYPT);

        $query = "INSERT INTO " . $this->table_name . " (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }

        return false;
    }

    public function login($data)
    {
        $username = $data['username'];
        $password = $data['password'];

        // Consulta para obtener el usuario por nombre de usuario
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    // Crear un nuevo usuario
    public function create($username, $password, $type)
    {
        $sql = "INSERT INTO users (username, password, type) VALUES (:username, :password, :type)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['username' => $username, 'password' => $password, 'type' => $type]);
    }

    // Obtener todos los usuarios
    public function getAll()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

    // Obtener un usuario por ID
    public function getById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Actualizar un usuario
    public function update($id, $username, $password, $type)
    {
        $sql = "UPDATE users SET username = :username, password = :password, type = :type WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id, 'username' => $username, 'password' => $password, 'type' => $type]);
    }

    // Eliminar un usuario
    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
