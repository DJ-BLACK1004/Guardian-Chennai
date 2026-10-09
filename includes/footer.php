</main>

<?php global $SERVICES; ?>
<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-col footer-about">
            <a class="brand" href="<?= e(url('index.php')) ?>" aria-label="<?= e(SITE_NAME) ?> - home">
                <img class="brand-logo" src="<?= e(asset('img/logo.png')) ?>" alt="<?= e(SITE_NAME) ?>" width="220" height="60">
            </a>
            <p>Guardian delivers professional security and allied services across Tamil Nadu and Pondicherry, built on verified personnel, thorough training and a client-focused approach.</p>
        </div>

        <div class="footer-col">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="<?= e(url('index.php')) ?>">Home</a></li>
                <li><a href="<?= e(url('about.php')) ?>">About</a></li>
                <li><a href="<?= e(url('services.php')) ?>">Services</a></li>
                <li><a href="<?= e(url('industries.php')) ?>">Industries</a></li>
                <li><a href="<?= e(url('why-guardian.php')) ?>">Why Guardian</a></li>
                <li><a href="<?= e(url('careers.php')) ?>">Careers</a></li>
                <li><a href="<?= e(url('contact.php')) ?>">Contact</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h3>Services</h3>
            <ul>
                <?php foreach ($SERVICES as $s): ?>
                    <li><a href="<?= e(service_url($s['slug'])) ?>"><?= e($s['name']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="footer-col">
            <h3>Contact</h3>
            <ul class="footer-contact">
                <li>
                    <?= icon('pin', 18) ?>
                    <address><?= implode('<br>', array_map('e', SITE_ADDRESS_LINES)) ?></address>
                </li>
                <li>
                    <?= icon('smartphone', 18) ?>
                    <a href="tel:<?= e(preg_replace('/[^+\d]/', '', SITE_MOBILE)) ?>"><?= e(SITE_MOBILE_DISPLAY) ?></a>
                </li>
                <li>
                    <?= icon('phone', 18) ?>
                    <span>044-28232043, 28232044</span>
                </li>
                <li>
                    <?= icon('mail', 18) ?>
                    <div>
                        <?php foreach (SITE_EMAILS as $em): ?>
                            <div><a href="mailto:<?= e($em) ?>"><?= e($em) ?></a></div>
                        <?php endforeach; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="container footer-bottom">
        <p>&copy; <?= date('Y') ?> <?= e(SITE_NAME) ?></p>
        <p class="footer-legal">
            <a href="<?= e(url('privacy-policy.php')) ?>">Privacy Policy</a>
            <a href="<?= e(url('terms.php')) ?>">Terms &amp; Conditions</a>
        </p>
    </div>
</footer>

<!-- Mobile bottom bar -->
<div class="mobile-bar" aria-label="Quick actions">
    <?php if (SITE_PHONE !== ''): ?>
        <a class="mobile-bar-call" href="tel:<?= e(preg_replace('/[^+\d]/', '', SITE_PHONE)) ?>"><?= icon('phone', 20) ?> Call</a>
    <?php endif; ?>
    <a class="mobile-bar-enquire" href="<?= e(url('contact.php#enquiry')) ?>"><?= icon('mail', 20) ?> Enquire</a>
</div>

<!-- Floating WhatsApp Quick-Chat Widget -->
<a class="wa-float" href="https://wa.me/919600050935?text=Hi%20Guardian%20Team%2C%20I%20need%20a%20security%20quote%20for%20my%20facility%20in%20Chennai." target="_blank" rel="noopener noreferrer" aria-label="Chat with Guardian Security on WhatsApp">
    <div class="wa-icon-box">
        <?= icon('whatsapp', 24) ?>
        <span class="wa-pulse-dot" aria-hidden="true"></span>
    </div>
    <div class="wa-text">
        <span class="wa-title">WhatsApp Chat</span>
        <span class="wa-subtitle">24/7 Quick Response</span>
    </div>
</a>

<button class="to-top" type="button" id="toTop" aria-label="Back to top" hidden><?= icon('up', 22) ?></button>

<script src="<?= e(asset('js/main.js')) ?>" defer></script>
</body>
</html>
