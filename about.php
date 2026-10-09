<?php
require_once __DIR__ . '/includes/functions.php';
$forms = process_forms();

$pageTitle = 'About Guardian | Security Company in Chennai, Tamil Nadu & Pondicherry';
$pageDesc  = 'Over two decades in the security industry, 2000+ verified personnel, a government-approved training facility and a network across Tamil Nadu and Pondicherry.';
$pagePath  = 'about.php';
$active    = 'about';

$heroTitle = 'About Guardian';
$heroLead  = 'A credible and reputed name in the security industry for over two decades.';
$crumbs    = [['About Us', null]];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';
?>

<section class="section">
    <div class="container split">
        <div class="copy reveal">
            <p class="eyebrow">Company Overview</p>
            <h2 class="h2">Who We Are</h2>
            <p>Guardian Integrated Security Services India Private Limited has been one of the most credible and reputed names in the security industry for over two decades. We have provided dependable security service to hundreds of commercial enterprises across business segments and institutions.</p>
            <p>We provide security solutions to specialised industries such as IT, the energy sector, banking and financial institutions, academic institutions, factories, large and ultra-modern industries and residential apartments.</p>
            <p>Our network is spread across Tamil Nadu and Pondicherry. This region-focused approach lets us provide value-added, quality service, which means financial benefits for our clients.</p>
        </div>
        <div class="visual-frame reveal">
            <?php if (photo_exists('about.webp')): ?>
                <img src="<?= e(url('assets/img/about.webp')) ?>" alt="Guardian security personnel on duty" width="800" height="600" loading="lazy">
            <?php else: ?>
                <div class="vf-shield" aria-hidden="true"><?= icon('shield', 400) ?></div>
            <?php endif; ?>
            <div class="float-card">
                <?= icon('shield', 28) ?>
                <div><strong>Professional Security</strong><span>Built Around Trust</span></div>
            </div>
        </div>
    </div>
</section>

<section class="stats" aria-label="Guardian in numbers">
    <div class="container stats-grid">
        <div class="stat"><div class="stat-num"><span data-count="20" data-suffix="+">20+</span></div><div class="stat-label">Years in the security industry</div></div>
        <div class="stat"><div class="stat-num"><span data-count="2000" data-suffix="+">2000+</span></div><div class="stat-label">Security personnel</div></div>
        <div class="stat"><div class="stat-num" style="font-size:clamp(30px,3.6vw,44px);padding-top:14px">Tamil Nadu &amp; Pondicherry</div><div class="stat-label">Region-wide network</div></div>
    </div>
</section>

<section class="section section-gray" id="approach">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Professional Approach</p>
            <h2 class="h2">Verified People, Thorough Training</h2>
            <p>Our training facility is approved by the Central and State Government under the Private Security Regulations Act. We induct personnel with the right academic qualification, physical fitness and aptitude.</p>
        </div>
        <div class="cred-grid">
            <?php
            $steps = [
                ['user-check', 'Antecedent verification', 'Every person is inducted after thorough verification of antecedents and track record for efficiency and trustworthiness.'],
                ['graduation', 'Theory and practical training', 'Exhaustive theoretical and practical training in our training centre, followed by customised training before each assignment.'],
                ['clipboard',  'Ongoing evaluation', 'Periodic on-the-job training to evaluate and upgrade skills, with performance evaluation at short intervals.'],
            ];
            foreach ($steps as [$ic, $t, $d]): ?>
                <div class="cred reveal"><?= icon($ic, 30) ?><h3><?= e($t) ?></h3><p><?= e($d) ?></p></div>
            <?php endforeach; ?>
        </div>
        <p class="reveal" style="margin-top:28px;color:var(--muted)">Good HR policies and practices keep employee turnover low, which supports consistent service for our clients.</p>

        <!-- Operational Excellence Gallery (from original live site photos) -->
        <div class="gallery-grid">
            <div class="gallery-card reveal">
                <img src="<?= e(url('assets/img/training.webp')) ?>" alt="Fire safety drill training" width="600" height="340" loading="lazy">
                <div class="gallery-caption">
                    <h3>Fire &amp; Emergency Response Training</h3>
                    <p>Rigorous practical drills in industrial fire safety, hose operations, and disaster management.</p>
                </div>
            </div>
            <div class="gallery-card reveal">
                <img src="<?= e(url('assets/img/control-room.webp')) ?>" alt="24/7 Security Operations Center" width="600" height="340" loading="lazy">
                <div class="gallery-caption">
                    <h3>24/7 Control Room &amp; Surveillance</h3>
                    <p>Round-the-clock monitoring, command dispatch, and multi-feed CCTV operations center.</p>
                </div>
            </div>
            <div class="gallery-card reveal">
                <img src="<?= e(url('assets/img/salute.webp')) ?>" alt="Guard parade inspection and drill" width="600" height="340" loading="lazy">
                <div class="gallery-caption">
                    <h3>Disciplined Guard Force &amp; Turnout</h3>
                    <p>Exemplary bearing, formal protocol, and antecedent-verified personnel on site.</p>
                </div>
            </div>
            <div class="gallery-card reveal">
                <img src="<?= e(url('assets/img/allied.webp')) ?>" alt="Allied facility management and housekeeping" width="600" height="340" loading="lazy">
                <div class="gallery-caption">
                    <h3>Integrated Allied &amp; Facility Services</h3>
                    <p>Professional corporate housekeeping and modern campus facility maintenance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="team" aria-labelledby="team-title">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Management</p>
            <h2 id="team-title" class="h2">The Core Team</h2>
            <p>Guided by an Advisory Board that includes experts from various fields and former Defence and Police officers.</p>
        </div>
        <div class="team-cards">
            <?php foreach ($TEAM as $p):
                $initials = implode('', array_map(fn($w) => mb_substr($w, 0, 1), array_slice(preg_split('/[\s.]+/', preg_replace('/^(Mr\.|Capt\.)\s*/', '', $p['name'])) ?: [], 0, 2)));
            ?>
                <article class="person reveal">
                    <div class="avatar" aria-hidden="true"><?= e(strtoupper($initials)) ?></div>
                    <h3><?= e($p['name']) ?></h3>
                    <p class="role"><?= e($p['role']) ?></p>
                    <p><?= e($p['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta-banner">
    <div class="cta-shield" aria-hidden="true"><?= icon('shield', 520) ?></div>
    <div class="container cta-inner">
        <h2>Ready to Strengthen Your Security?</h2>
        <p>Talk to Guardian about your security and allied service requirements.</p>
        <div class="cta-actions">
            <a class="btn btn-gold" href="<?= e(url('contact.php#enquiry')) ?>">Get a Quote <?= icon('arrow', 18) ?></a>
            <a class="btn btn-outline-light" href="<?= e(url('services.php')) ?>">Our Services</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
