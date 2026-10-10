<?php
/**
 * Filao Networks Solutions - Database Connection
 * Connects to the MySQL database using PDO.
 */
// define('DB_HOST', 'localhost');
// define('DB_NAME', 'filaonet_filaoisp');
// define('DB_USER', 'filaonet_filaoisp');
// define('DB_PASS', 'Filao@2026');
// define('DB_CHARSET', 'utf8mb4');


define('DB_HOST', 'localhost');
define('DB_NAME', 'filaoisp');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    // If database does not exist, try to create it automatically (for local XAMPP setup)
    if (strpos($e->getMessage(), 'Unknown database') !== false || strpos($e->getMessage(), '1049') !== false) {
        try {
            $pdoServer = new PDO("mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET, DB_USER, DB_PASS, $options);
            $pdoServer->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $ex) {
            error_log('DB Creation failed: ' . $ex->getMessage());
            die(json_encode(['status' => 'error', 'message' => 'Database connection failed.']));
        }
    } else {
        error_log('DB Connection failed: ' . $e->getMessage());
        die(json_encode(['status' => 'error', 'message' => 'Database connection failed.']));
    }
}
