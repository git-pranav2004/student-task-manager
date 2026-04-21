<?php
require_once "../core/database.php";

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function register($data) {
        try {
            // Check duplicate email
            $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$data['email']]);

            if ($stmt->fetch()) {
                $_SESSION['error'] = "Email already exists!";
                header("Location: /studenttaskmanager/public/auth/register");
                exit();
            }

            // Insert user
            $stmt = $this->db->prepare(
                "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
            );

            $stmt->execute([
                $data['name'],
                $data['email'],
                password_hash($data['password'], PASSWORD_DEFAULT)
            ]);

            $_SESSION['success'] = "Registration successful! Please login.";
            header("Location: /studenttaskmanager/public/auth/login");
            exit();

        } catch (PDOException $e) {
            $_SESSION['error'] = "Something went wrong!";
            header("Location: /studenttaskmanager/public/auth/register");
            exit();
        }
    }

    public function login($data) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$data['email']]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($data['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                header("Location: /studenttaskmanager/public/task/dashboard");
                exit();
            } else {
                $_SESSION['error'] = "Invalid email or password!";
                header("Location: /studenttaskmanager/public/auth/login");
                exit();
            }

        } catch (PDOException $e) {
            $_SESSION['error'] = "Database error!";
            header("Location: /studenttaskmanager/public/auth/login");
            exit();
        }
    }
}