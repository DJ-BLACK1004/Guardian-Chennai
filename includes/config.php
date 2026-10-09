<?php
/**
 * Site settings - edit the values below.
 * Phone and email were NOT found on the old website, so they are left empty.
 * Fill them in and the Call buttons / contact details appear automatically.
 */

const SITE_NAME       = 'Guardian Security & Allied Services';
const SITE_LEGAL_NAME = 'Guardian Integrated Security Services India Private Limited';
const SITE_SHORT      = 'Guardian';

// ---- Contact details ----
const SITE_PHONE         = '+91 9600050935';
const SITE_PHONE_DISPLAY = '+91 96000 50935';
const SITE_MOBILE        = '+91 9600050935';
const SITE_MOBILE_DISPLAY= '+91 96000 50935';
const SITE_LANDLINES     = [
    '044-28232043',
    '044-28232044',
    '044-42137850',
];
const SITE_FAX           = '044-28232044';
const SITE_EMAIL         = 'gisschennai@gmail.com';
const SITE_EMAILS        = [
    'gisschennai@gmail.com',
    'md@guardianchennai.com',
];

// Address taken from official contact details
const SITE_ADDRESS_LINES = [
    'No.2, Lady Madhavan Street, Mahalingapuram',
    'Nungambakkam, Chennai - 600034',
];
const SITE_ADDRESS_ONE_LINE = 'No.2, Lady Madhavan Street, Mahalingapuram, Nungambakkam, Chennai - 600034';

// ---- Enquiry / application delivery ----
// If MAIL_TO is set, PHP mail() is attempted. Every submission is ALSO saved
// to storage/enquiries.csv and storage/applications.csv.
const MAIL_TO   = 'gisschennai@gmail.com';
const MAIL_FROM = 'no-reply@guardianchennai.com';

// ---- Resume upload rules ----
const RESUME_MAX_BYTES = 2 * 1024 * 1024; // 2 MB

// Canonical host override (leave empty to auto-detect)
const CANONICAL_HOST = '';
