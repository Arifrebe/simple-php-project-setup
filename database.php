<?php

require 'config.php';

try {
    $pdo = new PDO(DBDRIVER . ":host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8", DBUSER, DBPASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    echo "Database connection successful!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}