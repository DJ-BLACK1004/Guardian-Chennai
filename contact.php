<?php
require_once __DIR__ . '/includes/functions.php';
$forms = process_forms();

$pageTitle = 'Contact Guardian | Security Services Enquiry, Chennai';
$pageDesc  = 'Contact Guardian Security & Allied Services, Mahalingapuram, Nungambakkam, Chennai. Send an enquiry about security guards and allied services.';
$pagePath  = 'contact.php';
$active    = 'contact';

$heroTitle = 'Let\'s Talk About Your Security Requirements';
$heroLead  = 'Tell us what you need and our team will get in touch.';
$crumbs    = [['Contact Us', null]];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';
?>

<section class="section">
    <div class="container contact-wrap">
        <div class="reveal">
            <p class="eyebrow">Get in Touch</p>
            <h2 class="h2">Contact Guardian</h2>
            <?php include __DIR__ . '/includes/contact-details.php'; ?>
            <div class="visual-frame reveal" style="min-height:240px;margin-top:32px">
                <img src="<?= e(url('assets/img/control-room.webp')) ?>" alt="24/7 Security Operations Center Chennai" width="600" height="340" loading="lazy">
                <div class="float-card">
                    <?= icon('shield', 24) ?>
                    <div><strong>24/7 Response Center</strong><span>Operations &amp; Control Desk</span></div>
                </div>
            </div>
        </div>
        <div class="reveal"><?php include __DIR__ . '/includes/enquiry-form.php'; ?></div>
    </div>
</section>

<?php include __DIR__ . '/includes/map.php'; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
