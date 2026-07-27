<?php
/**
 * Filao Networks Solutions   Database Connection
 * Connects to the local filaoisp MySQL database using PDO.
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'filaoisp');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    // In production, log this rather than displaying it
    error_log('DB Connection failed: ' . $e->getMessage());
    // Graceful fallback   site continues without DB features
    $pdo = null;
}
