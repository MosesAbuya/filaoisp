<?php
/**
 * Process Contact Form Submissions
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

$name = trim($data['name'] ?? '');
$email = trim($data['email'] ?? '');
$subject = trim($data['subject'] ?? '');
$message = trim($data['message'] ?? '');

// Basic validation
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
    exit;
}

// Sanitize inputs
$name = htmlspecialchars(strip_tags($name));
$email = htmlspecialchars(strip_tags($email));
$subject = htmlspecialchars(strip_tags($subject));
$message = htmlspecialchars(strip_tags($message));
$ip_address = $_SERVER['REMOTE_ADDR'] ?? null;

// Insert using Prepared Statements to prevent SQL Injection
try {
    $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message, ip_address) VALUES (:name, :email, :subject, :message, :ip)");
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
        'ip' => $ip_address
    ]);
    
    echo json_encode(['status' => 'success', 'message' => 'Message sent successfully! We will contact you soon.']);
} catch (\PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'An error occurred while saving your message.']);
}
