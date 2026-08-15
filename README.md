# Edwin Corporate Law Firm - Trademark Registration Consultancy Web App (PHP Version)

A complete, production-ready, conversion-optimized Trademark Registration landing page & lead management web application for **Edwin Corporate Law Firm**, built entirely using **PHP, HTML5, Vanilla CSS, and JavaScript**.

## 📁 Directory Structure

```
trademark-landing-page/
├── index.php             # Main PHP Landing Page
├── styles.css            # Modern CSS Design System & Responsive Styles
├── script.js            # Frontend JS for PHP AJAX API Calls & Interactions
├── includes/
│   ├── data.php          # PHP Master Configuration, Classes Data, Prices & FAQs
│   ├── header.php        # Top Bar & Navigation Bar PHP Header Template
│   └── footer.php        # Footer, Floating Action Buttons & Modal PHP Template
├── api/
│   ├── search.php        # PHP API Endpoint for Live Trademark Search & Risk Analysis
│   └── submit-lead.php   # PHP API Endpoint for Validating & Saving Customer Leads
└── data/
    └── leads.json        # Local JSON Lead Database (Auto-generated upon submission)
```

## 🚀 How to Run on PHP

### Option 1: Built-in PHP Development Server
If PHP is installed on your computer, open PowerShell / Terminal in this directory and run:
```bash
php -S localhost:8000
```
Then visit **`http://localhost:8000`** in your web browser.

### Option 2: Apache / XAMPP / WAMP / Laragon
1. Copy the `trademark-landing-page` directory to your web server root (e.g. `C:\xampp\htdocs\trademark-landing-page`).
2. Start Apache service from XAMPP Control Panel.
3. Visit **`http://localhost/trademark-landing-page`** in your browser.

## ✨ Key Features
- **Dynamic Content rendering via PHP** (`includes/data.php`, `includes/header.php`, `includes/footer.php`).
- **PHP Live TM Availability Search API** (`api/search.php`).
- **PHP Lead Registration System** (`api/submit-lead.php`) with auto-saving to `data/leads.json`.
- **NICE Class Explorer (Classes 1 - 45)**.
- **Pricing Calculator** with MSME 50% Govt Fee discount toggle.
- **Document checklist tabs & Accordion FAQs**.
