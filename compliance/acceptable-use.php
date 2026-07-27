<?php
$page_title = 'Filao Networks | Acceptable Use Policy';
$page_desc = 'Learn more about Acceptable Use Policy provided by Filao Networks Solutions across Kenya.';
$page_class = 'page-generic';
$root = '../';
include '../includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero-section" style="min-height:50vh; align-items:flex-end; padding-bottom:4rem;">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1563206767-5b18f218e8de?w=1920&q=80');"></div>
    <div class="hero-overlay"></div>
    
    <div class="container-fluid px-4 hero-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-eyebrow">Legal & Compliance</div>
                <h1 class="hero-title" style="font-size:clamp(2.5rem, 6vw, 4.5rem);">
                    Acceptable Use <span class="line-accent">Policy</span>
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
            <h2 class="mb-4" style="color:#fff; font-family:var(--font-heading);">Acceptable Use Policy (AUP)</h2>
            <p style="color:var(--clr-steel); line-height:1.8;">This Acceptable Use Policy specifies the actions prohibited by Filao Networks Solutions to users of our network. This policy aligns with the Kenyan Computer Misuse and Cybercrimes Act, 2018, to ensure a secure, legally compliant, and reliable network for all our subscribers.</p>
            
            <hr style="border-color:var(--clr-border); margin:3rem 0;">
            
            <h4 style="color:#fff; margin-bottom:1rem;">1. Prohibited Illegal Activities</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Our network may not be used to engage in any activity that is illegal under Kenyan or International Law. This includes, but is not limited to:<br>
            &bull; Distributing child sexual abuse material (CSAM).<br>
            &bull; Transmitting threats, harassment, or hate speech.<br>
            &bull; Fraud, identity theft, or phishing schemes.<br>
            &bull; Infringing upon intellectual property, copyrights, or trademarks.</p>

            <h4 style="color:#fff; margin-bottom:1rem;">2. System and Network Security Violations</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Subscribers must not attempt to undermine the security or integrity of our network or any other computing systems. Violations include:<br>
            &bull; Unauthorized access to or use of data, systems, or networks (Hacking).<br>
            &bull; Unauthorized monitoring of network traffic (Sniffing).<br>
            &bull; Interference with service to any user, host, or network (e.g., DDoS attacks).<br>
            &bull; Forging TCP-IP packet headers or email routing information.</p>

            <h4 style="color:#fff; margin-bottom:1rem;">3. Spam and Unsolicited Messages</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">The transmission of unsolicited commercial email (Spam) is strictly prohibited. Hosting websites heavily advertised by Spam on other networks is also forbidden. Subscribers found operating open mail relays or sending mass unsolicited emails will face immediate suspension.</p>

            <h4 style="color:#fff; margin-bottom:1rem;">4. Fair Usage Policy (FUP)</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">For our unlimited residential plans, a Fair Usage Policy applies. While we do not impose hard data caps, continuous extreme utilization (e.g., running unapproved commercial servers on a residential line or heavy torrenting 24/7) that degrades the experience for other users on the shared node may result in temporary bandwidth throttling.</p>

            <h4 style="color:#fff; margin-bottom:1rem;">5. Enforcement and Reporting</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Filao Networks reserves the right to suspend or terminate services without notice if a violation of this AUP is detected. We cooperate fully with law enforcement agencies (such as the DCI Cybercrime Unit) in the investigation of suspected criminal violations. To report a violation, email <strong>abuse@filaoadventures.co.ke</strong>.</p>

        </div>
    </div>
</main>

<!-- CALL TO ACTION -->
<section style="background:var(--clr-deep); padding:5rem 0; text-align:center; border-top:1px solid var(--clr-border);">
    <div class="container">
        <h2 class="section-title mb-4">Ready to Upgrade?</h2>
        <p class="section-desc mx-auto mb-5">Contact our technical team for a free site survey and specialized quote tailored to your exact requirements.</p>
        <a href="<?= $root ?>company/quote" class="btn-filao btn-primary-filao">Get a Free Quote &rarr;</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
