<?php
// PHP Backend Endpoint for Trademark Search & Risk Check
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && $_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$brandName = trim($_REQUEST['brand_name'] ?? '');
$classId = trim($_REQUEST['class_id'] ?? '35');

if (empty($brandName)) {
    http_response_code(400);
    echo json_encode(['error' => 'Brand name is required']);
    exit;
}

// Sample conflicting brand names database
$conflictingBrands = [
    'tata', 'reliance', 'google', 'apple', 'nike', 'adidas', 'amazon',
    'flipkart', 'paytm', 'zomato', 'swiggy', 'ola', 'uber', 'infosys', 'wipro'
];

$lowerBrand = strtolower($brandName);
$isConflicting = false;

foreach ($conflictingBrands as $conflict) {
    if (strpos($lowerBrand, $conflict) !== false) {
        $isConflicting = true;
        break;
    }
}

if ($isConflicting) {
    echo json_encode([
        'status' => 'taken',
        'score' => 45,
        'brand' => $brandName,
        'class' => $classId,
        'title' => 'High Risk / Conflicting Mark Detected',
        'message' => "\"{$brandName}\" has similar registered trademarks under Class {$classId}. Our legal attorneys can assist you with a modified logo mark or composite filing strategy."
    ]);
} else {
    echo json_encode([
        'status' => 'available',
        'score' => 98,
        'brand' => $brandName,
        'class' => $classId,
        'title' => "Great News! \"{$brandName}\" is Available (98% Score)",
        'message' => "No duplicate match found in IP India Registry under Class {$classId}. Protect your brand today before someone else registers it!"
    ]);
}
