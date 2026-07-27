<?php
/**
 * Filao Networks Solutions - Admin Coverage Map & Pins Management
 */
$page_title = 'Coverage Map & Pins';
require_once __DIR__ . '/includes/header.php';

// Ensure coverage_areas table exists
$pdo->exec("CREATE TABLE IF NOT EXISTS coverage_areas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    region VARCHAR(100) NOT NULL,
    latitude DECIMAL(10, 7) NOT NULL,
    longitude DECIMAL(10, 7) NOT NULL,
    status VARCHAR(50) DEFAULT 'Active Fiber & Wireless',
    speed VARCHAR(100) DEFAULT 'Up to 1 Gbps Fiber',
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// Handle Coverage Pin Deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_coverage_pin') {
    $pin_id = (int)$_POST['pin_id'];
    $stmt = $pdo->prepare("DELETE FROM coverage_areas WHERE id = ?");
    $stmt->execute([$pin_id]);
    $_SESSION['msg'] = "Coverage pin deleted successfully.";
    header("Location: coverage.php");
    exit;
}

// Handle Coverage Pin Addition
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_coverage_pin') {
    $name = trim($_POST['name']);
    $region = trim($_POST['region']);
    $latitude = floatval($_POST['latitude']);
    $longitude = floatval($_POST['longitude']);
    $status = trim($_POST['status']);
    $speed = trim($_POST['speed']);
    $description = trim($_POST['description']);
    
    if ($name && $region && $latitude != 0.0 && $longitude != 0.0) {
        try {
            $stmt = $pdo->prepare("INSERT INTO coverage_areas (name, region, latitude, longitude, status, speed, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$name, $region, $latitude, $longitude, $status, $speed, $description]);
            $_SESSION['msg'] = "Coverage pin added successfully: " . htmlspecialchars($name);
        } catch(PDOException $e) {
            $_SESSION['err'] = "Error adding coverage pin: " . $e->getMessage();
        }
    } else {
        $_SESSION['err'] = "Please provide valid Name, Region, Latitude and Longitude coordinates.";
    }
    header("Location: coverage.php");
    exit;
}

$coverage_pins = $pdo->query("SELECT * FROM coverage_areas ORDER BY id DESC")->fetchAll();
?>

<!-- Leaflet CSS for Map Picker -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<style>
    #adminMapPicker {
        height: 380px;
        width: 100%;
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        z-index: 1;
    }
</style>

<div class="row g-4 mb-4">
    <!-- Interactive Map Coordinate Picker -->
    <div class="col-12 col-xl-7">
        <div class="card-modern h-100 mb-0">
            <div class="card-modern-header">
                <span><i class="fa-solid fa-map-location-dot me-2" style="color:var(--clr-red);"></i>Interactive Coordinates Picker</span>
                <span class="badge bg-danger">Click anywhere on the map!</span>
            </div>
            <div class="p-3">
                <p class="small text-muted mb-2"><i class="fa-solid fa-hand-pointer me-1 text-danger"></i> Click on any spot in Nairobi or Kenya below to automatically fill its Latitude & Longitude in the form.</p>
                <div id="adminMapPicker"></div>
            </div>
        </div>
    </div>

    <!-- Add New Pin Form -->
    <div class="col-12 col-xl-5">
        <div class="card-modern h-100 mb-0">
            <div class="card-modern-header">
                <span><i class="fa-solid fa-plus-circle me-2" style="color:var(--clr-red);"></i>Add Coverage Pin</span>
            </div>
            <div class="p-4">
                <form method="POST" action="coverage.php">
                    <input type="hidden" name="action" value="add_coverage_pin">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Location / Area Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="e.g., Kasarani & Mwiki Corridor" required>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold small">County / Region <span class="text-danger">*</span></label>
                            <input type="text" name="region" class="form-control" placeholder="e.g., Nairobi County" value="Nairobi County" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small">Status</label>
                            <select name="status" class="form-select">
                                <option value="Active Fiber & Wireless">Active Fiber & Wireless</option>
                                <option value="Expanding">Expanding / Planned</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold small">Latitude <span class="text-danger">*</span></label>
                            <input type="number" step="any" name="latitude" id="adminPinLat" class="form-control" placeholder="-1.222500" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small">Longitude <span class="text-danger">*</span></label>
                            <input type="number" step="any" name="longitude" id="adminPinLng" class="form-control" placeholder="36.895600" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small">Speed Headline</label>
                        <input type="text" name="speed" class="form-control" placeholder="e.g., Up to 1 Gbps Home & Business Fiber" value="Up to 1 Gbps Home & Business Fiber">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small">Area Coverage Description</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="e.g., Extensive fiber optic distribution covering Kasarani ICIPE road, Seasons, Clay City..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-filao w-100">
                        <i class="fa-solid fa-map-pin me-2"></i> Save Coverage Pin
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Existing Coverage Pins Table -->
<div class="card-modern">
    <div class="card-modern-header">
        <span><i class="fa-solid fa-list-ul me-2" style="color:var(--clr-red);"></i>Active Coverage Map Pins (<?= count($coverage_pins) ?> Locations)</span>
        <span class="small text-muted">All pins appear on the public Coverage Map page</span>
    </div>
    <div class="p-0 table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th>Area / Corridor Name</th>
                    <th>Region / County</th>
                    <th>Coordinates (Lat, Lng)</th>
                    <th>Status</th>
                    <th>Speed Headline</th>
                    <th class="text-end" style="width: 110px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($coverage_pins)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No coverage pins found. Use the map or form above to add your first pin!</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($coverage_pins as $pin): ?>
                        <tr>
                            <td class="text-muted fw-bold">#<?= (int)$pin['id'] ?></td>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($pin['name']) ?></td>
                            <td><span class="badge bg-secondary-subtle text-secondary-emphasis"><?= htmlspecialchars($pin['region']) ?></span></td>
                            <td>
                                <code><?= number_format((float)$pin['latitude'], 5) ?>, <?= number_format((float)$pin['longitude'], 5) ?></code>
                            </td>
                            <td>
                                <?php if ($pin['status'] === 'Active Fiber & Wireless'): ?>
                                    <span class="badge bg-success-subtle text-success"><i class="fa-solid fa-circle small me-1"></i> <?= htmlspecialchars($pin['status']) ?></span>
                                <?php else: ?>
                                    <span class="badge bg-warning-subtle text-warning"><i class="fa-solid fa-circle small me-1"></i> <?= htmlspecialchars($pin['status']) ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="small"><?= htmlspecialchars($pin['speed']) ?></td>
                            <td class="text-end">
                                <form method="POST" action="coverage.php" onsubmit="return confirm('Are you sure you want to permanently delete <?= htmlspecialchars(addslashes($pin['name'])) ?> from the map?');" style="display:inline;">
                                    <input type="hidden" name="action" value="delete_coverage_pin">
                                    <input type="hidden" name="pin_id" value="<?= (int)$pin['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Pin">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
$extra_js = '
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const pickerMapEl = document.getElementById("adminMapPicker");
    if (pickerMapEl && typeof L !== "undefined") {
        // Initialize Map centered on Nairobi
        const pickerMap = L.map("adminMapPicker").setView([-1.2185, 36.8864], 11);

        // OpenStreetMap light tiles
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "&copy; <a href=\'https://www.openstreetmap.org/copyright\'>OpenStreetMap</a> contributors",
            maxZoom: 19
        }).addTo(pickerMap);

        // Explicit standard blue teardrop icon
        const defaultBluePin = L.icon({
            iconUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png",
            iconRetinaUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png",
            shadowUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png",
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        let selectedMarker = null;

        // Click to pick coordinates
        pickerMap.on("click", function(e) {
            const lat = e.latlng.lat.toFixed(6);
            const lng = e.latlng.lng.toFixed(6);

            document.getElementById("adminPinLat").value = lat;
            document.getElementById("adminPinLng").value = lng;

            if (selectedMarker) {
                selectedMarker.setLatLng(e.latlng);
            } else {
                selectedMarker = L.marker(e.latlng, { icon: defaultBluePin }).addTo(pickerMap);
            }

            selectedMarker.bindPopup(`<b>Selected Spot:</b><br>Lat: ${lat}<br>Lng: ${lng}<br><i>Form auto-filled!</i>`).openPopup();
        });
    }
});
</script>
';
require_once __DIR__ . '/includes/footer.php'; 
?>
