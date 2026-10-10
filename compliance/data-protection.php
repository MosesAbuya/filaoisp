<?php
$page_title = 'Filao Networks | Data Protection';
$page_desc = 'Learn more about Data Protection provided by Filao Networks Solutions across Kenya.';
$page_class = 'page-generic';
$root = '../';
include '../includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero-section" style="min-height:50vh; align-items:flex-end; padding-bottom:4rem;">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1562813733-b31f71025d54?w=1920&q=80');"></div>
    <div class="hero-overlay"></div>
    
    <div class="container-fluid px-4 hero-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-eyebrow">Legal & Compliance</div>
                <h1 class="hero-title" style="font-size:clamp(2.5rem, 6vw, 4.5rem);">
                    Data <span class="line-accent">Protection</span>
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
            <h2 class="mb-4" style="color:var(--text-main); font-family:var(--font-heading);">Information Security and Data Protection</h2>
            <p style="color:var(--clr-steel); line-height:1.8;">At Filao Networks Solutions, safeguarding our network infrastructure and the data transmitted across it is fundamental. This page outlines the technical, physical, and organizational measures we implement to protect your data against unauthorized access, loss, or alteration.</p>
            
            <hr style="border-color:var(--clr-border); margin:3rem 0;">
            
            <h4 style="color:var(--text-main); margin-bottom:1rem;">1. Technical Security Measures</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;"><strong>Encryption:</strong> All data transmitted between our core routers and our billing/CRM portals is encrypted using industry-standard TLS 1.3. Passwords stored in our databases are securely hashed using modern cryptographic algorithms.<br>
            <strong>Network Security:</strong> Our core infrastructure is protected by enterprise-grade firewalls, DDoS mitigation systems, and Intrusion Detection Systems (IDS). We continuously monitor our network for anomalies 24/7 via our Network Operations Center (NOC).</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">2. Physical Security at Data Centers</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Our servers and core routing equipment are hosted in Tier-III data centers within Kenya. These facilities feature:<br>
            &bull; 24/7 on-site armed security and biometric access control.<br>
            &bull; CCTV surveillance covering all server racks.<br>
            &bull; Redundant power supplies and advanced fire suppression systems.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">3. Organizational Controls</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;"><strong>Access Control:</strong> Access to customer data is strictly restricted to authorized Filao personnel on a "need-to-know" basis. Staff handling sensitive data undergo rigorous background checks and continuous security training.<br>
            <strong>Audits:</strong> We conduct regular internal and third-party security audits to identify and remediate potential vulnerabilities.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">4. Data Breach Response Plan</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">In the highly unlikely event of a data breach that compromises personal information, Filao Networks has a rapid response protocol in place. In accordance with the Kenya Data Protection Act 2019, we will notify the Office of the Data Protection Commissioner (ODPC) and all affected customers within 72 hours of becoming aware of the breach, detailing the nature of the breach and the mitigation steps taken.</p>

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
