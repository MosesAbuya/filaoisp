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
            if (!empty($smtpSettings['smtp_encryption'])) {
                $mail->SMTPSecure = strtolower($smtpSettings['smtp_encryption']) === 'ssl' ? PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS : PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            }
            $mail->Port       = (int)$smtpSettings['smtp_port'];

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
                    Ambank House, Nairobi, Kenya
                </div>
            </div>
            ";

            // 1. Send to Admin
            $mail->setFrom($smtpSettings['smtp_username'], 'Filao Networks');
            $mail->addAddress('info@filaonetworks.com', 'Filao Networks'); // Always send to this email
            $mail->addReplyTo($email, $name);

            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Submission: ' . $subject;
            
            $adminBody = "
                <h3 style='color: #090238; margin-top: 0; border-bottom: 1px solid #eee; padding-bottom: 10px;'>New Message from Website</h3>
                <p><strong>Name:</strong> {$name}</p>
                <p><strong>Email:</strong> <a href='mailto:{$email}' style='color: #ec1c24; text-decoration: none;'>{$email}</a></p>
                <p><strong>Subject:</strong> {$subject}</p>
                <div style='background: #f8f9fa; padding: 15px; border-left: 4px solid #ec1c24; margin-top: 20px; border-radius: 4px;'>
                    <p style='margin: 0; white-space: pre-wrap;'>" . nl2br($message) . "</p>
                </div>
            ";
            $mail->Body = $emailHeader . $adminBody . $emailFooter;

            $mail->send();

            // 2. Send Auto-Reply to Customer
            $mail->clearAddresses();
            $mail->clearReplyTos();
            $mail->addAddress($email, $name);
            $mail->Subject = 'We received your message - Filao Networks Solutions';
            
            $customerBody = "
                <h3 style='color: #090238; margin-top: 0;'>Hello {$name},</h3>
                <p>Thank you for contacting Filao Networks Solutions.</p>
                <p>We have successfully received your message regarding <strong>\"{$subject}\"</strong>. Our support team is reviewing your request and will get back to you shortly.</p>
                <br>
                <p style='margin-bottom: 0;'>Best regards,<br><strong style='color: #ec1c24;'>Filao Networks Solutions Team</strong></p>
            ";
            $mail->Body = $emailHeader . $customerBody . $emailFooter;
            
            $mail->send();
        } catch (Exception $e) {
            error_log("Mailer Error: {$mail->ErrorInfo}");
        }
    }
    
    echo json_encode(['status' => 'success', 'message' => 'Message sent successfully! We will contact you soon.']);
} catch (\PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'An error occurred while saving your message.']);
}
