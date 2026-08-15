// Interactive Frontend Logic for Edwin Corporate Law Firm Trademark Consultancy Platform

document.addEventListener('DOMContentLoaded', () => {
  initTrademarkSearch();
  initClassExplorer();
  initPricingToggle();
  initDocTabs();
  initFaqAccordion();
  initLeadForms();
  initMobileMenu();
});

// 1. Instant Trademark Search via PHP API (api/search.php)
function initTrademarkSearch() {
  const searchInput = document.getElementById('searchBrandInput');
  const searchSelect = document.getElementById('searchClassSelect');
  const searchBtn = document.getElementById('searchBrandBtn');
  const resultBox = document.getElementById('searchResultBox');

  if (!searchBtn) return;

  searchBtn.addEventListener('click', () => {
    const brandName = searchInput.value.trim();
    const classVal = searchSelect.value;

    if (!brandName) {
      alert('Please enter your Brand/Logo Name to search.');
      return;
    }

    // Show loading state
    searchBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Querying IP Registry...';
    searchBtn.disabled = true;

    // Fetch from PHP API
    fetch(`api/search.php?brand_name=${encodeURIComponent(brandName)}&class_id=${encodeURIComponent(classVal)}`)
      .then(res => res.json())
      .then(data => {
        searchBtn.innerHTML = '<i class="fas fa-search"></i> Check Availability';
        searchBtn.disabled = false;

        resultBox.classList.add('active');

        if (data.status === 'taken') {
          resultBox.className = 'search-result-box active result-taken';
          resultBox.innerHTML = `
            <div style="display: flex; align-items: center; gap: 12px;">
              <i class="fas fa-exclamation-triangle" style="font-size: 1.5rem;"></i>
              <div>
                <strong>${data.title}</strong>
                <p style="font-size: 0.85rem; margin-top: 2px;">${data.message}</p>
                <button onclick="openLeadModal('${data.brand}', '${data.class}')" style="margin-top: 8px; padding: 6px 14px; background: #991b1b; color: white; border-radius: 4px; font-weight: 700; font-size: 0.8rem;">
                  Consult Attorney for Brand Modification &rarr;
                </button>
              </div>
            </div>
          `;
        } else {
          resultBox.className = 'search-result-box active result-available';
          resultBox.innerHTML = `
            <div style="display: flex; align-items: center; gap: 12px;">
              <i class="fas fa-check-circle" style="font-size: 1.5rem;"></i>
              <div>
                <strong>${data.title}</strong>
                <p style="font-size: 0.85rem; margin-top: 2px;">${data.message}</p>
                <button onclick="openLeadModal('${data.brand}', '${data.class}')" style="margin-top: 8px; padding: 6px 14px; background: #065f46; color: white; border-radius: 4px; font-weight: 700; font-size: 0.8rem;">
                  File Application Now for ₹3,999 &rarr;
                </button>
              </div>
            </div>
          `;
        }
      })
      .catch(err => {
        searchBtn.innerHTML = '<i class="fas fa-search"></i> Check Availability';
        searchBtn.disabled = false;
        alert('Server response error. Please try again.');
      });
  });
}

// 2. Class Explorer Live Filter
function initClassExplorer() {
  const classSearch = document.getElementById('classSearchInput');
  const classCards = document.querySelectorAll('.class-card');

  if (classSearch && classCards.length > 0) {
    classSearch.addEventListener('input', (e) => {
      const q = e.target.value.toLowerCase();
      classCards.forEach(card => {
        const text = card.innerText.toLowerCase();
        if (text.includes(q)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  }
}

// 3. Pricing Toggle Logic
function initPricingToggle() {
  const toggle = document.getElementById('pricingToggle');
  const priceNotes = document.querySelectorAll('.govt-fee-note');

  if (!toggle) return;

  toggle.addEventListener('change', () => {
    const isCompany = toggle.checked;

    priceNotes.forEach(note => {
      if (isCompany) {
        note.innerHTML = '<i class="fas fa-info-circle"></i> Govt Fee: ₹9,000 per class (Without MSME)';
      } else {
        note.innerHTML = '<i class="fas fa-info-circle"></i> Govt Fee: ₹4,500 per class (With 50% MSME Discount)';
      }
    });
  });
}

// 4. Document Tab Switcher
const docData = {
  individual: [
    { icon: 'fa-id-card', title: 'PAN Card & Aadhaar Card of Applicant' },
    { icon: 'fa-image', title: 'Brand Logo Copy (JPEG/PNG Format)' },
    { icon: 'fa-file-signature', title: 'Signed Form TM-48 Authorization' },
    { icon: 'fa-certificate', title: 'Udyam MSME Certificate (For 50% Fee Discount)' },
    { icon: 'fa-calendar-alt', title: 'User Affidavit (If Brand is Already in Use)' }
  ],
  company: [
    { icon: 'fa-building', title: 'Certificate of Incorporation (Pvt Ltd / LLP)' },
    { icon: 'fa-id-card', title: 'PAN Card & Address Proof of Authorized Director' },
    { icon: 'fa-image', title: 'Brand Logo Copy (JPEG/PNG)' },
    { icon: 'fa-file-signature', title: 'Signed Form TM-48 Authorization on Letterhead' },
    { icon: 'fa-stamp', title: 'MSME / Startup India Registration Certificate' }
  ],
  msme: [
    { icon: 'fa-certificate', title: 'Udyam Registration Certificate' },
    { icon: 'fa-id-card', title: 'Proprietor / Partner Aadhaar & PAN Card' },
    { icon: 'fa-image', title: 'Logo Graphic File' },
    { icon: 'fa-file-invoice', title: 'Sample Invoice/Proof showing Brand usage (Optional)' }
  ]
};

function initDocTabs() {
  const tabBtns = document.querySelectorAll('.tab-btn');
  const docContainer = document.getElementById('docListContainer');

  if (!docContainer) return;

  function renderDocs(type) {
    const list = docData[type] || docData.individual;
    docContainer.innerHTML = list.map(item => `
      <div class="doc-item">
        <i class="fas ${item.icon}"></i>
        <span>${item.title}</span>
      </div>
    `).join('');
  }

  renderDocs('individual');

  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      tabBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const target = btn.getAttribute('data-target');
      renderDocs(target);
    });
  });
}

// 5. FAQ Accordion
function initFaqAccordion() {
  const faqQuestions = document.querySelectorAll('.faq-question');

  faqQuestions.forEach(q => {
    q.addEventListener('click', () => {
      const item = q.parentElement;
      const isActive = item.classList.contains('active');

      document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));

      if (!isActive) {
        item.classList.add('active');
      }
    });
  });
}

// 6. Lead Modal & Form Submission Handling via PHP API (api/submit-lead.php)
function initLeadForms() {
  const leadForms = document.querySelectorAll('.lead-form');
  const modalBackdrop = document.getElementById('leadModal');
  const modalClose = document.getElementById('modalCloseBtn');

  if (modalClose && modalBackdrop) {
    modalClose.addEventListener('click', () => {
      modalBackdrop.classList.remove('active');
    });

    modalBackdrop.addEventListener('click', (e) => {
      if (e.target === modalBackdrop) {
        modalBackdrop.classList.remove('active');
      }
    });
  }

  leadForms.forEach(form => {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      
      const submitBtn = form.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;

      const formData = new FormData(form);

      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting to PHP Server...';
      submitBtn.disabled = true;

      fetch('api/submit-lead.php', {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        if (data.success) {
          form.reset();
          if (modalBackdrop) modalBackdrop.classList.remove('active');
          showToast(data.message);
        } else {
          alert(data.message || 'Submission failed.');
        }
      })
      .catch(err => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        alert('Server communication error.');
      });
    });
  });
}

function openLeadModal(brandName = '', classVal = '') {
  const modal = document.getElementById('leadModal');
  if (modal) {
    modal.classList.add('active');
    if (brandName) {
      const brandInput = modal.querySelector('input[name="brand_name"]');
      if (brandInput) brandInput.value = brandName;
    }
  }
}

function showToast(msg) {
  const toast = document.getElementById('toastMsg');
  if (toast) {
    toast.innerText = msg;
    toast.classList.add('active');
    setTimeout(() => {
      toast.classList.remove('active');
    }, 5000);
  }
}

// 7. Mobile Navigation Drawer
function initMobileMenu() {
  const toggle = document.querySelector('.mobile-toggle');
  const navMenu = document.querySelector('.nav-menu');

  if (toggle && navMenu) {
    toggle.addEventListener('click', () => {
      const isOpen = navMenu.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(isOpen));
      toggle.querySelector('i').className = isOpen ? 'fas fa-times' : 'fas fa-bars';
    });

    navMenu.querySelectorAll('a, button').forEach(item => item.addEventListener('click', () => {
      navMenu.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
      toggle.querySelector('i').className = 'fas fa-bars';
    }));

    window.addEventListener('resize', () => {
      if (window.innerWidth > 1180) {
        navMenu.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.querySelector('i').className = 'fas fa-bars';
      }
    });
  }
}
