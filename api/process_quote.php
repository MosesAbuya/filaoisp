<?php
/**
 * Process Quote Form Submissions
 */
header('Content-Type: application/json');
require_once 'db.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
    exit;
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (empty($data)) {
    $data = $_POST;
}

$name    = trim($data['name'] ?? '');
$email   = trim($data['email'] ?? '');
$phone   = trim($data['phone'] ?? '');
$service = trim($data['service'] ?? '');
$company = trim($data['company'] ?? '');
$message = trim($data['message'] ?? '');

// Basic validation
if (empty($name) || empty($email) || empty($phone) || empty($service) || empty($message)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
    exit;
}

// Sanitize inputs
$name    = htmlspecialchars(strip_tags($name));
$email   = htmlspecialchars(strip_tags($email));
$phone   = htmlspecialchars(strip_tags($phone));
$service = htmlspecialchars(strip_tags($service));
$company = htmlspecialchars(strip_tags($company));
$message = htmlspecialchars(strip_tags($message));
$ip_address = $_SERVER['REMOTE_ADDR'] ?? null;

try {
    $stmt = $pdo->prepare("INSERT INTO quote_requests (name, email, phone, service, company, message, ip_address) VALUES (:name, :email, :phone, :service, :company, :message, :ip)");
    $stmt->execute([
        'name'    => $name,
        'email'   => $email,
        'phone'   => $phone,
        'service' => $service,
        'company' => $company,
        'message' => $message,
        'ip'      => $ip_address
    ]);
    
    echo json_encode(['status' => 'success', 'message' => 'Quotation request submitted successfully! Our team will get back to you shortly.']);
} catch (\PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'An error occurred while submitting your request.']);
}
