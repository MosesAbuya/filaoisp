<?php
$page_title = 'Filao Networks | Privacy Policy';
$page_desc = 'Learn more about Privacy Policy provided by Filao Networks Solutions across Kenya.';
$page_class = 'page-generic';
$root = '../';
include '../includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero-section" style="min-height:50vh; align-items:flex-end; padding-bottom:4rem;">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=1920&q=80');"></div>
    <div class="hero-overlay"></div>
    
    <div class="container-fluid px-4 hero-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-eyebrow">Legal & Compliance</div>
                <h1 class="hero-title" style="font-size:clamp(2.5rem, 6vw, 4.5rem);">
                    Privacy <span class="line-accent">Policy</span>
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
            <h2 class="mb-4" style="color:var(--text-main); font-family:var(--font-heading);">Data Privacy & Protection</h2>
            <p style="color:var(--clr-steel); line-height:1.8;">At Filao Networks Solutions, your privacy is our priority. This Privacy Policy explains how we collect, use, and protect your personal data in strict compliance with the Kenya Data Protection Act, 2019 (DPA) and guidelines provided by the Office of the Data Protection Commissioner (ODPC).</p>
            
            <hr style="border-color:var(--clr-border); margin:3rem 0;">
            
            <h4 style="color:var(--text-main); margin-bottom:1rem;">1. Data Collection and Usage</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;"><strong>1.1 What We Collect:</strong> We collect personal information such as your name, KRA PIN, National ID/Passport number, physical address, phone numbers, and email addresses during onboarding for KYC (Know Your Customer) compliance.<br>
            <strong>1.2 How We Use It:</strong> Your data is used exclusively to provision services, facilitate billing and payment processing via mobile money or bank transfers, and to provide technical support. We do not sell or monetize your personal data.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">2. Lawful Basis for Processing</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">We process your data based on the necessity to perform a contract (providing you with internet/IT services), compliance with legal obligations (CAK regulations on subscriber registration), and our legitimate interests in ensuring network security and preventing fraud.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">3. Data Sharing and Third Parties</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Your data is never shared with unauthorized third parties. We may share necessary details with trusted partners (such as payment gateways like Safaricom M-PESA or banking institutions) solely for the purpose of facilitating your payments. All partners are bound by strict non-disclosure and data protection agreements.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">4. Your Rights Under the DPA 2019</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">As a data subject in Kenya, you have the right to:<br>
            &bull; Be informed of the use to which your personal data is to be put.<br>
            &bull; Access your personal data in our custody.<br>
            &bull; Object to the processing of all or part of your personal data.<br>
            &bull; Request correction of false or misleading data.<br>
            &bull; Request deletion of false or misleading data about you.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">5. Contacting the Data Protection Officer</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">If you have any questions, concerns, or requests regarding your personal data, please contact our Data Protection Officer (DPO) at <strong>dpo@filaoadventures.co.ke</strong> or call us at <strong>+254 757 139239</strong>.</p>

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
