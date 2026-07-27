<?php
/**
 * Filao Networks Solutions - Coverage Map Pins API
 * - Focuses on Nairobi & Metropolitan Region (Kasarani, Githurai, Kahawa West, Kahawa Wendani, Ruiru, Roysambu, etc.)
 * - GET: Returns all coverage pins as JSON
 * - POST: Adds a new custom pin to the database
 * - DELETE / action=delete: Deletes a pin by ID
 */

header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';

// 1. Create table if not exists
$createTableSQL = "CREATE TABLE IF NOT EXISTS coverage_areas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    region VARCHAR(100) NOT NULL,
    latitude DECIMAL(10, 7) NOT NULL,
    longitude DECIMAL(10, 7) NOT NULL,
    status VARCHAR(50) DEFAULT 'Active Fiber & Wireless',
    speed VARCHAR(100) DEFAULT 'Up to 1 Gbps Fiber',
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

try {
    $pdo->exec($createTableSQL);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Table creation error: ' . $e->getMessage()]);
    exit;
}

// 2. Clean up any invalid/zero coordinates and check if Nairobi Region pins exist
$pdo->exec("DELETE FROM coverage_areas WHERE latitude IS NULL OR longitude IS NULL OR latitude = 0 OR longitude = 0");

$stmt = $pdo->prepare("SELECT COUNT(*) FROM coverage_areas WHERE name = ?");
$stmt->execute(['Roysambu & TRM Corridor']);
$nairobiCount = $stmt->fetchColumn();

$stmtTotal = $pdo->query("SELECT COUNT(*) FROM coverage_areas");
$totalCount = $stmtTotal->fetchColumn();

if ($nairobiCount == 0 || $totalCount < 10) {
    $pdo->exec("TRUNCATE TABLE coverage_areas");
    $defaultPins = [
        ['Roysambu & TRM Corridor', 'Nairobi County', -1.218500, 36.886400, 'Active Fiber & Wireless', 'Up to 1 Gbps Home & Business Fiber', 'High-density FTTH network serving residential apartments, businesses around TRM, and Lumumba Drive.'],
        ['Kasarani & Mwiki Corridor', 'Nairobi County', -1.222500, 36.895600, 'Active Fiber & Wireless', 'Up to 1 Gbps FTTH & Dedicated Lines', 'Extensive fiber optic distribution covering Kasarani ICIPE road, Seasons, Clay City, and commercial centers.'],
        ['Githurai 44 & 45', 'Nairobi County', -1.196900, 36.906900, 'Active Fiber & Wireless', 'Up to 500 Mbps Fiber & AirFiber', 'High-speed broadband for residential estates and commercial businesses along the Githurai corridor.'],
        ['Kahawa West & Kamiti', 'Nairobi County', -1.195000, 36.877000, 'Active Fiber & Wireless', 'Up to 500 Mbps FTTH', 'Reliable home fiber and smart security surveillance across Kahawa West estates and Kamiti Road.'],
        ['Kahawa Wendani & Sukari', 'Kiambu County', -1.173000, 36.928000, 'Active Fiber & Wireless', 'Up to 1 Gbps Residential Fiber', 'Dedicated high-speed fiber serving university community estates, residential apartments, and shopping hubs.'],
        ['Ruiru Town & Bypass', 'Kiambu County', -1.147200, 36.960800, 'Active Fiber & Wireless', 'Up to 10 Gbps Enterprise & Home Fiber', 'Enterprise leased lines, Eastern/Northern bypass industrial connectivity, and fast residential fiber.'],
        ['Nairobi CBD & Upperhill', 'Nairobi County', -1.286389, 36.817223, 'Active Fiber & Wireless', 'Up to 10 Gbps Enterprise & Home Fiber', 'High-density fiber optic ring serving commercial buildings, Upperhill financial district, and corporate enterprises.'],
        ['Westlands Tech Corridor', 'Nairobi County', -1.267500, 36.804444, 'Active Fiber & Wireless', 'Up to 1 Gbps Residential & Business', 'Direct FTTH coverage across residential apartments, tech hubs, and commercial offices.'],
        ['Kilimani & Hurlingham', 'Nairobi County', -1.289500, 36.786500, 'Active Fiber & Wireless', 'Up to 1 Gbps FTTH', 'Enterprise fiber and home broadband for apartments, offices, and shopping centers.'],
        ['Karen Residential Area', 'Nairobi County', -1.321000, 36.708500, 'Active Fiber & Wireless', 'Up to 500 Mbps Fiber', 'Dedicated residential fiber optic and CCTV security grids for Karen estates.'],
        ['South B & South C', 'Nairobi County', -1.313000, 36.835000, 'Active Fiber & Wireless', 'Up to 500 Mbps FTTH', 'Fast home internet and business broadband for residential courts and shopping malls.'],
        ['Zimmerman & Mirema', 'Nairobi County', -1.211000, 36.892000, 'Active Fiber & Wireless', 'Up to 500 Mbps FTTH & AirFiber', 'High-speed home fiber covering Mirema Drive, Zimmerman estates, and commercial buildings.'],
        ['Ruaka & Kiambu Road', 'Kiambu County', -1.206667, 36.785000, 'Active Fiber & Wireless', 'Up to 500 Mbps FTTH', 'Fast-expanding residential fiber network across apartments and gated communities.'],
        ['Thika Town & Industrial Hub', 'Kiambu County', -1.033260, 37.069330, 'Active Fiber & Wireless', 'Up to 500 Mbps Industrial Fiber', 'Industrial area leased lines, residential fiber, and CCTV security grids.'],
        ['Eastleigh & Juja Road', 'Nairobi County', -1.275000, 36.852000, 'Expanding', 'Up to 500 Mbps Wireless & Fiber', 'High-speed internet for commercial malls, wholesale centers, and residential blocks.']
    ];

    $insertSQL = "INSERT INTO coverage_areas (name, region, latitude, longitude, status, speed, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = $pdo->prepare($insertSQL);
    foreach ($defaultPins as $pin) {
        $insertStmt->execute($pin);
    }
}


// 3. Handle API Requests
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$action = $_GET['action'] ?? '';

if ($method === 'GET') {
    // Return all pins
    $stmt = $pdo->query("SELECT * FROM coverage_areas ORDER BY name ASC");
    $pins = $stmt->fetchAll();
    echo json_encode([
        'status' => 'success',
        'count'  => count($pins),
        'data'   => $pins
    ]);
    exit;
}

if ($method === 'POST') {
    $inputJSON = file_get_contents('php://input');
    $data = json_decode($inputJSON, true);
    if (!$data) {
        $data = $_POST;
    }

    if ($action === 'delete') {
        $id = intval($data['id'] ?? 0);
        if ($id <= 0) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid Pin ID']);
            exit;
        }
        $delStmt = $pdo->prepare("DELETE FROM coverage_areas WHERE id = ?");
        $delStmt->execute([$id]);
        echo json_encode(['status' => 'success', 'message' => 'Pin deleted successfully']);
        exit;
    }

    // Default POST: Add a new custom pin
    $name = trim($data['name'] ?? '');
    $region = trim($data['region'] ?? '');
    $latitude = floatval($data['latitude'] ?? 0);
    $longitude = floatval($data['longitude'] ?? 0);
    $status = trim($data['status'] ?? 'Active Fiber & Wireless');
    $speed = trim($data['speed'] ?? 'Up to 1 Gbps Fiber');
    $description = trim($data['description'] ?? '');

    if (empty($name) || empty($region) || $latitude === 0.0 || $longitude === 0.0) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Please fill in Name, Region, valid Latitude, and Longitude.'
        ]);
        exit;
    }

    $insertSQL = "INSERT INTO coverage_areas (name, region, latitude, longitude, status, speed, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($insertSQL);
    $stmt->execute([$name, $region, $latitude, $longitude, $status, $speed, $description]);

    echo json_encode([
        'status' => 'success',
        'message' => 'Coverage pin added successfully!',
        'id' => $pdo->lastInsertId()
    ]);
    exit;
}
