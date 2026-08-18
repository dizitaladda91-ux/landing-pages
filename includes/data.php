<?php
// Centralized PHP Configuration and Master Data for Trademark Platform

$siteConfig = [
    'appName' => 'Edwin Corporate Law Firm',
    'tagline' => 'Protect Your Brand & Logo Online in India',
    'phone' => '+91 9911169979',
    'phone2' => '011 47350808',
    'phoneRaw' => '9911169979',
    'email' => 'lawfirmedwincoe@gmail.com',
    'address' => 'A-5, Ground Floor, Pamposh Enclave, Near Nehru Place Flyover, GK-1, South Delhi, New Delhi - 110048, India',
    'isoCert' => 'Govt. Registered IP Attorneys & Advocates',
    'totalFiled' => '5,000+',
    'avgRating' => '4.9 / 5',
    'approvalRate' => '99.4%'
];

// All 45 Trademark Classes Data
$tmClassesData = [
    ['class' => 'Class 1', 'title' => 'Chemicals & Resins', 'desc' => 'Chemicals used in industry, science, photography, agriculture, and unprocessed plastics.'],
    ['class' => 'Class 2', 'title' => 'Paints & Varnish', 'desc' => 'Paints, varnishes, lacquers, preservatives against rust, colorants and mordants.'],
    ['class' => 'Class 3', 'title' => 'Cosmetics & Cleaning', 'desc' => 'Non-medicated cosmetics, soaps, perfumes, essential oils, hair lotions, dentifrices.'],
    ['class' => 'Class 4', 'title' => 'Industrial Oils & Fuels', 'desc' => 'Industrial oils, greases, lubricants, dust absorbing compositions, fuels and illuminants.'],
    ['class' => 'Class 5', 'title' => 'Pharmaceuticals', 'desc' => 'Pharmaceutical and veterinary preparations, sanitary preparations, baby food, dietary supplements.'],
    ['class' => 'Class 9', 'title' => 'Electronics & Software', 'desc' => 'Mobile apps, IT software, computers, sunglasses, electrical devices, wearable tech.'],
    ['class' => 'Class 14', 'title' => 'Jewelry & Watches', 'desc' => 'Precious metals, jewelry, precious stones, horological instruments, watches.'],
    ['class' => 'Class 16', 'title' => 'Paper & Stationery', 'desc' => 'Printed matter, books, magazines, office requisites, packaging boxes, banners.'],
    ['class' => 'Class 25', 'title' => 'Clothing & Footwear', 'desc' => 'Apparel, shirts, pants, shoes, headwear, sports gear, fashion items.'],
    ['class' => 'Class 29', 'title' => 'Meats & Packaged Foods', 'desc' => 'Meat, fish, poultry, preserved fruits and vegetables, oils, milk products.'],
    ['class' => 'Class 30', 'title' => 'Coffee, Tea & Bakery', 'desc' => 'Coffee, tea, cocoa, rice, flour, bread, spices, confectionery, sweets.'],
    ['class' => 'Class 32', 'title' => 'Beverages & Juices', 'desc' => 'Beers, mineral waters, fruit juices, non-alcoholic drinks, energy drinks.'],
    ['class' => 'Class 35', 'title' => 'Business & E-Commerce', 'desc' => 'Advertising, business administration, online e-commerce stores, retail outlets.'],
    ['class' => 'Class 36', 'title' => 'Finance & Real Estate', 'desc' => 'Financial services, banking, insurance, real estate agency, brokerage, investments.'],
    ['class' => 'Class 41', 'title' => 'Education & Media', 'desc' => 'Schools, online courses, coaching classes, gaming, event management, media.'],
    ['class' => 'Class 42', 'title' => 'Technology & Web Services', 'desc' => 'SaaS products, web development, IT consultancy, scientific research, cloud solutions.'],
    ['class' => 'Class 43', 'title' => 'Restaurants & Hotels', 'desc' => 'Food catering, cafes, hotels, food delivery kitchens, temporary accommodation.'],
    ['class' => 'Class 44', 'title' => 'Medical & Beauty Care', 'desc' => 'Hospitals, clinics, dental care, salons, spas, agriculture services.'],
    ['class' => 'Class 45', 'title' => 'Legal & Security', 'desc' => 'Legal services, security consultancy, personal & social services.']
];

// Founder Profile Data
$founderData = [
    'name' => 'Adv. Ajay Verma',
    'title' => 'Founder & Principal IP Advocate',
    'firm' => 'Edwin Corporate Law Firm',
    'experience' => '15+ Years Legal Practice',
    'bio' => 'With over a decade of experience, Adv. Ajay Verma, Founder of Edwin Corporate Law Firm, is the driving force behind the firm’s vision and growth since its inception. Recognized for his pragmatic approach to IP advisory, trademark portfolio management, and strategic patent enforcement, he delivers precise legal solutions to safeguard the intellectual capital of emerging startups and established corporations.',
    'quote' => 'Protecting your brand visual identity early is the single most critical asset safeguard for any growing company.'
];

// Client Brand Logos Data
$clientLogos = [
    ['name' => 'Science Mania', 'img' => 'images/logos/science_mania.png'],
    ['name' => '121 Vibes', 'img' => 'images/logos/vibes_121.png'],
    ['name' => 'Orzee Telecommunication', 'img' => 'images/logos/orzee.png'],
    ['name' => 'Dore by Dishi', 'img' => 'images/logos/dore_by_dishi.png'],
    ['name' => 'Nano Bytes', 'img' => 'images/logos/nano_bytes.png'],
    ['name' => 'East Coast Customs', 'img' => 'images/logos/east_coast.png'],
    ['name' => 'Titanflux', 'img' => 'images/logos/titanflux.png'],
    ['name' => 'Asteri', 'img' => 'images/logos/asteri.png'],
    ['name' => 'Vedic Air', 'img' => 'images/logos/vedic_air.png'],
    ['name' => 'The Cakes Bar', 'img' => 'images/logos/cakes_bar.png'],
    ['name' => 'Sillima', 'img' => 'images/logos/sillima.png'],
    ['name' => 'Cream Ocean', 'img' => 'images/logos/cream_ocean.png'],
    ['name' => 'Firstglee', 'img' => 'images/logos/firstglee.png']
];

// Pricing Packages Data
$pricingPackages = [
    [
        'id' => 'basic',
        'name' => 'Basic',
        'price' => '3,999',
        'popular' => false,
        'features' => [
            'Comprehensive TM Search Report',
            'Class Selection Assistance',
            'TM-48 Attorney Authorization Draft',
            'Online TM Application Filing',
            'Official Govt TM Receipt',
            'Till Registration Watch & Monitor'
        ]
    ],
    [
        'id' => 'popular',
        'name' => 'Premium',
        'price' => '6,999',
        'popular' => true,
        'features' => [
            'Everything in Basic Plan',
            'Senior IP Attorney Consultation',
            'User Affidavit Drafting (Prior Use)',
            'MSME Registration Guidance (50% Fee Saver)',
            'Real-time Application Status Updates',
            'TM Certificate Dispatch Assistance',
            'Examination Report Response (Objection Reply)',
            'Examination Report Response (Objection Reply) and Formalities Check Fail Reply',
            'Trademark Watch & Infringement Monitoring till date of regsitration'
        ]
    ],
    [
        'id' => 'shield',
        'name' => 'Gold',
        'price' => '11,999',
        'popular' => false,
        'features' => [
            'Everything in Premium Plan',
            'Examination Report Response (Objection Reply)',
            '1-Year Trademark Watch & Infringement Monitoring',
            'Dedicated Relationship Manager',
            'Legal Cease & Desist Notice Draft',
            'Attend ready for show cause hearing',
            'Trademark Watch & Infringement Monitoring till date of regsitration'
        ]
    ]
];

// Frequently Asked Questions
$faqList = [
    [
        'q' => 'What is a Trademark and what can be registered?',
        'a' => 'A Trademark is a unique visual symbol, brand name, logo, tag line, slogan, or sound mark used by a business to distinguish its goods or services from competitors. Any unique word, logo, 3D shape, or combination of colors can be registered under the Indian Trade Marks Act, 1999.'
    ],
    [
        'q' => 'When can I start using the ™ and ® symbols?',
        'a' => 'You can start using the ™ (Trademark) symbol immediately after receiving your official Form TM-A filing acknowledgment receipt (usually within 24 hours). You can use the ® (Registered) symbol only after your trademark application is fully approved and the registration certificate is issued by the Trademark Registrar.'
    ],
    [
        'q' => 'How can I get 50% discount on Government Fees?',
        'a' => 'The government fee for large corporations is ₹9,000 per class. However, Individuals, Sole Proprietors, MSMEs (Udyam registered enterprises), and Recognized Startups get a 50% discount, paying only ₹4,500 per class. Our team can help you register for MSME Udyam for free to claim this fee waiver!'
    ],
    [
        'q' => 'How long is a registered trademark valid in India?',
        'a' => 'A registered trademark is valid for 10 years from the date of filing. It can be renewed indefinitely every 10 years by paying the renewal fee.'
    ],
    [
        'q' => 'What if my trademark receives an Examination Report objection?',
        'a' => 'If the TM Registry issues an objection (under Section 9 for descriptive nature or Section 11 for similarity with existing marks), our experienced IP attorneys draft and file a comprehensive legal reply within 30 days to clear the objection.'
    ]
];
