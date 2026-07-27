<?php
$page_title = 'Filao Networks | Refund Policy';
$page_desc = 'Learn more about Refund Policy provided by Filao Networks Solutions across Kenya.';
$page_class = 'page-generic';
$root = '../';
include '../includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero-section" style="min-height:50vh; align-items:flex-end; padding-bottom:4rem;">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?w=1920&q=80');"></div>
    <div class="hero-overlay"></div>
    
    <div class="container-fluid px-4 hero-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-eyebrow">Legal & Compliance</div>
                <h1 class="hero-title" style="font-size:clamp(2.5rem, 6vw, 4.5rem);">
                    Refund <span class="line-accent">Policy</span>
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
            <h2 class="mb-4" style="color:#fff; font-family:var(--font-heading);">Refunds & Cancellations</h2>
            <p style="color:var(--clr-steel); line-height:1.8;">At Filao Networks Solutions, we aim to provide exceptional service. However, we understand that circumstances may require a refund or cancellation. This policy outlines the conditions under which refunds are issued to our clients in Kenya.</p>
            
            <hr style="border-color:var(--clr-border); margin:3rem 0;">
            
            <h4 style="color:#fff; margin-bottom:1rem;">1. Hardware and Installation Fees</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Installation fees, civil works costs, and labor charges are strictly <strong>non-refundable</strong> once the installation has commenced. If Customer Premises Equipment (CPE) was leased and a deposit was paid, the deposit will be refunded in full within 14 working days upon the return of the equipment in good, working condition.</p>

            <h4 style="color:#fff; margin-bottom:1rem;">2. Service Subscription Refunds</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Pre-paid subscriptions (e.g., monthly residential packages) are generally non-refundable once the billing cycle has begun. However, if a client experiences an outage exceeding 72 continuous hours that is definitively proven to be a fault on Filao Networks' core infrastructure, a pro-rated refund or account credit may be issued upon request.</p>

            <h4 style="color:#fff; margin-bottom:1rem;">3. Double Billing and Errors</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">If you are erroneously billed twice for the same billing cycle (e.g., accidental double payment via M-PESA paybill), the excess amount will automatically be credited to your account for the subsequent month. Should you prefer a cash refund, you must submit a request with the relevant transaction confirmation messages to billing@filaoadventures.co.ke. Cash refunds for billing errors will be processed within 7 working days.</p>

            <h4 style="color:#fff; margin-bottom:1rem;">4. Cancellation Policy</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Clients on month-to-month contracts may cancel their service by providing a 30-day written notice. Clients on fixed-term Enterprise contracts (e.g., 1-year or 2-year SLAs) who terminate the agreement prior to the contract end date will be subject to early termination fees as stipulated in their specific SLA.</p>

            <h4 style="color:#fff; margin-bottom:1rem;">5. Method of Refund</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">All approved refunds will be processed using the original method of payment (e.g., M-PESA or Bank Transfer via RTGS/EFT). We do not issue cash refunds from our physical offices.</p>

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
