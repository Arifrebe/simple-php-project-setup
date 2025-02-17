<?php

// Function to load the page based on the provided page name.
function loadPage($page) {
    // Sanitize the page name by appending the directory and view file extension
    $page = 'views/' . basename($page) . '.view.php';

    // If the page doesn't exist, load the 404 error page.
    if (!file_exists($page)) {
        require "404.php";
        return;
    }

    // Otherwise, require and load the requested page.
    require $page;
}

// Function to generate a full URL for an asset (like images, CSS, or JS files).
function asset($url) {
    // Build the full URL using the scheme (HTTP/HTTPS) and host name, appending the asset path.
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/pictoria/assets/' . ltrim($url, '/');
}

// Get the current request URI, trimming any leading/trailing slashes
$requestURI = trim($_SERVER['REQUEST_URI'],'/');

// Define the base directory for the application (used for path matching)
$baseDIR = 'pictoria';

// If the URI starts with the base directory, strip it out from the request URI.
if (str_starts_with($requestURI, $baseDIR)) {
    $requestURI = substr($requestURI, strlen($baseDIR));
}

// Split the request URI into segments, to process the page request.
$urlSegment = explode('/', $requestURI);

// If the second segment exists, use it as the page name; otherwise, default to 'home'.
$page = $urlSegment[1] ?? 'home';

// Load the page.
loadPage($page);
