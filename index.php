<?php
/**
 * Filao Networks Solutions   Homepage
 * Phase 1: index.php
 */

$page_title = 'Internet Service Provider Kenya | Filao Networks Solutions';
$page_desc  = 'Filao Networks is Kenya\'s premier ISP offering high-speed residential fiber Wi-Fi, dedicated leased lines, 4K CCTV surveillance, and managed IT services in Nairobi.';
$canonical_url = 'https://filaonetworks.com/';
$script_name = $_SERVER['SCRIPT_NAME'] ?? '';
$root = (strpos($script_name, '/filaoisp/') === 0) ? '/filaoisp/' : '/';
$is_homepage = true;

// Load homepage FAQ schema for Google AI Overviews and Rich Results
$page_schema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'What internet services does Filao Networks offer in Kenya?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Filao Networks provides residential fiber broadband (10 Mbps to 1 Gbps), uncontended enterprise dedicated leased lines, fixed wireless internet, and managed public Wi-Fi hotspots across Nairobi and Kiambu.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'How fast is Filao Networks home fiber internet in Nairobi?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Filao Networks residential fiber delivers symmetrical, uncontended bandwidth ranging from 10 Mbps for light home use up to 1 Gbps for heavy 4K streaming, online gaming, and remote work.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Where is Filao Networks fiber coverage available in Nairobi?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Coverage is currently active across Kasarani, Githurai, Kahawa Sukari, Kahawa Wendani, Ruiru, Roysambu, along the Thika Superhighway corridor, and surrounding Nairobi metro areas.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Does Filao Networks install CCTV cameras and security systems?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes. Filao Networks designs and installs commercial and residential 4K AI CCTV surveillance, biometric access control, smart video doorbells, and electric perimeter fencing.'
            ]
        ]
    ]
];

include 'includes/db_connect.php';

// Fetch Wi-Fi Packages
$wifi_packages = [];
try {
    $wifi_packages = $pdo->query("SELECT * FROM wifi_packages ORDER BY sort_order ASC, id DESC")->fetchAll();
} catch (Exception $e) {
    // Silently ignore if table doesn't exist yet
}

include 'includes/header.php';
?>

<!-- =====================================================================
     SECTION 1: HERO
     ===================================================================== -->
<section class="hero-section" id="home" aria-label="Hero">
    <div class="hero-bg" aria-hidden="true"></div>
    <div class="hero-overlay" aria-hidden="true"></div>

    <div class="container-fluid px-4 py-5" style="position:relative;z-index:2;padding-top:calc(var(--navbar-h) + 3rem) !important;">
        <div class="row align-items-center g-5" style="min-height:calc(100vh - var(--navbar-h) - 3rem);">

            <!-- Content -->
            <div class="col-lg-8 col-xl-6">
                <div class="hero-eyebrow">
                    Kenya's Fastest Growing ISP
                </div>
                <h1 class="hero-title reveal">
                    <span class="line-accent">Speed.</span><br>
                    Security.<br>
                    <span class="line-outline">Uptime.</span>
                </h1>
                <p class="hero-subtitle reveal delay-1">
                    Enterprise-grade internet, networking, CCTV security, cloud, and IoT solutions engineered for businesses and homes across Kenya.
                </p>
                <div class="hero-cta-group reveal delay-2">
                    <a href="<?= $root ?>company/quote" class="btn-filao btn-primary-filao" id="hero-quote-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        Get a Free Quote
                    </a>
                    <button type="button" class="btn-filao btn-outline-filao" data-bs-toggle="modal" data-bs-target="#siteSurveyModal" style="border-color:rgba(255,255,255,0.35);color:#ffffff;">
                        <i class="fa-solid fa-clipboard-check me-1"></i> Book Site Survey
                    </button>
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
                            <span data-counter data-target="3" data-suffix="+ yrs">0</span>
                        </div>
                        <div class="hero-stat-label">Years of Service</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-num">
                            <span data-counter data-target="47" data-suffix="+">0+</span>
                        </div>
                        <div class="hero-stat-label">Counties Covered</div>
                    </div>
                </div>
            </div><!-- /col left -->

        </div>
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
                    <p class="service-card-desc">We offer professional CCTV installation and security services. Feel free to request a quote tailored to your needs.</p>
                    <a href="<?= $root ?>company/quote" class="service-card-link">
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
                    <img src="https://images.unsplash.com/photo-1601597111158-2fceff292cdc?w=600&q=70"
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
                        <span data-counter data-target="3" data-suffix="+ yrs">0</span>
                    </div>
                    <div class="stat-label">Years of Service</div>
                    <p class="stat-desc">Over 3 years of dedicated service across Kenya</p>
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
            <?php if (!empty($wifi_packages)): ?>
                <?php foreach ($wifi_packages as $index => $pkg): 
                    $delay = $index + 1;
                    $features = json_decode($pkg['features'], true) ?? [];
                    $isFeatured = $pkg['is_featured'] ? 'featured' : '';
                    $isEnterprise = (strtolower($pkg['type']) === 'enterprise');
                    $typeColor = $isEnterprise ? 'color:var(--clr-indigo);' : '';
                    $btnClass = $pkg['is_featured'] ? 'btn-filao btn-primary-filao' : 'btn-ghost-filao';
                    if($isEnterprise) $btnClass = 'btn-filao btn-primary-filao';
                ?>
                <div class="col-xl-3 col-md-6">
                    <div class="plan-card <?= $isFeatured ?> reveal delay-<?= $delay ?>">
                        <div class="plan-type" style="<?= $typeColor ?>"><?= htmlspecialchars($pkg['type']) ?></div>
                        <div class="plan-name"><?= htmlspecialchars($pkg['name']) ?>
                            <?php if ($pkg['is_popular']): ?><span class="badge bg-danger ms-2" style="font-size:0.6rem;vertical-align:middle;">POPULAR</span><?php endif; ?>
                        </div>
                        <div class="plan-speed"><?= htmlspecialchars($pkg['speed']) ?><span class="plan-speed-unit"><?= htmlspecialchars($pkg['speed_unit']) ?></span></div>
                        <div class="plan-price-row">
                            <?php if ($isEnterprise): ?>
                                <span class="plan-currency" style="font-size:0.9rem;color:var(--clr-steel);">From</span>
                                <span class="plan-amount" style="font-size:2rem;">Custom</span>
                            <?php else: ?>
                                <span class="plan-currency">KSh</span>
                                <span class="plan-amount"><?= number_format($pkg['price']) ?></span>
                                <span class="plan-period"><?= htmlspecialchars($pkg['period']) ?></span>
                            <?php endif; ?>
                        </div>
                        <ul class="plan-features">
                            <?php foreach ($features as $f): 
                                $isIncluded = $f['included'];
                                $featClass = $isIncluded ? 'plan-feature included' : 'plan-feature';
                                $featOpacity = $isIncluded ? '' : 'style="opacity:0.4;"';
                                $checkIcon = $isIncluded ? '▶' : ' ';
                            ?>
                            <li class="<?= $featClass ?>" <?= $featOpacity ?>><span class="check"><?= $checkIcon ?></span> <?= htmlspecialchars($f['text']) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?= $root ?>company/quote" class="<?= $btnClass ?>" style="width:100%;text-align:center;justify-content:center;display:block;">
                            <?= $isEnterprise ? 'Request Quote' : 'Get Started' ?>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted">
                    <p>Packages are currently being updated. Please check back shortly.</p>
                </div>
            <?php endif; ?>
        </div>

        <p class="text-center mt-4" style="font-size:0.82rem;color:var(--clr-steel);">
            All prices are exclusive of VAT. Prices subject to change.
            <a href="<?= $root ?>compliance/terms-of-service" style="color:var(--clr-red);">Terms & Conditions</a> apply.
        </p>
    </div>
</section><!-- /plans -->


<!-- =====================================================================
     SECTION 6: TECHNOLOGY PARTNERS & INDUSTRY STANDARDS
     ===================================================================== -->
<section class="partners-section" id="partners" aria-label="Technology partners and industry standards">
    <div class="container-fluid px-4">
        
        <!-- Header -->
        <div class="text-center max-w-700 mx-auto mb-4">
            <span class="section-label">PARTNERS & ECOSYSTEM</span>
            <h2 class="section-title mt-2 text-center">Engineered With Industry Leaders &amp; <span class="text-red">Global Standards</span></h2>
            <p class="section-desc text-center mx-auto" style="max-width:680px;">
                We design, deploy, and manage mission-critical fiber networks, Wi-Fi 6, IP surveillance, and cloud infrastructure around recognized global technology leaders and strict compliance frameworks.
            </p>
        </div>

        <!-- Filter Category Tabs -->
        <div class="partner-tabs" role="tablist" aria-label="Filter technology partners">
            <button type="button" class="partner-tab-btn active" data-filter="all">
                <i class="fa-solid fa-layer-group"></i> All Ecosystems <span class="partner-tab-count">13</span>
            </button>
            <button type="button" class="partner-tab-btn" data-filter="networking">
                <i class="fa-solid fa-network-wired"></i> Networking &amp; Wi-Fi <span class="partner-tab-count">7</span>
            </button>
            <button type="button" class="partner-tab-btn" data-filter="security">
                <i class="fa-solid fa-video"></i> Security &amp; Surveillance <span class="partner-tab-count">6</span>
            </button>
        </div>

        <!-- Brands Grid -->
        <div class="brands-grid" id="brandsGrid">
            
            <!-- 1. Cisco -->
            <div class="brand-card" data-category="networking">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/cisco.svg" alt="Cisco Systems" loading="lazy">
                </div>
                <div class="brand-card-name">Cisco</div>
                <div class="brand-card-sub">Routing &amp; Switching</div>
            </div>

            <!-- 2. Huawei -->
            <div class="brand-card" data-category="networking">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/huawei.svg" alt="Huawei Enterprise" loading="lazy">
                </div>
                <div class="brand-card-name">Huawei</div>
                <div class="brand-card-sub">Optical &amp; Campus Wi-Fi</div>
            </div>

            <!-- 3. MikroTik -->
            <div class="brand-card" data-category="networking">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/mikrotik.svg" alt="MikroTik" loading="lazy">
                </div>
                <div class="brand-card-name">MikroTik</div>
                <div class="brand-card-sub">Carrier Edge &amp; Core</div>
            </div>

            <!-- 4. Ubiquiti -->
            <div class="brand-card" data-category="networking">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/ubiquiti.svg" alt="Ubiquiti UniFi" loading="lazy">
                </div>
                <div class="brand-card-name">Ubiquiti</div>
                <div class="brand-card-sub">UniFi Wireless &amp; Gateways</div>
            </div>

            <!-- 5. Aruba -->
            <div class="brand-card" data-category="networking">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/aruba.png" alt="Aruba Networks (HPE)" loading="lazy">
                </div>
                <div class="brand-card-name">Aruba (HPE)</div>
                <div class="brand-card-sub">Enterprise Wireless</div>
            </div>

            <!-- 6. TP-Link -->
            <div class="brand-card" data-category="networking">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/tp-link.svg" alt="TP-Link Omada" loading="lazy">
                </div>
                <div class="brand-card-name">TP-Link</div>
                <div class="brand-card-sub">Omada Cloud Networks</div>
            </div>

            <!-- 7. D-Link -->
            <div class="brand-card" data-category="networking">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/dlink.svg" alt="D-Link" loading="lazy">
                </div>
                <div class="brand-card-name">D-Link</div>
                <div class="brand-card-sub">Structured Connectivity</div>
            </div>

            <!-- 8. Hikvision -->
            <div class="brand-card" data-category="security">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/hikvision.svg" alt="Hikvision" loading="lazy">
                </div>
                <div class="brand-card-name">Hikvision</div>
                <div class="brand-card-sub">AI CCTV &amp; Thermal NVR</div>
            </div>

            <!-- 9. Dahua -->
            <div class="brand-card" data-category="security">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/dahua.svg" alt="Dahua Technology" loading="lazy">
                </div>
                <div class="brand-card-name">Dahua</div>
                <div class="brand-card-sub">Smart Video &amp; Biometrics</div>
            </div>

            <!-- 10. Axis -->
            <div class="brand-card" data-category="security">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/axis.png" alt="Axis Communications" loading="lazy" style="height:38px; width:auto; object-fit:contain;">
                </div>
                <div class="brand-card-name">Axis Communications</div>
                <div class="brand-card-sub">Network Video &amp; Optics</div>
            </div>

            <!-- 11. Bosch -->
            <div class="brand-card" data-category="security">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/bosch.svg" alt="Bosch Security" loading="lazy">
                </div>
                <div class="brand-card-name">Bosch Security</div>
                <div class="brand-card-sub">Intelligent Surveillance</div>
            </div>

            <!-- 12. Hanwha Vision -->
            <div class="brand-card" data-category="security">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/hanwha-vision.png" alt="Hanwha Vision" loading="lazy">
                </div>
                <div class="brand-card-name">Hanwha Vision</div>
                <div class="brand-card-sub">Vision AI &amp; Analytics</div>
            </div>

            <!-- 13. Motorola Solutions -->
            <div class="brand-card" data-category="security">
                <div class="brand-card-img-wrap">
                    <img src="<?= $root ?>assets/images/brands/motorola-solutions.svg" alt="Motorola Solutions" loading="lazy">
                </div>
                <div class="brand-card-name">Motorola Solutions</div>
                <div class="brand-card-sub">Critical Security (Avigilon)</div>
            </div>

        </div><!-- /brands-grid -->

        <!-- Trusted Industry Standards Panel (Modeled after GS TechGuard) -->
        <div class="standards-panel">
            <div class="text-center max-w-700 mx-auto mb-3">
                <div class="d-inline-flex align-items-center gap-2 mb-2" style="background:rgba(236,28,36,0.08);color:var(--clr-red);padding:4px 14px;border-radius:20px;font-size:0.8rem;font-weight:700;">
                    <i class="fa-solid fa-certificate"></i> TRUSTED INDUSTRY STANDARDS
                </div>
                <h3 class="fw-bold mb-2 text-center" style="color:#090238;font-size:1.6rem;">Built Around Recognised Quality, Safety &amp; <span class="text-red">Engineering Frameworks</span></h3>
                <p class="text-muted small mb-0 text-center mx-auto" style="max-width:680px;">
                    Every fiber deployment, server room setup, structured cabling backbone, and surveillance installation is engineered strictly according to approved international and national compliance standards:
                </p>
            </div>

            <div class="standards-grid">
                
                <!-- 1. KEBS -->
                <div class="standard-card">
                    <div class="standard-logo-wrap">
                        <img src="<?= $root ?>assets/images/brands/kebs.png" alt="Kenya Bureau of Standards (KEBS)" loading="lazy">
                    </div>
                    <div class="standard-title">KEBS</div>
                    <div class="standard-domain">Kenya Standards</div>
                    <p class="standard-desc">Type-approved hardware, telecommunication compliance, and strict adherence to Kenyan national technical guidelines.</p>
                </div>

                <!-- 2. ISO -->
                <div class="standard-card">
                    <div class="standard-logo-wrap">
                        <img src="<?= $root ?>assets/images/brands/iso.svg" alt="ISO Quality and Security Standards" loading="lazy">
                    </div>
                    <div class="standard-title">ISO Certified</div>
                    <div class="standard-domain">Quality &amp; InfoSec</div>
                    <p class="standard-desc">Alighted with ISO 9001 (Quality Management) and ISO/IEC 27001 (Information Security Management Systems).</p>
                </div>

                <!-- 3. IEEE -->
                <div class="standard-card">
                    <div class="standard-logo-wrap">
                        <img src="<?= $root ?>assets/images/brands/ieee.svg" alt="IEEE Network Standards" loading="lazy">
                    </div>
                    <div class="standard-title">IEEE</div>
                    <div class="standard-domain">Network Standards</div>
                    <p class="standard-desc">Strict compliance with IEEE 802.3 Ethernet, 802.11ax/be wireless, and fiber optic transmission protocols.</p>
                </div>

                <!-- 4. NFPA -->
                <div class="standard-card">
                    <div class="standard-logo-wrap">
                        <img src="<?= $root ?>assets/images/brands/nfpa.svg" alt="NFPA Fire Protection Standards" loading="lazy">
                    </div>
                    <div class="standard-title">NFPA</div>
                    <div class="standard-domain">Fire Protection</div>
                    <p class="standard-desc">Server room fire barrier safety, plenum-rated network cabling, and life-safety alarm system integration.</p>
                </div>

                <!-- 5. OSHA -->
                <div class="standard-card">
                    <div class="standard-logo-wrap">
                        <img src="<?= $root ?>assets/images/brands/osha.svg" alt="OSHA Workplace Safety" loading="lazy">
                    </div>
                    <div class="standard-title">OSHA</div>
                    <div class="standard-domain">Workplace Safety</div>
                    <p class="standard-desc">Comprehensive occupational health, certified tower rigging, and strict field safety practices across all project sites.</p>
                </div>

            </div><!-- /standards-grid -->
        </div><!-- /standards-panel -->

    </div><!-- /.container-fluid -->
</section><!-- /partners -->

<script>
// Filter technology partner cards dynamically
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.partner-tab-btn');
    const brandCards = document.querySelectorAll('#brandsGrid .brand-card');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');
            brandCards.forEach(card => {
                const category = card.getAttribute('data-category');
                if (filter === 'all' || category === filter) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>


<!-- =====================================================================
     SECTION 6B: HOW WE WORK (Consultative 4-Step Engineering Process)
     ===================================================================== -->
<section class="workflow-section" id="how-we-work" aria-label="Our engineering delivery workflow">
    <div class="container-fluid px-4">
        
        <div class="text-center max-w-700 mx-auto">
            <span class="section-label text-red">HOW WE WORK</span>
            <h2 class="section-title text-white mt-2 text-center">Engineered Project Delivery, <span class="text-red">From Survey to 24/7 Handover</span></h2>
            <p class="section-desc text-slate-300 mx-auto text-center" style="max-width:720px;">
                We follow a rigorous, consultative engineering methodology that guarantees seamless network cutovers, zero unmanaged downtime, and complete accountability for your commercial or residential premises.
            </p>
        </div>

        <div class="workflow-grid">
            
            <!-- Step 1 -->
            <div class="workflow-card">
                <span class="workflow-step-num">01</span>
                <div class="workflow-icon-wrap">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>
                <div class="workflow-card-title text-center">Scoped Site Survey &amp; Heatmapping</div>
                <p class="workflow-card-desc text-center">
                    Our field engineers conduct an on-site technical inspection across Nairobi &amp; Kenya to assess optical line-of-sight, RF interference, physical cable pathways, and security vulnerability zones.
                </p>
                <span class="workflow-tag">Phase 1: Discovery</span>
            </div>

            <!-- Step 2 -->
            <div class="workflow-card">
                <span class="workflow-step-num">02</span>
                <div class="workflow-icon-wrap">
                    <i class="fa-solid fa-compass-drafting"></i>
                </div>
                <div class="workflow-card-title text-center">Custom Architecture &amp; Transparent BOQ</div>
                <p class="workflow-card-desc text-center">
                    We design a comprehensive network topology, camera field-of-view diagrams, and an itemized Bill of Quantities (BOQ) built around recognized hardware with zero hidden costs.
                </p>
                <span class="workflow-tag">Phase 2: Architecture</span>
            </div>

            <!-- Step 3 -->
            <div class="workflow-card">
                <span class="workflow-step-num">03</span>
                <div class="workflow-icon-wrap">
                    <i class="fa-solid fa-network-wired"></i>
                </div>
                <div class="workflow-card-title text-center">Turnkey Cabling &amp; Precision Deployment</div>
                <p class="workflow-card-desc text-center">
                    Our certified teams execute clean fiber fusion splicing, plenum-rated CAT6A cabling, server rack cable management, surge suppression, and online UPS power integration.
                </p>
                <span class="workflow-tag">Phase 3: Turnkey Build</span>
            </div>

            <!-- Step 4 -->
            <div class="workflow-card">
                <span class="workflow-step-num">04</span>
                <div class="workflow-icon-wrap">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <div class="workflow-card-title text-center">Commissioning, Handover &amp; 24/7 SLA</div>
                <p class="workflow-card-desc text-center">
                    We perform end-to-end throughput stress testing, train your in-house administrators, and activate 24/7 proactive monitoring backed by our Nairobi NOC and rapid on-site emergency SLA.
                </p>
                <span class="workflow-tag">Phase 4: Commissioning</span>
            </div>

        </div><!-- /workflow-grid -->

        <!-- Centered Action Banner inside Workflow -->
        <div class="workflow-cta-banner">
            <div style="width:52px;height:52px;border-radius:50%;background:rgba(236,28,36,0.2);display:flex;align-items:center;justify-content:center;color:var(--clr-red);font-size:1.35rem;margin-bottom:1rem;">
                <i class="fa-solid fa-clipboard-check"></i>
            </div>
            <h4 class="text-white fw-bold mb-2 text-center">Need a Technical Assessment of Your Premises?</h4>
            <p class="small mb-4 text-center mx-auto" style="color:rgba(255,255,255,0.75);max-width:620px;">
                Our senior field engineers conduct on-site technical inspections for commercial offices, estates, and institutions across Nairobi &amp; Kenya.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <button type="button" class="btn-filao btn-primary-filao" data-bs-toggle="modal" data-bs-target="#siteSurveyModal">
                    <i class="fa-solid fa-calendar-check me-1"></i> Book a Free Site Survey &rarr;
                </button>
                <a href="tel:+254790034459" class="btn-filao btn-outline-filao" style="border-color:rgba(255,255,255,0.35);color:#fff;">
                    <i class="fa-solid fa-phone me-1"></i> +254 790 034459
                </a>
            </div>
        </div>

    </div>
</section><!-- /workflow-section -->


<!-- =====================================================================
     SECTION 6C: ALL-IN-ONE SOLUTION PACKAGES
     ===================================================================== -->
<section class="bundles-section" id="solution-bundles" aria-label="All-in-one technology solution packages">
    <div class="container-fluid px-4">
        
        <div class="text-center max-w-700 mx-auto">
            <span class="section-label">ALL-IN-ONE SOLUTION PACKAGES</span>
            <h2 class="section-title mt-2 text-center">Complete Technology Packages for <span class="text-red">Your Space</span></h2>
            <p class="section-desc text-center mx-auto" style="max-width:720px;">
                Say goodbye to juggling different vendors. We combine dedicated fiber internet, enterprise Wi-Fi 6, 4K CCTV surveillance, and clean power backup into complete, ready-to-run solutions with single-source accountability.
            </p>
        </div>

        <div class="bundles-grid">
            
            <!-- Bundle 1: Smart Office -->
            <div class="bundle-card featured">
                <span class="bundle-badge">Most Popular</span>
                <div class="bundle-icon-wrap">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <div class="bundle-title">Smart Office Suite</div>
                <span class="bundle-ideal"><i class="fa-solid fa-check-circle me-1"></i> Best for Corporate Offices &amp; Hubs</span>
                <div class="bundle-subtitle">Tailored for commercial offices, corporate headquarters &amp; co-working facilities.</div>
                
                <ul class="bundle-features">
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Dedicated 1:1 Fiber Internet</strong> with secondary link failover</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Enterprise Cloud Wi-Fi 6</strong> (Cisco / Aruba) with staff &amp; guest isolation</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>8x to 32x 4K AI IP Cameras</strong> with mobile &amp; central monitoring</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Biometric / RFID Touchless Access</strong> for server room &amp; main entry</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Online UPS Power Protection</strong> to keep network up during blackouts</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>2-Hour Rapid On-Site Emergency SLA</strong> &amp; 24/7 NOC monitoring</span></li>
                </ul>

                <button type="button" class="btn-bundle-quote btn-bundle-featured" data-bs-toggle="modal" data-bs-target="#siteSurveyModal" data-bundle="Smart Office Suite">
                    <i class="fa-solid fa-calculator me-2"></i> Request a Free Quote &rarr;
                </button>
            </div>

            <!-- Bundle 2: Gated Estate -->
            <div class="bundle-card">
                <div class="bundle-icon-wrap">
                    <i class="fa-solid fa-city"></i>
                </div>
                <div class="bundle-title">Gated Estate Suite</div>
                <span class="bundle-ideal"><i class="fa-solid fa-check-circle me-1"></i> Best for Residential Communities</span>
                <div class="bundle-subtitle">Tailored for property developers, residential estates &amp; apartment blocks.</div>
                
                <ul class="bundle-features">
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>High-Density FTTH Distribution</strong> directly to each unit</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Street &amp; Clubhouse Wi-Fi Hotspots</strong> with self-service voucher portal</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>ANPR License Plate Recognition</strong> cameras at security gates</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Video Intercom &amp; Gate Automation</strong> with smartphone verification</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Perimeter Electric Fence Monitoring</strong> &amp; guardhouse integration</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Dedicated Resident Community Helpdesk</strong> for technical support</span></li>
                </ul>

                <button type="button" class="btn-bundle-quote btn-bundle-navy" data-bs-toggle="modal" data-bs-target="#siteSurveyModal" data-bundle="Gated Estate Suite">
                    <i class="fa-solid fa-calculator me-2"></i> Request a Free Quote &rarr;
                </button>
            </div>

            <!-- Bundle 3: Hospitality & Campus -->
            <div class="bundle-card">
                <div class="bundle-icon-wrap">
                    <i class="fa-solid fa-hotel"></i>
                </div>
                <div class="bundle-title">Hospitality &amp; Campus Suite</div>
                <span class="bundle-ideal"><i class="fa-solid fa-check-circle me-1"></i> Best for High-Traffic Public Venues</span>
                <div class="bundle-subtitle">Built for hotels, conference centers, schools &amp; healthcare facilities.</div>
                
                <ul class="bundle-features">
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Ultra-High Throughput Optical Fiber</strong> for hundreds of concurrent users</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Branded Guest Captive Portal</strong> with room verification or SMS login</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Zero-Handoff Seamless Roaming</strong> across rooms, dining &amp; gardens</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>High-Density Banquet Hall APs</strong> for conferences &amp; video events</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Priority Traffic QoS</strong> for front-desk POS &amp; reservation systems</span></li>
                    <li><i class="fa-solid fa-circle-check"></i> <span><strong>Discreet Corridor &amp; Perimeter CCTV</strong> with encrypted storage</span></li>
                </ul>

                <button type="button" class="btn-bundle-quote btn-bundle-navy" data-bs-toggle="modal" data-bs-target="#siteSurveyModal" data-bundle="Hospitality & Campus Suite">
                    <i class="fa-solid fa-calculator me-2"></i> Request a Free Quote &rarr;
                </button>
            </div>

        </div><!-- /bundles-grid -->

    </div>
</section><!-- /bundles-section -->


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
                    We offer comprehensive physical security infrastructure including 4K IP cameras, AI-powered analytics, and access control. Contact us today for a personalized quote tailored to your specific security needs.
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
                    <div style="position:absolute;top:1.5rem;right:-1rem;background:#fff;border:1px solid var(--clr-border);border-left:3px solid var(--clr-red);padding:1rem 1.4rem;color:var(--text-main);">
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
                    Our high-speed Wi-Fi network is currently available in <strong>Utawala, Mihango, Embakasi, Ruai, Joska, Kitengela, and Chokaa</strong>. All our other enterprise solutions (CCTV, Networking, IoT, and Cloud) are fully supported and available countrywide across Kenya.
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
                        <div class="news-date"><i class="fa-regular fa-calendar" style="color:var(--clr-red); margin-right:5px;"></i> <?= date('F j, Y', strtotime($blog['created_at'])) ?></div>
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
                <div style="font-family:var(--font-display);font-size:0.75rem;font-weight:700;letter-spacing:0.2em;text-transform:uppercase;margin-bottom:0.8rem;color:#000000;">
                    Start Today   No Lock-in Contracts
                </div>
                <h2 class="cta-banner-title reveal">
                    Power Your Business<br>
                    with Filao<br>
                    <span style="-webkit-text-stroke:2px #000000;color:transparent;">Networks.</span>
                </h2>
                <p class="cta-banner-desc">
                    Free site survey. Same-day quotes. Expert installation. Backed by our 99.9% uptime SLA. Contact our team now   we respond within 1 business hour.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= $root ?>company/quote" class="btn-filao" id="cta-quote-btn"
                       style="background:#fff;color:var(--clr-red);clip-path:polygon(0 0,calc(100% - 12px) 0,100% 100%,12px 100%);padding:0.85rem 2.2rem;font-family:var(--font-display);font-weight:800;font-size:0.95rem;letter-spacing:0.1em;text-transform:uppercase;display:inline-flex;align-items:center;gap:0.5rem;transition:all 0.3s;">
                        Get a Free Quote &rarr;
                    </a>
                    <a href="tel:+254790034459" class="btn-filao btn-outline-filao" id="cta-call-btn"
                       style="border-color:rgba(255,255,255,0.5);color:#ffffff;">
                        <i class="fa-solid fa-phone"></i> +254 790 034459
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

<!-- =====================================================================
     SITE SURVEY BOOKING MODAL (Modeled after GS TechGuard Conversion Engine)
     ===================================================================== -->
<div class="modal fade" id="siteSurveyModal" tabindex="-1" aria-labelledby="siteSurveyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered survey-modal-dialog">
        <div class="modal-content survey-modal-content">
            <div class="survey-modal-header text-center">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="d-inline-flex align-items-center gap-2 mb-1" style="background:rgba(236,28,36,0.2);color:var(--clr-red);padding:2px 12px;border-radius:12px;font-size:0.75rem;font-weight:700;">
                    <i class="fa-solid fa-clipboard-check"></i> FREE TECHNICAL ASSESSMENT
                </div>
                <h5 class="modal-title fw-bold text-white mb-0 text-center" id="siteSurveyModalLabel">Book an On-Site Survey &amp; Wi-Fi Heatmap</h5>
            </div>
            <div class="modal-body p-4 bg-white">
                <p class="text-muted small mb-4 text-center mx-auto" style="max-width:480px;">
                    Our certified field engineers will inspect your premises in Nairobi or across Kenya, evaluate signal propagation, cable pathways, and provide an itemized engineering Bill of Quantities (BOQ).
                </p>

                <form id="siteSurveyForm">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Full Name *</label>
                            <input type="text" name="name" class="form-control form-control-sm py-2" placeholder="e.g. David Mwangi" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Phone Number *</label>
                            <input type="tel" name="phone" class="form-control form-control-sm py-2" placeholder="+254 7XX XXX XXX" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Email Address *</label>
                            <input type="email" name="email" class="form-control form-control-sm py-2" placeholder="name@company.co.ke" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Company / Estate Name</label>
                            <input type="text" name="company" class="form-control form-control-sm py-2" placeholder="e.g. Apex Towers / Greenpark Estate">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Premises Type *</label>
                            <select name="premises_type" class="form-select form-select-sm py-2" required>
                                <option value="" selected disabled>Select premises type...</option>
                                <option value="Commercial Office / HQ">Commercial Office / HQ</option>
                                <option value="Gated Estate / Residential Units">Gated Estate / Residential Units</option>
                                <option value="School / College Campus">School / College Campus</option>
                                <option value="Hotel / Restaurant / Hospitality">Hotel / Restaurant / Hospitality</option>
                                <option value="Warehouse / Industrial Facility">Warehouse / Industrial Facility</option>
                                <option value="Healthcare / Clinic">Healthcare / Clinic</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Premises Location *</label>
                            <input type="text" name="location" class="form-control form-control-sm py-2" placeholder="e.g. Westlands, Nairobi" required>
                        </div>
                        
                        <div class="col-12">
                            <label class="form-label small fw-bold text-dark mb-1">Services Needed for Assessment</label>
                            <div class="d-flex flex-wrap gap-3 small text-muted pt-1">
                                <label class="d-flex align-items-center gap-1 cursor-pointer">
                                    <input type="checkbox" name="services[]" value="Dedicated Fiber"> Dedicated Fiber
                                </label>
                                <label class="d-flex align-items-center gap-1 cursor-pointer">
                                    <input type="checkbox" name="services[]" value="Enterprise Wi-Fi 6"> Enterprise Wi-Fi
                                </label>
                                <label class="d-flex align-items-center gap-1 cursor-pointer">
                                    <input type="checkbox" name="services[]" value="CCTV Security"> CCTV Security
                                </label>
                                <label class="d-flex align-items-center gap-1 cursor-pointer">
                                    <input type="checkbox" name="services[]" value="Access Control"> Access Control
                                </label>
                                <label class="d-flex align-items-center gap-1 cursor-pointer">
                                    <input type="checkbox" name="services[]" value="Power Backup UPS"> Clean Power UPS
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-dark">Preferred Survey Date / Notes</label>
                            <textarea name="notes" class="form-control form-control-sm" rows="2" placeholder="Specify your preferred inspection date, approximate floor count or existing setup details..."></textarea>
                        </div>
                    </div>

                    <div id="surveyAlert" class="mt-3 d-none"></div>

                    <div class="mt-4 pt-2 border-top d-flex align-items-center justify-content-between">
                        <span class="small text-muted"><i class="fa-solid fa-lock text-success me-1"></i> Strictly confidential</span>
                        <button type="submit" id="surveySubmitBtn" class="btn-filao btn-primary-filao px-4">
                            Submit Survey Request &rarr;
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Handle Site Survey Form Submission via AJAX to existing process_contact.php
document.addEventListener('DOMContentLoaded', function() {
    // If a button has data-bundle, pre-populate notes
    document.querySelectorAll('[data-bs-target="#siteSurveyModal"]').forEach(btn => {
        btn.addEventListener('click', function() {
            const bundle = this.getAttribute('data-bundle');
            const notesField = document.querySelector('#siteSurveyModal textarea[name="notes"]');
            if (bundle && notesField && !notesField.value) {
                notesField.value = 'Interested in: ' + bundle + '. Please schedule a technical survey.';
            }
        });
    });

    const surveyForm = document.getElementById('siteSurveyForm');
    if (surveyForm) {
        surveyForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = document.getElementById('surveySubmitBtn');
            const alertBox = document.getElementById('surveyAlert');
            const originalText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Booking Survey...';

            const formData = new FormData(surveyForm);
            const services = [];
            formData.getAll('services[]').forEach(s => services.push(s));
            
            const messageDetails = `
SITE SURVEY BOOKING REQUEST
===================================
Company/Estate: ${formData.get('company') || 'N/A'}
Premises Type: ${formData.get('premises_type') || 'N/A'}
Location: ${formData.get('location') || 'N/A'}
Phone: ${formData.get('phone')}
Services Required: ${services.join(', ') || 'General Assessment'}
Notes / Preferred Date: ${formData.get('notes') || 'None'}
            `.trim();

            const payload = {
                name: formData.get('name'),
                email: formData.get('email'),
                subject: 'Site Survey Request: ' + (formData.get('company') || formData.get('name')) + ' (' + formData.get('location') + ')',
                message: messageDetails
            };

            fetch('<?= $root ?>api/process_contact.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
                alertBox.classList.remove('d-none', 'alert-danger', 'alert-success');

                if (data.status === 'success') {
                    alertBox.className = 'mt-3 alert alert-success small py-2';
                    alertBox.innerHTML = '<i class="fa-solid fa-circle-check me-1"></i> <strong>Survey Booked!</strong> Our engineering team will contact you shortly to confirm your site assessment.';
                    surveyForm.reset();
                    setTimeout(() => {
                        const modal = bootstrap.Modal.getInstance(document.getElementById('siteSurveyModal'));
                        if (modal) modal.hide();
                    }, 4000);
                } else {
                    alertBox.className = 'mt-3 alert alert-danger small py-2';
                    alertBox.innerHTML = data.message || 'Error booking survey. Please call +254 790 034459.';
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
                alertBox.className = 'mt-3 alert alert-danger small py-2';
                alertBox.innerHTML = 'Network error. Please call +254 790 034459 directly.';
            });
        });
    }
});
</script>

<?php include 'includes/footer.php'; ?>

