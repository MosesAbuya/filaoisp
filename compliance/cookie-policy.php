<?php
$page_title = 'Filao Networks | Cookie Policy';
$page_desc = 'Learn more about Cookie Policy provided by Filao Networks Solutions across Kenya.';
$page_class = 'page-generic';
$root = '../';
include '../includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero-section" style="min-height:50vh; align-items:flex-end; padding-bottom:4rem;">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=1920&q=80');"></div>
    <div class="hero-overlay"></div>
    
    <div class="container-fluid px-4 hero-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-eyebrow">Legal & Compliance</div>
                <h1 class="hero-title" style="font-size:clamp(2.5rem, 6vw, 4.5rem);">
                    Cookie <span class="line-accent">Policy</span>
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<main style="padding:5rem 0;">
    <div class="container-fluid px-4">
        <div style="background:var(--clr-bg-card); padding:4rem; border:1px solid var(--clr-border);">
            <div class="text-steel mb-4" style="font-size:0.9rem;">Last Updated: July 20, 2026</div>
            <h2 class="mb-4" style="color:var(--text-main); font-family:var(--font-heading);">How We Use Cookies</h2>
            <p style="color:var(--clr-steel); line-height:1.8;">This Cookie Policy explains how Filao Networks Solutions uses cookies and similar tracking technologies on our website and client portals. We use these technologies to ensure you get the best experience on our website, remember your preferences, and analyze our traffic.</p>
            
            <hr style="border-color:var(--clr-border); margin:3rem 0;">
            
            <h4 style="color:var(--text-main); margin-bottom:1rem;">1. What are Cookies?</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Cookies are small text files placed on your device (computer, smartphone, or tablet) when you visit our website. They are widely used to make websites work more efficiently and to provide statistical information to the owners of the site.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">2. Types of Cookies We Use</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;"><strong>Essential Cookies:</strong> These are strictly necessary for the operation of our website and client portal. They enable core functions such as security, network management, and accessibility.<br>
            <strong>Performance & Analytics Cookies:</strong> These cookies collect anonymous data about how visitors use our site (e.g., Google Analytics). We use this information to improve our website's structure and content.<br>
            <strong>Functional Cookies:</strong> These allow the website to remember choices you make (such as your language or region) and provide enhanced, more personal features.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">3. Third-Party Cookies</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">We may engage trusted third-party providers to assist us in analyzing website traffic and providing live chat support. These third parties may also place cookies on your device. We do not control the cookies set by third parties, but we ensure they align with our privacy standards.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">4. Managing Your Cookie Preferences</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">You have the right to accept or decline cookies. Most web browsers automatically accept cookies, but you can modify your browser settings to decline non-essential cookies. Please note that disabling essential cookies may impact the functionality of our client portal (e.g., maintaining your login session).</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">5. Contact Us</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">If you have any questions about our use of cookies, please contact us at <strong>info@filaoadventures.co.ke</strong>.</p>

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
