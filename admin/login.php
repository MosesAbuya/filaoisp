<?php
/**
 * Filao Networks Solutions - Admin Portal Login
 */
session_start();
require_once __DIR__ . '/../api/db.php';

// Ensure table exists and default admin is seeded
require_once 'auth.php';

// Redirect if already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($username) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $user['username'];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Invalid username or password.';
        }
    } else {
        $error = 'Please enter both username and password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal Login - Filao Networks</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --clr-dark: #090238;
            --clr-red: #ec1c24;
            --clr-red-hover: #c4141b;
            --clr-card: rgba(16, 25, 53, 0.9);
            --clr-border: rgba(255, 255, 255, 0.12);
        }
        body {
            background: radial-gradient(circle at top right, #111a42 0%, var(--clr-dark) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            padding: 1.5rem;
        }
        .login-card {
            background: var(--clr-card);
            border: 1px solid var(--clr-border);
            border-radius: 16px;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(12px);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-logo img {
            max-height: 48px;
            margin-bottom: 0.75rem;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: #fff;
            border-radius: 10px;
            padding: 0.75rem 1rem;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: var(--clr-red);
            box-shadow: 0 0 0 0.25rem rgba(236, 28, 36, 0.25);
            color: #fff;
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.45);
        }
        .btn-filao {
            background: var(--clr-red);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 0.75rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.2s ease;
        }
        .btn-filao:hover {
            background: var(--clr-red-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(236, 28, 36, 0.35);
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-logo">
        <h4 class="fw-bold mb-1" style="color:#fff;"><i class="fa-solid fa-shield-halved me-2" style="color:var(--clr-red);"></i>Filao Admin Portal</h4>
        <p class="text-white-50 small mb-0">Sign in to manage coverage pins, quotes & content</p>
    </div>

    <?php if ($error): ?>
        <div class="alert alert-danger py-2 small border-0" role="alert">
            <i class="fa-solid fa-circle-exclamation me-1"></i> <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <div class="mb-3">
            <label class="form-label small fw-semibold text-white-50"><i class="fa-solid fa-user me-1"></i> Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter username" required autofocus>
        </div>
        <div class="mb-4">
            <label class="form-label small fw-semibold text-white-50"><i class="fa-solid fa-lock me-1"></i> Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-filao">
            <i class="fa-solid fa-right-to-bracket me-2"></i> Sign In to Dashboard
        </button>
    </form>

    <div class="text-center mt-4">
        <a href="../" class="text-white-50 small text-decoration-none hover-white">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Main Website
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
