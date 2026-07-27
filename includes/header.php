<?php
/**
 * Filao Networks Solutions   Header / Mega Menu
 * Include on every page: <?php include 'includes/header.php'; ?>
 *
 * $page_title  (string)   Set before including this file
 * $page_desc   (string)   Meta description
 * $page_class  (string)   Body class
 */

$page_title = $page_title ?? 'Filao Networks Solutions   Connecting Kenya at Speed';
$page_desc = $page_desc ?? 'Filao Networks Solutions provides enterprise-grade internet, networking, CCTV security, cloud, and IoT services across Kenya.';
$page_class = $page_class ?? '';

// Determine root path (for assets)
$root = '/filaoisp/';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
    <meta name="theme-color" content="#090238">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_desc) ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($page_desc) ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=1200&q=80">

    <!-- Canonical -->
    <link rel="canonical" href="https://filaonetworks.co.ke/">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $root ?>assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $root ?>assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $root ?>assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= $root ?>assets/images/favicon/site.webmanifest">
    <link rel="shortcut icon" href="<?= $root ?>assets/images/favicon/favicon.ico">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="<?= $root ?>assets/css/style.css">

    <!-- Preconnect to Google Fonts (already embedded via CSS @import) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Filao Networks Solutions",
        "url": "https://filaonetworks.co.ke",
        "logo": "https://filaonetworks.co.ke/assets/images/logo.png",
        "telephone": "+254757139239",
        "email": "info@filaoadventures.co.ke",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Ambank House",
            "addressLocality": "Nairobi",
            "addressCountry": "KE"
        },
        "sameAs": [
            "https://facebook.com/filaonetworks",
            "https://twitter.com/filaonetworks",
            "https://linkedin.com/company/filaonetworks"
        ]
    }
    </script>
</head>

<body class="<?= htmlspecialchars($page_class) ?>">
    <!-- Theme Loader Script (Prevents flash of wrong theme) -->
    <script>
        if (localStorage.getItem('filao_theme') === 'light') {
            document.body.classList.add('light-mode');
        }
    </script>

    <!-- =====================================================================
     PAGE LOADER
     ===================================================================== -->
    <div id="page-loader" aria-hidden="true">
        <!-- Logo in loader -->
        <img src="<?= $root ?>assets/images/logos/fn-logo-combined.png" alt="Filao Networks" style="height:120px; width:auto; filter: brightness(0) invert(1); margin-bottom: 20px;">
        <div class="loader-bar-wrap">
            <div class="loader-bar"></div>
        </div>
        <span class="loader-label">Loading&hellip;</span>
    </div>

    <!-- Mobile overlay backdrop -->
    <div id="mobile-overlay" class="mobile-overlay" aria-hidden="true"></div>

    <!-- =====================================================================
     MOBILE MENU (off-canvas)
     ===================================================================== -->
    <nav id="mobile-menu" class="mobile-menu" aria-label="Mobile navigation">
        <button id="mobile-close" class="mobile-menu-close" aria-label="Close menu">&times;</button>

        <!-- Logo in mobile menu -->
        <a href="<?= $root ?>" class="nav-logo mb-4 d-block" style="text-decoration:none;">
            <svg width="36" height="36" viewBox="0 0 80 80" fill="none">
                <polygon points="0,80 20,0 80,0 60,80" fill="#0b0175" />
                <polygon points="15,80 35,0 50,0 30,80" fill="#ec1c24" />
                <polygon points="35,80 55,0 60,0 40,80" fill="#090238" />
            </svg>
            <div>
                <div class="logo-wordmark">FILAO <span>NETWORKS</span></div>
                <div class="logo-tagline">Solutions</div>
            </div>
        </a>

        <ul style="list-style:none;padding:0;margin:0;">

            <!-- Internet Solutions -->
            <li class="mobile-nav-item">
                <div class="mobile-nav-link" data-toggle="mob-internet">
                    Internet Solutions
                    <svg class="chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" style="transition:transform 0.3s;">
                        <path d="M6 9l6 6 6-6" />
                    </svg>
                </div>
                <ul id="mob-internet" class="mobile-sub-menu">
                    <li><a href="<?= $root ?>services/internet-solutions.php" class="mobile-sub-link">Internet Solutions
                            Overview</a></li>
                    <li><a href="<?= $root ?>services/residential-fiber.php" class="mobile-sub-link">Residential
                            Fiber</a></li>
                    <li><a href="<?= $root ?>services/wireless-internet.php" class="mobile-sub-link">Wireless
                            Internet</a></li>
                    <li><a href="<?= $root ?>services/dedicated-internet.php" class="mobile-sub-link">Dedicated
                            Internet</a></li>
                    <li><a href="<?= $root ?>services/street-hotspots.php" class="mobile-sub-link">Street Hotspots</a>
                    </li>
                </ul>
            </li>

            <!-- Networking -->
            <li class="mobile-nav-item">
                <div class="mobile-nav-link" data-toggle="mob-network">
                    Networking
                    <svg class="chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M6 9l6 6 6-6" />
                    </svg>
                </div>
                <ul id="mob-network" class="mobile-sub-menu">
                    <li><a href="<?= $root ?>services/network-design.php" class="mobile-sub-link">Network Design &
                            Installation</a></li>
                    <li><a href="<?= $root ?>services/network-security.php" class="mobile-sub-link">Network Security</a>
                    </li>
                    <li><a href="<?= $root ?>services/managed-services.php" class="mobile-sub-link">Managed Network
                            Services</a></li>
                </ul>
            </li>

            <!-- Security -->
            <li class="mobile-nav-item">
                <div class="mobile-nav-link" data-toggle="mob-security">
                    Security
                    <svg class="chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M6 9l6 6 6-6" />
                    </svg>
                </div>
                <ul id="mob-security" class="mobile-sub-menu">
                    <li><a href="<?= $root ?>services/cctv-security.php" class="mobile-sub-link">CCTV & Security
                            Solutions</a></li>
                    <li><a href="<?= $root ?>services/smart-doorbell.php" class="mobile-sub-link">Smart Doorbell</a>
                    </li>
                    <li><a href="<?= $root ?>services/access-control.php" class="mobile-sub-link">Access Control</a>
                    </li>
                    <li><a href="<?= $root ?>services/biometric-fencing.php" class="mobile-sub-link">Biometric
                            Fencing</a></li>
                </ul>
            </li>

            <!-- Cloud & IoT -->
            <li class="mobile-nav-item">
                <div class="mobile-nav-link" data-toggle="mob-cloud">
                    Cloud & IoT
                    <svg class="chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M6 9l6 6 6-6" />
                    </svg>
                </div>
                <ul id="mob-cloud" class="mobile-sub-menu">
                    <li><a href="<?= $root ?>services/cloud-solutions.php" class="mobile-sub-link">Cloud Network
                            Solutions</a></li>
                    <li><a href="<?= $root ?>services/iot-integration.php" class="mobile-sub-link">IoT Integration</a>
                    </li>
                    <li><a href="<?= $root ?>services/disaster-recovery.php" class="mobile-sub-link">Disaster Recovery &
                            BC</a></li>
                </ul>
            </li>

            <!-- Company -->
            <li class="mobile-nav-item">
                <div class="mobile-nav-link" data-toggle="mob-company">
                    Company
                    <svg class="chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M6 9l6 6 6-6" />
                    </svg>
                </div>
                <ul id="mob-company" class="mobile-sub-menu">
                    <li><a href="<?= $root ?>company/about-us.php" class="mobile-sub-link">About Us</a></li>
                    <li><a href="<?= $root ?>company/careers.php" class="mobile-sub-link">Careers</a></li>
                    <li><a href="<?= $root ?>company/coverage-map.php" class="mobile-sub-link">Coverage Map</a></li>
                    <li><a href="<?= $root ?>company/support.php" class="mobile-sub-link">Support</a></li>
                    <li><a href="<?= $root ?>company/contact.php" class="mobile-sub-link">Contact Us</a></li>
                </ul>
            </li>
        </ul>

        <div style="margin-top:2rem;">
            <a href="<?= $root ?>company/contact.php" class="btn-filao btn-primary-filao d-block text-center"
                style="width:100%;">
                Get a Free Quote &rarr;
            </a>
        </div>

        <!-- Footer contacts inside mobile menu -->
        <div style="margin-top:2rem;padding-top:1.5rem;border-top:1px solid var(--clr-border);">
            <p style="font-size:0.75rem;color:var(--clr-steel);margin-bottom:0.4rem;"><i class="fa-solid fa-phone"></i>
                +254 757 139239</p>
            <p style="font-size:0.75rem;color:var(--clr-steel);margin-bottom:0.4rem;"><i
                    class="fa-solid fa-envelope"></i> info@filaoadventures.co.ke</p>
            <p style="font-size:0.75rem;color:var(--clr-steel);"><i class="fa-solid fa-location-dot"></i> Ambank House,
                Nairobi</p>
        </div>
    </nav>

    <!-- =====================================================================
     MAIN NAVBAR
     ===================================================================== -->
    <header id="main-navbar" role="banner">

        <!-- TOP UTILITY BAR -->
        <div class="navbar-top-bar">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <span class="top-contact">
                            <span><i class="fa-solid fa-phone"></i></span>
                            <a href="tel:+254757139239">+254 757 139239</a>
                        </span>
                        <span style="color:var(--clr-border);">|</span>
                        <span class="top-contact">
                            <span><i class="fa-solid fa-envelope"></i></span>
                            <a href="mailto:info@filaoadventures.co.ke">info@filaoadventures.co.ke</a>
                        </span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span style="font-size:0.75rem;color:var(--clr-steel);"><i class="fa-solid fa-location-dot"></i>
                            Ambank House, Nairobi, Kenya</span>
                        <span style="color:var(--clr-border);">|</span>
                        <div class="d-flex gap-2">
                            <a href="#" aria-label="Facebook"
                                style="color:var(--clr-steel);font-size:0.9rem;transition:color 0.2s"
                                onmouseover="this.style.color='#ec1c24'"
                                onmouseout="this.style.color='var(--clr-steel)'"><i
                                    class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" aria-label="X / Twitter"
                                style="color:var(--clr-steel);font-size:0.9rem;transition:color 0.2s"
                                onmouseover="this.style.color='#ec1c24'"
                                onmouseout="this.style.color='var(--clr-steel)'"><i
                                    class="fa-brands fa-x-twitter"></i></a>
                            <a href="#" aria-label="LinkedIn"
                                style="color:var(--clr-steel);font-size:0.9rem;transition:color 0.2s"
                                onmouseover="this.style.color='#ec1c24'"
                                onmouseout="this.style.color='var(--clr-steel)'"><i
                                    class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.navbar-top-bar -->

        <!-- MAIN NAV BAR -->
        <div class="container-fluid px-4">
            <div class="navbar-main-inner">

                <!-- LOGO -->
                <a href="<?= $root ?>" class="nav-logo" aria-label="Filao Networks Solutions home">
                    <img src="<?= $root ?>assets/images/logos/fn-logo.png" alt="Filao Logo Mark"
                        style="height:44px; width:auto;">
                    <img src="<?= $root ?>assets/images/logos/fn-logo-text.png" alt="Filao Networks Solutions"
                        style="height:28px; width:auto; margin-left:8px;">
                </a>

                <!-- DESKTOP NAV LINKS -->
                <ul class="nav-links" role="menubar" aria-label="Main navigation">

                    <!-- ① INTERNET SOLUTIONS -->
                    <li role="none">
                        <a href="<?= $root ?>services/internet-solutions.php" role="menuitem" aria-haspopup="true"
                            aria-expanded="false">
                            Internet
                            <svg class="nav-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </a>
                        <div class="mega-menu cols-4" role="menu">
                            <!-- Col 1: Overview -->
                            <div class="mega-col">
                                <div class="mega-col-header">Internet Solutions</div>
                                <a href="<?= $root ?>services/internet-solutions.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-globe"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Solutions Overview</div>
                                        <div class="mega-link-desc">All connectivity products</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>services/residential-fiber.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-house-signal"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Residential Fiber</div>
                                        <div class="mega-link-desc">100Mbps – 1Gbps home fiber</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>services/wireless-internet.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-satellite-dish"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Wireless Internet</div>
                                        <div class="mega-link-desc">Fixed wireless broadband</div>
                                    </div>
                                </a>
                            </div>
                            <!-- Col 2 -->
                            <div class="mega-col">
                                <div class="mega-col-header">Enterprise</div>
                                <a href="<?= $root ?>services/dedicated-internet.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-building"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Dedicated Internet</div>
                                        <div class="mega-link-desc">Uncontended leased lines, SLA-backed</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>services/street-hotspots.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-wifi"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Street Hotspots</div>
                                        <div class="mega-link-desc">Public Wi-Fi monetization</div>
                                    </div>
                                </a>
                            </div>
                            <!-- Col 3: Plans -->
                            <div class="mega-col">
                                <div class="mega-col-header">Quick Links</div>
                                <a href="<?= $root ?>company/coverage-map.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-map-location-dot"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Check Coverage</div>
                                        <div class="mega-link-desc">Is your area connected?</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>company/contact.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-comments"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Get a Quote</div>
                                        <div class="mega-link-desc">Free site survey</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>compliance/sla.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-clipboard-list"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">SLA Guarantee</div>
                                        <div class="mega-link-desc">99.9% uptime commitment</div>
                                    </div>
                                </a>
                            </div>
                            <!-- Col 4: Featured -->
                            <div class="mega-featured">
                                <div class="mega-featured-label">New</div>
                                <div class="mega-featured-title">1 Gbps<br>Fiber Now<br>in Nairobi</div>
                                <a href="<?= $root ?>services/residential-fiber.php"
                                    class="btn-filao btn-primary-filao">See Plans &rarr;</a>
                            </div>
                        </div>
                    </li>

                    <!-- ② NETWORKING -->
                    <li role="none">
                        <a href="<?= $root ?>services/network-design.php" role="menuitem" aria-haspopup="true">
                            Networking
                            <svg class="nav-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </a>
                        <div class="mega-menu cols-3" role="menu">
                            <div class="mega-col">
                                <div class="mega-col-header">Infrastructure</div>
                                <a href="<?= $root ?>services/network-design.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-wrench"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Network Design & Install</div>
                                        <div class="mega-link-desc">Structured cabling, LAN, WAN</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>services/network-security.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-shield-halved"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Network Security</div>
                                        <div class="mega-link-desc">Firewalls, VPN, intrusion prevention</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>services/managed-services.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-gears"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Managed Network Services</div>
                                        <div class="mega-link-desc">24/7 NOC monitoring & support</div>
                                    </div>
                                </a>
                            </div>
                            <div class="mega-col">
                                <div class="mega-col-header">Why Filao?</div>
                                <div style="padding:0.5rem 0;font-size:0.83rem;color:var(--clr-steel);line-height:1.7;">
                                    Certified Cisco, Mikrotik, and Ubiquiti engineers designing resilient, scalable
                                    networks for businesses of all sizes across Kenya.
                                </div>
                                <a href="<?= $root ?>company/about-us.php" class="mega-link mt-2" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-trophy"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Our Certifications</div>
                                        <div class="mega-link-desc">Cisco, CA-KE, ISO 27001</div>
                                    </div>
                                </a>
                            </div>
                            <div class="mega-featured" style="min-height:180px;">
                                <div class="mega-featured-label">Case Study</div>
                                <div class="mega-featured-title" style="font-size:1.2rem;">Enterprise LAN for<br>500+
                                    Users</div>
                                <a href="<?= $root ?>company/about-us.php" class="btn-filao btn-primary-filao"
                                    style="font-size:0.7rem;">Read More &rarr;</a>
                            </div>
                        </div>
                    </li>

                    <!-- ③ SECURITY -->
                    <li role="none">
                        <a href="<?= $root ?>services/cctv-security.php" role="menuitem" aria-haspopup="true">
                            Security
                            <svg class="nav-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </a>
                        <div class="mega-menu cols-4" role="menu">
                            <div class="mega-col">
                                <div class="mega-col-header">Surveillance</div>
                                <a href="<?= $root ?>services/cctv-security.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-video"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">CCTV Solutions</div>
                                        <div class="mega-link-desc">IP cameras, NVR, remote view</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>services/smart-doorbell.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-bell"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Smart Doorbell</div>
                                        <div class="mega-link-desc">Video intercom, remote unlock</div>
                                    </div>
                                </a>
                            </div>
                            <div class="mega-col">
                                <div class="mega-col-header">Access Control</div>
                                <a href="<?= $root ?>services/access-control.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-door-open"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Access Control</div>
                                        <div class="mega-link-desc">Card readers, boom barriers</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>services/biometric-fencing.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-hand-paper"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Biometric Fencing</div>
                                        <div class="mega-link-desc">Fingerprint, iris & face ID</div>
                                    </div>
                                </a>
                            </div>
                            <div class="mega-col">
                                <div class="mega-col-header">Get Started</div>
                                <a href="<?= $root ?>company/contact.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-phone"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Free Security Audit</div>
                                        <div class="mega-link-desc">On-site assessment</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>company/support.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-shield"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">24/7 Monitoring</div>
                                        <div class="mega-link-desc">SOC-as-a-service</div>
                                    </div>
                                </a>
                            </div>
                            <div class="mega-featured">
                                <div class="mega-featured-label">Featured</div>
                                <div class="mega-featured-title" style="font-size:1.2rem;">4K CCTV<br>from<br>Ksh 25K
                                </div>
                                <a href="<?= $root ?>services/cctv-security.php"
                                    class="btn-filao btn-primary-filao">View Packages &rarr;</a>
                            </div>
                        </div>
                    </li>

                    <!-- ④ CLOUD & IoT -->
                    <li role="none">
                        <a href="<?= $root ?>services/cloud-solutions.php" role="menuitem" aria-haspopup="true">
                            Cloud & IoT
                            <svg class="nav-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </a>
                        <div class="mega-menu cols-3" role="menu">
                            <div class="mega-col">
                                <div class="mega-col-header">Cloud</div>
                                <a href="<?= $root ?>services/cloud-solutions.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-cloud"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Cloud Network Solutions</div>
                                        <div class="mega-link-desc">SD-WAN, cloud connectivity</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>services/disaster-recovery.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-rotate"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Disaster Recovery</div>
                                        <div class="mega-link-desc">BCP, failover, backup links</div>
                                    </div>
                                </a>
                            </div>
                            <div class="mega-col">
                                <div class="mega-col-header">IoT</div>
                                <a href="<?= $root ?>services/iot-integration.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-plug"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">IoT Integration</div>
                                        <div class="mega-link-desc">Smart buildings & automation</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>services/managed-services.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-chart-simple"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Managed Services</div>
                                        <div class="mega-link-desc">Proactive network management</div>
                                    </div>
                                </a>
                            </div>
                            <div class="mega-featured" style="min-height:180px;">
                                <div class="mega-featured-label">New</div>
                                <div class="mega-featured-title" style="font-size:1.1rem;">Smart<br>Building<br>IoT Kits
                                </div>
                                <a href="<?= $root ?>services/iot-integration.php"
                                    class="btn-filao btn-primary-filao">Explore &rarr;</a>
                            </div>
                        </div>
                    </li>

                    <!-- ⑤ COMPANY -->
                    <li role="none">
                        <a href="<?= $root ?>company/about-us.php" role="menuitem" aria-haspopup="true">
                            Company
                            <svg class="nav-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </a>
                        <div class="mega-menu cols-2" role="menu" style="min-width:440px;">
                            <div class="mega-col">
                                <div class="mega-col-header">Company</div>
                                <a href="<?= $root ?>company/about-us.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-building"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">About Filao</div>
                                        <div class="mega-link-desc">Our story, mission, team</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>company/careers.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-briefcase"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Careers</div>
                                        <div class="mega-link-desc">Join our growing team</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>company/coverage-map.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-map-location-dot"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Coverage Map</div>
                                        <div class="mega-link-desc">Where we operate</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>company/support.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-headset"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Support Centre</div>
                                        <div class="mega-link-desc">Help desk & tickets</div>
                                    </div>
                                </a>
                                <a href="<?= $root ?>company/contact.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
                                    <div class="mega-link-text">
                                        <div class="mega-link-title">Contact Us</div>
                                        <div class="mega-link-desc">Sales, billing, tech support</div>
                                    </div>
                                </a>
                            </div>
                            <div class="mega-col">
                                <div class="mega-col-header">Legal & Compliance</div>
                                <a href="<?= $root ?>compliance/terms-of-service.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-title" style="font-size:0.83rem;">Terms of Service</div>
                                </a>
                                <a href="<?= $root ?>compliance/privacy-policy.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-title" style="font-size:0.83rem;">Privacy Policy</div>
                                </a>
                                <a href="<?= $root ?>compliance/refund-policy.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-title" style="font-size:0.83rem;">Refund Policy</div>
                                </a>
                                <a href="<?= $root ?>compliance/sla.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-title" style="font-size:0.83rem;">Service Level Agreement
                                    </div>
                                </a>
                                <a href="<?= $root ?>compliance/acceptable-use.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-title" style="font-size:0.83rem;">Acceptable Use Policy</div>
                                </a>
                                <a href="<?= $root ?>compliance/cookie-policy.php" class="mega-link" role="menuitem">
                                    <div class="mega-link-title" style="font-size:0.83rem;">Cookie Policy</div>
                                </a>
                            </div>
                        </div>
                    </li>

                    <!-- ⑥ BLOGS -->
                    <li role="none">
                        <a href="<?= $root ?>blogs/index.php" role="menuitem"
                            style="padding:1.5rem 1rem; color:#fff; text-decoration:none; font-weight:600; font-size:0.9rem; transition:color 0.2s;"
                            onmouseover="this.style.color='var(--clr-red)'" onmouseout="this.style.color='#fff'">
                            Blogs
                        </a>
                    </li>
                </ul><!-- /.nav-links -->
                <!-- THEME TOGGLE -->
                <button type="button" class="theme-toggle" id="themeToggle" aria-label="Toggle Light/Dark Mode">
                    <i class="fa-solid fa-moon"></i>
                </button>

                <!-- CTA BUTTON -->
                <a href="<?= $root ?>company/quote.php" class="nav-cta" aria-label="Get a free quote">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M20 12V22H4V12" />
                        <path d="M22 7H2v5h20V7z" />
                        <path d="M12 22V7" />
                        <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z" />
                        <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z" />
                    </svg>
                    Get a Quote
                </a>

                <!-- HAMBURGER (mobile) -->
                <button id="mobile-toggler" class="navbar-toggler ms-3 d-lg-none" aria-label="Open menu"
                    aria-expanded="false" aria-controls="mobile-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div><!-- /.navbar-main-inner -->
        </div><!-- /.container-fluid -->
    </header><!-- /#main-navbar -->

    <!-- Spacer so page content clears the fixed navbar -->
    <div style="height:var(--navbar-h);"></div>