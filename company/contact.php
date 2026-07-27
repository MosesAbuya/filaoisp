<?php
$page_title = 'Filao Networks | Contact Us';
$page_desc = 'Learn more about Contact Us provided by Filao Networks Solutions across Kenya.';
$page_class = 'page-contact';
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
                <div class="hero-eyebrow">Contact Us</div>
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

    <div class="row g-5">
        <div class="col-lg-4">
            <div class="section-label mb-3"><i class="fa-solid fa-headset"></i> Get In Touch</div>
            <h2 class="section-title mb-4">Contact <span class="text-red">Filao</span></h2>
            <p class="section-desc mb-5">Our technical sales team is ready to design your next network.</p>
            
            <div class="mb-4 p-4" style="background:var(--clr-bg-card); border-left:4px solid var(--clr-red);">
                <div style="font-size:1.5rem; color:var(--clr-red); margin-bottom:1rem;"><i class="fa-solid fa-location-dot"></i></div>
                <h4 style="color:#fff; font-size:1.1rem; margin-bottom:0.5rem;">Our Office</h4>
                <p style="color:var(--clr-steel); margin:0;">Ambank House, Nairobi, Kenya<br>East Africa</p>
            </div>
            
            <div class="mb-4 p-4" style="background:var(--clr-bg-card); border-left:4px solid var(--clr-red);">
                <div style="font-size:1.5rem; color:var(--clr-red); margin-bottom:1rem;"><i class="fa-solid fa-phone"></i></div>
                <h4 style="color:#fff; font-size:1.1rem; margin-bottom:0.5rem;">Call Us</h4>
                <p style="color:var(--clr-steel); margin:0;">+254 757 139239<br>Mon - Fri: 8am to 6pm (EAT)</p>
            </div>
            
            <div class="mb-4 p-4" style="background:var(--clr-bg-card); border-left:4px solid var(--clr-red);">
                <div style="font-size:1.5rem; color:var(--clr-red); margin-bottom:1rem;"><i class="fa-solid fa-envelope"></i></div>
                <h4 style="color:#fff; font-size:1.1rem; margin-bottom:0.5rem;">Email Us</h4>
                <p style="color:var(--clr-steel); margin:0;">info@filaoadventures.co.ke</p>
            </div>
        </div>
        
        <div class="col-lg-8">
            <div style="background:var(--clr-bg-card); padding:3rem; border:1px solid var(--clr-border);">
                <h3 class="mb-4" style="color:#fff; font-family:var(--font-heading);">Send a Message</h3>
                <form id="contact-form" data-validate action="../api/process_contact.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required style="background:var(--clr-bg-dark); border:1px solid var(--clr-border); color:#fff; padding:1rem;">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required style="background:var(--clr-bg-dark); border:1px solid var(--clr-border); color:#fff; padding:1rem;">
                        </div>
                        <div class="col-12">
                            <input type="text" name="subject" class="form-control" placeholder="Subject" required style="background:var(--clr-bg-dark); border:1px solid var(--clr-border); color:#fff; padding:1rem;">
                        </div>
                        <div class="col-12">
                            <textarea name="message" class="form-control" rows="5" placeholder="How can we help you?" required style="background:var(--clr-bg-dark); border:1px solid var(--clr-border); color:#fff; padding:1rem;"></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn-filao btn-primary-filao w-100 justify-content-center">Send Message <i class="fa-solid fa-paper-plane ms-2"></i></button>
                        </div>
                        <div id="contact-form-message" class="col-12 mt-2" style="display:none; font-size:0.9rem; padding:0.5rem; text-align:center;"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="row mt-5 pt-5">
        <div class="col-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.819806677223!2d36.816283899999995!3d-1.2818793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d2584a97d9%3A0xabe14f09fb8a34a0!2sAmbank%20House!5e0!3m2!1sen!2ske!4v1784852678572!5m2!1sen!2ske" width="100%" height="500" style="border:0; filter: grayscale(80%) invert(90%) hue-rotate(180deg);" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
    </div>

    </div>
</main>

<!-- CALL TO ACTION -->
<section style="background:var(--clr-deep); padding:5rem 0; text-align:center; border-top:1px solid var(--clr-border);">
    <div class="container">
        <h2 class="section-title mb-4">Ready to Upgrade?</h2>
        <p class="section-desc mx-auto mb-5">Contact our technical team for a free site survey and specialized quote tailored to your exact requirements.</p>
        <a href="<?= $root ?>company/quote.php" class="btn-filao btn-primary-filao">Get a Free Quote &rarr;</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
