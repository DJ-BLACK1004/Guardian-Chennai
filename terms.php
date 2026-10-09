<?php
require_once __DIR__ . '/includes/functions.php';
$forms = process_forms();

$pageTitle = 'Terms & Conditions | Guardian Security & Allied Services';
$pageDesc  = 'Terms of use for the Guardian Security & Allied Services website.';
$pagePath  = 'terms.php';
$active    = '';

$heroTitle = 'Terms & Conditions';
$heroLead  = 'Terms for using this website.';
$crumbs    = [['Terms & Conditions', null]];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';
?>
<section class="section">
    <div class="container legal">
        <p><em>Draft for review. Please have this text checked by Guardian's legal advisor before publishing.</em></p>

        <h2>Use of this website</h2>
        <p>This website is operated by <?= e(SITE_LEGAL_NAME) ?>. By using it you agree to these terms. Please do not use the site for any unlawful purpose.</p>

        <h2>Information on this site</h2>
        <p>We aim to keep the information accurate, but it is provided for general information. It is not an offer or a contract. Services are provided only under a written agreement with Guardian.</p>

        <h2>Enquiries and applications</h2>
        <p>Sending an enquiry or job application does not create any obligation for Guardian or for you. Please provide accurate information.</p>

        <h2>Intellectual property</h2>
        <p>The content and design of this website belong to Guardian or its licensors. Please do not copy or reuse them without permission.</p>

        <h2>Limitation of liability</h2>
        <p>To the extent permitted by law, Guardian is not liable for any loss arising from the use of this website or from links to third-party sites.</p>

        <h2>Changes</h2>
        <p>We may update these terms from time to time. The current version is always on this page.</p>

        <h2>Contact</h2>
        <p>Questions about these terms can be sent through our <a href="<?= e(url('contact.php')) ?>">contact page</a>.</p>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
