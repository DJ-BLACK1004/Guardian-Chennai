<ul class="contact-list">
    <li>
        <span class="icon-badge"><?= icon('pin', 22) ?></span>
        <div>
            <strong>Office Address</strong>
            <address><?= implode('<br>', array_map('e', SITE_ADDRESS_LINES)) ?></address>
        </div>
    </li>
    <li>
        <span class="icon-badge"><?= icon('smartphone', 22) ?></span>
        <div>
            <strong>Mobile No</strong>
            <a href="tel:<?= e(preg_replace('/[^+\d]/', '', SITE_MOBILE)) ?>"><?= e(SITE_MOBILE_DISPLAY) ?></a>
        </div>
    </li>
    <li>
        <span class="icon-badge"><?= icon('phone', 22) ?></span>
        <div>
            <strong>Phone No</strong>
            <div style="display:flex;flex-wrap:wrap;gap:6px 10px;margin-top:2px">
                <?php foreach (SITE_LANDLINES as $i => $l): ?>
                    <a href="tel:<?= e(preg_replace('/[^+\d]/', '', $l)) ?>"><?= e($l) ?><?= $i < count(SITE_LANDLINES) - 1 ? ',' : '' ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </li>
    <li>
        <span class="icon-badge"><?= icon('printer', 22) ?></span>
        <div>
            <strong>Fax No</strong>
            <span><?= e(SITE_FAX) ?></span>
        </div>
    </li>
    <li>
        <span class="icon-badge"><?= icon('mail', 22) ?></span>
        <div>
            <strong>E-Mail</strong>
            <div style="display:flex;flex-direction:column;gap:4px;margin-top:2px">
                <?php foreach (SITE_EMAILS as $em): ?>
                    <a href="mailto:<?= e($em) ?>"><?= e($em) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </li>
</ul>
