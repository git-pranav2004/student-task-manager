<?php

require_once "../core/router.php";

$url = $_GET['url'] ?? "auth/login";

Router::route($url);