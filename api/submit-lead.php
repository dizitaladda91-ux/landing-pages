<?php
// PHP Backend Endpoint for Saving Customer Leads & Applications
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // If opened directly via browser form submit, redirect back with success message
    $fullName = trim($_POST['full_name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $brandName = trim($_POST['brand_name'] ?? '');
} else {
    // Handle AJAX or FORM POST
    $inputData = json_decode(file_get_contents('php://input'), true);
    if (!$inputData) {
        $inputData = $_POST;
    }
    $fullName = trim($inputData['full_name'] ?? '');
    $phone = trim($inputData['phone'] ?? '');
    $email = trim($inputData['email'] ?? '');
    $brandName = trim($inputData['brand_name'] ?? '');
}

if (empty($fullName) || empty($phone) || empty($email)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Please fill in all required fields (Name, Phone, Email).'
    ]);
    exit;
}

// Generate unique lead ID
$leadId = 'TM-LEAD-' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));

$newLead = [
    'lead_id' => $leadId,
    'full_name' => htmlspecialchars($fullName),
    'phone' => htmlspecialchars($phone),
    'email' => htmlspecialchars($email),
    'brand_name' => htmlspecialchars($brandName),
    'created_at' => date('Y-m-d H:i:s'),
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1'
];

// Save lead to local JSON database file
$dataFile = __DIR__ . '/../data/leads.json';
$dataDir = dirname($dataFile);

if (!is_dir($dataDir)) {
    mkdir($dataDir, 0777, true);
}

$leadsList = [];
if (file_exists($dataFile)) {
    $existing = file_get_contents($dataFile);
    $leadsList = json_decode($existing, true) ?: [];
}

$leadsList[] = $newLead;
file_put_contents($dataFile, json_encode($leadsList, JSON_PRETTY_PRINT));

// Return JSON response
echo json_encode([
    'success' => true,
    'lead_id' => $leadId,
    'message' => "Application Request Received! Senior IP Attorney will call you at {$phone} within 15 minutes."
]);
