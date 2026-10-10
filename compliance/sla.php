<?php
$page_title = 'Filao Networks | Service Level Agreement';
$page_desc = 'Learn more about Service Level Agreement provided by Filao Networks Solutions across Kenya.';
$page_class = 'page-generic';
$root = '../';
include '../includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero-section" style="min-height:50vh; align-items:flex-end; padding-bottom:4rem;">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=1920&q=80');"></div>
    <div class="hero-overlay"></div>
    
    <div class="container-fluid px-4 hero-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-eyebrow">Legal & Compliance</div>
                <h1 class="hero-title" style="font-size:clamp(2.5rem, 6vw, 4.5rem);">
                    Service Level <span class="line-accent">Agreement</span>
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
            <h2 class="mb-4" style="color:var(--text-main); font-family:var(--font-heading);">Service Level Agreement (SLA)</h2>
            <p style="color:var(--clr-steel); line-height:1.8;">This Service Level Agreement outlines our commitment to delivering high-availability network services to our Enterprise and Dedicated Internet clients. It defines our uptime guarantees, incident response times, and the compensation structure in the event we fall short of these targets.</p>
            
            <hr style="border-color:var(--clr-border); margin:3rem 0;">
            
            <h4 style="color:var(--text-main); margin-bottom:1rem;">1. Uptime Guarantee</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Filao Networks guarantees a network uptime of <strong>99.9%</strong> for Dedicated Internet Access (DIA) and Enterprise Cloud Solutions, measured over a calendar month. This uptime applies to our core network infrastructure and the connection up to the handoff point at the Customer Premises Equipment (CPE).</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">2. Incident Response and Resolution Times</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Our Network Operations Center (NOC) operates 24/7/365.<br>
            &bull; <strong>Severity 1 (Total Outage):</strong> Response within 15 minutes; Target Resolution within 4 hours.<br>
            &bull; <strong>Severity 2 (Severe Degradation):</strong> Response within 30 minutes; Target Resolution within 8 hours.<br>
            &bull; <strong>Severity 3 (Minor Issues/Queries):</strong> Response within 2 hours; Target Resolution within 24 hours.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">3. Scheduled Maintenance</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">To ensure network reliability, routine maintenance may be required. Filao Networks will provide a minimum of 48 hours' notice for any planned maintenance that may result in service interruption. Scheduled maintenance is typically performed during low-traffic windows (midnight to 5:00 AM EAT) and is excluded from downtime calculations.</p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">4. SLA Credits and Compensation</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">If we fail to meet the 99.9% uptime guarantee in a given month, eligible clients may request a Service Credit. Credits are calculated as a percentage of the monthly recurring charge (MRC) based on the total cumulative downtime:<br>
            &bull; 99.0% - 99.89%: 5% Credit<br>
            &bull; 95.0% - 98.99%: 10% Credit<br>
            &bull; Below 95.0%: 20% Credit<br>
            <em>Note: Credits must be requested within 14 days of the affected month and are applied to the next billing cycle.</em></p>

            <h4 style="color:var(--text-main); margin-bottom:1rem;">5. Exclusions</h4>
            <p style="color:var(--clr-steel); line-height:1.8; margin-bottom:1.5rem;">Downtime does not include outages resulting from: scheduled maintenance, force majeure events, issues within the customer's internal LAN, power failures at the customer's site, or actions taken by the customer that breach our Terms of Service.</p>

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
