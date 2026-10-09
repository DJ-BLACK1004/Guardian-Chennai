<?php
require_once __DIR__ . '/includes/functions.php';
$forms = process_forms();

$pageTitle = 'Why Choose Guardian | Professional Security Company in Chennai';
$pageDesc  = 'Verified and trained personnel, reliable operations, an experienced management team and a region-focused approach across Tamil Nadu and Pondicherry.';
$pagePath  = 'why-guardian.php';
$active    = 'why';

$heroTitle = 'Why Organizations Choose Guardian';
$heroLead  = 'Verified people, thorough training and a client-focused approach.';
$crumbs    = [['Why Guardian', null]];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';
?>

<section class="section section-dark">
    <div class="container">
        <div class="why-wrap">
            <div class="why-grid">
                <?php foreach ($WHY as $i => [$title, $ic, $text]): ?>
                    <div class="why-item reveal">
                        <span class="why-num"><?= sprintf('%02d', $i + 1) ?></span>
                        <?= icon($ic, 30) ?>
                        <h2 style="font-size:19px;margin-bottom:8px;color:#fff"><?= e($title) ?></h2>
                        <p><?= e($text) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="why-visual" aria-hidden="<?= photo_exists('why.webp') ? 'false' : 'true' ?>">
                <?php if (photo_exists('why.webp')): ?>
                    <img src="<?= e(url('assets/img/why.webp')) ?>" alt="Guardian security team at work" width="600" height="800" loading="lazy">
                <?php else: ?>
                    <div class="big-shield"><?= icon('shield', 400) ?></div>
                <?php endif; ?>
                <div class="caption">Verified people. Thorough training. Reliable service.</div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head center reveal">
            <p class="eyebrow">Training &amp; People</p>
            <h2 class="h2">How We Keep Standards High</h2>
            <p>Our training facility is approved by the Central and State Government under the Private Security Regulations Act.</p>
        </div>
        <ul class="checklist reveal" style="max-width:760px;margin:0 auto">
            <?php foreach ($TRAINING as $t): ?>
                <li><?= icon('check', 20) ?><span><?= e($t) ?></span></li>
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
            <a class="btn btn-outline-light" href="<?= e(url('about.php')) ?>">About Guardian</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
