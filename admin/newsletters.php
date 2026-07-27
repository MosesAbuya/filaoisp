<?php
/**
 * Filao Networks Solutions - Admin Newsletter Subscribers Management
 */
$page_title = 'Newsletter Subscribers';
require_once __DIR__ . '/includes/header.php';

// Handle Subscriber Deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_subscriber') {
    $sub_id = (int)$_POST['subscriber_id'];
    $stmt = $pdo->prepare("DELETE FROM newsletter_subscribers WHERE id = ?");
    $stmt->execute([$sub_id]);
    $_SESSION['msg'] = "Subscriber removed successfully.";
    header("Location: newsletters.php");
    exit;
}

$subscribers = $pdo->query("SELECT * FROM newsletter_subscribers ORDER BY subscribed_at DESC")->fetchAll();
?>

<div class="card-modern">
    <div class="card-modern-header">
        <span><i class="fa-solid fa-envelope-open-text me-2" style="color:var(--clr-red);"></i>Newsletter Email Subscribers (<?= count($subscribers) ?> Total)</span>
        <span class="small text-muted">Audience subscribed for updates</span>
    </div>
    <div class="p-0 table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Email Address</th>
                    <th>Date Subscribed</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($subscribers)): ?>
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">No newsletter subscribers yet.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($subscribers as $s): ?>
                        <tr>
                            <td class="text-muted fw-bold">#<?= (int)$s['id'] ?></td>
                            <td class="fw-bold text-dark">
                                <i class="fa-solid fa-envelope me-2 text-muted"></i><?= htmlspecialchars($s['email']) ?>
                            </td>
                            <td class="small text-muted"><?= htmlspecialchars(date('M j, Y H:i', strtotime($s['subscribed_at']))) ?></td>
                            <td class="text-end">
                                <a href="mailto:<?= htmlspecialchars($s['email']) ?>" class="btn btn-sm btn-outline-secondary me-1" title="Send Email">
                                    <i class="fa-solid fa-paper-plane"></i> Email
                                </a>
                                <form method="POST" action="newsletters.php" onsubmit="return confirm('Remove subscriber?');" style="display:inline;">
                                    <input type="hidden" name="action" value="delete_subscriber">
                                    <input type="hidden" name="subscriber_id" value="<?= (int)$s['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Remove Subscriber">
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
