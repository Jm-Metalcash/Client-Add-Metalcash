<?php

define('BASE_URL', '/Metalcash_clients_add');
define('PROJECT_ROOT', dirname(__DIR__));


// Paramètres de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'metalcash_clients_add');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// Options PDO
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

// Connexion PDO
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, $options);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
