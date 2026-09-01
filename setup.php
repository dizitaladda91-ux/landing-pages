<?php
// Composer Auto-Installation Script
// This file runs composer install automatically when visited
// Delete this file after setup is complete for security

$currentDir = __DIR__;
$output = shell_exec('cd ' . escapeshellarg($currentDir) . ' && composer install 2>&1');

echo "<h1 style='font-family: Arial; color: #333;'>Composer Installation Progress</h1>";
echo "<pre style='background: #f4f4f4; padding: 20px; border-radius: 5px; overflow: auto; max-height: 600px;'>";
echo htmlspecialchars($output);
echo "</pre>";
echo "<hr>";
echo "<p style='font-family: Arial; color: #666;'><strong>✅ Setup Complete!</strong></p>";
echo "<p style='font-family: Arial; color: #666;'>After this displays, you can:";
echo "<ol>";
echo "<li>Go back to <strong>File Manager</strong></li>";
echo "<li>Delete this <strong>setup.php</strong> file (for security)</li>";
echo "<li>Visit your website: <a href='index.php'>index.php</a></li>";
echo "</ol>";
echo "</p>";
?>
