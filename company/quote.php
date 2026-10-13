<?php
$page_title = "Request a Quote — Internet, CCTV & IT Solutions Kenya | Filao";
$page_desc = "Get a fast, transparent quote for home fiber, dedicated enterprise internet, 4K CCTV systems, or managed IT services from Filao Networks Solutions.";
$canonical_url = "https://filaonetworks.com/company/quote";
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
                            <label class="form-label text-steel" style="font-size:0.85rem; text-transform:uppercase; letter-spacing:0.1em;">Services Required (Select One or More) *</label>
                            <div class="dropdown custom-multiselect w-100">
                                <button class="form-control text-start d-flex justify-content-between align-items-center multiselect-toggle" type="button" id="quoteServicesDropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" style="background:#fff; border:1px solid var(--clr-border); color:var(--text-main); padding:1rem;">
                                    <span class="multiselect-label text-muted"><i class="fa-solid fa-layer-group text-danger me-2"></i> Select one or more services...</span>
                                    <i class="fa-solid fa-chevron-down text-muted small ms-2"></i>
                                </button>
                                <ul class="dropdown-menu w-100 p-2 shadow-lg border-0 multiselect-menu" aria-labelledby="quoteServicesDropdown" style="max-height: 290px; overflow-y: auto; border-radius: 8px; z-index: 1050; border: 1px solid #e2e8f0 !important;">
                                    <li class="px-2 py-1 mb-2 border-bottom d-flex justify-content-between align-items-center">
                                        <span class="small fw-bold text-muted" style="font-size:0.75rem; text-transform:uppercase;">Select Multiple Services</span>
                                        <button type="button" class="btn btn-link btn-sm text-decoration-none p-0 multiselect-clear-btn" style="font-size:0.75rem; color:var(--clr-red);">Clear all</button>
                                    </li>
                                    <li><label class="dropdown-item d-flex align-items-center gap-2 py-2 rounded cursor-pointer"><input type="checkbox" class="form-check-input mt-0 multiselect-check" value="Internet Solutions (Enterprise)"> <span>Internet Solutions (Enterprise)</span></label></li>
                                    <li><label class="dropdown-item d-flex align-items-center gap-2 py-2 rounded cursor-pointer"><input type="checkbox" class="form-check-input mt-0 multiselect-check" value="Residential Fiber"> <span>Residential Fiber</span></label></li>
                                    <li><label class="dropdown-item d-flex align-items-center gap-2 py-2 rounded cursor-pointer"><input type="checkbox" class="form-check-input mt-0 multiselect-check" value="Wireless Internet"> <span>Wireless Internet</span></label></li>
                                    <li><label class="dropdown-item d-flex align-items-center gap-2 py-2 rounded cursor-pointer"><input type="checkbox" class="form-check-input mt-0 multiselect-check" value="Dedicated Internet"> <span>Dedicated Internet</span></label></li>
                                    <li><label class="dropdown-item d-flex align-items-center gap-2 py-2 rounded cursor-pointer"><input type="checkbox" class="form-check-input mt-0 multiselect-check" value="Network Design & Installation"> <span>Network Design &amp; Installation</span></label></li>
                                    <li><label class="dropdown-item d-flex align-items-center gap-2 py-2 rounded cursor-pointer"><input type="checkbox" class="form-check-input mt-0 multiselect-check" value="Network Security"> <span>Network Security</span></label></li>
                                    <li><label class="dropdown-item d-flex align-items-center gap-2 py-2 rounded cursor-pointer"><input type="checkbox" class="form-check-input mt-0 multiselect-check" value="Managed Network Services"> <span>Managed Network Services</span></label></li>
                                    <li><label class="dropdown-item d-flex align-items-center gap-2 py-2 rounded cursor-pointer"><input type="checkbox" class="form-check-input mt-0 multiselect-check" value="Cloud Network Solutions"> <span>Cloud Network Solutions</span></label></li>
                                    <li><label class="dropdown-item d-flex align-items-center gap-2 py-2 rounded cursor-pointer"><input type="checkbox" class="form-check-input mt-0 multiselect-check" value="CCTV & Security Solutions"> <span>CCTV &amp; Security Solutions</span></label></li>
                                    <li><label class="dropdown-item d-flex align-items-center gap-2 py-2 rounded cursor-pointer"><input type="checkbox" class="form-check-input mt-0 multiselect-check" value="IoT Integration"> <span>IoT Integration</span></label></li>
                                    <li><label class="dropdown-item d-flex align-items-center gap-2 py-2 rounded cursor-pointer"><input type="checkbox" class="form-check-input mt-0 multiselect-check" value="Disaster Recovery & Business Continuity"> <span>Disaster Recovery &amp; Business Continuity</span></label></li>
                                    <li><label class="dropdown-item d-flex align-items-center gap-2 py-2 rounded cursor-pointer"><input type="checkbox" class="form-check-input mt-0 multiselect-check" value="Other"> <span>Other (Specify in project details)</span></label></li>
                                </ul>
                            </div>
                            <div class="multiselect-badges-container d-flex flex-wrap gap-2 mt-2"></div>
                            <input type="hidden" name="service" class="multiselect-hidden-input" required value="">
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


