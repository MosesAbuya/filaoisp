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

$rawServices = $data['services'] ?? ($data['service'] ?? '');
if (is_array($rawServices)) {
    $servicesStr = implode(', ', array_filter(array_map('trim', $rawServices)));
} else {
    $servicesStr = trim((string)$rawServices);
}
$servicesSanitized = htmlspecialchars(strip_tags($servicesStr));

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

$messageToSave = (!empty($servicesSanitized) ? "Selected Services: " . $servicesSanitized . "\n\n" : "") . $message;

// Insert using Prepared Statements to prevent SQL Injection
try {
    $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message, ip_address) VALUES (:name, :email, :subject, :message, :ip)");
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $messageToSave,
        'ip' => $ip_address
    ]);
    
    // Fetch SMTP settings safely
    $smtpSettings = [];
    try {
        $settings_raw = $pdo->query("SELECT setting_key, setting_value FROM site_settings")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($settings_raw as $row) {
            $smtpSettings[$row['setting_key']] = $row['setting_value'];
        }
    } catch (\PDOException $e) {
        // Table might not exist yet, ignore
    }

    if (!empty($smtpSettings['smtp_host'])) {
        require_once __DIR__ . '/../libs/Exception.php';
        require_once __DIR__ . '/../libs/PHPMailer.php';
        require_once __DIR__ . '/../libs/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = $smtpSettings['smtp_host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $smtpSettings['smtp_username'];
            $mail->Password   = $smtpSettings['smtp_password'];
            $enc = strtolower($smtpSettings['smtp_encryption'] ?? 'ssl');
            if ($enc === 'ssl') {
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
            } elseif ($enc === 'tls') {
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            } else {
                $mail->SMTPAutoTLS = false;
            }
            $mail->Port       = (int)($smtpSettings['smtp_port'] ?? 465);
            $mail->Timeout    = 15;
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];

            // Shared Email Template Styles
            $emailHeader = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #e0e6ed; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05);'>
                <div style='background: #090238; padding: 25px 20px; text-align: center; border-bottom: 4px solid #ec1c24;'>
                    <h2 style='color: #ffffff; margin: 0; font-size: 24px; letter-spacing: 1px;'>FILAO <span style='color: #ec1c24;'>NETWORKS</span></h2>
                </div>
                <div style='padding: 30px 25px; background: #ffffff; color: #333333; line-height: 1.6;'>
            ";
            
            $emailFooter = "
                </div>
                <div style='background: #f4f6fa; padding: 20px; text-align: center; font-size: 13px; color: #6c757d; border-top: 1px solid #e0e6ed;'>
                    &copy; " . date('Y') . " Filao Networks Solutions. All rights reserved.<br>
                    Ambank House, Nairobi, Kenya | Phone: +254 790 034459
                </div>
            </div>
            ";

            // 1. Send to Admin
            $adminSender = !empty($smtpSettings['smtp_username']) ? $smtpSettings['smtp_username'] : 'info@filaonetworks.com';
            $mail->setFrom($adminSender, 'Filao Networks');
            $mail->addAddress('info@filaonetworks.com', 'Filao Networks'); // Always send to this email
            $mail->addReplyTo($email, $name);

            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Submission: ' . $subject;
            
            $servicesRow = !empty($servicesSanitized) ? "<p style='margin: 8px 0;'><strong>Services Requested:</strong> <span style='color: #ec1c24; font-weight: bold;'>{$servicesSanitized}</span></p>" : "";

            $adminBody = "
                <h3 style='color: #090238; margin-top: 0; border-bottom: 2px solid #f1f1f1; padding-bottom: 10px;'>New Inquiry Received</h3>
                <p style='margin: 8px 0;'><strong>Name:</strong> {$name}</p>
                <p style='margin: 8px 0;'><strong>Email:</strong> <a href='mailto:{$email}' style='color: #ec1c24; text-decoration: none;'>{$email}</a></p>
                <p style='margin: 8px 0;'><strong>Subject:</strong> {$subject}</p>
                {$servicesRow}
                <div style='background: #f8f9fa; padding: 15px; border-left: 4px solid #ec1c24; margin-top: 15px; border-radius: 4px;'>
                    <p style='margin: 0; white-space: pre-wrap; font-size: 14px;'>" . nl2br($message) . "</p>
                </div>
            ";
            $mail->Body = $emailHeader . $adminBody . $emailFooter;

            $mail->send();

            // 2. Send Auto-Reply to Customer
            $mail->clearAddresses();
            $mail->clearReplyTos();
            $mail->addAddress($email, $name);
            $mail->Subject = 'We received your message - Filao Networks Solutions';
            
            $servicesAck = !empty($servicesSanitized) ? " regarding <strong>{$servicesSanitized}</strong>" : "";
            $customerBody = "
                <h3 style='color: #090238; margin-top: 0;'>Hello {$name},</h3>
                <p>Thank you for contacting Filao Networks Solutions.</p>
                <p>We have successfully received your inquiry{$servicesAck}. Our engineering and customer support team is reviewing your message and will reach out to you shortly.</p>
                <div style='background: #f8f9fa; border-left: 4px solid #090238; padding: 15px; margin: 20px 0; border-radius: 4px;'>
                    <p style='margin: 0; font-size: 13px; color: #555;'><strong>Subject:</strong> {$subject}</p>
                    <p style='margin: 5px 0 0 0; font-size: 13px; color: #666;'><em>\"" . nl2br($message) . "\"</em></p>
                </div>
                <p>If you need urgent assistance, you can also reach our 24/7 support line at <strong style='color: #ec1c24;'>+254 790 034459</strong>.</p>
                <br>
                <p style='margin-bottom: 0;'>Best regards,<br><strong style='color: #ec1c24;'>Filao Networks Solutions Team</strong></p>
            ";
            $mail->Body = $emailHeader . $customerBody . $emailFooter;
            
            $mail->send();
        } catch (\Exception $e) {
            error_log("Mailer Error in process_contact.php: " . $mail->ErrorInfo . " / " . $e->getMessage());
        }
    }
    
    echo json_encode(['status' => 'success', 'message' => 'Message sent successfully! We will contact you soon.']);
} catch (\PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'An error occurred while saving your message.']);
}
