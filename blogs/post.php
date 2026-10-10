<?php
require_once '../api/db.php';

$slug = $_GET['slug'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug = ? LIMIT 1");
$stmt->execute([$slug]);
$blog = $stmt->fetch();

if (!$blog) {
    header("HTTP/1.0 404 Not Found");
    $page_title = 'Blog Not Found';
    $page_desc = '';
    $page_class = 'page-404';
    $root = '../';
    include '../includes/header.php';
    echo '<main style="padding:10rem 0; text-align:center;"><div class="container-fluid"><h1 class="text-white">Post Not Found</h1><a href="' . $root . 'blogs" class="btn-filao btn-primary-filao mt-4">Back to Blogs</a></div></main>';
    include '../includes/footer.php';
    exit;
}

$page_title = htmlspecialchars($blog['title']) . ' | Filao Networks';
$page_desc = htmlspecialchars($blog['excerpt']);
$page_class = 'page-blog-single';
$root = '../';
include '../includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero-section" style="min-height:60vh; align-items:flex-end; padding-bottom:4rem;">
    <div class="hero-bg" style="background-image:url('<?= htmlspecialchars($blog['image_url']) ?>');"></div>
    <div class="hero-overlay" style="background:linear-gradient(to top, rgba(16,83,245,0.92) 0%, rgba(16,83,245,0.60) 50%, rgba(16,83,245,0.25) 100%);"></div>
    
    <div class="container-fluid px-4 hero-content">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div style="font-size:0.85rem; color:var(--clr-red); text-transform:uppercase; letter-spacing:0.15em; font-weight:700; margin-bottom:1.5rem;">
                    <?= date('F j, Y', strtotime($blog['created_at'])) ?>
                </div>
                <h1 class="hero-title" style="font-size:clamp(2rem, 5vw, 4rem); margin-bottom:1.5rem;">
                    <?= htmlspecialchars($blog['title']) ?>
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<main style="padding:5rem 0;">
    <div class="container-fluid px-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="blog-content" style="color:var(--clr-off-white); font-size:1.1rem; line-height:1.8;">
                    <p class="lead mb-5" style="color:var(--clr-steel); font-size:1.25rem;">
                        <?= htmlspecialchars($blog['excerpt']) ?>
                    </p>
                    
                    <div style="border-top:1px solid var(--clr-border); margin:3rem 0;"></div>
                    
                    <!-- Content from DB -->
                    <?= $blog['content'] ?>
                    
                </div>
                
                <div style="border-top:1px solid var(--clr-border); margin:4rem 0;"></div>
                
                <div class="text-center">
                    <a href="<?= $root ?>blogs" class="btn-filao btn-outline-filao"><i class="fa-solid fa-arrow-left me-2"></i> Back to All Articles</a>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
/* Blog Typography Improvements */
.blog-content p { margin-bottom: 1.5rem; }
.blog-content h2 { font-family: var(--font-heading); color: #fff; margin: 3rem 0 1.5rem; }
.blog-content h3 { font-family: var(--font-heading); color: #fff; margin: 2rem 0 1rem; }
.blog-content ul, .blog-content ol { margin-bottom: 1.5rem; padding-left: 1.5rem; }
.blog-content li { margin-bottom: 0.5rem; }
</style>

<?php include '../includes/footer.php'; ?>
