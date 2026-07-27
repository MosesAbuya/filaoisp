<?php
/**
 * Filao Networks Solutions - Admin Dashboard Header & Navigation
 */
require_once __DIR__ . '/../auth.php';
require_once __DIR__ . '/../../api/db.php';

$page_title = $page_title ?? 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?> - Filao Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <?php if (isset($extra_css)) echo $extra_css; ?>
    <style>
        :root {
            --clr-dark: #090238;
            --clr-sidebar: #07091e;
            --clr-main-bg: #f4f6f9;
            --clr-red: #ec1c24;
            --clr-red-hover: #c4141b;
            --clr-border: rgba(255, 255, 255, 0.08);
            --sidebar-width: 260px;
        }
        body {
            background-color: var(--clr-main-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            color: #212529;
        }
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        /* Sidebar Styling */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: var(--clr-sidebar);
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1050;
            overflow-y: auto;
            transition: transform 0.3s ease;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
        }
        .sidebar-brand {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--clr-border);
        }
        .sidebar-user-card {
            padding: 1.25rem 1.5rem;
            background: rgba(255, 255, 255, 0.03);
            border-bottom: 1px solid var(--clr-border);
        }
        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(236, 28, 36, 0.2);
            color: var(--clr-red);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            border: 1px solid rgba(236, 28, 36, 0.4);
        }
        .sidebar-menu-title {
            padding: 1.25rem 1.5rem 0.5rem;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            color: rgba(255, 255, 255, 0.4);
            text-transform: uppercase;
        }
        .sidebar-nav .nav-item {
            margin: 0.2rem 0.8rem;
        }
        .sidebar-nav .nav-link {
            color: rgba(255, 255, 255, 0.75);
            padding: 0.75rem 1rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            font-weight: 500;
            font-size: 0.92rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .sidebar-nav .nav-link .nav-icon {
            width: 24px;
            font-size: 1.05rem;
            margin-right: 0.75rem;
            text-align: center;
        }
        .sidebar-nav .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(4px);
        }
        .sidebar-nav .nav-link.active {
            color: #fff;
            background: linear-gradient(90deg, var(--clr-red) 0%, #b81219 100%);
            box-shadow: 0 4px 12px rgba(236, 28, 36, 0.35);
            font-weight: 600;
        }
        /* Main Content Area */
        .admin-main {
            flex: 1;
            margin-left: var(--sidebar-width);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }
        .admin-topbar {
            background: #fff;
            padding: 0.85rem 2rem;
            border-bottom: 1px solid #e0e6ed;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1020;
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
        }
        .admin-content {
            padding: 2rem;
            flex: 1;
        }
        .btn-filao {
            background: var(--clr-red);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.25rem;
            font-weight: 600;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn-filao:hover {
            background: var(--clr-red-hover);
            color: #fff;
            box-shadow: 0 4px 10px rgba(236, 28, 36, 0.25);
        }
        .card-modern {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            margin-bottom: 1.75rem;
            overflow: hidden;
        }
        .card-modern-header {
            background: #fff;
            padding: 1.15rem 1.5rem;
            border-bottom: 2px solid var(--clr-red);
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--clr-dark);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .stat-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            text-decoration: none;
            color: inherit;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            color: inherit;
        }
        .stat-icon {
            width: 54px;
            height: 54px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        @media (max-width: 991.98px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-main {
                margin-left: 0;
            }
            .admin-content {
                padding: 1.25rem;
            }
        }
    </style>
</head>
<body>

<div class="admin-wrapper">
    <?php include __DIR__ . '/sidebar.php'; ?>

    <main class="admin-main">
        <!-- Top Navigation Bar -->
        <header class="admin-topbar">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-secondary d-lg-none me-3" type="button" id="toggleSidebarBtn" aria-label="Toggle Navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div>
                    <h5 class="fw-bold mb-0 text-dark"><?= htmlspecialchars($page_title) ?></h5>
                    <div class="small text-muted">Filao Networks Solutions Administration</div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="../" target="_blank" class="btn btn-outline-dark btn-sm d-none d-sm-inline-flex align-items-center">
                    <i class="fa-solid fa-globe me-1"></i> Live Site
                </a>
                <a href="logout.php" class="btn btn-danger btn-sm d-inline-flex align-items-center">
                    <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                </a>
            </div>
        </header>

        <!-- Main Flash Messages -->
        <div class="admin-content">
            <?php if (isset($_SESSION['msg'])): ?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 d-flex align-items-center" role="alert">
                    <i class="fa-solid fa-circle-check fs-5 me-2 text-success"></i>
                    <div><?= htmlspecialchars($_SESSION['msg']) ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['msg']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['err'])): ?>
                <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 d-flex align-items-center" role="alert">
                    <i class="fa-solid fa-triangle-exclamation fs-5 me-2 text-danger"></i>
                    <div><?= htmlspecialchars($_SESSION['err']) ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['err']); ?>
            <?php endif; ?>
