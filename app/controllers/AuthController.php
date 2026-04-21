<?php
require_once "../app/models/User.php";

class AuthController {

    public function login() {
        session_start();
        include "../app/views/auth/login.php";
    }

    public function register() {
        session_start();
        include "../app/views/auth/register.php";
    }

    public function authenticate() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /studenttaskmanager/public/auth/login");
            exit();
        }

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "All fields are required!";
            header("Location: /studenttaskmanager/public/auth/login");
            exit();
        }

        (new User())->login([
            'email' => $email,
            'password' => $password
        ]);
    }

    public function store() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /studenttaskmanager/public/auth/register");
            exit();
        }

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Basic validation
        if (empty($name) || empty($email) || empty($password)) {
            $_SESSION['error'] = "All fields are required!";
            header("Location: /studenttaskmanager/public/auth/register");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Invalid email format!";
            header("Location: /studenttaskmanager/public/auth/register");
            exit();
        }

        if (strlen($password) < 5) {
            $_SESSION['error'] = "Password must be at least 5 characters!";
            header("Location: /studenttaskmanager/public/auth/register");
            exit();
        }

        (new User())->register([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /studenttaskmanager/public/auth/login");
        exit();
    }
}