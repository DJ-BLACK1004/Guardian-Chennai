<?php
require_once __DIR__ . '/includes/functions.php';
$forms = process_forms();

$pageTitle = 'Industries We Serve | Guardian Security & Allied Services, Chennai';
$pageDesc  = 'Security solutions for IT, energy, banking and financial institutions, academic institutions, factories, large industries and residential apartments.';
$pagePath  = 'industries.php';
$active    = 'industries';

$heroTitle = 'Security Solutions Across Diverse Environments';
$heroLead  = 'Guardian provides security solutions to specialised industries and institutions across Tamil Nadu and Pondicherry.';
$crumbs    = [['Industries', null]];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';
?>

<section class="section">
    <div class="container">
        <div class="cards-industries">
            <?php foreach ($INDUSTRIES as $ind): ?>
                <a class="industry-card reveal" href="<?= e(url('contact.php#enquiry')) ?>">
                    <span class="ic-bg" aria-hidden="true"></span>
                    <span class="ic-icon"><?= icon($ind['icon'], 30) ?></span>
                    <div class="ic-body">
                        <h2 style="color:#fff;font-size:22px;margin-bottom:8px"><?= e($ind['name']) ?></h2>
                        <p><?= e($ind['text']) ?></p>
                        <span class="more">Enquire <?= icon('arrow', 18) ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section-gray">
    <div class="container">
        <div class="section-head center reveal">
            <p class="eyebrow">Our Clients</p>
            <h2 class="h2">Organizations We Serve</h2>
        </div>

        <!-- Infinite Smooth Client Logo Marquee -->
        <?php include __DIR__ . '/includes/client-marquee.php'; ?>

        <ul class="client-list">
            <?php foreach ($CLIENTS as $c): ?>
                <li class="reveal"><?= icon('check', 18) ?><?= e($c) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="cta-banner">
    <div class="cta-shield" aria-hidden="true"><?= icon('shield', 520) ?></div>
    <div class="container cta-inner">
        <h2>Ready to Strengthen Your Security?</h2>
        <p>Talk to Guardian about your security and allied service requirements.</p>
        <div class="cta-actions">
            <a class="btn btn-gold" href="<?= e(url('contact.php#enquiry')) ?>">Get a Quote <?= icon('arrow', 18) ?></a>
            <a class="btn btn-outline-light" href="<?= e(url('contact.php')) ?>">Contact Us</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
