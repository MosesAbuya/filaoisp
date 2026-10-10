<?php
/**
 * Filao Networks Solutions - Admin Authentication Helper
 * Ensures secure login session and seeds default admin credentials.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../api/db.php';

// 1. Ensure admin_users table exists
$pdo->exec("CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// 2. Check if default admin account exists, if not seed it (Username: admin, Password: Secure@Filaonetworks@2026)
$stmt = $pdo->prepare("SELECT COUNT(*) FROM admin_users WHERE username = ?");
$stmt->execute(['admin']);
if ($stmt->fetchColumn() == 0) {
    $defaultUser = 'admin';
    $defaultPassHash = password_hash('Secure@Filaonetworks@2026', PASSWORD_DEFAULT);
    $insertStmt = $pdo->prepare("INSERT INTO admin_users (username, password_hash) VALUES (?, ?)");
    $insertStmt->execute([$defaultUser, $defaultPassHash]);
}

// 3. Check authentication status
$current_page = basename($_SERVER['PHP_SELF']);
if ($current_page !== 'login.php' && (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true)) {
    header('Location: login.php');
    exit;
}
?>
