<?php
$page_title = "Filao Networks | Nairobi Region Fiber & Wireless Coverage Map";
$page_desc = "Explore Filao Networks Solutions' live high-speed fiber and wireless coverage map across Kasarani, Githurai, Kahawa, Ruiru, Roysambu, and the Nairobi region.";
$page_class = "page-coverage";
$root = "../";
include "../includes/header.php";
?>

<!-- Leaflet.js CSS (Free OpenStreetMap Map Library) -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<style>
/* ==========================================================================
   COVERAGE MAP CUSTOM STYLES (LIGHT MODE MAP)
   ========================================================================== */
#coverageMap {
    width: 100%;
    height: 620px;
    border-radius: 16px;
    border: 2px solid var(--clr-border);
    background: #f4f6f9; /* Bright clean light mode background */
    box-shadow: 0 20px 40px rgba(0,0,0,0.4);
    position: relative;
    z-index: 1;
}

.map-toolbar {
    background: var(--clr-bg-card);
    border: 1px solid var(--clr-border);
    border-radius: 12px;
    padding: 1.25rem 1.5rem;
    margin-bottom: 2rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
}

.filter-pills {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.filter-pill {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid var(--clr-border);
    color: var(--clr-steel);
    padding: 0.5rem 1.1rem;
    border-radius: 30px;
    font-size: 0.85rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.25s ease;
}

.filter-pill:hover,
.filter-pill.active {
    background: var(--clr-red);
    color: #fff;
    border-color: var(--clr-red);
    box-shadow: 0 4px 15px rgba(229, 25, 55, 0.3);
}

/* Custom Leaflet Glass Popup (remains sleek for high contrast against light map) */
.leaflet-popup-content-wrapper {
    background: rgba(9, 2, 56, 0.97) !important;
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    border-radius: 12px !important;
    color: #fff !important;
    box-shadow: 0 15px 35px rgba(0,0,0,0.6) !important;
    padding: 4px !important;
}

.leaflet-popup-tip {
    background: rgba(9, 2, 56, 0.97) !important;
}

.coverage-popup-title {
    font-family: var(--font-heading);
    font-size: 1.15rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 0.25rem;
}

.coverage-popup-region {
    font-size: 0.8rem;
    color: var(--clr-red);
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing: 0.05em;
    margin-bottom: 0.75rem;
}

.coverage-badge {
    display: inline-block;
    padding: 0.25rem 0.65rem;
    border-radius: 20px;
    font-size: 0.72rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.coverage-badge-active {
    background: rgba(46, 213, 115, 0.15);
    color: #2ed573;
    border: 1px solid rgba(46, 213, 115, 0.4);
}

.coverage-badge-expanding {
    background: rgba(255, 171, 0, 0.15);
    color: #ffab00;
    border: 1px solid rgba(255, 171, 0, 0.4);
}

/* Directory Cards */
.coverage-card {
    background: var(--clr-bg-card);
    border: 1px solid var(--clr-border);
    border-radius: 12px;
    padding: 1.5rem;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.coverage-card:hover {
    transform: translateY(-4px);
    border-color: var(--clr-red);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
}

.coverage-card-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 0.35rem;
}

.coverage-card-sub {
    font-size: 0.8rem;
    color: var(--clr-red);
    text-transform: uppercase;
    font-weight: 600;
    margin-bottom: 0.75rem;
}

.coverage-card-desc {
    color: var(--clr-steel);
    font-size: 0.88rem;
    line-height: 1.6;
    margin-bottom: 1.25rem;
}

.btn-locate {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid var(--clr-border);
    color: #fff;
    font-size: 0.82rem;
    font-weight: 600;
    padding: 0.45rem 1rem;
    border-radius: 6px;
    transition: all 0.2s;
}

.coverage-card:hover .btn-locate {
    background: var(--clr-red);
    border-color: var(--clr-red);
}

/* Custom Marker Icon Pulse */
.filao-pin-icon {
    background: var(--clr-red);
    border: 3px solid #fff;
    border-radius: 50%;
    box-shadow: 0 0 15px rgba(229, 25, 55, 0.8);
}
</style>

<!-- =====================================================================
     HERO SECTION
     ===================================================================== -->
<section class="hero-section" style="min-height:50vh; align-items:flex-end; padding-bottom:4rem;">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=1920&q=80');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-slash"></div>
    <div class="hero-grid"></div>
    
    <div class="container-fluid px-4 hero-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="hero-eyebrow">NAIROBI REGION & METROPOLITAN COVERAGE</div>
                <h1 class="hero-title" style="font-size:clamp(2.5rem, 5vw, 4rem);">
                    High-Speed Fiber in <span class="line-accent">Your Neighborhood</span>
                </h1>
                <p class="hero-desc mt-3" style="max-width:700px;">
                    Filao Networks is dedicated to serving the Nairobi Metropolitan Region—including Kasarani, Githurai, Kahawa West, Kahawa Wendani, Ruiru, Roysambu, and CBD corridors.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- =====================================================================
     INTERACTIVE MAP & DATABASE TOOLBAR
     ===================================================================== -->
<main style="padding:4rem 0 6rem;">
    <div class="container-fluid px-4">
        
        <!-- TOOLBAR: SEARCH & FILTER -->
        <div class="map-toolbar">
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <div class="filter-pills" id="filterPills">
                    <button class="filter-pill active" data-filter="all">All Nairobi Areas</button>
                    <button class="filter-pill" data-filter="Active Fiber & Wireless">Active Fiber & Wireless</button>
                    <button class="filter-pill" data-filter="Expanding">Expanding</button>
                </div>
                <div style="position:relative; width: 280px;">
                    <input type="text" id="searchAreaInput" class="form-control" placeholder="Search town or estate (e.g. Kasarani)..."
                           style="background:rgba(255,255,255,0.05); border:1px solid var(--clr-border); color:var(--text-main); border-radius:30px; padding:0.45rem 1.25rem; font-size:0.85rem;">
                    <i class="fa-solid fa-magnifying-glass" style="position:absolute; right:15px; top:50%; transform:translateY(-50%); color:var(--clr-steel); font-size:0.8rem;"></i>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn-filao btn-outline-filao" id="resetZoomBtn" style="padding:0.5rem 1.2rem; font-size:0.85rem;">
                    <i class="fa-solid fa-compress me-2"></i> Center Nairobi View
                </button>
            </div>
        </div>

        <!-- THE INTERACTIVE LEAFLET MAP (LIGHT MODE) -->
        <div id="coverageMap"></div>

        <!-- =====================================================================
             COVERAGE DIRECTORY CARDS (POPULATED BY MYSQL DATABASE)
             ===================================================================== -->
        <div class="mt-5 pt-3">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h2 style="color:var(--text-main); font-family:var(--font-heading); font-size:1.8rem;">Nairobi Region Coverage Directory</h2>
                    <p style="color:var(--clr-steel); font-size:0.95rem; margin-bottom:0;">Click any location card to focus the map and view service availability.</p>
                </div>
                <span class="badge" id="directoryCountBadge" style="background:var(--clr-navy-light); border:1px solid var(--clr-border); font-size:0.85rem; padding:0.5rem 1rem;">
                    Loading areas...
                </span>
            </div>

            <div class="row g-4" id="coverageGrid">
                <!-- Dynamic cards inserted via JavaScript -->
            </div>
        </div>

    </div>
</main>

<!-- =====================================================================
     CALL TO ACTION
     ===================================================================== -->
<section style="background:#f0f4ff; padding:5rem 0; text-align:center; border-top:1px solid var(--clr-border);">
    <div class="container">
        <h2 class="section-title mb-3">Need Fiber in Your Building or Gated Community?</h2>
        <p class="section-desc mx-auto mb-4" style="max-width:600px;">
            We deploy custom fiber rings, dedicated leased lines, and smart security grids across Nairobi and Kiambu counties.
        </p>
        <a href="<?= $root ?>company/quote" class="btn-filao btn-primary-filao">Request Site Survey & Quote &rarr;</a>
    </div>
</section>

<!-- Leaflet.js JavaScript (100% Free OpenStreetMap) -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize Leaflet Map centered on Nairobi / Thika Corridor
    const map = L.map('coverageMap', {
        center: [-1.2185, 36.8864], // Centered around Roysambu/Kasarani/Nairobi corridor
        zoom: 11,
        minZoom: 8,
        maxZoom: 18,
        scrollWheelZoom: true
    });

    // Light Mode OpenStreetMap Base Tiles (Light Mode always, even when site is Dark Mode)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 19
    }).addTo(map);

    // Explicitly configure Leaflet Default Blue Teardrop Marker Pin with CDN images
    const defaultBluePin = L.icon({
        iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png',
        iconRetinaUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png',
        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    const defaultNairobiPins = [
        { id: 1, name: 'Roysambu & TRM Corridor', region: 'Nairobi County', latitude: '-1.218500', longitude: '36.886400', status: 'Active Fiber & Wireless', speed: 'Up to 1 Gbps Home & Business Fiber', description: 'High-density FTTH network serving residential apartments, businesses around TRM, and Lumumba Drive.' },
        { id: 2, name: 'Kasarani & Mwiki Corridor', region: 'Nairobi County', latitude: '-1.222500', longitude: '36.895600', status: 'Active Fiber & Wireless', speed: 'Up to 1 Gbps FTTH & Dedicated Lines', description: 'Extensive fiber optic distribution covering Kasarani ICIPE road, Seasons, Clay City, and commercial centers.' },
        { id: 3, name: 'Githurai 44 & 45', region: 'Nairobi County', latitude: '-1.196900', longitude: '36.906900', status: 'Active Fiber & Wireless', speed: 'Up to 500 Mbps Fiber & AirFiber', description: 'High-speed broadband for residential estates and commercial businesses along the Githurai corridor.' },
        { id: 4, name: 'Kahawa West & Kamiti', region: 'Nairobi County', latitude: '-1.195000', longitude: '36.877000', status: 'Active Fiber & Wireless', speed: 'Up to 500 Mbps FTTH', description: 'Reliable home fiber and smart security surveillance across Kahawa West estates and Kamiti Road.' },
        { id: 5, name: 'Kahawa Wendani & Sukari', region: 'Kiambu County', latitude: '-1.173000', longitude: '36.928000', status: 'Active Fiber & Wireless', speed: 'Up to 1 Gbps Residential Fiber', description: 'Dedicated high-speed fiber serving university community estates, residential apartments, and shopping hubs.' },
        { id: 6, name: 'Ruiru Town & Bypass', region: 'Kiambu County', latitude: '-1.147200', longitude: '36.960800', status: 'Active Fiber & Wireless', speed: 'Up to 10 Gbps Enterprise & Home Fiber', description: 'Enterprise leased lines, Eastern/Northern bypass industrial connectivity, and fast residential fiber.' },
        { id: 7, name: 'Nairobi CBD & Upperhill', region: 'Nairobi County', latitude: '-1.286389', longitude: '36.817223', status: 'Active Fiber & Wireless', speed: 'Up to 10 Gbps Enterprise & Home Fiber', description: 'High-density fiber optic ring serving commercial buildings, Upperhill financial district, and corporate enterprises.' },
        { id: 8, name: 'Westlands Tech Corridor', region: 'Nairobi County', latitude: '-1.267500', longitude: '36.804444', status: 'Active Fiber & Wireless', speed: 'Up to 1 Gbps Residential & Business', description: 'Direct FTTH coverage across residential apartments, tech hubs, and commercial offices.' },
        { id: 9, name: 'Kilimani & Hurlingham', region: 'Nairobi County', latitude: '-1.289500', longitude: '36.786500', status: 'Active Fiber & Wireless', speed: 'Up to 1 Gbps FTTH', description: 'Enterprise fiber and home broadband for apartments, offices, and shopping centers.' },
        { id: 10, name: 'Karen Residential Area', region: 'Nairobi County', latitude: '-1.321000', longitude: '36.708500', status: 'Active Fiber & Wireless', speed: 'Up to 500 Mbps Fiber', description: 'Dedicated residential fiber optic and CCTV security grids for Karen estates.' },
        { id: 11, name: 'South B & South C', region: 'Nairobi County', latitude: '-1.313000', longitude: '36.835000', status: 'Active Fiber & Wireless', speed: 'Up to 500 Mbps FTTH', description: 'Fast home internet and business broadband for residential courts and shopping malls.' },
        { id: 12, name: 'Zimmerman & Mirema', region: 'Nairobi County', latitude: '-1.211000', longitude: '36.892000', status: 'Active Fiber & Wireless', speed: 'Up to 500 Mbps FTTH & AirFiber', description: 'High-speed home fiber covering Mirema Drive, Zimmerman estates, and commercial buildings.' },
        { id: 13, name: 'Ruaka & Kiambu Road', region: 'Kiambu County', latitude: '-1.206667', longitude: '36.785000', status: 'Active Fiber & Wireless', speed: 'Up to 500 Mbps FTTH', description: 'Fast-expanding residential fiber network across apartments and gated communities.' },
        { id: 14, name: 'Thika Town & Industrial Hub', region: 'Kiambu County', latitude: '-1.033260', longitude: '37.069330', status: 'Active Fiber & Wireless', speed: 'Up to 500 Mbps Industrial Fiber', description: 'Industrial area leased lines, residential fiber, and CCTV security grids.' },
        { id: 15, name: 'Eastleigh & Juja Road', region: 'Nairobi County', latitude: '-1.275000', longitude: '36.852000', status: 'Expanding', speed: 'Up to 500 Mbps Wireless & Fiber', description: 'High-speed internet for commercial malls, wholesale centers, and residential blocks.' }
    ];

    let allPinsData = [];
    let markersLayer = L.layerGroup().addTo(map);
    let activeFilter = 'all';

    // 2. Load Coverage Pins from MySQL Database via API (with foolproof fallback to defaultNairobiPins)
    function loadCoveragePins() {
        const apiUrl = '<?= $root ?>api/coverage_pins.php?t=' + new Date().getTime();
        fetch(apiUrl)
            .then(res => res.json())
            .then(data => {
                if (data && data.status === 'success' && Array.isArray(data.data) && data.data.length > 0) {
                    allPinsData = data.data;
                } else {
                    allPinsData = defaultNairobiPins;
                }
                renderMapMarkers(allPinsData);
                renderDirectoryCards(allPinsData);
            })
            .catch(err => {
                console.warn('API fetch failed or redirected, using default Nairobi pins fallback:', err);
                allPinsData = defaultNairobiPins;
                renderMapMarkers(allPinsData);
                renderDirectoryCards(allPinsData);
            });
    }

    // 3. Render Markers on Leaflet Map
    function renderMapMarkers(pins) {
        markersLayer.clearLayers();

        pins.forEach(pin => {
            if (activeFilter !== 'all' && pin.status !== activeFilter) return;

            const lat = parseFloat(pin.latitude);
            const lng = parseFloat(pin.longitude);
            if (isNaN(lat) || isNaN(lng) || lat === 0 || lng === 0) return;

            // Classic Blue Teardrop Pin Marker with shadow
            const marker = L.marker([lat, lng], { icon: defaultBluePin });

            const badgeClass = pin.status === 'Active Fiber & Wireless' ? 'coverage-badge-active' : 'coverage-badge-expanding';

            const popupContent = `
                <div style="min-width: 230px; padding: 4px;">
                    <div class="coverage-popup-title">${pin.name}</div>
                    <div class="coverage-popup-region"><i class="fa-solid fa-location-dot me-1"></i> ${pin.region}</div>
                    <div><span class="coverage-badge ${badgeClass}">● ${pin.status}</span></div>
                    <div style="font-size: 0.8rem; color: #fff; margin-bottom: 0.5rem; font-weight: 600;">
                        <i class="fa-solid fa-bolt me-1" style="color:var(--clr-red);"></i> ${pin.speed}
                    </div>
                    <div style="font-size: 0.82rem; color: var(--clr-steel); line-height: 1.5; margin-bottom: 0.75rem;">
                        ${pin.description || 'Enterprise fiber & wireless broadband coverage available.'}
                    </div>
                    <a href="<?= $root ?>company/quote?area=${encodeURIComponent(pin.name)}"
                       class="btn-filao btn-primary-filao d-block text-center"
                       style="padding: 0.4rem 0.5rem; font-size: 0.78rem; text-decoration: none;">
                       Request Connection &rarr;
                    </a>
                </div>
            `;

            marker.bindPopup(popupContent);
            marker.pinId = pin.id;
            markersLayer.addLayer(marker);
        });
    }

    // 4. Render Directory Cards in Grid
    function renderDirectoryCards(pins) {
        const grid = document.getElementById('coverageGrid');
        const badge = document.getElementById('directoryCountBadge');

        const filteredPins = pins.filter(pin => {
            const matchesFilter = (activeFilter === 'all' || pin.status === activeFilter);
            const searchQuery = document.getElementById('searchAreaInput').value.toLowerCase();
            const matchesSearch = !searchQuery || pin.name.toLowerCase().includes(searchQuery) || pin.region.toLowerCase().includes(searchQuery);
            return matchesFilter && matchesSearch;
        });

        badge.textContent = `${filteredPins.length} Location${filteredPins.length === 1 ? '' : 's'} Active`;
        grid.innerHTML = '';

        if (filteredPins.length === 0) {
            grid.innerHTML = `
                <div class="col-12 text-center py-5" style="color:var(--clr-steel);">
                    <i class="fa-solid fa-map-location-dot fa-3x mb-3" style="opacity:0.3;"></i>
                    <p>No matching coverage areas found. Try a different filter or search query.</p>
                </div>
            `;
            return;
        }

        filteredPins.forEach(pin => {
            const badgeClass = pin.status === 'Active Fiber & Wireless' ? 'coverage-badge-active' : 'coverage-badge-expanding';

            const card = document.createElement('div');
            card.className = 'col-lg-4 col-md-6';
            card.innerHTML = `
                <div class="coverage-card" data-lat="${pin.latitude}" data-lng="${pin.longitude}" data-id="${pin.id}">
                    <div>
                        <div class="d-flex justify-content-between align-items-start">
                            <h3 class="coverage-card-title">${pin.name}</h3>
                        </div>
                        <div class="coverage-card-sub">${pin.region}</div>
                        <div><span class="coverage-badge ${badgeClass}">● ${pin.status}</span></div>
                        <p class="coverage-card-desc mt-2">${pin.description || 'High-speed fiber and networking available.'}</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-3" style="border-top: 1px solid var(--clr-border);">
                        <span style="font-size:0.75rem; color:var(--text-main); font-weight:700;"><i class="fa-solid fa-gauge-high me-1" style="color:var(--clr-red);"></i> ${pin.speed}</span>
                        <span class="btn-locate"><i class="fa-solid fa-location-crosshairs me-1"></i> Locate</span>
                    </div>
                </div>
            `;

            // Fly to pin on card click
            card.querySelector('.coverage-card').addEventListener('click', () => {
                const lat = parseFloat(pin.latitude);
                const lng = parseFloat(pin.longitude);
                map.flyTo([lat, lng], 14, { duration: 1.5 });

                // Open popup on marker
                markersLayer.eachLayer(layer => {
                    if (layer.pinId === pin.id) {
                        setTimeout(() => layer.openPopup(), 1500);
                    }
                });

                // Smooth scroll to map
                document.getElementById('coverageMap').scrollIntoView({ behavior: 'smooth', block: 'center' });
            });

            grid.appendChild(card);
        });
    }

    // 5. Filter Pills click handler
    document.querySelectorAll('.filter-pill').forEach(pill => {
        pill.addEventListener('click', () => {
            document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
            pill.classList.add('active');
            activeFilter = pill.getAttribute('data-filter');
            renderMapMarkers(allPinsData);
            renderDirectoryCards(allPinsData);
        });
    });

    // 6. Search input handler
    document.getElementById('searchAreaInput').addEventListener('input', () => {
        renderDirectoryCards(allPinsData);
    });

    // 7. Reset Zoom Button (Centers on Nairobi / Thika Corridor)
    document.getElementById('resetZoomBtn').addEventListener('click', () => {
        map.flyTo([-1.2185, 36.8864], 11, { duration: 1.5 });
    });

    // Load initial pins on start
    loadCoveragePins();
});
</script>

<?php include "../includes/footer.php"; ?>
