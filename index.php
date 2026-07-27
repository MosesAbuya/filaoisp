<?php
/**
 * Filao Networks Solutions   Homepage
 * Phase 1: index.php
 */

$page_title = 'Filao Networks Solutions   Connecting Kenya at Speed';
$page_desc  = 'Filao Networks Solutions offers enterprise-grade fiber internet, networking, CCTV security, cloud, and IoT solutions across Kenya. Request a free quote today.';
$script_name = $_SERVER['SCRIPT_NAME'] ?? '';
$root = (strpos($script_name, '/filaoisp/') === 0) ? '/filaoisp/' : '/';

include 'includes/db_connect.php';
include 'includes/header.php';
?>

<!-- =====================================================================
     SECTION 1: HERO
     ===================================================================== -->
<section class="hero-section" id="home" aria-label="Hero">
    <div class="hero-bg" aria-hidden="true"></div>
    <div class="hero-overlay" aria-hidden="true"></div>
    <div class="hero-grid"   aria-hidden="true"></div>
    <div class="hero-slash"  aria-hidden="true"></div>

    <div class="container-fluid px-4 py-5" style="position:relative;z-index:2;">
        <div class="row align-items-center g-5" style="min-height:calc(100vh - var(--navbar-h));">

            <!-- Left: Content -->
            <div class="col-lg-6 col-xl-5">
                <div class="hero-eyebrow">
                    Kenya's Fastest Growing ISP
                </div>
                <h1 class="hero-title reveal">
                    <span class="line-accent">Speed.</span><br>
                    Security.<br>
                    <span class="line-outline">Uptime.</span>
                </h1>
                <p class="hero-subtitle reveal delay-1">
                    Enterprise-grade internet, networking, CCTV security, cloud, and IoT solutions   engineered for businesses and homes across Kenya.
                </p>
                <div class="hero-cta-group reveal delay-2">
                    <a href="<?= $root ?>company/quote" class="btn-filao btn-primary-filao" id="hero-quote-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        Get a Free Quote
                    </a>
                    <a href="<?= $root ?>company/coverage-map" class="btn-filao btn-outline-filao" id="hero-coverage-btn">
                        Check Coverage
                    </a>
                </div>

                <!-- Hero stats -->
                <div class="hero-stats reveal delay-3">
                    <div class="hero-stat">
                        <div class="hero-stat-num">
                            <span data-counter data-target="1500" data-suffix="+">0+</span>
                        </div>
                        <div class="hero-stat-label">Business Clients</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-num">
                            <span data-counter data-target="99" data-suffix=".9%">0%</span>
                        </div>
                        <div class="hero-stat-label">Uptime SLA</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-num">
                            <span data-counter data-target="15" data-suffix="yrs">0</span>
                        </div>
                        <div class="hero-stat-label">Years Experience</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-num">
                            <span data-counter data-target="47" data-suffix="+">0+</span>
                        </div>
                        <div class="hero-stat-label">Counties Covered</div>
                    </div>
                </div>
            </div><!-- /col left -->

            <!-- Right: Hero Image -->
            <div class="col-lg-6 col-xl-7 d-none d-lg-block hero-image-wrap" aria-hidden="true">
                <img
                    src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=1200&q=80"
                    alt="Fiber optic data center infrastructure"
                    class="hero-img-main reveal-right"
                    loading="eager"
                    width="900" height="700"
                >
                <div class="hero-img-badge">
                    <div class="badge-num">1Gbps</div>
                    <div class="badge-label">Fiber Speed</div>
                </div>
            </div>

        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="scroll-indicator" aria-hidden="true" onclick="document.getElementById('ticker').scrollIntoView({behavior:'smooth'})">
        <div class="scroll-mouse"></div>
        <span>Scroll</span>
    </div>
</section><!-- /hero -->


<!-- =====================================================================
     SECTION 2: TICKER BAR
     ===================================================================== -->
<div class="ticker-bar" id="ticker" aria-label="Highlights ticker" aria-hidden="true">
    <div class="ticker-track">
        <span class="ticker-item">✔ CA-KE Licensed ISP</span>
        <span class="ticker-item">🔥 1Gbps Fiber Available</span>
        <span class="ticker-item"><i class="fa-solid fa-trophy"></i> Best ISP Kenya 2024</span>
        <span class="ticker-item"><i class="fa-solid fa-satellite-dish"></i> Nationwide Coverage</span>
        <span class="ticker-item"><i class="fa-solid fa-shield-halved"></i> ISO 27001 Certified</span>
        <span class="ticker-item"><i class="fa-solid fa-bolt"></i> 24/7 Network Monitoring</span>
        <span class="ticker-item"><i class="fa-solid fa-cloud"></i> Cloud-Ready Infrastructure</span>
        <span class="ticker-item"><i class="fa-solid fa-rocket"></i> Same-Day Installation</span>
        <span class="ticker-item"><i class="fa-solid fa-video"></i> 4K CCTV Solutions</span>
        <span class="ticker-item"><i class="fa-solid fa-hand-paper"></i> Biometric Security Systems</span>
        <span class="ticker-item"><i class="fa-solid fa-plug"></i> IoT Smart Building Kits</span>
        <span class="ticker-item"><i class="fa-solid fa-shield"></i> 99.9% Uptime SLA</span>
    </div>
</div>


<!-- =====================================================================
     SECTION 3: SERVICES OVERVIEW
     ===================================================================== -->
<section class="section-py" id="services" style="background:var(--clr-bg-dark);">
    <div class="container-fluid px-4">

        <div class="section-header">
            <div>
                <div class="label-with-line">
                    <span class="section-label">What We Do</span>
                </div>
                <h2 class="section-title">
                    Complete Technology<br><span class="text-red">Solutions</span> for Kenya
                </h2>
            </div>
            <div>
                <p class="section-desc">
                    From lightning-fast fiber internet to intelligent CCTV security and IoT integration   one partner for all your technology needs.
                </p>
                <a href="<?= $root ?>services/internet-solutions" class="btn-ghost-filao mt-3 d-inline-block">View All Services &rarr;</a>
            </div>
        </div>

        <div class="services-grid">

            <!-- 1: Internet Solutions -->
            <div class="service-card reveal delay-1">
                <span class="service-num">01</span>
                <div style="overflow:hidden;height:200px;">
                    <img src="https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=600&q=70"
                         alt="Internet fiber network cables"
                         class="service-card-img" loading="lazy">
                </div>
                <div class="service-card-body">
                    <div class="service-card-icon"><i class="fa-solid fa-globe"></i></div>
                    <h3 class="service-card-title">Internet Solutions</h3>
                    <p class="service-card-desc">Residential fiber, wireless, dedicated leased lines, and street hotspot infrastructure for homes and enterprises.</p>
                    <a href="<?= $root ?>services/internet-solutions" class="service-card-link">
                        Learn More
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- 2: Network Design -->
            <div class="service-card reveal delay-2">
                <span class="service-num">02</span>
                <div style="overflow:hidden;height:200px;">
                    <img src="https://images.unsplash.com/photo-1551703599-6b3e8379aa8c?w=600&q=70"
                         alt="Network rack server room design"
                         class="service-card-img" loading="lazy">
                </div>
                <div class="service-card-body">
                    <div class="service-card-icon"><i class="fa-solid fa-wrench"></i></div>
                    <h3 class="service-card-title">Network Design & Installation</h3>
                    <p class="service-card-desc">Structured cabling, LAN/WAN design, server room setup, and wireless deployment by certified Cisco engineers.</p>
                    <a href="<?= $root ?>services/network-design" class="service-card-link">
                        Learn More
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- 3: Network Security -->
            <div class="service-card reveal delay-3">
                <span class="service-num">03</span>
                <div style="overflow:hidden;height:200px;">
                    <img src="https://images.unsplash.com/photo-1614064641938-3bbee52942c7?w=600&q=70"
                         alt="Network security firewall protection"
                         class="service-card-img" loading="lazy">
                </div>
                <div class="service-card-body">
                    <div class="service-card-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3 class="service-card-title">Network Security</h3>
                    <p class="service-card-desc">Next-gen firewalls, VPN, intrusion detection, and penetration testing to protect your critical infrastructure.</p>
                    <a href="<?= $root ?>services/network-security" class="service-card-link">
                        Learn More
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- 4: Managed Services -->
            <div class="service-card reveal delay-4">
                <span class="service-num">04</span>
                <div style="overflow:hidden;height:200px;">
                    <img src="https://images.unsplash.com/photo-1560732488-6b0df240254a?w=600&q=70"
                         alt="NOC network operations center monitoring"
                         class="service-card-img" loading="lazy">
                </div>
                <div class="service-card-body">
                    <div class="service-card-icon"><i class="fa-solid fa-gears"></i></div>
                    <h3 class="service-card-title">Managed Network Services</h3>
                    <p class="service-card-desc">24/7 NOC monitoring, proactive maintenance, helpdesk support, and SLA-backed managed network operations.</p>
                    <a href="<?= $root ?>services/managed-services" class="service-card-link">
                        Learn More
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- 5: Cloud -->
            <div class="service-card reveal delay-1">
                <span class="service-num">05</span>
                <div style="overflow:hidden;height:200px;">
                    <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&q=70"
                         alt="Cloud network infrastructure data center"
                         class="service-card-img" loading="lazy">
                </div>
                <div class="service-card-body">
                    <div class="service-card-icon"><i class="fa-solid fa-cloud"></i></div>
                    <h3 class="service-card-title">Cloud Network Solutions</h3>
                    <p class="service-card-desc">SD-WAN, cloud connectivity, hybrid infrastructure, and multi-cloud network architecture for modern businesses.</p>
                    <a href="<?= $root ?>services/cloud-solutions" class="service-card-link">
                        Learn More
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- 6: CCTV -->
            <div class="service-card reveal delay-2">
                <span class="service-num">06</span>
                <div style="overflow:hidden;height:200px;">
                    <img src="https://images.unsplash.com/photo-1557597774-9d273605dfa9?w=600&q=70"
                         alt="CCTV surveillance security camera installation"
                         class="service-card-img" loading="lazy">
                </div>
                <div class="service-card-body">
                    <div class="service-card-icon"><i class="fa-solid fa-video"></i></div>
                    <h3 class="service-card-title">CCTV & Security Solutions</h3>
                    <p class="service-card-desc">4K IP cameras, NVR systems, smart doorbells, access control, and biometric fencing for homes and enterprises.</p>
                    <a href="<?= $root ?>services/cctv-security" class="service-card-link">
                        Learn More
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- 7: IoT -->
            <div class="service-card reveal delay-3">
                <span class="service-num">07</span>
                <div style="overflow:hidden;height:200px;">
                    <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=70"
                         alt="IoT smart devices technology integration"
                         class="service-card-img" loading="lazy">
                </div>
                <div class="service-card-body">
                    <div class="service-card-icon"><i class="fa-solid fa-plug"></i></div>
                    <h3 class="service-card-title">IoT Integration</h3>
                    <p class="service-card-desc">Smart building automation, environmental sensors, energy monitoring, and connected device management platforms.</p>
                    <a href="<?= $root ?>services/iot-integration" class="service-card-link">
                        Learn More
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- 8: Disaster Recovery -->
            <div class="service-card reveal delay-4">
                <span class="service-num">08</span>
                <div style="overflow:hidden;height:200px;">
                    <img src="https://images.unsplash.com/photo-1600267185393-1b14dbc5e4fb?w=600&q=70"
                         alt="Disaster recovery business continuity backup"
                         class="service-card-img" loading="lazy">
                </div>
                <div class="service-card-body">
                    <div class="service-card-icon"><i class="fa-solid fa-rotate"></i></div>
                    <h3 class="service-card-title">Disaster Recovery & BC</h3>
                    <p class="service-card-desc">Business continuity planning, redundant failover links, data backup, and rapid recovery solutions with tested RPO/RTO.</p>
                    <a href="<?= $root ?>services/disaster-recovery" class="service-card-link">
                        Learn More
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section><!-- /services -->


<!-- =====================================================================
     SECTION 4: WHY CHOOSE FILAO   Stats + Features
     ===================================================================== -->
<section class="section-py why-section angle-bottom angle-top" id="why-us">
    <div class="container-fluid px-4">

        <!-- Stats row -->
        <div class="row g-3 mb-5">
            <div class="col-12 text-center mb-3">
                <div class="label-with-line justify-content-center">
                    <span class="section-label">Why Filao Networks</span>
                </div>
                <h2 class="section-title mt-2">The Numbers <span class="text-red">Speak</span></h2>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card reveal delay-1 text-center">
                    <div class="stat-num-display">
                        <span data-counter data-target="1500" data-suffix="+">0</span>
                    </div>
                    <div class="stat-label">Business Clients</div>
                    <p class="stat-desc">SMEs, corporates & government agencies</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card reveal delay-2 text-center">
                    <div class="stat-num-display">
                        <span data-counter data-target="99" data-suffix=".9%">0</span>
                    </div>
                    <div class="stat-label">Uptime Guarantee</div>
                    <p class="stat-desc">SLA-backed with financial credits</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card reveal delay-3 text-center">
                    <div class="stat-num-display">
                        <span data-counter data-target="47" data-suffix="+">0</span>
                    </div>
                    <div class="stat-label">Counties Served</div>
                    <p class="stat-desc">National footprint, growing daily</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card reveal delay-4 text-center">
                    <div class="stat-num-display">
                        <span data-counter data-target="15" data-suffix="yrs">0</span>
                    </div>
                    <div class="stat-label">Years Experience</div>
                    <p class="stat-desc">Deep expertise in Kenya's tech landscape</p>
                </div>
            </div>
        </div>

        <!-- Features split -->
        <div class="row g-5 align-items-center mt-2">
            <div class="col-lg-6 reveal-left">
                <div class="label-with-line">
                    <span class="section-label">Our Advantage</span>
                </div>
                <h2 class="section-title mt-2 mb-4">
                    Built for <span class="text-red">Enterprise.</span><br>
                    Priced for Everyone.
                </h2>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-bolt"></i></div>
                    <div class="feature-content">
                        <h4>Fastest Response Times</h4>
                        <p>Our field engineers respond within 2 hours for critical incidents, with a dedicated escalation path available 24/7.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <div class="feature-content">
                        <h4>Security-First Architecture</h4>
                        <p>Every solution is designed with zero-trust security principles. ISO 27001 processes, end-to-end encryption.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">📈</div>
                    <div class="feature-content">
                        <h4>Scalable Infrastructure</h4>
                        <p>Start small and scale with confidence. Our network grows with your business   no rip-and-replace.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-handshake"></i></div>
                    <div class="feature-content">
                        <h4>Dedicated Account Management</h4>
                        <p>Every enterprise client gets a named account manager, quarterly reviews, and a proactive technology roadmap.</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="<?= $root ?>company/about-us" class="btn-filao btn-primary-filao">
                        About Our Company &rarr;
                    </a>
                </div>
            </div>
            <div class="col-lg-6 reveal-right">
                <div style="position:relative;">
                    <img
                        src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&q=75"
                        alt="Filao Networks team working in NOC operations center"
                        loading="lazy"
                        style="width:100%;clip-path:polygon(0 0,100% 0,100% 88%,8% 100%);box-shadow:0 20px 60px rgba(0,0,0,0.5);"
                    >
                    <!-- Floating stat badge -->
                    <div style="position:absolute;bottom:-20px;right:2rem;background:var(--clr-red);padding:1.2rem 1.5rem;clip-path:polygon(0 0,calc(100% - 12px) 0,100% 100%,12px 100%);text-align:center;">
                        <div style="font-family:var(--font-display);font-weight:900;font-size:2.2rem;line-height:1;">24/7</div>
                        <div style="font-size:0.7rem;text-transform:uppercase;letter-spacing:0.12em;opacity:0.9;">NOC Monitoring</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section><!-- /why-us -->


<!-- =====================================================================
     SECTION 5: INTERNET PLANS
     ===================================================================== -->
<section class="section-py plans-section" id="plans">
    <div class="container-fluid px-4">
        <div class="section-header">
            <div>
                <div class="label-with-line">
                    <span class="section-label">Internet Plans</span>
                </div>
                <h2 class="section-title mt-2">
                    Fiber Packages<br>for Every <span class="text-red">Need</span>
                </h2>
            </div>
            <div>
                <p class="section-desc">Transparent pricing. No hidden fees. All plans include free installation and a 30-day satisfaction guarantee.</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Home Basic -->
            <div class="col-xl-3 col-md-6">
                <div class="plan-card reveal delay-1" style="height:100%;">
                    <div class="plan-type">Residential</div>
                    <div class="plan-name">Home Basic</div>
                    <div class="plan-speed">20<span class="plan-speed-unit">Mbps</span></div>
                    <div class="plan-price-row">
                        <span class="plan-currency">KSh</span>
                        <span class="plan-amount">2,499</span>
                        <span class="plan-period">/month</span>
                    </div>
                    <ul class="plan-features">
                        <li class="plan-feature included"><span class="check">▶</span> 20Mbps Download</li>
                        <li class="plan-feature included"><span class="check">▶</span> 10Mbps Upload</li>
                        <li class="plan-feature included"><span class="check">▶</span> Unlimited Data</li>
                        <li class="plan-feature included"><span class="check">▶</span> Free Router</li>
                        <li class="plan-feature included"><span class="check">▶</span> Email Support</li>
                        <li class="plan-feature" style="opacity:0.4;"><span class="check"> </span> Static IP</li>
                        <li class="plan-feature" style="opacity:0.4;"><span class="check"> </span> SLA Guarantee</li>
                    </ul>
                    <a href="<?= $root ?>company/quote" class="btn-ghost-filao" style="width:100%;text-align:center;display:block;">Get Started</a>
                </div>
            </div>

            <!-- Home Pro (featured) -->
            <div class="col-xl-3 col-md-6">
                <div class="plan-card featured reveal delay-2" style="height:100%;">
                    <div class="plan-type">Residential</div>
                    <div class="plan-name">Home Pro</div>
                    <div class="plan-speed">100<span class="plan-speed-unit">Mbps</span></div>
                    <div class="plan-price-row">
                        <span class="plan-currency">KSh</span>
                        <span class="plan-amount">4,999</span>
                        <span class="plan-period">/month</span>
                    </div>
                    <ul class="plan-features">
                        <li class="plan-feature included"><span class="check">▶</span> 100Mbps Download</li>
                        <li class="plan-feature included"><span class="check">▶</span> 50Mbps Upload</li>
                        <li class="plan-feature included"><span class="check">▶</span> Unlimited Data</li>
                        <li class="plan-feature included"><span class="check">▶</span> Free Router + ONT</li>
                        <li class="plan-feature included"><span class="check">▶</span> Priority Support</li>
                        <li class="plan-feature included"><span class="check">▶</span> Static IP (optional)</li>
                        <li class="plan-feature" style="opacity:0.4;"><span class="check"> </span> Enterprise SLA</li>
                    </ul>
                    <a href="<?= $root ?>company/quote" class="btn-filao btn-primary-filao" style="width:100%;text-align:center;justify-content:center;">Get Started</a>
                </div>
            </div>

            <!-- Business -->
            <div class="col-xl-3 col-md-6">
                <div class="plan-card reveal delay-3" style="height:100%;">
                    <div class="plan-type">Business</div>
                    <div class="plan-name">Business Plus</div>
                    <div class="plan-speed">500<span class="plan-speed-unit">Mbps</span></div>
                    <div class="plan-price-row">
                        <span class="plan-currency">KSh</span>
                        <span class="plan-amount">12,500</span>
                        <span class="plan-period">/month</span>
                    </div>
                    <ul class="plan-features">
                        <li class="plan-feature included"><span class="check">▶</span> 500Mbps Download</li>
                        <li class="plan-feature included"><span class="check">▶</span> 250Mbps Upload</li>
                        <li class="plan-feature included"><span class="check">▶</span> Unlimited Data</li>
                        <li class="plan-feature included"><span class="check">▶</span> Enterprise Router</li>
                        <li class="plan-feature included"><span class="check">▶</span> 24/7 Phone Support</li>
                        <li class="plan-feature included"><span class="check">▶</span> Static IP Included</li>
                        <li class="plan-feature included"><span class="check">▶</span> 99.5% SLA</li>
                    </ul>
                    <a href="<?= $root ?>company/quote" class="btn-ghost-filao" style="width:100%;text-align:center;display:block;">Get Started</a>
                </div>
            </div>

            <!-- Enterprise Dedicated -->
            <div class="col-xl-3 col-md-6">
                <div class="plan-card reveal delay-4" style="height:100%;background:linear-gradient(135deg,rgba(11,1,117,0.3) 0%,rgba(73,65,140,0.2) 100%);border-color:rgba(73,65,140,0.4);">
                    <div class="plan-type" style="color:var(--clr-indigo);">Enterprise</div>
                    <div class="plan-name">Dedicated Leased Line</div>
                    <div class="plan-speed">1<span class="plan-speed-unit">Gbps</span></div>
                    <div class="plan-price-row">
                        <span class="plan-currency" style="font-size:0.9rem;color:var(--clr-steel);">From</span>
                        <span class="plan-amount" style="font-size:2rem;">Custom</span>
                    </div>
                    <ul class="plan-features">
                        <li class="plan-feature included"><span class="check">▶</span> 1Gbps Dedicated Uncontended</li>
                        <li class="plan-feature included"><span class="check">▶</span> Symmetric Up/Down</li>
                        <li class="plan-feature included"><span class="check">▶</span> Unlimited Data</li>
                        <li class="plan-feature included"><span class="check">▶</span> Managed CPE</li>
                        <li class="plan-feature included"><span class="check">▶</span> Named Account Manager</li>
                        <li class="plan-feature included"><span class="check">▶</span> Multiple Static IPs</li>
                        <li class="plan-feature included"><span class="check">▶</span> 99.9% SLA + Credits</li>
                    </ul>
                    <a href="<?= $root ?>company/quote" class="btn-filao btn-primary-filao" style="width:100%;text-align:center;justify-content:center;">Request Quote</a>
                </div>
            </div>
        </div>

        <p class="text-center mt-4" style="font-size:0.82rem;color:var(--clr-steel);">
            All prices are exclusive of VAT. Prices subject to change.
            <a href="<?= $root ?>compliance/terms-of-service" style="color:var(--clr-red);">Terms & Conditions</a> apply.
        </p>
    </div>
</section><!-- /plans -->


<!-- =====================================================================
     SECTION 6: TECHNOLOGY PARTNERS
     ===================================================================== -->
<section class="partners-section" id="partners" aria-label="Technology partners">
    <div class="container-fluid px-4 mb-4">
        <div class="text-center">
            <span class="section-label">Trusted Technology Ecosystem</span>
        </div>
    </div>
    <div class="partners-track-wrapper">
        <div class="partners-track" aria-hidden="true">
            <div class="partner-logo"><span class="partner-logo-text">Cisco</span></div>
            <div class="partner-logo"><span class="partner-logo-text">Hikvision</span></div>
            <div class="partner-logo"><span class="partner-logo-text">Mikrotik</span></div>
            <div class="partner-logo"><span class="partner-logo-text">Ubiquiti</span></div>
            <div class="partner-logo"><span class="partner-logo-text">Dahua</span></div>
            <div class="partner-logo"><span class="partner-logo-text">Huawei</span></div>
            <div class="partner-logo"><span class="partner-logo-text">Fortinet</span></div>
            <div class="partner-logo"><span class="partner-logo-text">Palo Alto</span></div>
            <div class="partner-logo"><span class="partner-logo-text">AWS</span></div>
            <div class="partner-logo"><span class="partner-logo-text">Azure</span></div>
            <div class="partner-logo"><span class="partner-logo-text">Schneider</span></div>
            <div class="partner-logo"><span class="partner-logo-text">ZTE</span></div>
        </div>
    </div>
</section><!-- /partners -->


<!-- =====================================================================
     SECTION 7: SECURITY SHOWCASE
     ===================================================================== -->
<section class="security-showcase section-py" id="security-showcase" aria-label="Security solutions showcase">
    <div class="security-showcase-bg" aria-hidden="true"></div>
    <div class="security-showcase-overlay" aria-hidden="true"></div>

    <div class="container-fluid px-4 security-showcase-content">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="label-with-line">
                    <span class="section-label">Physical Security</span>
                </div>
                <h2 class="section-title mt-2 mb-3">
                    See Everything.<br>Miss <span class="text-red">Nothing.</span>
                </h2>
                <p class="section-desc mb-4">
                    From 4K IP cameras and AI-powered analytics to biometric access control   Filao Networks delivers complete physical security infrastructure for homes, estates, and commercial properties across Kenya.
                </p>

                <div class="security-feature-grid">
                    <div class="sec-feature-item">
                        <span class="sec-feature-icon"><i class="fa-solid fa-video"></i></span>
                        <div class="sec-feature-text">
                            <h5>4K IP CCTV</h5>
                            <p>Crystal-clear 24/7 recording with remote view</p>
                        </div>
                    </div>
                    <div class="sec-feature-item">
                        <span class="sec-feature-icon"><i class="fa-solid fa-hand-paper"></i></span>
                        <div class="sec-feature-text">
                            <h5>Biometric Fencing</h5>
                            <p>Fingerprint, iris, and facial recognition</p>
                        </div>
                    </div>
                    <div class="sec-feature-item">
                        <span class="sec-feature-icon"><i class="fa-solid fa-door-open"></i></span>
                        <div class="sec-feature-text">
                            <h5>Access Control</h5>
                            <p>Card readers, boom barriers, electric locks</p>
                        </div>
                    </div>
                    <div class="sec-feature-item">
                        <span class="sec-feature-icon"><i class="fa-solid fa-bell"></i></span>
                        <div class="sec-feature-text">
                            <h5>Smart Doorbell</h5>
                            <p>Video intercom, remote unlock, mobile alerts</p>
                        </div>
                    </div>
                    <div class="sec-feature-item">
                        <span class="sec-feature-icon"><i class="fa-solid fa-chart-simple"></i></span>
                        <div class="sec-feature-text">
                            <h5>AI Analytics</h5>
                            <p>Motion detection, object tracking, heatmaps</p>
                        </div>
                    </div>
                    <div class="sec-feature-item">
                        <span class="sec-feature-icon"><i class="fa-solid fa-shield"></i></span>
                        <div class="sec-feature-text">
                            <h5>24/7 SOC</h5>
                            <p>Security Operations Center monitoring</p>
                        </div>
                    </div>
                </div>

                <a href="<?= $root ?>services/cctv-security" class="btn-filao btn-primary-filao mt-4 d-inline-flex">
                    Explore Security Solutions &rarr;
                </a>
            </div>
            <div class="col-lg-6 reveal-right">
                <div style="position:relative;">
                    <img
                        src="https://images.unsplash.com/photo-1557597774-9d273605dfa9?w=800&q=75"
                        alt="CCTV security camera surveillance system"
                        loading="lazy"
                        style="width:100%;clip-path:polygon(8% 0,100% 0,92% 100%,0 100%);box-shadow:0 20px 60px rgba(0,0,0,0.7);"
                    >
                    <div style="position:absolute;top:1.5rem;right:-1rem;background:var(--clr-deep);border:1px solid var(--clr-border);border-left:3px solid var(--clr-red);padding:1rem 1.4rem;">
                        <div style="font-family:var(--font-display);font-weight:900;font-size:2rem;color:var(--clr-red);line-height:1;">
                            4K
                        </div>
                        <div style="font-size:0.7rem;text-transform:uppercase;letter-spacing:0.12em;color:var(--clr-steel);margin-top:0.2rem;">
                            Ultra HD<br>Cameras
                        </div>
                    </div>
                    <div style="position:absolute;bottom:1.5rem;left:-1rem;background:var(--clr-red);padding:0.8rem 1.2rem;clip-path:polygon(0 0,calc(100% - 10px) 0,100% 100%,10px 100%);">
                        <div style="font-family:var(--font-display);font-weight:900;font-size:1.5rem;line-height:1;">FREE</div>
                        <div style="font-size:0.65rem;text-transform:uppercase;letter-spacing:0.12em;opacity:0.9;">Security Audit</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /security showcase -->


<!-- =====================================================================
     SECTION 8: IOT + CLOUD INFOGRAPHIC
     ===================================================================== -->
<section class="section-py infographic-section" id="iot-cloud" style="background:var(--clr-bg-mid);">
    <div class="container-fluid px-4">
        <div class="text-center mb-5">
            <div class="label-with-line justify-content-center">
                <span class="section-label">Smart Infrastructure</span>
            </div>
            <h2 class="section-title mt-2">
                Cloud. IoT. <span class="text-red">Connected.</span>
            </h2>
            <p class="section-desc mx-auto text-center mt-2" style="max-width:600px;">
                Filao Networks bridges your physical infrastructure with intelligent cloud and IoT platforms   enabling real-time insights, automation, and resilience.
            </p>
        </div>

        <div class="infographic-grid mb-5">
            <div class="infographic-cell reveal delay-1">
                <div class="infographic-cell-icon"><i class="fa-solid fa-cloud"></i></div>
                <div class="infographic-cell-title">Cloud Connectivity</div>
                <div class="infographic-cell-desc">Direct peering to AWS, Azure, and GCP. Low-latency private cloud links that bypass the public internet.</div>
            </div>
            <div class="infographic-cell reveal delay-2">
                <div class="infographic-cell-icon"><i class="fa-solid fa-plug"></i></div>
                <div class="infographic-cell-title">IoT Sensors & Devices</div>
                <div class="infographic-cell-desc">Deploy temperature, humidity, motion, power, and occupancy sensors across your facility with managed dashboards.</div>
            </div>
            <div class="infographic-cell reveal delay-3">
                <div class="infographic-cell-icon"><i class="fa-solid fa-chart-simple"></i></div>
                <div class="infographic-cell-title">Real-Time Analytics</div>
                <div class="infographic-cell-desc">Live dashboards and automated alerts powered by our IoT platform   energy savings of up to 35% reported by clients.</div>
            </div>
            <div class="infographic-cell reveal delay-1">
                <div class="infographic-cell-icon"><i class="fa-solid fa-rotate"></i></div>
                <div class="infographic-cell-title">Disaster Recovery</div>
                <div class="infographic-cell-desc">Multi-site failover, automated backup, tested RPO/RTO. Keep your business running even when the unexpected strikes.</div>
            </div>
            <div class="infographic-cell reveal delay-2">
                <div class="infographic-cell-icon"><i class="fa-solid fa-shield"></i></div>
                <div class="infographic-cell-title">Zero-Trust Security</div>
                <div class="infographic-cell-desc">Network segmentation, encrypted tunnels, and identity-based access control across all cloud and IoT touchpoints.</div>
            </div>
            <div class="infographic-cell reveal delay-3">
                <div class="infographic-cell-icon"><i class="fa-solid fa-gears"></i></div>
                <div class="infographic-cell-title">Managed Operations</div>
                <div class="infographic-cell-desc">Our NOC team monitors your cloud and IoT stack 24/7, applying patches, resolving alerts, and optimising performance.</div>
            </div>
        </div>

        <!-- CTA strip inside section -->
        <div style="background:var(--clr-bg-card);border:1px solid var(--clr-border);border-left:4px solid var(--clr-red);padding:1.8rem 2rem;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:1.5rem;" class="reveal">
            <div>
                <div style="font-family:var(--font-display);font-weight:800;font-size:1.1rem;text-transform:uppercase;margin-bottom:0.3rem;">Ready to Modernise Your Infrastructure?</div>
                <p style="font-size:0.85rem;color:var(--clr-steel);margin:0;">Talk to a Filao technology consultant   free, no obligation.</p>
            </div>
            <a href="<?= $root ?>company/contact" class="btn-filao btn-primary-filao" style="flex-shrink:0;">Book a Consultation &rarr;</a>
        </div>
    </div>
</section><!-- /iot-cloud -->


<!-- =====================================================================
     SECTION 9: COVERAGE MAP
     ===================================================================== -->
<section class="section-py coverage-section" id="coverage">
    <div class="container-fluid px-4">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 reveal-left">
                <div class="label-with-line">
                    <span class="section-label">Our Reach</span>
                </div>
                <h2 class="section-title mt-2 mb-3">
                    Nationwide <span class="text-red">Coverage</span>
                </h2>
                <p class="section-desc mb-4">
                    Filao Networks is expanding rapidly across Kenya. We currently serve 47+ counties with fiber, wireless, and enterprise connectivity solutions.
                </p>
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="stat-card text-center">
                            <div class="stat-num-display" style="font-size:2.5rem;"><span data-counter data-target="47" data-suffix="+">0</span></div>
                            <div class="stat-label" style="font-size:0.8rem;">Counties</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card text-center">
                            <div class="stat-num-display" style="font-size:2.5rem;"><span data-counter data-target="200" data-suffix="+">0</span></div>
                            <div class="stat-label" style="font-size:0.8rem;">Towns & Estates</div>
                        </div>
                    </div>
                </div>
                <a href="<?= $root ?>company/coverage-map" class="btn-filao btn-primary-filao">
                    Check Your Coverage &rarr;
                </a>
            </div>
            <div class="col-lg-7 reveal-right">
                <div class="map-container">
                    <img
                        src="https://images.unsplash.com/photo-1547036967-23d11aacaee0?w=900&q=70"
                        alt="Kenya map network coverage"
                        class="map-img"
                        loading="lazy"
                    >
                    <div class="coverage-legend">
                        <div class="legend-item">
                            <span class="legend-dot" style="background:var(--clr-red);"></span>
                            <span>Fiber Coverage</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-dot" style="background:var(--clr-navy);"></span>
                            <span>Wireless Coverage</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-dot" style="background:var(--clr-steel);"></span>
                            <span>Coming Soon</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /coverage -->


<!-- =====================================================================
     SECTION 10: TESTIMONIALS
     ===================================================================== -->
<section class="section-py testimonials-section" id="testimonials">
    <div class="container-fluid px-4">
        <div class="section-header">
            <div>
                <div class="label-with-line">
                    <span class="section-label">Client Voices</span>
                </div>
                <h2 class="section-title mt-2">
                    What Our <span class="text-red">Clients</span> Say
                </h2>
            </div>
            <a href="<?= $root ?>company/about-us" class="btn-ghost-filao">See All Reviews &rarr;</a>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6 reveal delay-1">
                <div class="testimonial-card">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text">
                        "Filao Networks transformed our office connectivity. We went from a flaky DSL line to a 500Mbps dedicated link with zero downtime in 18 months. The account management is exceptional."
                    </p>
                    <div class="testimonial-author">
                        <img src="https://i.pravatar.cc/150?img=8" alt="Client photo" class="testimonial-avatar" loading="lazy">
                        <div>
                            <div class="testimonial-name">David Mwangi</div>
                            <div class="testimonial-role">IT Director, Acme Finance Ltd</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 reveal delay-2">
                <div class="testimonial-card">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text">
                        "The CCTV and access control system installed by Filao Networks gave our estate residents peace of mind. Professional installation, clean cabling, and excellent post-sales support."
                    </p>
                    <div class="testimonial-author">
                        <img src="https://i.pravatar.cc/150?img=47" alt="Client photo" class="testimonial-avatar" loading="lazy">
                        <div>
                            <div class="testimonial-name">Amina Hassan</div>
                            <div class="testimonial-role">Estate Manager, Serene Gardens</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 reveal delay-3">
                <div class="testimonial-card">
                    <div class="testimonial-stars">★★★★★</div>
                    <p class="testimonial-text">
                        "We chose Filao for our disaster recovery solution and they exceeded expectations. When our primary link failed during flooding, the failover activated in under 90 seconds. Invaluable."
                    </p>
                    <div class="testimonial-author">
                        <img src="https://i.pravatar.cc/150?img=33" alt="Client photo" class="testimonial-avatar" loading="lazy">
                        <div>
                            <div class="testimonial-name">James Ochieng</div>
                            <div class="testimonial-role">CTO, Nairobi Logistics Group</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trust badges row -->
        <div class="row mt-5">
            <div class="col-12">
                <div style="display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:2rem;padding:2rem;background:var(--clr-bg-card);border:1px solid var(--clr-border);" class="reveal">
                    <div style="text-align:center;">
                        <div style="font-family:var(--font-display);font-weight:900;font-size:2rem;color:var(--clr-red);">CA-KE</div>
                        <div style="font-size:0.7rem;color:var(--clr-steel);text-transform:uppercase;letter-spacing:0.12em;">Licensed ISP</div>
                    </div>
                    <div style="width:1px;height:50px;background:var(--clr-border);"></div>
                    <div style="text-align:center;">
                        <div style="font-family:var(--font-display);font-weight:900;font-size:2rem;color:var(--clr-red);">ISO</div>
                        <div style="font-size:0.7rem;color:var(--clr-steel);text-transform:uppercase;letter-spacing:0.12em;">27001 Certified</div>
                    </div>
                    <div style="width:1px;height:50px;background:var(--clr-border);"></div>
                    <div style="text-align:center;">
                        <div style="font-family:var(--font-display);font-weight:900;font-size:2rem;color:var(--clr-red);">Cisco</div>
                        <div style="font-size:0.7rem;color:var(--clr-steel);text-transform:uppercase;letter-spacing:0.12em;">Certified Partner</div>
                    </div>
                    <div style="width:1px;height:50px;background:var(--clr-border);"></div>
                    <div style="text-align:center;">
                        <div style="font-family:var(--font-display);font-weight:900;font-size:2rem;color:var(--clr-red);">99.9%</div>
                        <div style="font-size:0.7rem;color:var(--clr-steel);text-transform:uppercase;letter-spacing:0.12em;">Uptime SLA</div>
                    </div>
                    <div style="width:1px;height:50px;background:var(--clr-border);"></div>
                    <div style="text-align:center;">
                        <div style="font-family:var(--font-display);font-weight:900;font-size:2rem;color:var(--clr-red);">KEBS</div>
                        <div style="font-size:0.7rem;color:var(--clr-steel);text-transform:uppercase;letter-spacing:0.12em;">Standards Compliant</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section><!-- /testimonials -->


<!-- =====================================================================
     SECTION 11: LATEST NEWS / BLOG
     ===================================================================== -->
<section class="section-py news-section" id="news">
    <div class="container-fluid px-4">
        <div class="section-header">
            <div>
                <div class="label-with-line">
                    <span class="section-label">Latest Updates</span>
                </div>
                <h2 class="section-title mt-2">
                    News & <span class="text-red">Insights</span>
                </h2>
            </div>
            <a href="<?= $root ?>blogs/index" class="btn-ghost-filao">View All Articles &rarr;</a>
        </div>

        <div class="row g-4">
            <?php
            require_once 'api/db.php';
            $latest_blogs = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 3")->fetchAll();
            $delay = 1;
            foreach($latest_blogs as $blog):
            ?>
            <div class="col-lg-4 col-md-6 reveal delay-<?= $delay++ ?>">
                <article class="news-card">
                    <div class="news-card-img-wrap">
                        <img src="<?= htmlspecialchars($blog['image_url']) ?>"
                             alt="<?= htmlspecialchars($blog['title']) ?>"
                             class="news-card-img" loading="lazy">
                        <span class="news-cat">Insights</span>
                    </div>
                    <div class="news-card-body">
                        <div class="news-date">📅 <?= date('F j, Y', strtotime($blog['created_at'])) ?></div>
                        <h3 class="news-title"><?= htmlspecialchars($blog['title']) ?></h3>
                        <p class="news-excerpt"><?= htmlspecialchars($blog['excerpt']) ?></p>
                        <a href="<?= $root ?>blogs/<?= urlencode($blog['slug']) ?>" class="news-read-more">
                            Read More
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
            
            <?php if(empty($latest_blogs)): ?>
            <div class="col-12 text-center text-muted">
                <p>More articles coming soon.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section><!-- /news -->


<!-- =====================================================================
     SECTION 12: CTA BANNER (Final)
     ===================================================================== -->
<section class="cta-banner" id="cta-final" aria-label="Call to action">
    <div class="container-fluid px-4 cta-banner-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div style="font-family:var(--font-display);font-size:0.75rem;font-weight:700;letter-spacing:0.2em;text-transform:uppercase;opacity:0.8;margin-bottom:0.8rem;">
                    Start Today   No Lock-in Contracts
                </div>
                <h2 class="cta-banner-title reveal">
                    Power Your Business<br>
                    with Filao<br>
                    <span style="-webkit-text-stroke:2px rgba(255,255,255,0.4);color:transparent;">Networks.</span>
                </h2>
                <p class="cta-banner-desc">
                    Free site survey. Same-day quotes. Expert installation. Backed by our 99.9% uptime SLA. Contact our team now   we respond within 1 business hour.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= $root ?>company/quote" class="btn-filao" id="cta-quote-btn"
                       style="background:#fff;color:var(--clr-red);clip-path:polygon(0 0,calc(100% - 12px) 0,100% 100%,12px 100%);padding:0.85rem 2.2rem;font-family:var(--font-display);font-weight:800;font-size:0.95rem;letter-spacing:0.1em;text-transform:uppercase;display:inline-flex;align-items:center;gap:0.5rem;transition:all 0.3s;">
                        Get a Free Quote &rarr;
                    </a>
                    <a href="tel:+254757139239" class="btn-filao btn-outline-filao" id="cta-call-btn"
                       style="border-color:rgba(255,255,255,0.5);color:#fff;">
                        <i class="fa-solid fa-phone"></i> +254 757 139239
                    </a>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-flex justify-content-end align-items-center" aria-hidden="true">
                <!-- Decorative graphic: stack of stat boxes -->
                <div style="display:flex;flex-direction:column;gap:1rem;width:100%;max-width:320px;">
                    <div style="background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.2);padding:1.2rem 1.5rem;display:flex;align-items:center;gap:1rem;clip-path:polygon(0 0,calc(100% - 14px) 0,100% 100%,14px 100%);" class="reveal delay-1">
                        <span style="font-size:2rem;"><i class="fa-solid fa-bolt"></i></span>
                        <div>
                            <div style="font-family:var(--font-display);font-weight:900;font-size:1.4rem;line-height:1;">1 Gbps</div>
                            <div style="font-size:0.72rem;opacity:0.8;text-transform:uppercase;letter-spacing:0.1em;">Max Fiber Speed</div>
                        </div>
                    </div>
                    <div style="background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.2);padding:1.2rem 1.5rem;display:flex;align-items:center;gap:1rem;clip-path:polygon(0 0,calc(100% - 14px) 0,100% 100%,14px 100%);margin-left:2rem;" class="reveal delay-2">
                        <span style="font-size:2rem;"><i class="fa-solid fa-shield"></i></span>
                        <div>
                            <div style="font-family:var(--font-display);font-weight:900;font-size:1.4rem;line-height:1;">99.9%</div>
                            <div style="font-size:0.72rem;opacity:0.8;text-transform:uppercase;letter-spacing:0.1em;">Uptime Guaranteed</div>
                        </div>
                    </div>
                    <div style="background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.2);padding:1.2rem 1.5rem;display:flex;align-items:center;gap:1rem;clip-path:polygon(0 0,calc(100% - 14px) 0,100% 100%,14px 100%);" class="reveal delay-3">
                        <span style="font-size:2rem;"><i class="fa-solid fa-rocket"></i></span>
                        <div>
                            <div style="font-family:var(--font-display);font-weight:900;font-size:1.4rem;line-height:1;">Same Day</div>
                            <div style="font-size:0.72rem;opacity:0.8;text-transform:uppercase;letter-spacing:0.1em;">Installation</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /cta-banner -->

<?php include 'includes/footer.php'; ?>
