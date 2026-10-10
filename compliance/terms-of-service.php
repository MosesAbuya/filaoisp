<?php
$page_title = 'Filao Networks | Terms of Service';
$page_desc = 'Learn more about Terms of Service provided by Filao Networks Solutions across Kenya.';
$page_class = 'page-generic';
$root = '../';
include '../includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero-section" style="min-height:50vh; align-items:flex-end; padding-bottom:4rem;">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=1920&q=80');"></div>
    <div class="hero-overlay"></div>
    
    <div class="container-fluid px-4 hero-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-eyebrow">Legal & Compliance</div>
                <h1 class="hero-title" style="font-size:clamp(2.5rem, 6vw, 4.5rem);">
                    Terms of <span class="line-accent">Service</span>
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
            <h2 class="mb-4" style="color:var(--text-main); font-family:var(--font-heading);">Master Services Agreement</h2>
            <p style="color:var(--clr-steel); line-height:1.8;">Welcome to Filao Networks Solutions. This Terms of Service agreement ("Agreement") constitutes a legally binding contract between you ("Customer", "You", or "Your") and Filao Networks Solutions ("Filao", "We", "Us", or "Our"), a licensed Internet Service Provider operating under the Communications Authority of Kenya (CAK). By subscribing to or using our network, cloud, or security services, you agree to be bound by these terms.</p>
            
            <hr style="border-color:var(--clr-border); margin:3rem 0;">
            
            <h4 style="color:var(--text-main); margin-bottom:1rem;">1. Service Provision and Installation</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;"><strong>1.1 Subject to Survey:</strong> All service provisions are subject to a physical or remote site survey. Filao reserves the right to decline service provision if the location is deemed technically unfeasible or poses safety risks to our engineers.<br>
            <strong>1.2 Customer Premises Equipment (CPE):</strong> Any routers, ONTs, switches, or antennas provided by Filao during installation remain the exclusive property of Filao Networks unless explicitly sold to the Customer. The Customer is responsible for protecting CPE from physical damage, power surges, and unauthorized access.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">2. Billing, Payments, and Taxation</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;"><strong>2.1 Currency and VAT:</strong> All prices quoted are in Kenya Shillings (KES) and are exclusive of Value Added Tax (VAT) at the prevailing rate of 16%, unless otherwise stated.<br>
            <strong>2.2 Invoicing:</strong> Post-paid enterprise clients will receive invoices on the 1st of every month, payable within 14 days. Pre-paid residential and SME plans require payment prior to the commencement of the billing cycle.<br>
            <strong>2.3 Default and Suspension:</strong> Filao reserves the right to suspend services without prior notice if payments are not received by the due date. Reconnection fees may apply to restore suspended accounts.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">3. Limitation of Liability</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">To the maximum extent permitted by Kenyan law, Filao Networks shall not be liable for any indirect, incidental, special, consequential, or punitive damages, including but not limited to loss of profits, data, use, goodwill, or other intangible losses, resulting from (i) your access to or use of or inability to access or use the services; (ii) any conduct or content of any third party on the services; or (iii) unauthorized access, use, or alteration of your transmissions or content.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">4. Force Majeure</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Filao Networks shall not be held liable for any failure to perform its obligations under this Agreement if such failure results from circumstances beyond our reasonable control, including but not limited to acts of God, severe weather, vandalism of fiber optic cables, national power grid failures (KPLC outages exceeding our backup capacity), or government directives.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">5. Governing Law</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">This Agreement shall be governed by and construed in accordance with the laws of the Republic of Kenya. Any disputes arising out of or in connection with this Agreement shall be subject to the exclusive jurisdiction of the Kenyan courts.</p>

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
