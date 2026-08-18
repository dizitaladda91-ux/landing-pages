<?php
// Main PHP Landing Page for Edwin Corporate Law Firm Trademark Consultancy
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/header.php';
?>

  <!-- Hero Section -->
  <section class="hero" id="search">
    <div class="hero-container">
      <!-- Left Content -->
      <div class="hero-content">
        <div class="hero-tag">
          <i class="fas fa-award"></i> #1 Trusted Govt Recognized Trademark Attorney
        </div>
        <h1 class="hero-title">
          Online <span class="highlight">Trademark® Registration</span> in India
        </h1>
        <p class="hero-subtitle">
          Protect your Brand Name, Slogan & Logo from copycats. Get your official <strong>™ Symbol in just 24 Hours</strong> with end-to-end legal support.
        </p>

        <div class="hero-highlights">
          <div class="highlight-item">
            <i class="fas fa-check-circle"></i>
            <span><?php echo $siteConfig['totalFiled']; ?> Trademarks Filed</span>
          </div>
          <div class="highlight-item">
            <i class="fas fa-check-circle"></i>
            <span>50% Govt Fee Discount for MSME</span>
          </div>
          <div class="highlight-item">
            <i class="fas fa-check-circle"></i>
            <span>Same-Day TM Application Receipt</span>
          </div>
          <div class="highlight-item">
            <i class="fas fa-check-circle"></i>
            <span>100% Online Paperless Process</span>
          </div>
        </div>

        <!-- Instant Brand Search Box -->
        <div class="tm-search-box">
          <div class="search-box-header">
            <h4><i class="fas fa-search-dollar"></i> Free Instant Trademark Availability Search</h4>
            <span style="font-size: 0.78rem; color: var(--emerald); font-weight: 700;">
              <i class="fas fa-bolt"></i> Live IP Registry Checker
            </span>
          </div>

          <div class="search-input-group">
            <div class="search-input-wrapper">
              <i class="fas fa-tag"></i>
              <input type="text" id="searchBrandInput" placeholder="Enter Your Brand / Logo Name (e.g. Acme Tech)">
            </div>
            
            <select class="search-select" id="searchClassSelect">
              <option value="35">Class 35 - Business & E-Commerce</option>
              <option value="25">Class 25 - Apparel & Clothing</option>
              <option value="9">Class 9 - Electronics & Software</option>
              <option value="30">Class 30 - Food & Beverage</option>
              <option value="42">Class 42 - Tech & IT Services</option>
              <option value="43">Class 43 - Restaurants & Hotels</option>
            </select>

            <button class="search-btn" id="searchBrandBtn">
              <i class="fas fa-search"></i> Check Availability
            </button>
          </div>

          <div id="searchResultBox" class="search-result-box"></div>
        </div>
      </div>

      <!-- Right Form Card -->
      <div class="hero-form-wrapper">
        <div class="lead-card">
          <div class="lead-card-badge">Instant Consultation</div>
          <div class="lead-card-header">
            <h3>Protect Your Brand Today</h3>
            <p>Get Free Expert Attorney Call & Quote in 15 Mins</p>
          </div>

          <form class="lead-form" action="api/submit-lead.php" method="POST">
            <div class="form-group">
              <label class="form-label">Full Name *</label>
              <input type="text" name="full_name" class="form-control" placeholder="Enter Your Name" required>
            </div>

            <div class="form-group">
              <label class="form-label">Mobile Phone Number *</label>
              <input type="tel" name="phone" class="form-control" placeholder="Enter 10-Digit Mobile No." required pattern="[0-9]{10}">
            </div>

            <div class="form-group">
              <label class="form-label">Email Address *</label>
              <input type="email" name="email" class="form-control" placeholder="name@company.com" required>
            </div>

            <div class="form-group">
              <label class="form-label">Brand / Logo Name *</label>
              <input type="text" name="brand_name" class="form-control" placeholder="Your Proposed Brand Name" required>
            </div>

            <div class="form-group">
              <label class="form-label">Select Services <span style="color:var(--danger)">*</span></label>

              <div class="custom-select" id="serviceDropdownPHP">
                <div class="select-box" id="selectBoxPHP" tabindex="0">
                  <span id="selectedTextPHP">Select Services</span>
                  <span class="arrow"></span>
                </div>
                <div class="options-list" id="optionsListPHP">
                  <div class="option-item placeholder" data-value="">Select Services</div>
                  <div class="option-item" data-value="ngo_registration">Ngo Registration</div>
                  <div class="option-item" data-value="company_registration">Company Registration</div>
                  <div class="option-item" data-value="trademark_registration">Trademark Registration</div>
                  <div class="option-item" data-value="copyright_registration">Copyright Registration</div>
                  <div class="option-item" data-value="design_patent_registration">Design Patent Registration</div>
                  <div class="option-item" data-value="registration_services">Registration Services</div>
                  <div class="option-item" data-value="80g_12a_registration">80g/12a Registration</div>
                  <div class="option-item" data-value="firm_registration">Firm Registration</div>
                  <div class="option-item" data-value="darpan_registration">Darpan Registration</div>
                  <div class="option-item" data-value="taxation_services">Taxation Services</div>
                </div>
              </div>

              <input type="hidden" name="service" id="serviceInputPHP" required>
            </div>

            <script>
            (function () {
              const dropdown = document.getElementById('serviceDropdownPHP');
              const selectBox = document.getElementById('selectBoxPHP');
              const selectedText = document.getElementById('selectedTextPHP');
              const serviceInput = document.getElementById('serviceInputPHP');
              if (!dropdown || !selectBox) return;
              const options = dropdown.querySelectorAll('.option-item:not(.placeholder)');

              selectBox.addEventListener('click', () => {
                dropdown.classList.toggle('open');
              });

              selectBox.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                  e.preventDefault();
                  dropdown.classList.toggle('open');
                }
              });

              options.forEach(option => {
                option.addEventListener('click', () => {
                  selectedText.textContent = option.textContent;
                  selectBox.classList.add('has-value');
                  serviceInput.value = option.getAttribute('data-value');

                  options.forEach(o => o.classList.remove('selected'));
                  option.classList.add('selected');

                  dropdown.classList.remove('open');
                });
              });

              document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target)) {
                  dropdown.classList.remove('open');
                }
              });
            })();
            </script>

            <button type="submit" class="submit-btn">
              <i class="fas fa-shield-alt"></i> Apply For Trademark Protection
            </button>

            <div class="form-trust-text">
              <i class="fas fa-lock"></i> 100% Confidential & Encrypted Legal Service
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Trust Bar -->
  <section class="trust-bar">
    <div class="trust-container">
      <div class="stat-item">
        <h3><?php echo $siteConfig['totalFiled']; ?></h3>
        <p>Brands & Logos Applied</p>
      </div>
      <div class="stat-item">
        <h3><?php echo $siteConfig['avgRating']; ?></h3>
        <p>Customer Rating (5k+ Reviews)</p>
      </div>
      <div class="stat-item">
        <h3><?php echo $siteConfig['approvalRate']; ?></h3>
        <p>Application Approval Rate</p>
      </div>
      <div class="stat-item">
        <h3>15+ Years</h3>
        <p>IP Legal Expertise</p>
      </div>
    </div>
  </section>

  <!-- Client Video Proof Showcase Section -->
  <section class="client-video-section" id="clients">
    <div class="client-video-header">
      <span>Verified Application Proof</span>
      <h3>Trusted by 5,000+ Brands & Logos Across India</h3>
      <p class="section-desc" style="margin-top: 8px;">Watch real client brand applications and trademark registration proofs filed directly with the IP Registry.</p>
    </div>

    <div class="client-video-container">
      <div class="video-wrapper-card">
        <div class="video-badge">
          <i class="fas fa-check-circle"></i> 5,000+ Verified Brand Application Record
        </div>
        <div class="video-frame">
          <video controls autoplay muted loop playsinline preload="metadata">
            <source src="video.png.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
        <div class="video-footer-info">
          <div class="v-info-item">
            <i class="fas fa-shield-alt"></i>
            <span>Official Government IP India Filings</span>
          </div>
          <div class="v-info-item">
            <i class="fas fa-certificate"></i>
            <span>End-to-End Legal Representation</span>
          </div>
          <div class="v-info-item">
            <i class="fas fa-user-check"></i>
            <span>Adv. Ajay Verma & Team Advisory</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Founder Profile Section -->
  <section class="section section-alt" id="founder">
    <div class="section-header">
      <span class="section-subtitle">Leadership & Legal Practice</span>
      <h2 class="section-title">Meet Our Founder & Principal Advocate</h2>
      <p class="section-desc">Guided by dedicated legal counsel with proven expertise in Brand & IP Law.</p>
    </div>

    <div class="founder-box">
      <div class="founder-card">
        <div class="founder-avatar">
          <img src="images/ajay_verma.png" alt="<?php echo htmlspecialchars($founderData['name']); ?> - <?php echo htmlspecialchars($founderData['title']); ?>" class="founder-avatar-img">
          <span class="founder-badge"><?php echo htmlspecialchars($founderData['experience']); ?></span>
        </div>
        
        <div class="founder-content">
          <h3><?php echo htmlspecialchars($founderData['name']); ?></h3>
          <div class="founder-title">
            <i class="fas fa-gavel"></i> <?php echo htmlspecialchars($founderData['title']); ?> | <?php echo htmlspecialchars($founderData['firm']); ?>
          </div>
          <p><?php echo htmlspecialchars($founderData['bio']); ?></p>
          <div class="founder-quote">
            <i class="fas fa-quote-left" style="color: var(--secondary); margin-right: 8px;"></i>
            "<?php echo htmlspecialchars($founderData['quote']); ?>"
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Register Trademark (Benefits) -->
  <section class="section" id="benefits">
    <div class="section-header">
      <span class="section-subtitle">Why You Need A Trademark</span>
      <h2 class="section-title">Key Benefits of Registering Your Logo & Brand Name</h2>
      <p class="section-desc">Building a successful brand takes years. Protect your hard work from infringement and legal risk.</p>
    </div>

    <div class="benefits-grid">
      <div class="benefit-card">
        <div class="benefit-icon"><i class="fas fa-copyright"></i></div>
        <h4>Exclusive Legal Ownership</h4>
        <p>Grants you total legal rights to use your brand name & logo across all 28 states and union territories in India.</p>
      </div>

      <div class="benefit-card">
        <div class="benefit-icon"><i class="fas fa-trademark"></i></div>
        <h4>Use ™ & ® Symbols Immediately</h4>
        <p>Use the ™ symbol on your products right after application filing, and the ® symbol once final registration is issued.</p>
      </div>

      <div class="benefit-card">
        <div class="benefit-icon"><i class="fas fa-ban"></i></div>
        <h4>Protection Against Copycats</h4>
        <p>Stop competitors and duplicate manufacturers from illegally copying or misusing your brand identity or logo.</p>
      </div>

      <div class="benefit-card">
        <div class="benefit-icon"><i class="fas fa-chart-line"></i></div>
        <h4>Valuable Intangible Asset</h4>
        <p>A registered trademark is an asset that increases company valuation, allowing franchising, licensing, or sale.</p>
      </div>

      <div class="benefit-card">
        <div class="benefit-icon"><i class="fas fa-globe-asia"></i></div>
        <h4>Global Expansion Ready</h4>
        <p>Easily expand your brand internationally under the Madrid Protocol using your Indian Trademark base application.</p>
      </div>

      <div class="benefit-card">
        <div class="benefit-icon"><i class="fas fa-history"></i></div>
        <h4>10-Year Protection & Renewable</h4>
        <p>Your trademark protection remains valid for 10 full years and can be renewed indefinitely every 10 years.</p>
      </div>
    </div>
  </section>

  <!-- Class Explorer -->
  <section class="section section-alt" id="classes">
    <div class="section-header">
      <span class="section-subtitle">NICE Classification Finder</span>
      <h2 class="section-title">Find Your Business Trademark Class (Classes 1 - 45)</h2>
      <p class="section-desc">Trademarks are categorized into 45 distinct classes (34 for Goods & 11 for Services). Search your industry below.</p>
    </div>

    <div class="class-explorer-box">
      <div class="class-search-bar">
        <input type="text" id="classSearchInput" placeholder="🔍 Search Industry, Product or Service (e.g. Clothing, Software, Coffee)...">
      </div>

      <div class="class-grid" id="classGrid">
        <?php foreach ($tmClassesData as $c): ?>
          <div class="class-card">
            <span class="class-badge"><?php echo htmlspecialchars($c['class']); ?></span>
            <h5><?php echo htmlspecialchars($c['title']); ?></h5>
            <p><?php echo htmlspecialchars($c['desc']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Process Steps -->
  <section class="section" id="process">
    <div class="section-header">
      <span class="section-subtitle">Hassle-Free 3-Step Process</span>
      <h2 class="section-title">How Online Trademark Filing Works</h2>
      <p class="section-desc">Complete your trademark registration online from the comfort of your office or home in 3 easy steps.</p>
    </div>

    <div class="process-container">
      <div class="process-step">
        <div class="step-num">1</div>
        <i class="fas fa-search-location" style="font-size: 2rem; color: var(--primary); margin-bottom: 15px;"></i>
        <h4>Free Brand Search & Risk Check</h4>
        <p>Our IP attorneys perform a deep search in the official IP Registry to verify brand availability and avoid objection risk.</p>
      </div>

      <div class="process-step">
        <div class="step-num">2</div>
        <i class="fas fa-file-contract" style="font-size: 2rem; color: var(--primary); margin-bottom: 15px;"></i>
        <h4>Document Upload & TM-48 Authorization</h4>
        <p>Provide your logo, PAN, Aadhaar & signed Form TM-48 authorization form online without physical paperwork.</p>
      </div>

      <div class="process-step">
        <div class="step-num">3</div>
        <i class="fas fa-paper-plane" style="font-size: 2rem; color: var(--primary); margin-bottom: 15px;"></i>
        <h4>Filing & Instant ™ Acknowledgement</h4>
        <p>We file Form TM-A with the Trademark Registry. You receive your official TM Application receipt to start using the ™ symbol!</p>
      </div>
    </div>
  </section>

  <!-- Pricing Cards -->
  <section class="section section-alt" id="pricing">
    <div class="section-header">
      <span class="section-subtitle">Transparent Pricing</span>
      <h2 class="section-title">Select The Best Trademark Protection Package</h2>
      <p class="section-desc">No hidden charges. Clear professional fees + official Government statutory fees.</p>
    </div>

    <div class="pricing-container">
      <div class="pricing-toggle">
        <span>Individual / Proprietor / MSME</span>
        <label class="switch">
          <input type="checkbox" id="pricingToggle">
          <span class="slider"></span>
        </label>
        <span>Large Corporate (Non-MSME)</span>
      </div>

      <div class="pricing-grid">
        <?php foreach ($pricingPackages as $pkg): ?>
          <div class="pricing-card <?php echo $pkg['popular'] ? 'popular' : ''; ?>">
            <?php if ($pkg['popular']): ?>
              <div class="popular-ribbon">Most Popular</div>
            <?php endif; ?>
            <h4><?php echo htmlspecialchars($pkg['name']); ?></h4>
            <div class="price-amount">₹<?php echo htmlspecialchars($pkg['price']); ?> <span>+ Govt Fee</span></div>
            <div class="govt-fee-note"><i class="fas fa-info-circle"></i> Govt Fee: ₹4,500 per class (With MSME)</div>

            <ul class="pricing-features">
              <?php foreach ($pkg['features'] as $feat): ?>
                <li><i class="fas fa-check"></i> <?php echo htmlspecialchars($feat); ?></li>
              <?php endforeach; ?>
            </ul>

            <button class="pricing-btn" onclick="openLeadModal()">Select Plan</button>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Required Documents -->
  <section class="section" id="documents">
    <div class="section-header">
      <span class="section-subtitle">Checklist</span>
      <h2 class="section-title">Documents Required for Trademark Registration</h2>
      <p class="section-desc">Keep these scanned documents ready for quick 15-minute online filing.</p>
    </div>

    <div class="docs-container">
      <div class="docs-tabs">
        <button class="tab-btn active" data-target="individual">Individual / Proprietorship</button>
        <button class="tab-btn" data-target="company">Pvt Ltd / LLP / Partnership</button>
        <button class="tab-btn" data-target="msme">MSME / Startup India</button>
      </div>

      <div class="docs-content-box">
        <div class="doc-list" id="docListContainer"></div>
      </div>
    </div>
  </section>

  <!-- FAQs -->
  <section class="section section-alt" id="faqs">
    <div class="section-header">
      <span class="section-subtitle">Got Questions?</span>
      <h2 class="section-title">Frequently Asked Questions</h2>
      <p class="section-desc">Everything you need to know about Trademark Registration in India.</p>
    </div>

    <div class="faq-container">
      <?php foreach ($faqList as $idx => $faq): ?>
        <div class="faq-item <?php echo $idx === 0 ? 'active' : ''; ?>">
          <div class="faq-question">
            <span><?php echo htmlspecialchars($faq['q']); ?></span>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">
            <?php echo htmlspecialchars($faq['a']); ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
