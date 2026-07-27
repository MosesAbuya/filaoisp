<?php
/**
 * Filao Networks Solutions   Footer
 * Include on every page: <?php include 'includes/footer.php'; ?>
 */
$root = $root ?? '/filaoisp/';
?>

<!-- =====================================================================
     COOKIE BANNER
     ===================================================================== -->
<div id="cookie-banner" style="
    position:fixed;
    bottom:0;left:0;right:0;
    background:rgba(9,2,56,0.97);
    border-top:2px solid var(--clr-red);
    backdrop-filter:blur(16px);
    padding:1.2rem 2rem;
    z-index:9990;
    display:flex;
    align-items:center;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:1rem;
    transform:translateY(120%);
    transition:transform 0.5s ease;
" aria-live="polite" role="alert">
    <p style="font-size:0.85rem;color:var(--clr-steel);margin:0;flex:1;min-width:220px;">
        <i class="fa-solid fa-cookie-bite" style="color:var(--clr-red);margin-right:0.5rem;"></i>
        We use cookies to enhance your experience. See our
        <a href="<?= $root ?>compliance/cookie-policy.php" style="color:var(--clr-red);">Cookie Policy</a> and
        <a href="<?= $root ?>compliance/privacy-policy.php" style="color:var(--clr-red);">Privacy Policy</a>.
    </p>
    <div style="display:flex;gap:0.8rem;flex-shrink:0;">
        <button id="cookie-accept" class="btn-filao btn-primary-filao"
            style="font-size:0.78rem;padding:0.55rem 1.4rem;">Accept All</button>
        <button id="cookie-decline" class="btn-ghost-filao" style="font-size:0.78rem;">Decline</button>
    </div>
</div>

<!-- =====================================================================
     SITE FOOTER
     ===================================================================== -->
<footer class="site-footer" aria-label="Site footer">

    <!-- ── PRE-FOOTER CTA STRIP ── -->
    <div class="footer-top">
        <div class="container-fluid px-5">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <div class="section-label mb-2">Ready to Connect?</div>
                    <h2 class="section-title mb-2">Fast. Secure. <span class="text-red">Reliable.</span></h2>
                    <p class="section-desc mb-0">Enterprise internet, networking, cloud, security &amp; IoT delivered
                        across Kenya with an iron-clad SLA.</p>
                </div>
                <div class="col-lg-4 d-flex flex-wrap gap-3 justify-content-lg-end">
                    <a href="<?= $root ?>company/quote.php" class="btn-filao btn-primary-filao">Get a Free Quote
                        &rarr;</a>
                    <a href="tel:+254757139239" class="btn-filao btn-outline-filao"><i
                            class="fa-solid fa-phone me-2"></i>Call Us</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ── MAIN COLUMNS ── -->
    <div class="footer-main">
        <div class="container-fluid px-5">
            <div class="row g-5">

                <!-- Brand + Socials -->
                <div class="col-xl-4 col-lg-4">
                    <a href="<?= $root ?>" class="nav-logo d-inline-flex mb-4 align-items-center"
                        aria-label="Filao Networks home" style="text-decoration:none;">
                        <img src="<?= $root ?>assets/images/logos/fn-logo.png" alt="Filao Logo Mark"
                            style="height:44px; width:auto;">
                        <img src="<?= $root ?>assets/images/logos/fn-logo-text.png" alt="Filao Networks Solutions"
                            style="height:28px; width:auto; margin-left:8px;">
                    </a>
                    <p class="footer-desc mb-4">
                        Kenya's premier provider of enterprise internet, networking, security, cloud, and IoT solutions
                        connecting businesses and homes across East Africa since 2010.
                    </p>
                    <!-- Social row -->
                    <div class="footer-socials">
                        <a href="#" class="social-icon" aria-label="Facebook"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="social-icon" aria-label="X / Twitter"><i
                                class="fa-brands fa-x-twitter"></i></a>
                        <a href="#" class="social-icon" aria-label="LinkedIn"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon" aria-label="Instagram"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="social-icon" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        <a href="https://wa.me/254757139239" class="social-icon" aria-label="WhatsApp" target="_blank"
                            rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                    <!-- Cert badge -->
                    <div
                        style="margin-top:1.8rem;padding:1rem 1.4rem;background:var(--clr-bg-card);border:1px solid var(--clr-border);border-left:3px solid var(--clr-red);display:flex;align-items:center;gap:1rem;">
                        <i class="fa-solid fa-shield-halved"
                            style="color:var(--clr-red);font-size:1.6rem;flex-shrink:0;"></i>
                        <div>
                            <div
                                style="font-size:0.7rem;color:var(--clr-red);text-transform:uppercase;letter-spacing:0.12em;font-weight:700;">
                                CA-KE Registered ISP</div>
                            <div style="font-size:0.8rem;color:var(--clr-steel);">Licensed &amp; compliant across Kenya
                                &amp; East Africa.</div>
                        </div>
                    </div>
                </div>

                <!-- Link columns: 3 equal columns using a nested row -->
                <div class="col-xl-8 col-lg-8">
                    <div class="row g-4">

                        <!-- Services -->
                        <div class="col-sm-4">
                            <div class="footer-col-title">Services</div>
                            <ul class="footer-links">
                                <li><a href="<?= $root ?>services/internet-solutions.php" class="footer-link">Internet
                                        Solutions</a></li>
                                <li><a href="<?= $root ?>services/residential-fiber.php" class="footer-link">Residential
                                        Fiber</a></li>
                                <li><a href="<?= $root ?>services/wireless-internet.php" class="footer-link">Wireless
                                        Internet</a></li>
                                <li><a href="<?= $root ?>services/dedicated-internet.php" class="footer-link">Dedicated
                                        Internet</a></li>
                                <li><a href="<?= $root ?>services/street-hotspots.php" class="footer-link">Street
                                        Hotspots</a></li>
                                <li><a href="<?= $root ?>services/network-design.php" class="footer-link">Network
                                        Design</a></li>
                                <li><a href="<?= $root ?>services/network-security.php" class="footer-link">Network
                                        Security</a></li>
                                <li><a href="<?= $root ?>services/managed-services.php" class="footer-link">Managed
                                        Services</a></li>
                                <li><a href="<?= $root ?>services/cloud-solutions.php" class="footer-link">Cloud
                                        Solutions</a></li>
                                <li><a href="<?= $root ?>services/cctv-security.php" class="footer-link">CCTV
                                        Security</a></li>
                                <li><a href="<?= $root ?>services/iot-integration.php" class="footer-link">IoT
                                        Integration</a></li>
                                <li><a href="<?= $root ?>services/disaster-recovery.php" class="footer-link">Disaster
                                        Recovery</a></li>
                            </ul>
                        </div>

                        <!-- Company -->
                        <div class="col-sm-4">
                            <div class="footer-col-title">Company</div>
                            <ul class="footer-links">
                                <li><a href="<?= $root ?>company/about-us.php" class="footer-link">About Us</a></li>
                                <li><a href="<?= $root ?>company/careers.php" class="footer-link">Careers</a></li>
                                <li><a href="<?= $root ?>company/coverage-map.php" class="footer-link">Coverage Map</a>
                                </li>
                                <li><a href="<?= $root ?>company/support.php" class="footer-link">Support Centre</a>
                                </li>
                                <li><a href="<?= $root ?>company/contact.php" class="footer-link">Contact Us</a></li>
                            </ul>
                            <div class="footer-col-title mt-4">Legal</div>
                            <ul class="footer-links">
                                <li><a href="<?= $root ?>compliance/terms-of-service.php" class="footer-link">Terms of
                                        Service</a></li>
                                <li><a href="<?= $root ?>compliance/privacy-policy.php" class="footer-link">Privacy
                                        Policy</a></li>
                                <li><a href="<?= $root ?>compliance/refund-policy.php" class="footer-link">Refund
                                        Policy</a></li>
                                <li><a href="<?= $root ?>compliance/sla.php" class="footer-link">SLA Agreement</a></li>
                                <li><a href="<?= $root ?>compliance/acceptable-use.php" class="footer-link">Acceptable
                                        Use</a></li>
                                <li><a href="<?= $root ?>compliance/cookie-policy.php" class="footer-link">Cookie
                                        Policy</a></li>
                                <li><a href="<?= $root ?>compliance/data-protection.php" class="footer-link">Data
                                        Protection</a></li>
                            </ul>
                        </div>

                        <!-- Contact + Newsletter -->
                        <div class="col-sm-4">
                            <div class="footer-col-title">Get In Touch</div>
                            <div class="d-flex flex-column gap-3 mb-4">
                                <div style="display:flex;align-items:flex-start;gap:1rem;">
                                    <div
                                        style="width:36px;height:36px;background:var(--clr-red-glow2);border:1px solid var(--clr-border);display:flex;align-items:center;justify-content:center;flex-shrink:0;clip-path:polygon(0 0,calc(100%-6px) 0,100% 100%,6px 100%);">
                                        <i class="fa-solid fa-phone"
                                            style="color:var(--clr-red);font-size:0.85rem;"></i>
                                    </div>
                                    <div>
                                        <div
                                            style="font-size:0.68rem;text-transform:uppercase;letter-spacing:0.1em;color:var(--clr-steel);">
                                            Call Us</div>
                                        <a href="tel:+254757139239" class="footer-link"
                                            style="font-size:0.92rem;font-weight:600;">+254 757 139239</a>
                                    </div>
                                </div>
                                <div style="display:flex;align-items:flex-start;gap:1rem;">
                                    <div
                                        style="width:36px;height:36px;background:var(--clr-red-glow2);border:1px solid var(--clr-border);display:flex;align-items:center;justify-content:center;flex-shrink:0;clip-path:polygon(0 0,calc(100%-6px) 0,100% 100%,6px 100%);">
                                        <i class="fa-solid fa-envelope"
                                            style="color:var(--clr-red);font-size:0.85rem;"></i>
                                    </div>
                                    <div>
                                        <div
                                            style="font-size:0.68rem;text-transform:uppercase;letter-spacing:0.1em;color:var(--clr-steel);">
                                            Email</div>
                                        <a href="mailto:info@filaoadventures.co.ke" class="footer-link"
                                            style="font-size:0.88rem;font-weight:600;">info@filaoadventures.co.ke</a>
                                    </div>
                                </div>
                                <div style="display:flex;align-items:flex-start;gap:1rem;">
                                    <div
                                        style="width:36px;height:36px;background:var(--clr-red-glow2);border:1px solid var(--clr-border);display:flex;align-items:center;justify-content:center;flex-shrink:0;clip-path:polygon(0 0,calc(100%-6px) 0,100% 100%,6px 100%);">
                                        <i class="fa-solid fa-location-dot"
                                            style="color:var(--clr-red);font-size:0.85rem;"></i>
                                    </div>
                                    <div>
                                        <div
                                            style="font-size:0.68rem;text-transform:uppercase;letter-spacing:0.1em;color:var(--clr-steel);">
                                            Office</div>
                                        <span style="color:#fff;font-size:0.9rem;font-weight:600;">Ambank House,
                                            Nairobi</span>
                                    </div>
                                </div>
                                <div style="display:flex;align-items:flex-start;gap:1rem;">
                                    <div
                                        style="width:36px;height:36px;background:var(--clr-red-glow2);border:1px solid var(--clr-border);display:flex;align-items:center;justify-content:center;flex-shrink:0;clip-path:polygon(0 0,calc(100%-6px) 0,100% 100%,6px 100%);">
                                        <i class="fa-solid fa-clock"
                                            style="color:var(--clr-red);font-size:0.85rem;"></i>
                                    </div>
                                    <div>
                                        <div
                                            style="font-size:0.68rem;text-transform:uppercase;letter-spacing:0.1em;color:var(--clr-steel);">
                                            Hours</div>
                                        <span style="color:#fff;font-size:0.9rem;font-weight:600;">Mon&ndash;Fri:
                                            8am&ndash;6pm EAT</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Newsletter -->
                            <div class="footer-col-title">Newsletter</div>
                            <p style="font-size:0.8rem;color:var(--clr-steel);margin:0.5rem 0 0.8rem;">Stay updated on
                                network upgrades &amp; new services.</p>
                            <form id="newsletter-form" data-validate style="display:flex;"
                                action="<?= $root ?>api/process_newsletter.php" method="post">
                                <input type="email" name="email" placeholder="Your email address" required
                                    style="flex:1;background:var(--clr-bg-card);border:1px solid var(--clr-border);border-right:none;padding:0.7rem 0.9rem;color:var(--clr-off-white);font-family:var(--font-body);font-size:0.83rem;outline:none;min-width:0;">
                                <button type="submit" class="btn-filao btn-primary-filao"
                                    style="clip-path:none;border-radius:0;white-space:nowrap;font-size:0.75rem;padding:0.7rem 1rem;flex-shrink:0;">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </form>
                            <div id="newsletter-message" style="display:none; font-size:0.8rem; margin-top:0.5rem;">
                            </div>
                            <p style="font-size:0.7rem;color:var(--clr-steel);margin-top:0.5rem;">
                                No spam. See our <a href="<?= $root ?>compliance/privacy-policy.php"
                                    style="color:var(--clr-red);">Privacy Policy</a>.
                            </p>
                        </div>

                    </div><!-- /.row link columns -->
                </div>

            </div><!-- /.row main -->
        </div>
    </div><!-- /.footer-main -->

    <!-- ── BOTTOM BAR ── -->
    <div style="border-top:1px solid var(--clr-border);">
        <div class="container-fluid px-5">
            <div class="footer-bottom">
                <div class="footer-bottom-text">
                    &copy; <?= date('Y') ?> <strong>Filao Networks Solutions</strong>. All rights reserved.
                    <span class="footer-dot"></span>Registered in Kenya<span class="footer-dot"></span>CA-KE Licensed
                    ISP
                </div>
                <div class="footer-bottom-links">
                    <a href="<?= $root ?>compliance/terms-of-service.php" class="footer-bottom-link">Terms</a>
                    <a href="<?= $root ?>compliance/privacy-policy.php" class="footer-bottom-link">Privacy</a>
                    <a href="<?= $root ?>compliance/sla.php" class="footer-bottom-link">SLA</a>
                    <a href="<?= $root ?>compliance/cookie-policy.php" class="footer-bottom-link">Cookies</a>
                </div>
            </div>
            <!-- Developer Credit -->
            <div style="text-align:center;padding:0.7rem 0 1rem;font-size:0.72rem;color:var(--clr-steel);">
                Developed by <a href="#"
                    style="color:var(--clr-red);font-weight:700;letter-spacing:0.03em;transition:opacity 0.2s;"
                    onmouseover="this.style.opacity='0.75'" onmouseout="this.style.opacity='1'">Vector 9
                    Technologies</a>
            </div>
        </div>
    </div>

    <!-- Gradient stripe -->
    <div style="height:4px;background:linear-gradient(90deg,var(--clr-navy),var(--clr-red),var(--clr-navy));"></div>

</footer>

<!-- Back to top -->
<button id="back-to-top" aria-label="Back to top">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <path d="M18 15l-6-6-6 6" />
    </svg>
</button>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="<?= $root ?>assets/js/main.js"></script>
</body>

</html>