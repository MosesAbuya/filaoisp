<?php
session_start();
require_once '../api/db.php';

// Handle Blog Deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_blog') {
    $blog_id = (int)$_POST['blog_id'];
    $stmt = $pdo->prepare("DELETE FROM blogs WHERE id = ?");
    $stmt->execute([$blog_id]);
    $_SESSION['msg'] = "Blog deleted successfully.";
    header("Location: index.php");
    exit;
}

// Handle Blog Addition
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_blog') {
    $title = trim($_POST['title']);
    // Simple slug generator
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $excerpt = trim($_POST['excerpt']);
    $content = trim($_POST['content']);
    $image_url = trim($_POST['image_url']);
    
    if($title && $excerpt && $content && $image_url) {
        try {
            $stmt = $pdo->prepare("INSERT INTO blogs (title, slug, excerpt, content, image_url) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $slug, $excerpt, $content, $image_url]);
            $_SESSION['msg'] = "Blog added successfully.";
        } catch(PDOException $e) {
            $_SESSION['err'] = "Error adding blog. Ensure title/slug is unique.";
        }
    } else {
        $_SESSION['err'] = "All fields are required.";
    }
    header("Location: index.php");
    exit;
}

// Fetch Data
$contacts = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC")->fetchAll();
$quotes = $pdo->query("SELECT * FROM quote_requests ORDER BY created_at DESC")->fetchAll();
$subscribers = $pdo->query("SELECT * FROM newsletter_subscribers ORDER BY subscribed_at DESC")->fetchAll();
$blogs = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC")->fetchAll();

$page_title = 'Filao Admin Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Filao Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; font-family: system-ui, sans-serif; }
        .sidebar { min-height: 100vh; background: #090238; color: white; padding-top: 2rem; }
        .sidebar a { color: rgba(255,255,255,0.8); text-decoration: none; display: block; padding: 1rem 1.5rem; transition: background 0.2s; }
        .sidebar a:hover { background: rgba(236,28,36,0.2); color: white; }
        .card { border: none; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 2rem; }
        .card-header { background: white; border-bottom: 2px solid #ec1c24; font-weight: bold; }
        .table th { background-color: #f8f9fa; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <h4 class="text-center mb-4" style="color:#ec1c24;">Filao Admin</h4>
            <a href="#dashboard"><i class="fa-solid fa-chart-pie me-2"></i> Dashboard</a>
            <a href="#quotes"><i class="fa-solid fa-file-invoice-dollar me-2"></i> Quotes</a>
            <a href="#contacts"><i class="fa-solid fa-envelope me-2"></i> Messages</a>
            <a href="#newsletters"><i class="fa-solid fa-users me-2"></i> Subscribers</a>
            <a href="#blogs"><i class="fa-solid fa-newspaper me-2"></i> Blogs</a>
            <a href="../" target="_blank" style="margin-top:auto;"><i class="fa-solid fa-arrow-up-right-from-square me-2"></i> View Site</a>
        </div>
        
        <!-- Main Content -->
        <div class="col-md-10 p-4">
            <h2 class="mb-4">Admin Dashboard</h2>
            
            <?php if(isset($_SESSION['msg'])): ?>
                <div class="alert alert-success"><?= $_SESSION['msg']; unset($_SESSION['msg']); ?></div>
            <?php endif; ?>
            <?php if(isset($_SESSION['err'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['err']; unset($_SESSION['err']); ?></div>
            <?php endif; ?>

            <div class="row mb-4" id="dashboard">
                <div class="col-md-3">
                    <div class="card text-center p-3">
                        <div class="display-4 text-primary"><?= count($quotes) ?></div>
                        <div class="text-muted">Quote Requests</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center p-3">
                        <div class="display-4 text-success"><?= count($contacts) ?></div>
                        <div class="text-muted">Messages</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center p-3">
                        <div class="display-4 text-warning"><?= count($subscribers) ?></div>
                        <div class="text-muted">Subscribers</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center p-3">
                        <div class="display-4 text-info"><?= count($blogs) ?></div>
                        <div class="text-muted">Published Blogs</div>
                    </div>
                </div>
            </div>

            <!-- Blogs Section -->
            <div class="card" id="blogs">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Manage Blogs</span>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addBlogModal"><i class="fa-solid fa-plus"></i> Add Blog</button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($blogs as $blog): ?>
                                <tr>
                                    <td><?= $blog['id'] ?></td>
                                    <td><?= htmlspecialchars($blog['title']) ?></td>
                                    <td><?= date('M d, Y', strtotime($blog['created_at'])) ?></td>
                                    <td class="text-end">
                                        <form method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                            <input type="hidden" name="action" value="delete_blog">
                                            <input type="hidden" name="blog_id" value="<?= $blog['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if(empty($blogs)): ?>
                                <tr><td colspan="4" class="text-center text-muted py-3">No blogs found.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Quotes Section -->
            <div class="card" id="quotes">
                <div class="card-header">Quote Requests</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Service</th>
                                    <th>Company</th>
                                    <th>Contact</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($quotes as $quote): ?>
                                <tr>
                                    <td style="white-space:nowrap;"><?= date('M d, Y', strtotime($quote['created_at'])) ?></td>
                                    <td><?= htmlspecialchars($quote['name']) ?></td>
                                    <td><span class="badge bg-secondary"><?= htmlspecialchars($quote['service']) ?></span></td>
                                    <td><?= htmlspecialchars($quote['company']) ?></td>
                                    <td>
                                        <a href="mailto:<?= htmlspecialchars($quote['email']) ?>"><?= htmlspecialchars($quote['email']) ?></a><br>
                                        <a href="tel:<?= htmlspecialchars($quote['phone']) ?>"><?= htmlspecialchars($quote['phone']) ?></a>
                                    </td>
                                    <td><small><?= nl2br(htmlspecialchars($quote['message'])) ?></small></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if(empty($quotes)): ?>
                                <tr><td colspan="6" class="text-center text-muted py-3">No quotes found.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Contacts Section -->
            <div class="card" id="contacts">
                <div class="card-header">Contact Messages</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name / Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($contacts as $msg): ?>
                                <tr>
                                    <td style="white-space:nowrap;"><?= date('M d, Y', strtotime($msg['created_at'])) ?></td>
                                    <td><?= htmlspecialchars($msg['name']) ?><br><small><a href="mailto:<?= htmlspecialchars($msg['email']) ?>"><?= htmlspecialchars($msg['email']) ?></a></small></td>
                                    <td><?= htmlspecialchars($msg['subject']) ?></td>
                                    <td><small><?= nl2br(htmlspecialchars($msg['message'])) ?></small></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if(empty($contacts)): ?>
                                <tr><td colspan="4" class="text-center text-muted py-3">No messages found.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Subscribers Section -->
            <div class="card" id="newsletters">
                <div class="card-header">Newsletter Subscribers</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Subscribed At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($subscribers as $sub): ?>
                                <tr>
                                    <td><?= $sub['id'] ?></td>
                                    <td><?= htmlspecialchars($sub['email']) ?></td>
                                    <td><?= date('M d, Y H:i', strtotime($sub['subscribed_at'])) ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if(empty($subscribers)): ?>
                                <tr><td colspan="3" class="text-center text-muted py-3">No subscribers found.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Add Blog Modal -->
<div class="modal fade" id="addBlogModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Blog Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="action" value="add_blog">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="url" name="image_url" class="form-control" placeholder="https://..." required>
        </div>
        <div class="mb-3">
            <label class="form-label">Excerpt (Short description)</label>
            <textarea name="excerpt" class="form-control" rows="2" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Content (HTML allowed)</label>
            <textarea name="content" class="form-control" rows="8" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Publish Blog</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
