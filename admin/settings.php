<?php
$page_title = "System Settings (SMTP)";
require_once __DIR__ . "/includes/header.php";

// Ensure settings table exists
$pdo->exec("CREATE TABLE IF NOT EXISTS site_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL UNIQUE,
    setting_value TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// Seed defaults if empty
$defaults = [
    "smtp_host" => "mail.filaonetworks.com",
    "smtp_username" => "info@filaonetworks.com",
    "smtp_password" => "Filaonetworks@2026",
    "smtp_port" => "465",
    "smtp_encryption" => "ssl"
];

foreach ($defaults as $k => $v) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM site_settings WHERE setting_key = ?");
    $stmt->execute([$k]);
    if ($stmt->fetchColumn() == 0) {
        $pdo->prepare("INSERT INTO site_settings (setting_key, setting_value) VALUES (?, ?)")->execute([$k, $v]);
    }
}

// Handle Save Form Submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update_settings"])) {
    foreach ($_POST["settings"] as $k => $v) {
        $stmt = $pdo->prepare("UPDATE site_settings SET setting_value = ? WHERE setting_key = ?");
        $stmt->execute([trim($v), $k]);
    }
    $_SESSION["msg"] = "SMTP settings saved successfully!";
    header("Location: settings.php");
    exit;
}

// Handle Test Email Submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["send_test_email"])) {
    $test_target = trim($_POST["test_email"] ?? "");
    if (empty($test_target) || !filter_var($test_target, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["err"] = "Please provide a valid destination email address for testing.";
    } else {
        $stmt = $pdo->query("SELECT setting_key, setting_value FROM site_settings");
        $smtp = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $smtp[$row["setting_key"]] = $row["setting_value"];
        }

        require_once __DIR__ . "/../libs/Exception.php";
        require_once __DIR__ . "/../libs/PHPMailer.php";
        require_once __DIR__ . "/../libs/SMTP.php";

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = $smtp["smtp_host"] ?? "";
            $mail->SMTPAuth   = true;
            $mail->Username   = $smtp["smtp_username"] ?? "";
            $mail->Password   = $smtp["smtp_password"] ?? "";
            $mail->Port       = (int)($smtp["smtp_port"] ?? 465);
            $enc = strtolower($smtp["smtp_encryption"] ?? "ssl");
            if ($enc === "ssl") {
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
            } elseif ($enc === "tls") {
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            } else {
                $mail->SMTPAutoTLS = false;
            }

            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];
            $mail->Timeout = 15;

            $mail->setFrom($smtp["smtp_username"] ?? "info@filaonetworks.com", "Filao Networks");
            $mail->addAddress($test_target);
            $mail->isHTML(true);
            $mail->Subject = "SMTP Test Message - Filao Networks Solutions";
            
            $mail->Body = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #e0e6ed; border-radius: 8px; overflow: hidden;'>
                <div style='background: #090238; padding: 25px 20px; text-align: center; border-bottom: 4px solid #ec1c24;'>
                    <h2 style='color: #ffffff; margin: 0;'>FILAO <span style='color: #ec1c24;'>NETWORKS</span></h2>
                </div>
                <div style='padding: 30px 25px; background: #ffffff; color: #333; line-height: 1.6;'>
                    <h3 style='color: #090238; margin-top: 0;'>SMTP Connection Verification</h3>
                    <p>This is a live test email confirming that your outgoing SMTP mail server is operating correctly.</p>
                    <table style='width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 14px;'>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #eee; width: 40%;'><strong>Outgoing Host:</strong></td><td style='padding: 8px; border-bottom: 1px solid #eee;'>" . htmlspecialchars($smtp["smtp_host"] ?? "") . "</td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>SMTP Port:</strong></td><td style='padding: 8px; border-bottom: 1px solid #eee;'>" . htmlspecialchars($smtp["smtp_port"] ?? "") . "</td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>Encryption:</strong></td><td style='padding: 8px; border-bottom: 1px solid #eee;'>" . strtoupper(htmlspecialchars($smtp["smtp_encryption"] ?? "None")) . "</td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>Username:</strong></td><td style='padding: 8px; border-bottom: 1px solid #eee;'>" . htmlspecialchars($smtp["smtp_username"] ?? "") . "</td></tr>
                        <tr><td style='padding: 8px;'><strong>Sent At:</strong></td><td style='padding: 8px;'>" . date("Y-m-d H:i:s T") . "</td></tr>
                    </table>
                </div>
                <div style='background: #f4f6fa; padding: 15px; text-align: center; font-size: 12px; color: #6c757d;'>
                    Filao Networks Solutions &bull; System Automated Diagnostic
                </div>
            </div>";

            $mail->send();
            $_SESSION["msg"] = "Test email sent successfully to " . htmlspecialchars($test_target) . "! SMTP is functioning properly.";
        } catch (\Exception $e) {
            $_SESSION["err"] = "SMTP Test Failed: " . htmlspecialchars($mail->ErrorInfo ?: $e->getMessage());
        }
    }
    header("Location: settings.php");
    exit;
}

// Fetch current settings safely
$settings = [];
$stmt = $pdo->query("SELECT setting_key, setting_value FROM site_settings");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $settings[$row["setting_key"]] = $row["setting_value"];
}
?>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card card-modern">
            <div class="card-modern-header d-flex justify-content-between align-items-center">
                <span><i class="fa-solid fa-server me-2 text-danger"></i> SMTP Mail Server Configuration</span>
                <span class="badge bg-success-subtle text-success border border-success-subtle">Active Engine</span>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="settings.php">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">SMTP Host (Outgoing Server)</label>
                            <input type="text" name="settings[smtp_host]" class="form-control" value="<?= htmlspecialchars($settings["smtp_host"] ?? "") ?>" required>
                            <div class="form-text small">e.g. <code>mail.filaonetworks.com</code></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">SMTP Username / Email</label>
                            <input type="email" name="settings[smtp_username]" class="form-control" value="<?= htmlspecialchars($settings["smtp_username"] ?? "") ?>" required>
                            <div class="form-text small">Authenticated sender address</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">SMTP Password</label>
                            <input type="password" name="settings[smtp_password]" class="form-control" value="<?= htmlspecialchars($settings["smtp_password"] ?? "") ?>" required>
                            <div class="form-text small">Mailbox password</div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold">SMTP Port</label>
                            <input type="number" name="settings[smtp_port]" class="form-control" value="<?= htmlspecialchars($settings["smtp_port"] ?? "465") ?>" required>
                            <div class="form-text small">465 (SSL) or 587 (TLS)</div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Encryption</label>
                            <select name="settings[smtp_encryption]" class="form-select">
                                <option value="ssl" <?= (isset($settings["smtp_encryption"]) && strtolower($settings["smtp_encryption"]) == "ssl") ? "selected" : "" ?>>SSL (Port 465)</option>
                                <option value="tls" <?= (isset($settings["smtp_encryption"]) && strtolower($settings["smtp_encryption"]) == "tls") ? "selected" : "" ?>>TLS (Port 587)</option>
                                <option value="" <?= (isset($settings["smtp_encryption"]) && $settings["smtp_encryption"] == "") ? "selected" : "" ?>>None</option>
                            </select>
                            <div class="form-text small">SSL Recommended</div>
                        </div>
                    </div>
                    
                    <div class="mt-4 border-top pt-3 text-end">
                        <button type="submit" name="update_settings" class="btn btn-filao px-4">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Save SMTP Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-modern">
            <div class="card-modern-header">
                <span><i class="fa-solid fa-paper-plane me-2 text-primary"></i> Test SMTP Delivery</span>
            </div>
            <div class="card-body p-4">
                <p class="small text-muted mb-3">
                    Verify that your mail server credentials are working by dispatching a test email instantly.
                </p>
                <form method="POST" action="settings.php">
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Recipient Email</label>
                        <input type="email" name="test_email" class="form-control" placeholder="your-email@example.com" value="<?= htmlspecialchars($settings["smtp_username"] ?? "info@filaonetworks.com") ?>" required>
                    </div>
                    <button type="submit" name="send_test_email" class="btn btn-outline-dark w-100 fw-bold">
                        <i class="fa-solid fa-envelope-circle-check me-1"></i> Send Test Email
                    </button>
                </form>
            </div>
        </div>

        <div class="card card-modern">
            <div class="card-modern-header">
                <span><i class="fa-solid fa-circle-info me-2 text-info"></i> Inquiries Routing</span>
            </div>
            <div class="card-body p-4 small text-muted">
                <p class="mb-2"><i class="fa-solid fa-check text-success me-1"></i> Contact inquiries are dispatched to <strong>info@filaonetworks.com</strong>.</p>
                <p class="mb-2"><i class="fa-solid fa-check text-success me-1"></i> Quote inquiries are dispatched to <strong>info@filaonetworks.com</strong>.</p>
                <p class="mb-0"><i class="fa-solid fa-check text-success me-1"></i> Prospective customers receive a branded auto-confirmation email upon submission.</p>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
