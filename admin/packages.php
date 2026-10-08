<?php
/**
 * Filao Networks Solutions - Admin Wi-Fi Packages Management
 */
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../api/db.php';

// Handle Package Deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_package') {
    $package_id = (int)$_POST['package_id'];
    $stmt = $pdo->prepare("DELETE FROM wifi_packages WHERE id = ?");
    $stmt->execute([$package_id]);
    $_SESSION['msg'] = "Package deleted successfully.";
    header("Location: packages.php");
    exit;
}

// Handle Package Addition/Editing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && in_array($_POST['action'], ['add_package', 'edit_package'])) {
    $id = isset($_POST['package_id']) ? (int)$_POST['package_id'] : 0;
    $type = trim($_POST['type']);
    $name = trim($_POST['name']);
    $speed = (int)$_POST['speed'];
    $speed_unit = trim($_POST['speed_unit']);
    $price = (float)$_POST['price'];
    $period = trim($_POST['period']);
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    $is_popular = isset($_POST['is_popular']) ? 1 : 0;
    $sort_order = (int)$_POST['sort_order'];
    
    // Process features
    $features = [];
    if (!empty($_POST['feature_texts'])) {
        foreach ($_POST['feature_texts'] as $index => $text) {
            $text = trim($text);
            if (!empty($text)) {
                $features[] = [
                    'text' => $text,
                    'included' => isset($_POST['feature_included'][$index]) ? true : false
                ];
            }
        }
    }
    $features_json = json_encode($features);
    
    if ($name && $type && $speed > 0 && $price >= 0) {
        try {
            if ($_POST['action'] === 'add_package') {
                $stmt = $pdo->prepare("INSERT INTO wifi_packages (type, name, speed, speed_unit, price, period, features, is_featured, is_popular, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$type, $name, $speed, $speed_unit, $price, $period, $features_json, $is_featured, $is_popular, $sort_order]);
                $_SESSION['msg'] = "Package added successfully: " . htmlspecialchars($name);
            } else {
                $stmt = $pdo->prepare("UPDATE wifi_packages SET type=?, name=?, speed=?, speed_unit=?, price=?, period=?, features=?, is_featured=?, is_popular=?, sort_order=? WHERE id=?");
                $stmt->execute([$type, $name, $speed, $speed_unit, $price, $period, $features_json, $is_featured, $is_popular, $sort_order, $id]);
                $_SESSION['msg'] = "Package updated successfully: " . htmlspecialchars($name);
            }
        } catch(PDOException $e) {
            $_SESSION['err'] = "Error saving package: " . $e->getMessage();
        }
    } else {
        $_SESSION['err'] = "Please provide all required fields.";
    }
    header("Location: packages.php");
    exit;
}

$page_title = 'Wi-Fi Packages';
require_once __DIR__ . '/includes/header.php';

$packages = $pdo->query("SELECT * FROM wifi_packages ORDER BY sort_order ASC, id DESC")->fetchAll();
?>

<div class="row g-4 mb-4">
    <!-- List Packages -->
    <div class="col-12 col-xl-8">
        <div class="card-modern h-100 mb-0">
            <div class="card-modern-header d-flex justify-content-between align-items-center">
                <div>
                    <span><i class="fa-solid fa-wifi me-2" style="color:var(--clr-red);"></i>Active Wi-Fi Packages (<?= count($packages) ?>)</span>
                </div>
            </div>
            <div class="p-0 table-responsive">
                <table class="table table-hover align-middle mb-0 custom-table">
                    <thead class="table-light">
                        <tr>
                            <th>Type</th>
                            <th>Package Name</th>
                            <th>Speed</th>
                            <th>Price</th>
                            <th>Flags</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($packages)): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No packages added yet.</td>
                            </tr>
                        <?php endif; ?>
                        
                        <?php foreach ($packages as $pkg): ?>
                            <tr>
                                <td><span class="badge bg-secondary"><?= htmlspecialchars($pkg['type']) ?></span></td>
                                <td class="fw-bold"><?= htmlspecialchars($pkg['name']) ?></td>
                                <td><?= htmlspecialchars($pkg['speed'] . $pkg['speed_unit']) ?></td>
                                <td>KSh <?= number_format($pkg['price']) ?> <?= htmlspecialchars($pkg['period']) ?></td>
                                <td>
                                    <?php if($pkg['is_featured']): ?><span class="badge bg-primary">Featured</span><?php endif; ?>
                                    <?php if($pkg['is_popular']): ?><span class="badge bg-danger">Popular</span><?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary me-1" onclick='editPackage(<?= json_encode($pkg) ?>)' title="Edit"><i class="fa-solid fa-pen"></i></button>
                                    <form method="POST" action="packages.php" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this package?');">
                                        <input type="hidden" name="action" value="delete_package">
                                        <input type="hidden" name="package_id" value="<?= $pkg['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add/Edit Package Form -->
    <div class="col-12 col-xl-4">
        <div class="card-modern h-100 mb-0">
            <div class="card-modern-header">
                <span id="form-title"><i class="fa-solid fa-plus-circle me-2" style="color:var(--clr-red);"></i>Add New Package</span>
            </div>
            <div class="p-4">
                <form method="POST" action="packages.php" id="packageForm">
                    <input type="hidden" name="action" id="form-action" value="add_package">
                    <input type="hidden" name="package_id" id="package_id" value="">
                    
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold small">Type</label>
                            <select name="type" id="pkg_type" class="form-select" required>
                                <option value="Residential">Residential</option>
                                <option value="Business">Business</option>
                                <option value="Enterprise">Enterprise</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small">Name</label>
                            <input type="text" name="name" id="pkg_name" class="form-control" placeholder="Home Basic" required>
                        </div>
                    </div>
                    
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold small">Speed</label>
                            <input type="number" name="speed" id="pkg_speed" class="form-control" placeholder="20" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small">Speed Unit</label>
                            <input type="text" name="speed_unit" id="pkg_speed_unit" class="form-control" value="Mbps">
                        </div>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold small">Price</label>
                            <input type="number" step="0.01" name="price" id="pkg_price" class="form-control" placeholder="2499" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small">Period</label>
                            <input type="text" name="period" id="pkg_period" class="form-control" value="/month">
                        </div>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-4">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_featured" id="pkg_is_featured" value="1">
                                <label class="form-check-label small" for="pkg_is_featured">Featured</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_popular" id="pkg_is_popular" value="1">
                                <label class="form-check-label small" for="pkg_is_popular">Popular</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label fw-bold small mb-0">Sort Order</label>
                            <input type="number" name="sort_order" id="pkg_sort_order" class="form-control form-control-sm" value="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small d-flex justify-content-between">
                            Features 
                            <button type="button" class="btn btn-sm btn-link p-0" onclick="addFeatureRow()">+ Add</button>
                        </label>
                        <div id="features-container">
                            <div class="d-flex align-items-center mb-1 feature-row">
                                <input class="form-check-input me-2" type="checkbox" name="feature_included[0]" value="1" checked>
                                <input type="text" name="feature_texts[0]" class="form-control form-control-sm" placeholder="Feature description">
                                <button type="button" class="btn btn-sm text-danger ms-1" onclick="this.parentElement.remove()"><i class="fa-solid fa-times"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-danger w-100" id="submitBtn">Save Package</button>
                        <button type="button" class="btn btn-secondary w-100 d-none" id="cancelBtn" onclick="resetForm()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
let featureCount = 1;
function addFeatureRow(text = '', included = true) {
    const container = document.getElementById('features-container');
    const row = document.createElement('div');
    row.className = 'd-flex align-items-center mb-1 feature-row';
    
    const isChecked = included ? 'checked' : '';
    const safeText = text.replace(/"/g, '&quot;');
    
    row.innerHTML = `
        <input class="form-check-input me-2" type="checkbox" name="feature_included[${featureCount}]" value="1" ${isChecked}>
        <input type="text" name="feature_texts[${featureCount}]" class="form-control form-control-sm" placeholder="Feature description" value="${safeText}">
        <button type="button" class="btn btn-sm text-danger ms-1" onclick="this.parentElement.remove()"><i class="fa-solid fa-times"></i></button>
    `;
    container.appendChild(row);
    featureCount++;
}

function editPackage(pkg) {
    document.getElementById('form-title').innerHTML = '<i class="fa-solid fa-pen me-2" style="color:var(--clr-red);"></i>Edit Package';
    document.getElementById('form-action').value = 'edit_package';
    document.getElementById('package_id').value = pkg.id;
    
    document.getElementById('pkg_type').value = pkg.type;
    document.getElementById('pkg_name').value = pkg.name;
    document.getElementById('pkg_speed').value = pkg.speed;
    document.getElementById('pkg_speed_unit').value = pkg.speed_unit;
    document.getElementById('pkg_price').value = pkg.price;
    document.getElementById('pkg_period').value = pkg.period;
    document.getElementById('pkg_is_featured').checked = pkg.is_featured == 1;
    document.getElementById('pkg_is_popular').checked = pkg.is_popular == 1;
    document.getElementById('pkg_sort_order').value = pkg.sort_order;
    
    document.getElementById('submitBtn').textContent = 'Update Package';
    document.getElementById('cancelBtn').classList.remove('d-none');
    
    const container = document.getElementById('features-container');
    container.innerHTML = ''; // clear existing
    
    if (pkg.features) {
        try {
            const features = JSON.parse(pkg.features);
            features.forEach(f => {
                addFeatureRow(f.text, f.included);
            });
        } catch(e) {}
    }
    
    if (container.children.length === 0) {
        addFeatureRow();
    }
    
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function resetForm() {
    document.getElementById('packageForm').reset();
    document.getElementById('form-title').innerHTML = '<i class="fa-solid fa-plus-circle me-2" style="color:var(--clr-red);"></i>Add New Package';
    document.getElementById('form-action').value = 'add_package';
    document.getElementById('package_id').value = '';
    
    document.getElementById('submitBtn').textContent = 'Save Package';
    document.getElementById('cancelBtn').classList.add('d-none');
    
    const container = document.getElementById('features-container');
    container.innerHTML = '';
    addFeatureRow();
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
