<?php
/**
 * Infinite Smooth Client Logo Marquee (Claymorphism Ticker)
 */
$marqueeClients = [
    ['name' => 'Wipro Technologies', 'type' => 'IT & Software Park', 'img' => 'client-wipro.webp'],
    ['name' => 'TIDEL Park Chennai', 'type' => 'Premier IT Hub', 'img' => 'client-tidel.webp'],
    ['name' => 'Elnet Technologies', 'type' => 'Corporate IT Center', 'img' => 'client-elnet.webp'],
    ['name' => 'Sutherland Global', 'type' => 'BPO & Enterprise', 'img' => 'client-sutherland.webp'],
    ['name' => 'NIOT Chennai', 'type' => 'Govt Ocean Tech', 'img' => 'client-niot.webp'],
    ['name' => 'State Bank of India', 'type' => 'Banking & Financial', 'icon' => 'landmark'],
    ['name' => 'Canara Bank', 'type' => 'Nationalised Banking', 'icon' => 'landmark'],
    ['name' => 'TVS Supply Chain', 'type' => 'Logistics & Warehousing', 'icon' => 'truck'],
    ['name' => 'DHL Global', 'type' => 'Logistics Hub', 'icon' => 'truck'],
    ['name' => 'Pondicherry University', 'type' => 'Higher Education', 'icon' => 'graduation'],
    ['name' => 'Thamarai Techno Park', 'type' => 'Tech Park', 'icon' => 'building'],
];
?>
<div class="marquee-container reveal" aria-label="Client marquee carousel">
    <div class="marquee-track">
        <?php for ($loop = 0; $loop < 2; $loop++): ?>
            <?php foreach ($marqueeClients as $mc): ?>
                <div class="marquee-card">
                    <?php if (!empty($mc['img']) && photo_exists($mc['img'])): ?>
                        <img src="<?= e(url('assets/img/' . $mc['img'])) ?>" alt="<?= e($mc['name']) ?>" width="110" height="38" loading="lazy">
                    <?php else: ?>
                        <div style="width:38px;height:38px;border-radius:10px;background:rgba(201,151,46,.12);color:var(--gold);display:grid;place-items:center;flex-shrink:0">
                            <?= icon($mc['icon'] ?? 'shield', 20) ?>
                        </div>
                    <?php endif; ?>
                    <div class="mc-body">
                        <strong><?= e($mc['name']) ?></strong>
                        <small><?= e($mc['type']) ?></small>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endfor; ?>
    </div>
</div>
