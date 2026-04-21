<?php

class Router {

    public static function route($url) {

        // 🚨 IMPORTANT: ignore assets (CSS, JS, images)
        if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/assets/') !== false) {
            return; // let Apache serve file directly
        }

        // Default route
        if (!$url) {
            $url = "auth/login";
        }

        $url = explode("/", trim($url, "/"));

        $controllerName = ucfirst($url[0]) . "Controller";
        $method = $url[1] ?? "login";

        $controllerPath = "../app/controllers/$controllerName.php";

        if (!file_exists($controllerPath)) {
            die("Controller not found!");
        }

        require_once $controllerPath;

        $controller = new $controllerName();

        if (!method_exists($controller, $method)) {
            die("Method not found!");
        }

        $controller->$method();
    }
}