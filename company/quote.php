<?php
$page_title = 'Filao Networks | Request a Quote';
$page_desc = 'Request a customized quotation for enterprise internet, networking, cloud, security, or IoT solutions from Filao Networks.';
$page_class = 'page-quote';
$root = '../';
include '../includes/header.php';
?>

<!-- HERO SECTION -->
<section class="hero-section" style="min-height:50vh; align-items:flex-end; padding-bottom:4rem;">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1920&q=80');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-slash"></div>
    <div class="hero-grid"></div>
    
    <div class="container-fluid px-4 hero-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-eyebrow">Get a Quote</div>
                <h1 class="hero-title" style="font-size:clamp(2.5rem, 6vw, 4.5rem);">
                    Tailored Solutions for <span class="line-accent">Your Business</span>
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
            <div style="background:var(--clr-bg-card); padding:3rem; border:1px solid var(--clr-border);">
                <div class="text-center mb-5">
                    <h2 class="section-title mb-3">Request a <span class="text-red">Quotation</span></h2>
                    <p class="section-desc mx-auto">Fill out the form below and our technical sales team will prepare a customized proposal tailored to your specific requirements.</p>
                </div>
                
                <form id="quote-form" data-validate action="<?= $root ?>api/process_quote.php" method="POST">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label text-steel" style="font-size:0.85rem; text-transform:uppercase; letter-spacing:0.1em;">Full Name *</label>
                            <input type="text" name="name" class="form-control" placeholder="Jane Doe" required style="background:#fff; border:1px solid var(--clr-border); color:var(--text-main); padding:1rem;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-steel" style="font-size:0.85rem; text-transform:uppercase; letter-spacing:0.1em;">Email Address *</label>
                            <input type="email" name="email" class="form-control" placeholder="jane@company.com" required style="background:#fff; border:1px solid var(--clr-border); color:var(--text-main); padding:1rem;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-steel" style="font-size:0.85rem; text-transform:uppercase; letter-spacing:0.1em;">Phone Number *</label>
                            <input type="tel" name="phone" class="form-control" placeholder="+254 7XX XXX XXX" required style="background:#fff; border:1px solid var(--clr-border); color:var(--text-main); padding:1rem;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-steel" style="font-size:0.85rem; text-transform:uppercase; letter-spacing:0.1em;">Company Name</label>
                            <input type="text" name="company" class="form-control" placeholder="Optional" style="background:#fff; border:1px solid var(--clr-border); color:var(--text-main); padding:1rem;">
                        </div>
                        <div class="col-12">
                            <label class="form-label text-steel" style="font-size:0.85rem; text-transform:uppercase; letter-spacing:0.1em;">Service Required *</label>
                            <select name="service" class="form-select" required style="background:#fff; border:1px solid var(--clr-border); color:var(--text-main); padding:1rem;">
                                <option value="" disabled selected>Select a service...</option>
                                <option value="Internet Solutions (Enterprise)">Internet Solutions (Enterprise)</option>
                                <option value="Residential Fiber">Residential Fiber</option>
                                <option value="Wireless Internet">Wireless Internet</option>
                                <option value="Dedicated Internet">Dedicated Internet</option>
                                <option value="Network Design & Installation">Network Design & Installation</option>
                                <option value="Network Security">Network Security</option>
                                <option value="Managed Network Services">Managed Network Services</option>
                                <option value="Cloud Network Solutions">Cloud Network Solutions</option>
                                <option value="CCTV & Security Solutions">CCTV & Security Solutions</option>
                                <option value="IoT Integration">IoT Integration</option>
                                <option value="Disaster Recovery">Disaster Recovery & Business Continuity</option>
                                <option value="Other">Other (Please specify in details)</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label text-steel" style="font-size:0.85rem; text-transform:uppercase; letter-spacing:0.1em;">Project Details *</label>
                            <textarea name="message" class="form-control" rows="6" placeholder="Please provide details about your project, location, and specific requirements..." required style="background:#fff; border:1px solid var(--clr-border); color:var(--text-main); padding:1rem;"></textarea>
                        </div>
                        <div class="col-12 mt-4 text-center">
                            <button type="submit" class="btn-filao btn-primary-filao px-5 py-3" style="font-size:1.1rem;">Submit Request <i class="fa-solid fa-arrow-right ms-2"></i></button>
                        </div>
                        <div id="quote-form-message" class="col-12 mt-3" style="display:none; font-size:1rem; padding:1rem; text-align:center; border:1px solid currentColor;"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    </div>
</main>

<?php include '../includes/footer.php'; ?>
