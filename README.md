# Guardian Chennai – redesigned website (PHP, no database)

## Run on XAMPP (step by step)
1. Copy the `guardian-chennai` folder into `C:\xampp\htdocs\`.
2. Start Apache in the XAMPP control panel.
3. Open http://localhost/guardian-chennai/
4. Make sure `storage/` and `uploads/` are writable (default on XAMPP/Windows).

## Fill these in (includes/config.php)
Phone and email were not on the old site, so they are empty. Add `SITE_PHONE`, `SITE_PHONE_DISPLAY`, `SITE_EMAIL` and the Call buttons / contact details appear automatically. Set `MAIL_TO` if you want enquiries emailed too.

## Where submissions go
- Enquiries: `storage/enquiries.csv`
- Career applications: `storage/applications.csv`, resumes in `uploads/`
These folders are blocked from the web by `.htaccess` (Apache). On nginx add equivalent deny rules.

## Add real photos (optional, auto-detected)
Put WebP files in `assets/img/`: `hero.webp`, `about.webp`, `why.webp`, `team.webp`, and `og.jpg` for social sharing. Until then, branded graphics are shown. No stock photos were invented.

## Content notes
- All services, industries, clients, training, management and the address come from the old site.
- No testimonials, awards or certification logos existed, so none are shown.
- Mission / Vision / Values / timeline were not on the old site, so they are not invented.
- Privacy Policy and Terms are drafts – get them reviewed.
