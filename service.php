<?php
require_once __DIR__ . '/includes/functions.php';
$forms = process_forms();

$slug = isset($_GET['slug']) ? (string) $_GET['slug'] : '';
$svc  = preg_match('/^[a-z0-9-]{1,60}$/', $slug) ? find_service($slug) : null;

if (!$svc) {
    http_response_code(404);
    $pageTitle = 'Service not found | ' . SITE_NAME;
    $pageDesc  = 'The service you are looking for could not be found.';
    $pagePath  = 'services.php';
    $active    = 'services';
    $noindex   = true;
    $heroTitle = 'Service not found';
    $heroLead  = 'Please choose one of our services below.';
    $crumbs    = [['Services', url('services.php')], ['Not found', null]];
    include __DIR__ . '/includes/header.php';
    include __DIR__ . '/includes/page-hero.php';
    echo '<section class="section"><div class="container"><p><a class="btn btn-primary" href="' . e(url('services.php')) . '">View all services ' . icon('arrow', 18) . '</a></p></div></section>';
    include __DIR__ . '/includes/footer.php';
    exit;
}

$pageTitle = $svc['name'] . ' in Chennai | Guardian Security & Allied Services';
$pageDesc  = $svc['short'] . ' Provided by Guardian across Tamil Nadu and Pondicherry.';
$pagePath  = 'service.php?slug=' . $svc['slug'];
$active    = 'services';

$heroTitle = $svc['name'];
$heroLead  = $svc['short'];
$crumbs    = [['Services', url('services.php')], [$svc['name'], null]];
$presetService = $svc['name'];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';

$servicePhotos = [
    'security-services'          => ['img' => 'hero.webp', 'label' => 'Armed & Unarmed Security Squad'],
    'escort-services'            => ['img' => 'salute.webp', 'label' => 'Executive & Armed Escort Protection'],
    'cash-van-services'          => ['img' => 'cash-transit.webp', 'label' => 'Armored Cash Transit & Banking Security'],
    'event-management'           => ['img' => 'salute.webp', 'label' => 'Event Security & Crowd Coordination'],
    'antecedent-verification'    => ['img' => 'about.webp', 'label' => 'Antecedent & Verification Inspection'],
    'intelligence-investigation' => ['img' => 'control-room.webp', 'label' => '24/7 Security Operations & Intelligence'],
    'safety-security-audit'      => ['img' => 'training.webp', 'label' => 'Safety Drills & Comprehensive Security Audits'],
];
$svcPhoto = $servicePhotos[$svc['slug']] ?? null;
?>

<section class="section">
    <div class="container detail-wrap">
        <article>
            <div class="service-visual reveal">
                <?php if ($svcPhoto && photo_exists($svcPhoto['img'])): ?>
                    <img src="<?= e(url('assets/img/' . $svcPhoto['img'])) ?>" alt="<?= e($svc['name']) ?>" width="800" height="400" loading="lazy">
                    <div class="sv-badge"><?= icon($svc['icon'], 18) ?><span><?= e($svcPhoto['label']) ?></span></div>
                <?php else: ?>
                    <div class="sv-icon-fallback" aria-hidden="true"><?= icon($svc['icon'], 96) ?></div>
                <?php endif; ?>
            </div>

            <h2>Overview</h2>
            <p style="color:var(--muted);font-size:18px"><?= e($svc['intro']) ?></p>

            <h2>Benefits</h2>
            <ul class="benefit-list">
                <?php foreach ($svc['benefits'] as $b): ?>
                    <li><?= icon('check', 20) ?><span><?= e($b) ?></span></li>
                <?php endforeach; ?>
            </ul>

            <h2>How Guardian Delivers</h2>
            <ol class="steps-v" style="list-style:none;padding:0">
                <?php foreach ($svc['delivery'] as $d): ?>
                    <li><?= e($d) ?></li>
                <?php endforeach; ?>
            </ol>

            <h2>Key Features</h2>
            <div class="tag-list">
                <?php foreach ($svc['features'] as $f): ?>
                    <span class="tag"><?= e($f) ?></span>
                <?php endforeach; ?>
            </div>
        </article>

        <aside class="side-card">
            <h3>Need this service?</h3>
            <p>Send us your requirement and our team will get in touch.</p>
            <a class="btn btn-gold" href="#enquiry">Get a Quote</a>
            <ul>
                <li><strong style="color:#fff;font-size:14px;letter-spacing:.06em;text-transform:uppercase">Other services</strong></li>
                <?php foreach ($SERVICES as $s): if ($s['slug'] === $svc['slug']) continue; ?>
                    <li><a href="<?= e(service_url($s['slug'])) ?>"><?= e($s['name']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </aside>
    </div>
</section>

<section class="section section-gray">
    <div class="container contact-wrap">
        <div class="reveal">
            <p class="eyebrow">Enquire</p>
            <h2 class="h2">Talk to Guardian About <?= e($svc['name']) ?></h2>
            <p style="color:var(--muted);font-size:18px">Share a few details and our team will respond.</p>
            <?php include __DIR__ . '/includes/contact-details.php'; ?>
        </div>
        <div class="reveal"><?php include __DIR__ . '/includes/enquiry-form.php'; ?></div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
