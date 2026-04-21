<?php
require_once "../core/database.php";

class Task {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getTasks($user_id) {
        $stmt = $this->db->prepare(
            "SELECT * FROM tasks WHERE user_id = ? ORDER BY id DESC"
        );
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data, $user_id) {
        try {
            $stmt = $this->db->prepare(
                "INSERT INTO tasks (title, user_id) VALUES (?, ?)"
            );

            $stmt->execute([
                $data['title'],
                $user_id
            ]);

            $_SESSION['success'] = "Task added successfully!";
            header("Location: /studenttaskmanager/public/task/dashboard");
            exit();

        } catch (PDOException $e) {
            $_SESSION['error'] = "Failed to add task!";
            header("Location: /studenttaskmanager/public/task/add");
            exit();
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
            $stmt->execute([$id]);

            $_SESSION['success'] = "Task deleted!";
            header("Location: /studenttaskmanager/public/task/dashboard");
            exit();

        } catch (PDOException $e) {
            $_SESSION['error'] = "Delete failed!";
            header("Location: /studenttaskmanager/public/task/dashboard");
            exit();
        }
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title) {
        try {
            $stmt = $this->db->prepare(
                "UPDATE tasks SET title = ? WHERE id = ?"
            );

            $stmt->execute([$title, $id]);

            $_SESSION['success'] = "Task updated!";
            header("Location: /studenttaskmanager/public/task/dashboard");
            exit();

        } catch (PDOException $e) {
            $_SESSION['error'] = "Update failed!";
            header("Location: /studenttaskmanager/public/task/dashboard");
            exit();
        }
    }
}