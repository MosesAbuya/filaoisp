<?php
$page_title = 'Filao Networks | Careers';
$page_desc = 'Learn more about Careers provided by Filao Networks Solutions across Kenya.';
$page_class = 'page-generic';
$root = '../';
include '../includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero-section" style="min-height:50vh; align-items:flex-end; padding-bottom:4rem;">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=1920&q=80');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-slash"></div>
    <div class="hero-grid"></div>
    
    <div class="container-fluid px-4 hero-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-eyebrow">Careers</div>
                <h1 class="hero-title" style="font-size:clamp(2.5rem, 6vw, 4.5rem);">
                    Elevate Your <span class="line-accent">Connectivity</span>
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<main style="padding:5rem 0;">
    <div class="container-fluid px-4">

        <div style="background:var(--clr-bg-card); padding:4rem; border:1px solid var(--clr-border);">
            <h2 class="mb-4" style="color:var(--text-main); font-family:var(--font-heading);">Careers</h2>
            <p style="color:var(--clr-steel); line-height:1.8;">This document provides detailed information regarding our Careers. Filao Networks is committed to transparency and operational excellence across all our service offerings.</p>
            <p style="color:var(--clr-steel); line-height:1.8; margin-top:1.5rem;">For specific inquiries regarding these policies, please reach out to our legal and compliance team via info@filaonetworks.com.</p>
            <hr style="border-color:var(--clr-border); margin:3rem 0;">
            <h4 style="color:var(--text-main);">1. General Provisions</h4>
            <p style="color:var(--clr-steel); line-height:1.8;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <h4 style="color:var(--text-main); margin-top:2rem;">2. Compliance & Regulations</h4>
            <p style="color:var(--clr-steel); line-height:1.8;">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    
    </div>
</main>

<!-- CALL TO ACTION -->
<section style="background:#f0f4ff; padding:5rem 0; text-align:center; border-top:1px solid var(--clr-border);">
    <div class="container">
        <h2 class="section-title mb-4">Ready to Upgrade?</h2>
        <p class="section-desc mx-auto mb-5">Contact our technical team for a free site survey and specialized quote tailored to your exact requirements.</p>
        <a href="<?= $root ?>company/quote" class="btn-filao btn-primary-filao">Get a Free Quote &rarr;</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
