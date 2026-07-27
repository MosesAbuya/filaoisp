<?php
/**
 * Process Newsletter Subscriptions
 */
header('Content-Type: application/json');
require_once 'db.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
    exit;
}

// Get the raw POST data (from fetch API json)
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Fallback to standard $_POST if not JSON
if (empty($data)) {
    $data = $_POST;
}

$email = trim($data['email'] ?? '');

// Basic validation
if (empty($email)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Email is required.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
    exit;
}

$email = htmlspecialchars(strip_tags($email));
$ip_address = $_SERVER['REMOTE_ADDR'] ?? null;

// Insert using Prepared Statements
try {
    $stmt = $pdo->prepare("INSERT INTO newsletter_subscribers (email, ip_address) VALUES (:email, :ip)");
    $stmt->execute([
        'email' => $email,
        'ip' => $ip_address
    ]);
    
    echo json_encode(['status' => 'success', 'message' => 'Subscribed successfully!']);
} catch (\PDOException $e) {
    // Catch duplicate entry error (1062)
    if ($e->errorInfo[1] == 1062) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'This email is already subscribed.']);
    } else {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'An error occurred. Please try again later.']);
    }
}
