<?php
/**
 * Filao Networks Solutions - Admin Dashboard Overview
 */
$page_title = 'Dashboard Overview';
require_once __DIR__ . '/includes/header.php';

// Fetch Counts & Recent Activity
$total_pins = $pdo->query("SELECT COUNT(*) FROM coverage_areas")->fetchColumn();
$total_blogs = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();
$total_quotes = $pdo->query("SELECT COUNT(*) FROM quote_requests")->fetchColumn();
$total_contacts = $pdo->query("SELECT COUNT(*) FROM contact_messages")->fetchColumn();
$total_subscribers = $pdo->query("SELECT COUNT(*) FROM newsletter_subscribers")->fetchColumn();

$recent_quotes = $pdo->query("SELECT * FROM quote_requests ORDER BY created_at DESC LIMIT 5")->fetchAll();
$recent_contacts = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT 5")->fetchAll();
?>

<!-- Statistics Overview Cards -->
<div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-4">
        <a href="coverage.php" class="stat-card">
            <div>
                <div class="text-muted small fw-semibold text-uppercase">Coverage Pins</div>
                <h2 class="fw-bold mb-0 mt-1"><?= (int)$total_pins ?></h2>
                <div class="small text-success mt-1"><i class="fa-solid fa-check-circle me-1"></i> Nairobi & Kenya map</div>
            </div>
            <div class="stat-icon" style="background: rgba(236, 28, 36, 0.1); color: #ec1c24;">
                <i class="fa-solid fa-map-location-dot"></i>
            </div>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-xl-4">
        <a href="blogs.php" class="stat-card">
            <div>
                <div class="text-muted small fw-semibold text-uppercase">Published Blogs</div>
                <h2 class="fw-bold mb-0 mt-1"><?= (int)$total_blogs ?></h2>
                <div class="small text-primary mt-1"><i class="fa-solid fa-pen-to-square me-1"></i> SEO articles & news</div>
            </div>
            <div class="stat-icon" style="background: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                <i class="fa-solid fa-newspaper"></i>
            </div>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-xl-4">
        <a href="quotes.php" class="stat-card">
            <div>
                <div class="text-muted small fw-semibold text-uppercase">Quote Requests</div>
                <h2 class="fw-bold mb-0 mt-1"><?= (int)$total_quotes ?></h2>
                <div class="small text-warning mt-1"><i class="fa-solid fa-clock me-1"></i> Customer inquiries</div>
            </div>
            <div class="stat-icon" style="background: rgba(255, 193, 7, 0.15); color: #d39e00;">
                <i class="fa-solid fa-file-invoice-dollar"></i>
            </div>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-xl-6">
        <a href="contacts.php" class="stat-card">
            <div>
                <div class="text-muted small fw-semibold text-uppercase">Contact Messages</div>
                <h2 class="fw-bold mb-0 mt-1"><?= (int)$total_contacts ?></h2>
                <div class="small text-info mt-1"><i class="fa-solid fa-envelope me-1"></i> Support & general queries</div>
            </div>
            <div class="stat-icon" style="background: rgba(13, 202, 240, 0.15); color: #0dcaf0;">
                <i class="fa-solid fa-comments"></i>
            </div>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-xl-6">
        <a href="newsletters.php" class="stat-card">
            <div>
                <div class="text-muted small fw-semibold text-uppercase">Newsletter Subscribers</div>
                <h2 class="fw-bold mb-0 mt-1"><?= (int)$total_subscribers ?></h2>
                <div class="small text-secondary mt-1"><i class="fa-solid fa-users me-1"></i> Active newsletter audience</div>
            </div>
            <div class="stat-icon" style="background: rgba(108, 117, 125, 0.15); color: #6c757d;">
                <i class="fa-solid fa-envelope-open-text"></i>
            </div>
        </a>
    </div>
</div>

<!-- Quick Action Navigation Banner -->
<div class="card-modern p-4 mb-4" style="background: linear-gradient(135deg, #090238 0%, #111a42 100%); color: #fff;">
    <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between">
        <div class="mb-3 mb-lg-0">
            <h4 class="fw-bold mb-1"><i class="fa-solid fa-sliders me-2" style="color: #ec1c24;"></i>Filao ISP Administration Portal</h4>
            <p class="text-white-50 mb-0">Select a module from the sidebar or jump directly to manage your website content below.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="coverage.php" class="btn btn-filao btn-sm"><i class="fa-solid fa-map-pin me-1"></i> Manage Pins</a>
            <a href="blogs.php" class="btn btn-outline-light btn-sm"><i class="fa-solid fa-plus me-1"></i> Add Blog Post</a>
            <a href="quotes.php" class="btn btn-outline-light btn-sm"><i class="fa-solid fa-eye me-1"></i> View Quotes</a>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Quote Requests Table -->
    <div class="col-12 col-xl-6">
        <div class="card-modern">
            <div class="card-modern-header">
                <span><i class="fa-solid fa-file-invoice-dollar me-2" style="color:var(--clr-red);"></i>Recent Quote Requests</span>
                <a href="quotes.php" class="btn btn-sm btn-outline-dark">View All</a>
            </div>
            <div class="p-0 table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Service</th>
                            <th>Phone</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recent_quotes)): ?>
                            <tr><td colspan="4" class="text-center py-4 text-muted">No quote requests yet.</td></tr>
                        <?php else: ?>
                            <?php foreach ($recent_quotes as $q): ?>
                                <tr>
                                    <td class="fw-bold"><?= htmlspecialchars($q['name']) ?></td>
                                    <td><span class="badge bg-danger-subtle text-danger"><?= htmlspecialchars($q['service']) ?></span></td>
                                    <td><?= htmlspecialchars($q['phone']) ?></td>
                                    <td class="text-muted small"><?= htmlspecialchars(date('M j, Y', strtotime($q['created_at']))) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Contact Messages Table -->
    <div class="col-12 col-xl-6">
        <div class="card-modern">
            <div class="card-modern-header">
                <span><i class="fa-solid fa-comments me-2" style="color:var(--clr-red);"></i>Recent Contact Messages</span>
                <a href="contacts.php" class="btn btn-sm btn-outline-dark">View All</a>
            </div>
            <div class="p-0 table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Email</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recent_contacts)): ?>
                            <tr><td colspan="4" class="text-center py-4 text-muted">No contact messages yet.</td></tr>
                        <?php else: ?>
                            <?php foreach ($recent_contacts as $c): ?>
                                <tr>
                                    <td class="fw-bold"><?= htmlspecialchars($c['name']) ?></td>
                                    <td><?= htmlspecialchars(mb_strimwidth($c['subject'] ?? 'General Inquiry', 0, 24, '...')) ?></td>
                                    <td><?= htmlspecialchars($c['email']) ?></td>
                                    <td class="text-muted small"><?= htmlspecialchars(date('M j, Y', strtotime($c['created_at']))) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
