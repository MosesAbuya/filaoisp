<?php
/**
 * Filao Networks Solutions - Admin Dashboard Sidebar
 */
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!-- Sidebar Navigation -->
<aside class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-brand d-flex align-items-center justify-content-between">
        <a href="index.php" class="d-flex align-items-center text-decoration-none">
            <i class="fa-solid fa-network-wired text-filao-red fs-4 me-2"></i>
            <span class="fw-bold fs-5 text-white tracking-wide">FILAO <span style="color:var(--clr-red);">ADMIN</span></span>
        </a>
        <button class="btn-close btn-close-white d-lg-none" type="button" id="closeSidebarBtn" aria-label="Close"></button>
    </div>

    <div class="sidebar-user-card">
        <div class="d-flex align-items-center">
            <div class="user-avatar me-3">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <div>
                <div class="fw-bold text-white small"><?= htmlspecialchars($_SESSION['admin_username'] ?? 'Administrator') ?></div>
                <div class="text-success small" style="font-size: 0.75rem;"><i class="fa-solid fa-circle small me-1"></i> Online & Active</div>
            </div>
        </div>
    </div>

    <div class="sidebar-menu-title">NAVIGATION MENU</div>
    <ul class="sidebar-nav list-unstyled mb-0">
        <li class="nav-item">
            <a href="index.php" class="nav-link <?= ($current_page === 'index.php') ? 'active' : '' ?>">
                <i class="fa-solid fa-chart-line nav-icon"></i>
                <span>Dashboard Overview</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="coverage.php" class="nav-link <?= ($current_page === 'coverage.php') ? 'active' : '' ?>">
                <i class="fa-solid fa-map-location-dot nav-icon"></i>
                <span>Coverage Map & Pins</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="blogs.php" class="nav-link <?= ($current_page === 'blogs.php') ? 'active' : '' ?>">
                <i class="fa-solid fa-newspaper nav-icon"></i>
                <span>Blog Posts</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="quotes.php" class="nav-link <?= ($current_page === 'quotes.php') ? 'active' : '' ?>">
                <i class="fa-solid fa-file-invoice-dollar nav-icon"></i>
                <span>Quote Requests</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="contacts.php" class="nav-link <?= ($current_page === 'contacts.php') ? 'active' : '' ?>">
                <i class="fa-solid fa-comments nav-icon"></i>
                <span>Contact Messages</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="newsletters.php" class="nav-link <?= ($current_page === 'newsletters.php') ? 'active' : '' ?>">
                <i class="fa-solid fa-envelope-open-text nav-icon"></i>
                <span>Newsletter Subscribers</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-menu-title mt-4">SYSTEM</div>
    <ul class="sidebar-nav list-unstyled mb-0">
        <li class="nav-item">
            <a href="../" target="_blank" class="nav-link">
                <i class="fa-solid fa-globe nav-icon"></i>
                <span>View Live Website</span>
                <i class="fa-solid fa-arrow-up-right-from-square ms-auto small opacity-50"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="nav-link text-danger">
                <i class="fa-solid fa-right-from-bracket nav-icon"></i>
                <span>Sign Out</span>
            </a>
        </li>
    </ul>
</aside>
