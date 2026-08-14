<?php
if (!isset($siteConfig)) {
    require_once __DIR__ . '/data.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trademark® Registration Online in India | Protect Brand & Logo - LegalAegis</title>
  <meta name="description" content="Register your Trademark & Protect your Logo/Brand Name online in India with ISO certified IP Attorneys. Free Trademark Search, Same day filing & TM Receipt.">
  <meta name="keywords" content="Trademark Registration, TM Filing India, Logo Protection, Online Legal Services, Trademark Search">
  
  <!-- Google Fonts & FontAwesome -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Custom Stylesheet -->
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <!-- Top Announcement Bar -->
  <div class="top-bar">
    <div class="top-bar-container">
      <div class="top-info">
        <div class="top-info-item">
          <i class="fas fa-phone-alt"></i>
          <span>Helpdesk: <strong><?php echo htmlspecialchars($siteConfig['phone']); ?></strong></span>
        </div>
        <div class="top-info-item">
          <i class="fas fa-envelope"></i>
          <span><?php echo htmlspecialchars($siteConfig['email']); ?></span>
        </div>
        <div class="top-badge">
          <i class="fas fa-certificate"></i> <?php echo htmlspecialchars($siteConfig['isoCert']); ?>
        </div>
      </div>
      <div class="top-links">
        <a href="#pricing"><i class="fas fa-tags"></i> View Govt Fees</a>
        <a href="#faqs"><i class="fas fa-question-circle"></i> TM Help</a>
        <a href="#" onclick="openLeadModal()"><i class="fas fa-user-lock"></i> Client Login</a>
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="nav-container">
      <a href="index.php" class="logo">
        <div class="logo-icon"><img src="Log-transparent.png" width="42" height="42" alt="LegalAegis scales of justice logo"></div>
        <div>LegalAegis<span>®</span></div>
      </a>
      
      <ul class="nav-menu" id="primary-navigation">
        <li><a href="#search" class="nav-link">TM Search</a></li>
        <li><a href="#benefits" class="nav-link">Benefits</a></li>
        <li><a href="#classes" class="nav-link">TM Classes</a></li>
        <li><a href="#process" class="nav-link">Process</a></li>
        <li><a href="#pricing" class="nav-link">Pricing</a></li>
        <li><a href="#documents" class="nav-link">Documents</a></li>
        <li><a href="#faqs" class="nav-link">FAQs</a></li>
        <li class="nav-mobile-cta"><button class="nav-btn" onclick="openLeadModal()"><i class="fas fa-file-signature"></i> Start TM Application</button></li>
      </ul>

      <button class="nav-btn" onclick="openLeadModal()">
        <i class="fas fa-file-signature"></i> Start TM Application
      </button>

      <button class="mobile-toggle" type="button" aria-label="Open navigation menu" aria-expanded="false" aria-controls="primary-navigation">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </nav>
