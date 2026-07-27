<?php
/**
 * Database connection setup using PDO
 */

$host = '127.0.0.1';
$db   = 'filaoisp';
$user = 'root';
$pass = ''; // Default XAMPP password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false, // Important for security
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Return a JSON error if connection fails (useful since these endpoints will be called via AJAX)
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
    exit;
}
