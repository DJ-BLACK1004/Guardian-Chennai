<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/data.php';

/* ---------- Basic helpers ---------- */

function e(?string $v): string
{
    return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}

function base_path(): string
{
    $dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
    return $dir === '/' || $dir === '.' ? '' : rtrim($dir, '/');
}

function url(string $path = ''): string
{
    return base_path() . '/' . ltrim($path, '/');
}

function asset(string $path): string
{
    $file = __DIR__ . '/../assets/' . ltrim($path, '/');
    $v = is_file($file) ? (string) filemtime($file) : '1';
    return url('assets/' . ltrim($path, '/')) . '?v=' . $v;
}

function site_origin(): string
{
    $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
    $host  = CANONICAL_HOST !== '' ? CANONICAL_HOST : ($_SERVER['HTTP_HOST'] ?? 'localhost');
    $host  = preg_replace('/[^a-zA-Z0-9.\-:]/', '', $host) ?? 'localhost';
    return ($https ? 'https://' : 'http://') . $host;
}

function service_url(string $slug): string
{
    return url('service.php?slug=' . rawurlencode($slug));
}

function find_service(string $slug): ?array
{
    global $SERVICES;
    foreach ($SERVICES as $s) {
        if ($s['slug'] === $slug) {
            return $s;
        }
    }
    return null;
}

/** Optional real photo: drop a file into assets/img and it is used automatically. */
function photo_exists(string $name): bool
{
    return is_file(__DIR__ . '/../assets/img/' . $name);
}

/** Optional real video: drop a file into assets/video and it is used automatically. */
function video_exists(string $name): bool
{
    return is_file(__DIR__ . '/../assets/video/' . $name);
}

function video_url(string $name): string
{
    return url('assets/video/' . ltrim($name, '/'));
}

/* ---------- Icons (Lucide-style outline, one family) ---------- */

function icon(string $name, int $size = 24): string
{
    static $paths = [
        'shield'    => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>',
        'lock'      => '<rect width="18" height="11" x="3" y="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>',
        'users'     => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'building'  => '<rect width="16" height="20" x="4" y="2" rx="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01M12 6h.01M16 6h.01M8 10h.01M12 10h.01M16 10h.01M8 14h.01M12 14h.01M16 14h.01"/>',
        'camera'    => '<path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3z"/><circle cx="12" cy="13" r="3"/>',
        'badge'     => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        'check'     => '<path d="M20 6 9 17l-5-5"/>',
        'arrow'     => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'phone'     => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'mail'      => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
        'pin'       => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'truck'     => '<path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/>',
        'calendar'  => '<path d="M8 2v4M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/>',
        'search'    => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
        'clipboard' => '<rect width="8" height="4" x="8" y="2" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/>',
        'cpu'       => '<rect width="16" height="16" x="4" y="4" rx="2"/><rect width="6" height="6" x="9" y="9"/><path d="M15 2v2M15 20v2M2 15h2M2 9h2M20 15h2M20 9h2M9 2v2M9 20v2"/>',
        'zap'       => '<path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/>',
        'landmark'  => '<path d="M3 22h18M6 18v-7M10 18v-7M14 18v-7M18 18v-7M12 2 3 7v2h18V7z"/>',
        'graduation'=> '<path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/>',
        'factory'   => '<path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/><path d="M17 18h1M12 18h1M7 18h1"/>',
        'home'      => '<path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>',
        'menu'      => '<path d="M4 6h16M4 12h16M4 18h16"/>',
        'x'         => '<path d="M18 6 6 18M6 6l12 12"/>',
        'up'        => '<path d="m18 15-6-6-6 6"/>',
        'user-check'=> '<path d="m16 11 2 2 4-4"/><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>',
        'file'      => '<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/>',
        'eye'       => '<path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/>',
        'smartphone'=> '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/>',
        'printer'   => '<path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6"/><rect width="12" height="8" x="6" y="14"/>',
        'whatsapp'  => '<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/><path d="M9.5 8.5c.2-.5.5-.5.8-.5h.6c.2 0 .4.1.5.4l.7 1.7c.1.3.1.5-.1.7l-.4.5c-.1.2-.3.3-.1.6.4.7 1 1.3 1.7 1.7.3.2.4 0 .6-.1l.5-.4c.2-.2.4-.2.7-.1l1.7.7c.3.1.4.3.4.5v.6c0 .3 0 .6-.5.8-.8.3-2.1.2-3.8-.8-1.9-1.2-3.1-3-3.3-3.3-.2-.3-.8-1.1-.8-2.1s.5-1.5.7-1.8z"/>',
        'calculator'=> '<rect width="16" height="20" x="4" y="2" rx="2"/><line x1="8" x2="16" y1="6" y2="6"/><line x1="16" x2="16" y1="14" y2="18"/><path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 10h.01"/><path d="M12 14h.01"/><path d="M8 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/>',
        'award'     => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
        'navigation'=> '<polygon points="3 11 22 2 13 21 11 13 3 11"/>',
        'play'      => '<polygon points="6 3 20 12 6 21 6 3"/>',
        'pause'     => '<rect width="4" height="16" x="6" y="4" rx="1"/><rect width="4" height="16" x="14" y="4" rx="1"/>',
    ];
    $p = $paths[$name] ?? $paths['shield'];
    return '<svg class="icon" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $p . '</svg>';
}

/* ---------- Forms: CSRF, validation, storage ---------- */

function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['csrf'];
}

function clean(string $v): string
{
    $v = trim(preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $v) ?? '');
    return $v;
}

function csv_safe(string $v): string
{
    // plain phone numbers (e.g. +91 98765 43210) are safe as they are
    if (preg_match('/^\+?[0-9][0-9\s\-]*$/', $v)) {
        return $v;
    }
    // stop spreadsheet formula injection
    return preg_match('/^[=+\-@\t\r]/', $v) ? "'" . $v : $v;
}

function store_row(string $file, array $row): bool
{
    $dir = __DIR__ . '/../storage';
    if (!is_dir($dir)) {
        @mkdir($dir, 0750, true);
    }
    $path = $dir . '/' . $file;
    $new  = !is_file($path);
    $fh   = @fopen($path, 'ab');
    if (!$fh) {
        return false;
    }
    flock($fh, LOCK_EX);
    if ($new) {
        fputcsv($fh, array_keys($row));
    }
    fputcsv($fh, array_map(fn($v) => csv_safe((string) $v), array_values($row)));
    flock($fh, LOCK_UN);
    fclose($fh);
    return true;
}

function send_mail_if_set(string $subject, string $body, ?string $replyTo = null): void
{
    if (MAIL_TO === '') {
        return;
    }
    $headers = 'From: ' . MAIL_FROM . "\r\nContent-Type: text/plain; charset=UTF-8";
    if ($replyTo && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
        $headers .= "\r\nReply-To: " . $replyTo;
    }
    @mail(MAIL_TO, $subject, $body, $headers);
}

function service_options(): array
{
    global $SERVICES;
    $opts = array_map(fn($s) => $s['name'], $SERVICES);
    $opts[] = 'Other / Not sure';
    return $opts;
}

function empty_state(): array
{
    return ['errors' => [], 'old' => [], 'failed' => false, 'success' => false];
}

function valid_phone(string $p): bool
{
    if (!preg_match('/^\+?[0-9][0-9\s\-]{6,18}$/', $p)) {
        return false;
    }
    $digits = preg_replace('/\D/', '', $p) ?? '';
    return strlen($digits) >= 10 && strlen($digits) <= 13;
}

function redirect_back(string $anchor): never
{
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $uri = strtok($uri, '#') ?: '/';
    if ($uri === '' || $uri[0] !== '/') {
        $uri = '/';
    }
    header('Location: ' . $uri . '#' . $anchor, true, 303);
    exit;
}

/** Handle POSTs for the enquiry and career forms. Returns state per form. */
function process_forms(): array
{
    $states = ['enquiry' => empty_state(), 'career' => empty_state()];

    foreach (['enquiry', 'career'] as $f) {
        if (!empty($_SESSION['flash_success'][$f])) {
            $states[$f]['success'] = true;
            unset($_SESSION['flash_success'][$f]);
        }
    }

    if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
        return $states;
    }

    $form = $_POST['form'] ?? '';
    if (!in_array($form, ['enquiry', 'career'], true)) {
        return $states;
    }

    $st = &$states[$form];

    // CSRF + honeypot
    $tok = (string) ($_POST['csrf'] ?? '');
    if (!hash_equals(csrf_token(), $tok) || !empty($_POST['website'])) {
        $st['failed'] = true;
        return $states;
    }

    // simple rate limit: 1 submission per 8 seconds per session
    $now = time();
    if (isset($_SESSION['last_submit']) && $now - (int) $_SESSION['last_submit'] < 8) {
        $st['failed'] = true;
        return $states;
    }

    if ($form === 'enquiry') {
        $v = [
            'name'    => clean((string) ($_POST['name'] ?? '')),
            'company' => clean((string) ($_POST['company'] ?? '')),
            'phone'   => clean((string) ($_POST['phone'] ?? '')),
            'email'   => clean((string) ($_POST['email'] ?? '')),
            'service' => clean((string) ($_POST['service'] ?? '')),
            'message' => clean((string) ($_POST['message'] ?? '')),
        ];
        $st['old'] = $v;
        $err = [];
        $len = fn(string $s) => mb_strlen($s, 'UTF-8');

        if ($v['name'] === '')                       $err['name'] = 'Please enter your full name.';
        elseif ($len($v['name']) < 2 || $len($v['name']) > 80) $err['name'] = 'Name should be 2 to 80 characters.';

        if ($len($v['company']) > 100)               $err['company'] = 'Company name is too long.';

        if ($v['phone'] === '')                      $err['phone'] = 'Please enter your phone number.';
        elseif (!valid_phone($v['phone']))           $err['phone'] = 'Enter a valid phone number (10 to 13 digits).';

        if ($v['email'] === '')                      $err['email'] = 'Please enter your email address.';
        elseif (!filter_var($v['email'], FILTER_VALIDATE_EMAIL)) $err['email'] = 'Enter a valid email address.';

        if ($v['service'] === '')                    $err['service'] = 'Please choose a service.';
        elseif (!in_array($v['service'], service_options(), true)) $err['service'] = 'Please choose a service from the list.';

        if ($v['message'] === '')                    $err['message'] = 'Please tell us a little about your requirement.';
        elseif ($len($v['message']) < 10)            $err['message'] = 'Please write at least 10 characters.';
        elseif ($len($v['message']) > 1000)          $err['message'] = 'Message should be under 1000 characters.';

        if ($err) {
            $st['errors'] = $err;
            return $states;
        }

        $ok = store_row('enquiries.csv', [
            'received_at' => date('Y-m-d H:i:s'),
            'name' => $v['name'], 'company' => $v['company'], 'phone' => $v['phone'],
            'email' => $v['email'], 'service' => $v['service'], 'message' => $v['message'],
        ]);
        if (!$ok) {
            $st['failed'] = true;
            return $states;
        }
        send_mail_if_set(
            'New website enquiry - ' . $v['name'],
            "Name: {$v['name']}\nCompany: {$v['company']}\nPhone: {$v['phone']}\nEmail: {$v['email']}\nService: {$v['service']}\n\nMessage:\n{$v['message']}\n",
            $v['email']
        );
    } else {
        $v = [
            'name'       => clean((string) ($_POST['name'] ?? '')),
            'phone'      => clean((string) ($_POST['phone'] ?? '')),
            'email'      => clean((string) ($_POST['email'] ?? '')),
            'position'   => clean((string) ($_POST['position'] ?? '')),
            'experience' => clean((string) ($_POST['experience'] ?? '')),
            'message'    => clean((string) ($_POST['message'] ?? '')),
        ];
        $st['old'] = $v;
        $err = [];
        $len = fn(string $s) => mb_strlen($s, 'UTF-8');

        if ($v['name'] === '')                       $err['name'] = 'Please enter your full name.';
        elseif ($len($v['name']) < 2 || $len($v['name']) > 80) $err['name'] = 'Name should be 2 to 80 characters.';

        if ($v['phone'] === '')                      $err['phone'] = 'Please enter your phone number.';
        elseif (!valid_phone($v['phone']))           $err['phone'] = 'Enter a valid phone number (10 to 13 digits).';

        if ($v['email'] === '')                      $err['email'] = 'Please enter your email address.';
        elseif (!filter_var($v['email'], FILTER_VALIDATE_EMAIL)) $err['email'] = 'Enter a valid email address.';

        if ($v['position'] === '')                   $err['position'] = 'Please tell us the position you are applying for.';
        elseif ($len($v['position']) > 80)           $err['position'] = 'Position is too long.';

        if ($v['experience'] === '')                 $err['experience'] = 'Please enter your years of experience (0 if fresher).';
        elseif (!ctype_digit($v['experience']) || (int) $v['experience'] > 50) $err['experience'] = 'Enter a whole number between 0 and 50.';

        if ($len($v['message']) > 1000)              $err['message'] = 'Message should be under 1000 characters.';

        // Resume
        $saved = '';
        $f = $_FILES['resume'] ?? null;
        if (!$f || ($f['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            $err['resume'] = 'Please upload your resume (PDF, DOC or DOCX).';
        } elseif ($f['error'] !== UPLOAD_ERR_OK) {
            $err['resume'] = ($f['error'] === UPLOAD_ERR_INI_SIZE || $f['error'] === UPLOAD_ERR_FORM_SIZE)
                ? 'File is too large. Maximum size is 2 MB.' : 'Upload failed. Please try again.';
        } elseif (!is_uploaded_file($f['tmp_name'])) {
            $err['resume'] = 'Upload failed. Please try again.';
        } elseif ($f['size'] > RESUME_MAX_BYTES) {
            $err['resume'] = 'File is too large. Maximum size is 2 MB.';
        } else {
            $ext = strtolower(pathinfo((string) $f['name'], PATHINFO_EXTENSION));
            $mime = (new finfo(FILEINFO_MIME_TYPE))->file($f['tmp_name']) ?: '';
            $head = (string) file_get_contents($f['tmp_name'], false, null, 0, 8);
            $okType = false;
            if ($ext === 'pdf' && $mime === 'application/pdf' && str_starts_with($head, '%PDF')) {
                $okType = true;
            } elseif ($ext === 'doc' && in_array($mime, ['application/msword', 'application/vnd.ms-office', 'application/x-ole-storage'], true)) {
                $okType = true;
            } elseif ($ext === 'docx' && in_array($mime, ['application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/zip'], true) && str_starts_with($head, 'PK')) {
                $okType = true;
            }
            if (!$okType) {
                $err['resume'] = 'Only PDF, DOC or DOCX files are accepted.';
            } else {
                $saved = bin2hex(random_bytes(12)) . '.' . $ext;
            }
        }

        if ($err) {
            $st['errors'] = $err;
            return $states;
        }

        $dir = __DIR__ . '/../uploads';
        if (!is_dir($dir)) {
            @mkdir($dir, 0750, true);
        }
        if (!@move_uploaded_file($f['tmp_name'], $dir . '/' . $saved)) {
            $st['failed'] = true;
            return $states;
        }
        $ok = store_row('applications.csv', [
            'received_at' => date('Y-m-d H:i:s'),
            'name' => $v['name'], 'phone' => $v['phone'], 'email' => $v['email'],
            'position' => $v['position'], 'experience_years' => $v['experience'],
            'message' => $v['message'], 'resume_file' => $saved,
        ]);
        if (!$ok) {
            $st['failed'] = true;
            return $states;
        }
        send_mail_if_set(
            'New career application - ' . $v['name'],
            "Name: {$v['name']}\nPhone: {$v['phone']}\nEmail: {$v['email']}\nPosition: {$v['position']}\nExperience: {$v['experience']} yrs\nResume file: uploads/{$saved}\n\n{$v['message']}\n",
            $v['email']
        );
    }

    $_SESSION['last_submit'] = $now;
    $_SESSION['flash_success'][$form] = true;
    unset($_SESSION['csrf']);
    redirect_back($form === 'enquiry' ? 'enquiry' : 'apply');
}

/* ---------- Form rendering helpers ---------- */

function field_error(array $state, string $field): string
{
    if (empty($state['errors'][$field])) {
        return '';
    }
    return '<p class="field-error" id="err-' . e($field) . '" role="alert">' . e($state['errors'][$field]) . '</p>';
}

function field_attrs(array $state, string $field, string $idPrefix = ''): string
{
    $id = $idPrefix . $field;
    $a  = ' id="' . e($id) . '" name="' . e($field) . '"';
    if (!empty($state['errors'][$field])) {
        $a .= ' aria-invalid="true" aria-describedby="err-' . e($field) . '" class="has-error"';
    }
    return $a;
}

function old(array $state, string $field): string
{
    return e($state['old'][$field] ?? '');
}
