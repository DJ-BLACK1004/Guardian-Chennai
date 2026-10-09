<?php
require_once __DIR__ . '/includes/functions.php';
$forms = process_forms();

$pageTitle = 'Guardian Security & Allied Services | Professional Security Services in Chennai';
$pageDesc  = 'Guardian provides professional security and allied services in Chennai, Tamil Nadu and Pondicherry: armed and unarmed security, escort, cash van, event management and more.';
$pagePath  = 'index.php';
$active    = 'home';
include __DIR__ . '/includes/header.php';
?>

<!-- 02 Ultra-Modern Command-Center Hero (Full-Bleed Cinematic Video & Live Reel Stage) -->
<section class="hero-modern hero-full-video hero-media-player" id="heroMediaPlayer" aria-labelledby="hero-title">
    <?php
    $heroVideoFile = null;
    if (video_exists('hero.mp4')) {
        $heroVideoFile = 'hero.mp4';
    } elseif (video_exists('hero.webm')) {
        $heroVideoFile = 'hero.webm';
    }
    ?>

    <!-- Full-Bleed Video / Reel Background Layer -->
    <div class="hero-full-video-stage">
        <?php if ($heroVideoFile): ?>
            <!-- Real HTML5 Autoplay Loop Background Video -->
            <video class="hero-video-element" id="heroVideoElem" autoplay loop muted playsinline poster="<?= e(url('assets/img/hero.webp')) ?>">
                <source src="<?= e(video_url($heroVideoFile)) ?>" type="<?= str_ends_with($heroVideoFile, '.webm') ? 'video/webm' : 'video/mp4' ?>">
                <img src="<?= e(url('assets/img/hero.webp')) ?>" alt="Guardian Security Forces on Duty" width="1920" height="1080">
            </video>
        <?php else: ?>
            <!-- Cinematic Multi-Scene Live Video Reel (Continuous Ken Burns Camera Motion) -->
            <div class="hero-reel-viewport" id="heroReelViewport">
                <div class="hero-reel-slide is-active" data-caption="Scene 01 // TIDEL Park IT Tech Hub Squad" data-index="0">
                    <img src="<?= e(url('assets/img/hero.webp')) ?>" alt="Guardian Security Forces on Duty at TIDEL Park Chennai" width="1920" height="1080" fetchpriority="high">
                </div>
                <div class="hero-reel-slide" data-caption="Scene 02 // Executive Salute &amp; Inspection Squad" data-index="1">
                    <img src="<?= e(url('assets/img/salute.webp')) ?>" alt="Guardian Elite Security Salute Squad" width="1920" height="1080" loading="lazy">
                </div>
                <div class="hero-reel-slide" data-caption="Scene 03 // 24/7 Operations Control Room &amp; Surveillance" data-index="2">
                    <img src="<?= e(url('assets/img/control-room.webp')) ?>" alt="Guardian 24/7 Operations Command Desk" width="1920" height="1080" loading="lazy">
                </div>
            </div>
        <?php endif; ?>

        <!-- Tactical Scanlines & Rich Cinematic Contrast Scrim -->
        <div class="hud-scanlines" aria-hidden="true"></div>
        <div class="hero-scrim-overlay" aria-hidden="true"></div>
    </div>

    <!-- Top Tactical Status Strip (Inside Full Hero) -->
    <div class="hero-top-hud">
        <div class="container hero-top-hud-inner">
            <div class="hud-status-badge">
                <span class="hud-rec-dot"></span>
                <span class="hud-rec-text"><?= $heroVideoFile ? 'HD VIDEO PLAYING' : 'SEC-OPS LIVE FEED' ?></span>
            </div>
            <div class="hud-live-clock">
                <span class="hud-fps-tag">60 FPS</span>
                <span id="hudClockText">11:32:00 IST</span>
            </div>
        </div>
    </div>

    <!-- Foreground Content Layer -->
    <div class="container hero-full-container">
        <div class="hero-full-grid">
            <div class="hero-full-left">
                <div class="hero-hud">
                    <span class="hud-beacon">
                        <span class="hud-dot"></span>
                        <span class="hud-ping"></span>
                    </span>
                    <span class="hud-text"><strong>Live Operations:</strong> 24/7 Active &bull; 2,000+ Guards Deployed &bull; Chennai &amp; TN</span>
                </div>
                <h1 id="hero-title" class="hero-modern-title">
                    Next-Gen Protection.<br>
                    <span class="gold-gradient-text">Elite Security Solutions.</span>
                </h1>
                <p class="hero-modern-lead">
                    Over two decades of PSARA-certified security operations across Tamil Nadu &amp; Pondicherry. Guarding premier IT tech parks, manufacturing belts, and commercial institutions with military discipline and modern rigor.
                </p>
                <div class="hero-actions-row">
                    <a class="btn btn-gold" href="#enquiry">Request Security Quote <?= icon('arrow', 18) ?></a>
                    <a class="btn btn-outline-light" href="#services">Explore Services</a>
                </div>
                <div class="hero-trust-pills">
                    <div class="hero-trust-item"><?= icon('shield', 18) ?> <span>PSARA Licensed (TN &amp; PY)</span></div>
                    <div class="hero-trust-item"><?= icon('building', 18) ?> <span>CAPSI State Leadership</span></div>
                    <div class="hero-trust-item"><?= icon('check', 18) ?> <span>100% Statutory Compliant</span></div>
                </div>
            </div>

            <!-- Right-Side Floating Defense Badges Stage -->
            <div class="hero-full-right">
                <div class="hero-side-badge-stack">
                    <div class="hero-float-badge-card border-beam-card">
                        <div class="float-badge-icon"><?= icon('users', 24) ?></div>
                        <div class="float-badge-text">
                            <strong>2,000+ Personnel</strong>
                            <span>Antecedent-Verified Security Force</span>
                        </div>
                    </div>
                    <div class="hero-float-badge-card border-beam-card">
                        <div class="float-badge-icon"><?= icon('award', 24) ?></div>
                        <div class="float-badge-text">
                            <strong>PSARA Approved Hub</strong>
                            <span>Govt Certified Security Academy</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Tactical Controls & Scene Bar -->
    <div class="hero-bottom-hud">
        <div class="container hero-bottom-hud-inner">
            <div class="hud-caption-pill" id="hudCaptionPill">
                <?= $heroVideoFile ? 'Guardian Security Operations in Action' : 'Scene 01 // TIDEL Park IT Tech Hub Squad' ?>
            </div>
            <div class="hud-actions">
                <?php if (!$heroVideoFile): ?>
                    <div class="hud-dots" id="heroReelDots" role="tablist" aria-label="Reel slide selectors">
                        <button type="button" class="hud-dot is-active" data-slide="0" aria-label="Scene 1" role="tab" aria-selected="true"></button>
                        <button type="button" class="hud-dot" data-slide="1" aria-label="Scene 2" role="tab" aria-selected="false"></button>
                        <button type="button" class="hud-dot" data-slide="2" aria-label="Scene 3" role="tab" aria-selected="false"></button>
                    </div>
                <?php endif; ?>
                <button type="button" class="hud-play-btn" id="heroPlayToggle" aria-label="Pause or play video feed" title="Pause / Play">
                    <span class="hud-icon-pause"><?= icon('pause', 15) ?></span>
                    <span class="hud-icon-play" style="display:none"><?= icon('play', 15) ?></span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- 03 Statutory Compliance Strip -->
<section class="compliance-strip" aria-label="Statutory Accreditations and Compliance">
    <div class="container">
        <div class="compliance-grid">
            <div class="compliance-badge border-beam-card reveal">
                <div class="c-icon"><?= icon('award', 28) ?></div>
                <strong>PSARA Licensed</strong>
                <span>Govt of Tamil Nadu &amp; Pondicherry Certified</span>
            </div>
            <div class="compliance-badge border-beam-card reveal">
                <div class="c-icon"><?= icon('building', 28) ?></div>
                <strong>CAPSI Leadership</strong>
                <span>Managing Director is State Vice Chairman</span>
            </div>
            <div class="compliance-badge border-beam-card reveal">
                <div class="c-icon"><?= icon('badge', 28) ?></div>
                <strong>100% Compliant</strong>
                <span>Full ESI, EPF, GST &amp; Labour Laws Compliance</span>
            </div>
            <div class="compliance-badge border-beam-card reveal">
                <div class="c-icon"><?= icon('user-check', 28) ?></div>
                <strong>Antecedent Verified</strong>
                <span>Strict Police &amp; Character Verification Process</span>
            </div>
            <div class="compliance-badge border-beam-card reveal">
                <div class="c-icon"><?= icon('shield', 28) ?></div>
                <strong>Govt Approved Hub</strong>
                <span>PSARA Certified Security Training Academy</span>
            </div>
        </div>
    </div>
</section>

<!-- 04 Master Bento Grid: The Guardian Benchmark -->
<section class="section" aria-labelledby="benchmark-title">
    <div class="container">
        <div class="section-head center reveal">
            <p class="eyebrow">The Guardian Benchmark</p>
            <h2 id="benchmark-title" class="h2">Proven Reliability. Elite Execution.</h2>
            <p>Built on verified personnel, rigorous PSARA training, and unmatched operational reliability across two decades.</p>
        </div>

        <div class="bento-grid">
            <!-- Bento Card 1: 20+ Years Leadership (Span 8, Dark Carbon) -->
            <div class="bento-card bento-card-dark bento-span-8 border-beam-card reveal">
                <div>
                    <span class="bento-tag"><?= icon('building', 14) ?> Established 2004 &bull; Chennai HQ</span>
                    <h3 style="font-size:clamp(22px,2.2vw,30px);color:#fff;margin-bottom:14px;line-height:1.25">
                        Two Decades of Enterprise Security Leadership Across Tamil Nadu &amp; Pondicherry
                    </h3>
                    <p style="color:rgba(255,255,255,0.8);font-size:16px;line-height:1.6;margin-bottom:24px">
                        Guardian Integrated Security Services India Private Limited has been a credible and reputed vanguard in the security industry for over 20 years, serving hundreds of commercial enterprises. Our Managing Director serves as the Vice Chairman of CAPSI (Tamil Nadu &amp; Pondicherry), driving industry-wide standards and compliance.
                    </p>
                </div>
                <div style="display:flex;gap:24px;flex-wrap:wrap;align-items:center;padding-top:20px;border-top:1px solid rgba(255,255,255,0.1)">
                    <div style="display:flex;align-items:baseline;gap:8px">
                        <span style="font-size:36px;font-weight:900;color:var(--gold)">20+</span>
                        <span style="font-size:13px;color:rgba(255,255,255,0.7);font-weight:600">Years in Security Industry</span>
                    </div>
                    <div style="display:flex;align-items:baseline;gap:8px">
                        <span style="font-size:36px;font-weight:900;color:var(--gold)">100%</span>
                        <span style="font-size:13px;color:rgba(255,255,255,0.7);font-weight:600">Statutory Remittance Record</span>
                    </div>
                    <a class="btn btn-gold btn-sm" href="<?= e(url('about.php')) ?>" style="margin-left:auto">Discover Guardian <?= icon('arrow', 16) ?></a>
                </div>
            </div>

            <!-- Bento Card 2: 2,000+ Personnel (Span 4, White Clay) -->
            <div class="bento-card bento-span-4 border-beam-card reveal">
                <div>
                    <span class="bento-tag"><?= icon('users', 14) ?> Active Strength</span>
                    <div class="bento-big-stat"><span data-count="2000" data-suffix="+">2000+</span></div>
                    <div class="bento-stat-label">
                        <strong style="color:var(--navy-900);font-size:16px;display:block;margin-bottom:4px">Antecedent-Verified Guards</strong>
                        Inducted only after comprehensive verification of track record, residential background, and trustworthiness.
                    </div>
                </div>
                <ul style="list-style:none;padding:0;margin:20px 0 0;display:grid;gap:8px;font-size:13.5px;color:var(--navy-900);font-weight:600">
                    <li style="display:flex;align-items:center;gap:8px"><?= icon('check', 16) ?> Strict Police Screening</li>
                    <li style="display:flex;align-items:center;gap:8px"><?= icon('check', 16) ?> Physical Turnout Standards</li>
                </ul>
            </div>

            <!-- Bento Card 3: PSARA Academy Training (Span 4, White Clay) -->
            <div class="bento-card bento-span-4 border-beam-card reveal">
                <div>
                    <span class="bento-tag"><?= icon('shield', 14) ?> Training Facility</span>
                    <div class="bento-big-stat" style="color:var(--gold)">PSARA</div>
                    <div class="bento-stat-label">
                        <strong style="color:var(--navy-900);font-size:16px;display:block;margin-bottom:4px">Govt-Approved Academy</strong>
                        Our training facility is approved by the Central and State Government under the Private Security Regulations Act.
                    </div>
                </div>
                <ul style="list-style:none;padding:0;margin:20px 0 0;display:grid;gap:8px;font-size:13.5px;color:var(--navy-900);font-weight:600">
                    <li style="display:flex;align-items:center;gap:8px"><?= icon('check', 16) ?> Fire Drill &amp; First-Aid Training</li>
                    <li style="display:flex;align-items:center;gap:8px"><?= icon('check', 16) ?> Assignment-Specific Pre-Deployment</li>
                </ul>
            </div>

            <!-- Bento Card 4: Operations & Night Patrol (Span 8, White Clay Media Split) -->
            <div class="bento-card bento-span-8 border-beam-card reveal">
                <div class="bento-media-split">
                    <div>
                        <span class="bento-tag"><?= icon('zap', 14) ?> 24/7 Operations</span>
                        <h3 style="font-size:22px;color:var(--navy-900);margin-bottom:12px;font-weight:800">
                            Surprise Night Beat Inspections &amp; Command Support
                        </h3>
                        <p style="font-size:15px;color:var(--muted);line-height:1.6;margin-bottom:16px">
                            Field officers and mobile patrol squads conduct surprise night beat checks (11:00 PM – 5:00 AM) across client facilities. With 24/7 telephonic roll-calls and QR-coded digital wanding logs, zero unmanned posts are guaranteed.
                        </p>
                        <div style="display:flex;gap:10px;flex-wrap:wrap">
                            <span class="service-tag"><?= icon('check', 14) ?> 15-Min Patrol Response</span>
                            <span class="service-tag"><?= icon('check', 14) ?> Area Field Officer Beat</span>
                        </div>
                    </div>
                    <div class="bento-thumb-frame">
                        <img src="<?= e(url('assets/img/control-room.webp')) ?>" alt="Guardian 24/7 Operations Control" width="400" height="300" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 05 Master Bento Grid: Comprehensive Security Services -->
<section id="services" class="section section-gray" aria-labelledby="services-title">
    <div class="container">
        <div class="section-head center reveal">
            <p class="eyebrow">Services Ecosystem</p>
            <h2 id="services-title" class="h2">Engineered Security Solutions</h2>
            <p>From armed sentries and armored cash transit to executive escorts and risk audits, Guardian delivers specialized protection.</p>
        </div>

        <div class="bento-grid">
            <!-- Featured Core Service: Security Services Armed & Unarmed (Span 12) -->
            <div class="bento-span-12 reveal">
                <div class="service-bento-hero border-beam-card">
                    <div>
                        <span class="bento-tag" style="background:rgba(223,177,62,0.18);color:var(--gold);border:1px solid rgba(223,177,62,.35)">
                            <?= icon('shield', 14) ?> Flagship Core Service
                        </span>
                        <h3 style="font-size:clamp(24px,2.4vw,32px);color:#fff;margin-bottom:12px;font-weight:800">
                            Security Services – Armed and Unarmed
                        </h3>
                        <div class="service-tags" style="margin:10px 0 16px">
                            <span class="service-tag" style="background:rgba(255,255,255,.1);color:#fff;border-color:rgba(255,255,255,.2)">PSARA Certified</span>
                            <span class="service-tag" style="background:rgba(255,255,255,.1);color:#fff;border-color:rgba(255,255,255,.2)">Armed / Unarmed</span>
                            <span class="service-tag" style="background:rgba(255,255,255,.1);color:#fff;border-color:rgba(255,255,255,.2)">24/7 Night Beat Checks</span>
                            <span class="service-tag" style="background:rgba(255,255,255,.1);color:#fff;border-color:rgba(255,255,255,.2)">Site-Specific Post Orders</span>
                        </div>
                        <p style="color:rgba(255,255,255,.82);font-size:16px;line-height:1.6;margin-bottom:20px;max-width:640px">
                            Armed and unarmed security personnel for commercial, industrial, institutional, and residential sites. Every guard is inducted only after antecedent verification, physical training, and site-specific orientation under seasoned operational management.
                        </p>
                        <a class="btn btn-gold btn-sm" href="<?= e(service_url('security-services')) ?>">
                            Discover Security Services <?= icon('arrow', 16) ?>
                        </a>
                    </div>
                    <div class="sb-visual">
                        <img src="<?= e(url('assets/img/salute.webp')) ?>" alt="Guardian Security Guards" width="600" height="300" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Bento Card 2: Cash Van Services (Span 4) -->
            <div class="bento-card bento-span-4 border-beam-card reveal">
                <div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
                        <span class="icon-badge"><?= icon('truck', 26) ?></span>
                        <span class="bento-tag" style="margin:0">Armored Transit</span>
                    </div>
                    <h3 style="font-size:20px;color:var(--navy-900);margin-bottom:8px">Cash Van Services</h3>
                    <div class="service-tags">
                        <span class="service-tag">GPS Live Tracked</span>
                        <span class="service-tag">Armed Vault Guard</span>
                    </div>
                    <p style="font-size:14.5px;color:var(--muted);line-height:1.5;margin-bottom:18px">
                        Secure cash transit support for banking and financial institutions with trained, antecedent-verified crews and management oversight.
                    </p>
                </div>
                <a class="more" href="<?= e(service_url('cash-van-services')) ?>">Learn More <?= icon('arrow', 16) ?></a>
            </div>

            <!-- Bento Card 3: Escort Services (Span 4) -->
            <div class="bento-card bento-span-4 border-beam-card reveal">
                <div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
                        <span class="icon-badge"><?= icon('users', 26) ?></span>
                        <span class="bento-tag" style="margin:0">VIP Escort</span>
                    </div>
                    <h3 style="font-size:20px;color:var(--navy-900);margin-bottom:8px">Escort Services – Armed &amp; Unarmed</h3>
                    <div class="service-tags">
                        <span class="service-tag">Executive Protection</span>
                        <span class="service-tag">Valuables Transit</span>
                    </div>
                    <p style="font-size:14.5px;color:var(--muted);line-height:1.5;margin-bottom:18px">
                        Armed and unarmed escort protection for executives, personnel movement, and high-value transit led by defence-experienced officers.
                    </p>
                </div>
                <a class="more" href="<?= e(service_url('escort-services')) ?>">Learn More <?= icon('arrow', 16) ?></a>
            </div>

            <!-- Bento Card 4: Antecedent Verification (Span 4) -->
            <div class="bento-card bento-span-4 border-beam-card reveal">
                <div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
                        <span class="icon-badge"><?= icon('user-check', 26) ?></span>
                        <span class="bento-tag" style="margin:0">Background Check</span>
                    </div>
                    <h3 style="font-size:20px;color:var(--navy-900);margin-bottom:8px">Antecedent Verification</h3>
                    <div class="service-tags">
                        <span class="service-tag">Police Verification</span>
                        <span class="service-tag">Track Record</span>
                    </div>
                    <p style="font-size:14.5px;color:var(--muted);line-height:1.5;margin-bottom:18px">
                        Comprehensive antecedent verification applied across our workforce and extended to client hiring and credential screening.
                    </p>
                </div>
                <a class="more" href="<?= e(service_url('antecedent-verification')) ?>">Learn More <?= icon('arrow', 16) ?></a>
            </div>

            <!-- Bento Card 5: Safety and Security Audit (Span 4) -->
            <div class="bento-card bento-span-4 border-beam-card reveal">
                <div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
                        <span class="icon-badge"><?= icon('clipboard', 26) ?></span>
                        <span class="bento-tag" style="margin:0">Site Audit</span>
                    </div>
                    <h3 style="font-size:20px;color:var(--navy-900);margin-bottom:8px">Safety and Security Audit</h3>
                    <div class="service-tags">
                        <span class="service-tag">Vulnerability Scan</span>
                        <span class="service-tag">Risk Assessment</span>
                    </div>
                    <p style="font-size:14.5px;color:var(--muted);line-height:1.5;margin-bottom:18px">
                        In-depth site assessments by senior security specialists to review physical perimeters, access points, and emergency safety gaps.
                    </p>
                </div>
                <a class="more" href="<?= e(service_url('safety-security-audit')) ?>">Learn More <?= icon('arrow', 16) ?></a>
            </div>

            <!-- Bento Card 6: Event Management (Span 4) -->
            <div class="bento-card bento-span-4 border-beam-card reveal">
                <div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
                        <span class="icon-badge"><?= icon('calendar', 26) ?></span>
                        <span class="bento-tag" style="margin:0">Crowd Marshals</span>
                    </div>
                    <h3 style="font-size:20px;color:var(--navy-900);margin-bottom:8px">Event Management</h3>
                    <div class="service-tags">
                        <span class="service-tag">Crowd Control</span>
                        <span class="service-tag">VIP Security</span>
                    </div>
                    <p style="font-size:14.5px;color:var(--muted);line-height:1.5;margin-bottom:18px">
                        Organized personnel deployment, queue management, access control points, and VIP movement coordination for corporate &amp; public events.
                    </p>
                </div>
                <a class="more" href="<?= e(service_url('event-management')) ?>">Learn More <?= icon('arrow', 16) ?></a>
            </div>

            <!-- Bento Card 7: Intelligence & Investigation (Span 4) -->
            <div class="bento-card bento-span-4 border-beam-card reveal">
                <div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
                        <span class="icon-badge"><?= icon('search', 26) ?></span>
                        <span class="bento-tag" style="margin:0">Advisory Board</span>
                    </div>
                    <h3 style="font-size:20px;color:var(--navy-900);margin-bottom:8px">Intelligence &amp; Investigation</h3>
                    <div class="service-tags">
                        <span class="service-tag">Ex-Police Advisors</span>
                        <span class="service-tag">Confidential Scoping</span>
                    </div>
                    <p style="font-size:14.5px;color:var(--muted);line-height:1.5;margin-bottom:18px">
                        Discreet investigative scoping guided by an advisory board of former police and defence officials for corporate risk management.
                    </p>
                </div>
                <a class="more" href="<?= e(service_url('intelligence-investigation')) ?>">Learn More <?= icon('arrow', 16) ?></a>
            </div>
        </div>
    </div>
</section>

<!-- 08 Industries -->
<section class="section section-gray" aria-labelledby="ind-title">
    <div class="container">
        <div class="section-head center reveal">
            <p class="eyebrow">Industries We Serve</p>
            <h2 id="ind-title" class="h2">Security Solutions Across Diverse Environments</h2>
            <p>Guardian provides security solutions to specialised industries and institutions across the region.</p>
        </div>
        <div class="cards-industries">
            <?php foreach ($INDUSTRIES as $ind): ?>
                <a class="industry-card reveal" href="<?= e(url('industries.php')) ?>">
                    <span class="ic-bg" aria-hidden="true"></span>
                    <span class="ic-icon"><?= icon($ind['icon'], 30) ?></span>
                    <div class="ic-body">
                        <h3><?= e($ind['name']) ?></h3>
                        <p><?= e($ind['text']) ?></p>
                        <span class="more">Learn more <?= icon('arrow', 18) ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 08b Interactive Sector Security Matrix -->
<section id="securityMatrix" class="matrix-section" aria-labelledby="matrix-title">
    <div class="container">
        <div class="section-head center reveal">
            <p class="eyebrow">Operational Readiness</p>
            <h2 id="matrix-title" class="h2">Sector-Specific Security Protocols</h2>
            <p>Every facility demands customized security deployment. Switch between sectors below to see how Guardian safeguards each operating environment.</p>
        </div>

        <div class="matrix-wrap border-beam-card reveal">
            <!-- Tabs -->
            <div class="matrix-tabs" role="tablist" aria-label="Security sectors">
                <button type="button" class="matrix-tab is-active" data-matrix-target="panel-it" role="tab" aria-selected="true">
                    <?= icon('cpu', 18) ?> IT &amp; Tech Parks
                </button>
                <button type="button" class="matrix-tab" data-matrix-target="panel-mfg" role="tab" aria-selected="false">
                    <?= icon('factory', 18) ?> Manufacturing &amp; Plants
                </button>
                <button type="button" class="matrix-tab" data-matrix-target="panel-bank" role="tab" aria-selected="false">
                    <?= icon('landmark', 18) ?> Banking &amp; Financial
                </button>
                <button type="button" class="matrix-tab" data-matrix-target="panel-health" role="tab" aria-selected="false">
                    <?= icon('building', 18) ?> Hospitals &amp; Healthcare
                </button>
                <button type="button" class="matrix-tab" data-matrix-target="panel-retail" role="tab" aria-selected="false">
                    <?= icon('users', 18) ?> Malls &amp; Commercial
                </button>
            </div>

            <!-- Panel 1: IT & Tech Parks -->
            <div id="panel-it" class="matrix-panel is-active" role="tabpanel">
                <div class="matrix-grid">
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('shield', 20) ?> Guard Deployment Profile</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Turnstile &amp; Flap Barrier Access Controllers</li>
                            <li><?= icon('check', 16) ?> Baggage X-Ray &amp; Scanner Screeners</li>
                            <li><?= icon('check', 16) ?> Server Room &amp; Data Center Static Guards</li>
                            <li><?= icon('check', 16) ?> Female Marshals for Night Shift Escorts</li>
                        </ul>
                    </div>
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('zap', 20) ?> Tech &amp; Screening Protocols</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Electronic Visitor Management System (VMS)</li>
                            <li><?= icon('check', 16) ?> 24/7 CCTV Control Room Monitoring Support</li>
                            <li><?= icon('check', 16) ?> Vehicle Boom Barrier &amp; Under-Chassis Inspection</li>
                            <li><?= icon('check', 16) ?> Digital Post-Patrol NFC / QR Tag Logging</li>
                        </ul>
                    </div>
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('award', 20) ?> Compliance &amp; Response SLA</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> 100% PSARA &amp; Antecedent Police Verified</li>
                            <li><?= icon('check', 16) ?> 15-Minute Dedicated Patrol Response Team</li>
                            <li><?= icon('check', 16) ?> Daily Incident Log Shared with Facility Head</li>
                            <li><?= icon('check', 16) ?> Zero-Notice Reserve Relief Pool on Standby</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Panel 2: Manufacturing & Plants -->
            <div id="panel-mfg" class="matrix-panel" role="tabpanel">
                <div class="matrix-grid">
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('shield', 20) ?> Guard Deployment Profile</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Main Gate &amp; Heavy Vehicle Entry Marshals</li>
                            <li><?= icon('check', 16) ?> Weighbridge Inward / Outward Verifiers</li>
                            <li><?= icon('check', 16) ?> Scrap Yard &amp; Raw Material Static Guards</li>
                            <li><?= icon('check', 16) ?> Perimeter Fence &amp; Boundary Patrol Squad</li>
                        </ul>
                    </div>
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('zap', 20) ?> Tech &amp; Screening Protocols</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Material Gate Pass &amp; Delivery Challan Tracking</li>
                            <li><?= icon('check', 16) ?> Driver Breathalyzer &amp; HHMD Frisking</li>
                            <li><?= icon('check', 16) ?> Industrial Safety PPE Protocol Enforcement</li>
                            <li><?= icon('check', 16) ?> Fire Hydrant &amp; Extinguisher Inspection Logs</li>
                        </ul>
                    </div>
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('award', 20) ?> Compliance &amp; Response SLA</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Industrial Dispute &amp; Union Awareness Training</li>
                            <li><?= icon('check', 16) ?> 24/7 Fire &amp; Hazmat Drill Certified Personnel</li>
                            <li><?= icon('check', 16) ?> Mobile Supervisor Surprise Night Beat Checks</li>
                            <li><?= icon('check', 16) ?> Statutory Remittance Challans Provided Monthly</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Panel 3: Banking & Financial -->
            <div id="panel-bank" class="matrix-panel" role="tabpanel">
                <div class="matrix-grid">
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('shield', 20) ?> Guard Deployment Profile</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Armed Security Guards (12 Bore / Retainer Gun)</li>
                            <li><?= icon('check', 16) ?> ATM Lobby &amp; Banking Hall Static Guards</li>
                            <li><?= icon('check', 16) ?> Cash Van Transit Armed Escort Crews</li>
                            <li><?= icon('check', 16) ?> Safe Deposit Locker &amp; Strong Room Sentries</li>
                        </ul>
                    </div>
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('zap', 20) ?> Tech &amp; Screening Protocols</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Dual-Key Vault Authorization Protocol</li>
                            <li><?= icon('check', 16) ?> Silent Alarm &amp; Panic Switch Rapid Verification</li>
                            <li><?= icon('check', 16) ?> Customer Bag &amp; Metal Detector Frisking</li>
                            <li><?= icon('check', 16) ?> GPS Monitored Route Tracking for Cash Vans</li>
                        </ul>
                    </div>
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('award', 20) ?> Compliance &amp; Response SLA</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Firearm License Audit &amp; Range Practice Verified</li>
                            <li><?= icon('check', 16) ?> Clean Police Antecedents with Fingerprint Records</li>
                            <li><?= icon('check', 16) ?> Instant Control Room SOS Escalation Protocol</li>
                            <li><?= icon('check', 16) ?> Comprehensive Transit Risk Protocol Alignment</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Panel 4: Hospitals & Healthcare -->
            <div id="panel-health" class="matrix-panel" role="tabpanel">
                <div class="matrix-grid">
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('shield', 20) ?> Guard Deployment Profile</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Emergency &amp; Casualty Crowd Control Officers</li>
                            <li><?= icon('check', 16) ?> ICU &amp; Operation Theatre Access Controllers</li>
                            <li><?= icon('check', 16) ?> Female Security Guards for Maternity Wards</li>
                            <li><?= icon('check', 16) ?> Ambulance Bay Traffic &amp; Clearway Marshals</li>
                        </ul>
                    </div>
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('zap', 20) ?> Tech &amp; Screening Protocols</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Attendant Pass &amp; Visiting Hour Regulation</li>
                            <li><?= icon('check', 16) ?> Code Grey / Violent Patient De-escalation Drill</li>
                            <li><?= icon('check', 16) ?> Biomedical Waste Disposal Area Sentry</li>
                            <li><?= icon('check', 16) ?> Wheelchair Assistance &amp; Gentle Customer Service</li>
                        </ul>
                    </div>
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('award', 20) ?> Compliance &amp; Response SLA</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Healthcare Hygiene &amp; Disinfection Protocol Trained</li>
                            <li><?= icon('check', 16) ?> 10-Minute Crisis De-escalation Mobile Backup</li>
                            <li><?= icon('check', 16) ?> Duty Doctor &amp; Nursing Staff Protection Protocol</li>
                            <li><?= icon('check', 16) ?> Continuous 24/7 Shift Supervisor Supervision</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Panel 5: Malls & Commercial -->
            <div id="panel-retail" class="matrix-panel" role="tabpanel">
                <div class="matrix-grid">
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('shield', 20) ?> Guard Deployment Profile</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Door Frame Metal Detector (DFMD) Screeners</li>
                            <li><?= icon('check', 16) ?> Basement Parking &amp; Valet Traffic Controllers</li>
                            <li><?= icon('check', 16) ?> Shoplifting Deterrence &amp; Floor Roaming Guards</li>
                            <li><?= icon('check', 16) ?> Goods Loading &amp; Vendor Delivery Bay Marshals</li>
                        </ul>
                    </div>
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('zap', 20) ?> Tech &amp; Screening Protocols</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Handheld Metal Detector (HHMD) Frisking</li>
                            <li><?= icon('check', 16) ?> Lost &amp; Found Child Assistance Protocol</li>
                            <li><?= icon('check', 16) ?> Emergency Fire Evacuation Route Marshaling</li>
                            <li><?= icon('check', 16) ?> Retail Staff Pre-Exit Baggage Checks</li>
                        </ul>
                    </div>
                    <div class="matrix-col">
                        <div class="matrix-col-head"><?= icon('award', 20) ?> Compliance &amp; Response SLA</div>
                        <ul class="matrix-list">
                            <li><?= icon('check', 16) ?> Courteous Public Interaction &amp; Etiquette Trained</li>
                            <li><?= icon('check', 16) ?> Mall Management Command Center Coordination</li>
                            <li><?= icon('check', 16) ?> Quick Response to Shoplifting or Disorder</li>
                            <li><?= icon('check', 16) ?> Full Statutory Compliance &amp; Uniform Standards</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 09 Team -->
<section class="section" aria-labelledby="team-title">
    <div class="container team-wrap">
        <div class="team-visual reveal">
            <?php if (photo_exists('team.webp')): ?>
                <img src="<?= e(url('assets/img/team.webp')) ?>" alt="Guardian security personnel" width="800" height="640" loading="lazy">
            <?php else: ?>
                <div class="tv-icon" aria-hidden="true"><?= icon('users', 180) ?></div>
            <?php endif; ?>
            <div class="pill-row">
                <span class="pill"><?= icon('badge', 18) ?> Professional</span>
                <span class="pill"><?= icon('shield', 18) ?> Disciplined</span>
                <span class="pill"><?= icon('check', 18) ?> Responsive</span>
            </div>
        </div>
        <div class="reveal">
            <p class="eyebrow">Our People</p>
            <h2 id="team-title" class="h2">People Behind the Protection</h2>
            <p class="copy" style="color:var(--muted);font-size:18px">Professional people, disciplined processes and dependable service come together to deliver effective security solutions.</p>
            <ul class="checklist">
                <?php foreach ($TRAINING as $t): ?>
                    <li><?= icon('check', 20) ?><span><?= e($t) ?></span></li>
                <?php endforeach; ?>
            </ul>
            <p style="margin-top:28px"><a class="btn btn-outline" href="<?= e(url('about.php#team')) ?>">Meet the Management <?= icon('arrow', 18) ?></a></p>
        </div>
    </div>
</section>

<!-- 10 How we work -->
<section class="section section-gray" aria-labelledby="process-title">
    <div class="container">
        <div class="section-head center reveal">
            <p class="eyebrow">How We Work</p>
            <h2 id="process-title" class="h2">Simple Process. Professional Execution.</h2>
        </div>
        <ol class="process" style="list-style:none;padding:0;margin:0">
            <?php foreach ($PROCESS as $i => [$title, $text]): ?>
                <li class="step">
                    <span class="step-num"><?= sprintf('%02d', $i + 1) ?></span>
                    <div>
                        <small>Step <?= sprintf('%02d', $i + 1) ?></small>
                        <h3><?= e($title) ?></h3>
                        <p><?= e($text) ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<!-- 11 Credibility -->
<section class="section" aria-labelledby="cred-title">
    <div class="container">
        <div class="section-head center reveal">
            <p class="eyebrow">Credentials</p>
            <h2 id="cred-title" class="h2">Built to Deliver Confidence</h2>
            <p>What Guardian states about its training and affiliations.</p>
        </div>
        <div class="cred-grid">
            <div class="cred reveal">
                <?= icon('badge', 30) ?>
                <h3>Government-approved training facility</h3>
                <p>Our training facility is approved by the Central and State Government under the Private Security Regulations Act.</p>
            </div>
            <div class="cred reveal">
                <?= icon('building', 30) ?>
                <h3>CAPSI affiliation</h3>
                <p>Our Managing Director is Vice Chairman of CAPSI, Tamil Nadu &amp; Pondicherry, an association of security agencies recognised by the Government.</p>
            </div>
            <div class="cred reveal">
                <?= icon('user-check', 30) ?>
                <h3>Antecedent-verified personnel</h3>
                <p>Every security person is inducted after thorough verification of antecedents and track record.</p>
            </div>
        </div>
    </div>
</section>

<!-- Clients (from original site; no testimonials exist, so that section is omitted) -->
<section class="section section-gray" aria-labelledby="clients-title">
    <div class="container">
        <div class="section-head center reveal">
            <p class="eyebrow">Our Clients</p>
            <h2 id="clients-title" class="h2">Trusted by Organizations Across Segments</h2>
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

<!-- 12b Interactive Security Guard & Manpower Cost Estimator (Temporarily commented out - uncomment anytime) -->
<?php /*
<section id="estimator" class="estimator-section" aria-labelledby="est-heading">
    <div class="container">
        <div class="section-head center reveal">
            <p class="eyebrow" style="color:var(--gold)">Instant Quote Calculator</p>
            <h2 id="est-heading" class="h2" style="color:#fff">Security Manpower Strength Estimator</h2>
            <p style="color:rgba(255,255,255,.8);max-width:680px;margin:0 auto">Plan your security personnel deployment across Tamil Nadu. Select your facility type, shift schedule, and team sizes for an instant operational recommendation and official quote.</p>
        </div>

        <div class="estimator-wrap reveal" id="manpowerEstimator">
            <div class="estimator-grid">
                <div class="est-controls">
                    <!-- Step 1: Facility Type -->
                    <div class="est-step-title"><?= icon('building', 20) ?> Step 1: Select Facility Type</div>
                    <div class="est-pills">
                        <div class="est-pill is-active" data-fac="IT Tech Park / Corporate">IT Tech Park / Corporate</div>
                        <div class="est-pill" data-fac="Industrial &amp; Manufacturing">Industrial &amp; Manufacturing</div>
                        <div class="est-pill" data-fac="Commercial Mall / Retail">Commercial / Retail Mall</div>
                        <div class="est-pill" data-fac="Hospital &amp; Healthcare">Hospital &amp; Healthcare</div>
                        <div class="est-pill" data-fac="Gated Community / Township">Gated Community / Township</div>
                        <div class="est-pill" data-fac="Banking &amp; Financial Hub">Banking &amp; Financial Hub</div>
                    </div>

                    <!-- Step 2: Shift Pattern -->
                    <div class="est-step-title"><?= icon('calendar', 20) ?> Step 2: Coverage &amp; Shift Schedule</div>
                    <div class="est-pills">
                        <div class="est-pill is-active" data-shift="24/7 (3 Shifts)" data-mult="3">24 Hours / 365 Days (3 Shifts of 8 Hrs)</div>
                        <div class="est-pill" data-shift="12-Hour Day/Night (2 Shifts)" data-mult="2">12-Hour Shift (Day &amp; Night)</div>
                        <div class="est-pill" data-shift="8-Hour General Shift" data-mult="1">8-Hour Standard Business Shift</div>
                    </div>

                    <!-- Step 3: Guard Strength Steppers -->
                    <div class="est-step-title"><?= icon('users', 20) ?> Step 3: Shift Roster &amp; Personnel Breakdown</div>
                    <div class="est-counters">
                        <div class="est-counter-card">
                            <div class="est-counter-label">
                                <span>Unarmed Security Guards</span>
                                <small style="color:var(--gold)">Per Shift</small>
                            </div>
                            <div class="est-stepper">
                                <button type="button" class="est-btn" data-op="minus" data-target="unarmed" aria-label="Decrease unarmed guards">&minus;</button>
                                <span class="est-val" id="val-unarmed">4</span>
                                <button type="button" class="est-btn" data-op="plus" data-target="unarmed" aria-label="Increase unarmed guards">&plus;</button>
                            </div>
                        </div>

                        <div class="est-counter-card">
                            <div class="est-counter-label">
                                <span>Armed Security Guards</span>
                                <small style="color:var(--gold)">Per Shift</small>
                            </div>
                            <div class="est-stepper">
                                <button type="button" class="est-btn" data-op="minus" data-target="armed" aria-label="Decrease armed guards">&minus;</button>
                                <span class="est-val" id="val-armed">0</span>
                                <button type="button" class="est-btn" data-op="plus" data-target="armed" aria-label="Increase armed guards">&plus;</button>
                            </div>
                        </div>

                        <div class="est-counter-card">
                            <div class="est-counter-label">
                                <span>Security Field Supervisors</span>
                                <small style="color:var(--gold)">Site Incharge</small>
                            </div>
                            <div class="est-stepper">
                                <button type="button" class="est-btn" data-op="minus" data-target="super" aria-label="Decrease supervisors">&minus;</button>
                                <span class="est-val" id="val-super">1</span>
                                <button type="button" class="est-btn" data-op="plus" data-target="super" aria-label="Increase supervisors">&plus;</button>
                            </div>
                        </div>

                        <div class="est-counter-card">
                            <div class="est-counter-label">
                                <span>Housekeeping &amp; Allied Staff</span>
                                <small style="color:var(--gold)">Total Daily</small>
                            </div>
                            <div class="est-stepper">
                                <button type="button" class="est-btn" data-op="minus" data-target="hk" aria-label="Decrease facility staff">&minus;</button>
                                <span class="est-val" id="val-hk">2</span>
                                <button type="button" class="est-btn" data-op="plus" data-target="hk" aria-label="Increase facility staff">&plus;</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Live Estimator Output Card -->
                <div class="est-output-card">
                    <div class="est-output-head">
                        <div class="est-total-label">Recommended Total Deployment</div>
                        <div class="est-total-num"><span id="estTotalStaff">16</span> <span style="font-size:20px;font-weight:600;color:var(--muted)">Guards</span></div>
                    </div>
                    <ul class="est-summary-list">
                        <li><span>Sector:</span> <strong id="estPlanType">IT Tech Park / Corporate</strong></li>
                        <li><span>Roster:</span> <strong id="estShiftsType">24/7 (3 Shifts)</strong></li>
                        <li><span>Coverage:</span> <strong id="estCoverageHours">24 Hours / 365 Days</strong></li>
                        <li><span>Statutory Compliance:</span> <strong>PSARA / ESI / PF Included</strong></li>
                    </ul>
                    <a id="estWaBtn" class="btn btn-gold" href="#" target="_blank" rel="noopener">
                        <?= icon('whatsapp', 18) ?> Get WhatsApp Quote
                    </a>
                    <p style="text-align:center;font-size:12px;color:var(--muted);margin-top:12px">Instant response from Guardian Operations Control</p>
                </div>
            </div>
        </div>
    </div>
</section>
*/ ?>

<!-- 12c Regional Presence & Deployment Hubs -->
<section class="section section-gray" aria-labelledby="hubs-title">
    <div class="container">
        <div class="section-head center reveal">
            <p class="eyebrow">Strategic Deployment Network</p>
            <h2 id="hubs-title" class="h2">Protecting Tamil Nadu &amp; Pondicherry</h2>
            <p>Rapid response teams, dedicated area field officers, and 24/7 mobile patrol coverage across all key commercial corridors.</p>
        </div>
        <div class="hubs-grid">
            <div class="hub-card border-beam-card reveal">
                <div class="hub-top">
                    <span class="hub-tag">OMR &amp; GST Corridor</span>
                    <?= icon('navigation', 20) ?>
                </div>
                <h3>Chennai IT Expressway</h3>
                <p class="hub-areas">Taramani, Sholinganallur, Siruseri SIPCOT, Navalur, Perungudi, and Thoraipakkam tech parks.</p>
                <div class="hub-meta">
                    <div><?= icon('shield', 16) ?> 450+ IT Security Guards</div>
                    <div><?= icon('zap', 16) ?> 15-Min Patrol Response</div>
                </div>
            </div>

            <div class="hub-card border-beam-card reveal">
                <div class="hub-top">
                    <span class="hub-tag">Automotive &amp; Mfg Hub</span>
                    <?= icon('factory', 20) ?>
                </div>
                <h3>Sriperumbudur &amp; Oragadam</h3>
                <p class="hub-areas">Industrial corridors, manufacturing plants, logistics warehouses, and assembly units.</p>
                <div class="hub-meta">
                    <div><?= icon('shield', 16) ?> 600+ Industrial Personnel</div>
                    <div><?= icon('check', 16) ?> 24/7 Gate &amp; Weighbridge Ops</div>
                </div>
            </div>

            <div class="hub-card border-beam-card reveal">
                <div class="hub-top">
                    <span class="hub-tag">HQ &amp; Metro Central</span>
                    <?= icon('building', 20) ?>
                </div>
                <h3>Chennai City &amp; Ports</h3>
                <p class="hub-areas">Nungambakkam HQ, Anna Salai, Guindy, Chennai Port, T. Nagar, and Central business districts.</p>
                <div class="hub-meta">
                    <div><?= icon('shield', 16) ?> 550+ Commercial &amp; Banking</div>
                    <div><?= icon('phone', 16) ?> 24/7 Control Room Ops</div>
                </div>
            </div>

            <div class="hub-card border-beam-card reveal">
                <div class="hub-top">
                    <span class="hub-tag">Regional Branches</span>
                    <?= icon('landmark', 20) ?>
                </div>
                <h3>Pondicherry &amp; Regional Hubs</h3>
                <p class="hub-areas">Pondicherry University, coastal campuses, hospital networks, and regional branch operations.</p>
                <div class="hub-meta">
                    <div><?= icon('shield', 16) ?> 400+ Institutional Guards</div>
                    <div><?= icon('award', 16) ?> PSARA Licensed Coverage</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 12d Frequently Asked Questions (FAQ) -->
<section id="faq" class="faq-section" aria-labelledby="faq-title">
    <div class="container">
        <div class="section-head center reveal">
            <p class="eyebrow">Got Questions?</p>
            <h2 id="faq-title" class="h2">Frequently Asked Questions</h2>
            <p>Everything you need to know about Guardian's security licenses, deployment speeds, guard training, and compliance standards.</p>
        </div>

        <div class="faq-list">
            <div class="faq-item border-beam-card reveal">
                <button type="button" class="faq-question" aria-expanded="false">
                    <span>Are Guardian security guards fully PSARA licensed and police verified?</span>
                    <span class="faq-toggle-icon"><?= icon('arrow', 18) ?></span>
                </button>
                <div class="faq-answer">
                    <p>Yes. Guardian holds a valid Private Security Agencies Regulation Act (PSARA) License issued by the Controlling Authority of the Government of Tamil Nadu and Pondicherry. Every security guard is inducted only after thorough antecedent verification, local police character clearance, and background track record checks.</p>
                </div>
            </div>

            <div class="faq-item border-beam-card reveal">
                <button type="button" class="faq-question" aria-expanded="false">
                    <span>How quickly can Guardian deploy security guards to our facility?</span>
                    <span class="faq-toggle-icon"><?= icon('arrow', 18) ?></span>
                </button>
                <div class="faq-answer">
                    <p>For standard corporate, industrial, or residential facilities, our operations officers complete site reconnaissance, post-order drafting, and guard deployment within 24 to 48 hours. For rapid or temporary emergency manpower needs across Chennai and suburban industrial corridors, deployment can be organized within 4 to 12 hours.</p>
                </div>
            </div>

            <div class="faq-item border-beam-card reveal">
                <button type="button" class="faq-question" aria-expanded="false">
                    <span>What is your replacement policy if a guard is absent or sick?</span>
                    <span class="faq-toggle-icon"><?= icon('arrow', 18) ?></span>
                </button>
                <div class="faq-answer">
                    <p>We maintain an active reserve buffer pool (10% to 15% surplus strength) across each zone. If any deployed guard falls sick or is absent, our area field officer dispatches an equally trained relief guard within 1 to 2 hours, ensuring 100% post continuity and zero unmanned posts.</p>
                </div>
            </div>

            <div class="faq-item border-beam-card reveal">
                <button type="button" class="faq-question" aria-expanded="false">
                    <span>How do you monitor guard alertness during night shifts?</span>
                    <span class="faq-toggle-icon"><?= icon('arrow', 18) ?></span>
                </button>
                <div class="faq-answer">
                    <p>Night vigilance is managed through three layers: Dedicated mobile patrol squads conducting surprise midnight inspections (11:00 PM to 5:00 AM), QR-code / electronic guard patrol wanding logs, and 24/7 central operations room telephonic roll-calls. Inspection reports are shared directly with facility heads.</p>
                </div>
            </div>

            <div class="faq-item border-beam-card reveal">
                <button type="button" class="faq-question" aria-expanded="false">
                    <span>Does Guardian comply with all statutory labor laws (ESI, EPF, GST)?</span>
                    <span class="faq-toggle-icon"><?= icon('arrow', 18) ?></span>
                </button>
                <div class="faq-answer">
                    <p>100% strictly compliant. We provide monthly statutory remittance challans (ESI, EPF, GST, Professional Tax) alongside our monthly billing invoices. This completely indemnifies our client organizations from any statutory or labor department compliance liabilities.</p>
                </div>
            </div>

            <div class="faq-item border-beam-card reveal">
                <button type="button" class="faq-question" aria-expanded="false">
                    <span>Do you provide customized post orders and equipment for our site?</span>
                    <span class="faq-toggle-icon"><?= icon('arrow', 18) ?></span>
                </button>
                <div class="faq-answer">
                    <p>Yes. We draft tailored Post Orders (Standard Operating Procedures) for each assignment—whether your site requires visitor management (VMS), vehicle under-chassis mirrors, handheld metal detectors (HHMD), weighbridge entry management, or crowd control protocols.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 13 CTA -->
<section class="cta-banner" aria-labelledby="cta-title">
    <div class="cta-shield" aria-hidden="true"><?= icon('shield', 520) ?></div>
    <div class="container cta-inner">
        <h2 id="cta-title">Ready to Strengthen Your Security?</h2>
        <p>Talk to Guardian about your security and allied service requirements.</p>
        <div class="cta-actions">
            <a class="btn btn-gold" href="#enquiry">Get a Quote <?= icon('arrow', 18) ?></a>
            <a class="btn btn-outline-light" href="<?= e(url('contact.php')) ?>">Contact Us</a>
        </div>
    </div>
</section>

<!-- 14 Contact -->
<section class="section" aria-labelledby="contact-title">
    <div class="container contact-wrap">
        <div class="reveal">
            <p class="eyebrow">Contact</p>
            <h2 id="contact-title" class="h2">Let's Talk About Your Security Requirements</h2>
            <p style="color:var(--muted);font-size:18px">Share a few details and our team will get back to you.</p>
            <?php include __DIR__ . '/includes/contact-details.php'; ?>
        </div>
        <div class="reveal">
            <?php include __DIR__ . '/includes/enquiry-form.php'; ?>
        </div>
    </div>
</section>

<!-- 15 Map -->
<?php include __DIR__ . '/includes/map.php'; ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
