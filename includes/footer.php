<?php
if (!isset($siteConfig)) {
    require_once __DIR__ . '/data.php';
}
?>
  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="footer-brand">
        <div class="footer-brand-logo">
          <div class="logo-icon" style="width: 42px; height: 42px; flex: 0 0 42px;"><img src="images/logo_icon.png" alt="Edwin Corporate Law Firm logo"></div>
          <h3 style="margin-bottom:0; color: white;">Edwin Corporate Law Firm</h3>
        </div>
        <p>
          India's trusted corporate law firm and intellectual property practice. We specialize in Trademark Registration, Brand Protection, IP Litigation, and Corporate Compliance.
        </p>
        <p><i class="fas fa-map-marker-alt"></i> Corporate HQ: <?php echo htmlspecialchars($siteConfig['address']); ?></p>
      </div>

      <div class="footer-column">
        <h4>Trademark Services</h4>
        <ul>
          <li><a href="#search">Trademark Registration</a></li>
          <li><a href="#search">Trademark Search</a></li>
          <li><a href="#pricing">Trademark Renewal</a></li>
          <li><a href="#faqs">Objection Reply</a></li>
          <li><a href="#faqs">Trademark Opposition</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Other Services</h4>
        <ul>
          <li><a href="#">Copyright Registration</a></li>
          <li><a href="#">Patent Filing India</a></li>
          <li><a href="#">Pvt Ltd Registration</a></li>
          <li><a href="#">LLP Incorporation</a></li>
          <li><a href="#">MSME Udyam Registration</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Contact & Legal</h4>
        <p><strong>Hotline:</strong> <?php echo htmlspecialchars($siteConfig['phone']); ?></p>
        <p><strong>Hotline:</strong> <?php echo htmlspecialchars($siteConfig['phone2']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($siteConfig['email']); ?></p>
        <p style="margin-top: 10px; font-size: 0.8rem;">
          <?php echo htmlspecialchars($siteConfig['isoCert']); ?> | Recognized Advocates
        </p>
      </div>
    </div>

    <div class="footer-bottom">
      <div>© <?php echo date('Y'); ?> Edwin Corporate Law Firm. All Rights Reserved.</div>
      <div>Disclaimer: Edwin Corporate Law Firm is an independent legal practice portal and is not directly affiliated with the Government IP India portal.</div>
    </div>
  </footer>

  <!-- Floating Contact Buttons -->
  <div class="floating-actions">
    <a href="https://wa.me/91<?php echo $siteConfig['phoneRaw']; ?>?text=Hi,%20I%20want%20to%20register%20my%20Trademark" target="_blank" class="float-btn float-whatsapp" title="Chat on WhatsApp">
      <i class="fab fa-whatsapp"></i>
    </a>
    <a href="tel:<?php echo $siteConfig['phoneRaw']; ?>" class="float-btn float-phone" title="Call Attorney">
      <i class="fas fa-phone-alt"></i>
    </a>
  </div>

  <!-- Modal for Lead Capture -->
  <div class="modal-backdrop" id="leadModal">
    <div class="modal-content">
      <button class="modal-close" id="modalCloseBtn">&times;</button>
      <div class="lead-card-header">
        <h3><i class="fas fa-shield-alt" style="color: var(--primary);"></i> File Your Trademark Application</h3>
        <p>Fill out the details below to receive expert attorney guidance</p>
      </div>

      <form class="lead-form" action="api/submit-lead.php" method="POST">
        <div class="form-group">
          <label class="form-label">Full Name *</label>
          <input type="text" name="full_name" class="form-control" placeholder="Your Full Name" required>
        </div>

        <div class="form-group">
          <label class="form-label">Phone Number *</label>
          <input type="tel" name="phone" class="form-control" placeholder="10-Digit Mobile Number" required pattern="[0-9]{10}">
        </div>

        <div class="form-group">
          <label class="form-label">Email *</label>
          <input type="email" name="email" class="form-control" placeholder="yourname@gmail.com" required>
        </div>

        <div class="form-group">
          <label class="form-label">Proposed Brand / Logo Name *</label>
          <input type="text" name="brand_name" class="form-control" placeholder="Brand Name" required>
        </div>

        <button type="submit" class="submit-btn">
          Submit Application Request &rarr;
        </button>
      </form>
    </div>
  </div>

  <!-- Toast Notification -->
  <div class="toast-msg" id="toastMsg"></div>

  <!-- JavaScript File -->
  <script src="script.js"></script>
</body>
</html>
