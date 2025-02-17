<?php

function loadPage($page){
    $page = 'views/' . basename($page) . '.view.php';

    if (!file_exists($page)) {
        require "404.php";
        return;
    }

    require $page;
}

function asset($url) {
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/pictoria/assets/' . ltrim($url, '/');
}

$requestURI = trim($_SERVER['REQUEST_URI'],'/');
$baseDIR = 'pictoria';

if (str_starts_with($requestURI, $baseDIR)) {
    $requestURI = substr($requestURI, strlen($baseDIR));
}

$urlSegment = explode('/', $requestURI);

$page = $urlSegment[1] ?? 'home';

loadPage($page);