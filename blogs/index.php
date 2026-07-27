<?php
$page_title = 'Filao Networks | Insights & News';
$page_desc = 'Read the latest news, insights, and case studies on enterprise internet, networking, cloud, and security across Kenya.';
$page_class = 'page-blogs';
$root = '../';
include '../includes/header.php';
require_once '../api/db.php';

$blogs = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC")->fetchAll();
?>

<!-- HERO SECTION -->
<section class="hero-section" style="min-height:50vh; align-items:flex-end; padding-bottom:4rem;">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=1920&q=80');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-slash"></div>
    <div class="hero-grid"></div>
    
    <div class="container-fluid px-4 hero-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-eyebrow">Insights &amp; News</div>
                <h1 class="hero-title" style="font-size:clamp(2.5rem, 6vw, 4.5rem);">
                    The Latest <span class="line-accent">Updates</span>
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<main style="padding:5rem 0;">
    <div class="container-fluid px-4">
        <div class="row g-5">
            <?php foreach($blogs as $blog): ?>
            <div class="col-lg-4 col-md-6">
                <article style="background:var(--clr-bg-card); border:1px solid var(--clr-border); height:100%; display:flex; flex-direction:column; overflow:hidden;">
                    <a href="<?= $root ?>blogs/<?= urlencode($blog['slug']) ?>" style="display:block; overflow:hidden; position:relative; aspect-ratio:16/9;">
                        <img src="<?= htmlspecialchars($blog['image_url']) ?>" alt="<?= htmlspecialchars($blog['title']) ?>" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    </a>
                    <div style="padding:2rem; flex:1; display:flex; flex-direction:column;">
                        <div style="font-size:0.75rem; color:var(--clr-red); text-transform:uppercase; letter-spacing:0.1em; font-weight:700; margin-bottom:1rem;">
                            <?= date('F j, Y', strtotime($blog['created_at'])) ?>
                        </div>
                        <h3 style="color:#fff; font-size:1.3rem; margin-bottom:1rem; font-family:var(--font-heading);">
                            <a href="<?= $root ?>blogs/<?= urlencode($blog['slug']) ?>" style="color:inherit; text-decoration:none; transition:color 0.2s;" onmouseover="this.style.color='var(--clr-red)'" onmouseout="this.style.color='inherit'">
                                <?= htmlspecialchars($blog['title']) ?>
                            </a>
                        </h3>
                        <p style="color:var(--clr-steel); font-size:0.9rem; line-height:1.6; flex:1;">
                            <?= htmlspecialchars($blog['excerpt']) ?>
                        </p>
                        <a href="<?= $root ?>blogs/<?= urlencode($blog['slug']) ?>" style="display:inline-flex; align-items:center; color:var(--clr-red); font-size:0.85rem; font-weight:700; text-decoration:none; text-transform:uppercase; letter-spacing:0.05em; margin-top:1.5rem;">
                            Read More <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
            
            <?php if(empty($blogs)): ?>
            <div class="col-12 text-center py-5">
                <div style="font-size:3rem; color:var(--clr-border); margin-bottom:1rem;"><i class="fa-solid fa-newspaper"></i></div>
                <h3 class="text-white">Check back soon</h3>
                <p class="text-steel">We are currently preparing our first set of articles.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
