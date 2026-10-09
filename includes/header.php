<?php
/**
 * Expects (set before include):
 *   $pageTitle, $pageDesc, $pagePath (e.g. 'about.php'), $active (nav key)
 * Optional: $pageType ('website'|'article'), $noindex (bool)
 */
$pageTitle = $pageTitle ?? SITE_NAME;
$pageDesc  = $pageDesc ?? 'Professional security and allied services in Chennai.';
$pagePath  = $pagePath ?? '';
$active    = $active ?? '';
$canonical = site_origin() . url($pagePath);
$ogImage   = photo_exists('og.jpg') ? site_origin() . url('assets/img/og.jpg') : '';

$nav = [
    'home'     => ['Home', 'index.php'],
    'about'    => ['About Us', 'about.php'],
    'services' => ['Services', 'services.php'],
    'industries' => ['Industries', 'industries.php'],
    'why'      => ['Why Guardian', 'why-guardian.php'],
    'careers'  => ['Careers', 'careers.php'],
    'contact'  => ['Contact', 'contact.php'],
];

$schema = [
    '@context' => 'https://schema.org',
    '@type'    => 'LocalBusiness',
    'name'     => SITE_NAME,
    'legalName'=> SITE_LEGAL_NAME,
    'description' => 'Professional security and allied services across Tamil Nadu and Pondicherry.',
    'url'      => site_origin() . url(''),
    'address'  => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'No.2, Lady Madhavan Street, Mahalingapuram, Nungambakkam',
        'addressLocality' => 'Chennai',
        'addressRegion' => 'Tamil Nadu',
        'postalCode' => '600034',
        'addressCountry' => 'IN',
    ],
    'areaServed' => ['Tamil Nadu', 'Pondicherry'],
];
if (SITE_PHONE !== '') $schema['telephone'] = SITE_PHONE;
if (SITE_EMAIL !== '') $schema['email'] = SITE_EMAIL;
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
<script>document.documentElement.className='js';</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($pageTitle) ?></title>
<meta name="description" content="<?= e($pageDesc) ?>">
<link rel="canonical" href="<?= e($canonical) ?>">
<?php if (!empty($noindex)): ?><meta name="robots" content="noindex,follow"><?php endif; ?>
<meta name="theme-color" content="#0B0D11">

<meta property="og:type" content="<?= e($pageType ?? 'website') ?>">
<meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
<meta property="og:title" content="<?= e($pageTitle) ?>">
<meta property="og:description" content="<?= e($pageDesc) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<?php if ($ogImage): ?><meta property="og:image" content="<?= e($ogImage) ?>"><?php endif; ?>
<meta name="twitter:card" content="<?= $ogImage ? 'summary_large_image' : 'summary' ?>">
<meta name="twitter:title" content="<?= e($pageTitle) ?>">
<meta name="twitter:description" content="<?= e($pageDesc) ?>">
<?php if ($ogImage): ?><meta name="twitter:image" content="<?= e($ogImage) ?>"><?php endif; ?>

<link rel="icon" type="image/png" href="<?= e(asset('img/logo-crest.png')) ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap">
<link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
<script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) ?></script>
</head>
<body>
<a class="skip-link" href="#main">Skip to main content</a>
<div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>

<header class="site-header" id="siteHeader">
    <div class="container header-inner">
        <a class="brand" href="<?= e(url('index.php')) ?>" aria-label="<?= e(SITE_NAME) ?> - home">
            <img class="brand-logo" src="<?= e(asset('img/logo.png')) ?>" alt="<?= e(SITE_NAME) ?>" width="210" height="56">
        </a>

        <nav class="main-nav" id="mainNav" aria-label="Main navigation">
            <button class="nav-close" type="button" id="navClose" aria-label="Close menu"><?= icon('x', 24) ?></button>
            <ul>
                <?php foreach ($nav as $key => [$label, $href]): ?>
                    <li><a href="<?= e(url($href)) ?>"<?= $active === $key ? ' class="is-active" aria-current="page"' : '' ?>><?= e($label) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="nav-cta-mobile">
                <a class="btn btn-gold" href="<?= e(url('contact.php#enquiry')) ?>">Get a Quote</a>
                <?php if (SITE_PHONE !== ''): ?><a class="btn btn-outline-light" href="tel:<?= e(preg_replace('/[^+\d]/', '', SITE_PHONE)) ?>">Call Now</a><?php endif; ?>
            </div>
        </nav>

        <div class="header-actions">
            <?php if (SITE_PHONE !== ''): ?>
                <a class="header-call" href="tel:<?= e(preg_replace('/[^+\d]/', '', SITE_PHONE)) ?>"><?= icon('phone', 18) ?><span>Call Now</span></a>
            <?php endif; ?>
            <a class="btn btn-gold btn-sm header-quote" href="<?= e(url('contact.php#enquiry')) ?>">Get a Quote</a>
            <button class="menu-toggle" type="button" id="menuToggle" aria-label="Open menu" aria-controls="mainNav" aria-expanded="false"><?= icon('menu', 26) ?></button>
        </div>
    </div>
</header>
<div class="nav-backdrop" id="navBackdrop" hidden></div>

<main id="main">
