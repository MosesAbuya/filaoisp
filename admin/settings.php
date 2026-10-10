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

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update_settings"])) {
    foreach ($_POST["settings"] as $k => $v) {
        $stmt = $pdo->prepare("UPDATE site_settings SET setting_value = ? WHERE setting_key = ?");
        $stmt->execute([$v, $k]);
    }
    $_SESSION["msg"] = "Settings updated successfully!";
    header("Location: settings.php");
    exit;
}

// Fetch current
$settings_raw = $pdo->query("SELECT * FROM site_settings")->fetchAll(PDO::FETCH_KEY_PAIR);
$settings = [];
// site_settings might have ID as first column, we want key->value
$stmt = $pdo->query("SELECT setting_key, setting_value FROM site_settings");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $settings[$row["setting_key"]] = $row["setting_value"];
}
?>

<div class="card card-modern">
    <div class="card-modern-header">SMTP Email Settings</div>
    <div class="card-body p-4">
        <form method="POST" action="settings.php">
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold">SMTP Host (Outgoing Server)</label>
                    <input type="text" name="settings[smtp_host]" class="form-control" value="<?= htmlspecialchars($settings["smtp_host"] ?? "") ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">SMTP Username / Email</label>
                    <input type="text" name="settings[smtp_username]" class="form-control" value="<?= htmlspecialchars($settings["smtp_username"] ?? "") ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">SMTP Password</label>
                    <input type="text" name="settings[smtp_password]" class="form-control" value="<?= htmlspecialchars($settings["smtp_password"] ?? "") ?>" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">SMTP Port</label>
                    <input type="number" name="settings[smtp_port]" class="form-control" value="<?= htmlspecialchars($settings["smtp_port"] ?? "465") ?>" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Encryption</label>
                    <select name="settings[smtp_encryption]" class="form-select">
                        <option value="ssl" <?= (isset($settings["smtp_encryption"]) && $settings["smtp_encryption"] == "ssl") ? "selected" : "" ?>>SSL</option>
                        <option value="tls" <?= (isset($settings["smtp_encryption"]) && $settings["smtp_encryption"] == "tls") ? "selected" : "" ?>>TLS</option>
                        <option value="" <?= (isset($settings["smtp_encryption"]) && $settings["smtp_encryption"] == "") ? "selected" : "" ?>>None</option>
                    </select>
                </div>
            </div>
            
            <div class="mt-4 border-top pt-3 text-end">
                <button type="submit" name="update_settings" class="btn btn-filao px-4">
                    <i class="fa-solid fa-save me-1"></i> Save Settings
                </button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
