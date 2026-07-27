<?php
/**
 * Filao Networks Solutions - Admin Blog Posts Management
 */
$page_title = 'Blog Posts Management';
require_once __DIR__ . '/includes/header.php';

// Handle Blog Deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_blog') {
    $blog_id = (int)$_POST['blog_id'];
    $stmt = $pdo->prepare("DELETE FROM blogs WHERE id = ?");
    $stmt->execute([$blog_id]);
    $_SESSION['msg'] = "Blog deleted successfully.";
    header("Location: blogs.php");
    exit;
}

// Handle Blog Addition
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_blog') {
    $title = trim($_POST['title']);
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $excerpt = trim($_POST['excerpt']);
    $content = trim($_POST['content']);
    $image_url = trim($_POST['image_url']);
    
    if($title && $excerpt && $content && $image_url) {
        try {
            $stmt = $pdo->prepare("INSERT INTO blogs (title, slug, excerpt, content, image_url) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $slug, $excerpt, $content, $image_url]);
            $_SESSION['msg'] = "Blog post published successfully.";
        } catch(PDOException $e) {
            $_SESSION['err'] = "Error adding blog post. Ensure title/slug is unique.";
        }
    } else {
        $_SESSION['err'] = "All fields are required.";
    }
    header("Location: blogs.php");
    exit;
}

$blogs = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC")->fetchAll();
?>

<div class="row g-4">
    <!-- Add Blog Post Form -->
    <div class="col-12 col-xl-5">
        <div class="card-modern mb-4">
            <div class="card-modern-header">
                <span><i class="fa-solid fa-pen-to-square me-2" style="color:var(--clr-red);"></i>Publish New Blog Post</span>
            </div>
            <div class="p-4">
                <form method="POST" action="blogs.php">
                    <input type="hidden" name="action" value="add_blog">
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Blog Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="e.g., Why Wi-Fi 6 is Revolutizing Home Internet" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Cover Image URL <span class="text-danger">*</span></label>
                        <input type="text" name="image_url" class="form-control" placeholder="https://images.unsplash.com/..." required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Short Excerpt (Summary) <span class="text-danger">*</span></label>
                        <textarea name="excerpt" class="form-control" rows="2" placeholder="Brief 1-2 sentence summary for blog cards..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Full Article Content (HTML allowed) <span class="text-danger">*</span></label>
                        <textarea name="content" class="form-control" rows="8" placeholder="<p>Full blog article paragraphs...</p>" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-filao w-100">
                        <i class="fa-solid fa-paper-plane me-2"></i> Publish Article
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Published Blog Posts List -->
    <div class="col-12 col-xl-7">
        <div class="card-modern">
            <div class="card-modern-header">
                <span><i class="fa-solid fa-newspaper me-2" style="color:var(--clr-red);"></i>Published Articles (<?= count($blogs) ?>)</span>
            </div>
            <div class="p-0 table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Cover</th>
                            <th>Title & Slug</th>
                            <th>Date Published</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($blogs)): ?>
                            <tr><td colspan="4" class="text-center py-4 text-muted">No blog posts published yet.</td></tr>
                        <?php else: ?>
                            <?php foreach ($blogs as $blog): ?>
                                <tr>
                                    <td style="width: 70px;">
                                        <img src="<?= htmlspecialchars($blog['image_url']) ?>" alt="cover" style="width: 50px; height: 38px; object-fit: cover; border-radius: 6px;">
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark"><?= htmlspecialchars($blog['title']) ?></div>
                                        <div class="text-muted small"><code>/blogs/<?= htmlspecialchars($blog['slug']) ?></code></div>
                                    </td>
                                    <td class="small text-muted"><?= htmlspecialchars(date('M j, Y', strtotime($blog['created_at']))) ?></td>
                                    <td class="text-end">
                                        <a href="../blogs/post.php?slug=<?= urlencode($blog['slug']) ?>" target="_blank" class="btn btn-sm btn-outline-secondary me-1" title="View Blog">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <form method="POST" action="blogs.php" onsubmit="return confirm('Are you sure you want to delete this blog post?');" style="display:inline;">
                                            <input type="hidden" name="action" value="delete_blog">
                                            <input type="hidden" name="blog_id" value="<?= (int)$blog['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
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
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
