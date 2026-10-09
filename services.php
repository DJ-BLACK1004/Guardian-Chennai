<?php
require_once __DIR__ . '/includes/functions.php';
$forms = process_forms();

$pageTitle = 'Security Services in Chennai | Guardian Security & Allied Services';
$pageDesc  = 'Armed and unarmed security, escort services, cash van services, event management, antecedent verification, intelligence and investigation, and safety and security audits.';
$pagePath  = 'services.php';
$active    = 'services';

$heroTitle = 'Our Services';
$heroLead  = 'Professional security and allied service solutions designed around your organization\'s requirements.';
$crumbs    = [['Services', null]];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';
?>

<section class="section">
    <div class="container">
        <div class="cards-3">
            <?php foreach ($SERVICES as $s): ?>
                <a class="service-card border-beam-card reveal" href="<?= e(service_url($s['slug'])) ?>">
                    <span class="icon-badge"><?= icon($s['icon'], 28) ?></span>
                    <h2 style="font-size:21px;margin-bottom:10px"><?= e($s['name']) ?></h2>
                    <?php if (!empty($s['tags'])): ?>
                        <div class="service-tags">
                            <?php foreach ($s['tags'] as $st): ?>
                                <span class="service-tag"><?= e($st) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <p><?= e($s['short']) ?></p>
                    <span class="more">Learn More <?= icon('arrow', 18) ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta-banner">
    <div class="cta-shield" aria-hidden="true"><?= icon('shield', 520) ?></div>
    <div class="container cta-inner">
        <h2>Not Sure Which Service You Need?</h2>
        <p>Tell us about your site and requirement. We will help you decide.</p>
        <div class="cta-actions">
            <a class="btn btn-gold" href="<?= e(url('contact.php#enquiry')) ?>">Get a Quote <?= icon('arrow', 18) ?></a>
            <a class="btn btn-outline-light" href="<?= e(url('contact.php')) ?>">Contact Us</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
