<?php
// Lead form endpoint: saves a copy locally and sends an SMTP notification.
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Only POST requests are allowed.']);
    exit;
}

$inputData = json_decode(file_get_contents('php://input'), true);
if (!is_array($inputData)) {
    $inputData = $_POST;
}

$fullName = trim($inputData['full_name'] ?? '');
$phone = trim($inputData['phone'] ?? '');
$email = trim($inputData['email'] ?? '');
$brandName = trim($inputData['brand_name'] ?? '');
$service = trim($inputData['service'] ?? '');

if ($fullName === '' || $phone === '' || $email === '' || $brandName === '' || $service === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
    exit;
}

$leadId = 'TM-LEAD-' . strtoupper(substr(bin2hex(random_bytes(8)), 0, 8));
$newLead = [
    'lead_id' => $leadId,
    'full_name' => $fullName,
    'phone' => $phone,
    'email' => $email,
    'brand_name' => $brandName,
    'service' => $service,
    'created_at' => date('Y-m-d H:i:s'),
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
];

// Local backup of every lead. Ensure the server can write to the /data folder.
$dataFile = __DIR__ . '/../data/leads.json';
$dataDir = dirname($dataFile);
if (!is_dir($dataDir) && !mkdir($dataDir, 0755, true) && !is_dir($dataDir)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Unable to create the lead storage directory.']);
    exit;
}

$leadsList = file_exists($dataFile) ? (json_decode((string) file_get_contents($dataFile), true) ?: []) : [];
$leadsList[] = $newLead;
if (file_put_contents($dataFile, json_encode($leadsList, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX) === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Unable to save the lead.']);
    exit;
}

// SMTP settings are intentionally kept in a separate private file.
// Developer: copy api/smtp-config.php.example to api/smtp-config.php and fill its values.
// Never commit smtp-config.php or share the SMTP password in chat.
$smtpConfigFile = __DIR__ . '/smtp-config.php';
if (!file_exists($smtpConfigFile)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Lead saved, but SMTP is not configured yet.']);
    exit;
}

// PHPMailer must be installed once on the live server by running: composer install
$autoloadFile = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($autoloadFile)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Lead saved, but the email library is not installed yet.']);
    exit;
}

require $autoloadFile;
$smtp = require $smtpConfigFile;

try {
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $smtp['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $smtp['username'];
    $mail->Password = $smtp['password'];
    $mail->SMTPSecure = $smtp['encryption']; // STARTTLS for 587; SMTPS for 465.
    $mail->Port = (int) $smtp['port'];
    $mail->CharSet = 'UTF-8';

    // From address should normally be the same as the authenticated SMTP mailbox.
    $mail->setFrom($smtp['from_email'], $smtp['from_name']);
    $mail->addAddress($smtp['to_email']); // Inbox where all website leads will arrive.
    $mail->addReplyTo($email, $fullName); // Clicking Reply opens the customer's email address.
    $mail->isHTML(true);
    $mail->Subject = "New Website Lead: {$fullName} | {$leadId}";
    $mail->Body = '<h2>New Lead Received</h2>'
        . '<p><strong>Lead ID:</strong> ' . htmlspecialchars($leadId, ENT_QUOTES, 'UTF-8') . '</p>'
        . '<p><strong>Name:</strong> ' . htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8') . '</p>'
        . '<p><strong>Phone:</strong> ' . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . '</p>'
        . '<p><strong>Email:</strong> ' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</p>'
        . '<p><strong>Brand / Logo:</strong> ' . htmlspecialchars($brandName, ENT_QUOTES, 'UTF-8') . '</p>'
        . '<p><strong>Service:</strong> ' . htmlspecialchars($service, ENT_QUOTES, 'UTF-8') . '</p>'
        . '<p><strong>Submitted:</strong> ' . date('d M Y, h:i A') . '</p>';
    $mail->AltBody = "New Lead Received\n\nLead ID: {$leadId}\nName: {$fullName}\nPhone: {$phone}\nEmail: {$email}\nBrand / Logo: {$brandName}\nService: {$service}";
    $mail->send();
} catch (\PHPMailer\PHPMailer\Exception $exception) {
    error_log("Lead {$leadId} email failed: " . $exception->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Lead was saved, but the email notification could not be sent.']);
    exit;
}

echo json_encode([
    'success' => true,
    'lead_id' => $leadId,
    'message' => "Application Request Received! Senior IP Attorney will call you at {$phone} within 15 minutes.",
]);
