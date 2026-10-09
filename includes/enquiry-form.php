<?php
/**
 * Enquiry form partial.
 * Expects $forms (from process_forms()). Optional $presetService.
 */
$st  = $forms['enquiry'];
$sel = $st['old']['service'] ?? ($presetService ?? '');
?>
<div class="form-card" id="enquiry">
    <?php if ($st['success']): ?>
        <div class="form-banner success" role="status">
            <?= icon('check', 22) ?>
            <p>Thank you. Your enquiry has been received. Our team will get in touch with you shortly.</p>
        </div>
    <?php else: ?>
        <?php if ($st['failed'] || $st['errors']): ?>
            <div class="form-banner error" role="alert">
                <?= icon('x', 22) ?>
                <p>Something went wrong. Please check your details and try again.</p>
            </div>
        <?php endif; ?>

        <form method="post" action="#enquiry" novalidate>
            <input type="hidden" name="form" value="enquiry">
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
            <div class="hp" aria-hidden="true"><label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

            <div class="form-grid">
                <div class="field">
                    <label for="name">Full Name <span class="req">*</span></label>
                    <input type="text" autocomplete="name" placeholder="Your full name" value="<?= old($st, 'name') ?>" maxlength="80"<?= field_attrs($st, 'name') ?>>
                    <?= field_error($st, 'name') ?>
                </div>
                <div class="field">
                    <label for="company">Company Name</label>
                    <input type="text" autocomplete="organization" placeholder="Your organisation" value="<?= old($st, 'company') ?>" maxlength="100"<?= field_attrs($st, 'company') ?>>
                    <?= field_error($st, 'company') ?>
                </div>
                <div class="field">
                    <label for="phone">Phone Number <span class="req">*</span></label>
                    <input type="tel" inputmode="tel" autocomplete="tel" placeholder="10-digit mobile number" value="<?= old($st, 'phone') ?>" maxlength="20"<?= field_attrs($st, 'phone') ?>>
                    <?= field_error($st, 'phone') ?>
                </div>
                <div class="field">
                    <label for="email">Email Address <span class="req">*</span></label>
                    <input type="email" autocomplete="email" placeholder="you@company.com" value="<?= old($st, 'email') ?>" maxlength="120"<?= field_attrs($st, 'email') ?>>
                    <?= field_error($st, 'email') ?>
                </div>
                <div class="field full">
                    <label for="service">Service Required <span class="req">*</span></label>
                    <select<?= field_attrs($st, 'service') ?>>
                        <option value="">Select a service</option>
                        <?php foreach (service_options() as $opt): ?>
                            <option value="<?= e($opt) ?>"<?= $sel === $opt ? ' selected' : '' ?>><?= e($opt) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= field_error($st, 'service') ?>
                </div>
                <div class="field full">
                    <label for="message">Message <span class="req">*</span></label>
                    <textarea rows="5" placeholder="Tell us about your requirement" maxlength="1000"<?= field_attrs($st, 'message') ?>><?= old($st, 'message') ?></textarea>
                    <?= field_error($st, 'message') ?>
                </div>
            </div>
            <button class="btn btn-primary btn-block-mobile" type="submit">Send Enquiry <?= icon('arrow', 18) ?></button>
        </form>
    <?php endif; ?>
</div>
