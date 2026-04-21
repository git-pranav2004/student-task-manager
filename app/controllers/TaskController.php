<?php
require_once "../app/models/Task.php";

class TaskController {

    private function checkAuth() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: /studenttaskmanager/public/auth/login");
            exit();
        }
    }

    public function dashboard() {
        $this->checkAuth();

        $tasks = (new Task())->getTasks($_SESSION['user_id']);
        include "../app/views/tasks/dashboard.php";
    }

    public function add() {
        $this->checkAuth();
        include "../app/views/tasks/add.php";
    }

    public function store() {
        $this->checkAuth();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /studenttaskmanager/public/task/dashboard");
            exit();
        }

        $title = trim($_POST['title']);

        if (empty($title)) {
            $_SESSION['error'] = "Task title is required!";
            header("Location: /studenttaskmanager/public/task/add");
            exit();
        }

        (new Task())->create([
            'title' => $title
        ], $_SESSION['user_id']);
    }

    public function delete() {
        $this->checkAuth();

        if (!isset($_GET['id'])) {
            header("Location: /studenttaskmanager/public/task/dashboard");
            exit();
        }

        (new Task())->delete($_GET['id']);
    }

    // BONUS: Edit (we will connect UI later)
    public function edit() {
        $this->checkAuth();

        if (!isset($_GET['id'])) {
            header("Location: /studenttaskmanager/public/task/dashboard");
            exit();
        }

        $task = (new Task())->getById($_GET['id']);
        include "../app/views/tasks/edit.php";
    }

    public function update() {
        $this->checkAuth();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /studenttaskmanager/public/task/dashboard");
            exit();
        }

        $id = $_POST['id'];
        $title = trim($_POST['title']);

        if (empty($title)) {
            $_SESSION['error'] = "Task title cannot be empty!";
            header("Location: /studenttaskmanager/public/task/edit?id=$id");
            exit();
        }

        (new Task())->update($id, $title);
    }
}