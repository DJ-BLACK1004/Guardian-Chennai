<?php
/** Inner page hero. Expects $heroTitle, optional $heroLead, $crumbs = [[label, href|null], ...] */
?>
<section class="page-hero">
    <div class="page-hero-bg" aria-hidden="true"></div>
    <div class="container page-hero-inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <ol>
                <li><a href="<?= e(url('index.php')) ?>">Home</a></li>
                <?php foreach (($crumbs ?? []) as [$label, $href]): ?>
                    <li><?php if ($href): ?><a href="<?= e($href) ?>"><?= e($label) ?></a><?php else: ?><span aria-current="page"><?= e($label) ?></span><?php endif; ?></li>
                <?php endforeach; ?>
            </ol>
        </nav>
        <h1><?= e($heroTitle) ?></h1>
        <?php if (!empty($heroLead)): ?><p class="lead"><?= e($heroLead) ?></p><?php endif; ?>
    </div>
</section>
