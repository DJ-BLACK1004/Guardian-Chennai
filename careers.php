<?php
require_once __DIR__ . '/includes/functions.php';
$forms = process_forms();
$st = $forms['career'];

$pageTitle = 'Careers at Guardian | Security Jobs in Chennai';
$pageDesc  = 'Build your career with Guardian Security & Allied Services. Structured training, performance evaluation and a professional work culture. Send your application.';
$pagePath  = 'careers.php';
$active    = 'careers';

$heroTitle = 'Build Your Career With Guardian';
$heroLead  = 'Join a team that values training, discipline and professionalism.';
$crumbs    = [['Careers', null]];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/page-hero.php';
?>

<section class="section">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Why Work With Us</p>
            <h2 class="h2">A Workplace That Invests in Its People</h2>
        </div>
        <div class="perk-grid">
            <div class="perk reveal"><?= icon('graduation', 28) ?><h3>Structured training</h3><p>Theoretical and practical training in our training centre, plus customised training before each assignment.</p></div>
            <div class="perk reveal"><?= icon('clipboard', 28) ?><h3>Skill upgrades</h3><p>Periodic on-the-job training to evaluate and upgrade skills.</p></div>
            <div class="perk reveal"><?= icon('badge', 28) ?><h3>Regular evaluation</h3><p>Performance evaluation at short intervals.</p></div>
            <div class="perk reveal"><?= icon('users', 28) ?><h3>Sound HR practices</h3><p>Good HR policies and practices that keep employee turnover low.</p></div>
        </div>
    </div>
</section>

<section class="section section-gray">
    <div class="container split" style="align-items:start">
        <div class="reveal">
            <p class="eyebrow">Available Opportunities</p>
            <h2 class="h2">Open Positions</h2>
            <div class="callout">
                <p>No specific openings are listed at the moment. You are welcome to send a general application and our team will contact you when a suitable role is available.</p>
            </div>

            <h2 class="h2" style="margin-top:48px;font-size:28px">Requirements</h2>
            <p style="color:var(--muted)">Guardian inducts security personnel with:</p>
            <ul class="checklist">
                <li><?= icon('check', 20) ?><span>Due academic qualification</span></li>
                <li><?= icon('check', 20) ?><span>Physical fitness</span></li>
                <li><?= icon('check', 20) ?><span>The right aptitude</span></li>
                <li><?= icon('check', 20) ?><span>Satisfactory antecedent verification and track record</span></li>
            </ul>

            <div class="visual-frame reveal" style="min-height:260px;margin-top:32px">
                <img src="<?= e(url('assets/img/salute.webp')) ?>" alt="Guardian security personnel salute" width="600" height="340" loading="lazy">
                <div class="float-card">
                    <?= icon('badge', 24) ?>
                    <div><strong>Disciplined Force</strong><span>Equal Opportunity Employer</span></div>
                </div>
            </div>
        </div>

        <div class="reveal">
            <div class="form-card" id="apply">
                <h2 style="font-size:26px;margin-bottom:20px">Application Form</h2>

                <?php if ($st['success']): ?>
                    <div class="form-banner success" role="status">
                        <?= icon('check', 22) ?>
                        <p>Thank you. Your application has been received. Our team will get in touch with you if there is a suitable opening.</p>
                    </div>
                <?php else: ?>
                    <?php if ($st['failed'] || $st['errors']): ?>
                        <div class="form-banner error" role="alert">
                            <?= icon('x', 22) ?>
                            <p>Something went wrong. Please check your details and try again.</p>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="#apply" enctype="multipart/form-data" novalidate>
                        <input type="hidden" name="form" value="career">
                        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
                        <input type="hidden" name="MAX_FILE_SIZE" value="<?= (int) RESUME_MAX_BYTES ?>">
                        <div class="hp" aria-hidden="true"><label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

                        <div class="form-grid">
                            <div class="field full">
                                <label for="name">Full Name <span class="req">*</span></label>
                                <input type="text" autocomplete="name" placeholder="Your full name" value="<?= old($st, 'name') ?>" maxlength="80"<?= field_attrs($st, 'name') ?>>
                                <?= field_error($st, 'name') ?>
                            </div>
                            <div class="field">
                                <label for="phone">Phone <span class="req">*</span></label>
                                <input type="tel" inputmode="tel" autocomplete="tel" placeholder="10-digit mobile number" value="<?= old($st, 'phone') ?>" maxlength="20"<?= field_attrs($st, 'phone') ?>>
                                <?= field_error($st, 'phone') ?>
                            </div>
                            <div class="field">
                                <label for="email">Email <span class="req">*</span></label>
                                <input type="email" autocomplete="email" placeholder="you@example.com" value="<?= old($st, 'email') ?>" maxlength="120"<?= field_attrs($st, 'email') ?>>
                                <?= field_error($st, 'email') ?>
                            </div>
                            <div class="field">
                                <label for="position">Position <span class="req">*</span></label>
                                <input type="text" placeholder="Role you are applying for" value="<?= old($st, 'position') ?>" maxlength="80"<?= field_attrs($st, 'position') ?>>
                                <?= field_error($st, 'position') ?>
                            </div>
                            <div class="field">
                                <label for="experience">Experience (years) <span class="req">*</span></label>
                                <input type="number" min="0" max="50" step="1" inputmode="numeric" placeholder="0 if fresher" value="<?= old($st, 'experience') ?>"<?= field_attrs($st, 'experience') ?>>
                                <?= field_error($st, 'experience') ?>
                            </div>
                            <div class="field full">
                                <label for="resume">Resume <span class="req">*</span></label>
                                <input type="file" accept=".pdf,.doc,.docx,application/pdf" aria-describedby="resume-hint<?= !empty($st['errors']['resume']) ? ' err-resume' : '' ?>"<?= !empty($st['errors']['resume']) ? ' aria-invalid="true"' : '' ?> id="resume" name="resume">
                                <p class="field-hint" id="resume-hint">PDF, DOC or DOCX, up to 2 MB.</p>
                                <?= field_error($st, 'resume') ?>
                            </div>
                            <div class="field full">
                                <label for="message">Message</label>
                                <textarea rows="4" placeholder="Anything you would like us to know" maxlength="1000"<?= field_attrs($st, 'message') ?>><?= old($st, 'message') ?></textarea>
                                <?= field_error($st, 'message') ?>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block-mobile" type="submit">Submit Application <?= icon('arrow', 18) ?></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
