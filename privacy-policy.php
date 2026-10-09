<?php
require_once __DIR__ . '/includes/functions.php';
$forms = process_forms();

$pageTitle = 'Privacy Policy | Guardian Security & Allied Services';
$pageDesc  = 'How Guardian Security & Allied Services handles information you submit through this website.';
$pagePath  = 'privacy-policy.php';
$active    = '';

$heroTitle = 'Privacy Policy';
$heroLead  = 'How we handle the information you send us through this website.';
$crumbs    = [['Privacy Policy', null]];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';
?>
<section class="section">
    <div class="container legal">
        <p><em>Draft for review. Please have this text checked by Guardian's legal advisor before publishing.</em></p>

        <h2>Who we are</h2>
        <p><?= e(SITE_LEGAL_NAME) ?> operates this website under the name <?= e(SITE_NAME) ?>. Our address is <?= e(SITE_ADDRESS_ONE_LINE) ?>.</p>

        <h2>Information we collect</h2>
        <p>We collect only what you choose to submit through our forms:</p>
        <ul>
            <li>Enquiry form: name, company name, phone number, email address, service required and your message.</li>
            <li>Careers form: name, phone number, email address, position, years of experience, resume file and message.</li>
        </ul>

        <h2>How we use it</h2>
        <p>We use this information to respond to your enquiry or to consider your job application. We do not sell your information.</p>

        <h2>Storage and retention</h2>
        <p>Submissions are stored on our systems and kept only as long as needed for the purpose above. You can ask us to delete your information by contacting us.</p>

        <h2>Cookies</h2>
        <p>This website uses a session cookie to protect forms against misuse. It does not track you for advertising.</p>

        <h2>Third-party services</h2>
        <p>Fonts are loaded from Google Fonts and the location map is provided by Google Maps. These services may receive your IP address when you load the page.</p>

        <h2>Contact</h2>
        <p>For privacy questions, please use our <a href="<?= e(url('contact.php')) ?>">contact page</a>.</p>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
