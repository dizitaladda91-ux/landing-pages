<?php
// PHP Backend Endpoint for Saving Customer Leads & Applications
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Only POST requests are allowed.']);
    exit;
}

// Read input (AJAX JSON or normal form POST)
$inputData = json_decode(file_get_contents('php://input'), true);
if (!is_array($inputData)) {
    $inputData = $_POST;
}

$fullName  = trim($inputData['full_name']  ?? '');
$phone     = trim($inputData['phone']      ?? '');
$email     = trim($inputData['email']      ?? '');
$brandName = trim($inputData['brand_name'] ?? '');
$service   = trim($inputData['service']    ?? '');

// Validation
if ($fullName === '' || $phone === '' || $email === '' || $brandName === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields (Name, Phone, Email, Brand Name).']);
    exit;
}

// Generate unique lead ID
$leadId = 'TM-LEAD-' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));

$newLead = [
    'lead_id'    => $leadId,
    'full_name'  => $fullName,
    'phone'      => $phone,
    'email'      => $email,
    'brand_name' => $brandName,
    'service'    => $service,
    'created_at' => date('d M Y, h:i A'),
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
];

// ==========================================
// 1. Local JSON Backup (data/leads.json)
// ==========================================
$dataFile = __DIR__ . '/../data/leads.json';
$dataDir  = dirname($dataFile);
if (!is_dir($dataDir)) {
    mkdir($dataDir, 0755, true);
}
$leadsList   = file_exists($dataFile) ? (json_decode((string) file_get_contents($dataFile), true) ?: []) : [];
$leadsList[] = $newLead;
file_put_contents($dataFile, json_encode($leadsList, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);

// ==========================================
// 2. Google Sheet Webhook Integration
// Leads directly Google Sheet mein save hongi
// ==========================================
$googleSheetWebhookUrl = 'https://script.google.com/macros/s/AKfycbygeijIgNdJxVfkOBOTzfmKTpr8K6Vu3dGnGWeb9afeqQ30vYUjWV95G1LbizWsZAg5/exec';

$ch = curl_init($googleSheetWebhookUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($newLead));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json',
]);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 8);
curl_exec($ch);
curl_close($ch);

// ==========================================
// 3. Email Notification via Web3Forms API
// (Vercel compatible - 100% Free)
// web3forms.com se Access Key lo aur yahan paste karo
// ==========================================
$web3formsKey = 'YOUR_WEB3FORMS_ACCESS_KEY'; // <-- Yahan apni key paste karo
$adminEmail   = 'enquiry@edwincorporatelawfirm.com';

if (!empty($web3formsKey) && $web3formsKey !== 'YOUR_WEB3FORMS_ACCESS_KEY') {
    $emailPayload = [
        'access_key' => $web3formsKey,
        'to'         => $adminEmail,
        'from_name'  => 'Edwin Corporate Law Firm Website',
        'subject'    => "New Trademark Lead: {$fullName} | {$leadId}",
        'message'    =>
            "NEW LEAD RECEIVED\n" .
            "----------------------------\n" .
            "Lead ID     : {$leadId}\n" .
            "Name        : {$fullName}\n" .
            "Phone       : {$phone}\n" .
            "Email       : {$email}\n" .
            "Brand Name  : {$brandName}\n" .
            "Service     : {$service}\n" .
            "Date & Time : " . date('d M Y, h:i A') . "\n" .
            "----------------------------\n" .
            "Please follow up within 15 minutes.",
        'replyto'    => $email,
    ];

    $ch2 = curl_init('https://api.web3forms.com/submit');
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_POST, true);
    curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($emailPayload));
    curl_setopt($ch2, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json',
    ]);
    curl_setopt($ch2, CURLOPT_TIMEOUT, 5);
    curl_exec($ch2);
    curl_close($ch2);
}

// ==========================================
// Final JSON Response
// ==========================================
echo json_encode([
    'success' => true,
    'lead_id' => $leadId,
    'message' => "Application Request Received! Senior IP Attorney will call you at {$phone} within 15 minutes.",
]);
