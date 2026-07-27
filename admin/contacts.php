<?php
/**
 * Filao Networks Solutions - Admin Contact Messages Management
 */
$page_title = 'Contact Messages';
require_once __DIR__ . '/includes/header.php';

// Handle Message Deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_contact') {
    $contact_id = (int)$_POST['contact_id'];
    $stmt = $pdo->prepare("DELETE FROM contact_messages WHERE id = ?");
    $stmt->execute([$contact_id]);
    $_SESSION['msg'] = "Contact message deleted successfully.";
    header("Location: contacts.php");
    exit;
}

$contacts = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC")->fetchAll();
?>

<div class="card-modern">
    <div class="card-modern-header">
        <span><i class="fa-solid fa-comments me-2" style="color:var(--clr-red);"></i>Customer Contact Messages (<?= count($contacts) ?> Total)</span>
        <span class="small text-muted">Received from contact forms</span>
    </div>
    <div class="p-0 table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Sender Name</th>
                    <th>Email Address</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message Content</th>
                    <th>Date Received</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($contacts)): ?>
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">No contact messages received yet.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($contacts as $c): ?>
                        <tr>
                            <td class="text-muted fw-bold">#<?= (int)$c['id'] ?></td>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($c['name']) ?></td>
                            <td>
                                <a href="mailto:<?= htmlspecialchars($c['email']) ?>" class="text-decoration-none">
                                    <?= htmlspecialchars($c['email']) ?>
                                </a>
                            </td>
                            <td><?= htmlspecialchars($c['phone'] ?? 'N/A') ?></td>
                            <td class="fw-semibold text-primary"><?= htmlspecialchars($c['subject'] ?? 'General Inquiry') ?></td>
                            <td class="small text-muted" style="max-width: 280px;">
                                <?= nl2br(htmlspecialchars($c['message'])) ?>
                            </td>
                            <td class="small text-muted"><?= htmlspecialchars(date('M j, Y H:i', strtotime($c['created_at']))) ?></td>
                            <td class="text-end">
                                <form method="POST" action="contacts.php" onsubmit="return confirm('Delete this contact message?');" style="display:inline;">
                                    <input type="hidden" name="action" value="delete_contact">
                                    <input type="hidden" name="contact_id" value="<?= (int)$c['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Message">
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
