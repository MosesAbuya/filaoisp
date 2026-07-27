<?php
/**
 * Filao Networks Solutions - Admin Quote Requests Management
 */
$page_title = 'Quote Requests';
require_once __DIR__ . '/includes/header.php';

// Handle Quote Deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_quote') {
    $quote_id = (int)$_POST['quote_id'];
    $stmt = $pdo->prepare("DELETE FROM quote_requests WHERE id = ?");
    $stmt->execute([$quote_id]);
    $_SESSION['msg'] = "Quote request deleted successfully.";
    header("Location: quotes.php");
    exit;
}

$quotes = $pdo->query("SELECT * FROM quote_requests ORDER BY created_at DESC")->fetchAll();
?>

<div class="card-modern">
    <div class="card-modern-header">
        <span><i class="fa-solid fa-file-invoice-dollar me-2" style="color:var(--clr-red);"></i>Customer Quote Requests (<?= count($quotes) ?> Total)</span>
        <span class="small text-muted">Received from website quote forms</span>
    </div>
    <div class="p-0 table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Requested Service</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>Location / Area</th>
                    <th>Date Received</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($quotes)): ?>
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">No quote requests received yet.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($quotes as $q): ?>
                        <tr>
                            <td class="text-muted fw-bold">#<?= (int)$q['id'] ?></td>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($q['name']) ?></td>
                            <td><span class="badge bg-danger-subtle text-danger px-3 py-2"><?= htmlspecialchars($q['service']) ?></span></td>
                            <td>
                                <a href="tel:<?= htmlspecialchars($q['phone']) ?>" class="text-decoration-none fw-semibold">
                                    <i class="fa-solid fa-phone me-1 small text-success"></i> <?= htmlspecialchars($q['phone']) ?>
                                </a>
                            </td>
                            <td>
                                <a href="mailto:<?= htmlspecialchars($q['email']) ?>" class="text-decoration-none">
                                    <?= htmlspecialchars($q['email']) ?>
                                </a>
                            </td>
                            <td><?= htmlspecialchars($q['location'] ?? 'N/A') ?></td>
                            <td class="small text-muted"><?= htmlspecialchars(date('M j, Y H:i', strtotime($q['created_at']))) ?></td>
                            <td class="text-end">
                                <form method="POST" action="quotes.php" onsubmit="return confirm('Delete this quote request?');" style="display:inline;">
                                    <input type="hidden" name="action" value="delete_quote">
                                    <input type="hidden" name="quote_id" value="<?= (int)$q['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Quote">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
